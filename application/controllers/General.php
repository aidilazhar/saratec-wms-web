<?php
defined('BASEPATH') or exit('No direct script access allowed');

class General extends CI_Controller
{
    function __construct()
    {
        parent::__construct();

        $this->load->model('Authentication_model');
        $this->load->model('Wire_model');
        $this->load->model('Drum_model');
        $this->load->model('Package_model');
        $this->load->model('Company_model');
        $this->load->model('Client_model');
        $this->load->model('Utility_model');
        $this->load->model('User_model');
        $this->load->model('JobType_model');
        $this->load->model('Trial_model');
        $this->load->model('Report_model');
        $this->load->model('Well_model');
        $this->load->model('ThirdPartyData_model');
        $this->load->model('Smart_monitor_model');
        $this->load->model('LabTest_model');
        $this->title = 'Dashboard';
    }

    public function login($wire_name)
    {
        $this->load->view('dashboards/login', compact('wire_name'));
    }

    public function unlock($wire_name)
    {
        $password = $this->input->post('password');
        $company = $this->Company_model->dashboard($wire_name);

        if (!empty($company)) {
            $matched = password_verify($password, $company['password']);
        } else {
            $matched = false;
        }

        if ($matched == true) {
            $this->session->set_userdata('dashboard_logged', $company);

            redirect($wire_name . '/dashboard');
        } else {
            redirect($wire_name . '/login');
        }
    }

    public function dashboard($wire_name)
    {
        if (is_authed() == false) {
            go_to_auth(base_url($wire_name . "/login"));
            redirect(LOGIN_URL);
        }

        $wire = $this->Wire_model->dashboard($wire_name);
        $wire_id = $wire['id'];
        $page = [
            'title' => $this->title,
            'subtitle' => "Wire Details",
            'view' => 'dashboards/index',
            'scripts' => 'dashboards/scripts'
        ];

        $operators = $this->User_model->list([], [ROLE_OPERATOR]);
        $trials = $this->Trial_model->list([$wire_id]);
        $drums = $this->Drum_model->list();

        $clients = $jobs = $wlls = $tj = $w = [];
        $current_not_exposed_to_well_cond = $sum_cut_off = 0;
        foreach ($trials as $key => $row) {
            if (isset($jobs[$row['job_type_id']])) {
                $jobs[$row['job_type_id']] = $jobs[$row['job_type_id']] + 1;
            } else {
                $tj[] = $row['job_type_id'];
                $jobs[$row['job_type_id']] = 1;
            }

            if (isset($wlls[$row['well_id']])) {
                $wlls[$row['well_id']] = $wlls[$row['well_id']] + 1;
            } else {
                $w[] = $row['well_id'];
                $wlls[$row['well_id']] = 1;
            }

            $sum_cut_off = $sum_cut_off + $row['cut_off'];

            if ($row['max_depth'] == '') {
                $max_depth = 0;
            } else {
                $max_depth = $row['max_depth'];
            }

            $trials[$key]['not_exposed_to_well_cond'] = $wire['initial_length'] - $sum_cut_off - $max_depth;

            if ($key == 0) {
                $current_not_exposed_to_well_cond = $trials[$key]['not_exposed_to_well_cond'];
            } else {
                if ($trials[$key]['not_exposed_to_well_cond'] < $current_not_exposed_to_well_cond) {
                    $current_not_exposed_to_well_cond = $trials[$key]['not_exposed_to_well_cond'];
                }
            }

            $clients[] = $row['client_id'];
        }

        $job_types = $this->JobType_model->list([
            'id' => $tj
        ]);

        $wells = $this->Well_model->list([
            'id' => $w
        ]);

        $client_count = array_count_values($clients);

        $total_client = count($clients);

        $clients = array_unique($clients);

        $clients = $this->Client_model->list(null, [
            'id' => $clients
        ]);

        foreach ($clients as $key => $client) {
            $clients[$key]['percent'] = number_format(($client_count[$client['id']] / $total_client) * 100, 2);
            $clients[$key]['total_client'] = number_format(($client_count[$client['id']]), 2);
        }

        foreach ($job_types as $key => $job_type) {
            $job_types[$key]['total'] = $jobs[$job_type['id']] ?? 0;
        }

        foreach ($wells as $key => $well) {
            $wells[$key]['total'] = $wlls[$well['id']] ?? 0;
        }

        usort($wells, function ($a, $b) {
            return $a['total'] <=> $b['total'];
        });
        $wells = array_reverse($wells);

        usort($job_types, function ($a, $b) {
            return $a['total'] <=> $b['total'];
        });
        $job_types = array_reverse($job_types);

        $trials = $this->Trial_model->list([$wire_id]);
        $trials_except = $this->Trial_model->list([$wire_id], [1]);

        $mins = array_sum(array_column($trials_except, 'duration'));
        $hours = intdiv($mins, 60);
        $days = round($hours / 24);

        $x_inch = array_map(function ($entry) {
            if ($entry['x_inch'] == 0) return null;
            $issued_at = strtotime(date('Y-m-d H:i:s', strtotime($entry['issued_at']))) * 1000;
            $value = floatval($entry["x_inch"]);
            return [$issued_at, $value];
        }, $trials);

        $x_inch = array_values(array_filter($x_inch));

        $y_inch = array_map(function ($entry) {
            if ($entry['y_inch'] == 0) return null;
            $issued_at = strtotime(date('Y-m-d H:i:s', strtotime($entry['issued_at']))) * 1000;
            $value = floatval($entry["y_inch"]);
            return [$issued_at, $value];
        }, $trials);

        $y_inch = array_values(array_filter($y_inch));

        $lab_tests = $this->LabTest_model->list([$wire_id]);

        if (count($trials) == 0) {
            $dashboard = [
                'first_spooling_date' => $this->Trial_model->first_spooling_date($wire['id']),
                'total_number_run' => count($trials_except),
                'total_running_number_hours' => $hours,
                'total_running_number_days' => $days,
                'wire_balances' => $wire['initial_length'] - array_sum(array_column($trials, 'cut_off')),
                'wire_balances_percent' => round((($wire['initial_length'] - array_sum(array_column($trials, 'cut_off'))) / $wire['initial_length']) * 100),
                'current_cut_off_rate' => 0,
                'average_run_duration' => 0,
                'average_tension' => number_format(0),
                'max_tension_applied' => number_format(0, 2),
                'not_exposed_to_well_cond' => $current_not_exposed_to_well_cond,
                'x_inch' => $x_inch,
                'y_inch' => $y_inch,
            ];
        } else {
            $dashboard = [
                'first_spooling_date' => $this->Trial_model->first_spooling_date($wire['id']),
                'total_number_run' => count($trials_except),
                'total_running_number_hours' => $hours,
                'total_running_number_days' => $days,
                'wire_balances' => $wire['initial_length'] - array_sum(array_column($trials, 'cut_off')),
                'wire_balances_percent' => round((($wire['initial_length'] - array_sum(array_column($trials, 'cut_off'))) / $wire['initial_length']) * 100),
                'current_cut_off_rate' => (array_sum(array_column($trials, 'cut_off')) / count($trials)),
                'average_run_duration' => ($hours / count($trials)),
                'average_tension' => number_format((array_sum(array_column($trials, 'max_pull')) / count($trials))),
                'max_tension_applied' => number_format(($this->Trial_model->max_tension() / count($trials)) * 100, 2),
                'not_exposed_to_well_cond' => $current_not_exposed_to_well_cond,
                'x_inch' => $x_inch,
                'y_inch' => $y_inch,
            ];
        }

        $this->load->view('general/index', compact('page', 'wire', 'trials', 'dashboard', 'job_types', 'wells', 'clients', 'wire_name', 'lab_tests'));
    }

    public function materialCertifications($wire_name)
    {
        if (is_authed() == false) {
            go_to_auth(base_url($wire_name . "/login"));
            redirect(LOGIN_URL);
        }
        $wire = $this->Wire_model->dashboard($wire_name);
        $wire_id = $wire['id'];
        $wire = $this->Wire_model->details($wire_id);

        if (!is_null($wire['material_certifications'])) {
            $base64_material_ceritification = base64_encode(file_get_contents(temp_url($wire['material_certifications'])));
        } else {
            $base64_material_ceritification = null;
        }

        if (!is_null($wire['tech_sheet'])) {
            $base64_eddy_current = base64_encode(file_get_contents(temp_url($wire['tech_sheet'])));
        } else {
            $base64_eddy_current = null;
        }

        $page = [
            'title' => $this->title,
            'subtitle' => "Wire's Material Certifications",
            'view' => 'dashboards/material-certifications',
        ];


        $this->load->view('general/index', compact('page', 'wire', 'base64_material_ceritification', 'base64_eddy_current', 'wire_name'));
    }

    public function otherReports($wire_name)
    {
        if (is_authed() == false) {
            go_to_auth(base_url($wire_name . "/login"));
            redirect(LOGIN_URL);
        }

        $wire = $this->Wire_model->dashboard($wire_name);
        $wire_id = $wire['id'];
        $page = [
            'title' => $this->title,
            'subtitle' => "Wire's Inspection and Other Reports",
            'view' => 'dashboards/other-reports',
        ];

        $wire = $this->Wire_model->details($wire_id);
        $reports = $this->Report_model->list([$wire_id]);

        $this->load->view('general/index', compact('page', 'wire', 'reports', 'wire_name'));
    }

    public function thirdPartyData($wire_name, $prefix = "mhsi_")
    {
        if ($this->input->get('smart_monitor')) {
            $smart_monitor_id = decode($this->input->get('smart_monitor'));
        } else {
            $smart_monitor_id = null;
        }

        if (is_authed() == false) {
            go_to_auth(base_url($wire_name . "/login"));
            redirect(LOGIN_URL);
        }

        $wire = $this->Wire_model->dashboard($wire_name);
        $wire_id = $wire['id'];
        $page = [
            'title' => $this->title,
            'subtitle' => "Wire's 3rd Party Data",
            'view' => 'dashboards/third-party-data',
            'scripts' => 'dashboards/scripts2'
        ];

        $smart_monitors = $this->Smart_monitor_model->list($wire_id);

        foreach ($smart_monitors as $key => $smart_monitor) {
            $smart_monitors[$key]['trial'] = $this->Trial_model->details($smart_monitor['id']);
        }

        $wire = $this->Wire_model->details($wire_id);

        if (!is_null($smart_monitor_id)) {
            $third_party_data = $this->ThirdPartyData_model->list($smart_monitor_id);

            $tension = array_map(function ($entry) use ($prefix) {
                $issued_at = strtotime(date('Y-m-d H:i:s', strtotime($entry['issued_at']))) * 1000;
                $value = floatval($entry[$prefix . "tension"]);
                return [$issued_at, $value];
            }, $third_party_data);
            $tension = array_values($tension);

            $speed = array_map(function ($entry) use ($prefix) {
                $issued_at = strtotime(date('Y-m-d H:i:s', strtotime($entry['issued_at']))) * 1000;
                $value = floatval($entry[$prefix . "speed"]);
                return [$issued_at, $value];
            }, $third_party_data);
            $speed = array_values($speed);

            $depth = array_map(function ($entry) use ($prefix) {
                $issued_at = strtotime(date('Y-m-d H:i:s', strtotime($entry['issued_at']))) * 1000;
                $value = floatval($entry[$prefix . "depth"]);
                return [$issued_at, $value];
            }, $third_party_data);
            $depth = array_values($depth);
        } else {
            $third_party_data = null;
            $tension = [];
            $speed = [];
            $depth = [];
        }

        $this->load->view('general/index', compact('page', 'wire', 'tension', 'speed', 'depth', 'third_party_data', 'prefix', 'smart_monitors', 'smart_monitor_id', 'wire_name'));
    }

    public function ajax($wire_id)
    {
        $wire_id = decode($wire_id);

        $columns = [
            'issued_at' => 'trials.issued_at',
            'operator_name' => 'operators.name',
            'assistant1_name' => 'assistant1.name',
            'assistant2_name' => 'assistant1.name',
            'assistant3_name' => 'assistant1.name',
            'supervisor_name' => 'trials.supervisor_name',
            'client_name' => 'clients.name',
            'package_name' => 'packages.name',
            'drum_name' => 'drums.name',
            'job_type_name' => 'job_types.name',
            'wrap_test' => 'trials.wrap_test',
            'pull_test' => 'trials.pull_test',
            'x_inch' => 'trials.x_inch',
            'y_inch' => 'trials.y_inch',
            'cut_off' => 'trials.cut_off',
            'well_name' => 'wells.name',
            'jar_number' => 'trials.jar_number',
            'max_pull' => 'trials.max_pull',
            'max_depth' => 'trials.max_depth',
            'duration' => 'trials.duration',
            'smart_monitor_name' => 'smart_monitors.name',
            'smart_monitor_url' => 'smart_monitors.url',
            'remarks' => 'trials.remarks',
            'job_status' => 'trials.job_status',
        ];

        // $results = $this->Trial_model->list_ajax([$wire_id], null, $columns, null, 1000, 0, 'trials.id', 'ASC');
        // echo '<script>console.table(' . json_encode($results) . ')</script>';
        // return;

        $valuesArray = array_values($columns);

        $limit = $this->input->post('length');
        $start = $this->input->post('start');
        $direction = $this->input->post('order')[0]['dir'];
        $search = $this->input->post('search')['value'];
        if ($this->input->post('order')[0]['column'] != 0) {
            $order = $valuesArray[$this->input->post('order')[0]['column']];
            $direction = $this->input->post('order')[0]['dir'];
        } else {
            $order = 'trials.id';
            $direction = 'desc';
        }

        $results = $this->Trial_model->list_ajax([$wire_id], null, $columns, $search, $limit, $start, $order, $direction);

        $count = $this->Trial_model->list_ajax_count([$wire_id], $columns, $search);

        foreach ($results as $key => $result) {
            $results[$key]['hash_id'] = encode($result['id']);
            $results[$key]['issued_at'] = date('d M Y', strtotime($result['issued_at']));
            $results[$key]['actions'] = '<a href="' . base_url('wires/' . encode($result['wire_id']) . '/trials/' . encode($result['id'])) . '" class="view mx-2">View</a><a href="' . base_url('wires/' . encode($result['wire_id']) . '/trials/edit/' . encode($result['id'])) . '" class="edit mx-2">Edit</a>';
        }

        $json_data = array(
            "draw"            => intval($this->input->post('draw')),
            "recordsTotal"    => $count,
            "recordsFiltered" => $count,
            "data"            => $results,
        );

        echo json_encode($json_data);
        die;
    }
}

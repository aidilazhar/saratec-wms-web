<?php
defined('BASEPATH') or exit('No direct script access allowed');
header("Access-Control-Allow-Methods: GET, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Content-Length, Accept-Encoding");

class Wire extends CI_Controller
{
    function __construct()
    {
        $this->title = "Wires";
        parent::__construct();
        if (is_logged_in() == false) {
            logout();
            redirect(base_url(LOGIN_URL));
        }

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
        $this->load->model('LabTest_model');
    }

    public function index()
    {
        $page = [
            'title' => $this->title,
            'subtitle' => "Wires Listing",
            'view' => 'wires/index',
            'back' => null,
        ];

        $wires = $this->Wire_model->list();

        $this->load->view('master/index', compact('page', 'wires'));
    }

    public function create()
    {
        $drums = $this->Drum_model->list();
        $packages = $this->Package_model->list();
        $companies = $this->Company_model->list();

        if (!empty($companies)) {
            $clients = $this->Client_model->list($companies[0]['id']);
        } else {
            $clients = [];
        }

        $page = [
            'title' => $this->title,
            'subtitle' => "Create Wire",
            'view' => 'wires/create',
            'back' => base_url("wires"),
            'scripts' => 'wires/scripts',
        ];

        $this->load->view('master/index', compact('page', 'drums', 'packages', 'companies', 'clients'));
    }

    public function store()
    {
        $data = $this->input->post();
        $wire_id = $this->Wire_model->store($data);

        if (isset($_FILES['material_certifications']) && !empty($_FILES['material_certifications'])) {
            $path = 'wires/' . $wire_id;

            $this->Utility_model->mkdir($path);
            $config['upload_path'] = 'temp/' . $path;
            $config['allowed_types'] = 'pdf';
            $config['file_name'] = 'material-certifications';
            $config['max_size'] = 10000000;
            $config['overwrite'] = TRUE;

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('material_certifications')) {
                $error = array('error' => $this->upload->display_errors());

                $material_certifications_data = [
                    'name' => null,
                    'url' => null,
                ];
            } else {
                $upload_data = array('upload_data' => $this->upload->data());
                $material_certifications_data = [
                    'name' => $upload_data['upload_data']['file_name'],
                    'url' => $path . '/' . $upload_data['upload_data']['file_name'],
                ];
            }
        } else {
            $material_certifications_data = [
                'name' => null,
                'url' => null,
            ];
        }

        $config = [];

        if (isset($_FILES['tech_sheet']) && !empty($_FILES['tech_sheet'])) {
            $path = 'wires/' . $wire_id;

            $this->Utility_model->mkdir($path);
            $config['upload_path'] = 'temp/' . $path;
            $config['allowed_types'] = 'pdf';
            $config['file_name'] = 'tech-sheet';
            $config['max_size'] = 10000000;
            $config['overwrite'] = TRUE;

            $this->load->library('upload', $config);
            $this->upload->initialize($config);

            if (!$this->upload->do_upload('tech_sheet')) {
                $error = array('error' => $this->upload->display_errors());

                $tech_sheet_data = [
                    'name' => null,
                    'url' => null,
                ];
            } else {
                $upload_data = array('upload_data' => $this->upload->data());
                $tech_sheet_data = [
                    'name' => $upload_data['upload_data']['file_name'],
                    'url' => $path . '/' . $upload_data['upload_data']['file_name'],
                ];
            }
        } else {
            $tech_sheet_data = [
                'name' => null,
                'url' => null,
            ];
        }

        $data = [];
        $data['material_certifications'] = $material_certifications_data['url'];
        $data['tech_sheet'] = $tech_sheet_data['url'];

        $results = $this->Wire_model->update($wire_id, $data);

        //redirect(base_url("wires"));
    }

    public function edit($wire_id)
    {
        $wire_id = decode($wire_id);
        $page = [
            'title' => $this->title,
            'subtitle' => "Edit Wire",
            'view' => 'wires/edit',
            'back' => base_url("wires"),
        ];

        $wire = $this->Wire_model->details($wire_id);
        $drums = $this->Drum_model->list();
        $packages = $this->Package_model->list();
        $companies = $this->Company_model->list();
        $clients = $this->Client_model->list($wire['company_id']);

        $this->load->view('master/index', compact('page', 'wire', 'drums', 'packages', 'companies', 'clients'));
    }

    public function update($wire_id)
    {
        $wire_id = decode($wire_id);
        $data = $this->input->post();

        if (isset($_FILES['material_certifications']) && !empty($_FILES['material_certifications'])) {
            $path = 'wires/' . $wire_id;

            $this->Utility_model->mkdir($path);
            $config['upload_path'] = 'temp/' . $path;
            $config['allowed_types'] = 'pdf|png|jpg|jpeg';
            $config['file_name'] = 'material-certifications';
            $config['max_size'] = 10000000;
            $config['overwrite'] = TRUE;

            $this->load->library('upload', $config);
            $this->upload->initialize($config);

            if (!$this->upload->do_upload('material_certifications')) {
            } else {
                $upload_data = array('upload_data' => $this->upload->data());
                $material_certifications_data = [
                    'name' => $upload_data['upload_data']['file_name'],
                    'url' => $path . '/' . $upload_data['upload_data']['file_name'],
                ];
            }
        } else {
            $material_certifications_data = [
                'name' => null,
                'url' => null,
            ];
        }

        $config = [];

        if (isset($_FILES['tech_sheet']) && !empty($_FILES['tech_sheet'])) {
            $path = 'wires/' . $wire_id;

            $this->Utility_model->mkdir($path);
            $config['upload_path'] = 'temp/' . $path;
            $config['allowed_types'] = 'pdf|png|jpg|jpeg';
            $config['file_name'] = 'tech-sheet';
            $config['max_size'] = 10000000;
            $config['overwrite'] = TRUE;

            $this->load->library('upload', $config);
            $this->upload->initialize($config);

            if (!$this->upload->do_upload('tech_sheet')) {
            } else {
                $upload_data = array('upload_data' => $this->upload->data());
                $tech_sheet_data = [
                    'name' => $upload_data['upload_data']['file_name'],
                    'url' => $path . '/' . $upload_data['upload_data']['file_name'],
                ];
            }
        } else {
            $tech_sheet_data = [
                'name' => null,
                'url' => null,
            ];
        }

        if (!is_null($material_certifications_data['url'])) {
            $data['material_certifications'] = $material_certifications_data['url'];
        }

        if (!is_null($tech_sheet_data['url'])) {
            $data['tech_sheet'] = $tech_sheet_data['url'];
        }

        $results = $this->Wire_model->update($wire_id, $data);

        redirect(base_url("wires"));
    }

    public function show($wire_id)
    {
        $wire_id = decode($wire_id);
        $page = [
            'title' => $this->title,
            'subtitle' => "Wire Details",
            'view' => 'wires/show',
            'back' => base_url("wires"),
        ];

        $wire = $this->Wire_model->details($wire_id);
        $drum = $this->Drum_model->details($wire['drum_id']);
        $package = $this->Package_model->details($wire['drum_id']);
        $client = $this->Client_model->details($wire['drum_id']);
        $company = $this->Company_model->details($client['company_id']);

        $this->load->view('master/index', compact('page', 'wire', 'drum', 'package', 'company', 'client'));
    }

    public function delete($wire_id)
    {
        $wire_id = decode($wire_id);
        $this->Wire_model->delete($wire_id);
        redirect(base_url("wires"));
    }

    public function dashboard($wire_id, $from = 'wire')
    {
        if ($from == 'wire') {
            $back = base_url('wires');
        } else {
            $back = base_url("");
        }

        $wire_id = decode($wire_id);
        $wire = $this->Wire_model->details($wire_id);

        // print_r($wire);
        // return;
        $page = [
            'title' => $this->title,
            'subtitle' => "Wire Details",
            'view' => 'wires/dashboards/index',
            'back' => $back,
            'scripts' => 'wires/dashboards/scripts'
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

        $clients = array_unique($clients);

        $clients = $this->Client_model->list(null, [
            'id' => $clients
        ]);

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

        $this->load->view('master/index', compact('page', 'wire', 'trials', 'dashboard', 'job_types', 'wells', 'clients', 'lab_tests', 'from'));
    }

    public function materialCertifications($wire_id, $from = 'wire')
    {
        if ($from == 'wire') {
            $back = base_url('wires');
        } else {
            $back = base_url("");
        }

        $wire_id = decode($wire_id);
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
            'view' => 'wires/dashboards/material-certifications',
            'back' => $back,
        ];


        $this->load->view('master/index', compact('page', 'wire', 'base64_material_ceritification', 'base64_eddy_current', 'from'));
    }

    public function otherReports($wire_id, $from = 'wire')
    {
        if ($from == 'wire') {
            $back = base_url('wires');
        } else {
            $back = base_url("");
        }

        $wire_id = decode($wire_id);
        $page = [
            'title' => $this->title,
            'subtitle' => "Wire's Inspection and Other Reports",
            'view' => 'wires/dashboards/other-reports',
            'back' => $back,
        ];

        $wire = $this->Wire_model->details($wire_id);
        $reports = $this->Report_model->list([$wire_id]);

        $this->load->view('master/index', compact('page', 'wire', 'reports', 'from'));
    }

    public function thirdPartyData($wire_id, $prefix, $from = 'wire')
    {
        if ($from == 'wire') {
            $back = base_url('wires');
        } else {
            $back = base_url("");
        }

        $wire_id = decode($wire_id);
        $page = [
            'title' => $this->title,
            'subtitle' => "Wire's 3rd Party Data",
            'view' => 'wires/dashboards/third-party-data',
            'back' => $back,
            'scripts' => 'wires/dashboards/scripts2'
        ];

        $wire = $this->Wire_model->details($wire_id);
        $third_party_data = $this->ThirdPartyData_model->list($wire_id);

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

        $this->load->view('master/index', compact('page', 'wire', 'tension', 'speed', 'depth', 'third_party_data', 'prefix', 'from'));
    }
}

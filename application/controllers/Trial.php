<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Trial extends CI_Controller
{
    function __construct()
    {
        $this->title = "Wire Usage Record";
        parent::__construct();
        if (is_logged_in() == false) {
            logout();
            redirect(LOGIN_URL);
        }

        $this->load->model('Wire_model');
        $this->load->model('Authentication_model');
        $this->load->model('Trial_model');
        $this->load->model('User_model');
        $this->load->model('Company_model');
        $this->load->model('Package_model');
        $this->load->model('JobType_model');
        $this->load->model('Drum_model');
        $this->load->model('Client_model');
        $this->load->model('Smart_monitor_model');
        $this->load->model('Well_model');
        $this->load->model('Shift_model');
        $this->load->model('ThirdPartyData_model');
    }

    public function index($wire_id)
    {
        $wire_id = decode($wire_id);
        $wire = $this->Wire_model->details($wire_id);
        $page = [
            'title' => $this->title . "(" . $wire['name'] . ")",
            'subtitle' => "Wire Usage Record Listing",
            'view' => 'trials/index',
            'back' => base_url("wires"),
            'scripts' => 'trials/scripts'
        ];

        $trials = $this->Trial_model->list([$wire_id]);

        $this->load->view('master/index', compact('page', 'trials', 'wire_id', 'wire'));
    }

    public function create($wire_id)
    {
        $wire_id = decode($wire_id);
        $wire = $this->Wire_model->details($wire_id);
        $page = [
            'title' => $this->title . "(" . $wire['name'] . ")",
            'subtitle' => "Create Wire Usage Record",
            'view' => 'trials/create',
            'back' => base_url("wires/" . encode($wire_id) . "/trials"),
            'scripts' => 'trials/scripts'
        ];

        $last_entry = $this->Trial_model->last_entry($wire_id);

        if (!empty($last_entry)) {
            $last_supervisor = $last_entry['supervisor_name'];
        } else {
            $last_supervisor = "";
        }

        $operators = $this->User_model->list([], [ROLE_OPERATOR]);
        $assistants = $this->User_model->list([], [ROLE_OPERATOR_ASSISTANT]);
        $company = $this->Company_model->details($wire['company_id']);
        $clients = $this->Client_model->list($company['id']);
        $packages = $this->Package_model->list();
        $wells = $this->Well_model->list();
        $job_types = $this->JobType_model->list();
        $drums = $this->Drum_model->list();

        $package = $this->Package_model->details($wire['package_id']);
        $shift = $this->Package_model->details($wire['package_id']);

        $shift_day = $this->Shift_model->details($package['id'], 'day');
        $shift_night = $this->Shift_model->details($package['id'], 'night');
        $has_shift_night = true;

        if ($shift_night == null) {
            $has_shift_night = false;
            $shift_night = [
                'operator_id' => null,
                'assistant1_id' => null,
                'assistant2_id' => null,
                'assistant3_id' => null,
            ];
        }

        $this->load->view('master/index', compact('page', 'last_supervisor', 'operators', 'clients', 'packages', 'job_types', 'drums', 'wire_id', 'wire', 'wells', 'package', 'assistants', 'shift_day', 'shift_night', 'has_shift_night'));
    }

    public function store($wire_id)
    {
        $wire_id = decode($wire_id);
        $data = $this->input->post();
        $error = [];

        $issued_at = $data['issued_at'];
        $operator_id = $data['operator_id'];
        $assistant1_id = $data['operator_id'];
        $assistant2_id = $data['assistant2_id'];
        $assistant3_id = $data['assistant3_id'];
        $supervisor_name = $data['supervisor_name'];
        $client_id = $data['client_id'];
        $package_id = $data['package_id'];
        $drum_id = $data['drum_id'];
        $wrap_test = $data['wrap_test'];
        $pull_test = $data['pull_test'];
        $x_inch = $data['x_inch'];
        $y_inch = $data['x_inch'];
        $cut_off = $data['cut_off'];

        $well_name = $data['well_prefix'] . '-' . $data['well_postfix'];

        $well = $this->Well_model->search([
            [
                'column' => 'name',
                'value' => $well_name
            ]
        ]);

        if (!empty($well)) {
            $well_id = $well['id'];
        } else {
            $well_id = $this->Well_model->store(['name' => $well_name]);
        }

        $files = $_FILES;
        $i = 0;

        foreach ($data['job_type_id'] as $key => $job_type_id) {
            $inputs = compact('issued_at', 'operator_id', 'supervisor_name', 'client_id', 'package_id', 'drum_id', 'wrap_test', 'pull_test', 'x_inch', 'y_inch', 'cut_off', 'well_id', 'assistant1_id', 'assistant2_id', 'assistant3_id');
            $inputs['job_type_id'] = $job_type_id;
            $inputs['jar_number'] = $data['jar_number'][$key];
            $inputs['max_pull'] = $data['max_pull'][$key];
            $inputs['max_depth'] = $data['max_depth'][$key];
            $inputs['duration'] = $data['duration'][$key];
            $inputs['remarks'] = $data['remarks'][$key];
            $inputs['job_status'] = $data['job_status'][$key];
            $inputs['smart_monitor_hidden'] = $data['smart_monitor_hidden'][$key];

            if ($inputs['smart_monitor_hidden'] == 1) {
                $path = 'wires/' . $wire_id . '/smart_monitors';

                $this->Utility_model->mkdir($path);
                $config['upload_path']          = 'temp/' . $path;
                $config['allowed_types']        = 'csv|xlsx';
                $config['file_name']        = $this->Smart_monitor_model->lastEntry() + 1;
                $config['max_size']             = 10000000;

                // Loop through each file and upload them
                $_FILES['smart_monitor_csv']['name'] = $files['smart_monitor_csv']['name'][$i];
                $_FILES['smart_monitor_csv']['type'] = $files['smart_monitor_csv']['type'][$i];
                $_FILES['smart_monitor_csv']['tmp_name'] = $files['smart_monitor_csv']['tmp_name'][$i];
                $_FILES['smart_monitor_csv']['error'] = $files['smart_monitor_csv']['error'][$i];
                $_FILES['smart_monitor_csv']['size'] = $files['smart_monitor_csv']['size'][$i];

                // Initialize the Upload library with the configuration
                $this->load->library('upload', $config);
                $this->upload->initialize($config);

                // Upload the file
                if ($this->upload->do_upload('smart_monitor_csv')) {
                    $upload_data = array('upload_data' => $this->upload->data());
                    $smart_monitor_data = [
                        'name' => $upload_data['upload_data']['file_name'],
                        'url' => $path . '/' . $upload_data['upload_data']['file_name'],
                        'wire_id' => $wire_id,
                    ];

                    $smart_monitor_id = $this->Smart_monitor_model->store($smart_monitor_data);
                    $inputs['smart_monitor_id'] = $smart_monitor_id;

                    $auth = auth();
                    $created_by = $auth->id;

                    $csvFilePath = $path . '/' . $upload_data['upload_data']['file_name'];
                    $this->thirdPartyStore(temp_url($csvFilePath), $smart_monitor_id, $wire_id, $created_by);
                } else {
                    $error[] = array('error' => $this->upload->display_errors());
                }
                $i++;
            }

            $inputs['wire_id'] = $wire_id;
            $inputs['operator_id'] = auth()->id;

            unset($inputs['smart_monitor']);
            unset($inputs['smart_monitor_hidden']);

            $res = $this->Trial_model->store($inputs);
        }

        if (!empty($error)) {
            print_r($error);
            return;
        }

        delete_temporary_files('temp/wires/' . $wire_id . '/smart_monitors');

        redirect("wires/" . encode($wire_id) . "/trials");
    }

    public function store_old($wire_id)
    {
        $wire_id = decode($wire_id);
        $data = $this->input->post();

        if (isset($data['smart_monitor'])) {
            $is_smart_monitor = $data['smart_monitor'];
            unset($data['smart_monitor']);
        } else {
            $is_smart_monitor = 'off';
        }

        if ($is_smart_monitor == 'on') {
            $path = 'wires/' . $wire_id . '/smart_monitors';

            $this->Utility_model->mkdir('temp/' . $path);
            $config['upload_path']          = 'temp/' . $path;
            $config['allowed_types']        = 'csv|xlsx';
            $config['file_name']        = $this->Smart_monitor_model->lastEntry() + 1;
            $config['max_size']             = 10000000;

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('smart_monitor_csv')) {
                $error = array('error' => $this->upload->display_errors());
            } else {
                $upload_data = array('upload_data' => $this->upload->data());
                $smart_monitor_data = [
                    'name' => $upload_data['upload_data']['file_name'],
                    'url' => $path . '/' . $upload_data['upload_data']['file_name'],
                ];

                $smart_monitor_id = $this->Smart_monitor_model->store($smart_monitor_data);
                $data['smart_monitor_id'] = $smart_monitor_id;
            }
        }

        $data['wire_id'] = $wire_id;
        $data['operator_id'] = auth()->id;

        $res = $this->Trial_model->store($data);

        redirect("wires/" . encode($wire_id) . "/trials");
    }

    public function edit($wire_id, $trial_id)
    {
        $wire_id = decode($wire_id);
        $trial_id = decode($trial_id);
        $wire = $this->Wire_model->details($wire_id);
        $page = [
            'title' => $this->title . "(" . $wire['name'] . ")",
            'subtitle' => "Wire Details",
            'view' => 'trials/edit',
            'back' => base_url("wires/" . encode($wire_id) . "/trials"),
            'scripts' => 'trials/scripts'
        ];

        $operators = $this->User_model->list([], [ROLE_OPERATOR]);
        $assistants = $this->User_model->list([], [ROLE_OPERATOR_ASSISTANT]);
        $clients = $this->Client_model->list($wire['company_id']);
        $packages = $this->Package_model->list();
        $job_types = $this->JobType_model->list();
        $drums = $this->Drum_model->list();
        $wells = $this->Well_model->list();

        $trial = $this->Trial_model->details($trial_id);

        $package = $this->Package_model->details($wire['package_id']);
        $shift = $this->Package_model->details($wire['package_id']);

        $shift_day = $this->Shift_model->details($package['id'], 'day');
        $shift_night = $this->Shift_model->details($package['id'], 'night');
        $has_shift_night = true;

        if ($shift_night == null) {
            $has_shift_night = false;
            $shift_night = [
                'operator_id' => null,
                'assistant1_id' => null,
                'assistant2_id' => null,
                'assistant3_id' => null,
            ];
        }

        if ($trial['shift'] == 'day') {
            $selected_shift = $shift_day;
        } else {
            $selected_shift = $shift_day;
        }

        $this->load->view('master/index', compact('page', 'operators', 'clients', 'packages', 'job_types', 'drums', 'wire_id', 'trial', 'wells', 'shift_day', 'shift_night', 'has_shift_night', 'assistants', 'selected_shift'));
    }

    public function update($wire_id, $trial_id)
    {
        $wire_id = decode($wire_id);
        $trial_id = decode($trial_id);
        $data = $this->input->post();

        if (isset($data['smart_monitor'])) {
            $is_smart_monitor = $data['smart_monitor'];
            unset($data['smart_monitor']);
        } else {
            $is_smart_monitor = 'off';
        }

        if ($is_smart_monitor == 'on') {
            $path = 'wires/' . $wire_id . '/smart_monitors/';

            $this->Utility_model->mkdir('temp/' . $path);
            $config['upload_path']          = 'temp/' . $path;
            $config['allowed_types']        = 'csv|xlsx';
            $config['file_name']        = $this->Smart_monitor_model->lastEntry() + 1;
            $config['max_size']             = 10000000;

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('smart_monitor_csv')) {
                $error = array('error' => $this->upload->display_errors());
            } else {
                $upload_data = array('upload_data' => $this->upload->data());
                $smart_monitor_data = [
                    'name' => $upload_data['upload_data']['file_name'],
                    'url' => $path . '/' . $upload_data['upload_data']['file_name'],
                ];

                $smart_monitor_id = $this->Smart_monitor_model->store($smart_monitor_data);
                $data['smart_monitor_id'] = $smart_monitor_id;
            }
        }

        $data['wire_id'] = $wire_id;
        $data['operator_id'] = auth()->id;
        $data['issued_at'] = date('Y-m-d h:i:s', strtotime($data['issued_at']));
        delete_temporary_files('temp/wires/' . $wire_id . '/smart_monitors');

        $res = $this->Trial_model->update($trial_id, $data);


        redirect("wires/" . encode($wire_id) . "/trials");
    }

    public function show($wire_id, $trial_id)
    {
        $wire_id = decode($wire_id);
        $trial_id = decode($trial_id);
        $wire = $this->Wire_model->details($wire_id);
        $page = [
            'title' => $this->title . "(" . $wire['name'] . ")",
            'subtitle' => "Wire Details",
            'view' => 'trials/show',
            'back' => base_url("wires/" . encode($wire_id) . "/trials"),
        ];

        $operators = $this->User_model->list([], [ROLE_OPERATOR]);
        $clients = $this->Client_model->list($wire['company_id']);
        $packages = $this->Package_model->list();
        $job_types = $this->JobType_model->list();
        $drums = $this->Drum_model->list();
        $wells = $this->Well_model->list();

        $trial = $this->Trial_model->details($trial_id);

        $this->load->view('master/index', compact('page', 'operators', 'clients', 'packages', 'job_types', 'drums', 'wire_id', 'trial', 'wells'));
    }

    public function delete($wire_id, $trial_id)
    {
        $trial_id = decode($trial_id);
        $wire_id = decode($wire_id);
        $this->Trial_model->delete($trial_id);
        redirect("wires/" . encode($wire_id) . "/trials");
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

        $valuesArray = array_values($columns);

        $limit = $this->input->post('length');
        $start = $this->input->post('start');
        $direction = $this->input->post('order')[0]['dir'];
        $search = $this->input->post('search')['value'];
        if ($this->input->post('order')[0]['column'] != 0) {
            $order = $valuesArray[$this->input->post('order')[0]['column'] - 1];
            $direction = $this->input->post('order')[0]['dir'];
        } else {
            $order = 'trials.issued_at';
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

    public function thirdPartyStore($path, $smart_monitor_id, $wire_id, $created_by)
    {
        $open = fopen($path, "r");

        while (($data = fgetcsv($open, 0, ",")) !== FALSE) {
            $array[] = $data;
        }

        fclose($open);
        unset($array[0]);

        foreach ($array as $key => $arr) {
            $dateTime = DateTime::createFromFormat("d-m-Y-H:i:s", $arr[0]);
            $date = $dateTime->format("Y-m-d H:i:s");

            $data = [
                'wire_id' => $wire_id,
                'smart_monitor_id' => $smart_monitor_id,
                'created_by' => $created_by,
                'issued_at' => $date,
                'mhsi_tension' => $arr[1],
                'mhsi_depth' => $arr[3],
                'mhsi_speed' => $arr[5],
                'mhi_tension' => $arr[2],
                'mhi_depth' => $arr[4],
                'mhi_speed' => $arr[6],
            ];

            $this->ThirdPartyData_model->store($data);
        }
    }
}

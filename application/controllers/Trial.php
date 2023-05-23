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
            redirect(base_url(LOGIN_URL));
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
    }

    public function index($wire_id)
    {
        $wire_id = decode($wire_id);
        $wire = $this->Wire_model->details($wire_id);
        $page = [
            'title' => $this->title . "(" . $wire['name'] . ")",
            'subtitle' => "Wire Usage Record Listing",
            'view' => 'trials/index',
            'back' => null,
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
        ];

        $last_entry = $this->Trial_model->last_entry($wire_id);

        if (!empty($last_entry)) {
            $last_supervisor = $last_entry['supervisor_name'];
        } else {
            $last_supervisor = "";
        }

        $operators = $this->User_model->list([], [ROLE_OPERATOR]);
        $company = $this->Company_model->details($wire['company_id']);
        $clients = $this->Client_model->list($company['id']);
        $packages = $this->Package_model->list();
        $wells = $this->Well_model->list();
        $job_types = $this->JobType_model->list();
        $drums = $this->Drum_model->list();

        $this->load->view('master/index', compact('page', 'last_supervisor', 'operators', 'clients', 'packages', 'job_types', 'drums', 'wire_id', 'wire', 'wells'));
    }

    public function store($wire_id)
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

        redirect(base_url("wires/" . encode($wire_id) . "/trials"));
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

        $res = $this->Trial_model->update($trial_id, $data);
        redirect(base_url("wires/" . encode($wire_id) . "/trials"));
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
        redirect(base_url("wires/" . encode($wire_id) . "/trials"));
    }
}

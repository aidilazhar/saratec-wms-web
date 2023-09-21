<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Package extends CI_Controller
{
    function __construct()
    {
        $this->title = "Packages";
        parent::__construct();
        if (is_logged_in() == false) {
            logout();
            redirect(LOGIN_URL);
        }

        $this->load->model('Authentication_model');
        $this->load->model('Package_model');
        $this->load->model('Drum_model');
        $this->load->model('Company_model');
        $this->load->model('Client_model');
        $this->load->model('User_model');
        $this->load->model('Shift_model');
    }

    public function index()
    {
        $page = [
            'title' => $this->title,
            'subtitle' => "Packages Listing",
            'view' => 'packages/index',
            'back' => null,
        ];

        $packages = $this->Package_model->list();

        $this->load->view('master/index', compact('page', 'packages'));
    }

    public function create()
    {
        $page = [
            'title' => $this->title,
            'subtitle' => "Create Package",
            'view' => 'packages/create',
            'back' => base_url("packages"),
            'scripts' => 'packages/scripts'
        ];

        $drums = $this->Drum_model->list();
        $packages = $this->Package_model->list();
        $companies = $this->Company_model->list();

        if (!empty($companies)) {
            $clients = $this->Client_model->list($companies[0]['id']);
            $operators = $this->User_model->list([$companies[0]['id']], [ROLE_OPERATOR]);
            $assistants = $this->User_model->list([$companies[0]['id']], [ROLE_OPERATOR_ASSISTANT]);
        } else {
            $clients = $this->Client_model->list();
            $operators = $this->User_model->list([], [ROLE_OPERATOR]);
            $assistants = $this->User_model->list([], [ROLE_OPERATOR_ASSISTANT]);
        }

        $this->load->view('master/index', compact('page', 'packages', 'drums', 'companies', 'clients', 'operators', 'assistants'));
    }

    public function store()
    {
        $data = $this->input->post();
        unset($data['company_id']);
        unset($data['day']);
        unset($data['night']);

        $package_id = $this->Package_model->store($data);

        if ($this->input->post('day')) {
            $day = $this->input->post('day');
            $day['shift'] = 'day';
            $day['package_id'] = $package_id;
            $this->Shift_model->store($day);
        }

        if ($this->input->post('night')) {
            $night = $this->input->post('night');
            $night['shift'] = 'night';
            $night['package_id'] = $package_id;
            $this->Shift_model->store($night);
        }

        redirect("packages");
    }

    public function edit($package_id)
    {
        $package_id = decode($package_id);
        $page = [
            'title' => $this->title,
            'subtitle' => "Edit Package",
            'view' => 'packages/edit',
            'back' => base_url("users"),
            'scripts' => 'packages/scripts'
        ];

        $drums = $this->Drum_model->list();
        $packages = $this->Package_model->list();
        $companies = $this->Company_model->list();

        $package = $this->Package_model->details($package_id);
        $client = $this->Client_model->details($package['client_id']);

        $operators = $this->User_model->list([], [ROLE_OPERATOR]);
        $assistants = $this->User_model->list([], [ROLE_OPERATOR_ASSISTANT]);

        $shift_day = $this->Shift_model->details($package_id, 'day');
        $shift_night = $this->Shift_model->details($package_id, 'night');
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

        if (!empty($companies)) {
            $clients = $this->Client_model->list($companies[0]['id']);
        } else {
            $clients = $this->Client_model->list();
        }

        $this->load->view('master/index', compact('page', 'package', 'drums', 'companies', 'client', 'clients', 'operators', 'assistants', 'shift_day', 'shift_night', 'has_shift_night'));
    }

    public function update($package_id)
    {
        $package_id = decode($package_id);
        $data = $this->input->post();
        unset($data['company_id']);
        unset($data['day']);
        unset($data['night']);

        $this->Package_model->update($package_id, $data);

        $this->Shift_model->delete($package_id);

        if ($this->input->post('day')) {
            $day = $this->input->post('day');
            $day['shift'] = 'day';
            $day['package_id'] = $package_id;
            $this->Shift_model->store($day);
        }

        if ($this->input->post('night')) {
            $night = $this->input->post('night');
            $night['shift'] = 'night';
            $night['package_id'] = $package_id;
            $this->Shift_model->store($night);
        }

        redirect("packages");
    }

    public function show($package_id)
    {
        $package_id = decode($package_id);
        $page = [
            'title' => $this->title,
            'subtitle' => "Package Details",
            'view' => 'packages/show',
            'back' => base_url("packages"),
        ];

        $package = $this->Package_model->details($package_id);

        $this->load->view('master/index', compact('page', 'package'));
    }

    public function delete($package_id)
    {
        $package_id = decode($package_id);
        $this->Package_model->delete($package_id);
        redirect("packages");
    }
}

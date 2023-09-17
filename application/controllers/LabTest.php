<?php
defined('BASEPATH') or exit('No direct script access allowed');

class LabTest extends CI_Controller
{
    function __construct()
    {
        $this->title = "Task Planning";
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
        $this->load->model('LabTest_model');
    }

    public function index($wire_id)
    {
        $wire_id = decode($wire_id);
        $wire = $this->Wire_model->details($wire_id);
        $page = [
            'title' => $this->title . " (" . $wire['name'] . ")",
            'subtitle' => "Task Planning Listing",
            'view' => 'wires/lab-tests/index',
            'back' => base_url("wires"),
        ];

        $lab_tests = $this->LabTest_model->list([$wire_id]);

        $this->load->view('master/index', compact('page', 'lab_tests', 'wire_id', 'wire'));
    }

    public function create($wire_id)
    {
        $wire_id = decode($wire_id);
        $wire = $this->Wire_model->details($wire_id);
        $page = [
            'title' => $this->title . " (" . $wire['name'] . ")",
            'subtitle' => "Create Task Planning",
            'view' => 'wires/lab-tests/create',
            'back' => base_url("wires/" . encode($wire_id) . "/lab-tests"),
        ];

        $this->load->view('master/index', compact('page', 'wire_id'));
    }

    public function store($wire_id)
    {
        $wire_id = decode($wire_id);
        $data = $this->input->post();
        $data['wire_id'] = $wire_id;
        $this->LabTest_model->store($data);
        redirect("wires/" . encode($wire_id) . "/lab-tests");
    }

    public function edit($wire_id, $lab_test_id)
    {
        $lab_test_id = decode($lab_test_id);
        $wire_id = decode($wire_id);
        $page = [
            'title' => $this->title,
            'subtitle' => "Edit Task Planning",
            'view' => 'wires/lab-tests/edit',
            'back' => base_url("wires/" . encode($lab_test_id) . "/lab-tests"),
        ];

        $lab_test = $this->LabTest_model->details($lab_test_id);

        $this->load->view('master/index', compact('page', 'lab_test', 'wire_id'));
    }

    public function update($wire_id, $lab_test_id)
    {
        $lab_test_id = decode($lab_test_id);
        $wire_id = decode($wire_id);
        $data = $this->input->post();
        $this->LabTest_model->update($lab_test_id, $data);
        redirect("wires/" . encode($wire_id) . "/lab-tests");
    }

    public function delete($wire_id, $report_id)
    {
        $report_id = decode($report_id);
        $wire_id = decode($wire_id);
        $this->LabTest_model->delete($report_id);
        redirect("wires/" . encode($wire_id) . "/lab-tests");
    }
}

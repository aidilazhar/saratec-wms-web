<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Report extends CI_Controller
{
    function __construct()
    {
        $this->title = "Report";
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
        $this->load->model('Report_model');
    }

    public function index($wire_id)
    {
        $wire_id = decode($wire_id);
        $wire = $this->Wire_model->details($wire_id);
        $page = [
            'title' => $this->title . "(" . $wire['name'] . ")",
            'subtitle' => "Report Listing",
            'view' => 'wires/reports/index',
            'back' => null,
        ];

        $reports = $this->Report_model->list([$wire_id]);

        $this->load->view('master/index', compact('page', 'reports', 'wire_id', 'wire'));
    }

    public function create($wire_id)
    {
        $wire_id = decode($wire_id);
        $wire = $this->Wire_model->details($wire_id);
        $page = [
            'title' => $this->title . " (" . $wire['name'] . ")",
            'subtitle' => "Create Report",
            'view' => 'wires/reports/create',
            'back' => base_url("wires/" . encode($wire_id) . "/reports"),
        ];

        $this->load->view('master/index', compact('page', 'wire_id'));
    }

    public function store($wire_id)
    {
        $wire_id = decode($wire_id);
        $data = $this->input->post();

        if (isset($_FILES['report']) && !empty($_FILES['report'])) {
            $path = 'wires/' . $wire_id . '/reports';
            $file_name = strtotime("now");
            $file_ext = pathinfo($_FILES["report"]["name"], PATHINFO_EXTENSION);

            $this->Utility_model->mkdir($path);
            $config['upload_path'] = 'temp/' . $path;
            $config['allowed_types'] = '*';
            $config['file_name'] = $file_name;
            $config['max_size'] = 10000000;

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('report')) {
                $error = array('error' => $this->upload->display_errors());
            } else {
                $upload_data = array('upload_data' => $this->upload->data());

                $report_data = [
                    'name' => $upload_data['upload_data']['file_name'],
                    'url' => $path . '/' . $file_name . '.' . $file_ext,
                ];
            }
        }

        $data['wire_id'] = $wire_id;
        $data['url'] = $report_data['url'];

        $res = $this->Report_model->store($data);
        redirect(base_url("wires/" . encode($wire_id) . "/reports"));
    }

    public function delete($wire_id, $report_id)
    {
        $report_id = decode($report_id);
        $wire_id = decode($wire_id);
        $this->Report_model->delete($report_id);
        redirect(base_url("wires/" . encode($wire_id) . "/reports"));
    }
}

<?php
defined('BASEPATH') or exit('No direct script access allowed');

class JobType extends CI_Controller
{
    function __construct()
    {
        $this->title = "Job Types";
        parent::__construct();
        if (is_logged_in() == false) {
            logout();
            redirect(base_url(LOGIN_URL));
        }

        $this->load->model('Authentication_model');
        $this->load->model('JobType_model');
    }

    public function index()
    {
        $page = [
            'title' => $this->title,
            'subtitle' => "Job Types Listing",
            'view' => 'job-types/index',
            'back' => null,
        ];

        $job_types = $this->JobType_model->list();

        $this->load->view('master/index', compact('page', 'job_types'));
    }

    public function create()
    {
        $page = [
            'title' => $this->title,
            'subtitle' => "Create Job Type",
            'view' => 'job-types/create',
            'back' => base_url("job-types"),
        ];

        $this->load->view('master/index', compact('page'));
    }

    public function store()
    {
        $data = $this->input->post();
        $results = $this->JobType_model->store($data);

        redirect(base_url("job-types"));
    }

    public function edit($job_type_id)
    {
        $job_type_id = decode($job_type_id);
        $page = [
            'title' => $this->title,
            'subtitle' => "Edit Job Type",
            'view' => 'job-types/edit',
            'back' => base_url("users"),
        ];

        $job_type = $this->JobType_model->details($job_type_id);

        $this->load->view('master/index', compact('page', 'job_type'));
    }

    public function update($job_type_id)
    {
        $job_type_id = decode($job_type_id);
        $data = $this->input->post();
        $results = $this->JobType_model->update($job_type_id, $data);

        redirect(base_url("job-types"));
    }

    public function show($job_type_id)
    {
        $job_type_id = decode($job_type_id);
        $page = [
            'title' => $this->title,
            'subtitle' => "Job Type Details",
            'view' => 'job-types/show',
            'back' => base_url("job-types"),
        ];

        $job_type = $this->JobType_model->details($job_type_id);

        $this->load->view('master/index', compact('page', 'job_type'));
    }

    public function delete($job_type_id)
    {
        $job_type_id = decode($job_type_id);
        $this->JobType_model->delete($job_type_id);
        redirect(base_url("job-types"));
    }
}

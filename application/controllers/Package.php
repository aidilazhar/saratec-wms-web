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
            redirect(base_url(LOGIN_URL));
        }

        $this->load->model('Authentication_model');
        $this->load->model('Package_model');
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
        ];

        $this->load->view('master/index', compact('page'));
    }

    public function store()
    {
        $data = $this->input->post();
        $results = $this->Package_model->store($data);

        redirect(base_url("packages"));
    }

    public function edit($package_id)
    {
        $package_id = decode($package_id);
        $page = [
            'title' => $this->title,
            'subtitle' => "Edit Package",
            'view' => 'packages/edit',
            'back' => base_url("users"),
        ];

        $package = $this->Package_model->details($package_id);

        $this->load->view('master/index', compact('page', 'package'));
    }

    public function update($package_id)
    {
        $package_id = decode($package_id);
        $data = $this->input->post();
        $results = $this->Package_model->update($package_id, $data);

        redirect(base_url("packages"));
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
        redirect(base_url("packages"));
    }
}

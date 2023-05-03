<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Drum extends CI_Controller
{
    function __construct()
    {
        $this->title = "Drum";
        $this->drums = [
            [
                "id" => 1,
                "name" => "01",
            ],
            [
                "id" => 2,
                "name" => "02",
            ],
            [
                "id" => 3,
                "name" => "03",
            ],
            [
                "id" => 4,
                "name" => "04",
            ],
        ];

        parent::__construct();
        if (is_logged_in() == false) {
            logout();
            redirect(base_url(LOGIN_URL));
        }

        $this->load->model('Authentication_model');
    }

    public function index()
    {
        $page = [
            'title' => $this->title,
            'subtitle' => "Drum Listing",
            'view' => 'drums/index',
            'back' => null,
        ];

        $drums = $this->drums;

        $this->load->view('master/index', compact('page', 'drums'));
    }

    public function create()
    {
        $page = [
            'title' => $this->title,
            'subtitle' => "Create Drum",
            'view' => 'drums/create',
            'back' => base_url("drums"),
        ];

        $drums = $this->drums;

        $this->load->view('master/index', compact('page', 'drums'));
    }

    public function store()
    {
        redirect(base_url("drums"));
    }

    public function edit($user_id)
    {
        $user_id = decode($user_id);
        $page = [
            'title' => $this->title,
            'subtitle' => "Edit Drum",
            'view' => 'drums/edit',
            'back' => base_url("users"),
        ];

        $drum = $this->drums[array_search($user_id, array_column($this->drums, 'id'))];

        $this->load->view('master/index', compact('page', 'drum'));
    }

    public function update()
    {
        redirect(base_url("drums"));
    }

    public function show($package_id)
    {
        $package_id = decode($package_id);
        $page = [
            'title' => $this->title,
            'subtitle' => "Drum Details",
            'view' => 'drums/show',
            'back' => base_url("drums"),
        ];

        $drum = $this->drums[array_search($package_id, array_column($this->drums, 'id'))];

        $this->load->view('master/index', compact('page', 'drum'));
    }

    public function delete()
    {
        redirect(base_url("drums"));
    }
}

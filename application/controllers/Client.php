<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Client extends CI_Controller
{
    function __construct()
    {
        $this->title = "Clients";
        $this->clients = [
            [
                "id" => 1,
                "name" => "VERTIGO",
            ],
            [
                "id" => 2,
                "name" => "EMEPMI",
            ],
            [
                "id" => 3,
                "name" => "SHELL",
            ],
        ];
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->helper('hashids');

        $this->load->model('Authentication_model');
    }

    public function index()
    {
        $page = [
            'title' => $this->title,
            'subtitle' => "Clients Listing",
            'view' => 'clients/index',
            'back' => null,
        ];

        $clients = $this->clients;

        $this->load->view('master/index', compact('page', 'clients'));
    }

    public function create()
    {
        $page = [
            'title' => $this->title,
            'subtitle' => "Create Client",
            'view' => 'clients/create',
            'back' => base_url("clients"),
        ];

        $this->load->view('master/index', compact('page'));
    }

    public function store()
    {
        redirect(base_url("clients"));
    }

    public function edit($user_id)
    {
        $user_id = decode($user_id);
        $page = [
            'title' => $this->title,
            'subtitle' => "Edit Client",
            'view' => 'clients/edit',
            'back' => base_url("users"),
        ];

        $client = $this->clients[array_search($user_id, array_column($this->clients, 'id'))];

        $this->load->view('master/index', compact('page', 'client'));
    }

    public function update()
    {
        redirect(base_url("clients"));
    }

    public function show($package_id)
    {
        $package_id = decode($package_id);
        $page = [
            'title' => $this->title,
            'subtitle' => "Client Details",
            'view' => 'clients/show',
            'back' => base_url("clients"),
        ];

        $client = $this->clients[array_search($package_id, array_column($this->clients, 'id'))];

        $this->load->view('master/index', compact('page', 'client'));
    }

    public function delete()
    {
        redirect(base_url("clients"));
    }
}

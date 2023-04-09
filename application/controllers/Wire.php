<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Wire extends CI_Controller
{
    function __construct()
    {
        $this->title = "Wires";
        $this->wires = [
            [
                "id" => 1,
                "name" => "Wire 1",
                'trial' => [
                    'date' => date('Y-m-d'),
                    'operator_id' => 2,
                    'operator' => [
                        "id" => 2,
                        "name" => "Barry",
                        "username" => "barry",
                        "contact" => rand(100000000, 999999999),
                        'role_id' => 3,
                        "role" => [
                            "id" => 3,
                            "name" => "Operator",
                        ],
                        "status" => "Active",
                        'email' => 'barry@yopmail.com'
                    ],
                    'supervisor_id' => 4,
                    'supervisor' => [
                        "id" => 4,
                        "name" => "David",
                        "username" => "david",
                        "contact" => rand(100000000, 999999999),
                        'role_id' => 2,
                        "role" => [
                            "id" => 2,
                            "name" => "Supervisor",
                        ],
                        "status" => "Inactive",
                        'email' => 'david@yopmail.com'
                    ],
                    'client_id' => 1,
                    'client' => [
                        "id" => 1,
                        "name" => "VESTIGO",
                    ],
                    'package_id' => 2,
                    'package' => [
                        "id" => 2,
                        "name" => "WSU 2",
                    ],
                    'drum_id' => 2,
                    'drum' => [
                        "id" => 2,
                        "name" => "02",
                    ],
                    'wrap_test' => 'pass',
                    'pull_test' => "1,000 - 1,999 lbs",
                    'x_inch' => 1,
                    'y_inch' => 3,
                    'cut_off' => 2,
                    'well_name' => "TUA-14L",
                    'job_type_id' => 14,
                    'job_type' => [
                        "id" => 14,
                        "name" => "FishingOperation",
                    ],
                    'jar_no' => 10,
                    'max_pull' => 2,
                    'is_smart_monitor_logged' => 1,
                    'remark' => "PASS",
                ],
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
            'subtitle' => "Wires Listing",
            'view' => 'wires/index',
            'back' => null,
        ];

        $wires = $this->wires;

        $this->load->view('master/index', compact('page', 'wires'));
    }

    public function create()
    {
        $page = [
            'title' => $this->title,
            'subtitle' => "Create Wire",
            'view' => 'wires/create',
            'back' => base_url("wires"),
        ];

        $this->load->view('master/index', compact('page'));
    }

    public function store()
    {
        redirect(base_url("wires"));
    }

    public function edit($user_id)
    {
        $user_id = decode($user_id);
        $page = [
            'title' => $this->title,
            'subtitle' => "Edit Wire",
            'view' => 'wires/edit',
            'back' => base_url("wires"),
        ];

        $wire = $this->wires[array_search($user_id, array_column($this->wires, 'id'))];

        $this->load->view('master/index', compact('page', 'wire'));
    }

    public function update()
    {
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

        $wire = $this->wires[array_search($wire_id, array_column($this->wires, 'id'))];

        $this->load->view('master/index', compact('page', 'wire'));
    }

    public function delete()
    {
        redirect(base_url("wires"));
    }

    public function dashboard($wire_id)
    {
        $wire_id = decode($wire_id);
        $page = [
            'title' => $this->title,
            'subtitle' => "Wire Details",
            'view' => 'wires/dashboard',
            'back' => base_url("wires"),
        ];

        $wire = $this->wires[array_search($wire_id, array_column($this->wires, 'id'))];

        $this->load->view('master/index', compact('page', 'wire'));
    }
}

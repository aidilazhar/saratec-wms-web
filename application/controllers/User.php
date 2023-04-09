<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    function __construct()
    {
        $this->title = "Users";
        $this->users = [
            [
                "id" => 1,
                "name" => "Ali",
                "username" => "ali",
                "contact" => rand(100000000, 999999999),
                'role_id' => 2,
                "role" => [
                    "id" => 2,
                    "name" => "Supervisor",
                ],
                "status" => "Active",
                'email' => 'ali@yopmail.com'
            ],
            [
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
            [
                "id" => 3,
                "name" => "Charlie",
                "username" => "charlie",
                "contact" => rand(100000000, 999999999),
                'role_id' => 3,
                "role" => [
                    "id" => 3,
                    "name" => "Operator",
                ],
                "status" => "Active",
                'email' => 'charlie@yopmail.com'
            ],
            [
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
            [
                "id" => 5,
                "name" => "Eve",
                "username" => "eve",
                "contact" => rand(100000000, 999999999),
                'role_id' => 1,
                "role" => [
                    "id" => 1,
                    "name" => "Admin",
                ],
                "status" => "Inactive",
                'email' => 'eve@yopmail.com'
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
            'subtitle' => "Users Listing",
            'view' => 'users/index',
            'back' => null,
        ];

        $users = $this->users;

        $this->load->view('master/index', compact('page', 'users'));
    }

    public function create()
    {
        $page = [
            'title' => $this->title,
            'subtitle' => "Create User",
            'view' => 'users/create',
            'back' => base_url("users"),
        ];

        $roles = [
            [
                "id" => 1,
                "name" => "Admin",
            ],
            [
                "id" => 2,
                "name" => "Supervisor",
            ],
            [
                "id" => 3,
                "name" => "Operator",
            ],
        ];


        $this->load->view('master/index', compact('page', 'roles'));
    }

    public function store()
    {
        redirect(base_url("users"));
    }

    public function edit($user_id)
    {
        $user_id = decode($user_id);
        $page = [
            'title' => $this->title,
            'subtitle' => "Edit User",
            'view' => 'users/edit',
            'back' => base_url("users"),
        ];

        $roles = [
            [
                "id" => 1,
                "name" => "Admin",
            ],
            [
                "id" => 2,
                "name" => "Supervisor",
            ],
            [
                "id" => 3,
                "name" => "Operator",
            ],
        ];

        $user = $this->users[array_search($user_id, array_column($this->users, 'id'))];

        $this->load->view('master/index', compact('page', 'user', 'roles'));
    }

    public function update()
    {
        redirect(base_url("users"));
    }

    public function show($user_id)
    {
        $user_id = decode($user_id);
        $page = [
            'title' => $this->title,
            'subtitle' => "User Details",
            'view' => 'users/show',
            'back' => base_url("users"),
        ];

        $roles = [
            [
                "id" => 1,
                "name" => "Admin",
            ],
            [
                "id" => 2,
                "name" => "Supervisor",
            ],
            [
                "id" => 3,
                "name" => "Operator",
            ],
        ];

        $user = $this->users[array_search($user_id, array_column($this->users, 'id'))];

        $this->load->view('master/index', compact('page', 'user', 'roles'));
    }

    public function delete()
    {
        redirect(base_url("users"));
    }
}

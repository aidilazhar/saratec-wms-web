<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Role extends CI_Controller
{
    function __construct()
    {
        $this->title = "Roles";
        $this->roles = [
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
            'subtitle' => "Roles Listing",
            'view' => 'roles/index',
            'back' => null,
        ];

        $roles = $this->roles;

        $this->load->view('master/index', compact('page', 'roles'));
    }

    public function create()
    {
        $page = [
            'title' => $this->title,
            'subtitle' => "Create Role",
            'view' => 'roles/create',
            'back' => base_url("roles"),
        ];

        $this->load->view('master/index', compact('page'));
    }

    public function store()
    {
        redirect(base_url("roles"));
    }

    public function edit($user_id)
    {
        $user_id = decode($user_id);
        $page = [
            'title' => $this->title,
            'subtitle' => "Edit Role",
            'view' => 'roles/edit',
            'back' => base_url("users"),
        ];

        $role = $this->roles[array_search($user_id, array_column($this->roles, 'id'))];

        $this->load->view('master/index', compact('page', 'role'));
    }

    public function update()
    {
        redirect(base_url("roles"));
    }

    public function show($role_id)
    {
        $role_id = decode($role_id);
        $page = [
            'title' => $this->title,
            'subtitle' => "Role Details",
            'view' => 'roles/show',
            'back' => base_url("roles"),
        ];

        $role = $this->roles[array_search($role_id, array_column($this->roles, 'id'))];

        $this->load->view('master/index', compact('page', 'role'));
    }

    public function delete()
    {
        redirect(base_url("roles"));
    }
}

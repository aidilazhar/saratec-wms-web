<?php
defined('BASEPATH') or exit('No direct script access allowed');

class CompanyUser extends CI_Controller
{
    function __construct()
    {
        $this->title = "users";
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
        if (is_logged_in() == false) {
            logout();
            redirect(base_url(LOGIN_URL));
        }

        $this->load->model('Authentication_model');
    }

    public function index($company_id)
    {
        $company_id = decode($company_id);
        $page = [
            'title' => $this->title,
            'subtitle' => "users Listing",
            'view' => 'companies/users/index',
            'back' => base_url("companies"),
        ];

        $users = $this->users;

        $this->load->view('master/index', compact('page', 'company_id', 'users'));
    }

    public function create($company_id)
    {
        $company_id = decode($company_id);
        $page = [
            'title' => $this->title,
            'subtitle' => "Create User",
            'view' => 'companies/users/create',
            'back' => base_url("companies/" . encode($company_id) . '/users'),
        ];

        $this->load->view('master/index', compact('page', 'company_id'));
    }

    public function store($company_id)
    {
        $company_id = decode($company_id);
        redirect(base_url('companies/' . encode($company_id) . '/users'));
    }

    public function edit($company_id, $user_id)
    {
        $company_id = decode($company_id);
        $user_id = decode($user_id);
        $page = [
            'title' => $this->title,
            'subtitle' => "Edit User",
            'view' => 'companies/users/edit',
            'back' => base_url("companies/" . encode($company_id) . '/users'),
        ];

        $user = $this->users[0];

        $this->load->view('master/index', compact('page', 'company_id', 'user'));
    }

    public function update($company_id, $user_id)
    {
        redirect(base_url('companies/' . encode($company_id) . '/users'));
    }

    public function show($company_id, $user_id)
    {
        $company_id = decode($company_id);
        $user_id = decode($user_id);
        $page = [
            'title' => $this->title,
            'subtitle' => "User Details",
            'view' => 'companies/users/show',
            'back' => base_url("companies/" . encode($company_id) . '/users'),
        ];

        $user = $this->users[array_search($user_id, array_column($this->users, 'id'))];


        $this->load->view('master/index', compact('page', 'company_id', 'user'));
    }

    public function delete($company_id, $user_id)
    {
        $company_id = decode($company_id);
        $user_id = decode($user_id);
        redirect(base_url('companies/' . encode($company_id) . '/users'));
    }
}

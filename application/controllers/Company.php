<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Company extends CI_Controller
{
    function __construct()
    {
        $this->title = "Company";
        $this->companies = [
            [
                "id" => 1,
                "name" => "VERTIGO",
                'clients' => [
                    [
                        'id' => 1,
                        'name' => 'Petronas',
                    ],
                    [
                        'id' => 2,
                        'name' => 'Oil',
                    ],
                    [
                        'id' => 3,
                        'name' => 'Gas',
                    ],
                ]
            ],
            [
                "id" => 2,
                "name" => "EMEPMI",
                'clients' => [
                    [
                        'id' => 4,
                        'name' => 'Petron',
                    ],
                    [
                        'id' => 5,
                        'name' => 'Caltex',
                    ],
                ]
            ],
            [
                "id" => 3,
                "name" => "SHELL",
                'clients' => [
                    [
                        'id' => 4,
                        'name' => 'FIVE',
                    ],
                    [
                        'id' => 5,
                        'name' => 'Caltex',
                    ],
                ]
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
            'subtitle' => "Company Listing",
            'view' => 'companies/index',
            'back' => null,
        ];

        $companies = $this->companies;

        $this->load->view('master/index', compact('page', 'companies'));
    }

    public function create()
    {
        $page = [
            'title' => $this->title,
            'subtitle' => "Create Company",
            'view' => 'companies/create',
            'back' => base_url("companies"),
        ];

        $this->load->view('master/index', compact('page'));
    }

    public function store()
    {
        redirect(base_url("companies"));
    }

    public function edit($company_id)
    {
        $company_id = decode($company_id);
        $page = [
            'title' => $this->title,
            'subtitle' => "Edit Company",
            'view' => 'companies/edit',
            'back' => base_url("companies"),
        ];

        $company = $this->companies[array_search($company_id, array_column($this->companies, 'id'))];

        $this->load->view('master/index', compact('page', 'company'));
    }

    public function update()
    {
        redirect(base_url("companies"));
    }

    public function show($company_id)
    {
        $company_id = decode($company_id);
        $page = [
            'title' => $this->title,
            'subtitle' => "Company Details",
            'view' => 'companies/show',
            'back' => base_url("companies"),
        ];

        $company = $this->companies[array_search($company_id, array_column($this->companies, 'id'))];

        $this->load->view('master/index', compact('page', 'company'));
    }

    public function delete()
    {
        redirect(base_url("companies"));
    }
}

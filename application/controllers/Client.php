<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Client extends CI_Controller
{
    function __construct()
    {
        $this->title = "Clients";
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
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->helper('hashids');

        $this->load->model('Authentication_model');
    }

    public function index($company_id)
    {
        $company_id = decode($company_id);
        $page = [
            'title' => $this->title,
            'subtitle' => "Clients Listing",
            'view' => 'companies/clients/index',
            'back' => base_url("companies"),
        ];

        $company_key = array_search($company_id, array_column($this->companies, 'id'));

        $clients = $this->companies[$company_key]['clients'];

        $this->load->view('master/index', compact('page', 'company_id', 'clients'));
    }

    public function create($company_id)
    {
        $company_id = decode($company_id);
        $page = [
            'title' => $this->title,
            'subtitle' => "Create Client",
            'view' => 'companies/clients/create',
            'back' => base_url("companies/" . encode($company_id) . '/clients'),
        ];

        $this->load->view('master/index', compact('page', 'company_id'));
    }

    public function store($company_id)
    {
        $company_id = decode($company_id);

        $company_key = array_search($company_id, array_column($this->companies, 'id'));

        $clients = $this->companies[$company_key]['clients'];

        redirect(base_url('companies/' . encode($company_id) . '/clients'));
    }

    public function edit($company_id, $client_id)
    {
        $company_id = decode($company_id);
        $client_id = decode($client_id);
        $page = [
            'title' => $this->title,
            'subtitle' => "Edit Client",
            'view' => 'companies/clients/edit',
            'back' => base_url("companies/" . encode($company_id) . '/clients'),
        ];

        $company_key = array_search($company_id, array_column($this->companies, 'id'));
        $clients = $this->companies[$company_key]['clients'];

        $client = $this->companies[$company_key]['clients'][array_search($client_id, array_column($clients, 'id'))];

        $this->load->view('master/index', compact('page', 'company_id', 'client'));
    }

    public function update($company_id, $user_id)
    {
        redirect(base_url('companies/' . encode($company_id) . '/clients'));
    }

    public function show($company_id, $client_id)
    {
        $company_id = decode($company_id);
        $client_id = decode($client_id);
        $page = [
            'title' => $this->title,
            'subtitle' => "Client Details",
            'view' => 'companies/clients/show',
            'back' => base_url("companies/" . encode($company_id) . '/clients'),
        ];
        $company_key = array_search($company_id, array_column($this->companies, 'id'));
        $clients = $this->companies[$company_key]['clients'];

        $client = $this->companies[$company_key]['clients'][array_search($client_id, array_column($clients, 'id'))];

        $this->load->view('master/index', compact('page', 'company_id', 'client'));
    }

    public function delete($company_id, $client_id)
    {
        $company_id = decode($company_id);
        $client_id = decode($client_id);
        redirect(base_url('companies/' . encode($company_id) . '/clients'));
    }
}

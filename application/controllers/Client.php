<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Client extends CI_Controller
{
    function __construct()
    {
        $this->title = "Clients";
        parent::__construct();
        if (is_logged_in() == false) {
            logout();
            redirect(LOGIN_URL);
        }

        $this->load->model('Client_model');
        $this->load->model('Utility_model');
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

        $clients = $this->Client_model->list($company_id);

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

        $data = $this->input->post();
        $data['company_id'] = $company_id;
        $results = $this->Client_model->store($data);

        redirect('companies/' . encode($company_id) . '/clients');
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
        $client = $this->Client_model->details($client_id);

        $this->load->view('master/index', compact('page', 'company_id', 'client'));
    }

    public function update($company_id, $client_id)
    {
        $company_id = decode($company_id);
        $client_id = decode($client_id);
        $data = $this->input->post();
        $results = $this->Client_model->update($client_id, $data);
        redirect('companies/' . encode($company_id) . '/clients');
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
        $client = $this->Client_model->details($client_id);

        $this->load->view('master/index', compact('page', 'company_id', 'client'));
    }

    public function delete($company_id, $client_id)
    {
        $company_id = decode($company_id);
        $client_id = decode($client_id);
        $this->Client_model->delete($client_id);

        redirect('companies/' . encode($company_id) . '/clients');
    }
}

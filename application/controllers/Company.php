<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Company extends CI_Controller
{
    function __construct()
    {
        $this->title = "Company";
        parent::__construct();
        if (is_logged_in() == false) {
            logout();
            redirect(LOGIN_URL);
        }

        $this->load->model('Authentication_model');
        $this->load->model('Utility_model');
        $this->load->model('Company_model');
    }

    public function index()
    {
        $page = [
            'title' => $this->title,
            'subtitle' => "Company Listing",
            'view' => 'companies/index',
            'back' => null,
        ];

        $companies = $this->Company_model->list();

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
        $data = $this->input->post();
        $data['password'] = password_hash($data['password'], PASSWORD_BCRYPT);
        $results = $this->Company_model->store($data);
        redirect('companies');
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

        $company = $this->Company_model->details($company_id);

        $this->load->view('master/index', compact('page', 'company'));
    }

    public function update($company_id)
    {
        $company_id = decode($company_id);
        $data = $this->input->post();

        if ($data['password'] == '') {
            unset($data['password']);
        } else {
            $data['password'] = password_hash($data['password'], PASSWORD_BCRYPT);
        }
        $this->Company_model->update($company_id, $data);
        redirect('companies');
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

        $company = $this->Company_model->details($company_id);

        $this->load->view('master/index', compact('page', 'company'));
    }

    public function delete($company_id)
    {
        $company_id = decode($company_id);
        $this->Company_model->delete($company_id);
        redirect('companies');
    }
}

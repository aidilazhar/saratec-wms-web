<?php
defined('BASEPATH') or exit('No direct script access allowed');

class CompanyUser extends CI_Controller
{
    function __construct()
    {
        $this->title = "Users";
        parent::__construct();
        if (is_logged_in() == false) {
            logout();
            redirect(base_url(LOGIN_URL));
        }

        $this->load->model('User_model');
        $this->load->model('Utility_model');
        $this->load->model('Role_model');
    }

    public function index($company_id)
    {
        $company_id = decode($company_id);
        $page = [
            'title' => $this->title,
            'subtitle' => "Users Listing",
            'view' => 'companies/users/index',
            'back' => base_url("companies"),
        ];

        $users = $this->User_model->list($company_id);

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

        $roles = $this->Role_model->list();

        $this->load->view('master/index', compact('page', 'company_id', 'roles'));
    }

    public function store($company_id)
    {
        $company_id = decode($company_id);
        $data = $this->input->post();
        $data['password'] = password_hash($data['password'], PASSWORD_BCRYPT);
        $data['company_id'] = $company_id;
        $results = $this->User_model->store($data);
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
        $roles = $this->Role_model->list();
        $user = $this->User_model->details($user_id);

        $this->load->view('master/index', compact('page', 'company_id', 'user', 'roles'));
    }

    public function update($company_id, $user_id)
    {
        $user_id = decode($user_id);
        $company_id = decode($company_id);
        $data = $this->input->post();

        if ($data['password'] == $data['repassword']) {
            $data['password'] = password_hash($data['password'], PASSWORD_BCRYPT);
            unset($data['repassword']);
        } else {
            unset($data['password']);
            unset($data['repassword']);
        }
        $results = $this->User_model->update($user_id, $data);
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

        $user = $this->User_model->details($user_id);

        $this->load->view('master/index', compact('page', 'company_id', 'user'));
    }

    public function delete($company_id, $user_id)
    {
        $company_id = decode($company_id);
        $user_id = decode($user_id);
        $this->User_model->delete($user_id);
        redirect(base_url('companies/' . encode($company_id) . '/users'));
    }
}

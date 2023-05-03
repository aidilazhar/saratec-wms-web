<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
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

    public function index()
    {
        $page = [
            'title' => $this->title,
            'subtitle' => "Users Listing",
            'view' => 'users/index',
            'back' => null,
        ];

        $users = $this->User_model->list();

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

        $roles = $this->Role_model->list();

        $this->load->view('master/index', compact('page', 'roles'));
    }

    public function store()
    {
        $data = $this->input->post();
        $data['password'] = password_hash($data['password'], PASSWORD_BCRYPT);
        $results = $this->User_model->store($data);
        print_r($results);
        return;

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

        $roles = $this->Role_model->list();

        $user = $this->User_model->details($user_id);

        $this->load->view('master/index', compact('page', 'user', 'roles'));
    }

    public function update($user_id)
    {
        $user_id = decode($user_id);
        $data = $this->input->post();

        if ($data['password'] == $data['repassword']) {
            $data['password'] = password_hash($data['password'], PASSWORD_BCRYPT);
            unset($data['repassword']);
        } else {
            unset($data['password']);
            unset($data['repassword']);
        }
        $results = $this->User_model->update($user_id, $data);

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

        $user = $this->User_model->details($user_id);

        $this->load->view('master/index', compact('page', 'user'));
    }

    public function delete($user_id)
    {
        $user_id = decode($user_id);
        $this->User_model->delete($user_id);
        redirect(base_url("users"));
    }
}

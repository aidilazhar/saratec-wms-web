<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Broadcast extends CI_Controller
{
    function __construct()
    {
        $this->title = "Broadcasts";
        parent::__construct();
        if (is_logged_in() == false) {
            logout();
            redirect(base_url(LOGIN_URL));
        }

        $this->load->model('Authentication_model');
        $this->load->model('Utility_model');
        $this->load->model('Broadcast_model');
        $this->load->model('Trial_model');
    }

    public function index()
    {
        $page = [
            'title' => $this->title,
            'subtitle' => "Broadcast Listing",
            'view' => 'broadcasts/index',
            'back' => null,
        ];

        $broadcasts = $this->Broadcast_model->list();

        $this->load->view('master/index', compact('page', 'broadcasts'));
    }

    public function create()
    {
        $page = [
            'title' => $this->title,
            'subtitle' => "Create Broadcast",
            'view' => 'broadcasts/create',
            'back' => base_url("broadcasts"),
        ];

        $this->load->view('master/index', compact('page'));
    }

    public function store()
    {
        $data = $this->input->post();
        $results = $this->Broadcast_model->store($data);
        redirect(base_url("broadcasts"));
    }

    public function edit($broadcast_id)
    {
        $broadcast_id = decode($broadcast_id);
        $page = [
            'title' => $this->title,
            'subtitle' => "Edit Broadcast",
            'view' => 'broadcasts/edit',
            'back' => base_url("broadcasts"),
        ];

        $broadcast = $this->Broadcast_model->details($broadcast_id);

        $this->load->view('master/index', compact('page', 'broadcast'));
    }

    public function update($broadcast_id)
    {
        $broadcast_id = decode($broadcast_id);
        $data = $this->input->post();

        if ($data['password'] == '') {
            unset($data['password']);
        } else {
            $data['password'] = password_hash($data['password'], PASSWORD_BCRYPT);
        }
        $this->Broadcast_model->update($broadcast_id, $data);
        redirect(base_url("broadcasts"));
    }

    public function show($broadcast_id)
    {
        $broadcast_id = decode($broadcast_id);
        $page = [
            'title' => $this->title,
            'subtitle' => "Broadcast Details",
            'view' => 'broadcasts/show',
            'back' => base_url("broadcasts"),
        ];

        $broadcast = $this->Broadcast_model->details($broadcast_id);

        $this->load->view('master/index', compact('page', 'broadcast'));
    }

    public function delete($broadcast_id)
    {
        $broadcast_id = decode($broadcast_id);
        $this->Broadcast_model->delete($broadcast_id);
        redirect(base_url("broadcasts"));
    }
}

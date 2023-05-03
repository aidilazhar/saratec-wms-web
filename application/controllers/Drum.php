<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Drum extends CI_Controller
{
    function __construct()
    {
        $this->title = "Drum";
        parent::__construct();
        if (is_logged_in() == false) {
            logout();
            redirect(base_url(LOGIN_URL));
        }

        $this->load->model('Authentication_model');
        $this->load->model('Drum_model');
    }

    public function index()
    {
        $page = [
            'title' => $this->title,
            'subtitle' => "Drum Listing",
            'view' => 'drums/index',
            'back' => null,
        ];

        $drums = $this->Drum_model->list();

        $this->load->view('master/index', compact('page', 'drums'));
    }

    public function create()
    {
        $page = [
            'title' => $this->title,
            'subtitle' => "Create Drum",
            'view' => 'drums/create',
            'back' => base_url("drums"),
        ];

        $this->load->view('master/index', compact('page'));
    }

    public function store()
    {
        $data = $this->input->post();
        $results = $this->Drum_model->store($data);

        redirect(base_url("drums"));
    }

    public function edit($drum_id)
    {
        $drum_id = decode($drum_id);
        $page = [
            'title' => $this->title,
            'subtitle' => "Edit Drum",
            'view' => 'drums/edit',
            'back' => base_url("users"),
        ];

        $drum = $this->Drum_model->details($drum_id);

        $this->load->view('master/index', compact('page', 'drum'));
    }

    public function update($drum_id)
    {
        $drum_id = decode($drum_id);
        $data = $this->input->post();
        $results = $this->Drum_model->update($drum_id, $data);
        redirect(base_url("drums"));
    }

    public function show($drum_id)
    {
        $drum_id = decode($drum_id);
        $page = [
            'title' => $this->title,
            'subtitle' => "Drum Details",
            'view' => 'drums/show',
            'back' => base_url("drums"),
        ];

        $drum = $this->Drum_model->details($drum_id);

        $this->load->view('master/index', compact('page', 'drum'));
    }

    public function delete($drum_id)
    {
        $drum_id = decode($drum_id);
        $this->Drum_model->delete($drum_id);
        redirect(base_url("drums"));
    }
}

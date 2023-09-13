<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Field extends CI_Controller
{
    function __construct()
    {
        $this->title = "Fields";
        parent::__construct();
        if (is_logged_in() == false) {
            logout();
            redirect(LOGIN_URL);
        }

        $this->load->model('Authentication_model');
        $this->load->model('Field_model');
    }

    public function index()
    {
        $page = [
            'title' => $this->title,
            'subtitle' => "Fields Listing",
            'view' => 'fields/index',
            'back' => null,
        ];

        $fields = $this->Field_model->list();

        $this->load->view('master/index', compact('page', 'fields'));
    }

    public function create()
    {
        $page = [
            'title' => $this->title,
            'subtitle' => "Create Field",
            'view' => 'fields/create',
            'back' => base_url("fields"),
        ];

        $this->load->view('master/index', compact('page'));
    }

    public function store()
    {
        $data = $this->input->post();
        $results = $this->Field_model->store($data);

        redirect('fields');
    }

    public function edit($field_id)
    {
        $field_id = decode($field_id);
        $page = [
            'title' => $this->title,
            'subtitle' => "Edit Field",
            'view' => 'fields/edit',
            'back' => base_url("users"),
        ];

        $field = $this->Field_model->details($field_id);

        $this->load->view('master/index', compact('page', 'field'));
    }

    public function update($field_id)
    {
        $field_id = decode($field_id);
        $data = $this->input->post();
        $results = $this->Field_model->update($field_id, $data);

        redirect('fields');
    }

    public function show($field_id)
    {
        $field_id = decode($field_id);
        $page = [
            'title' => $this->title,
            'subtitle' => "Field Details",
            'view' => 'fields/show',
            'back' => base_url("fields"),
        ];

        $field = $this->Field_model->details($field_id);

        $this->load->view('master/index', compact('page', 'field'));
    }

    public function delete($field_id)
    {
        $field_id = decode($field_id);
        $this->Field_model->delete($field_id);
        redirect('fields');
    }
}

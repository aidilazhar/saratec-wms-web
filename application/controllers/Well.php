<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Well extends CI_Controller
{
    function __construct()
    {
        $this->title = "Wells";
        parent::__construct();
        if (is_logged_in() == false) {
            logout();
            redirect(base_url(LOGIN_URL));
        }

        $this->load->model('Authentication_model');
        $this->load->model('Well_model');
        $this->load->model('Field_model');
    }

    public function index()
    {
        $page = [
            'title' => $this->title,
            'subtitle' => "Wells Listing",
            'view' => 'wells/index',
            'back' => null,
        ];

        $wells = $this->Well_model->list();

        $this->load->view('master/index', compact('page', 'wells'));
    }

    public function create()
    {
        $page = [
            'title' => $this->title,
            'subtitle' => "Create Well",
            'view' => 'wells/create',
            'back' => base_url("wells"),
        ];

        $fields = $this->Field_model->list();

        $this->load->view('master/index', compact('page', 'fields'));
    }

    public function store()
    {
        $data = $this->input->post();
        $data['name'] = $data['name1'] . '-' . $data['name2'];
        unset($data['name1'], $data['name2']);
        $data['schematic'] = '';
        $well_id = $this->Well_model->store($data);

        if (isset($_FILES['schematic']) && !empty($_FILES['schematic'])) {
            $path = 'wells';

            $this->Utility_model->mkdir($path);
            $config['upload_path'] = 'temp/' . $path;
            $config['allowed_types'] = 'pdf|png|jpg|jpeg';
            $config['file_name'] = $well_id;
            $config['max_size'] = 10000000;
            $config['overwrite'] = TRUE;

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('schematic')) {
                $error = array('error' => $this->upload->display_errors());
            } else {
                $upload_data = array('upload_data' => $this->upload->data());
                $schematic = [
                    'name' => $upload_data['upload_data']['file_name'],
                    'url' => $path . '/' . $upload_data['upload_data']['file_name'],
                ];
            }
        } else {
            $schematic = [
                'name' => null,
                'url' => null,
            ];
        }

        $data = [];
        $data['schematic'] = $schematic['url'];
        $results = $this->Well_model->update($well_id, $data);

        redirect(base_url("wells"));
    }

    public function edit($well_id)
    {
        $well_id = decode($well_id);
        $page = [
            'title' => $this->title,
            'subtitle' => "Edit Well",
            'view' => 'wells/edit',
            'back' => base_url("users"),
        ];

        $well = $this->Well_model->details($well_id);
        $well['names'] = explode("-", $well['name']);
        $fields = $this->Field_model->list();

        $this->load->view('master/index', compact('page', 'well', 'fields'));
    }

    public function update($well_id)
    {
        $well_id = decode($well_id);
        $data = $this->input->post();

        $data['name'] = $data['name1'] . '-' . $data['name2'];
        unset($data['name1'], $data['name2']);


        if (isset($_FILES['schematic']) && $_FILES["schematic"]["size"] > 0) {
            $path = 'wells';

            $this->Utility_model->mkdir($path);
            $config['upload_path'] = 'temp/' . $path;
            $config['allowed_types'] = 'pdf|png|jpg|jpeg';
            $config['file_name'] = $well_id;
            $config['max_size'] = 10000000;
            $config['overwrite'] = TRUE;

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('schematic')) {
                $error = array('error' => $this->upload->display_errors());
            } else {
                $upload_data = array('upload_data' => $this->upload->data());
                $schematic = [
                    'name' => $upload_data['upload_data']['file_name'],
                    'url' => $path . '/' . $upload_data['upload_data']['file_name'],
                ];
            }

            $data['schematic'] = $schematic['url'];
        }

        $results = $this->Well_model->update($well_id, $data);

        redirect(base_url("wells"));
    }

    public function show($well_id)
    {
        $well_id = decode($well_id);
        $page = [
            'title' => $this->title,
            'subtitle' => "Well Details",
            'view' => 'wells/show',
            'back' => base_url("wells"),
        ];

        $well = $this->Well_model->details($well_id);
        $well['names'] = explode("-", $well['name']);
        $fields = $this->Field_model->list();

        $this->load->view('master/index', compact('page', 'well', 'fields'));
    }

    public function delete($well_id)
    {
        $well_id = decode($well_id);
        $this->Well_model->delete($well_id);
        redirect(base_url("wells"));
    }
}

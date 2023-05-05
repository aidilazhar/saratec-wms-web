<?php
defined('BASEPATH') or exit('No direct script access allowed');
header("Access-Control-Allow-Methods: GET, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Content-Length, Accept-Encoding");

class Wire extends CI_Controller
{
    function __construct()
    {
        $this->title = "Wires";
        parent::__construct();
        if (is_logged_in() == false) {
            logout();
            redirect(base_url(LOGIN_URL));
        }

        $this->load->model('Authentication_model');
        $this->load->model('Wire_model');
        $this->load->model('Drum_model');
        $this->load->model('Package_model');
        $this->load->model('Company_model');
        $this->load->model('Client_model');
        $this->load->model('Utility_model');
        $this->load->model('User_model');
        $this->load->model('JobType_model');
        $this->load->model('Trial_model');
    }

    public function index()
    {
        $page = [
            'title' => $this->title,
            'subtitle' => "Wires Listing",
            'view' => 'wires/index',
            'back' => null,
        ];

        $wires = $this->Wire_model->list();

        $this->load->view('master/index', compact('page', 'wires'));
    }

    public function create()
    {
        $drums = $this->Drum_model->list();
        $packages = $this->Package_model->list();
        $companies = $this->Company_model->list();

        if (!empty($companies)) {
            $clients = $this->Client_model->list($companies[0]['id']);
        } else {
            $clients = [];
        }

        $page = [
            'title' => $this->title,
            'subtitle' => "Create Wire",
            'view' => 'wires/create',
            'back' => base_url("wires"),
        ];

        $this->load->view('master/index', compact('page', 'drums', 'packages', 'companies', 'clients'));
    }

    public function store()
    {
        $data = $this->input->post();
        $wire_id = $this->Wire_model->store($data);

        if (isset($_FILES['material_certifications'])) {
            $path = 'assets/upload/' . $wire_id;

            $this->Utility_model->mkdir($path);
            $config['upload_path'] = $path;
            $config['allowed_types'] = 'pdf|png|jpg|jpeg';
            $config['file_name'] = 'material-certifications';
            $config['max_size'] = 10000000;
            $config['overwrite'] = TRUE;

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('material_certifications')) {
            } else {
                $upload_data = array('upload_data' => $this->upload->data());
                $material_certifications_data = [
                    'name' => $upload_data['upload_data']['file_name'],
                    'url' => $path . '/' . $upload_data['upload_data']['file_name'],
                ];
            }
        } else {
            $material_certifications_data = [
                'name' => null,
                'url' => null,
            ];
        }

        $config = [];

        if (isset($_FILES['tech_sheet'])) {
            $path = 'assets/upload/' . $wire_id;

            $this->Utility_model->mkdir($path);
            $config['upload_path'] = $path;
            $config['allowed_types'] = 'pdf|png|jpg|jpeg';
            $config['file_name'] = 'tech-sheet';
            $config['max_size'] = 10000000;
            $config['overwrite'] = TRUE;

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('tech_sheet')) {
            } else {
                $upload_data = array('upload_data' => $this->upload->data());
                $tech_sheet_data = [
                    'name' => $upload_data['upload_data']['file_name'],
                    'url' => $path . '/' . $upload_data['upload_data']['file_name'],
                ];
            }
        } else {
            $tech_sheet_data = [
                'name' => null,
                'url' => null,
            ];
        }

        $data = [];
        $data['material_certifications'] = $material_certifications_data['url'];
        $data['tech_sheet'] = $tech_sheet_data['url'];
        $results = $this->Wire_model->update($wire_id, $data);

        redirect(base_url("wires"));
    }

    public function edit($wire_id)
    {
        $wire_id = decode($wire_id);
        $page = [
            'title' => $this->title,
            'subtitle' => "Edit Wire",
            'view' => 'wires/edit',
            'back' => base_url("wires"),
        ];

        $wire = $this->Wire_model->details($wire_id);
        $drums = $this->Drum_model->list();
        $packages = $this->Package_model->list();
        $companies = $this->Company_model->list();
        $clients = $this->Client_model->list($wire['company_id']);

        $this->load->view('master/index', compact('page', 'wire', 'drums', 'packages', 'companies', 'clients'));
    }

    public function update($wire_id)
    {
        $wire_id = decode($wire_id);
        $data = $this->input->post();

        if (isset($_FILES['material_certifications']) && !empty($_FILES['material_certifications'])) {
            $path = 'upload/' . $wire_id;

            $this->Utility_model->mkdir($path);
            $config['upload_path'] = 'assets/' . $path;
            $config['allowed_types'] = 'pdf|png|jpg|jpeg';
            $config['file_name'] = 'material-certifications';
            $config['max_size'] = 10000000;
            $config['overwrite'] = TRUE;

            $this->load->library('upload', $config);
            $this->upload->initialize($config);

            if (!$this->upload->do_upload('material_certifications')) {
            } else {
                $upload_data = array('upload_data' => $this->upload->data());
                $material_certifications_data = [
                    'name' => $upload_data['upload_data']['file_name'],
                    'url' => $path . '/' . $upload_data['upload_data']['file_name'],
                ];
            }
        } else {
            $material_certifications_data = [
                'name' => null,
                'url' => null,
            ];
        }

        $config = [];

        if (isset($_FILES['tech_sheet']) && !empty($_FILES['tech_sheet'])) {
            $path = 'upload/' . $wire_id;

            $this->Utility_model->mkdir($path);
            $config['upload_path'] = 'assets/' . $path;
            $config['allowed_types'] = 'pdf|png|jpg|jpeg';
            $config['file_name'] = 'tech-sheet';
            $config['max_size'] = 10000000;
            $config['overwrite'] = TRUE;

            $this->upload->initialize($config);

            if (!$this->upload->do_upload('tech_sheet')) {
            } else {
                $upload_data = array('upload_data' => $this->upload->data());
                $tech_sheet_data = [
                    'name' => $upload_data['upload_data']['file_name'],
                    'url' => $path . '/' . $upload_data['upload_data']['file_name'],
                ];
            }
        } else {
            $tech_sheet_data = [
                'name' => null,
                'url' => null,
            ];
        }

        if (!is_null($material_certifications_data['url'])) {
            $data['material_certifications'] = $material_certifications_data['url'];
        }

        if (!is_null($tech_sheet_data['url'])) {
            $data['tech_sheet'] = $tech_sheet_data['url'];
        }

        $results = $this->Wire_model->update($wire_id, $data);

        redirect(base_url("wires"));
    }

    public function show($wire_id)
    {
        $wire_id = decode($wire_id);
        $page = [
            'title' => $this->title,
            'subtitle' => "Wire Details",
            'view' => 'wires/show',
            'back' => base_url("wires"),
        ];

        $wire = $this->Wire_model->details($wire_id);
        $drum = $this->Drum_model->details($wire['drum_id']);
        $package = $this->Package_model->details($wire['drum_id']);
        $client = $this->Client_model->details($wire['drum_id']);
        $company = $this->Company_model->details($client['company_id']);

        $this->load->view('master/index', compact('page', 'wire', 'drum', 'package', 'company', 'client'));
    }

    public function delete($wire_id)
    {
        $wire_id = decode($wire_id);
        $this->Wire_model->delete($wire_id);
        redirect(base_url("wires"));
    }

    public function dashboard($wire_id)
    {
        $wire_id = decode($wire_id);
        $page = [
            'title' => $this->title,
            'subtitle' => "Wire Details",
            'view' => 'wires/dashboards/index',
            'back' => base_url("wires"),
        ];

        $operators = $this->User_model->list([], [ROLE_OPERATOR]);
        $drums = $this->Drum_model->list();
        $job_types = $this->JobType_model->list();
        $wire = $this->Wire_model->details($wire_id);
        $trials = $this->Trial_model->list([$wire_id]);

        $this->load->view('master/index', compact('page', 'wire', 'trials'));
    }

    public function materialCertifications($wire_id)
    {
        $base64 = base64_encode(file_get_contents("https://unec.edu.az/application/uploads/2014/12/pdf-sample.pdf"));
        $wire_id = decode($wire_id);
        $page = [
            'title' => $this->title,
            'subtitle' => "Wire's Material Certifications",
            'view' => 'wires/dashboards/material-certifications',
            'back' => base_url("wires"),
        ];

        $wire = $this->wires[array_search($wire_id, array_column($this->wires, 'id'))];

        $this->load->view('master/index', compact('page', 'wire', 'base64'));
    }

    public function otherReports($wire_id)
    {
        $reports = [
            [
                'date' => date('d M Y', strtotime(date('Y-m-d') . ' +1 days')),
                'description' => "Sample From 5/12/2022",
                'category' => 'Lab Test',
                'issued_by' => "DAS",
            ],
            [
                'date' => date('d M Y', strtotime(date('Y-m-d') . ' +2 days')),
                'description' => "Wire Twist",
                'category' => 'Initial Problem Report',
                'issued_by' => "Deleum",
            ],
            [
                'date' => date('d M Y', strtotime(date('Y-m-d') . ' +3 days')),
                'description' => "Lose Helix",
                'category' => 'INVESTIGATION REPORT',
                'issued_by' => "SARATEC",
            ],
        ];
        $wire_id = decode($wire_id);
        $page = [
            'title' => $this->title,
            'subtitle' => "Wire's Inspection and Other Reports",
            'view' => 'wires/dashboards/other-reports',
            'back' => base_url("wires"),
        ];

        $wire = $this->wires[array_search($wire_id, array_column($this->wires, 'id'))];

        $this->load->view('master/index', compact('page', 'wire', 'reports'));
    }

    public function thirdPartyData($wire_id)
    {
        $wire_id = decode($wire_id);
        $page = [
            'title' => $this->title,
            'subtitle' => "Wire's 3rd Party Data",
            'view' => 'wires/dashboards/third-party-data',
            'back' => base_url("wires"),
        ];

        $wire = $this->wires[array_search($wire_id, array_column($this->wires, 'id'))];

        $this->load->view('master/index', compact('page', 'wire'));
    }

    public function techSheet($wire_id)
    {
        $base64 = base64_encode(file_get_contents("https://unec.edu.az/application/uploads/2014/12/pdf-sample.pdf"));
        $wire_id = decode($wire_id);
        $page = [
            'title' => $this->title,
            'subtitle' => "Wire's Tech Sheets",
            'view' => 'wires/dashboards/tech-sheets',
            'back' => base_url("wires"),
        ];

        $wire = $this->wires[array_search($wire_id, array_column($this->wires, 'id'))];

        $this->load->view('master/index', compact('page', 'wire', 'base64'));
    }
}

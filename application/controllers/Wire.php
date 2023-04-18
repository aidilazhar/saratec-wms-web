<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Wire extends CI_Controller
{
    function __construct()
    {
        $this->title = "Wires";
        $this->wires = [
            [
                "id" => 1,
                'company_id' => '2',
                'client_id' => '5',
                "name" => "Wire 1",
                'package_id' => 3,
                'drum_id' => 2,
                'size' => 2.5,
                'brand' => 'SUPA75',
                'grade' => 'A',
                'manufacturer' => "ABC Sdn. Bhd.",
                'trial' => [
                    'date' => date('Y-m-d'),
                    'operator_id' => 2,
                    'operator' => [
                        "id" => 2,
                        "name" => "Barry",
                        "username" => "barry",
                        "contact" => rand(100000000, 999999999),
                        'role_id' => 3,
                        "role" => [
                            "id" => 3,
                            "name" => "Operator",
                        ],
                        "status" => "Active",
                        'email' => 'barry@yopmail.com'
                    ],
                    'supervisor_id' => 4,
                    'supervisor' => [
                        "id" => 4,
                        "name" => "David",
                        "username" => "david",
                        "contact" => rand(100000000, 999999999),
                        'role_id' => 2,
                        "role" => [
                            "id" => 2,
                            "name" => "Supervisor",
                        ],
                        "status" => "Inactive",
                        'email' => 'david@yopmail.com'
                    ],
                    'client_id' => 1,
                    'client' => [
                        "id" => 1,
                        "name" => "VESTIGO",
                    ],
                    'package_id' => 2,
                    'package' => [
                        "id" => 2,
                        "name" => "WSU 2",
                    ],
                    'drum_id' => 2,
                    'drum' => [
                        "id" => 2,
                        "name" => "02",
                    ],
                    'wrap_test' => 'pass',
                    'pull_test' => "1,000 - 1,999 lbs",
                    'x_inch' => 1,
                    'y_inch' => 3,
                    'cut_off' => 2,
                    'well_name' => "TUA-14L",
                    'job_type_id' => 14,
                    'job_type' => [
                        "id" => 14,
                        "name" => "FishingOperation",
                    ],
                    'jar_no' => 10,
                    'max_pull' => 2,
                    'is_smart_monitor_logged' => 1,
                    'remark' => "PASS",
                ],
            ],
        ];

        $this->trials = [
            [
                'id' => 1,
                'wire_id' => 1,
                'date' => date('d M Y'),
                'time' => date('h:i A'),
                'operator_id' => 2,
                'operator' => [
                    "id" => 2,
                    "name" => "Barry",
                    "username" => "barry",
                    "contact" => rand(100000000, 999999999),
                    'role_id' => 3,
                    "role" => [
                        "id" => 3,
                        "name" => "Operator",
                    ],
                    "status" => "Active",
                    'email' => 'barry@yopmail.com'
                ],
                'supervisor_id' => 4,
                'supervisor' => [
                    "id" => 4,
                    "name" => "David",
                    "username" => "david",
                    "contact" => rand(100000000, 999999999),
                    'role_id' => 2,
                    "role" => [
                        "id" => 2,
                        "name" => "Supervisor",
                    ],
                    "status" => "Inactive",
                    'email' => 'david@yopmail.com'
                ],
                'client_id' => 1,
                'client' => [
                    "id" => 1,
                    "name" => "VESTIGO",
                ],
                'package_id' => 2,
                'package' => [
                    "id" => 2,
                    "name" => "WSU 2",
                ],
                'drum_id' => 2,
                'drum' => [
                    "id" => 2,
                    "name" => "02",
                ],
                'wrap_test' => 'pass',
                'pull_test' => "1,000 - 1,999 lbs",
                'x_inch' => 1,
                'y_inch' => 3,
                'cut_off' => 2,
                'well_name' => "TUA-14L",
                'job_type_id' => 14,
                'job_type' => [
                    "id" => 14,
                    "name" => "FishingOperation",
                ],
                'jar_no' => 10,
                'max_pull' => 2,
                'is_smart_monitor_logged' => 1,
                'remark' => "PASS",
            ]
        ];

        $this->supervisors = [
            [
                "id" => 1,
                "name" => "Ali",
                "username" => "ali",
                "contact" => rand(100000000, 999999999),
                'role_id' => 2,
                "role" => [
                    "id" => 2,
                    "name" => "Supervisor",
                ],
                "status" => "Active",
                'email' => 'ali@yopmail.com'
            ],
            [
                "id" => 4,
                "name" => "David",
                "username" => "david",
                "contact" => rand(100000000, 999999999),
                'role_id' => 2,
                "role" => [
                    "id" => 2,
                    "name" => "Supervisor",
                ],
                "status" => "Inactive",
                'email' => 'david@yopmail.com'
            ],
        ];

        $this->operators = [
            [
                "id" => 1,
                "name" => "Ali",
                "username" => "ali",
                "contact" => rand(100000000, 999999999),
                'role_id' => 2,
                "role" => [
                    "id" => 2,
                    "name" => "Supervisor",
                ],
                "status" => "Active",
                'email' => 'ali@yopmail.com'
            ],
            [
                "id" => 3,
                "name" => "Charlie",
                "username" => "charlie",
                "contact" => rand(100000000, 999999999),
                'role_id' => 3,
                "role" => [
                    "id" => 3,
                    "name" => "Operator",
                ],
                "status" => "Active",
                'email' => 'charlie@yopmail.com'
            ],
        ];

        $this->job_types = [
            [
                "id" => 1,
                "name" => "SpoolingRespooling",
            ],
            [
                "id" => 2,
                "name" => "TccTagTdGRingTDrift",
            ],
            [
                "id" => 3,
                "name" => "WireScratcherRun",
            ],
            [
                "id" => 4,
                "name" => "FlapperProbeCheck",
            ],
            [
                "id" => 5,
                "name" => "SetRetInsValveString",
            ],
            [
                "id" => 6,
                "name" => "SetRetTbgStopPackOff",
            ],
            [
                "id" => 7,
                "name" => "SetRetCatcherSub",
            ],
            [
                "id" => 8,
                "name" => "SetRetGLVODummy",
            ],
            [
                "id" => 9,
                "name" => "SetRetPlugProng",
            ],
            [
                "id" => 10,
                "name" => "OpenCloseSSD",
            ],
            [
                "id" => 11,
                "name" => "GaugesLoggingGRCCL",
            ],
            [
                "id" => 12,
                "name" => "PerfTbgPunchCut",
            ],
            [
                "id" => 13,
                "name" => "BroachRepairTubing",
            ],
            [
                "id" => 14,
                "name" => "FishingOperation",
            ],
            [
                "id" => 15,
                "name" => "OtherRelatedJobs",
            ],
            [
                "id" => 16,
                "name" => "WireRectification",
            ],
        ];

        $this->packages = [
            [
                "id" => 1,
                "name" => "WSU 1",
            ],
            [
                "id" => 2,
                "name" => "WSU 2",
            ],
            [
                "id" => 3,
                "name" => "WSU 3",
            ],
            [
                "id" => 4,
                "name" => "WSU 4",
            ],
            [
                "id" => 5,
                "name" => "WSU 5",
            ],
            [
                "id" => 6,
                "name" => "WSU 6",
            ],
            [
                "id" => 7,
                "name" => "WSU 7",
            ],
        ];

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

        $this->job_types = [
            [
                "id" => 1,
                "name" => "SpoolingRespooling",
            ],
            [
                "id" => 2,
                "name" => "TccTagTdGRingTDrift",
            ],
            [
                "id" => 3,
                "name" => "WireScratcherRun",
            ],
            [
                "id" => 4,
                "name" => "FlapperProbeCheck",
            ],
            [
                "id" => 5,
                "name" => "SetRetInsValveString",
            ],
            [
                "id" => 6,
                "name" => "SetRetTbgStopPackOff",
            ],
            [
                "id" => 7,
                "name" => "SetRetCatcherSub",
            ],
            [
                "id" => 8,
                "name" => "SetRetGLVODummy",
            ],
            [
                "id" => 9,
                "name" => "SetRetPlugProng",
            ],
            [
                "id" => 10,
                "name" => "OpenCloseSSD",
            ],
            [
                "id" => 11,
                "name" => "GaugesLoggingGRCCL",
            ],
            [
                "id" => 12,
                "name" => "PerfTbgPunchCut",
            ],
            [
                "id" => 13,
                "name" => "BroachRepairTubing",
            ],
            [
                "id" => 14,
                "name" => "FishingOperation",
            ],
            [
                "id" => 15,
                "name" => "OtherRelatedJobs",
            ],
            [
                "id" => 16,
                "name" => "WireRectification",
            ],
        ];

        $this->drums = [
            [
                "id" => 1,
                "name" => "01",
            ],
            [
                "id" => 2,
                "name" => "02",
            ],
            [
                "id" => 3,
                "name" => "03",
            ],
            [
                "id" => 4,
                "name" => "04",
            ],
        ];

        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->helper('hashids');

        $this->load->model('Authentication_model');
    }

    public function index()
    {
        $page = [
            'title' => $this->title,
            'subtitle' => "Wires Listing",
            'view' => 'wires/index',
            'back' => null,
        ];

        $wires = $this->wires;

        $this->load->view('master/index', compact('page', 'wires'));
    }

    public function create()
    {
        $drums = $this->drums;
        $packages = $this->packages;
        $companies = $this->companies;
        $clients = $this->companies[0]['clients'];
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
        redirect(base_url("wires"));
    }

    public function edit($user_id)
    {
        $user_id = decode($user_id);
        $drums = $this->drums;
        $packages = $this->packages;
        $page = [
            'title' => $this->title,
            'subtitle' => "Edit Wire",
            'view' => 'wires/edit',
            'back' => base_url("wires"),
        ];

        $wire = $this->wires[array_search($user_id, array_column($this->wires, 'id'))];
        $companies = $this->companies;
        $company = $this->companies[array_search($wire['company_id'], array_column($this->companies, 'id'))];
        $clients = $company['clients'];

        $this->load->view('master/index', compact('page', 'wire', 'drums', 'packages', 'companies', 'clients'));
    }

    public function update()
    {
        redirect(base_url("wires"));
    }

    public function show($wire_id)
    {
        $wire_id = decode($wire_id);
        $drums = $this->drums;
        $packages = $this->packages;
        $page = [
            'title' => $this->title,
            'subtitle' => "Wire Details",
            'view' => 'wires/show',
            'back' => base_url("wires"),
        ];


        $companies = $this->companies;
        $wire = $this->wires[array_search($wire_id, array_column($this->wires, 'id'))];
        $company = $this->companies[array_search($wire['company_id'], array_column($this->companies, 'id'))];
        $clients = $companies[array_search($wire['company_id'], array_column($this->companies, 'id'))]['clients'];
        $client = $clients[array_search($wire['client_id'], array_column($clients, 'id'))];

        $this->load->view('master/index', compact('page', 'wire', 'drums', 'packages', 'company', 'client'));
    }

    public function delete()
    {
        redirect(base_url("wires"));
    }

    public function dashboard($wire_id)
    {
        $wire_id = decode($wire_id);
        $page = [
            'title' => $this->title,
            'subtitle' => "Wire Details",
            'view' => 'wires/dashboard',
            'back' => base_url("wires"),
        ];

        $wire = $this->wires[array_search($wire_id, array_column($this->wires, 'id'))];

        $this->load->view('master/index', compact('page', 'wire'));
    }
}

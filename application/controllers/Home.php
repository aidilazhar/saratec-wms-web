<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
    function __construct()
    {
        parent::__construct();

        $this->wires = [
            [
                "id" => 1,
                "name" => "Wire 1",
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

        $this->clients = [
            [
                "id" => 1,
                "name" => "VERTIGO",
            ],
            [
                "id" => 2,
                "name" => "EMEPMI",
            ],
            [
                "id" => 3,
                "name" => "SHELL",
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

        $this->title = "Dashboard";
        if (is_logged_in() == false) {
            logout();
            redirect(base_url(LOGIN_URL));
        }
    }

    public function index()
    {
        $wires = $this->wires;
        $page = [
            'title' => $this->title,
            'subtitle' => null,
            'view' => 'index',
            'back' => null,
        ];

        $this->load->view('master/index', compact('page', 'wires'));
    }

    public function blank()
    {
        $page = [
            'title' => "Blank",
            'view' => 'blank',
        ];

        $this->load->view('master/index', compact('page'));
    }
}

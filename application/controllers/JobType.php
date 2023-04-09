<?php
defined('BASEPATH') or exit('No direct script access allowed');

class JobType extends CI_Controller
{
    function __construct()
    {
        $this->title = "Job Types";
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
            'subtitle' => "Job Types Listing",
            'view' => 'job-types/index',
            'back' => null,
        ];

        $job_types = $this->job_types;

        $this->load->view('master/index', compact('page', 'job_types'));
    }

    public function create()
    {
        $page = [
            'title' => $this->title,
            'subtitle' => "Create Job Type",
            'view' => 'job-types/create',
            'back' => base_url("job-types"),
        ];

        $job_types = $this->job_types;

        $this->load->view('master/index', compact('page', 'job_types'));
    }

    public function store()
    {
        redirect(base_url("job-types"));
    }

    public function edit($user_id)
    {
        $user_id = decode($user_id);
        $page = [
            'title' => $this->title,
            'subtitle' => "Edit Job Type",
            'view' => 'job-types/edit',
            'back' => base_url("users"),
        ];

        $job_type = $this->job_types[array_search($user_id, array_column($this->job_types, 'id'))];

        $this->load->view('master/index', compact('page', 'job_type'));
    }

    public function update()
    {
        redirect(base_url("job-types"));
    }

    public function show($package_id)
    {
        $package_id = decode($package_id);
        $page = [
            'title' => $this->title,
            'subtitle' => "Job Type Details",
            'view' => 'job-types/show',
            'back' => base_url("job-types"),
        ];

        $job_type = $this->job_types[array_search($package_id, array_column($this->job_types, 'id'))];

        $this->load->view('master/index', compact('page', 'job_type'));
    }

    public function delete()
    {
        redirect(base_url("job-types"));
    }
}

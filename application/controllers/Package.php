<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Package extends CI_Controller
{
    function __construct()
    {
        $this->title = "Packages";
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
        parent::__construct();
        if (is_logged_in() == false) {
            logout();
            redirect(base_url(LOGIN_URL));
        }

        $this->load->model('Authentication_model');
    }

    public function index()
    {
        $page = [
            'title' => $this->title,
            'subtitle' => "Packages Listing",
            'view' => 'packages/index',
            'back' => null,
        ];

        $packages = $this->packages;

        $this->load->view('master/index', compact('page', 'packages'));
    }

    public function create()
    {
        $page = [
            'title' => $this->title,
            'subtitle' => "Create Package",
            'view' => 'packages/create',
            'back' => base_url("packages"),
        ];

        $this->load->view('master/index', compact('page', 'packages'));
    }

    public function store()
    {
        redirect(base_url("packages"));
    }

    public function edit($user_id)
    {
        $user_id = decode($user_id);
        $page = [
            'title' => $this->title,
            'subtitle' => "Edit Package",
            'view' => 'packages/edit',
            'back' => base_url("users"),
        ];

        $package = $this->packages[array_search($user_id, array_column($this->packages, 'id'))];

        $this->load->view('master/index', compact('page', 'package'));
    }

    public function update()
    {
        redirect(base_url("packages"));
    }

    public function show($package_id)
    {
        $package_id = decode($package_id);
        $page = [
            'title' => $this->title,
            'subtitle' => "Package Details",
            'view' => 'packages/show',
            'back' => base_url("packages"),
        ];

        $package = $this->packages[array_search($package_id, array_column($this->packages, 'id'))];

        $this->load->view('master/index', compact('page', 'package'));
    }

    public function delete()
    {
        redirect(base_url("packages"));
    }
}

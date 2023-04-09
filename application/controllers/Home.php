<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
    function __construct()
    {
        $this->title = "Dashboard";
        parent::__construct();

        $this->load->model('Authentication_model');
    }

    public function index()
    {
        $page = [
            'title' => $this->title,
            'subtitle' => null,
            'view' => 'index',
            'back' => null,
        ];

        $this->load->view('master/index', compact('page'));
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

<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Authentication extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('form');
        //$this->load->helper('hashids');

        $this->load->model('Authentication_model');
    }

    public function login()
    {
        $this->load->view('Authentication/login.php');
    }
}

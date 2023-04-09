<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Authentication extends CI_Controller
{
    function __construct()
    {
        parent::__construct();

        $this->load->model('Authentication_model');
    }

    public function encode($id)
    {
        echo encode($id);
    }

    public function decode($id)
    {
        echo decode($id);
    }
}

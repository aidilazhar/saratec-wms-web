<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Utility extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
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

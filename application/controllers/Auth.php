<?php
defined('BASEPATH') or exit('No direct script access allowed');
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: *");

class Auth extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->library('session');

        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->helper('hashids');
        $this->load->model('Authentication_model');
        $this->load->model('User_model');
        $this->load->model('Utility_model');
        $this->load->model('Permission_model');
    }

    public function login()
    {
        if (is_logged_in() == true) {
            redirect(base_url(''));
        }
        $this->load->view('authentication/login.php');
    }

    public function authenticate()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        $user = $this->Authentication_model->authenticate($email);

        if ($user != null) {
            $matched = password_verify($password, $user['password']);
        } else {
            $matched = false;
        }

        if (!empty($user) && $matched == true) {
            $perms = $this->Permission_model->details($user['role_id']);
            $permissions = $this->Permission_model->permissions($perms);

            $this->session->set_userdata('permissions', $permissions);

            $this->session->set_userdata('hash_id', encode($user['id']));
            $this->session->set_userdata('auth', $this->User_model->details($user['id']));
            add_cookies(encode($user['id']));

            redirect('');
        } else {
            redirect('login?error=1');
        }
    }

    public function logout()
    {
        logout();
        redirect(base_url('login'));
    }
}

<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
    function __construct()
    {
        parent::__construct();

        $this->title = "Dashboard";
        if (is_logged_in() == false) {
            logout();
            redirect(base_url(LOGIN_URL));
        }

        $this->load->model('Wire_model');
        $this->load->model('Trial_model');
        $this->load->model('Utility_model');
        $this->load->model('User_model');
    }

    public function index()
    {
        $wires = $this->Wire_model->list();

        foreach ($wires as $key => $wire) {
            $trials = $this->Trial_model->list([$wire['id']]);
            $spooling_date = $this->Trial_model->first_spooling_date($wire['id']);
            $trials_except = $this->Trial_model->list([$wire['id']], [1, 16]);

            $mins = array_sum(array_column($trials_except, 'duration'));
            $hours = intdiv($mins, 60);
            $days = round($hours / 24);

            $wires[$key]['last_entry'] = $this->Trial_model->last_entry($wire['id']);
            $wires[$key]['wire_balances'] = $wire['initial_length'] - array_sum(array_column($trials, 'cut_off'));
            $wires[$key]['wire_balances_percent'] = round((($wire['initial_length'] - array_sum(array_column($trials, 'cut_off'))) / $wire['initial_length']) * 100);
            $wires[$key]['total_running_number_hours'] = $hours;
            $wires[$key]['spooling_date'] = $spooling_date;
        }

        $page = [
            'title' => $this->title,
            'subtitle' => null,
            'view' => 'index',
            'back' => null,
            'scripts' => 'scripts'
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

    public function test()
    {
        $files = [
            '107202182654.csv',
            '107202192447.csv',
            '162021153833.csv'
        ];

        foreach ($files as $file) {
            $csvFilePath = 'C:/Users/mhanifazmi/Desktop/third_party/' . $file;
            $result = validateCSV($csvFilePath);

            if (!$result['status']) {
                echo $file;
                echo ': ';
                print_r($result['message']);
                break;
            } else {
                echo "Good";
            }
        }
    }

    public function phpInfo()
    {
        phpinfo();
    }
}

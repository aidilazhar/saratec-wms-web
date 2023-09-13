<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ImportSmartMonitor extends CI_Controller
{
    function __construct()
    {
        parent::__construct();

        if (is_logged_in() == false) {
            logout();
            redirect(LOGIN_URL);
        }

        $this->load->model('Wire_model');
        $this->load->model('Trial_model');
        $this->load->model('Utility_model');
        $this->load->model('ThirdPartyData_model');
    }

    public function index()
    {
        // Usage example:
        $csvFilePath = 'C:/Users/mhanifazmi/Desktop/third_party/107202182654.csv';
        $result = validateCSV($csvFilePath);

        if ($result['status']) {
            $open = fopen($csvFilePath, "r");

            while (($data = fgetcsv($open, 0, ",")) !== FALSE) {
                $array[] = $data;
            }

            fclose($open);
            unset($array[0]);

            foreach ($array as $key => $arr) {
                $dateTime = DateTime::createFromFormat("d-m-Y-H:i:s", $arr[0]);
                $date = $dateTime->format("Y-m-d H:i:s");

                echo $date;

                $data = [
                    'wire_id' => 1,
                    'smart_monitor_id' => 3,
                    'issued_at' => $date,
                    'mhsi_tension' => $arr[1],
                    'mhsi_depth' => $arr[3],
                    'mhsi_speed' => $arr[5],
                    'mhi_tension' => $arr[2],
                    'mhi_depth' => $arr[4],
                    'mhi_speed' => $arr[6],
                ];

                $this->ThirdPartyData_model->store($data);
            }

            print_r($array);
            return;
        } else {
            echo $result['message'];
        }
    }
}

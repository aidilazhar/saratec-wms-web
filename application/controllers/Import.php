<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Import extends CI_Controller
{
    function __construct()
    {
        parent::__construct();

        if (is_logged_in() == false) {
            logout();
            redirect(base_url(LOGIN_URL));
        }

        $this->load->model('Wire_model');
        $this->load->model('Trial_model');
        $this->load->model('Utility_model');
        $this->load->model('User_model');
        $this->load->model('Client_model');
        $this->load->model('Package_model');
        $this->load->model('Drum_model');
        $this->load->model('Well_model');
        $this->load->model('Company_model');
        $this->load->model('JobType_model');
        $this->load->model('Field_model');
    }

    public function index()
    {
        if (($open = fopen("C:/Users/mhanifazmi/Desktop/response.csv", "r")) !== FALSE) {

            while (($data = fgetcsv($open, 0, ",")) !== FALSE) {
                $array[] = $data;
            }

            fclose($open);
        }

        unset($array[0]);

        $set = [];

        $company_id = $this->company("DELEUM");
        $field_id = $this->field_id("Field A");

        foreach ($array as $key => $arr) {
            $data = [
                'created_at' => date('Y-m-d H:i:s', strtotime($arr[0])),
                'issued_at' => date('Y-m-d H:i:s', strtotime($arr[1])),
                'operator_id' => $arr[2],
                'supervisor_name' => strtoupper($arr[3]),
                'client_id' => $arr[4],
                'package_id' => $arr[5],
                'drum_id' => $arr[6],
                'wrap_test' => $arr[7],
                'pull_test' => $arr[8],
                'x_inch' => $arr[9],
                'y_inch' => $arr[10],
                'cut_off' => $arr[11],
                'well_id' => $arr[12],
                'job_type_id' => $arr[13],
                'jar_number' => $arr[14],
                'max_pull' => $arr[15],
                'duration' => $arr[16],
                'smart_monitor_id' => $arr[17],
                'remarks' => $arr[18],
                'max_depth' => $arr[19],
            ];

            $data['operator_id'] = $this->operator($data['operator_id'], $company_id);
            $data['client_id'] = $this->client_id($data['client_id'], $company_id);
            $data['package_id'] = $this->package_id($data['package_id']);
            $data['drum_id'] = $this->drum_id($data['drum_id']);
            $data['well_id'] = $this->well_id($data['well_id'], $field_id);
            $data['job_type_id'] = $this->job_type_id($data['job_type_id']);

            $set[] = $data;

            $client_id = $data['client_id'];
            $package_id = $data['package_id'];
            $drum_id = $data['drum_id'];
        }

        $wire = [
            'company_id' => $company_id,
            'client_id' => $client_id,
            "name" => "CWR-0855",
            'package_id' => $package_id,
            'drum_id' => $drum_id,
            'size' => 0.108,
            'brand' => 'SUPA75',
            'grade' => '-',
            'manufacturer' => "SUPA75 DWS",
            'initial_length' => 25918,
            'first_spooling_at' => date('Y-m-d', strtotime('2021-12-02')),
        ];

        $wire_id = $this->Wire_model->store($wire);

        foreach ($set as $data) {
            $data['wire_id'] = $wire_id;
            $data['smart_monitor_id'] = null;
            $data['job_status'] = '';
            $this->Trial_model->store($data);
        }

        print_r($set);
    }

    public function operator($operator_id, $company_id)
    {
        $operator = $this->User_model->search([
            [
                'value' => $operator_id,
                'column' => 'name',
                'type' => 'and'
            ]
        ]);

        if (is_null($operator)) {
            $name = $operator_id;

            $user_data = [
                "name" => $name,
                "username" => $this->Utility_model->slugify($name),
                "contact" => rand(100000000, 999999999),
                'email' => $this->Utility_model->slugify($name) . '@yopmail.com',
                'role_id' => 4,
                'password' => password_hash('12341234', PASSWORD_BCRYPT),
                'company_id' => $company_id
            ];
            $id = $this->User_model->store($user_data);

            return $id;
        } else {
            return $operator['id'];
        }
    }

    public function client_id($client_id, $company_id)
    {
        $client = $this->Client_model->search([
            [
                'value' => $client_id,
                'column' => 'name',
                'type' => 'and'
            ]
        ]);

        if (is_null($client)) {
            $name = $client_id;

            $data = [
                'name' => $name,
                'company_id' => 1,
            ];
            $id = $this->Client_model->store($data);

            return $id;
        } else {
            return $client['id'];
        }
    }

    public function package_id($package_id)
    {
        $package = $this->Package_model->search([
            [
                'value' => $package_id,
                'column' => 'name',
                'type' => 'and'
            ]
        ]);

        if (is_null($package)) {
            $name = $package_id;

            $data = [
                'name' => $name,
            ];

            $id = $this->Package_model->store($data);

            return $id;
        } else {
            return $package['id'];
        }
    }

    public function field_id($name)
    {
        $data = [
            'name' => $name,
        ];

        $id = $this->Field_model->store($data);

        return $id;
    }

    public function drum_id($drum_id)
    {
        $drum = $this->Drum_model->search([
            [
                'value' => $drum_id,
                'column' => 'name',
                'type' => 'and'
            ]
        ]);

        if (is_null($drum)) {
            $name = $drum_id;

            $data = [
                'name' => $name,
            ];

            $id = $this->Drum_model->store($data);

            return $id;
        } else {
            return $drum['id'];
        }
    }

    public function well_id($well_id, $field_id)
    {
        $well = $this->Well_model->search([
            [
                'value' => $well_id,
                'column' => 'name',
                'type' => 'and'
            ]
        ]);

        if (is_null($well)) {
            $name = $well_id;

            $data = [
                'name' => $name,
                'field_id' => $field_id,
                'tubing_size' => 1.0,
                'max_angle' => 2.0,
                'type' => '-',
                'schematic' => '-',
            ];

            $id = $this->Well_model->store($data);

            return $id;
        } else {
            return $well['id'];
        }
    }

    public function job_type_id($job_type_id)
    {
        $job_type = $this->JobType_model->search([
            [
                'value' => $job_type_id,
                'column' => 'name',
                'type' => 'and'
            ]
        ]);

        if (is_null($job_type)) {
            $name = $job_type_id;

            $data = [
                'name' => $name,
            ];

            $id = $this->JobType_model->store($data);

            return $id;
        } else {
            return $job_type['id'];
        }
    }

    public function company($name)
    {
        $data = [
            "name" => $name,
        ];

        return $this->Company_model->store($data);
    }
}
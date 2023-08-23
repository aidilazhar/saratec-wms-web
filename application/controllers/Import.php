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
        $this->load->model('Shift_model');
        $this->load->model('Smart_monitor_model');
        $this->load->model('ThirdPartyData_model');

        $this->reps = 0;
        $this->representatives = [
            "Brodie Delatorre",
            "Wednesday Dollar",
            "Mason Galbraith",
            "Damiya Egbert",
            "Aiven Ogburn",
            "Teegan Griego",
            "Italia Doll",
            "Devion Graybill",
            "Ihsan Hovis",
            "Evelina Tharp",
            "Younis Knisley",
            "Ashten Orth",
            "Kameron Deleon",
            "Angelie Steinmetz",
            "Zaniya Collazo",
            "Gabriela Petersen",
            "Binyomin Ridgway",
            "Vianney Coffin",
            "Eliot Diggs",
            "Benton Moreland",
        ];
    }

    public function index()
    {
        if (($open = fopen("C:/Users/mhanifazmi/Desktop/records/cwr-0855.csv", "r")) !== FALSE) {

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
            if ($key % 4 === 0) {
                $this->operator($arr['2'], $company_id, true);
            } else {
                $this->operator($arr['2'], $company_id);
            }
            $this->drum_id($arr[6]);
        }
        $drums = $this->Drum_model->list();
        $drum2_id = $drums[rand(0, count($drums) - 1)]['id'];

        $i = 15;
        foreach ($array as $key => $arr) {
            $drum_id = $this->drum_id($arr[6]);
            $client_id =  $this->client_id($arr[4], $company_id);
            $package_id = $this->package_id($arr[5], $drum_id, $drum2_id, $client_id);
            if ($i == 15) {
                $i = 0;
                $in_duty = $this->get_in_duty($company_id, $package_id);
            }

            if ($key % 2 == 0) {
                $duty = $in_duty['night'];
            } else {
                $duty = $in_duty['day'];
            }

            $data = [
                'created_at' => date('Y-m-d H:i:s', strtotime($arr[0])),
                'issued_at' => date('Y-m-d H:i:s', strtotime($arr[1])),
                'operator_id' => $duty['operator_id'],
                'assistant1_id' => $duty['assistant1_id'],
                'assistant2_id' => $duty['assistant2_id'],
                'assistant3_id' => $duty['assistant3_id'],
                'supervisor_name' => strtoupper($arr[3]),
                'client_id' => $client_id,
                'package_id' => $package_id,
                'drum_id' => $drum_id,
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


            if (!is_numeric($data['x_inch'])) {
                $data['x_inch'] = 0;
            }

            if (!is_numeric($data['y_inch'])) {
                $data['y_inch'] = 0;
            }

            if (!is_numeric($data['max_depth'])) {
                $data['max_depth'] = 0;
            }

            $data['well_id'] = $this->well_id($data['well_id'], $field_id);
            $data['job_type_id'] = $this->job_type_id($data['job_type_id']);

            $set[] = $data;

            $client_id = $data['client_id'];
            $package_id = $data['package_id'];
            $drum_id = $data['drum_id'];

            $i++;
        }

        $wire = [
            "name" => "CWR-0855",
            "url" => slugify("CWR-0855"),
            'company_id' => $company_id,
            'client_id' => $client_id,
            'package_id' => $package_id,
            'drum_id' => $drum_id,
            'size' => 0.108,
            'range' => 0.0012,
            'initial_length' => 25918,
            'brand' => 'SUPA75',
            'grade' => 'Duplex SS',
            'manufacturer' => "SUPA75 DWS",
        ];

        $wire_id = $this->Wire_model->store($wire);

        foreach ($set as $s) {
            $s['wire_id'] = $wire_id;
            $s['smart_monitor_id'] = null;
            $s['job_status'] = '';
            $result = $this->Trial_model->store($s);

            if ($result != 'success') {
                print_r($result);
                return;
            }
        }

        $this->thirdPartyData($wire_id);
        $i++;
    }

    public function operator($operator_id, $company_id, $is_operator = false)
    {
        if ($is_operator == true) {
            $role_id = ROLE_OPERATOR;
        } else {
            $role_id = ROLE_OPERATOR_ASSISTANT;
        }
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
                "contact" => '01' . rand(1, 9) . '-' . rand(1000000, 9999999),
                'email' => $this->Utility_model->slugify($name) . '@yopmail.com',
                'role_id' => $role_id,
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
                'representative' => $this->representatives[$this->reps],
                'company_id' => 1,
            ];
            $this->reps++;
            $id = $this->Client_model->store($data);

            return $id;
        } else {
            return $client['id'];
        }
    }

    public function package_id($package_id, $drum_id, $drum2_id, $client_id)
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
                'drum1_id' => $drum_id,
                'drum2_id' => $drum2_id,
                'client_id' => $client_id,
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
        $company = $this->Company_model->search([
            [
                'value' => $name,
                'column' => 'name',
                'type' => 'and'
            ]
        ]);

        if (is_null($company)) {
            $data = [
                "name" => $name,
                "password" => password_hash($name, PASSWORD_BCRYPT),
            ];

            return $this->Company_model->store($data);
        } else {
            return $company['id'];
        }
    }

    public function thirdPartyData($wire_id)
    {
        $files = [
            '107202182654.csv',
            '107202192447.csv',
            '162021153833.csv',
            '1072021122454.csv',
            '1072021171029.csv'
        ];

        foreach ($files as $file) {
            $csvFilePath = 'C:/Users/mhanifazmi/Desktop/third_party/' . $file;
            $path = 'wires/' . $wire_id . '/smart_monitors';
            $this->Utility_model->mkdir($path);

            // Extract the filename from the URL
            $filename = $this->Smart_monitor_model->lastEntry() + 1;
            $fileExtension = pathinfo($csvFilePath, PATHINFO_EXTENSION);

            // Download the file using cURL
            $fileData = file_get_contents($csvFilePath);

            $smart_monitor_data = [
                'name' => $filename,
                'url' => $path . '/' . $filename . '.' . $fileExtension,
            ];

            $smart_monitor_id = $this->Smart_monitor_model->store($smart_monitor_data);

            if ($fileData !== false) {
                // Write the file to the destination folder
                file_put_contents('temp/' . $path . '/' . $filename . '.' . $fileExtension, $fileData);
            }
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
                        'wire_id' => $wire_id,
                        'smart_monitor_id' => $smart_monitor_id,
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
            } else {
                echo $result['message'];
                break;
            }
        }
        echo "Good";
    }

    public function get_in_duty($company_id, $package_id)
    {

        $shifts = [
            'day',
            'night',
        ];

        $days = [];
        $nights = [];

        foreach ($shifts as $key => $shift) {
            $operators = $this->User_model->list([$company_id], [ROLE_OPERATOR]);
            $operator_assistants = $this->User_model->list([$company_id], [ROLE_OPERATOR_ASSISTANT]);

            $operator_id = $operators[rand(0, count($operators) - 1)]['id'];

            if ($shift == 'day') {
                for ($i = 0; $i < 100; $i++) {
                    $a = rand(0, count($operator_assistants) - 1);
                    if (!in_array($a, $days)) {
                        $days[] = $a;
                    }

                    if (count($days) == 3) break;
                }

                $operator_assistant1 = $operator_assistants[$days[0]]['id'];
                $operator_assistant2 = $operator_assistants[$days[1]]['id'];
                $operator_assistant3 = $operator_assistants[$days[2]]['id'];
            } else {
                for ($i = 0; $i < 100; $i++) {
                    $a = rand(0, count($operator_assistants) - 1);
                    if (!in_array($a, $nights) && !in_array($a, $days)) {
                        $nights[] = $a;
                    }

                    if (count($nights) == 3) break;
                }

                $operator_assistant1 = $operator_assistants[$nights[0]]['id'];
                $operator_assistant2 = $operator_assistants[$nights[1]]['id'];
                $operator_assistant3 = $operator_assistants[$nights[2]]['id'];
            }

            $data = [
                'shift' => $shift,
                'package_id' => $package_id,
                'operator_id' => $operator_id,
                'assistant1_id' => $operator_assistant1,
                'assistant2_id' => $operator_assistant2,
                'assistant3_id' => $operator_assistant3,
            ];

            if ($shift == 'day') {
                $day_data = $data;
            } else {
                $night_data = $data;
            }

            $this->Shift_model->store($data);
        }

        return [
            'day' => $day_data,
            'night' => $night_data,
        ];
    }
}

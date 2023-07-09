<?php
defined('BASEPATH') or exit('No direct script access allowed');
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: *");
header("Access-Control-Allow-Methods: GET, OPTIONS, POST");

class Api extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->helper('hashids');

        $this->load->model('Authentication_model');
        $this->load->model('Setting_model');
        $this->load->model('Wire_model');
        $this->load->model('Utility_model');
        $this->load->model('User_model');
        $this->load->model('Smart_monitor_model');
        $this->load->model('Company_model');
        $this->load->model('Client_model');
        $this->load->model('Trial_model');
        $this->load->model('Drum_model');
        $this->load->model('JobType_model');
        $this->load->model('Well_model');
        $this->load->model('LabTest_model');
        $this->load->model('Report_model');
    }

    public function getClients()
    {
        try {
            $company_id = $this->input->post('company_id');
            $clients = $this->Client_model->list($company_id);

            echo $this->Utility_model->apiReturn(1, 'Data fetch successfully', json_encode($clients));
            return;
        } catch (Exception $e) {
            echo $this->Utility_model->apiReturn(0, $e->getMessage());
            return;
        }
    }

    public function options()
    {
        try {
            $settings = $this->input->post('options');
            $settings = explode(', ', $settings);

            $options = [];
            foreach ($settings as $setting) {
                $result = $this->Setting_model->options($setting);
                $options[$setting] = $result;
            }

            echo $this->Utility_model->apiReturn(1, 'Data fetch successfully', $options);
            return;
        } catch (Exception $e) {
            echo $this->Utility_model->apiReturn(0, $e->getMessage());
            return;
        }
    }

    public function login()
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
            $data = [
                'hash_id' => encode($user['id']),
            ];

            echo  json_encode([
                'status' => 1,
                'message' => 'User login successfully',
                'data' => $data
            ]);
        } else {
            $data = [
                'hash_id' => null
            ];

            echo json_encode([
                'status' => 0,
                'message' => 'Login failed',
                'data' => $data
            ]);
        }
    }

    public function profile($hash_id)
    {
        $user_id = decode($hash_id);
        $user = $this->User_model->details($user_id);

        if (!empty($user)) {
            echo $this->Utility_model->apiReturn(1, 'Data fetch successfully', compact('user'));
        } else {
            echo $this->Utility_model->apiReturn();
        }
    }

    public function supervisors()
    {
        $supervisors = $this->Setting_model->supervisors();

        echo $this->Utility_model->apiReturn(1, "Data fetch successfully", compact('supervisors'));
    }

    public function wireStore()
    {
        $data = $this->input->post();

        $is_smart_monitor = $data['is_smart_monitor'];
        unset($data['is_smart_monitor']);

        if ($is_smart_monitor == 1) {
            $path = 'wires/' . $data['wire_id'] . '/smart_monitors';

            $this->Utility_model->mkdir($path);
            $config['upload_path']          = 'temp/' . $path;
            $config['allowed_types']        = 'csv';
            $config['file_name']        = $this->Smart_monitor_model->lastEntry() + 1;
            $config['max_size']             = 10000000;

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('smart_monitor_file')) {
                $error = array('error' => $this->upload->display_errors());
                echo $this->Utility_model->apiReturn(0, $error);
                return;
            } else {
                $upload_data = array('upload_data' => $this->upload->data());
                $smart_monitor_data = [
                    'name' => $upload_data['upload_data']['file_name'],
                    'url' => $path . '/' . $upload_data['upload_data']['file_name'] . $upload_data['upload_data']['file_ext'],
                ];

                $smart_monitor_id = $this->Smart_monitor_model->store($smart_monitor_data);
                $data['smart_monitor_id'] = $smart_monitor_id;
            }
        }

        $results = $this->Trial_model->storeApi($data);

        echo json_encode($results);
    }

    public function chatgpt()
    {
        // $api_key = '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';
        // $endpoint = 'https://api.openai.com/v1/models';

        // // Set up the request headers
        // $headers = array(
        //     'Content-Type: application/json',
        //     'Authorization: Bearer ' . $api_key
        // );

        // // Send the HTTP request to the OpenAI API
        // $ch = curl_init();
        // curl_setopt($ch, CURLOPT_URL, $endpoint);
        // curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        // curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        // $response = curl_exec($ch);
        // curl_close($ch);

        // // Parse the JSON response and extract the model IDs
        // $json = json_decode($response, true);
        // $models = $json['data'];
        // $model_ids = array();
        // foreach ($models as $model) {
        //     $model_ids[] = $model['id'];
        // }

        // print_r($model_ids);

        $api_key = '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';
        $model_id = 'ada';
        $endpoint = 'https://api.openai.com/v1/completions';

        // Set up the request headers
        $headers = array(
            'Content-Type: application/json',
            'Authorization: Bearer ' . $api_key
        );

        // Set up the request data
        $data = array(
            'prompt' => 'Hello, how are you today?',
            'max_tokens' => 50,
            'temperature' => 0.5,
            'model' => $model_id
        );

        // Send the HTTP request to the OpenAI API
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $endpoint);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        $response = curl_exec($ch);
        curl_close($ch);

        // Parse the JSON response and extract the generated text
        $json = json_decode($response, true);
        //$generated_text = $json['choices'][0]['text'];

        print_r($json);
        //echo $generated_text;
    }

    public function masterDashboard()
    {
        $wires = $this->Wire_model->list();

        $data = [];
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

            $data[] = [
                'id' => $wire['id'],
                'name' => $wire['name'],
                'brand' => $wire['brand'],
                'wire_od' => $wire['size'],
                'length' => $wire['initial_length'],
                'spooling_date' => $spooling_date,
                'wire_balances' => $wire['initial_length'] - array_sum(array_column($trials, 'cut_off')),
                'wire_balances_percent' => round((($wire['initial_length'] - array_sum(array_column($trials, 'cut_off'))) / $wire['initial_length']) * 100),
                'last_entry' => $this->Trial_model->last_entry($wire['id']),
                'total_running_number_hours' => $hours,
            ];
        }

        echo json_encode(['wires' => $data]);
    }

    public function wireDashboard()
    {
        $wire_id = $this->input->post('wire_id');
        $wire = $this->Wire_model->details($wire_id);

        $operators = $this->User_model->list([], [ROLE_OPERATOR]);
        $trials = $this->Trial_model->list([$wire_id]);
        $lab_tests = $this->LabTest_model->list([$wire_id]);
        $drums = $this->Drum_model->list();

        $jobs = $wlls = $tj = $w = [];
        $current_not_exposed_to_well_cond = $sum_cut_off = 0;
        foreach ($trials as $key => $row) {
            if (isset($jobs[$row['job_type_id']])) {
                $jobs[$row['job_type_id']] = $jobs[$row['job_type_id']] + 1;
            } else {
                $tj[] = $row['job_type_id'];
                $jobs[$row['job_type_id']] = 1;
            }

            if (isset($wlls[$row['well_id']])) {
                $wlls[$row['well_id']] = $wlls[$row['well_id']] + 1;
            } else {
                $w[] = $row['well_id'];
                $wlls[$row['well_id']] = 1;
            }

            $sum_cut_off = $sum_cut_off + $row['cut_off'];

            if ($row['max_depth'] == '') {
                $max_depth = 0;
            } else {
                $max_depth = $row['max_depth'];
            }

            $trials[$key]['not_exposed_to_well_cond'] = $wire['initial_length'] - $sum_cut_off - $max_depth;

            if ($key == 0) {
                $current_not_exposed_to_well_cond = $trials[$key]['not_exposed_to_well_cond'];
            } else {
                if ($trials[$key]['not_exposed_to_well_cond'] < $current_not_exposed_to_well_cond) {
                    $current_not_exposed_to_well_cond = $trials[$key]['not_exposed_to_well_cond'];
                }
            }

            $clients[] = $row['client_id'];
        }

        $job_types = $this->JobType_model->list([
            'id' => $tj
        ]);

        $wells = $this->Well_model->list([
            'id' => $w
        ]);

        $clients = array_unique($clients);

        $clients = $this->Client_model->list(null, [
            'id' => $clients
        ]);

        foreach ($job_types as $key => $job_type) {
            $job_types[$key]['total'] = $jobs[$job_type['id']] ? $jobs[$job_type['id']] : 0;
        }

        foreach ($wells as $key => $well) {
            $wells[$key]['total'] = $wlls[$well['id']] ? $wlls[$well['id']] : 0;
        }

        usort($wells, function ($a, $b) {
            return $a['total'] <=> $b['total'];
        });

        $wells = array_reverse($wells);

        usort($job_types, function ($a, $b) {
            return $a['total'] <=> $b['total'];
        });

        $job_types = array_reverse($job_types);

        $trials = $this->Trial_model->list([$wire_id]);
        $trials_except = $this->Trial_model->list([$wire_id], [1, 16]);

        $mins = array_sum(array_column($trials_except, 'duration'));
        $hours = intdiv($mins, 60);
        $days = round($hours / 24);

        $data = [
            'wire_id' => $wire['name'],
            'brand' => $wire['brand'],
            'wire_od' => $wire['size'],
            'length' => $wire['initial_length'],
            'current_cut_off_rate' => number_format((array_sum(array_column($trials, 'cut_off')) / count($trials)), 2),
            'average_run_duration' => number_format(($hours / count($trials)), 2),
            'average_tension' => number_format((array_sum(array_column($trials, 'max_pull')) / count($trials)), 2),
            'max_tension_applied' => number_format(($this->Trial_model->max_tension() / count($trials)) * 100, 2),
            'total_number_run' => count($trials_except),
            'clients' => $clients,
            'total_running_hours' => $hours,
            'total_running_days' => $days,
            'wire_balances' => $wire['initial_length'] - array_sum(array_column($trials, 'cut_off')),
            'wire_balances_percent' => round((($wire['initial_length'] - array_sum(array_column($trials, 'cut_off'))) / $wire['initial_length']) * 100),
            'not_exposed_to_well_cond' => $current_not_exposed_to_well_cond,
            'wells' => $wells,
            'job_types' => $job_types,
            'wire_records' => $trials,
            'lab_tests' => $lab_tests
        ];

        echo json_encode(compact('data'));
    }

    public function wireMaterialCertifications()
    {
        $wire_id = $this->input->post('wire_id');
        $wire = $this->Wire_model->details($wire_id);

        if (!is_null($wire['material_certifications'])) {
            $material_certifications = base64_encode(file_get_contents(temp_url($wire['material_certifications'])));
        } else {
            $material_certifications = null;
        }

        echo json_encode(compact('material_certifications'));
    }

    public function wireOtherReports()
    {
        $wire_id = $this->input->post('wire_id');
        $reports = $this->Report_model->list([$wire_id]);

        echo json_encode(compact('reports'));
    }

    public function wireThirdPartyData()
    {
        $wire_id = $this->input->post('wire_id');

        echo json_encode(compact('wire_id'));
    }

    public function wireTechSheet()
    {
        $wire_id = $this->input->post('wire_id');
        $wire = $this->Wire_model->details($wire_id);

        if (!is_null($wire['material_certifications'])) {
            $tech_sheet = base64_encode(file_get_contents(temp_url($wire['tech_sheet'])));
        } else {
            $tech_sheet = null;
        }

        echo json_encode(compact('tech_sheet'));
    }

    public function wireStoreMultiple()
    {
        $data = $this->input->post();
        $error = [];

        $wire_id = $data['wire_id'];
        $issued_at = $data['issued_at'];
        $operator_id = $data['operator_id'];
        $supervisor_name = $data['supervisor_name'];
        $client_id = $data['client_id'];
        $package_id = $data['package_id'];
        $drum_id = $data['drum_id'];
        $wrap_test = $data['wrap_test'];
        $pull_test = $data['pull_test'];
        $x_inch = $data['x_inch'];
        $y_inch = $data['x_inch'];
        $cut_off = $data['cut_off'];
        $well_id = $data['well_id'];

        $files = $_FILES;
        $i = 0;

        foreach ($data['job_type_id'] as $key => $job_type_id) {
            $inputs = compact('wire_id', 'issued_at', 'operator_id', 'supervisor_name', 'client_id', 'package_id', 'drum_id', 'wrap_test', 'pull_test', 'x_inch', 'y_inch', 'cut_off', 'well_id');
            $inputs['job_type_id'] = $job_type_id;
            $inputs['jar_number'] = $data['jar_number'][$key];
            $inputs['max_pull'] = $data['max_pull'][$key];
            $inputs['max_depth'] = $data['max_depth'][$key];
            $inputs['duration'] = $data['duration'][$key];
            $inputs['remarks'] = $data['remarks'][$key];
            $inputs['job_status'] = $data['job_status'][$key];
            $inputs['smart_monitor_hidden'] = $data['smart_monitor_hidden'][$key];

            if ($inputs['smart_monitor_hidden'] == 1) {
                $path = 'wires/' . $wire_id . '/smart_monitors';

                $this->Utility_model->mkdir($path);
                $config['upload_path']          = 'temp/' . $path;
                $config['allowed_types']        = 'csv|xlsx';
                $config['file_name']        = $this->Smart_monitor_model->lastEntry() + 1;
                $config['max_size']             = 10000000;

                // Loop through each file and upload them
                $_FILES['smart_monitor_csv']['name'] = $files['smart_monitor_csv']['name'][$i];
                $_FILES['smart_monitor_csv']['type'] = $files['smart_monitor_csv']['type'][$i];
                $_FILES['smart_monitor_csv']['tmp_name'] = $files['smart_monitor_csv']['tmp_name'][$i];
                $_FILES['smart_monitor_csv']['error'] = $files['smart_monitor_csv']['error'][$i];
                $_FILES['smart_monitor_csv']['size'] = $files['smart_monitor_csv']['size'][$i];

                // Initialize the Upload library with the configuration
                $this->load->library('upload', $config);
                $this->upload->initialize($config);

                // Upload the file
                if ($this->upload->do_upload('smart_monitor_csv')) {
                    $upload_data = array('upload_data' => $this->upload->data());
                    $smart_monitor_data = [
                        'name' => $upload_data['upload_data']['file_name'],
                        'url' => $path . '/' . $upload_data['upload_data']['file_name'],
                    ];

                    $smart_monitor_id = $this->Smart_monitor_model->store($smart_monitor_data);
                    $inputs['smart_monitor_id'] = $smart_monitor_id;
                } else {
                    $error[] = array('error' => $this->upload->display_errors());
                }
                $i++;
            }

            $inputs['wire_id'] = $wire_id;
            $inputs['operator_id'] = auth()->id;

            unset($inputs['smart_monitor']);
            unset($inputs['smart_monitor_hidden']);

            $res = $this->Trial_model->store($inputs);
        }

        if (!empty($error)) {
            print_r($error);
            return;
        }
        echo json_encode($res);
    }

    public function slugify()
    {
        $text = $this->input->post('text');
        $text = slugify($text);
        echo $text;
        return;
    }

    public function wellNamePrefix()
    {
        $prefixes = $this->db->select('SUBSTRING_INDEX(name, "-", 1) AS prefix')
            ->from('wells')
            ->where('is_deleted', 0)
            ->group_by('prefix')
            ->get()
            ->result_array();

        echo json_encode($prefixes);
        return;
    }

    public function wellNamePostfix()
    {
        $prefix = $this->input->post('prefix');

        $prefix = $prefix . '-';

        $data = $this->db->select('SUBSTRING_INDEX(name, "-", -1) AS postfix')
            ->from('wells')
            ->where('name LIKE', $prefix . '%')
            ->where('is_deleted', 0)
            ->group_by('postfix')
            ->get()
            ->result_array();

        echo json_encode($data);
        return;
    }
}

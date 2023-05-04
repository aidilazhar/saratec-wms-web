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
    }

    public function getClients()
    {
        try {
            $company_id = $this->input->post('company_id');
            $clients = $this->Client_model->list($company_id);

            echo $this->Utility_model->apiReturn(1, 'Data fetch successfully', $clients);
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
            $path = 'assets/upload/smart-monitor/' . $data['wire_id'];

            $this->Utility_model->mkdir($path);
            $config['upload_path']          = $path;
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

                $results = $this->Smart_monitor_model->store($smart_monitor_data);
            }
        }

        $results = $this->Wire_model->store($data);

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
}

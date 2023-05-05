<?php
class Trial_model extends CI_Model
{
    public function __construct()
    {
        $this->table = 'trial';
        parent::__construct();

        $this->load->helper('url');
        $this->load->helper('form');

        $this->with = [];

        $this->appends = [
            [
                'from_name' => 'trials',
                'name' => 'drums',
                'as' => 'drums',
                'prefix' => 'drum',
                'self_column' => 'id',
                'relation_column' => 'drum_id',
                'get' => 'name',
                'type' => 'left'
            ],
            [
                'from_name' => 'trials',
                'name' => 'job_types',
                'as' => 'job_types',
                'prefix' => 'job_type',
                'self_column' => 'id',
                'relation_column' => 'job_type_id',
                'get' => 'name',
                'type' => 'left'
            ],
            [
                'from_name' => 'trials',
                'name' => 'packages',
                'as' => 'packages',
                'prefix' => 'package',
                'self_column' => 'id',
                'relation_column' => 'package_id',
                'get' => 'name',
                'type' => 'left'
            ],
            [
                'from_name' => 'trials',
                'name' => 'clients',
                'as' => 'clients',
                'prefix' => 'client',
                'self_column' => 'id',
                'relation_column' => 'client_id',
                'get' => 'name',
                'type' => 'left'
            ],
            [
                'from_name' => 'trials',
                'name' => 'users',
                'as' => 'operators',
                'prefix' => 'operator',
                'self_column' => 'id',
                'relation_column' => 'operator_id',
                'get' => 'name',
                'type' => 'left'
            ],
            [
                'from_name' => 'trials',
                'name' => 'users',
                'as' => 'supervisors',
                'prefix' => 'supervisor',
                'self_column' => 'id',
                'relation_column' => 'supervisor_id',
                'get' => 'name',
                'type' => 'left'
            ],
            [
                'from_name' => 'clients',
                'name' => 'companies',
                'as' => 'companies',
                'prefix' => 'company',
                'self_column' => 'id',
                'relation_column' => 'company_id',
                'get' => 'name',
                'type' => 'left'
            ],
        ];
    }

    public function list($wire_id = [])
    {
        $select = '';
        foreach ($this->appends as $append) {
            $select .= $append['as'] . '.' . $append['get'] . ' AS ' . $append['prefix'] . '_' . $append['get'] . ', ';
        }
        $this->db->select('trials.*, ' . $select);
        $this->db->from('trials as trials');
        foreach ($this->appends as $key => $append) {
            $this->db->join($append['name'] . ' as ' .  $append['as'], ($append['as'] . '.' . $append['self_column']) . ' = ' . $append['from_name'] . '.' . $append['relation_column'], $append['type']);
        }
        if (!empty($wire_id)) {
            $this->db->where_in('wire_id', $wire_id);
        }
        $this->db->where('trials.is_deleted', 0);
        $results = $this->db->get()->result_array();

        foreach ($results as $key => $result) {
            foreach ($this->with as $with) {
                $results[$key][$with['name']] = $this->Utility_model->relation($with['name'], $with['column'], $result['id'], $with['relation']);
            }
        }

        // if (!empty($this->db->error()['message'])) {
        //     return [
        //         'status' => 0,
        //         'message' => $this->db->error()['message'],
        //     ];
        // } else {
        //     return [
        //         'status' => 1,
        //         'message' => 'The data has been stored successfully',
        //     ];
        // }

        return $results;
    }

    public function details($package_id)
    {
        $this->db->select('*');
        $this->db->from('trials');
        $this->db->where('id', $package_id);
        $results = $this->db->get()->result_array();

        foreach ($results as $key => $result) {
            foreach ($this->with as $with) {
                $results[$key][$with['name']] = $this->Utility_model->relation($with['name'], $with['column'], $result['id'], $with['relation']);
            }
        }

        foreach ($results as $key => $result) {
            foreach ($this->appends as $append) {
                $results[$key][$append] = call_package_func(array('Trial_model', 'append_' . $append), $result);
            }
        }

        if (empty($results)) {
            return [];
        } else {
            return $results[0];
        }
    }

    public function store($data)
    {
        $data['created_at'] = date('Y-m-d H:i:s');
        $this->db->insert('trials', $data);
        return $this->db->insert_id();
    }

    public function update($id, $data)
    {
        $data['updated_at'] = date('Y-m-d H:i:s');
        $this->db->where('id', $id);
        $this->db->update('trials', $data);
        return $id;
    }

    public function delete($id)
    {
        $data = [
            'is_deleted' => 1,
            'deleted_at' => date('Y-m-d H:i:s')
        ];

        $this->db->where('id', $id);
        $this->db->update('trials', $data);
        return $id;
    }

    public function storeApi($data)
    {
        $this->db->insert('trials', $data);

        if (!empty($this->db->error()['message'])) {
            return [
                'status' => 0,
                'message' => $this->db->error()['message'],
            ];
        } else {
            return [
                'status' => 1,
                'message' => 'The data has been stored successfully',
            ];
        }
    }
}

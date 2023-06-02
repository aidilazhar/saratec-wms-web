<?php
class Trial_model extends CI_Model
{
    public function __construct()
    {
        $this->table = 'trial';
        parent::__construct();

        $this->load->helper('url');
        $this->load->helper('form');

        $this->with = [
            [
                'name' => 'smart_monitors',
                'column' => 'id',
                'relation' => 'one'
            ],
        ];

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
                'name' => 'wells',
                'as' => 'wells',
                'prefix' => 'well',
                'self_column' => 'id',
                'relation_column' => 'well_id',
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

    public function list($wire_id = [], $job_type_except = [], $group_by = null)
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
        if (!empty($job_type_except)) {
            $this->db->where_not_in('job_type_id', $job_type_except);
        }
        $this->db->where('trials.is_deleted', 0);
        if (!is_null($group_by)) {
            $this->db->group_by($group_by);
        }
        $results = $this->db->get()->result_array();

        foreach ($results as $key => $result) {
            foreach ($this->with as $with) {
                $results[$key][$with['name']] = $this->Utility_model->relation($with['name'], $with['column'], $result['id'], $with['relation']);
            }
        }

        return $results;
    }

    public function details($trial_id)
    {
        $this->db->select('*');
        $this->db->from('trials');
        $this->db->where('id', $trial_id);
        $results = $this->db->get()->result_array();

        foreach ($results as $key => $result) {
            foreach ($this->with as $with) {
                $results[$key][$with['name']] = $this->Utility_model->relation($with['name'], $with['column'], $result['id'], $with['relation']);
            }
        }

        foreach ($this->appends as $key => $append) {
            $this->db->join($append['name'] . ' as ' .  $append['as'], ($append['as'] . '.' . $append['self_column']) . ' = ' . $append['from_name'] . '.' . $append['relation_column'], $append['type']);
        }

        if (empty($results)) {
            return [];
        } else {
            return $results[0];
        }
    }

    public function store($data)
    {
        if (!isset($data['created_at'])) {
            $data['created_at'] = date('Y-m-d H:i:s');
        }

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

    public function last_entry($wire_id)
    {
        $select = '';
        foreach ($this->appends as $append) {
            $select .= $append['as'] . '.' . $append['get'] . ' AS ' . $append['prefix'] . '_' . $append['get'] . ', ';
        }
        $this->db->select('trials.*, ' . $select);
        $this->db->from('trials as trials');
        $this->db->where('wire_id', $wire_id);
        foreach ($this->appends as $key => $append) {
            $this->db->join($append['name'] . ' as ' .  $append['as'], ($append['as'] . '.' . $append['self_column']) . ' = ' . $append['from_name'] . '.' . $append['relation_column'], $append['type']);
        }
        $this->db->where('trials.is_deleted', 0);
        $this->db->order_by('trials.id', 'DESC');
        $this->db->limit(1);
        $results = $this->db->get()->result_array();

        if (empty($results)) {
            return [];
        } else {
            return $results[0];
        }
    }

    public function max_tension_applied($wire_id)
    {
        $this->db->select('*');
        $this->db->from('trials');
        $this->db->where('is_deleted', 0);
        $this->db->where('wire_id', $wire_id);
        $this->db->where('max_pull > ', 1000);
        $results = $this->db->get()->result_array();

        return $results;
    }

    public function first_spooling_date($wire_id)
    {
        $this->db->select('issued_at');
        $this->db->from('trials');
        $this->db->where('is_deleted', 0);
        $this->db->where('wire_id', $wire_id);
        $this->db->order_by('issued_at');
        $this->db->limit('1');
        $results = $this->db->get()->result_array();

        if (!empty($results)) {
            return date('d M Y', strtotime($results[0]['issued_at']));
        } else {
            return '-';
        }
    }
}

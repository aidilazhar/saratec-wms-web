<?php
class Client_model extends CI_Model
{
    public function __construct()
    {
        $this->table = 'client';
        parent::__construct();

        $this->load->helper('url');
        $this->load->helper('form');

        $this->with = [];

        $this->appends = [];
    }

    public function list($company_id = null, $filters = [])
    {
        $this->db->select('*');
        $this->db->from('clients');
        foreach ($filters as $key => $filter) {
            if (!empty($filter)) {
                $this->db->where_in($key, $filter);
            } else {
                $this->db->where($key, 0);
            }
        }
        $this->db->where('is_deleted', 0);
        if (!is_null($company_id)) {
            $this->db->where('company_id', $company_id);
        }
        $results = $this->db->get()->result_array();

        foreach ($results as $key => $result) {
            foreach ($this->with as $with) {
                $results[$key][$with['name']] = $this->Utility_model->relation($with['name'], $with['column'], $result['role_id']);
            }
        }

        foreach ($results as $key => $result) {
            foreach ($this->appends as $append) {
                $results[$key][$append] = call_package_func(array('Client_model', 'append_' . $append), $result);
            }
        }

        return $results;
    }

    public function details($client_id)
    {
        $this->db->select('*');
        $this->db->from('clients');
        $this->db->where('id', $client_id);
        $results = $this->db->get()->result_array();

        foreach ($results as $key => $result) {
            foreach ($this->with as $with) {
                $results[$key][$with['name']] = $this->Utility_model->relation($with['name'], $with['column'], $result['role_id']);
            }
        }

        foreach ($results as $key => $result) {
            foreach ($this->appends as $append) {
                $results[$key][$append] = call_package_func(array('Client_model', 'append_' . $append), $result);
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
        $data['created_by'] = auth()->id;
        $this->db->insert('clients', $data);
        return $this->db->insert_id();
    }

    public function update($id, $data)
    {
        $data['updated_at'] = date('Y-m-d H:i:s');
        $this->db->where('id', $id);
        $this->db->update('clients', $data);
        return $id;
    }

    public function delete($id)
    {
        $data = [
            'is_deleted' => 1,
            'deleted_at' => date('Y-m-d H:i:s')
        ];

        $this->db->where('id', $id);
        $this->db->update('clients', $data);
        return $id;
    }

    public function append_role_name($data)
    {
        return $data['roles']['name'];
    }

    public function search($search)
    {
        $i = 0;
        $this->db->select('*');
        $this->db->from('clients');
        foreach ($search as $key => $value) {
            if ($i == 0) {
                $this->db->where($value['column'], $value['value']);
            } else {
                if ($value['type'] == 'and') {
                    $this->db->where($value['column'], $value['value']);
                } else {
                    $this->db->or_where($value['column'], $value['value']);
                }
            }
            $i++;
        }

        $results = $this->db->get()->result_array();

        if (empty($results)) {
            return null;
        } else {
            return $results[0];
        }
    }
}

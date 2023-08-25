<?php
class Wire_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();

        $this->load->helper('url');
        $this->load->helper('form');

        $this->with = [
            [
                'name' => 'companies',
                'column' => 'id',
                'value' => 'company_id'
            ],
            [
                'name' => 'packages',
                'column' => 'id',
                'value' => 'package_id'
            ],
            [
                'name' => 'drums',
                'column' => 'id',
                'value' => 'drum_id'
            ],
        ];
        $this->appends = [];
    }

    public function list()
    {
        $this->db->select('*');
        $this->db->from('wires');
        if (!empty(auth())) {
            if (auth()->role_id == ROLE_COMPANY || auth()->role_id == ROLE_OPERATOR) {
                $this->db->where('company_id', auth()->company_id);
            }
        }

        $this->db->where('is_deleted', 0);
        $results = $this->db->get()->result_array();

        foreach ($results as $key => $result) {
            foreach ($this->with as $with) {
                $results[$key][$with['name']] = $this->Utility_model->relation($with['name'], $with['column'], $result[$with['value']]);
            }
        }

        foreach ($results as $key => $result) {
            foreach ($this->appends as $append) {
                $results[$key][$append] = call_package_func(array('Wire_model', 'append_' . $append), $result);
            }
        }

        return $results;
    }

    public function details($package_id)
    {
        $this->db->select('*');
        $this->db->from('wires');
        $this->db->where('id', $package_id);
        $results = $this->db->get()->result_array();

        foreach ($results as $key => $result) {
            foreach ($this->with as $with) {
                $results[$key][$with['name']] = $this->Utility_model->relation($with['name'], $with['column'], $result[$with['value']]);
            }
        }

        foreach ($results as $key => $result) {
            foreach ($this->appends as $append) {
                $results[$key][$append] = call_package_func(array('Wire_model', 'append_' . $append), $result);
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
        $this->db->insert('wires', $data);
        return $this->db->insert_id();
    }

    public function update($id, $data)
    {
        $data['updated_at'] = date('Y-m-d H:i:s');
        $this->db->where('id', $id);
        $this->db->update('wires', $data);
        return $id;
    }

    public function delete($id)
    {
        $data = [
            'is_deleted' => 1,
            'deleted_at' => date('Y-m-d H:i:s')
        ];

        $this->db->where('id', $id);
        $this->db->update('wires', $data);
        return $id;
    }

    public function dashboard($url)
    {
        $this->db->select('*');
        $this->db->from('wires');
        $this->db->where('url', $url);
        $results = $this->db->get()->result_array();

        foreach ($results as $key => $result) {
            foreach ($this->with as $with) {
                $results[$key][$with['name']] = $this->Utility_model->relation($with['name'], $with['column'], $result[$with['value']]);
            }
        }

        foreach ($results as $key => $result) {
            foreach ($this->appends as $append) {
                $results[$key][$append] = call_package_func(array('Wire_model', 'append_' . $append), $result);
            }
        }

        if (empty($results)) {
            return [];
        } else {
            return $results[0];
        }
    }
}

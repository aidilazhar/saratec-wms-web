<?php
class Drum_model extends CI_Model
{
    public function __construct()
    {
        $this->table = 'drum';
        parent::__construct();

        $this->load->helper('url');
        $this->load->helper('form');

        $this->with = [];

        $this->appends = [];
    }

    public function list()
    {
        $this->db->select('*');
        $this->db->from('drums');
        $this->db->where('is_deleted', 0);
        $results = $this->db->get()->result_array();

        foreach ($results as $key => $result) {
            foreach ($this->with as $with) {
                $results[$key][$with['name']] = $this->Utility_model->relation($with['name'], $with['column'], $result['role_id']);
            }
        }

        foreach ($results as $key => $result) {
            foreach ($this->appends as $append) {
                $results[$key][$append] = call_drum_func(array('Drum_model', 'append_' . $append), $result);
            }
        }

        return $results;
    }

    public function details($drum_id)
    {
        $this->db->select('*');
        $this->db->from('drums');
        $this->db->where('id', $drum_id);
        $results = $this->db->get()->result_array();

        foreach ($results as $key => $result) {
            foreach ($this->with as $with) {
                $results[$key][$with['name']] = $this->Utility_model->relation($with['name'], $with['column'], $result['role_id']);
            }
        }

        foreach ($results as $key => $result) {
            foreach ($this->appends as $append) {
                $results[$key][$append] = call_drum_func(array('Drum_model', 'append_' . $append), $result);
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
        $this->db->insert('drums', $data);
        return $this->db->insert_id();
    }

    public function update($id, $data)
    {
        $data['updated_at'] = date('Y-m-d H:i:s');
        $this->db->where('id', $id);
        $this->db->update('drums', $data);
        return $id;
    }

    public function delete($id)
    {
        $data = [
            'is_deleted' => 1,
            'deleted_at' => date('Y-m-d H:i:s')
        ];

        $this->db->where('id', $id);
        $this->db->update('drums', $data);
        return $id;
    }

    public function append_role_name($data)
    {
        return $data['roles']['name'];
    }
}
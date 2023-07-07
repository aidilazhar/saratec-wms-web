<?php
class LabTest_model extends CI_Model
{
    public function __construct()
    {
        $this->table = 'lab_tests';
        parent::__construct();

        $this->load->helper('url');
        $this->load->helper('form');

        $this->with = [];

        $this->appends = [];
    }

    public function list($wire_id = [])
    {
        $select = '';
        foreach ($this->appends as $append) {
            $select .= $append['as'] . '.' . $append['get'] . ' AS ' . $append['prefix'] . '_' . $append['get'] . ', ';
        }
        $this->db->select('lab_tests.*, ' . $select);
        $this->db->from('lab_tests as lab_tests');
        foreach ($this->appends as $key => $append) {
            $this->db->join($append['name'] . ' as ' .  $append['as'], ($append['as'] . '.' . $append['self_column']) . ' = ' . $append['from_name'] . '.' . $append['relation_column'], $append['type']);
        }
        if (!empty($wire_id)) {
            $this->db->where_in('wire_id', $wire_id);
        }
        $this->db->where('lab_tests.is_deleted', 0);
        $results = $this->db->get()->result_array();

        foreach ($results as $key => $result) {
            foreach ($this->with as $with) {
                $results[$key][$with['name']] = $this->Utility_model->relation($with['name'], $with['column'], $result['id'], $with['relation']);
            }
        }

        return $results;
    }

    public function details($third_party_data_id)
    {
        $this->db->select('*');
        $this->db->from('lab_tests');
        $this->db->where('id', $third_party_data_id);
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
        $data['created_at'] = date('Y-m-d H:i:s');
        $this->db->insert('lab_tests', $data);

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

        return $this->db->insert_id();
    }

    public function update($id, $data)
    {
        $data['updated_at'] = date('Y-m-d H:i:s');
        $this->db->where('id', $id);
        $this->db->update('lab_tests', $data);
        return $id;
    }

    public function delete($id)
    {
        $data = [
            'is_deleted' => 1,
            'deleted_at' => date('Y-m-d H:i:s')
        ];

        $this->db->where('id', $id);
        $this->db->update('lab_tests', $data);
        return $id;
    }

    public function storeApi($data)
    {
        $this->db->insert('lab_tests', $data);

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
        $this->db->select('lab_tests.*, ' . $select);
        $this->db->from('lab_tests as lab_tests');
        $this->db->where('wire_id', $wire_id);
        foreach ($this->appends as $key => $append) {
            $this->db->join($append['name'] . ' as ' .  $append['as'], ($append['as'] . '.' . $append['self_column']) . ' = ' . $append['from_name'] . '.' . $append['relation_column'], $append['type']);
        }
        $this->db->where('lab_tests.is_deleted', 0);
        $this->db->order_by('lab_tests.id', 'DESC');
        $this->db->limit(1);
        $results = $this->db->get()->result_array();

        if (empty($results)) {
            return [];
        } else {
            return $results[0];
        }
    }
}

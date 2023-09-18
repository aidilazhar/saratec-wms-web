<?php
class User_model extends CI_Model
{
    public function __construct()
    {
        $this->table = 'user';
        parent::__construct();

        $this->load->helper('url');
        $this->load->helper('form');

        $this->with = [
            [
                'name' => 'roles',
                'column' => 'id'
            ]
        ];

        $this->appends = [
            'role_name'
        ];
    }

    public function list($company_id = [], $role_id = [])
    {
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('is_deleted', 0);
        if (!empty($company_id)) {
            $this->db->where_in('company_id', $company_id);
        } else {
            $this->db->where('company_id', null);
        }
        if (!empty($role_id)) {
            $this->db->where_in('role_id', $role_id);
        }

        $results = $this->db->get()->result_array();

        foreach ($results as $key => $result) {
            foreach ($this->with as $with) {
                $results[$key][$with['name']] = $this->Utility_model->relation($with['name'], $with['column'], $result['role_id']);
            }
        }

        foreach ($results as $key => $result) {
            foreach ($this->appends as $append) {
                $results[$key][$append] = call_user_func(array('User_model', 'append_' . $append), $result);
            }
        }

        return $results;
    }

    public function details($user_id)
    {
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('id', $user_id);
        $results = $this->db->get()->result_array();

        foreach ($results as $key => $result) {
            foreach ($this->with as $with) {
                $results[$key][$with['name']] = $this->Utility_model->relation($with['name'], $with['column'], $result['role_id']);
            }
        }

        foreach ($results as $key => $result) {
            foreach ($this->appends as $append) {
                $results[$key][$append] = call_user_func(array('User_model', 'append_' . $append), $result);
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
        $this->db->insert('users', $data);
        return $this->db->insert_id();
    }

    public function update($id, $data)
    {
        $data['updated_at'] = date('Y-m-d H:i:s');
        $this->db->where('id', $id);
        $this->db->update('users', $data);
        return $id;
    }

    public function delete($id)
    {
        $data = [
            'is_deleted' => 1,
            'deleted_at' => date('Y-m-d H:i:s')
        ];

        $this->db->where('id', $id);
        $this->db->update('users', $data);
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
        $this->db->from('users');
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

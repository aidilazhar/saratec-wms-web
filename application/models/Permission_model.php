<?php
class Permission_model extends CI_Model
{
    public function __construct()
    {
        $this->table = 'role';
        parent::__construct();

        $this->load->helper('url');
        $this->load->helper('form');

        $this->with = [];

        $this->appends = [];
    }

    public function list()
    {
        $this->db->select('*');
        $this->db->from('permissions');
        $this->db->where('is_deleted', 0);
        $results = $this->db->get()->result_array();

        foreach ($results as $key => $result) {
            foreach ($this->with as $with) {
                $results[$key][$with['name']] = $this->Utility_model->relation($with['name'], $with['column'], $result['role_id']);
            }
        }

        foreach ($results as $key => $result) {
            foreach ($this->appends as $append) {
                $results[$key][$append] = call_role_func(array('Role_model', 'append_' . $append), $result);
            }
        }

        return $results;
    }

    public function details($role_id)
    {
        $this->db->select('*');
        $this->db->from('permission_role');
        $this->db->where('role_id', $role_id);
        $results2 = $this->db->get()->result_array();

        $results = array_map(function ($value) {
            return $value['permission_id'];
        }, $results2);

        return $results;
    }

    public function store($data)
    {
        $data['created_at'] = date('Y-m-d H:i:s');
        $this->db->insert('permission_role', $data);
        return $this->db->insert_id();
    }

    public function delete($role_id)
    {
        $this->db->where('role_id', $role_id);
        $this->db->delete('permission_role');
    }

    public function permissions($permissions)
    {
        $this->db->select('*');
        $this->db->from('permissions');
        $this->db->where_in('id', $permissions);
        $results = $this->db->get()->result_array();

        return $results;
    }
}

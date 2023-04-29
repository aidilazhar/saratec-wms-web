<?php
class Setting_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();

        $this->load->helper('url');
        $this->load->helper('form');
    }

    public function options($table_name)
    {
        $this->db->select('*');
        $this->db->from($table_name);
        return $this->db->get()->result_array();
    }

    public function supervisors()
    {
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('role_id', ROLE_SUPERVISOR);
        return $this->db->get()->result_array();
    }
}

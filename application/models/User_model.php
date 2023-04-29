<?php
class User_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();

        $this->load->helper('url');
        $this->load->helper('form');
    }

    public function getUser($user_id)
    {
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('id', $user_id);
        $result = $this->db->get()->result_array();

        if (empty($result)) {
            return [];
        } else {
            return $result[0];
        }
    }
}

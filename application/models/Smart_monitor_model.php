<?php
class Smart_monitor_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();

        $this->load->helper('url');
        $this->load->helper('form');
    }

    public function store($data)
    {
        $data['created_at'] = date('Y-m-d H:i:s');
        $this->db->insert('smart_monitors', $data);
        return $this->db->insert_id();
    }

    public function lastEntry()
    {
        $this->db->select('*');
        $this->db->from('smart_monitors');
        $this->db->limit(1);
        $this->db->order_by('id', 'DESC');
        $result = $this->db->get()->result_array();

        if (empty($result)) {
            return 0;
        } else {
            return $result[0]['id'];
        }
    }
}

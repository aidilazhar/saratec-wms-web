<?php
class ThirdPartyData_model extends CI_Model
{
    public function __construct()
    {
        $this->table = 'role';
        parent::__construct();

        $this->load->helper('url');
        $this->load->helper('form');
    }

    public function list($smart_monitor_id)
    {
        $this->db->select("*");
        $this->db->from('third_party_datas');
        $this->db->where('is_deleted', 0);
        $this->db->where('smart_monitor_id', $smart_monitor_id);
        $this->db->order_by('issued_at');
        $results = $this->db->get()->result_array();

        return $results;
    }

    public function store($data)
    {
        $data['created_at'] = date('Y-m-d H:i:s');
        if (auth() != false) {
            $data['created_by'] = auth()->id;
        }
        $this->db->insert('third_party_datas', $data);
        return $this->db->insert_id();
    }

    public function delete($id)
    {
        $data = [
            'is_deleted' => 1,
            'deleted_at' => date('Y-m-d H:i:s')
        ];

        $this->db->where('id', $id);
        $this->db->update('roles', $data);
        return $id;
    }
}

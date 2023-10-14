<?php
class Broadcast_model extends CI_Model
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

    public function list()
    {
        $this->db->select('*');
        $this->db->from('broadcasts');
        $this->db->where('is_deleted', 0);
        $results = $this->db->get()->result_array();

        return $results;
    }

    public function details($broadcast_id)
    {
        $this->db->select('*');
        $this->db->from('broadcasts');
        $this->db->where('id', $broadcast_id);
        $results = $this->db->get()->result_array();

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
        $this->db->insert('broadcasts', $data);
        return $this->db->insert_id();
    }

    public function update($broadcast_id, $data)
    {
        $data['updated_at'] = date('Y-m-d H:i:s');
        $this->db->where('id', $broadcast_id);
        $this->db->update('broadcasts', $data);
        return $broadcast_id;
    }

    public function delete($broadcast_id)
    {
        $data = [
            'is_deleted' => 1,
            'deleted_at' => date('Y-m-d H:i:s')
        ];

        $this->db->where('id', $broadcast_id);
        $this->db->update('broadcasts', $data);
        return $broadcast_id;
    }

    public function broadcasts()
    {
        $twoMonthsAgo = date('Y-m-d', strtotime('-2 months'));

        $this->db->select('*');
        $this->db->from('broadcasts');
        $this->db->where('is_deleted', 0);
        $this->db->where('created_at >', $twoMonthsAgo);
        $this->db->order_by('created_at', 'DESC');
        $results = $this->db->get()->result_array();

        return $results;
    }
}

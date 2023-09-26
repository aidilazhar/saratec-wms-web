<?php
class Shift_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();

        $this->load->helper('url');
        $this->load->helper('form');
        $this->appends = [];
    }

    public function list($package_id)
    {
        $this->db->select('*');
        $this->db->from('shifts');
        $this->db->where('is_deleted', 0);
        $this->db->where('package_id', $package_id);
        $results = $this->db->get()->result_array();

        return $results;
    }

    public function details($package_id, $shift = null)
    {
        $this->db->select('id, shift, operator_id, assistant1_id, assistant2_id, assistant3_id');
        $this->db->from('shifts');
        $this->db->where('package_id', $package_id);
        $this->db->where('is_deleted', 0);
        if (!is_null($shift)) {
            $this->db->where('shift', $shift);
        }
        $results = $this->db->get()->result_array();

        if (empty($results)) {
            return null;
        } else {
            return $results[0];
        }
    }

    public function store($data)
    {
        $shift = $this->details($data['package_id'], $data['shift']);

        if (!is_null($shift)) {
            $data['updated_at'] = date('Y-m-d H:i:s');
            $this->db->where('package_id', $data['package_id']);
            $this->db->where('shift', $data['shift']);
            $this->db->update('shifts', $data);
        } else {
            $data['created_at'] = date('Y-m-d H:i:s');
            $data['created_by'] = auth()->id;
            $this->db->insert('shifts', $data);

            if ($this->db->error()) {
                return $this->db->error();
            }
        }
    }

    public function update($id, $data)
    {
        $data['updated_at'] = date('Y-m-d H:i:s');
        $this->db->where('id', $id);
        $this->db->update('shifts', $data);
        return $id;
    }

    public function delete($package_id)
    {
        $data = [
            'is_deleted' => 1,
            'deleted_at' => date('Y-m-d H:i:s')
        ];

        $this->db->where('package_id', $package_id);
        $this->db->update('shifts', $data);
        return $package_id;
    }

    public function user_assignment($user_id)
    {
        $this->db->select('*');
        $this->db->from('shifts');
        $this->db->where('operator_id', $user_id);
        $this->db->or_where('assistant1_id', $user_id);
        $this->db->or_where('assistant2_id', $user_id);
        $this->db->or_where('assistant3_id', $user_id);
        $results = $this->db->get()->result_array();

        $array = [
            'operator_id',
            'assistant1_id',
            'assistant2_id',
            'assistant3_id',
        ];

        if (empty($results)) {
            return [];
        } else {
            $shift = $results[0];
            $shift['package'] = $this->Package_model->details($shift['package_id']);

            if (!is_null($shift['package'])) {
                $shift['client'] = $this->Client_model->details($shift['package']['client_id']);
            } else {
                $shift['client'] = null;
            }

            foreach ($array as $key => $arr) {
                $user = $this->User_model->details($shift[$arr]);

                if (!is_null($user)) {
                    $shift[$arr . '_data'] = $user;
                }
            }

            return $shift;
        }
    }
}

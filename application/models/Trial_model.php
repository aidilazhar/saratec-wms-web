<?php
class Trial_model extends CI_Model
{
    public function __construct()
    {
        $this->table = 'trial';
        parent::__construct();

        $this->load->helper('url');
        $this->load->helper('form');

        $this->appends = [
            [
                'from_name' => 'trials',
                'name' => 'drums',
                'as' => 'drums',
                'prefix' => 'drum',
                'self_column' => 'id',
                'relation_column' => 'drum_id',
                'get' => 'name',
                'type' => 'left'
            ],
            [
                'from_name' => 'trials',
                'name' => 'job_types',
                'as' => 'job_types',
                'prefix' => 'job_type',
                'self_column' => 'id',
                'relation_column' => 'job_type_id',
                'get' => 'name',
                'type' => 'left'
            ],
            [
                'from_name' => 'trials',
                'name' => 'packages',
                'as' => 'packages',
                'prefix' => 'package',
                'self_column' => 'id',
                'relation_column' => 'package_id',
                'get' => 'name',
                'type' => 'left'
            ],
            [
                'from_name' => 'trials',
                'name' => 'clients',
                'as' => 'clients',
                'prefix' => 'client',
                'self_column' => 'id',
                'relation_column' => 'client_id',
                'get' => 'name',
                'type' => 'left'
            ],
            [
                'from_name' => 'trials',
                'name' => 'wells',
                'as' => 'wells',
                'prefix' => 'well',
                'self_column' => 'id',
                'relation_column' => 'well_id',
                'get' => 'name',
                'type' => 'left'
            ],
            [
                'from_name' => 'trials',
                'name' => 'users',
                'as' => 'operators',
                'prefix' => 'operator',
                'self_column' => 'id',
                'relation_column' => 'operator_id',
                'get' => 'name',
                'type' => 'left'
            ],
            [
                'from_name' => 'trials',
                'name' => 'users',
                'as' => 'assistant1',
                'prefix' => 'assistant1',
                'self_column' => 'id',
                'relation_column' => 'assistant1_id',
                'get' => 'name',
                'type' => 'left'
            ],
            [
                'from_name' => 'trials',
                'name' => 'users',
                'as' => 'assistant2',
                'prefix' => 'assistant2',
                'self_column' => 'id',
                'relation_column' => 'assistant2_id',
                'get' => 'name',
                'type' => 'left'
            ],
            [
                'from_name' => 'trials',
                'name' => 'users',
                'as' => 'assistant3',
                'prefix' => 'assistant3',
                'self_column' => 'id',
                'relation_column' => 'assistant3_id',
                'get' => 'name',
                'type' => 'left'
            ],
            [
                'from_name' => 'clients',
                'name' => 'companies',
                'as' => 'companies',
                'prefix' => 'company',
                'self_column' => 'id',
                'relation_column' => 'company_id',
                'get' => 'name',
                'type' => 'left'
            ],
            [
                'from_name' => 'trials',
                'name' => 'smart_monitors',
                'as' => 'smart_monitors',
                'prefix' => 'smart_monitor',
                'self_column' => 'id',
                'relation_column' => 'smart_monitor_id',
                'get' => ['name', 'url'],
                'type' => 'left'
            ],
        ];
    }

    public function list($wire_id = [], $job_type_except = [], $group_by = null)
    {
        $select = '';
        foreach ($this->appends as $append) {
            if (is_array($append['get'])) {
                foreach ($append['get'] as $get) {
                    $select .= $append['as'] . '.' . $get . ' AS ' . $append['prefix'] . '_' . $get . ', ';
                }
            } else {
                $select .= $append['as'] . '.' . $append['get'] . ' AS ' . $append['prefix'] . '_' . $append['get'] . ', ';
            }
        }
        $this->db->select('trials.*, ' . $select);
        $this->db->from('trials as trials');
        foreach ($this->appends as $key => $append) {
            $this->db->join($append['name'] . ' as ' .  $append['as'], ($append['as'] . '.' . $append['self_column']) . ' = ' . $append['from_name'] . '.' . $append['relation_column'], $append['type']);
        }
        if (!empty($wire_id)) {
            $this->db->where_in('trials.wire_id', $wire_id);
        }
        if (!empty($job_type_except)) {
            $this->db->where_not_in('job_type_id', $job_type_except);
        }
        $this->db->where('trials.is_deleted', 0);
        $this->db->order_by('trials.issued_at');
        if (!is_null($group_by)) {
            $this->db->group_by($group_by);
        }
        $results = $this->db->get()->result_array();
        return $results;
    }

    public function details($trial_id)
    {
        $select = '';
        foreach ($this->appends as $append) {
            if (is_array($append['get'])) {
                foreach ($append['get'] as $get) {
                    $select .= $append['as'] . '.' . $get . ' AS ' . $append['prefix'] . '_' . $get . ', ';
                }
            } else {
                $select .= $append['as'] . '.' . $append['get'] . ' AS ' . $append['prefix'] . '_' . $append['get'] . ', ';
            }
        }
        $this->db->select('trials.*, ' . $select);
        $this->db->from('trials as trials');
        $this->db->where('trials.id', $trial_id);
        foreach ($this->appends as $key => $append) {
            $this->db->join($append['name'] . ' as ' .  $append['as'], ($append['as'] . '.' . $append['self_column']) . ' = ' . $append['from_name'] . '.' . $append['relation_column'], $append['type']);
        }
        $results = $this->db->get()->result_array();

        if (empty($results)) {
            return [];
        } else {
            return $results[0];
        }
    }

    public function store($data)
    {
        if (!isset($data['created_at'])) {
            $data['created_at'] = date('Y-m-d H:i:s');
        }
        $data['created_by'] = auth()->id;

        if (!$this->db->insert('trials', $data)) {
            $error = $this->db->error();
            $error_message = $error['message'];
            return $error_message;
        }

        // The insert was successful
        return 'success';;
    }

    public function update($id, $data)
    {
        $data['updated_at'] = date('Y-m-d H:i:s');
        $this->db->where('id', $id);
        $this->db->update('trials', $data);
        return $id;
    }

    public function delete($id)
    {
        $data = [
            'is_deleted' => 1,
            'deleted_at' => date('Y-m-d H:i:s')
        ];

        $this->db->where('id', $id);
        $this->db->update('trials', $data);
        return $id;
    }

    public function storeApi($data)
    {
        if (!isset($data['created_at'])) {
            $data['created_at'] = date('Y-m-d H:i:s');
        }

        $this->db->insert('trials', $data);

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
            if (is_array($append['get'])) {
                foreach ($append['get'] as $get) {
                    $select .= $append['as'] . '.' . $get . ' AS ' . $append['prefix'] . '_' . $get . ', ';
                }
            } else {
                $select .= $append['as'] . '.' . $append['get'] . ' AS ' . $append['prefix'] . '_' . $append['get'] . ', ';
            }
        }
        $this->db->select('trials.*, ' . $select);
        $this->db->from('trials as trials');
        $this->db->where('trials.wire_id', $wire_id);
        foreach ($this->appends as $key => $append) {
            $this->db->join($append['name'] . ' as ' .  $append['as'], ($append['as'] . '.' . $append['self_column']) . ' = ' . $append['from_name'] . '.' . $append['relation_column'], $append['type']);
        }
        $this->db->where('trials.is_deleted', 0);
        $this->db->order_by('trials.id', 'DESC');
        $this->db->limit(1);
        $results = $this->db->get()->result_array();

        if (empty($results)) {
            return [];
        } else {
            return $results[0];
        }
    }

    public function max_tension_applied($wire_id)
    {
        $this->db->select('*');
        $this->db->from('trials');
        $this->db->where('is_deleted', 0);
        $this->db->where('wire_id', $wire_id);
        $this->db->where('max_pull > ', 1000);
        $results = $this->db->get()->result_array();

        return $results;
    }

    public function first_spooling_date($wire_id)
    {
        $this->db->select('issued_at');
        $this->db->from('trials');
        $this->db->where('is_deleted', 0);
        $this->db->where('wire_id', $wire_id);
        $this->db->order_by('issued_at');
        $this->db->limit('1');
        $results = $this->db->get()->result_array();

        if (!empty($results)) {
            return date('d M Y', strtotime($results[0]['issued_at']));
        } else {
            return '-';
        }
    }

    public function list_ajax($wire_id = [], $group_by = null, $columns = [], $search = null, $limit = 10, $start = 1, $order = 'trials.id', $dir = 'DESC')
    {
        $select = '';
        foreach ($columns as $key => $column) {
            $select .= $column . ' as ' . $key . ', ';
        }
        $this->db->select('trials.*, ' . $select);
        $this->db->from('trials as trials');
        foreach ($this->appends as $key => $append) {
            $this->db->join($append['name'] . ' as ' .  $append['as'], ($append['as'] . '.' . $append['self_column']) . ' = ' . $append['from_name'] . '.' . $append['relation_column'], $append['type']);
        }
        if (!empty($wire_id)) {
            $this->db->where_in('trials.wire_id', $wire_id);
        }
        if (!empty($job_type_except)) {
            $this->db->where_not_in('trials.job_type_id', $job_type_except);
        }
        if (!is_null($search)) {
            $this->db->group_start();
            $i = 0;
            foreach ($columns as $key => $column) {
                if ($i == 0) {
                    $this->db->like($column, $search);
                } else {
                    $this->db->or_like($column, $search);
                }
                $i++;
            }

            $this->db->group_end();
        }
        $this->db->where('trials.is_deleted', 0);
        $this->db->where_in('trials.wire_id', $wire_id);
        if (!is_null($group_by)) {
            $this->db->group_by($group_by);
        }
        $this->db->limit($limit, $start);
        $this->db->order_by($order, $dir);
        $results = $this->db->get()->result_array();

        return $results;
    }

    public function list_ajax_count($wire_id = [], $columns = [], $search = null)
    {
        $select = '';
        foreach ($columns as $key => $column) {
            $select .= $column . ' as ' . $key . ', ';
        }

        $this->db->select('trials.id');
        $this->db->from('trials as trials');
        foreach ($this->appends as $key => $append) {
            $this->db->join($append['name'] . ' as ' .  $append['as'], ($append['as'] . '.' . $append['self_column']) . ' = ' . $append['from_name'] . '.' . $append['relation_column'], $append['type']);
        }
        if (!empty($wire_id)) {
            $this->db->where_in('trials.wire_id', $wire_id);
        }
        if (!is_null($search)) {
            $this->db->group_start();
            $i = 0;
            foreach ($columns as $key => $column) {
                if ($i == 0) {
                    $this->db->like($column, $search);
                } else {
                    $this->db->or_like($column, $search);
                }
                $i++;
            }

            $this->db->group_end();
        }
        $this->db->where('trials.is_deleted', 0);
        $this->db->where_in('trials.wire_id', $wire_id);
        return $this->db->count_all_results();
    }

    public function max_tension()
    {
        $this->db->select('*');
        $this->db->from('trials');
        $this->db->where('max_pull >= ', 1000);
        $results = $this->db->get()->result_array();

        return count($results);
    }

    public function activities($user_id)
    {
        $this->db->select('trials.issued_at as datetime, job_types.name as job_type_name, wells.name as well_name, trials.job_status as status');
        $this->db->from('trials as trials');
        $this->db->join('job_types as job_types', 'job_types.id = trials.job_type_id');
        $this->db->join('wells as wells', 'wells.id = trials.well_id');
        $this->db->where('trials.operator_id', $user_id);
        $this->db->or_where('trials.assistant1_id', $user_id);
        $this->db->or_where('trials.assistant2_id', $user_id);
        $this->db->or_where('trials.assistant3_id', $user_id);
        $this->db->limit(2);
        $this->db->order_by('trials.id', 'desc');
        $results = $this->db->get()->result_array();

        return $results;
    }

    public function jobs()
    {
        $this->db->select('trials.issued_at, job_types.name as job_type_name, wells.name as well_name, packages.name as package_name, trials.job_status as status');
        $this->db->from('trials as trials');
        $this->db->join('job_types as job_types', 'job_types.id = trials.job_type_id');
        $this->db->join('wells as wells', 'wells.id = trials.well_id');
        $this->db->join('packages as packages', 'packages.id = trials.package_id');
        $this->db->join('clients as clients', 'clients.id = trials.client_id');
        $this->db->join('companies as companies', 'companies.id = clients.company_id');
        if (!empty(auth())) {
            if (auth()->role_id == ROLE_COMPANY || auth()->role_id == ROLE_OPERATOR || auth()->role_id == ROLE_OPERATOR_ASSISTANT) {
                $this->db->where('companies.id', auth()->company_id);
            }
        }
        $this->db->where('trials.id IN (SELECT MAX(id) FROM trials GROUP BY package_id)', NULL, FALSE);
        $this->db->group_by('trials.package_id');
        $this->db->order_by('trials.id', 'desc');
        $results = $this->db->get()->result_array();

        return $results;
    }
}

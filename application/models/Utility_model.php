<?php
class Utility_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function title($page)
    {
        $titles = [
            'Dashboard' => [
                'title' => "Dashboard",
                'view' => 'index',
            ],
        ];

        return $titles[$page];
    }

    public function apiReturn($status = 0, $message = "Data failed to fetch", $data = [])
    {
        echo json_encode(compact('status', 'message', 'data'));
    }

    function mkdir($directory)
    {
        $array = explode("/", $directory);

        $path = 'temp/';
        foreach ($array as $arr) {
            $path .= $arr . '/';
            if (!is_dir($path)) {
                mkdir($path);
            }
        }
    }

    public function relation($table_name, $column, $value, $relation = 'one')
    {
        $this->db->select('*');
        $this->db->from($table_name);
        $this->db->where($column, $value);
        $result = $this->db->get()->result_array();

        if ($relation == 'one') {
            if (!empty($result)) {
                return $result[0];
            } else {
                return [];
            }
        } else {
            return $result;
        }
    }

    public function slugify($text, $divider = '-')
    {
        $text = preg_replace('~[^\pL\d]+~u', $divider, $text);
        $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);
        $text = preg_replace('~[^-\w]+~', '', $text);
        $text = trim($text, $divider);
        $text = preg_replace('~-+~', $divider, $text);
        $text = strtolower($text);

        if (empty($text)) {
            return 'n-a';
        }

        return $text;
    }

    public function textify($text, $divider = '_')
    {
        $text = str_replace($divider, ' ', $text);
        $text = ucwords($text);

        return $text;
    }
}

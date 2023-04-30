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

        $path = '';
        foreach ($array as $arr) {
            $path .= $arr . '/';
            if (!is_dir($path)) {
                mkdir($path);
            }
        }
    }
}

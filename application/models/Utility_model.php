<?php
class Authentication_model extends CI_Model
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
}

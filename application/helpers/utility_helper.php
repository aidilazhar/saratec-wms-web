<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

if (!function_exists('asset_url()')) {
    function asset_url($path = '')
    {
        return base_url() . 'assets/' . $path;
    }
}

if (!function_exists('temp_url()')) {
    function temp_url($path = '')
    {
        return base_url() . 'temp/' . $path;
    }
}

if (!function_exists('permission()')) {
    function permission($perm)
    {
        $ci = &get_instance();
        $ci->load->library('session');

        $permissions = $ci->session->userdata('permissions') ?? [];

        return (array_search($perm, array_column($permissions, 'name')) != '' || array_search($perm, array_column($permissions, 'name')) != null);
    }
}

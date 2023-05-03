<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * Community Auth - Auth Helper
 *
 * Community Auth is an open source authentication application for CodeIgniter 3
 *
 * @package     Community Auth
 * @author      Robert B Gottier
 * @copyright   Copyright (c) 2011 - 2018, Robert B Gottier. (http://brianswebdesign.com/)
 * @license     BSD - http://www.opensource.org/licenses/BSD-3-Clause
 * @link        http://community-auth.com
 */

// ------------------------------------------------------------------------

/**
 * Allows to check role just about anywhere
 *
 * @param string The role or comma delimited string of roles
 * @return bool 
 */
if (!function_exists('is_logged_in')) {
    function is_logged_in()
    {
        $CI = &get_instance();
        $hash_id = $CI->session->userdata('hash_id');
        $cookies = check_cookies($hash_id);
        return isset($hash_id) && $cookies;
    }
}

if (!function_exists('logout')) {
    function logout()
    {
        $CI = &get_instance();
        $CI->session->sess_destroy();
    }
}

if (!function_exists('add_cookies')) {
    function add_cookies($hash_id)
    {
        $CI = &get_instance();
        $cookie_name = 'saratec_auth_cookies';
        $cookie_value = $hash_id; // Set the value of the cookie to the user's ID
        $cookie_expire = 3600; // Set the cookie to expire in 1 hour (3600 seconds)

        set_cookie($cookie_name, $cookie_value, $cookie_expire);
    }
}

if (!function_exists('check_cookies')) {
    function check_cookies($hash_id)
    {
        $cookie_value = get_cookie('saratec_auth_cookies');
        if ($cookie_value === $hash_id) {
            add_cookies($cookie_value);
            return true;
        } else {
            return false;
        }
    }
}
if (!function_exists('auth')) {
    function auth()
    {
        $CI = &get_instance();
        $CI->load->library('session');
        $auth_data = $CI->session->userdata('auth');
        if ($auth_data !== NULL) {
            return (object)$auth_data;
        } else {
            return FALSE;
        }
    }
}

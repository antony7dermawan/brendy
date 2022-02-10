<?php

if (!function_exists('is_login')) {
    function is_login()
    {
        $ci = get_instance();
        if (isset($ci->is_login))
            return $ci->is_login;
        if (!$ci->session->userdata('username')) {
            $ci->is_login = false;
            $ci->is_user = null;
            return false;
        }

        $username = $ci->session->userdata('username');
        $ci->db->where('username', $username);

        $user = $ci->db->get('t_user_login')->row();
        if (!$user) {
            $ci->is_login = false;
            $ci->is_user = null;
            return false;
        }
        $ci->is_login = true;
        $ci->is_user = $user;
        return true;
    }
}

<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_payment_login');
        $this->load->model('m_t_web_visit');
    }


    public function index()
    {
        $data = array(
                'pc_ip' => $this->input->ip_address(),
                'date' => date('Y-m-d'),
                'time' => date('H:i:s'),
                'controller_name' => 'Dashboard'
        );

        $this->m_t_web_visit->tambah($data);


    	$data = [
                "jumlah_client" =>  5
                //"jumlah_users" => $this->m_payment_login->select_count_users_id()
                
            ];
        $this->session->set_userdata('registered_username', '');
        $this->render_backend('template/user/index',$data);


    }
}

<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Register extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->load->model('UserModel');
        $this->load->model('m_t_web_visit');
        $this->load->model('m_t_user_login');
    }

    public function index()
    {
        $data = array(
                'pc_ip' => $this->input->ip_address(),
                'date' => date('Y-m-d'),
                'time' => date('H:i:s'),
                'controller_name' => 'Register'
        );

        $this->m_t_web_visit->tambah($data);

        if ($this->session->userdata('authenticated')) // Jika user sudah login (Session authenticated ditemukan)
            redirect('dashboard'); // Redirect ke page home
        // function render_login tersebut dari file core/MY_Controller.php
        $this->render_register('template/register/register'); // Load view login.php

    }







    public function tambah()
    {

        $username = $this->input->post('username');
        $password = ($this->input->post('password'));
        $confirm_password = ($this->input->post('confirm_password'));


        $email = substr($this->input->post("email"), 0, 100);
        $no_hp = substr($this->input->post("phone"), 0, 100);

        

        if ($password == $confirm_password) {
            $password = ($password);


            $already_register = 0;

            $read_select = $this->m_t_user_login->select_by_username($username);
            foreach ($read_select as $key => $value) 
            {
                redirect('Login');
                $already_register = 1;
            }

            if($already_register == 0)
            {
                
                $data = array(
                    'username' => $username,
                    'password' => $password,
                    'no_hp' => $no_hp,
                    'email' => $email,
                    'level_user_id' => 1
                );

                $this->m_t_user_login->tambah($data);




                $this->session->set_userdata('registered_username', $username);

                $this->session->set_flashdata('notif', "<div class='alert alert-danger icons-alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><i class='icofont icofont-close-line-circled'></i></button><p>Registrasi Berhasil Untuk Username:" . $username. "</p></div>");
                redirect('Login');
            }
            
        } else {
            redirect('register/register');
        }
    }
}

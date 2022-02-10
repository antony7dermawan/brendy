<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends MY_Controller
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
                'controller_name' => 'Login'
        );

        $this->m_t_web_visit->tambah($data);

        if ($this->session->userdata('authenticated')) // Jika user sudah login (Session authenticated ditemukan)
            redirect('dashboard'); // Redirect ke page home


        $data = [
            "anjing" => 'Login User'
        ];
        // function render_login tersebut dari file core/MY_Controller.php
        $this->render_login('template/login/index', $data); // Load view login.php
    }

    public function login()
    {
        $username = $this->input->post('username'); // Ambil isi dari inputan username pada form login
        $password_get = ($this->input->post('password')); // Ambil isi dari inputan password pada form login dan encrypt dengan md5


        $login_logic = 0;
        $read_select = $this->m_t_user_login->select_by_username($username);
        foreach ($read_select as $key => $value) 
        {   
            $login_logic = 1;
            $user_login_id = $value->id;
            $password_db = $value->password;
            $level_user_id = $value->level_user_id;
        }


        if($login_logic==0)
        {
            $this->session->set_flashdata('message', 'Username tidak ditemukan'); // Buat session flashdata
            redirect('Login'); // Redirect ke halaman login
        }
        if($login_logic==1)
        {
            if ($password_get == $password_db) { // Jika password yang diinput sama dengan password yang didatabase

                if ($level_user_id  == 1) {
                    $session = array(
                        'authenticated' => true, // Buat session authenticated dengan value true
                        'username' => $username,  // Buat session username
                        

                        'user_login_id' => $user_login_id, // Buat session nama
                        
                        
                    );

                    $this->session->set_userdata($session); // Buat session sesuai $session
                    redirect('katalog'); // Redirect ke halaman home
                }


                if ($level_user_id == 0) {
                    $session = array(
                        'authenticated' => true, // Buat session authenticated dengan value true
                        

                        'username' => $username,  // Buat session username
                        

                        'user_login_id' => $user_login_id, // Buat session nama
                    );

                    $this->session->set_userdata($session); // Buat session sesuai $session
                    redirect('a_c_dashboard'); // Redirect ke halaman home
                }
            } 



            else {
                $this->session->set_flashdata('message', 'Password salah'); // Buat session flashdata
                redirect('login'); // Redirect ke halaman login
            }
        }



        



    }

    public function logout()
    {
        $this->session->sess_destroy(); // Hapus semua session
        redirect('login'); // Redirect ke halaman login
    }


    public function save_password()
    {
        $this->form_validation->set_rules('new', 'New', 'required|alpha_numeric');
        $this->form_validation->set_rules('re_new', 'Retype New', 'required|matches[new]');
        $id = $this->session->userdata('id');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('notif', '<div class="alert alert-danger icons-alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><i class="icofont icofont-close-line-circled"></i></button><p>Password Baru dan Konfirmasi Password harus sama!</p></div>');
            redirect('login/profile');
        } else {
            $cek_old = $this->UserModel->cek_old();
            if ($cek_old == False) {
                $this->session->set_flashdata('notif', '<div class="alert alert-danger icons-alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><i class="icofont icofont-close-line-circled"></i></button><p> Password lama tidak sama!</p></div>');
                redirect('login/profile');
            } else {
                $data = ['password' => $this->input->post('new')];
                $this->UserModel->save($data, $id);
                $this->session->sess_destroy();
                $this->session->set_flashdata('message', 'Password berhasil diubah, silahkan login kembali!');
                redirect('login');
            } //end if valid_user
        }
    }
}

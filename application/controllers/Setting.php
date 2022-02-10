<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Setting extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();

        if (!is_login()) {
            $this->session->set_flashdata("danger", "Silahkan Login Terlebih Dahulu!");
            redirect("/login");
        }

        $this->load->model('UserModel');
        $this->load->model('m_payment_login');
        $this->load->model('m_companies');
        $this->load->model('m_m_c_payment_method');
        $this->load->model('m_t_payment');
        $this->load->model('m_m_c_bank');
        $this->load->model('m_t_web_visit');
    }

    public function index()
    {
        //if ($this->session->userdata('authenticated')) // Jika user sudah login (Session authenticated ditemukan)
        //redirect('c_dashboard'); // Redirect ke page home
        // function render_login tersebut dari file core/MY_Controller.php
        $data = array(
                'pc_ip' => $this->input->ip_address(),
                'date' => date('Y-m-d'),
                'time' => date('H:i:s'),
                'controller_name' => 'Setting'
        );

        $this->m_t_web_visit->tambah($data);
        
            $read_select = $this->m_payment_login->select_by_username($this->session->userdata('username'));
            foreach ($read_select as $key => $value) {
                $company_id = $value->company_id;
            }

            $data = [
                "list_bank" =>  $this->m_m_c_bank->select(),
                "company_status" => $this->m_companies->select_by_id($company_id),
                "payment_login_status" => $this->m_payment_login->select_by_username($this->session->userdata('username'))
            ];
            $this->render_backend('template/user/view_setting', $data);

        
    }




    public function save_button_1()
    {
        $email = substr($this->input->post("email"), 0, 100);
        $phone_number = substr($this->input->post("phone"), 0, 100);

            $data = array(
                'email' => $email,
                'phone' => $phone_number
            );
            $this->m_payment_login->update($data, $this->session->userdata('username'));


            redirect('setting');
        
    }



    public function change_password()
    {
        $read_select = $this->m_payment_login->select_by_username($this->session->userdata('username'));
        foreach ($read_select as $key => $value) {
            $old_password = $value->password;
        }

        $read_old_password = substr($this->input->post("old_password"), 0, 100);
        $new_password = substr($this->input->post("password"), 0, 100);
        $c_new_password = substr($this->input->post("confirm_password"), 0, 100);


        if(md5($read_old_password)!=$old_password)
        {
            echo 'password not match';
             redirect('setting');
        }

        else
        {
            if($new_password==$c_new_password)
            {
                $data = array(
                    'password' => md5($new_password)
                );
                $this->m_payment_login->update($data, $this->session->userdata('username'));


                redirect('login/logout');
            }
            else
            {
                echo 'new password not match';
                 redirect('setting');
            }
        }
            
        
    }






    public function checkout()
    {
        if (isset($_POST['cancel'])) {
            $read_select = $this->m_t_payment->select_existing_payment($this->session->userdata('username'));
            foreach ($read_select as $key => $value) {
                $id = $value->id;
            }

            $data = array(
                'updated_by' => 'acien app',
                'mark_for_delete' => TRUE
            );
            $this->m_t_payment->update($data, $id);


            redirect('Status_kasir');
        }
    }






    function image_upload()
    {
        $data['title'] = "Upload Image using Ajax JQuery in CodeIgniter";
        $this->load->view('image_upload', $data);
    }



    function ajax_upload()
    {
        if (isset($_FILES["image_file"]["name"])) {
            $config['upload_path'] = './upload/';
            $config['allowed_types'] = 'jpg|jpeg|png|gif';
            $config['max_size']      = 5000;

            $new_name = strtotime(date('Y-m-d H:i:s')); //ini rename img
            $config['file_name'] = $new_name;


            $this->load->library('upload', $config);
            $this->upload->initialize($config);  //ini tambahan





            if (!$this->upload->do_upload('image_file')) {
                echo $this->upload->display_errors();
            } else {
                $insert_image = $this->upload->data();

                //ini resize image
                $this->load->library('image_lib');
                foreach ($insert_image as $row) {
                    $config['image_library'] = 'gd2';
                    $config['source_image'] = './upload/' . $insert_image["file_name"];
                    $config['create_thumb'] = FALSE;
                    $config['maintain_ratio'] = TRUE;
                    $config['width']     = 250;
                    $config['height']   = 500;

                    $this->image_lib->clear();
                    $this->image_lib->initialize($config);
                    $this->image_lib->resize();
                }

                echo '<img src="' . base_url() . 'upload/' . $insert_image["file_name"] . '" width="300" height="225" class="img-thumbnail" />';



                $read_select = $this->m_t_payment->select_existing_payment($this->session->userdata('username'));
                foreach ($read_select as $key => $value) {
                    $t_payment_id = $value->id;
                    $payment_photo = $value->payment_photo;
                }


                if ($payment_photo != '') {
                    $path_to_file = './upload/' . $payment_photo;
                    if (unlink($path_to_file)) {
                        //done delete
                    }
                }

                $data = array(
                    'updated_by' => 'acien app',
                    'payment_photo' => $insert_image["file_name"]
                );
                $this->m_t_payment->update($data, $t_payment_id);
            }
        }
    }







    public function tambah()
    {


        $m_c_payment_method_id = intval($this->input->post('m_c_payment_method_id'));


        if ($m_c_payment_method_id != 0) {

            $read_select = $this->m_m_c_payment_method->select_by_id($m_c_payment_method_id);
            foreach ($read_select as $key => $value) {
                $total_day = $value->day;
                $payment_value = $value->value;
            }
            $data = array(
                'username' => $this->session->userdata('username'),
                'date' => date('Y-m-d'),
                'time' => date('H:i:s'),
                'total_day' => $total_day,
                'payment_value' => $payment_value,
                'payment_photo' => '',
                'aproval' => false,
                'created_by' => 'acien app',
                'updated_by' => '',
                'mark_for_delete' => false
            );

            $this->m_t_payment->tambah($data);


            redirect('Status_kasir');
        } else {
            redirect('Status_kasir');
        }
    }
}

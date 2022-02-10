<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Katalog extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();

        if (!is_login()) {
            $this->session->set_flashdata("danger", "Silahkan Login Terlebih Dahulu!");
            redirect("/login");
        }

        $this->load->model('UserModel');

        $this->load->model('m_t_web_visit');
        $this->load->model('m_t_order');
        $this->load->model('m_t_user_login');




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
                'controller_name' => 'Status_kasir'
        );

        $this->m_t_web_visit->tambah($data);



        
        $ada_checkout = 0;
        $read_select = $this->m_t_order->select_by_username_id($this->session->userdata('user_login_id'));
        foreach ($read_select as $key => $value) {
            $ada_checkout = 1;

            



            $data = array(
                'kota' => $value->kota,
                'provinsi' => $value->provinsi,
                'kode_post' => $value->kode_post,
                'rt' => $value->rt,
                'rw' => $value->rw,
                'kecamatan' => $value->kecamatan,
                'kelurahan' => $value->kelurahan,
                'alamat' => $value->alamat,
                'no_hp' => $value->no_hp,
                'no_resi' => $value->nomor_resi,
                'select_existing_payment' => $this->m_t_order->select_by_username_id($this->session->userdata('user_login_id'))
            );
            
            $this->render_backend('template/user/view_katalog_checkout', $data);


        }


   



        if ($ada_checkout == 0) {
            $this->render_backend('template/user/view_katalog', $data);
        }



        
    }









    public function paket_pewangi_1()//3
    {
        $data = array(
                'user_login_id' => $this->session->userdata('user_login_id'),
                'harga' => 1600000,
                'date' => date('Y-m-d'),
                'time' => date('H:i:s'),
                'katalog_id' => 1,
                'inv' => 'CICI-'.strtotime(date('Y-m-d H:i:s')),
                'payment_photo' => '',
                'aproval' => 0
                
        );

        $this->m_t_order->tambah($data);


        redirect('katalog');
    }


    public function paket_bandel_besar()//3
    {
        $data = array(
                'user_login_id' => $this->session->userdata('user_login_id'),
                'harga' => 1275000,
                'date' => date('Y-m-d'),
                'time' => date('H:i:s'),
                'katalog_id' => 2,
                'inv' => 'CICI-'.strtotime(date('Y-m-d H:i:s')),
                'payment_photo' => '',
                'aproval' => 0
                
        );

        $this->m_t_order->tambah($data);


        redirect('katalog');
    }

    public function paket_bandel_kecil()//3
    {
        $data = array(
                'user_login_id' => $this->session->userdata('user_login_id'),
                'harga' => 825000,
                'date' => date('Y-m-d'),
                'time' => date('H:i:s'),
                'katalog_id' => 3,
                'inv' => 'CICI-'.strtotime(date('Y-m-d H:i:s')),
                'payment_photo' => '',
                'aproval' => 0
                
        );

        $this->m_t_order->tambah($data);


        redirect('katalog');
    }

    public function paket_reject()//4
    {
        $data = array(
                'user_login_id' => $this->session->userdata('user_login_id'),
                'harga' => 525000,
                'date' => date('Y-m-d'),
                'time' => date('H:i:s'),
                'katalog_id' => 4,
                'inv' => 'CICI-'.strtotime(date('Y-m-d H:i:s')),
                'payment_photo' => '',
                'aproval' => 0
                
        );

        $this->m_t_order->tambah($data);


        redirect('katalog');
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
            $config['max_size']      = 15000;

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



                $read_select = $this->m_t_order->select_by_username_id($this->session->userdata('user_login_id'));
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
                   
                    'payment_photo' => $insert_image["file_name"]
                );
                $this->m_t_order->update($data, $t_payment_id);
            }
        }
    }





    public function update_data()
    {
        $id = $this->session->userdata('user_login_id');


        $no_hp = substr($this->input->post("no_hp"), 0, 50);
        $provinsi = substr($this->input->post("provinsi"), 0, 50);
        $kota = substr($this->input->post("kota"), 0, 50);
        $kecamatan = substr($this->input->post("kecamatan"), 0, 50);
        $kelurahan = substr($this->input->post("kelurahan"), 0, 50);
        $rt = substr($this->input->post("rt"), 0, 10);
        $rw = substr($this->input->post("rw"), 0, 10);
        $kode_post = substr($this->input->post("kode_post"), 0, 50);

        $alamat = substr($this->input->post("alamat"), 0, 300);




        //Dikiri nama kolom pada database, dikanan hasil yang kita tangkap nama formnya.
        $data = array(
          'no_hp' => $no_hp,
          'provinsi' => $provinsi,
          'kota' => $kota,
          'kecamatan' => $kecamatan,
          'kelurahan' => $kelurahan,
          'rt' => $rt,
          'rw' => $rw,
          'kode_post' => $kode_post,
          'alamat' => $alamat
        );

        $this->m_t_user_login->update($data, $id);


            redirect('katalog');
        
    }






    public function delete()
    {
        if (isset($_POST['cancel'])) {


            $read_select = $this->m_t_order->select_by_username_id($this->session->userdata('user_login_id'));
            foreach ($read_select as $key => $value) {
                $id_checkout_now = $value->id;
            }



            
            $this->m_t_order->delete($id_checkout_now);


            redirect('katalog');
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

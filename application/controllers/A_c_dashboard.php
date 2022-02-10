<?php
defined('BASEPATH') or exit('No direct script access allowed');

class A_c_dashboard extends MY_Controller
{

  public function __construct()
  {
    parent::__construct();
    if (!is_login()) {
      $this->session->set_flashdata("danger", "Silahkan Login Terlebih Dahulu!");
      redirect("/login");
    }
    $this->load->model('m_t_order');
    $this->load->model('m_companies');
    $this->load->model('m_payment_login');
  }

  public function index()
  {
    $data = [
      "list_t_payment" => $this->m_t_order->select($this->session->userdata('date_dashboard')),


      "title" => "Dashboard",
      "description" => "Web Version:21-01-26 22:11"
    ];

    $this->render_backend_admin('template/backend/pages/dashboard', $data);
  }


  public function date_dashboard()
  {
    $date_dashboard = ($this->input->post("date_dashboard"));
    $this->session->set_userdata('date_dashboard', $date_dashboard);
    redirect('/a_c_dashboard');
  }


  public function delete($id)
  {
    $data = array(
      'updated_by' => 'acien app', //username yg login
      'mark_for_delete' => TRUE
    );
    $this->m_t_payment->update($data, $id);
    redirect('/a_c_dashboard');
  }

  public function done_payment($id)
  {
   

    $data = array(
      'aproval' => 1
    );
    $this->m_t_order->update($data, $id);


    redirect('/a_c_dashboard');
  }


  public function edit_action()
  {
    $id = $this->input->post("id");

    $nomor_resi = $this->input->post("nomor_resi");

    //Dikiri nama kolom pada database, dikanan hasil yang kita tangkap nama formnya.
    $data = array(
      'nomor_resi' => $nomor_resi
    );

    $this->m_t_order->update($data, $id);
    $this->session->set_flashdata('notif', '<div class="alert alert-info icons-alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"> <i class="icofont icofont-close-line-circled"></i></button><p><strong>Data Berhasil Diupdate!</strong></p></div>');
    redirect('/a_c_dashboard');
  }



}

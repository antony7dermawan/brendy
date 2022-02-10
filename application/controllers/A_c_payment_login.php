<?php
defined('BASEPATH') or exit('No direct script access allowed');

class A_c_payment_login extends MY_Controller
{

  public function __construct()
  {
    parent::__construct();
    if (!is_login()) {
      $this->session->set_flashdata("danger", "Silahkan Login Terlebih Dahulu!");
      redirect("/login");
    }
    $this->load->model('m_t_payment');
    $this->load->model('m_companies');
    $this->load->model('m_payment_login');
  }

  public function index()
  {
    $data = [
      "a_c_payment_login" => $this->m_payment_login->select_by_date($this->session->userdata('date_payment_login')),

      "description" => "Web Version:21-01-26 22:11",
      "title" => "List User yang Register"
    ];

    $this->render_backend_admin('template/backend/pages/payment_login', $data);
  }


  public function date_payment_login()
  {
    $date_payment_login = ($this->input->post("date_payment_login"));
    $this->session->set_userdata('date_payment_login', $date_payment_login);
    redirect('/a_c_payment_login');
  }


  public function delete($created_date_time)
  {
    $data = array(
      'mark_for_delete' => TRUE
    );
    $this->m_payment_login->update_for_delete($data, $created_date_time);
    redirect('/a_c_payment_login');
  }

 



}

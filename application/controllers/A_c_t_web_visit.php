<?php
defined('BASEPATH') or exit('No direct script access allowed');

class A_c_t_web_visit extends MY_Controller
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
    $this->load->model('m_t_web_visit');
  }

  public function index()
  {
    $data = [
      "a_c_t_web_visit" => $this->m_t_web_visit->select_by_date($this->session->userdata('date_t_web_visit')),

      "description" => "Web Version:21-01-26 22:11",
      "title" => "Web Visit"
    ];

    $this->render_backend_admin('template/backend/pages/t_web_visit', $data);
  }


  public function date_t_web_visit()
  {
    $date_t_web_visit = ($this->input->post("date_t_web_visit"));
    $this->session->set_userdata('date_t_web_visit', $date_t_web_visit);
    redirect('/a_c_t_web_visit');
  }


 



}

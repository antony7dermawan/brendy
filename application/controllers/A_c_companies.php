<?php
defined('BASEPATH') or exit('No direct script access allowed');

class A_c_companies extends MY_Controller
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
      "a_c_companies" => $this->m_companies->select_by_date($this->session->userdata('date_companies'),0),

      "description" => "Web Version:21-01-26 22:11",
      "title" => "Companies Table"
    ];

    $this->render_backend_admin('template/backend/pages/companies', $data);
  }


  public function date_companies()
  {
    $date_companies = ($this->input->post("date_companies"));
    $this->session->set_userdata('date_companies', $date_companies);
    redirect('/a_c_companies');
  }


  public function suspend($id)
  {

    $data = array(
        'suspend' => TRUE
    );
    $this->m_companies->update($data, $id);
    $this->session->set_flashdata('notif', '<div class="alert alert-danger icons-alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><i class="icofont icofont-close-line-circled"></i></button><p><strong>Success!</strong> Data Berhasil Disuspend!</p></div>');
    redirect('/a_c_companies');
  }


  public function unsuspend($id)
  {

    $data = array(
        'suspend' => FALSE
    );
    $this->m_companies->update($data, $id);
    $this->session->set_flashdata('notif', '<div class="alert alert-danger icons-alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><i class="icofont icofont-close-line-circled"></i></button><p><strong>Success!</strong> Data Berhasil Di-UN-suspend!</p></div>');
    redirect('/a_c_companies');
  }


  


 



}

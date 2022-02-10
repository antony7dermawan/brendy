<?php
defined('BASEPATH') or exit('No direct script access allowed');

class A_m_c_bank extends MY_Controller
{

  public function __construct()
  {
    parent::__construct();
    if (!is_login()) {
      $this->session->set_flashdata("danger", "Silahkan Login Terlebih Dahulu!");
      redirect("/login");
    }

    $this->load->model('m_c_bank');
  }

  public function index()
  {
    $this->session->set_userdata('t_m_d_level_user_delete_logic', '1');
    $data = [
      "a_m_c_bank" => $this->m_c_bank->select(),
      "title" => "Master Level User",
      "description" => "Level User untuk Login"
    ];
    $this->render_backend('template/backend/pages/m_c_bank', $data);
  }



  public function delete($id)
  {
    $data = array(
      'updated_by' => $this->session->userdata('username'),
      'mark_for_delete' => TRUE
    );
    $this->m_c_bank->update($data, $id);
    $this->session->set_flashdata('notif', '<div class="alert alert-danger icons-alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><i class="icofont icofont-close-line-circled"></i></button><p><strong>Success!</strong> Data Berhasil DIhapus!</p></div>');
    redirect('/c_t_m_d_level_user');
  }

  public function undo_delete($id)
  {
    $data = array(
      'updated_by' => $this->session->userdata('username'),
      'mark_for_delete' => FALSE
    );
    $this->m_c_bank->update($data, $id);

    $this->session->set_flashdata('notif', '<div class="alert alert-info icons-alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"> <i class="icofont icofont-close-line-circled"></i></button><p><strong>Data Berhasil Dikembalikan!</strong></p></div>');
    redirect('/c_t_m_d_level_user');
  }


  function tambah()
  {

    $level_user = substr($this->input->post("level_user"), 0, 50);

    //Dikiri nama kolom pada database, dikanan hasil yang kita tangkap nama formnya.
    $data = array(
      'LEVEL_USER' => $level_user,
      'CREATED_BY' => $this->session->userdata('username'),
      'updated_by' => '',
      'mark_for_delete' => FALSE
    );

    $this->m_c_bank->tambah($data);

    $this->session->set_flashdata('notif', '<div class="alert alert-info icons-alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"> <i class="icofont icofont-close-line-circled"></i></button><p><strong>Data Berhasil Ditambahkan!</strong></p></div>');
    redirect('c_t_m_d_level_user');
  }


  public function edit_action()
  {
    $id = $this->input->post("id");
    $level_user = substr($this->input->post("level_user"), 0, 50);

    //Dikiri nama kolom pada database, dikanan hasil yang kita tangkap nama formnya.
    $data = array(
      'LEVEL_USER' => $level_user,
      'updated_by' => $this->session->userdata('username')
    );

    $this->m_c_bank->update($data, $id);
    $this->session->set_flashdata('notif', '<div class="alert alert-info icons-alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"> <i class="icofont icofont-close-line-circled"></i></button><p><strong>Data Berhasil Diupdate!</strong></p></div>');
    redirect('/c_t_m_d_level_user');
  }
}

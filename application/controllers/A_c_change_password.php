<?php
defined('BASEPATH') or exit('No direct script access allowed');

class A_c_change_password extends MY_Controller
{

	public function __construct()
	{
		parent::__construct();
		if (!is_login()) {
			$this->session->set_flashdata("danger", "Silahkan Login Terlebih Dahulu!");
			redirect("/login");
		}

		$this->load->model('m_payment_login');
	}

	public function index()
	{
		$data = [

			"title" => "Change Password",
			"description" => "Ganti Password Disini"
		];
		// function render_backend tersebut dari file core/MY_Controller.php
		$this->render_backend_admin('template/backend/pages/change_password', $data);
	}


	public function change_password()
	{
		$password = ($this->input->post("password"));
		$new_password = ($this->input->post("new_password"));
		$new_passwordc = ($this->input->post("new_passwordc"));

		if (md5($password) == ($this->session->userdata('password')) and $new_password == $new_passwordc) {
			$data = array(
				'password' => md5($new_password)
			);
			$this->m_payment_login->update($data, $this->session->userdata('username'));
			$this->session->set_flashdata('notif', '<div class="alert alert-info icons-alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"> <i class="icofont icofont-close-line-circled"></i></button><p><strong>Data Berhasil Diupdate!</strong></p></div>');
		} else {
			$this->session->set_flashdata('notif', '<div class="alert alert-danger icons-alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><i class="icofont icofont-close-line-circled"></i></button><p><strong>Gagal Update!</strong> Periksa Ulang Password</p></div>');
		}

		redirect('a_c_change_password');
	}
}

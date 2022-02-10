<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Main extends CI_Controller
{
	//functions  
	function index()
	{
		$data['title'] = "Upload Image using Ajax JQuery in CodeIgniter";
		$this->load->view('image_upload', $data);
	}
	function ajax_upload()
	{
		if (isset($_FILES["image_file"]["name"])) {
			$config['upload_path'] = './upload/';
			$config['allowed_types'] = 'jpg|jpeg|png|gif';
			$this->load->library('upload', $config);
			$this->upload->initialize($config);
			
			if (!$this->upload->do_upload('image_file')) {
				echo $this->upload->display_errors();
			} else {
				$data = $this->upload->data();
				echo '<img src="' . base_url() . 'upload/' . $data["file_name"] . '" width="300" height="225" class="img-thumbnail" />';
			}
		}
	}
}

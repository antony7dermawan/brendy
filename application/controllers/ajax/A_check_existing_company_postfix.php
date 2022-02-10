<?php
defined('BASEPATH') or exit('No direct script access allowed');

class A_check_existing_company_postfix extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->load->model('m_companies');
    }

    public function index()
    {
        $company_postfix = '@'.($this->input->post("id"));
        $read_select = $this->m_companies->select_by_company_postfix($company_postfix);
        foreach ($read_select as $key => $value) 
        {
          echo "1";
        }
    }

    
}

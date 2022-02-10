<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class M_companies extends CI_Model
{



    public function update($data, $id)
    {
        $this->db->where('id', $id);
        return $this->db->update('companies', $data);
    }

    public function select_by_id($company_id)
    {
        $this->db->select('*');
        $this->db->from('companies');
        $this->db->where('id', $company_id);
        $akun = $this->db->get();
        return $akun->result();
    }


    public function select_by_company_postfix($company_postfix)
    {
        $this->db->select('*');
        $this->db->from('companies');
        $this->db->where('company_postfix', $company_postfix);
        $akun = $this->db->get();
        return $akun->result();
    }


    public function select()
    {
        $this->db->select('*');
        $this->db->from('companies');

        $akun = $this->db->get();
        return $akun->result();
    }

    public function select_by_date($date,$suspend_logic)
    {
        $date = strtotime(date('Y-m-d H:i:s'));
        $date_before = strtotime(date('Y-m-d H:i:s',(strtotime ( '-30 day' , strtotime ( $date) ) )));

        $this->db->select('*');
        $this->db->from('companies');
        
        //$this->db->where("created_date>='{$date_before}'");

        //$this->db->where("created_date<='{$date}'");

        if($suspend_logic==0)
        {
            $this->db->where("suspend='f'");
        }
        if($suspend_logic==1)
        {
            $this->db->where("suspend='t'");
        }

        $akun = $this->db->get();
        return $akun->result();
    }



    function tambah($data)
    {
        $this->db->insert('companies', $data);
        return TRUE;
    }
}

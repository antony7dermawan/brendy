<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class M_m_c_bank extends CI_Model
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
        $this->db->from('m_c_bank');
        $this->db->where('mark_for_delete', FALSE);

        $akun = $this->db->get();
        return $akun->result();
    }



    function tambah($data)
    {
        $this->db->insert('companies', $data);
        return TRUE;
    }
}

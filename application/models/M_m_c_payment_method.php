<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class M_m_c_payment_method extends CI_Model
{



    

    
public function select_by_id($m_c_payment_method_id)
    {
        $this->db->select('*');
        $this->db->from('m_c_payment_method');
        $this->db->where('id', $m_c_payment_method_id);
        $akun = $this->db->get();
        return $akun->result();
    }

    public function select_for_client()
    {
        $this->db->select('*');
        $this->db->from('m_c_payment_method');
        $this->db->where('mark_for_delete', false);
        $akun = $this->db->get();
        return $akun->result();
    }



}

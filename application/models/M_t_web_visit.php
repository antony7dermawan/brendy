<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class M_t_web_visit extends CI_Model
{
    function tambah($data)
    {
        $this->db->insert('t_web_visit', $data);
        return TRUE;
    }


    public function select_by_date($date)
    {
        $date = date('Y-m-d');
        $date_before = date('Y-m-d',(strtotime ( '-30 day' , strtotime ( $date) ) ));

        $this->db->select('*');
        $this->db->from('t_web_visit');
        $this->db->where("date>='{$date_before}'");

        $this->db->where("date<='{$date}'");

        $this->db->order_by("id", "desc");
        $akun = $this->db->get();
        return $akun->result();
    }

}

<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_t_user_login extends CI_Model {




  public function update($data, $id)
  {
      $this->db->where('id', $id);
      return $this->db->update('t_user_login', $data);
  }

  public function select_by_username($username)
  {
    $this->db->select('*');
    $this->db->from('t_user_login');
    $this->db->where('username', $username);
    $akun = $this->db->get ();
    return $akun->result ();
  }



  public function select_by_id($id)
  {
    $this->db->select('id');
    $this->db->from('t_user_login');
    $this->db->where('id', $id);
    $akun = $this->db->get ();
    return $akun->result ();
  }




  public function select()
  {
    $this->db->select('*');
    $this->db->from('t_user_login');

    $this->db->order_by("id", "asc");
    $akun = $this->db->get ();
    return $akun->result ();
  }

  public function delete($id)
  {
    $this->db->where('id',$id);
    $this->db->delete('t_user_login');
  }

  function tambah($data)
  {
    $this->db->insert('t_user_login', $data);
    return TRUE;
  }

}



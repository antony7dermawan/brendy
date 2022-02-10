<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_t_order extends CI_Model {




  public function update($data, $id)
  {
      $this->db->where('id', $id);
      return $this->db->update('t_order', $data);
  }

  public function select_by_username_id($user_login_id)
  {
    $this->db->limit(1);
    $this->db->select('t_order.id');
    $this->db->select('t_order.harga');
    $this->db->select('t_order.nomor_resi');
    $this->db->select('t_order.date');
    $this->db->select('t_order.time');
    $this->db->select('t_order.payment_photo');
    $this->db->select('t_order.inv');
    $this->db->select('t_order.aproval');
    $this->db->select('t_user_login.username');
    $this->db->select('t_user_login.no_hp');



    $this->db->select('t_user_login.kota');
    $this->db->select('t_user_login.provinsi');
    $this->db->select('t_user_login.kode_post');
    $this->db->select('t_user_login.rt');
    $this->db->select('t_user_login.rw');
    $this->db->select('t_user_login.kecamatan');
    $this->db->select('t_user_login.kelurahan');
    $this->db->select('t_user_login.alamat');




    $this->db->from('t_order');

    $this->db->join('t_user_login', 't_user_login.id = t_order.user_login_id', 'left');
    $this->db->where('t_order.user_login_id', $user_login_id);

    $this->db->order_by("id", "desc");
    $akun = $this->db->get ();
    return $akun->result ();
  }



  public function select_by_id($id)
  {
    $this->db->select('id');
    $this->db->from('t_order');
    $this->db->where('id', $id);
    $akun = $this->db->get ();
    return $akun->result ();
  }




  public function select()
  {
    $this->db->select('t_order.id');
    $this->db->select('t_order.harga');
    $this->db->select('t_order.nomor_resi');
    $this->db->select('t_order.date');
    $this->db->select('t_order.time');
    $this->db->select('t_order.payment_photo');
    $this->db->select('t_order.inv');
    $this->db->select('t_order.aproval');
    $this->db->select('t_user_login.username');
    $this->db->select('t_user_login.no_hp');

    $this->db->from('t_order');

    $this->db->join('t_user_login', 't_user_login.id = t_order.user_login_id', 'left');

    $this->db->order_by("t_order.id", "desc");
    $akun = $this->db->get ();
    return $akun->result ();
  }

  public function delete($id)
  {
    $this->db->where('id',$id);
    $this->db->delete('t_order');
  }

  function tambah($data)
  {
    $this->db->insert('t_order', $data);
    return TRUE;
  }

}



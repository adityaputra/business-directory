<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_user extends CI_Model {
  function getAll($limit=1000, $offset = 0){
    $exec = $this->db->get_where('user', array(), $limit, $offset);
    return $exec->result_array();
  }

  function get($param, $limit=1000, $offset = 0){
    $exec = $this->db->get_where('user', array('email' => $param['email']), $limit, $offset);
    return $exec->result_array();
  }

  function check_registered_email($param){
    $exec = $this->db->get_where('user', array('email' => $param['email']));
    return $exec->result_array();
  }

  function write_account($param){
    $exec = $this->db->insert('user', $param);
    // print_r($exec); exit;
    return $exec;
  }

  function update_account($param){
    // pour($param); exit;
    $exec = $this->db->where('email', $param['email']);
    $exec = $this->db->update('user', $param);
    // print_r($exec); exit;
    return $exec;
  }

  function delete($param){
     $exec = $this->db->delete('user', array('email' => $param['email']));
     return $exec;
  }
}
?>

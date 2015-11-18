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
}
?>

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_account extends CI_Model {
  function login($param){
    $query = 'SELECT * FROM user
              WHERE email = "'.$param['email'].'"
              AND password = "'.$param['password'].'"
              ';
    $exec = $this->db->query($query);
    return $exec->result_array();
  }

  
}
?>

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_register extends CI_Model {
  function check_registered_email($param){
    $query = 'SELECT * FROM USER_ACCOUNT WHERE email = "'.$param['email'].'"';
    $exec = $this->db->query($query);
    return $exec->result_array();
  }
  function write_account($param){
    // print_r($param);
    // $query = 'INSERT INTO `dev_simplefb`.`USER_ACCOUNT` (`username`, `password`, `email`, `name`, `birthday`, `address`, `city`, `province`, `country`, `picture_loc`)
    //           VALUES ("'.$param['username'].'", "'.$param['password'].'", "'.$param['email'].'", "'.$param['name'].'", "'.$param['birthday'].'", "'.
    //           $param['address'].'", "'.$param['city'].'", "'.$param['province'].'", "'.$param['country'].'", "'.$param['picture_loc'].'");';
    // echo $query;exit;
    // $exec = $this->db->query($query);


    $exec = $this->db->insert('USER_ACCOUNT', $param);
    // print_r($exec); exit;

    return $exec;

  }
}
?>

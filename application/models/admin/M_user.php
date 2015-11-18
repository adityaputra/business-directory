<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_user extends CI_Model {
  function getAll($limit=1000, $offset = 0){
    $exec = $this->db->get_where('user', array(), $limit, $offset);
    // print_r($query->result_array()); exit;
    // $query = 'SELECT u.username, u.timestamp, u.content, a.picture_loc, a.name FROM STATUS_UPDATE u JOIN USER_ACCOUNT a WHERE u.username = a.username
    //           ORDER BY u.timestamp DESC
    //           LIMIT '.$offset.', '.$limit.'
    //           ';
    // echo $query; exit;
    // $exec = $this->db->query($query);
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

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_category extends CI_Model {
  function getAll($limit=1000, $offset = 0){
    $exec = $this->db->get_where('category', array(), $limit, $offset);
    return $exec->result_array();
  }

  function get($param, $limit=1000, $offset = 0){
    $exec = $this->db->get_where('category', array('category_id' => $param['category_id']), $limit, $offset);
    return $exec->result_array();
  }

  function insert($param){
    $exec = $this->db->insert('category', $param);
    return $exec;
  }

  function update($param){
    // pour($param); exit;
    $exec = $this->db->where('category_id', $param['category_id']);
    $exec = $this->db->update('category', $param);
    // print_r($exec); exit;
    return $exec;
  }

  function delete($param){
     $exec = $this->db->delete('category', array('category_id' => $param['category_id']));
     return $exec;
  }
}
?>

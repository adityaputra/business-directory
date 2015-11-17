<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
  function __construct(){
    parent::__construct();
    if(!is_logged_in()) redirect('admin');
    if(!is_admin()) redirect('admin');
  }

  public function index(){
    $this->all();
  }

  function all(){

    $data = array();
    $this->load->model('admin/M_user');
    $data['users'] = $this->M_user->getAll();
    // print_r($users); exit;
    //render
    $header = array('title' => $this->lang->line('title_admin_users')." - ".$this->lang->line('website_name'));
    $this->load->view('admin/general/header', $header);
    $this->load->view('admin/general/sidebar');
    $this->load->view('admin/users/all', $data);
    $this->load->view('admin/general/footer');
    $this->load->view('admin/general/script');
    $this->load->view('admin/users/script');
  }
}
?>

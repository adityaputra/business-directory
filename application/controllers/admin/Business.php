<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Business extends CI_Controller {
  function __construct(){
    parent::__construct();
    if(!is_logged_in()) redirect('admin');
    if(!is_admin()) redirect('admin');
  }

  public function index(){
    $this->all();
  }

  function all($data=array()){
    $this->load->model('admin/M_business');
    $data['categories'] = $this->M_business->getAll();
    $data['content_top_resources'] = 'admin/business/resources_top';
    $data['content'] = 'admin/business/all';
    $data['content_bottom_resources'] = 'admin/business/resources_bottom';
    $this->load->view('admin/general/template',$data);
  }

  function add(){
    if($_POST){
      $this->form_validation->set_rules('name', 'Category name', 'required');
      $this->form_validation->set_rules('slug', 'Slug', 'required|alpha_dash');
      $param = $_POST;

      if ($this->form_validation->run() == FALSE)
  		{
        $data['content_top_resources'] = 'admin/category/resources_top';
        $data['content'] = 'admin/category/add';
        $data['content_bottom_resources'] = 'admin/category/resources_bottom';
        $this->load->view('admin/general/template',$data);
  		}
  		else
  		{
        $data = array();

        $this->load->model('admin/M_category');
        $add = $this->M_category->insert($param);
        // pour($add); exit;

        if($add == 1){
          $data['success'] = array();
          array_push($data['success'], 'Category '.$param['name'].' has been added.');
          $this->all($data);
        }
        else {
          $data['error'] = array();
          array_push($data['error'], 'Please check any category name / slug duplicates.');
          $data['content_top_resources'] = 'admin/category/resources_top';
          $data['content'] = 'admin/category/add';
          $data['content_bottom_resources'] = 'admin/category/resources_bottom';
          $this->load->view('admin/general/template',$data);

        }

  		}
    }
    else{
      $data['content_top_resources'] = 'admin/category/resources_top';
      $data['content'] = 'admin/category/add';
      $data['content_bottom_resources'] = 'admin/category/resources_bottom';
      $this->load->view('admin/general/template',$data);
    }
  }

  function edit($param=null){
    if($_POST){
      $this->form_validation->set_rules('name', 'Category name', 'required');
      $this->form_validation->set_rules('slug', 'Slug', 'required|alpha_dash');
      $param = $_POST;

      if ($this->form_validation->run() == FALSE)
  		{
        $data['content_top_resources'] = 'admin/category/resources_top';
        $data['content'] = 'admin/category/edit';
        $data['content_bottom_resources'] = 'admin/category/resources_bottom';
        $this->load->view('admin/general/template',$data);
  		}
  		else
  		{
        $data = array();

        $this->load->model('admin/M_category');
        $update = $this->M_category->update($param);
        // pour($update); exit;
        $add = FALSE;

        if($update == 1){
          $data['success'] = array();
          array_push($data['success'], 'Category '.$param['name'].' has been updated.');
          $this->all($data);
        }
        else {
          $data['error'] = array();
          array_push($data['error'], 'Error updating category '.$param['name'].".");
          $data['content_top_resources'] = 'admin/category/resources_top';
          $data['content'] = 'admin/category/edit';
          $data['content_bottom_resources'] = 'admin/category/resources_bottom';
          $this->load->view('admin/general/template',$data);

        }

  		}
    }
    else{
      $id = base64_decode(urldecode($param));
      $data = array();
      $this->load->model('admin/M_category');
      $data['detail'] = $this->M_category->get(array('category_id' => $id))[0];
      $data['content_top_resources'] = 'admin/category/resources_top';
      $data['content'] = 'admin/category/edit';
      $data['content_bottom_resources'] = 'admin/category/resources_bottom';
      $this->load->view('admin/general/template',$data);
    }

  }
/*
  function detail($param){
    $email = base64_decode(urldecode($param));
    $data = array();
    $this->load->model('admin/M_user');
    $data['detail'] = $this->M_user->get(array('email' => $email))[0];
    // print_r($data); exit;
    //render
    $header = array('title' => $this->lang->line('title_admin_users')." - ".$this->lang->line('website_name'));
    $this->load->view('admin/general/header', $header);
    $this->load->view('admin/general/sidebar');
    $this->load->view('admin/users/detail', $data);
    $this->load->view('admin/general/footer');
    $this->load->view('admin/general/script');
    $this->load->view('admin/users/script');
  }
*/
  function delete($param=null){
    $this->load->model('admin/M_category');
    $id = base64_decode(urldecode($param));
    $param = array('category_id' => $id);
    $delete = $this->M_category->delete($param);
    // pour($delete); exit;

    if($delete == 1){
      $data['success'] = array();
      array_push($data['success'], 'Selected category has been removed.');
      $this->all($data);
    }
    else {
      $data['error'] = array();
      array_push($data['error'], 'Unable to remove category '.$param['name'].".");
      $this->all($data);

    }
  }


}
?>

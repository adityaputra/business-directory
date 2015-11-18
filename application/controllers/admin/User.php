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

  function all($data=array()){
    // pour($data);
    // $data = array();
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

  function add(){
    $this->load->helper(array('form'));

		$this->load->library('form_validation');
    $this->form_validation->set_rules('first_name', 'First name', 'required');
    $this->form_validation->set_rules('last_name', 'Last name', 'required');
    $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'required');
		$this->form_validation->set_rules('role', 'Role', 'required');

    if($_POST){
      $param = $_POST;
      // print_r($_POST);
      if ($this->form_validation->run() == FALSE)
  		{
  			// $this->load->view('myform');
        // echo "ada yang kurang";
        $header = array('title' => $this->lang->line('title_admin_users')." - ".$this->lang->line('website_name'));
        $this->load->view('admin/general/header', $header);
        $this->load->view('admin/general/sidebar');
        $this->load->view('admin/users/add');
        $this->load->view('admin/general/footer');
        $this->load->view('admin/general/script');
        $this->load->view('admin/users/script');
  		}
  		else
  		{
        // pour($_POST);
  			// echo "lengkap";

        $data = array();

        // db insert
        // $add = FALSE;

        $add = $this->do_register($param, $_FILES);
        // pour($add); exit;


        if($add['status'] == 1){
          $data['success'] = array();
          array_push($data['success'], 'User '.$param['email'].' has been added.');
          $this->all($data);
        }
        else {
          $data['error'] = array();
          array_push($data['error'], $add['message']);

          $header = array('title' => $this->lang->line('title_admin_users')." - ".$this->lang->line('website_name'));
          $this->load->view('admin/general/header', $header);
          $this->load->view('admin/general/sidebar');
          $this->load->view('admin/users/add', $data);
          $this->load->view('admin/general/footer');
          $this->load->view('admin/general/script');
          $this->load->view('admin/users/script');

        }

  		}
    }
    else{
      $header = array('title' => $this->lang->line('title_admin_users')." - ".$this->lang->line('website_name'));
      $this->load->view('admin/general/header', $header);
      $this->load->view('admin/general/sidebar');
      $this->load->view('admin/users/add');
      $this->load->view('admin/general/footer');
      $this->load->view('admin/general/script');
      $this->load->view('admin/users/script');
    }
  }

  function edit($param=null){
    if($_POST){
      $this->form_validation->set_rules('first_name', 'First name', 'required');
      $this->form_validation->set_rules('last_name', 'Last name', 'required');
      $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
  		// $this->form_validation->set_rules('password', 'Password', 'required');
  		$this->form_validation->set_rules('role', 'Role', 'required');

      $param = $_POST;
      // print_r($_POST); exit;
      if ($this->form_validation->run() == FALSE)
  		{
  			$header = array('title' => $this->lang->line('title_admin_users')." - ".$this->lang->line('website_name'));
        $this->load->view('admin/general/header', $header);
        $this->load->view('admin/general/sidebar');
        $this->load->view('admin/users/edit');
        $this->load->view('admin/general/footer');
        $this->load->view('admin/general/script');
        $this->load->view('admin/users/script');
  		}
  		else
  		{
        // pour($param);exit;
  			// echo "lengkap";

        $data = array();

        // db insert

        $add = $this->do_edit($param, $_FILES);
        // pour($add); exit;
        // $add = FALSE;

        if($add['status'] == 1){
          $data['success'] = array();
          array_push($data['success'], 'User '.$param['email'].' has been saved.');
          $this->all($data);
        }
        else {
          $data['error'] = array();
          array_push($data['error'], $add['message']);

          $header = array('title' => $this->lang->line('title_admin_users')." - ".$this->lang->line('website_name'));
          $this->load->view('admin/general/header', $header);
          $this->load->view('admin/general/sidebar');
          $this->load->view('admin/users/edit', $data);
          $this->load->view('admin/general/footer');
          $this->load->view('admin/general/script');
          $this->load->view('admin/users/script');

        }

  		}
    }
    else{
      $email = base64_decode(urldecode($param));
      $data = array();
      $this->load->model('admin/M_user');
      $data['detail'] = $this->M_user->get(array('email' => $email))[0];

      $header = array('title' => $this->lang->line('title_admin_users')." - ".$this->lang->line('website_name'));
      $this->load->view('admin/general/header', $header);
      $this->load->view('admin/general/sidebar');
      $this->load->view('admin/users/edit', $data);
      $this->load->view('admin/general/footer');
      $this->load->view('admin/general/script');
      $this->load->view('admin/users/script');
    }

  }

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

  function delete($param=null){
    $this->load->model('admin/M_user');
    $email = base64_decode(urldecode($param));
    $param = array('email' => $email);
    $delete = $this->M_user->delete($param);
    // pour($delete); exit;

    if($delete == 1){
      $data['success'] = array();
      array_push($data['success'], 'User '.$param['email'].' has been removed.');
      $this->all($data);
    }
    else {
      $data['error'] = array();
      array_push($data['error'], 'Unable to remove user '.$param['email'].".");
      $this->all($data);

    }
  }

  function do_edit($param, $file){
    // pour($param); pour($_FILES);exit;
    // Submitted form actions do register
    $this->load->model('admin/M_user');

    // encrypt password

    if(!empty($param['password'])) $param['password'] = md5($param['password']);
    else{
      unset($param['password']);
    }
    // pour($param); pour($_FILES);exit;

    // check account exist
    $count_account = $this->M_user->check_registered_email($param);
    if(sizeof($count_account) == 0){
      return array('status' => 0, 'message' => 'Email '.$param['email'].' has not been registered, no script kiddies, please.');
    }

    if(!empty($file['avatar']['name'])){
      $file_upload = $this->do_upload($file, $param);

      if($file_upload['status'] == 0){
        return array('status' => 0, 'message' => 'Error uploading avatar. Please check the submitted file.');
      }

      $param['avatar_loc'] = $file_upload['message'];
    }

    // write to db
    $update_account = $this->M_user->update_account($param);

    if($update_account == 1){
      // echo $write_account; exit;
      return array('status' => 1, 'message' => 'User edit success');
    }
    else{
      // echo $write_account."FAILED TO REGISTER"; exit;
      return array('status' => 0, 'message' => 'User edit failed');
    }


  }

  function do_register($param, $file){
    // pour($param); pour($_FILES);exit;
    // Submitted form actions do register
    $this->load->model('admin/M_user');
    // encrypt password
    $param['password'] = md5($param['password']);

    // check email unique
    $count_account = $this->M_user->check_registered_email($param);
    if(sizeof($count_account) != 0){
      return array('status' => 0, 'message' => 'Email '.$param['email'].' has already been registered, please enter other email address.');
    }

    $file_upload = $this->do_upload($file, $_POST);

    if($file_upload['status'] == 0){
      return array('status' => 0, 'message' => 'Error uploading avatar. Please check the submitted file.');
    }

    // write to db
    $param['avatar_loc'] = $file_upload['message'];
    $write_account = $this->M_user->write_account($param);

    if($write_account == 1){
      // echo $write_account; exit;
      return array('status' => 1, 'message' => 'registration success');
    }
    else{
      // echo $write_account."FAILED TO REGISTER"; exit;
      return array('status' => 0, 'message' => 'registration failed');
    }


  }

  function check_registered_email(){
    $this->load->model('M_user');
    $this->M_register->check_registered_email();
  }

  function do_upload($file, $param){
    // print_r($file); exit;
    $target_dir = SITE_ROOT."/uploads/avatar/";
    $target_dir = AVATAR_ROOT;

    $name = $file["avatar"]["name"];
    $ext = end((explode(".", $name))); # extra () to prevent notice

    $target_file_name = md5($param['email'].time().basename($file["avatar"]["name"])) . "." . $ext;

    $target_file = $target_dir . $target_file_name;
    $uploadOk = 1;
    $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

    // Check if image file is a actual image or fake image
    $check = getimagesize($file["avatar"]["tmp_name"]);
    if($check !== false) {
        // echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        // echo "File is not an image.";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        // echo "Sorry, your file was not uploaded.";
        return array('status' => 0, 'message' => 'File is not an image');
    // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($file["avatar"]["tmp_name"], $target_file)) {
            // echo "The file ". basename( $file["picture"]["name"]). " has been uploaded.";
            return array('status' => 1, 'message' => $target_file_name);
        } else {
            return array('status' => 0, 'message' => 'Failed to upload avatar, please contact site\'s administrator.');
        }
    }
  }
}
?>

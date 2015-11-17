<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index(){
    $this->lang->load('admin/general', 'english');
  // session check
		// print_r($this->session->userdata('logged_in')); exit;
		// if logged in
		if($this->session->userdata('logged_in')){
      

      // exit;

			$header = array('title' => $this->lang->line('title_admin_home'));
			$this->load->view('admin/general/header', $header);
			$this->load->view('admin/general/sidebar');
			$this->load->view('admin/home/home');
			$this->load->view('admin/general/footer');
			$this->load->view('admin/home/script');
		}

		// else
		else{
			$header = array('title' => $this->lang->line('title_admin_login'));
			$this->load->view('admin/general/header', $header);
      $this->load->view('admin/general/sidebar');
			$this->load->view('admin/home/login');
      $this->load->view('admin/general/footer');
		}
  }

  function login(){
		$param = $_POST;
    $param['password'] = md5($param['password']);

		$this->load->model('admin/M_account');
		$account = $this->M_account->login($param);
		// print_r($account); exit;

		if(!empty($account)){
			$login = array(
                         'email'  => $param['email'],
												 'first_name' => $account[0]['first_name'],
                         'last_name' => $account[0]['last_name'],
                         'role' => $account[0]['role'],
                         'notification' => 'welcome',
                         'logged_in' => TRUE
                     );
      $this->session->set_userdata($login);
			redirect('admin');
		}

		else {
			$result = array('status' => 0, 'message' => 'Please check your username / password.');
			$this->load->view('admin/general/header');
      $this->load->view('admin/general/sidebar');
			$this->load->view('admin/home/login', $result);
      $this->load->view('admin/general/footer');
		}

	}

  function logout()
	{
    $this->session->sess_destroy();
    redirect('admin');
  }
}

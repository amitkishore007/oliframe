<?php
defined('BASEPATH') OR exit('No direct script access allowed');


/**
* 
*/
class Admin_login extends CI_Controller
{
	
	
	public function __construct() {

		parent::__construct();

		if ($this->session->userdata('is_logged_in')) {
			return redirect('admin/dashboard');
		}

		$this->load->model('adminModel');

	}

	public function index() {

		$this->load->view('admin/login');
	}

	public function login() {

		if ($this->input->post('login')) {
			

			unset($_POST['login']);
		   

		    $admin = $this->adminModel->check_login($this->input->post());
			
			echo json_encode($admin);

				
		} else {

			$this->index();
 
		}

	}
}
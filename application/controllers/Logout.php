<?php 
defined('BASEPATH') OR exit('No direct script access allowed');



/**
* 
*/
class Logout extends CI_Controller
{
	

	public function index(){

		$url = 'shop';

		if ($this->session->userdata('role')=='superadmin' ) {
			
			$url = 'admin';
		}

		

		$this->session->sess_destroy();
		return redirect($url);
	}
	
}
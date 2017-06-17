<?php 
defined('BASEPATH') OR exit('No direct script access allowed');



/**
* Admin controller to perform the operation
*/
class Admin extends CI_Controller
{
	

	public function __construct() {

		parent::__construct();
		
		if (!$this->session->userdata('is_logged_in')) {
			return redirect('admin_login');
		}
		

		$this->load->model('adminModel');

	}

	

	public function index() {

		 $this->dashboard();		
	}

	public function dashboard() {

		$data['main_content'] = 'admin/dashboard_view';

		$this->load->view('admin_includes/template',$data);
		
		
	}

	public function create_category() {

		$data['main_content'] = 'admin/category/create_category';
		$data['categories']	 = $this->adminModel->all_category();
	

		$this->load->view('admin_includes/template',$data);			

	}





	public function products() {

		$data['main_content'] = 'admin/product/product_list';

		$this->load->view('admin_includes/template',$data); 
	}

	public function upload_image() {


		echo $this->adminModel->upload_image();

	}


	public function create() {

		$data['main_content'] = 'admin/vandor/create_vandor';

		$this->load->view('admin_includes/template',$data); 


	}

	public function create_vandor() {

		if ($this->input->post()) {

			unset($_POST['vandor']);

			$output = $this->adminModel->create_vandor();

			echo json_encode($output);
			
		} else {

			return redirect('index');
		}
	}

	public function vandors() {

		$data['main_content'] = 'admin/vandor/vandor_list';

		$data['vandors']	 = $this->adminModel->all_user_type('vandor');

		
		$this->load->view('admin_includes/template',$data);

	}

	public function edit($id){

		if (!isset($id)) {
			return redirect('index');
		}
		$id = (int) $id;
		$data['main_content'] = 'admin/vandor/edit_vandor';
		$data['vandor']	 = $this->adminModel->find_vandor($id);
		$this->load->view('admin_includes/template',$data);


	}

	public function delete_vandor() {

		if ($this->input->post()) {

			unset($_POST['delete']);

			$output = $this->adminModel->delete_vandor();

			echo json_encode($output);
			
		} else {

			return redirect('index');
		}

	}

	

}
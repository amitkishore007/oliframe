<?php
defined('BASEPATH') OR exit('No direct script access allowed');


/**
* 
*/
class Category extends CI_Controller
{
	
	
	public function __construct() {

		parent::__construct();
		
		if (!$this->session->userdata('is_logged_in')) {
			return redirect('admin_login');
		}
		

		$this->load->model('categoryModel');

	}


	public function create() {

		$data['main_content'] = 'admin/category/create_category';

		$data['categories'] = $this->categoryModel->allCategory();

		$this->load->view('admin_includes/template',$data);

	}


	public function store_category() {


		if ($this->input->post('category')) {


			unset($_POST['category']);

			// print_r($_POST);
			$result = $this->categoryModel->create_category();

			echo json_encode($result);

			
		} else {

			$this->dashboard();
		}

	}


	public function edit_category() {


		if ($this->input->post('category')) {


			unset($_POST['category']);

			// print_r($_POST);
			$result = $this->categoryModel->edit_category();

			echo json_encode($result);

			
		} else {

			$this->dashboard();
		}

	}

	public function delete(){

		if ($this->input->post()) {
			
			$output = $this->categoryModel->deleteCategory();

			echo json_encode($output);


		} else {

			return redirect('category');
		}


	}

	public function edit($id){


		if (!isset($id)) {
			
			return redirect('category');
		}

		$id  = (int) $id;
		$data['main_content'] = 'admin/category/edit_category';
		$data['category']	 = $this->categoryModel->find_category($id);
		$data['categories']	 = $this->categoryModel->allCategory();

		if ($data['category']) {
			
			$this->load->view('admin_includes/template',$data);
		
		} else {

			return redirect('category');
		}


	}

	public function index() {


		$data['main_content'] = 'admin/category/category_list';
		$data['categories'] = $this->categoryModel->fetchCategoryTree();
		$this->load->view('admin_includes/template',$data);


	}


	public function home_category() {

		$data['main_content'] = 'admin/category/home_category';

		$data['categories'] = $this->categoryModel->home_category();

	// print_r($data['categories']);
		$this->load->view('admin_includes/template',$data);
	}

	public function set_home_category() {

		if ($this->input->post()) {
			
			$output = $this->categoryModel->set_home_category();

			echo $output;


		} else {

			return redirect('category');
		}


	}

	public function get_variations() {

		if ($this->input->post()) {
			
			$output = $this->categoryModel->get_variations();

			echo json_encode($output);

		} else {

			return redirect('admin');
		}
	}




}
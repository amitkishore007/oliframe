<?php 
defined('BASEPATH') OR exit('No direct script access allowed');



/**
* 
*/
class About extends CI_Controller
{
	
	

	public function __construct() {

		parent :: __construct();
		$this->load->model('aboutModel');

	}

	public function index() {

		$data['main_content'] = 'admin/about/index';
		$data['about'] = $this->aboutModel->findAll();

	

		$this->load->view('admin_includes/template',$data);

	}

	public function create() {

		$data['main_content'] = 'admin/about/create';

		$this->load->view('admin_includes/template',$data);


	}

	public function create_about() {

		if ($this->input->post()) {

			unset($_POST['about']);
			
			$status = $this->aboutModel->createAbout();

			echo json_encode($status);

		} else {

			return redirect('about');
		}

	}

	public function edit($id) {

		if (!isset($id)) {
			
			return redirect('about');
		}
		$id = (int) $id;

		$data['main_content'] = 'admin/about/edit';
		$data['about_content']  = $this->aboutModel->find_about($id);


		$this->load->view('admin_includes/template',$data);

	}


	public function store() {

		if ($this->input->post()) {

			unset($_POST['edit']);
			
			$status = $this->aboutModel->editAbout();

			echo json_encode($status);

		} else {

			return redirect('about/index');
		}


	}

	public function delete() {

		if ($this->input->post()) {

			unset($_POST['delete']);

			$status = $this->aboutModel->deleteAbout();

			echo json_encode($status);
			
		} else {

			return redirect('about');
		}


	}

	public function change_status() {

		if ($this->input->post()) {
		
			$status = $this->aboutModel->change_status();
			echo $status;

		} else {

			return redirect('about');
		}
	}


}
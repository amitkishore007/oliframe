<?php 


/**
* 
*/
class Color extends CI_Controller
{

	public function __construct(){

		parent::__construct();

		$this->load->model('colorModel');

	}
	
	public function index() {

		$data['main_content'] = 'admin/shop/colors';
		$data['colors'] = $this->colorModel->showColors();

		

		$this->load->view('admin_includes/template',$data);

	}


	public function add() {

		$data['main_content'] = 'admin/shop/add_color';

		$this->load->view('admin_includes/template',$data);

	}

	public function addColor() {

		if ($this->input->post()) {
			
			$status = $this->colorModel->addColor();

			echo json_encode($status);

		} else {

			return redirect('color');
		}
	}


	public function edit($id) {

		if (!isset($id)) {
			
			return redirect('color');
		}

		$id = (int) $id;


		$color 			= $this->colorModel->getColor($id);

		if (!$color) {
			
			return redirect('color');
		}

		$data['color'] 		= $color;

		$data['main_content'] = 'admin/shop/edit_color';

		$this->load->view('admin_includes/template',$data);

	}




	public function editColor() {

		if ($this->input->post()) {
				
			$status = $this->colorModel->editColor();

			echo json_encode($status);

		} else {

			return redirect('color');

		}
	}


	public function delete_color() {


		if ($this->input->post()) {
			
			$status = $this->colorModel->delete_color();

			echo $status;

		} else {

			return redirect('color');
		}


	}

}
<?php 
defined('BASEPATH') OR exit('No direct script access allowed');



/**
* 
*/
class Banner extends CI_Controller
{

	public function __construct() {

		parent:: __construct();
		$this->load->model('bannerModel');
	}	


	public function index() {

		$data['main_content'] = 'admin/banner/banners';

		$data['banners'] = $this->bannerModel->getAll();

		$this->load->view('admin_includes/template',$data);

	}


	public function upload_banner() {

		$data['main_content'] = 'admin/banner/upload_banner';

		$this->load->view('admin_includes/template',$data);

	}

	public function upload() {

		$config['upload_path']   = './uploads';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['encrypt_name']  = TRUE;
		$config['remove_spaces'] = TRUE;
		$output = array('status'=>false,'name'=>'','error'=>'');


            $this->load->library('upload', $config);

            if ($this->upload->do_upload('file')) {

                $data = $this->upload->data();

				$config['image_library']  = 'gd2';
				$config['source_image']   = './uploads/'.$data['file_name'];
				$config['new_image']      = './uploads/thumbs/';
				$config['maintain_ratio'] = TRUE;
				$config['width']          = 400;
				$config['height']         = 400;
				$config['overwrite']      = TRUE;
				
				$this->load->library('image_lib', $config); 
				if (!$this->image_lib->resize()) {
				    return 'There was en error with image uploading, try later!';
				}

				// return $data['file_name'];
				// $this->db->insert('product_images',['name'=>$data['file_name'],'user_id'=>$this->session->userdata('user_id')]);
					
				$image = $this->bannerModel->saveImage($data['file_name']);
				
				if ($image) {
						# code...
					$output['status'] = true;
					$output['name']   = $data['file_name'];

				} else {

					$output['error'] = 'could not upload image, try later';
					
					

				}	 

				
            } else {
				$output['error'] = 'could not upload image, try later';

            }
            echo json_encode($output);


	}

	public function change_status() {

		if ($this->input->post()) {
		
			$status = $this->bannerModel->change_status();
			echo $status;

		} else {

			return redirect('banner');
		}
	}

	public function delete() {

		if ($this->input->post()) {
			
			$status = $this->bannerModel->delete();

			echo $status;

		} else {

			return redirect('banner');

		}


	}

	public function set_location() {

		if ($this->input->post()) {
			
			$status = $this->bannerModel->set_location();

			echo $status;

		} else {

			return redirect('banner');

		}


	}

	public function set_order() {

		if ($this->input->post()) {
			
			$status = $this->bannerModel->set_order();

			echo $status;

		} else {

			return redirect('banner');

		}


	}



}
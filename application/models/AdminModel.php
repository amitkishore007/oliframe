<?php 

/**
* 
*/
class AdminModel extends CI_Model
{
	

	public function check_login($info) {

		$info  = $this->input->post();

		$info['user_type'] = 'superadmin';
	
		$this->load->library('form_validation');

		$output = array();
		
		$output['status'] = "";
		
		$output['msg']    = "";
				

		if ($this->form_validation->run('login_form_validation')==FALSE) {
				
			$output['status'] = "false";
			$output['msg']    = "Email/password did not matched !";

		} else {

		
			$info['password'] = md5($info['password']);
			
			$result = $this->db->where($info)->get('users');

			if ($result->num_rows()) {
					
				$admin  = $result->row();
				$data = array(
					'user_id'=>$admin->id,
					'user_email'=>$admin->email,
					'role'=>$admin->user_type,
					'is_logged_in'=>true
					);
				$this->session->set_userdata($data);
				
				$output['status'] = "true";
				
				$output['msg']    = "success";

			} else {

				$output['status'] = "false";
				
				$output['msg']          = "Admin not found";
				
			}


		}

		return $output;

	}



	public function upload_image() {
          
			$config['upload_path']   = './uploads';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['encrypt_name']  = TRUE;
			$config['remove_spaces'] = TRUE;

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('file')) {

                $data = $this->upload->data();

				$config['image_library']  = 'gd2';
				$config['source_image']   = './uploads/'.$data['file_name'];
				$config['new_image']      = './uploads/';
				$config['maintain_ratio'] = TRUE;
				$config['width']          = 400;
				$config['height']         = 400;
				$config['overwrite']      = TRUE;
				
				$this->load->library('image_lib', $config); 
				if (!$this->image_lib->resize()) {
				    return 'There was en error with image uploading, try later!';
				}

				// return $data['file_name'];
				$this->db->insert('product_images',['name'=>$data['file_name'],'user_id'=>$this->session->userdata('user_id')]);
            }
	}



	public function create_vandor() {

		$info  = $this->input->post();

		$this->load->library('form_validation');

			$output = array();
		
			$output['status']  = "";
			$output['name']    = "";
			$output['email']  = "";
			$output['password']    = "";
			$output['phone']    = "";
					

		if ($this->form_validation->run('vandor_form_validation')==FALSE) {
			
			$this->form_validation->set_error_delimiters('', '');
			$output['status']   = "false";
			$output['name']     = form_error('username');
			$output['email']    = form_error('email');
			$output['password'] = form_error('password');
			$output['phone'] = form_error('phone');
			$output['msg']      = 'error occured';

		} else {

			$info['password'] = md5($info['password']);
			$info['user_type'] = 'vandor';

			$this->db->insert('users',$info);

			if ($this->db->affected_rows()) {
					
				
				$output['status'] = "true";	
				

			} else {

				$output['status'] = "false";
				
				$output['msg']   = "vandor could not be created, please try later";
				
			}


		}

		return $output;


	}


	public function all_user_type($type) {

		$q = $this->db->where(['user_type'=>$type])->order_by('created_at','DESC')->get('users');

		if ($q->num_rows()) {

			return $q->result();
		}
	}

	public function find_vandor($id) {

		$q = $this->db->where(['id'=>$id])->get('users');

		if ($q->num_rows()==1) {

			return $q->row();
		}
	}

	public function delete_vandor() {

		$id = (int) $this->input->post('id');

		$output = array('status'=>'false','msg'=>'');

		$q = $this->db->where(['id'=>$id,'user_type'=>'vandor'])->get('users');

		if ($q->num_rows()==1) {
			
			//perform the delete operation
			$this->db->where(['id'=>$id])->delete('users');

			if ($this->db->affected_rows()==1) {
				
				$output['status'] = 'true';
				$output['msg']	 ='success';


			}

		} 

		return $output;

	}


	


}
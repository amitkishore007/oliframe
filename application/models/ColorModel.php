<?php 


/**
* 
*/
class ColorModel extends CI_Model
{
	
	
	public function addColor() {

		$this->load->library('form_validation');

			
		$output = array('status'=>'false','name'=>'','code'=>'');	

		if ($this->form_validation->run('addcolor_form_validation')==FALSE) {
				$this->form_validation->set_error_delimiters('', '');
				$output['name'] = form_error('name');
				$output['code'] = form_error('colorCode');



		} else {

			$name = $this->input->post('name');
			$code = $this->input->post('colorCode');
			
			$q = $this->db->insert('color',['name'=>$name,'code'=>$code]);


			if ($this->db->affected_rows()==1) {
				
				$output['status'] = 'success';
			}

		}

		return $output;


	}


	public function showColors() {

		$q = $this->db->select('id, name, code')->from('color')->get();

		if ($q->num_rows()) {
			
			return $q->result();
		}


	}

	public function getColor($id) {

		$q = $this->db->where(['id'=>$id])->get('color');

		if ($q->num_rows()) {
			
			return $q->row();
		}

	}


	public function editColor() {


		$this->load->library('form_validation');

		$output = array('status'=>'false','name'=>'','code'=>'','color'=>'');

		if ($this->form_validation->run('editcolor_form_validation')==FALSE) {
			
			$output['name'] = form_error('name');
			$output['code'] = form_error('colorCode');
			$output['color'] = form_error('colorId');

		} else {

			$info = array(
				'id'=>$this->input->post('colorId'),
				'name'=>$this->input->post('name'),
				'code'=>$this->input->post('colorCode')
				);


			$q = $this->db->where(['id'=>$info['id']])->get('color');

			if ($q->num_rows()) {
				
				$this->db->where(['id'=>$info['id']])->update('color',$info);

				if ($this->db->affected_rows()==1) {
					
					$output['status'] = 'success';
				}
			} 

		}

		return $output;

	}



	public function delete_color() {

		$id = $this->input->post('color_id');

		$output = 'false';

		if (isset($id)) {
			
			$id = (int) $id;

			$q = $this->db->where(['id'=>$id])->get('color');

			if ($q->num_rows()) {
				
				$this->db->where(['id'=>$id])->delete('color');

				if ($this->db->affected_rows()==1) {
					
					$output = 'success';
				}
			}
		}

		return $output;
	}


}
<?php 


/**
* 
*/
class LogoModel extends CI_Model
{
	
	

	public function saveImage($image) {

		$this->db->insert('logo',['logo'=>$image]);
		
		if ($this->db->affected_rows()) {
			
			return true;
		}

	}

	public function getAll() {

		$q = $this->db->order_by('created_at','DESC')->get('logo');

		if ($q->num_rows()) {
			
			return $q->result();
		}
	}

	public function delete() {

		$info = $this->input->post();

		$id = (int) $info['id'];

		$q  = $this->db->where(['id'=>$id])->get('logo');

		$output = 'false';

		if ($q->num_rows()==1) {
			
			$q1 = $this->db->where(['id'=>$id])->delete('logo');

			if ($this->db->affected_rows()==1) {
				
				$output = 'success';

			} else {

				$output = 'error';
			}
		} else {

			$output ='error';
		}

		return $output;

	}



	public function change_status() {

		$info  = $this->input->post();

		$id = $info['id'];
		// return $info;

		$q = $this->db->where(['id'=>$id])->get('logo');
		$output = 'false';

		
		if ($q->num_rows()==1) {

				$this->db->update('logo',['status'=>0]);
				
				$q1 = $this->db->where(['id'=>$id])->update('logo',['status'=>1]);


				
				if ($this->db->affected_rows()>=0) {
					
					$output =  'true';

				} else {

					$output = 'error';
				}
		}

		return $output;


	}

	public function getLogo(){

		$q = $this->db->where(['status'=>1])->get('logo');

		if ($q->num_rows()) {
			
			return $q->row();
		}
	}


}
<?php 


/**
* 
*/
class SliderModel extends CI_Model
{
	
	

	public function saveImage($image) {

		$this->db->insert('slider',['slide'=>$image]);
		
		if ($this->db->affected_rows()) {
			
			return true;
		}

	}

	public function getAll() {

		$q = $this->db->order_by('created_at','DESC')->get('slider');

		if ($q->num_rows()) {
			
			return $q->result();
		}
	}

	public function delete() {

		$info = $this->input->post();

		$id = (int) $info['id'];

		$q  = $this->db->where(['id'=>$id])->get('slider');

		$output = 'false';

		if ($q->num_rows()==1) {
			
			$q1 = $this->db->where(['id'=>$id])->delete('slider');

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

		$q = $this->db->where(['id'=>$id])->get('slider');
		$output = 'false';

		
		if ($q->num_rows()==1) {

			
				
				if ($info['change']=='active') {
					 
					$q1 = $this->db->where(['id'=>$id])->update('slider',['status'=>1]);
				
				} else {
					
					$q1 = $this->db->where(['id'=>$id])->update('slider',['status'=>0]);
				}

				
				if ($this->db->affected_rows()>=0) {
					
					$output =  'true';

				} else {

					$output = 'error';
				}
		}

		return $output;


	}

	


}
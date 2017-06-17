<?php 


/**
* 
*/
class BannerModel extends CI_Model
{
	



	public function saveImage($image) {

		$this->db->insert('banners',['banner'=>$image]);
		
		if ($this->db->affected_rows()) {
			
			return true;
		}

	}

	public function getAll() {

		$q = $this->db->order_by('created_at','DESC')->get('banners');

		if ($q->num_rows()) {
			
			return $q->result();
		}
	}

	public function delete() {

		$info = $this->input->post();

		$id = (int) $info['id'];

		$q  = $this->db->where(['id'=>$id])->get('banners');

		$output = 'false';

		if ($q->num_rows()==1) {
			
			$q1 = $this->db->where(['id'=>$id])->delete('banners');

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

		$q = $this->db->where(['id'=>$id])->get('banners');
		$output = 'false';

		
		if ($q->num_rows()==1) {

			
				
				if ($info['change']=='active') {
					 
					$q1 = $this->db->where(['id'=>$id])->update('banners',['status'=>1]);
				
				} else {
					
					$q1 = $this->db->where(['id'=>$id])->update('banners',['status'=>0]);
				}

				
				if ($this->db->affected_rows()>=0) {
					
					$output =  'true';

				} else {

					$output = 'error';
				}
		}

		return $output;


	}


	public function set_location(){

		$info     = $this->input->post();
		$id       = $info['id'];
		$location = $info['location'];

		$q = $this->db->where(['id'=>$id])->get('banners');

		$output = 'false';

		if ($q->num_rows()) {
			
			$q1 = $this->db->where(['id'=>$id])->update('banners',['page_location'=>$location]);

			if ($this->db->affected_rows()>=0) {
					
					$output = 'success';
			
			} else {

				 	$output = 'error';
			}
		}

		return $output;


	}


	public function set_order() {

		$info     = $this->input->post();
		$id       = $info['banner_id'];
		$order    = (int) $info['order'];

		$q = $this->db->where(['id'=>$id])->get('banners');
		

		$output = 'false';

		if ($q->num_rows()) {
			
			$q1 = $this->db->where(['id'=>$id])->update('banners',['view_order'=>$order]);

			if ($this->db->affected_rows()>=0) {
					
					$output = 'success';
			
			} else {

				 	$output = 'error';
			}
		}

		return $output;

	}

	public function getBanner($location) {

		$q = $this->db->where(['page_location'=>$location,'status'=>1])->order_by('view_order','ASC')->get('banners');

		if ($q->num_rows()) {
			
			return $q->result();
		}

	}


}
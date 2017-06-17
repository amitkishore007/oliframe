<?php 



/**
* 
*/
class CategoryModel extends CI_Model
{




	public function allCategory() {


		$q = $this->db->select('id,name,parent_id')->from('categories')->get();

		if ($q->num_rows()) {
			
			return $q->result();
		}

		// return $this->fetchCategoryTree();

	}

	public function allCategory_array() {


		$q = $this->db->select('id,name,parent_id')->from('categories')->get();

		if ($q->num_rows()) {
			
			$categories = array();

			foreach ($q->result() as $category) {
				
				$categories[] = array('id'=>$category->id,'name'=>$category->name,'parent_id'=>$category->parent_id,'has_child'=>$this->has_child($category->id));
			
			}
			return $categories;
			// return $q->result_array();



		}

		// return $this->fetchCategoryTree();

	}

	private function has_child($cat_id) {


		$q = $this->db->where(['parent_id'=>$cat_id])->get('categories');

		if ($q->num_rows()) {
			
			return 1;
		} else {
			return 0;
		}

	}

	public function create_category() {

		$info  = $this->input->post();

		$variations = $info['variations'];
		unset($info['variations']);
		
		$this->load->library('form_validation');

			$output = array();
		
			$output['status']  = "";
			$output['name']    = "";
			$output['parent']  = "";
			$output['desc']    = "";
					

		if ($this->form_validation->run('category_form_validation')==FALSE) {
			
			$this->form_validation->set_error_delimiters('', '');
			$output['status']  = "false";
			$output['name']    = form_error('name');
			$output['parent']  = form_error('parent_id');
			$output['desc']    = form_error('description');
			$output['msg']     = 'error occured';

		} else {


			$this->db->insert('categories',$info);

			if ($this->db->affected_rows()) {
					
				 $insert_id = $this->db->insert_id();

				 if (!empty($variations)) {
				 	
					 foreach ($variations as $variation) {
					 	
					 	$q = $this->db->where(['cat_id'=>$insert_id,'variation'=>$variation])->get('category_variation');

					 	if (!$q->num_rows) {
					 		
						 	$this->db->insert('category_variation',['cat_id'=>$insert_id,'variation'=>$variation]);
					 	}

					 
					 }
				 }
				$output['status'] = "true";	
				

			} else {

				$output['status'] = "false";
				
				$output['msg']   = "Category could not be created, please try later";
				
			}

		}

		return $output;


	}


		public function edit_category() {

		

		$info  = $this->input->post();
		
	
		$this->load->library('form_validation');

			$output = array();
		
			$output['status']  = "";
			$output['name']    = "";
			$output['parent']  = "";
			$output['desc']    = "";
					

		if ($this->form_validation->run('category_form_validation')==FALSE) {
			
			$this->form_validation->set_error_delimiters('', '');
			$output['status']  = "false";
			$output['name']    = form_error('name');
			$output['parent']  = form_error('parent_id');
			$output['desc']    = form_error('description');
			$output['msg']     = 'error occured';

		} else {

			$data = array();
			$cat_id 			 = (int) $this->input->post('cat_id');
			$data['name']        = $this->input->post('name');
			$data['parent_id']   = $this->input->post('parent_id');
			$data['description'] = $this->input->post('description');

			// $this->db->insert('categories',$info);

			$this->db->where(['id'=>$cat_id])->update('categories',$data);

			if ($this->db->affected_rows()>=0) {
					
				
				$output['status'] = "true";	
				

			} else {

				$output['status'] = "false";
				
				$output['msg']   = "Category could not be updated, please try later";
				
			}

				$output['name']    = '';
				$output['parent']  = '';
				$output['desc']    = '';


		}

		return $output;


	}

	function fetchCategoryTree($parent_id = 0, $spacing='',$user_tree_array = '') {
 
		  if (!is_array($user_tree_array))
		    $user_tree_array = array();
		 
		 $q = $this->db->query("SELECT id, name, parent_id FROM categories WHERE 1 AND parent_id = ".$parent_id." ORDER BY name ASC");
		
		 
		  if ($q->num_rows()) {
		   
		  	$user_tree_array[] = "<ul>";
		  	foreach ($q->result() as $row) {
		  	
		  	  $user_tree_array[] = "<li id='row_{$row->id}'>".$spacing.$row->name."<span class='cat-action'><a href='".base_url()."category/edit/{$row->id}' class='btn btn-sm btn-primary'>Edit</a> <a href='javascript:void(0);' data-id='{$row->id}' class='btn btn-sm btn-danger delete-category'>Delete</a></span></li>";
		      $user_tree_array = $this->fetchCategoryTree($row->id,$spacing."-" ,$user_tree_array);
		   
		  	}
		 	$user_tree_array[] = "</ul>";
		
		  }
		
		  return $user_tree_array;
		
		}


	function fetchCategoryTree_frontend($parent_id = 0, $spacing='',$user_tree_array = '') {
 
		  if (!is_array($user_tree_array))
		    $user_tree_array = array();
		 
		 $q = $this->db->query("SELECT id, name, parent_id FROM categories WHERE 1 AND parent_id = ".$parent_id." ORDER BY name ASC");
		
		 
		  if ($q->num_rows()) {
		   
		  	
		  	foreach ($q->result() as $row) {
		  	
		  	  $user_tree_array[] = "<option value='{$row->id}'>".$spacing.ucwords($row->name)."</option>";
		      $user_tree_array = $this->fetchCategoryTree_frontend($row->id,$spacing."&nbsp;&nbsp;" ,$user_tree_array);
		   
		  	}
		 	
		
		  }
		
		  return $user_tree_array;
		
	}





	public function find_category($id) {

		$q = $this->db->where(['id'=>$id])->get('categories');

		if ($q->num_rows()) {
			
			return $q->row();
		}

	}


	public function deleteCategory() {

		$id = (int) $this->input->post('category_id');

		$output = array('status'=>'false','msg'=>'');

		$q = $this->db->where(['id'=>$id])->get('categories');
		
		if ($q->num_rows()==1) {
			
			$this->db->where(['id'=>$id])->delete('categories');

			if ($this->db->affected_rows()==1) {
				
				$output['status'] = 'true';
				$output['msg'] = 'Successfuly deleted';
			}
		}

		return $output;

	}


	public function buildTree(array &$elements, $parentId = 0) {

	    $branch = array();    
	    foreach ($elements as $element) {
	        if ($element['parent_id'] == $parentId) {
	            $children = $this->buildTree($elements, $element['id']);
	            if ($children) {
	                $element['children'] = $children;
	            }
	            $branch[$element['id']] = $element;
	        }
	    }
	    return $branch;
	}

	public function set_home_category() {

		$info = $this->input->post();

		$type   = $info['type'];
		$number = $info['number'];
		$cat_id = $info['cat_id'];

		$q = $this->db->where(['type'=>$type,'cat_number'=>$number])->get('home_category');

		$output = 'error';

		if ($q->num_rows()) {

				 // perform update
				$q1 = $this->db->where(['type'=>$type,'cat_number'=>$number])->update('home_category',['cat_id'=>$cat_id]);

				if ($this->db->affected_rows()>=0) {
					
					$output = 'success';
				} 
		} else {
			
			$q1 = $this->db->insert('home_category',['type'=>$type,'cat_id'=>$cat_id,'cat_number'=>$number]);
			
			if ($this->db->affected_rows()) {
				
				$output = 'success';
			}
		}

		return $output;
	}

	public function home_category() {

		$this->db->select('categories.id as cat_id, categories.name, home_category.type, home_category.cat_number');
		$this->db->from('categories');
		$this->db->join('home_category', 'categories.id = home_category.cat_id','right');
		$this->db->order_by('home_category.cat_number','ASC');
		$q = $this->db->get();
			
		if ($q->num_rows()) {
		
			return $q->result();
		}
	}


	public function get_variations() {

		$cat_id  = (int) htmlentities($this->input->post('cat_id'));

		$output = array('status'=>'error','result'=>'');

		if ($cat_id=='') {
			
			$output['stauts'] = 'no';
			
		} else {

			$q =  $this->db->select('id,cat_id,variation')->where(['cat_id'=>$cat_id])->get('category_variation');
			
			if ($q->num_rows()) {
				
				$output['status'] = 'success';
				$output['result'] = $q->result();
			} else {
				$output['status'] = 'no';
			}
		}
		
		return $output;

	}



}			


														



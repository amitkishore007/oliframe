<?php 
defined('BASEPATH') OR exit('No direct script access allowed');


/**
* 
*/

class Product extends CI_Controller
{
	
	public function __construct() {

		parent::__construct();
		
		if (!$this->session->userdata('is_logged_in')) {
			return redirect('admin_login');
		}
		

		$this->load->model('productModel');
		$this->load->model('categoryModel');
		$this->load->model('colorModel');
		$this->load->library('excel');
	

	}


	public function create() {

		$data['main_content'] = 'admin/product/add_product';
		$data['categories'] = $this->categoryModel->allCategory();
		$data['colors'] = $this->colorModel->showColors();



		$this->load->view('admin_includes/template',$data);

	}

	public function add_product() {

		if ($this->input->post('add_product')) {
			
			unset($_POST['add_product']);

// echo json_encode($_POST);
			$result = $this->productModel->add_product();
//
			echo json_encode($result);

		} else {

			$this->index();
		}
	}

	public function edit_product() {

		if ($this->input->post('edit_product')) {
			
			unset($_POST['edit_product']);


			$result = $this->productModel->edit_product();

			echo json_encode($result);

		} else {

			$this->index();
		}
	}

	public function delete(){

		if ($this->input->post()) {
			
			$output = $this->productModel->deleteProduct();

			echo json_encode($output);


		} else {

			return redirect('index');
		}


	}

	public function edit($id){


		if (!isset($id)) {
			
			return redirect('product');

		} else {

			$id = (int) $id;

			$data['main_content'] = 'admin/product/edit_product';
			$data['categories'] = $this->categoryModel->allCategory();
			$data['product'] = $this->productModel->find_product($id);
			if ($data['product']) {
  							
				$this->load->view('admin_includes/template',$data);
			
			} else {

				return redirect('product');
			}
			
		}



	}

	public function index() {


		$data['main_content'] = 'admin/product/product_list';
		$data['products'] = $this->productModel->all_products();

		$this->load->view('admin_includes/template',$data);


	}

	public function product_image() {

		$data['main_content'] = 'admin/product/upload_product_image';
	

		$this->load->view('admin_includes/template',$data);


	}

	public function upload_image() {
          
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
				// $this->db->insert('product_images',['name'=>$data['file_name'],'user_id'=>$this->session->userdata('user_id')]);
				$output['status'] = true;
				$output['name']   = $data['file_name'];
				
				
            } else {
				$output['error'] = 'could not upload image, try later';

            }
            echo json_encode($output);
	}


	public function set_hot_sale() {

		if ($this->input->post()) {
			
			$status = $this->productModel->set_hote_sale();

			echo $status;

		} else {

			return redirect('product');
		}
	}

	public function change_status() {

		if ($this->input->post()) {
		
			$status = $this->productModel->set_status();

			echo $status;

		} else {

			return redirect('product');
		}
	}


	// public function upload_product_excel() {

	// 	if ($this->input->post()) {
			

	// 		$output = $this->productModel->add_product_by_excel();

	// 		echo json_encode($output);

	// 	} else {

	// 		return redirect('admin');
	// 	}
	// }

	// modal ajax
	public function get_product_images() {

		$output = '';
		$images = $this->productModel->get_product_images();

			$output .= '<div class="row ajax-modal-image">';
				$output .= '<div class="col-md-12">';
					$output .= '<div class="img-div">';
						$output .= '<ul class="images">';
						if ($images):
							foreach ($images as $image):
							$output .= '<li class="image">';
								$output .= '<label>';
								  $output .= '<input type="checkbox" id="image_'.$image->id.'" name="product-images" value="'.$image->name.'" />';
								  $output .= '<img src="'.base_url().'uploads/'.$image->name.'" data-input="image_'.$image->id.'" width="130">';
								$output .= '</label>';
							$output .= '</li>';
							endforeach;
						else: 
							$output .= '<h3>No images uploaded yet !</h3>';	
						endif;		
						$output .= '</ul>';
					$output .= '</div>';
				$output .= '</div>';
			$output .= '</div>';

			echo $output;

	}

	

	public function uploadExcel() {

		
		$config['upload_path']   = './excel/';
		$config['allowed_types'] = 'xlsx|csv|xls';
		$config['encrypt_name']  = TRUE;
		// $config['remove_spaces'] = TRUE;
		$output = array('status'=>false,'name'=>'','error'=>'','header'=>'','value'=>'');




            $this->load->library('upload', $config);

            if ($this->upload->do_upload('file')) {

                $data = $this->upload->data();
                $file = './excel/'.$data['file_name'];

    

		$objReader= PHPExcel_IOFactory::createReader('Excel2007');	// For excel 2007 	  
          //Set to read only
          $objReader->setReadDataOnly(true); 		  
        //Load excel file
		 $objPHPExcel=$objReader->load($file);		 
         $totalrows=$objPHPExcel->setActiveSheetIndex(0)->getHighestRow();   //Count Numbe of rows avalable in excel      	 
         $objWorksheet=$objPHPExcel->setActiveSheetIndex(0);                
          //loop from first data untill last data
          for($i=2;$i<=$totalrows;$i++)
          {
				$title                 = $objWorksheet->getCellByColumnAndRow(0,$i)->getValue();			
				$subtitle              = $objWorksheet->getCellByColumnAndRow(1,$i)->getValue(); //Excel Column 1
				$user_id               = $objWorksheet->getCellByColumnAndRow(2,$i)->getValue(); //Excel Column 2
				$price                 = $objWorksheet->getCellByColumnAndRow(3,$i)->getValue(); //Excel Column 3
				$old_price             = $objWorksheet->getCellByColumnAndRow(4,$i)->getValue(); //Excel Column 4
				$quantity              = $objWorksheet->getCellByColumnAndRow(5,$i)->getValue(); //Excel Column 4
				$thumbnail1            = $objWorksheet->getCellByColumnAndRow(6,$i)->getValue(); //Excel Column 4
				$thumbnail2            = $objWorksheet->getCellByColumnAndRow(7,$i)->getValue(); //Excel Column 4
				$thumbnail3            = $objWorksheet->getCellByColumnAndRow(8,$i)->getValue(); //Excel Column 4
				$thumbnail4            = $objWorksheet->getCellByColumnAndRow(9,$i)->getValue(); //Excel Column 4
				$sku                   = $objWorksheet->getCellByColumnAndRow(10,$i)->getValue(); //Excel Column 4
				$category_id           = $objWorksheet->getCellByColumnAndRow(11,$i)->getValue(); //Excel Column 4
				$description           = $objWorksheet->getCellByColumnAndRow(12,$i)->getValue(); //Excel Column 4
				$shipping_cost         = $objWorksheet->getCellByColumnAndRow(13,$i)->getValue(); //Excel Column 4
				$product_status        = $objWorksheet->getCellByColumnAndRow(14,$i)->getValue(); //Excel Column 4
				$brand                 = $objWorksheet->getCellByColumnAndRow(15,$i)->getValue(); //Excel Column 4
				$color_code            = $objWorksheet->getCellByColumnAndRow(16,$i)->getValue(); //Excel Column 4
				$color_name            = $objWorksheet->getCellByColumnAndRow(17,$i)->getValue(); //Excel Column 4
				$tags                  = $objWorksheet->getCellByColumnAndRow(18,$i)->getValue(); //Excel Column 4
				$features              = $objWorksheet->getCellByColumnAndRow(19,$i)->getValue(); //Excel Column 4
				$model_name            = $objWorksheet->getCellByColumnAndRow(20,$i)->getValue(); //Excel Column 4
				$model_num             = $objWorksheet->getCellByColumnAndRow(21,$i)->getValue(); //Excel Column 4
				$designed_for          = $objWorksheet->getCellByColumnAndRow(22,$i)->getValue(); //Excel Column 4
				$suitable_for          = $objWorksheet->getCellByColumnAndRow(23,$i)->getValue(); //Excel Column 4
				$height                = $objWorksheet->getCellByColumnAndRow(24,$i)->getValue(); //Excel Column 4
				$width                 = $objWorksheet->getCellByColumnAndRow(25,$i)->getValue(); //Excel Column 4
				$thickness             = $objWorksheet->getCellByColumnAndRow(26,$i)->getValue(); //Excel Column 4
				$warrenty              = $objWorksheet->getCellByColumnAndRow(27,$i)->getValue(); //Excel Column 4
				$warrenty_summary      = $objWorksheet->getCellByColumnAndRow(28,$i)->getValue(); //Excel Column 4
				$warrenty_survice_type = $objWorksheet->getCellByColumnAndRow(29,$i)->getValue(); //Excel Column 4
				$covered_in_warrenty   = $objWorksheet->getCellByColumnAndRow(30,$i)->getValue(); //Excel Column 4
				$not_in_warrenty       = $objWorksheet->getCellByColumnAndRow(31,$i)->getValue(); //Excel Column 4
				$is_fragile            = $objWorksheet->getCellByColumnAndRow(32,$i)->getValue(); //Excel Column 4
				$video_url             = $objWorksheet->getCellByColumnAndRow(33,$i)->getValue(); //Excel Column 4
				$length                = $objWorksheet->getCellByColumnAndRow(34,$i)->getValue(); //Excel Column 4
				$height_unit           = $objWorksheet->getCellByColumnAndRow(35,$i)->getValue(); //Excel Column 4
				$width_unit            = $objWorksheet->getCellByColumnAndRow(36,$i)->getValue(); //Excel Column 4
				$length_unit           = $objWorksheet->getCellByColumnAndRow(37,$i)->getValue(); //Excel Column 4
				$thickness_unit        = $objWorksheet->getCellByColumnAndRow(38,$i)->getValue(); //Excel Column 4
				$size                  = $objWorksheet->getCellByColumnAndRow(39,$i)->getValue(); //Excel Column 4
				$weight                = $objWorksheet->getCellByColumnAndRow(40,$i)->getValue(); //Excel Column 4
				$weight_unit           = $objWorksheet->getCellByColumnAndRow(41,$i)->getValue(); //Excel Column 4
				

				$data_product = array(

					'user_id'               =>$this->session->userdata('user_id'), 
					'title'                 =>$title,
					'price'                 =>$price,
					'compare_price'         =>$old_price,
					'quantity'              =>$quantity,
					'thumbnail'             =>$thumbnail1, 
					'sku'                   =>$sku,
					'category_id'           =>$category_id, 
					'description'           =>$description, 
					'shipping'              =>$shipping_cost, 
					'status'                =>1, 
					'thumbnail2'            =>$thumbnail2, 
					'thumbnail3'            =>$thumbnail3,
					'thumbnail4'            =>$thumbnail4,
					'subtitle'              =>$subtitle,
					'brand'                 =>$brand,
					'color'                 =>$color_name, 
					'color_code'             =>$color_code, 
					'tags'                  =>$tags,
					'features'              =>$features,
					'model_name'            =>$model_name,
					'model_number'           =>$model_num,
					'designed_for'          =>$designed_for,
					'suitable_for'          =>$suitable_for,
					'width'                 =>$width,
					'height'                =>$height,
					'length'                =>$length,
					'length_unit'           =>$length_unit,
					'width_unit'            =>$width_unit,
					'height_unit'           =>$height_unit,
					'warrenty'              =>$warrenty,
					'warrenty_summary'      =>$warrenty_summary,
					'warrenty_service_type' =>$warrenty_survice_type,
					'covered_in_warrenty'   =>$covered_in_warrenty, 
					'no_in_warrenty'        =>$not_in_warrenty,
					'is_fragile'            =>$is_fragile,
					'video_url'             =>$video_url, 
					'weight_unit'           =>$weight_unit,
					'upload_type'           =>'excel'
					);

				// $data_user = array('FirstName'=>$FirstName, 'LastName'=>$LastName ,'Email'=>$Email ,'Mobile'=>$Mobile , 'Address'=>$Address);
				if (!empty($data_product)) {
					
					$result = $this->productModel->upload_excel_products($data_product);
					if ($result) {
						
						$output['status'] = true;
					}

				}
			  // $this->excel_data_insert_model->Add_User($data_user);
              
						  
          }
	            $output['header'] = $data_product;

				// $output['name']   = $data['file_name'];
				
				
            } else {
				$output['error'] = 'could not upload excel file, try later';

            }
            echo json_encode($output);

	}


	public function upload_product_image() {
          
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
				// $this->db->insert('product_images',['name'=>$data['file_name'],'user_id'=>$this->session->userdata('user_id')]);
				$output['status'] = true;
				$output['name']   = $data['file_name'];
				
				
            } else {
				$output['error'] = 'could not upload image, try later';

            }
            echo json_encode($output);
	}


}
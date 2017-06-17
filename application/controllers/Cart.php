<?php 
defined('BASEPATH') OR exit('No direct script access allowed');


/**
* 
*/
class Cart extends CI_Controller
{
	
	public function __construct() {

		parent::__construct();

		$this->load->model('categoryModel');
		$this->load->model('productModel');
		$this->load->model('sliderModel');
		$this->load->model('bannerModel');
		$this->load->model('shopModel');
	}


	public function index() {

		$data['main_content'] = 'public/cart';


		$data['category_search_left'] = $this->categoryModel->fetchCategoryTree_frontend();
		
		$data['categories']           =  $this->categoryModel->allCategory_array();
		
		$data['slides']               = $this->sliderModel->getAll();
		
		$data['banners']              = $this->bannerModel->getAll();

		$data['cart_items']			  = $this->shopModel->getCartItem();

		$data['total_cart_price']	  = $this->cart->total();

		$data['total_cart_items']	  = $this->cart->total_items();

		$data['home_categories']	  = $this->categoryModel->home_category();

		
		$data['latest_products']	 = $this->productModel->getLatestProducts();

		
		$data['hot_sale']             = $this->productModel->find_hot_sale();
		
		$data['banner_shop_category'] = $this->bannerModel->getBanner('shop_category');
		
		$data['banner_shop_arrival'] = $this->bannerModel->getBanner('below_arrival');



		

		$this->load->view('includes/template',$data);
	}


	public function update_product() {

		if ($this->input->post()) {
			
		$output = array('status'=>'false','result'=>'','item_subtotal'=>'');
	
		$data = array(
		        'rowid' => $this->input->post('product_hash'),
		        'qty'   => $this->input->post('qty')
		);

		$q = $this->cart->update($data);
	
		if ($q) {
			
			$item = $this->cart->get_item($this->input->post('product_hash'));
			
			$output['status'] =  'success';
			$output['result'] = $this->cart->total(); 
			$output['item_subtotal'] = $item['subtotal']; 
		} 

		echo json_encode($output);

	} else {

			return redirect('cart');
		}
	}
}
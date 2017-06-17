<?php 
defined('BASEPATH') OR exit('No direct script access allowed');



/**
* 
*/
class Checkout extends CI_Controller
{
	
	public function __construct(){

		parent::__construct();

		$this->load->model('categoryModel');
		$this->load->model('productModel');
		$this->load->model('sliderModel');
		$this->load->model('bannerModel');
		$this->load->model('shopModel');
		$this->load->model('logoModel');
		
	}

	public function index() {

		$data['main_content']         = 'public/checkout';
		
		$data['category_search_left'] = $this->categoryModel->fetchCategoryTree_frontend();
		
		$data['categories']           =  $this->categoryModel->allCategory_array();
		
		$data['logo'] 				  = $this->logoModel->getLogo(); 

		$data['cart_items']			  = $this->shopModel->getCartItem();

		$data['total_cart_price']	  = $this->cart->total();

		$data['total_cart_items']	  = $this->cart->total_items();

		$data['home_categories']	  = $this->categoryModel->home_category();

		// $data['banners']              = $this->bannerModel->getAll();
		
		// $data['slides']               = $this->sliderModel->getAll();
		
		// $data['latest_products']	 = $this->productModel->getLatestProducts();

		
		// $data['hot_sale']             = $this->productModel->find_hot_sale();
		
		// $data['banner_shop_category'] = $this->bannerModel->getBanner('shop_category');
		
		// $data['banner_shop_arrival'] = $this->bannerModel->getBanner('below_arrival');
		


		$this->load->view('includes/template',$data);

	}
}
<?php 


/**
* 
*/
class Login extends CI_Controller
{
	

	public function __construct() {

		parent::__construct();
		$this->load->model('categoryModel');
		$this->load->model('productModel');
		$this->load->model('sliderModel');
		$this->load->model('bannerModel');
		$this->load->model('shopModel');
		$this->load->model('logoModel');
		$this->load->model('loginModel');

	}

	

	private function check_login(){

		if ($this->session->userdata('is_logged_in')) {
		
			return redirect('shop');
		}
	}

	public function index() {

		$this->check_login();


		$data['main_content'] = 'public/login';

		$data['category_search_left'] = $this->categoryModel->fetchCategoryTree_frontend();
		
		$data['categories']           =  $this->categoryModel->allCategory_array();
		
		$data['logo'] 				  = $this->logoModel->getLogo(); 

		$data['cart_items']			  = $this->shopModel->getCartItem();

		$data['total_cart_price']	  = $this->cart->total();

		$data['total_cart_items']	  = $this->cart->total_items();

		$data['home_categories']	  = $this->categoryModel->home_category();

		$this->load->view('includes/template',$data);

	}
	
	public function login() {

		if ($this->input->post()) {

			$user = $this->loginModel->login();
			  
			echo json_encode($user);

				
		} else {

			return redirect('shop');
		}

	}



	public function signup() {

		$this->check_login();

		$data['main_content'] = 'public/user_signup';

		$data['category_search_left'] = $this->categoryModel->fetchCategoryTree_frontend();
		
		$data['categories']           =  $this->categoryModel->allCategory_array();
		
		$data['logo'] 				  = $this->logoModel->getLogo(); 

		$data['cart_items']			  = $this->shopModel->getCartItem();

		$data['total_cart_price']	  = $this->cart->total();

		$data['total_cart_items']	  = $this->cart->total_items();

		$data['home_categories']	  = $this->categoryModel->home_category();

		$this->load->view('includes/template',$data);

	}


	public function create_user() {

		if ($this->input->post()) {

			$output = $this->shopModel->create_user();

			echo json_encode($output);
			
		} else {

			return redirect('shop/signup');
		}
	}


	public function logout() {

		$this->check_login();

		$data = array(

			'user_id'     , 
			'user_email'  , 
			'username'    , 
			'role'        , 
			'is_logged_in'
		);

		$this->session->unset_userdata($data);

		return redirect('shop');
	}
	
}
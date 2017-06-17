<?php 
defined('BASEPATH') OR exit('No direct script access allowed');



/**
* Shop controller for ecommerce 
*/
class Shop extends CI_Controller
{
	
	var $data = array();
	
	public function __construct(){

		parent::__construct();

		$this->load->model('categoryModel');
		$this->load->model('productModel');
		$this->load->model('sliderModel');
		$this->load->model('bannerModel');
		$this->load->model('shopModel');
		$this->load->model('logoModel');
		$this->load->model('walletModel');
		
	}
	
	public function shop_init() {

		// $this->data['category_search_left'] = $this->categoryModel->fetchCategoryTree_frontend();
		
		$this->data['categories']            =  $this->categoryModel->allCategory_array();
		
		$this->data['logo'] 				  = $this->logoModel->getLogo(); 

		$this->data['cart_items']			  = $this->shopModel->getCartItem();

		$this->data['total_cart_price']	  = $this->cart->total();

		$this->data['total_cart_items']	  = $this->cart->total_items();

		$this->data['home_categories']	  = $this->categoryModel->home_category();

		if ($this->session->userdata('is_logged_in')) {
			
			$this->data['wallet']		 = $this->walletModel->get_my_wallet_money();
			// print_r($this->data['wallet']);
		}

	}

	public function index() {

		$this->data['main_content']         = 'public/home';
		
		$this->shop_init();

		// $this->data['banners']              = $this->bannerModel->getAll();
		
		$this->data['slides']               = $this->sliderModel->getAll();
		
		$this->data['latest_products']	 = $this->productModel->getLatestProducts();

		
		$this->data['hot_sale']             = $this->productModel->find_hot_sale();
		
		// $this->data['banner_shop_category'] = $this->bannerModel->getBanner('shop_category');
		
		// $this->data['banner_shop_arrival'] = $this->bannerModel->getBanner('below_arrival');
		


		$this->load->view('includes/template',$this->data);

	}

	private function first_twenty_first_catProduct($cat_id){

		// $home_categories = $this->categoryModel->home_category();

		$result = array('status'=>'false','output'=>'');

		$output  = '';

		// if (isset($home_categories)) {
			
			$result['status'] = 'success';

			$output .= '<div class="ltabs-items-inner ltabs-slider ">';

			// foreach ($home_categories as $home_category) {
				
				// if($home_category->type=='one' && $home_category->cat_number==1) {


					$array = $this->productModel->get_cat_products($cat_id,10,0); 

					if(isset($array)): 		
					$output .= '<div class="ltabs-items-inner ltabs-slider ">';
					$output .= '<div class="item-wrap">';
					$output .= '<div class="row">';
					$output .= '<div class="col-lg-12 col-md-7">';
					$output .= '<div class="right-container">';
					$output .= '<div class="row">';

					foreach ($array as $product) :
					

					$output .= '<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">';
					$output .= '<div class="ltabs-item product-layout ">';
					$output .= '<div class="product-item-container">';
					$output .= '<div class="left-block">';
					$output .= '<div class="product-image-container second_img ">';
					if(isset($product->thumbnail) && !empty($product->thumbnail)):
						if($product->upload_type=='excel'):
							$output .= '<img src="'.$product->thumbnail.'"  alt="'. $product->title.'" class="img-responsive" />';
							
							else:
							$output .= '<img src="'.base_url().'uploads/'.$product->thumbnail.'"  alt="'. $product->title.'" class="img-responsive" />';

						endif;
					else:
						$output .= '<img src="'.base_url('assets/img/placeholder.jpg').'"  alt="'. $product->title.'" class="img-responsive" />';

					endif;
					$output .= '</div>';
					
					$output .= '<a class="quickview iframe-link visible-lg" data-fancybox-type="iframe"  href="'.base_url('shop/quickview/'.$product->id).'">  Quickview</a>';
					$output .= '</div>';
					$output .= '<div class="right-block">';
					$output .= '<div class="caption">';
					$output .= '<h4><a href="'.base_url().'product/'.$product->id.'">'.$product->title.'</a></h4>		';
					$output .= '<div class="ratings">';
					$output .= '<div class="rating-box">';
					$output .= '<span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span>';
					$output .= '<span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span>';
					$output .= '<span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span>';
					$output .= '<span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span>';
					$output .= '<span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i></span>';
					$output .= '</div>';
					$output .= '</div>';
					$output .= '<div class="price">';
					$output .= '<span class="price-new">Rs.'.$product->price.'</span> ';
					$output .= '</div>';
					$output .= '</div>';
					$output .= '<div class="button-group">';
					$output .= '<button class="addToCart" type="button" data-toggle="tooltip" title="Add to Cart" data-productId="'.$product->id.'" data-productQty = "1" data-productThumb="'.base_url().'uploads/'. $product->thumbnail.'" data-productName="'.$product->title.'"><i class="fa fa-shopping-cart"></i></button>';
					$output .= '<button class="wishlist" type="button" data-toggle="tooltip" title="Add to Wish List" ><i class="fa fa-heart"></i></button>';
					$output .= '<button class="compare" type="button" data-toggle="tooltip" title="Compare this Product" ><i class="fa fa-exchange"></i></button>';
					$output .= '</div>';
					$output .= '</div>';
					$output .= '</div>';
					$output .= '</div>';
					$output .= '</div>';

					endforeach;	//return $array;
			
					$output .= '</div>';
					$output .= '</div>';
					$output .= '</div>';
					$output .= '</div>';
					$output .= '</div>';

					endif;


					$array2 = $this->productModel->get_cat_products($cat_id,10,11); 

					if (isset($array2)) : 
					$output .= '<div class="ltabs-items-inner ltabs-slider ">';
					$output .= '<div class="item-wrap">';
					$output .= '<div class="row">';
					$output .= '<div class="col-lg-12 col-md-7">';
					$output .= '<div class="right-container">';
					$output .= '<div class="row">';
				
					foreach ($array2 as $product) :
					

					$output .= '<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">';
					$output .= '<div class="ltabs-item product-layout ">';
					$output .= '<div class="product-item-container">';
					$output .= '<div class="left-block">';
					$output .= '<div class="product-image-container second_img ">';
					if(isset($product->thumbnail) && !empty($product->thumbnail)):
						if($product->upload_type=='excel'):
							$output .= '<img src="'.$product->thumbnail.'"  alt="'. $product->title.'" class="img-responsive" />';
							
							else:
							$output .= '<img src="'.base_url().'uploads/'.$product->thumbnail.'"  alt="'. $product->title.'" class="img-responsive" />';

						endif;
					else:
						$output .= '<img src="'.base_url('assets/img/placeholder.jpg').'"  alt="'. $product->title.'" class="img-responsive" />';

					endif;
					//$output .= '<img src="'.base_url().'uploads/'.$product->thumbnail.'"  alt="'. $product->title.'" class="img-responsive" />';
					
					$output .= '</div>';
					
					$output .= '<a class="quickview iframe-link visible-lg" data-fancybox-type="iframe"  href="'.base_url('shop/quickview/'.$product->id).'">  Quickview</a>';
					$output .= '</div>';
					$output .= '<div class="right-block">';
					$output .= '<div class="caption">';
					$output .= '<h4><a href="'.base_url().'product/'.$product->id.'">'.$product->title.'</a></h4>		';
					$output .= '<div class="ratings">';
					$output .= '<div class="rating-box">';
					$output .= '<span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span>';
					$output .= '<span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span>';
					$output .= '<span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span>';
					$output .= '<span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span>';
					$output .= '<span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i></span>';
					$output .= '</div>';
					$output .= '</div>';
					$output .= '<div class="price">';
					$output .= '<span class="price-new">Rs.'.$product->price.'</span> ';
					$output .= '</div>';
					$output .= '</div>';
					$output .= '<div class="button-group">';
					$output .= '<button class="addToCart" type="button" data-toggle="tooltip" title="Add to Cart" data-productId="'.$product->id.'" data-productQty = "1" data-productThumb="'.base_url().'uploads/'. $product->thumbnail.'" data-productName="'.$product->title.'"><i class="fa fa-shopping-cart"></i></button>';
					$output .= '<button class="wishlist" type="button" data-toggle="tooltip" title="Add to Wish List" ><i class="fa fa-heart"></i></button>';
					$output .= '<button class="compare" type="button" data-toggle="tooltip" title="Compare this Product" ><i class="fa fa-exchange"></i></button>';
					$output .= '</div>';
					$output .= '</div>';
					$output .= '</div>';
					$output .= '</div>';
					$output .= '</div>';

					endforeach;	//return $array;
			
					$output .= '</div>';
					$output .= '</div>';
					$output .= '</div>';
					$output .= '</div>';
					$output .= '</div>';

					endif;
					


				// }




			// }
					$output .='</div>';
					$result['output'] = $output;
		// }


		return $result;

	}



	public function quickview($id) {

	$this->shop_init();

		if (!isset($id)) {
			
				return redirect('shop');
		}

		$id = (int) $id;

		$quick_product = $this->productModel->get_product($id);

		if ($quick_product) {

			$this->data['quick_product'] = $quick_product;		
			$this->data['main_content'] = 'public/quickview';

			$this->load->view('includes/template',$this->data);
				
		} else {

			return redirect('shop');
		}
	}

 	public function get_cat_products(){

 		if ($this->input->post()) {

 			$cat_id = $this->input->post('cat_id');

 			$result = $this->first_twenty_first_catProduct($cat_id);
 		 	echo json_encode($result);
 		} else {

 			return redirect('shop');
 		}
 	}

 	public function a() {
 		$this->cart->destroy();
 	}
	public function add_to_cart() {


		if ($this->input->post()) {
			
			$status = $this->shopModel->add_to_cart();

			echo $status;

		} else {


			return redirect('shop');
		}

	}


	public function update_cart(){

		if ($this->input->post()) {
			
			$cart_data = $this->shopModel->get_cart();

			echo json_encode($cart_data);

		} else {

			return redirect('shop');
		}



	}

	public function remove_product() {

		if ($this->input->post()) {
			
			$info = $this->input->post();

			$q = $this->cart->remove($info['product_hash']);

			$output = array('status'=>'false','total_price'=>$this->cart->total());

			if ($q) {
				 
				 $output['status']  = 'success';

			} else {

				$output['status']  = 'error';
			}

			echo json_encode($output);

		} else {

			return redirect('shop');
		}

	}

	


	public function search() {

		if ($this->input->post()) {
			
			$products = $this->productModel->search();

			echo $products;


		} else  {

			return redirect('shop');

		}
	}


	public function search_product(){

			
		$this->shop_init();

		
		$s        =  $this->input->get('s')  ? addslashes(urldecode(trim($this->input->get('s')))) : ''  ;
		$category = (int) $this->input->get('category')  ? addslashes(urldecode(trim($this->input->get('category')))) : ''  ;

		

		if (isset($s) && isset($category)) {
			
			$this->data['search_products'] = $this->productModel->searchProducts($s,$category);

			$this->data['main_content'] = 'public/products';

			$this->load->view('includes/template',$this->data);


		} else {

			return redirect('shop');
		}

	}


	public function checkout() {

		
		$this->data['main_content'] = 'public/checkout';
		$this->shop_init();

		$this->load->view('includes/template',$this->data);
	}

	public function payment() {

		$this->shop_init();
		$this->data['main_content'] = 'public/payment';
        $this->load->view('includes/template',$this->data);


	}

	   public function ccavRequestHandler() {

	   	$data['main_content'] = 'public/ccavRequestHandler';
	  
        $this->load->view('includes/template',$data);

    }
       public function payDone()
    {
                     $encResp=$_REQUEST['encResp'];
                     $working_key='234171D8EAE02E763905BA19DAF8E7D1';
                     $decryptValues=explode('&',$this->common->decrypt($encResp,$working_key));
                     $dataSize=sizeof($decryptValues);
                     /*CODE FOR GET YOUR VERIABLE WHEN REDIRECT ON YOUR URL */
                        for($i = 0; $i < $dataSize; $i++) 
            {
                $information=explode('=',$decryptValues[$i]);

                if($information[0] == 'merchant_param1')
                {
                    $address = $information[1];
                }
                if($information[0] == 'merchant_param2')
                {
                   $userid = $information[1];

                }
                if($information[0] == 'order_status')
                {
                   $order_status = $information[1];

                }
            }
        /*CHECK PAYMENT IS SUCCESS OR FAIL */
           if($order_status == 'Success')
                                  {
         /* DO what ever you want after successful payment */    
        echo 'success';
         // Redirect('webservice/paymentSuccess');
                                  }
                                  else 
                                  {
                           /* do whatever you want after failure */
                                     redirect('webservice/paymentFail');
                                  }
    }


    public function wallet() {

    	
    	$this->data['main_content'] = 'public/payment';

    	$this->shop_init();

    	$this->load->view('includes/template',$this->data); 
    }


   public function failure() {

   	if ($this->input->post()) {
   		
   		$this->data['message'] = '';
   		$status=$_POST["status"];
		$firstname=$_POST["firstname"];
		$amount=$_POST["amount"];
		$txnid=$_POST["txnid"];

		$posted_hash=$_POST["hash"];
		$key=$_POST["key"];
		$productinfo=$_POST["productinfo"];
		$email=$_POST["email"];
		$salt="H2y2OzafAe";

if (isset($_POST["additionalCharges"])) {
       $additionalCharges=$_POST["additionalCharges"];
        $retHashSeq = $additionalCharges.'|'.$salt.'|'.$status.'|||||||||||'.$email.'|'.$firstname.'|'.$productinfo.'|'.$amount.'|'.$txnid.'|'.$key;
        
                  }
	else {	  

        $retHashSeq = $salt.'|'.$status.'|||||||||||'.$email.'|'.$firstname.'|'.$productinfo.'|'.$amount.'|'.$txnid.'|'.$key;

         }
		 $hash = hash("sha512", $retHashSeq);
  
       if ($hash != $posted_hash) {
	       $this->data['message'] =  "Invalid Transaction. Please try again";
		   }
	   else {

         $this->data['message']= "<h3>Your order status is ". $status .".</h3>". "<h4>Your transaction id for this transaction is ".$txnid.". You may try making the payment by clicking the link below.</h4>";
          
		 } 

   	$this->data['main_content'] = 'public/failure';
	$this->shop_init();
   	$this->load->view('includes/template',$this->data);

   	} else {

   		return redirect('shop');
   	}

   }

    public function success() {

    if ($this->input->post()) {
    
     $this->data['message'] = '';

	$status      =$_POST["status"];
	$firstname   =$_POST["firstname"];
	$amount      =$_POST["amount"];
	$txnid       =$_POST["txnid"];
	$posted_hash =$_POST["hash"];
	$key         =$_POST["key"];
	$productinfo =$_POST["productinfo"];
	$email       =$_POST["email"];
	$salt        ="H2y2OzafAe";

	if (isset($_POST["additionalCharges"])) {
       $additionalCharges=$_POST["additionalCharges"];
        $retHashSeq = $additionalCharges.'|'.$salt.'|'.$status.'|||||||||||'.$email.'|'.$firstname.'|'.$productinfo.'|'.$amount.'|'.$txnid.'|'.$key;
        
        }
	else {	  

        $retHashSeq = $salt.'|'.$status.'|||||||||||'.$email.'|'.$firstname.'|'.'Add money to wallet'.'|'.$amount.'|'.$txnid.'|'.$key;

        }
		 $hash = hash("sha512", $retHashSeq);
		 
       if ($hash != $posted_hash) {
	     
	       $this->data['message']  = "Successfully added amount in your wallet";
		 
	   	  $this->walletModel->add_wallet($this->session->userdata('user_id'),$amount,$txnid);
		   }
	   else {

	   	  $this->walletModel->add_wallet($this->session->userdata('user_id'),$amount,$txnid);
           	   
          $this->data['message'] = "<h3>Thank You. Your order status is ". $status .".</h3>"."<h4>Your Transaction ID for this transaction is ".$txnid.".</h4>". "<h4>you have added Rs. " . $amount ." in your wallet</h4>";
           
		   } 	
   
   	$this->data['main_content'] = 'public/success';
   	$this->shop_init();
   	$this->load->view('includes/template',$this->data);

    } else {

    	return redirect('shop');
    }
   

   }

   public function generate_hash() {

   	if ($this->input->post()) {
   	
		$price        = $this->input->post('price');
		$MERCHANT_KEY = $this->input->post('merchant_key');
		$txnid        = $this->input->post('txnid');
		$SALT         = 'H2y2OzafAe';
		$username     = $this->input->post('username');
		$email        = $this->input->post('email');
		$udf          = $this->input->post('udf');
		

   		$hash_string = $MERCHANT_KEY."|".$txnid."|".$price."|Add money to wallet|".$username."|".$email."|".$udf."||||||||||".$SALT;
		$hash = hash('sha512', $hash_string); 

		echo $hash;

   	} else {

   		return redirect('shop');
   	}

   }









	



}

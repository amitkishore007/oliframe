<?php 



/**
* 
*/
class ShopModel extends CI_Model
{
	

	public function add_to_cart() {

		$info = $this->input->post();

		$product_id = $info['product_id'];

		$q = $this->db->where(['id'=>$product_id])->get('products');

		if ($q->num_rows()) {
				
				$product = $q->row();

				$data = array(
			     
					'id'          => $product->id,
					'qty'         => $info['product_qty'],
					'price'       => $product->price,
					'name'        => $product->title,
					'thumbnail'   => $product->thumbnail,
					'upload_type' => $product->upload_type
				);

				$q1 = $this->cart->insert($data);

				if ($q1) {
		

					$output = 'success';

				} else {

					$output = 'error';

				}


		
		} else {

			$output = 'error';


		}

		return $output;

	}


	public function getCartItem() {

		return $this->cart->contents();
	}

	public function get_cart() {

		$cart_items = $this->getCartItem();

				$output = '';

				$array = array('output'=>'','items'=>0,'price'=>'');

		if (count($cart_items)) {
			// fetch the cart items and send back to ajax request
				$output .= "<li>";
				$output .= "<table class='table table-striped'>";
				$output .= "<tbody>";
	
			foreach ($cart_items as $item) {

				$output .='<tr id="row_{$item["rowid"]}">';
				$output .='<td class="text-center" style="width:70px">';
				$output .='<a href=""> <img src=" '.base_url().'uploads/'.$item['thumbnail'].'" style="width:70px" class="preview"> </a>';
				$output .='</td>';
				$output .='<td class="text-left"> <a class="cart_product_name" href="'.base_url().'product/'.$item['id'].'">'.$item['name'].'</a> </td>';
				$output .='<td class="text-center"> x'.$item['qty'].'</td>';
				$output .='<td class="text-center"> Rs.'.$item['subtotal'].' </td>';
				$output .='<td class="text-right">';
				$output .='<a href="'.base_url().'cart" class="fa fa-edit">Edit</a>';
				$output .='</td>';
				$output .='<td class="text-right">';
				$output .='<a data-productHash="'.$item['rowid'].'" data-productId="'.$item['id'].'" data-productName="' .$item['name'].'" data-productThumb="'.base_url().'uploads/'.$item['thumbnail'].'" class="fa fa-times fa-delete removeProduct"></a>';
				$output .='</td>';
				$output .='</tr>';
			

			}
				$output .= '</tbody>';
				$output .= '</table>';
				$output .= '</li>';

				$output .='<li>';
				$output .='<div>';
				$output .='<table class="table table-bordered">';
				$output .='<tbody>';
				$output .='<tr>';
				$output .='<td class="text-left"><strong>Sub-Total</strong></td>';
				$output .='<td class="text-right">Rs.'.$this->cart->total().'</td>';
				$output .='</tr>';
			
				$output .='<tr>';
				$output .='<td class="text-left"><strong>Total</strong></td>';
				$output .='<td class="text-right">Rs.'.$this->cart->total().'</td>';
				$output .='</tr>';
				$output .='</tbody>';
				$output .='</table>';
				$output .='<p class="text-right"> <a class="btn view-cart" href="'.base_url().'cart"><i class="fa fa-shopping-cart"></i>View Cart</a>&nbsp;&nbsp;&nbsp; <a class="btn btn-mega checkout-cart" href="'.base_url().'checkout"><i class="fa fa-share"></i>Checkout</a> </p>';
				$output .='</div>';
				$output .='</li>';



		} else {

			$output = '<span class="text-center"> Nothing in your shopping cart</span>';


		}
		$array['output'] = $output;
		$array['items'] = $this->cart->total_items();
		$array['price'] = $this->cart->total();



		 // <div class="nav-cart-wrap hidden-sm hidden-xs">
   //                  <div class="nav-cart right">
   //                    <div class="nav-cart-outer">
   //                      <div class="nav-cart-inner">
   //                        <a href="#" class="nav-cart-icon">2</a>
   //                      </div>
   //                    </div>
   //                    <div class="nav-cart-container">
   //                      <div class="nav-cart-items">

   //                        <div class="nav-cart-item clearfix">
   //                          <div class="nav-cart-img">
   //                            <a href="#">
   //                              <img src="" alt="">
   //                            </a>
   //                          </div>
   //                          <div class="nav-cart-title">
   //                            <a href="#">
   //                              Ladies Bag
   //                            </a>
   //                            <div class="nav-cart-price">
   //                              <span>1 x</span>
   //                              <span>1250.00</span>
   //                            </div>
   //                          </div>
   //                          <div class="nav-cart-remove">
   //                            <a href="#"><i class="icon icon_close"></i></a>
   //                          </div>
   //                        </div>


   //                      </div> <!-- end cart items -->

   //                      <div class="nav-cart-summary">
   //                        <span>Cart Subtotal</span>
   //                        <span class="total-price">$1799.00</span>
   //                      </div>

   //                      <div class="nav-cart-actions mt-20">
   //                        <a href="shop-cart.html" class="btn btn-md btn-dark"><span>View Cart</span></a>
   //                        <a href="shop-checkout.html" class="btn btn-md btn-color mt-10"><span>Proceed to Checkout</span></a>
   //                      </div>
   //                    </div>
   //                  </div>
   //                  <div class="menu-cart-amount right">
   //                    <span>
   //                      Cart /
   //                      <a href="#"> $1299.50</a>
   //                    </span>
   //                  </div>
   //                </div>




		return $array;
	}


	public function create_user() {

		

		$this->load->library('form_validation');

		$output = array('status'=>'false','name'=>'','email'=>'','phone'=>'','password'=>'','retype'=>'','state'=>'','city'=>'','address'=>'','zipcode'=>'');

		if ($this->form_validation->run('user_registration_form_validation')==FALSE) {

			 	$this->form_validation->set_error_delimiters('', '');
				$output['name']     = form_error('name');
				$output['email']    = form_error('email');
				$output['phone']    = form_error('phone');
				$output['password'] = form_error('password');
				$output['retype']   = form_error('retype-password');
				$output['state']    = form_error('state');
				$output['city']     = form_error('city');
				$output['address']  = form_error('address');
				$output['zipcode']  = form_error('zipcode');


		} else {

			
			unset($_POST['retype-password']);
			$info = $this->input->post();
			$info['username'] = $info['name'];
			unset($info['name']);	
			
			$info['password'] = md5($info['password']);
			$info['user_type'] = 'user';


			$this->db->insert('users',$info);

			if ($this->db->affected_rows()==1) {
				
				$q = $this->db->where(['email'=>$info['email']])->get('users');
				$user = $q->row();
				$data = array(
					'is_logged_in'=>1,
					'username'=>$user->username,
					'user_id'=>$user->id,
					'user_email'=>$user->email
					);

				$this->session->set_userdata($data);
				
				$output['status'] = 'success';
			} 
		}

		return $output;



	}

}



		
	
		

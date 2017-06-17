$('document').ready(function(){


	$('body').on('click','.addToCart',function(){

		var product_id   = parseInt($(this).attr('data-productId'));	
		var product_qty  = parseInt($(this).attr('data-productQty'));
		var cart_btn     = $(this);
		
		var addToCartTxt = $(this).find('span:first');
		


		$.ajax({

			url : ajax_url+'shop/add_to_cart',
			
			type : 'POST',
			
			data: {'add_to_cart':'cart',product_id:product_id,product_qty:product_qty},
			
			beforeSend : function(){

				cart_btn.html("<img class='ajax-loader' src='"+ajax_url+"assets/img/cart-loader.gif'>");
				
			},
			success : function(html) {

				// cart_btn.html('add to cart');
				$('.ajax-loader').hide();
				cart_btn.html("<span>add to cart</span>");

				if (html=='success') {

					// show grawl notification
					//addProductNotice('Product added to cart','<img src="'+thumbnail+'">', '<h3><a href="'+ajax_url+'product/'+product_id+'">'+product_name+'"</a> added to <a href="'+ajax_url+'cart">shopping cart</a>!</h3>', 'success');
					
					//update the mini cart
					update_mini_cart(ajax_url+'shop/update_cart');

				} else {

					alert('Error occured !, try later');
					// show error

				}

			}

		});	

	});


	$('.mini-cart,.cart').on('click','.removeProduct',function(){

		var hash = $(this).attr('data-productHash');
		var thumb = $(this).attr('data-productThumb');
		var product_id = $(this).attr('data-productId');
		var product_name = $(this).attr('data-productName');

		var rm_btn = $(this); 

		$.ajax({

			url : ajax_url+'shop/remove_product',
			
			type : 'POST',
			
			data: {'remove_product':'cart',product_hash:hash},
			
			beforeSend : function(){

				rm_btn.after("<img class='ajax-loader' src='"+ajax_url+"assets/img/ajax-loader.gif'>");

			},
			success : function(html) {

				$('.ajax-loader').hide();

				console.log(html);

				var data = $.parseJSON(html);

				if (data.status=='success') {

					// show grawl notification
					addProductNotice('Product removed from cart','<img src="'+thumb+'">', '<h3><a href="'+ajax_url+'product/'+product_id+'">'+product_name+'"</a> removed from shopping cart !</h3>', 'success');
					
					$('.row_'+hash).fadeOut();
					$('.cart-price').html(data.total_price);

					update_mini_cart(ajax_url+'shop/update_cart');
					//update the mini cart

				} else {

					alert('Error occured !, try later');
					// show error

				}

			}

		});
		return false;	

	});





	var cat_id = $('.product-cat-one.ltabs-tabs li.ltabs-tab.tab-sel').attr('data-category-id');
	var cat_id_two = $('.ltabs-tabs.product-cat-two li.ltabs-tab.tab-sel').attr('data-category-id');

// alert(cat_id_two);
	load_products(cat_id,ajax_url+'shop/get_cat_products','.product-one');
	
	load_products(cat_id_two,ajax_url+'shop/get_cat_products','.product-two');

	$('.product-cat-one li').on('click',function(){

		var cat_id = $(this).attr('data-category-id');

		load_products(cat_id,ajax_url+'shop/get_cat_products','.product-one');

	});

	$('.product-cat-two li').on('click',function(){

		var cat_id = $(this).attr('data-category-id');

		load_products(cat_id,ajax_url+'shop/get_cat_products','.product-two');

	});



	$('.cart').on('click','.updateCart',function(){

		var hash         = $(this).attr('data-productHash');
		var thumb        = $(this).attr('data-productThumb');
		var product_id   = $(this).attr('data-productId');
		var product_name = $(this).attr('data-productName');
		var qty          = $('input#'+hash).val();

		

		var btn = $(this); 

		$.ajax({

			url : ajax_url+'cart/update_product',
			
			type : 'POST',
			
			data: {'update_product':'cart',product_hash:hash,qty:qty},
			
			beforeSend : function(){

				btn.before("<img class='ajax-loader' src='"+ajax_url+"assets/img/ajax-loader.gif'>");

				if (qty==0) {
					$('.row_'+hash).fadeOut();
				}
			},
			success : function(html) {

				$('.ajax-loader').hide();
				// console.log(html);
				var data = $.parseJSON(html);
				if (data.status=='success') {

					// show grawl notification
					addProductNotice('Product updated in you cart','<img src="'+thumb+'">', '<h3><a href="'+ajax_url+'product/'+product_id+'">'+product_name+'"</a> updated in your shopping cart !</h3>', 'success');
					
					
					update_mini_cart(ajax_url+'shop/update_cart');
					//update the mini cart

					$('.cart-price').html('Rs.'+data.result);
					$('#price_'+hash).html('Rs.'+data.item_subtotal);

				} else {

					alert('Error occured !, try later');
					// show error

				}

			}

		});
		return false;	

	});



	$('.search-product').on('keyup',function(){

		var input = $(this);
		var product = input.val();
		var cat_id = $('.search-category option:selected').val();

		$.ajax({

			type: 'POST',
			url : ajax_url+"shop/search",
			data : {'search':'search',product:product,cat_id:cat_id},
			beforeSend : function() {

				input.css({
					background : "#FFF url('"+ajax_url+"assets/img/ajax-loader.gif') no-repeat  ",
					backgroundPosition : "right"

				});

			},

			success  : function(html){

				// console.log(html);
				input.css("background","#FFF");

				if (html=='' || product=='') {

					$('#result').hide();

				} else {

					$('#result').html(html);
					$('#result').show();

				}

			}



		});

	});


	$('#result ').on('click','li',function(){

		var product = $(this).html();
		selectProduct(product);
	});



	$('.create-account').on('click',function(){

		var btn = $(this);


		var form = $('#user-register');

		var form_data = form.serialize();

		

		console.log(form_data);

		$.ajax({

			type : 'POST',
			url  : ajax_url+'login/create_user',
			data : form_data,
			beforeSend : function() {
				btn.val('Please Wait...');
				$('.error').hide();
			},
			success : function(html) {

				$('.error').show();

				console.log(html);

				btn.val('Create Account');

				var data = $.parseJSON(html);

				if (data.status=='false') {

					$('.name-error').html(data.name);	
					$('.email-error').html(data.email);	
					$('.phone-error').html(data.phone);	
					$('.password-error').html(data.password);	
					$('.retype-error').html(data.retype);	
					$('.state-error').html(data.state);	
					$('.city-error').html(data.city);	
					$('.zipcode-error').html(data.zipcode);	
					$('.address-error').html(data.address);	

				} else {

					window.location = ajax_url+'shop';
				}

			}
		});
		return false;


	});

	
	$('.error').hide();

	$('.user-login').on('click',function(){

		var email    = $('#user-email').val();
		var password = $('#user-password').val();

		var btn = $(this);

		$.ajax({

			url : ajax_url+'login/login',
			type: 'POST',
			data : {email:email,password:password},
			beforeSend : function() {

				btn.val('wait..');
				$('.error').html('');
				$('.error').hide();
			},
			success : function(html) {	

				console.log(html);

				btn.val('Login');
				$('.error').show();
				var data = $.parseJSON(html);

				if (data.status=='success') {

					if (data.user_type=='vandor') {
						
						window.location = ajax_url+'admin';

					} else{

						window.location = ajax_url+'shop';

					}
				} else {


					$('.error').html(data.error);

				}
			}

		});


		return false;
	});


	$('#wallet-money-amount,#phone-number').on('blur',function(){

		var field = $('input[name="amount"]');
		var amount       = field.val();
		var merchant_key = $('input[name="key"]').val();
		var txnid        = $('input[name="txnid"]').val();
		var username     = $('input[name="firstname"]').val();
		var phone        = $('input[name="phone"]').val();
		var email        = $('input[name="email"]').val();
		var udf          = $('input[name="udf1"]').val();

		var check = true;

		if (amount=='') {

			$('.add-money-error').html('please enter the anount !');
			$('.add-money-error').fadeIn();

			check=false;
			return false;
		}

		if (phone=='') {

			$('.add-money-error').html('please enter the your phone number !');
			$('.add-money-error').fadeIn();
			check=false;
			return false;
		}

		if (check) {


			$.ajax({

				type : 'POST',
				url : ajax_url+'shop/generate_hash',
				data : {merchant_key:merchant_key,price:amount,txnid:txnid,username:username,phone: phone,email:email,udf:udf},
				beforeSend :function() {

					field.after("<img class='ajax-loader' src='"+ajax_url+"assets/img/ajax-loader.gif'>");
				},
				success : function(html) {

					$('.ajax-loader').hide();
					$('.add-to-wallet').removeAttr('disabled');
					$('input[name="hash"]').val(html);

				}


			});

		}

	});


});

function update_mini_cart(url){

	$.ajax({

		url: url,
		type: 'POST',
		data : {'get_cart':'update'},
		success : function(html){

			var data = $.parseJSON(html);

			$('.mini-cart').html(data.output);

			$('.text-shopping-cart').html(data.items+" item(s) - Rs."+data.price);
			
		}


	});


}


function load_products(cat_id,url,div_class) {

	$.ajax({

		url : url,
		type : 'POST',
		data : {'get_products'  : 'products' , cat_id:cat_id},
		beforeSend : function (){


		},
		success : function(html) {

			 console.log(html);
			var data  = $.parseJSON(html);

			if (data.status=='success') {

				
				$(div_class+'.items-category-'+cat_id).html(data.output);
				$(div_class+'.items-category-'+cat_id).addClass('ltabs-items-loaded');
				$(div_class+'.items-category-'+cat_id).find('.ltabs-loading').hide();


			} else {

				alert('Error occured, try later !');
			}


		}



	});

}


function selectProduct(product) {


	$('.search-product').val(product);

	$('#result').hide();



}
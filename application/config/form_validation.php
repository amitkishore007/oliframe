<?php 



$config = [

		'login_form_validation'=>[

							[
							'field' => 'email',
							'label' => 'Email',
							'rules' => 'required|valid_email'
        
							],
							[
							
							'field' => 'password',
							'label' => 'Password',
							'rules' => 'required'
        
							]

		],

		'category_form_validation'=>[

							[
							'field' => 'name',
							'label' => 'name',
							'rules' => 'required'
        
							],
							[
							'field' => 'parent_id',
							'label' => 'parent',
							'rules' => 'required|is_natural'
        
							],
							[
							'field' => 'description',
							'label' => 'Category description',
							'rules' => ''
							]
							

		],

		'product_upload_validation'=>[

							[
							'field' => 'title',
							'label' => 'name',
							'rules' => 'required|min_length[2]'
							],
							[
							'field' => 'description',
							'label' => 'Product Description',
							'rules' => 'required'
        
							],
							[
							'field' => 'thumbnail',
							'label' => 'Product images',
							'rules' => ''
        
							],
							[
							'field' => 'price',
							'label' => 'Product Price',
							'rules' => 'required|is_natural'
        
							],
							[
							'field' => 'quantity',
							'label' => 'Product quantity',
							'rules' => 'required|is_natural'
        
							],
							[
							'field' => 'sku',
							'label' => 'SKU',
							'rules' => ''
        
							],
							[
							'field' => 'shipping',
							'label' => 'Shipping cost',
							'rules' => 'is_natural'
        
							],
							[
							'field' => 'status',	
							'label' => 'Product Status',	
							'rules' => 'required|is_natural'	
							],
							[
							'field' => 'category_id',
							'label' => 'Category',
							'rules' => 'required|is_natural'
 							],
 							[
							'field' => 'thumbnail',
							'label' => 'Product image',
							'rules' => 'required'
 							]

 							

		],

		'vandor_form_validation' =>[

							[
							'field' => 'username',
							'label' => 'Username',
							'rules' => 'required|min_length[3]'
        
							],
							[
							'field' => 'email',
							'label' => 'Email address',
							'rules' => 'required|valid_email|is_unique[users.email]'
        
							],
							[
							
							'field' => 'password',
							'label' => 'Password',
							'rules' => 'required|min_length[5]'
        
							],
							[
							
							'field' => 'phone',
							'label' => 'Phone number',
							'rules' => 'required|is_natural|exact_length[10]'
        
							],


		],

		'about_form_validation'=> [

							[
							
							'field' => 'title',
							'label' => 'Title',
							'rules' => 'required'
        
							],
							[
							
							'field' => 'content',
							'label' => 'Content',
							'rules' => 'required'
        
							]



		],

		'user_registration_form_validation'=>[

							[
							
							'field' => 'name',
							'label' => 'User Name',
							'rules' => 'required|min_length[3]'
        
							],
							[
							
							'field' => 'email',
							'label' => 'Email',
							'rules' => 'required|valid_email|is_unique[users.email]'
        
							],
							[
							
							'field' => 'phone',
							'label' => 'Phone number',
							'rules' => 'required|is_natural|exact_length[10]'
        
							],
							[
							
							'field' => 'password',
							'label' => 'Password',
							'rules' => 'required|min_length[5]'
        
							],
							[
							
							'field' => 'retype-password',
							'label' => 'Retype password',
							'rules' => 'required'
        
							],
							[
							
							'field' => 'state',
							'label' => 'State',
							'rules' => 'required'
        
							],
							[
							
							'field' => 'city',
							'label' => 'City',
							'rules' => 'required'
        
							],
							[
							
							'field' => 'address',
							'label' => 'Address',
							'rules' => 'required'
        
							],
							[
							
							'field' => 'zipcode',
							'label' => 'Zipcode',
							'rules' => 'required|is_natural|exact_length[6]'
        
							],



		],

		'addcolor_form_validation' => [
								[
							
								'field' => 'name',
								'label' => 'Color name',
								'rules' => 'required|alpha_numeric'
	        
								],
								[
							
								'field' => 'colorCode',
								'label' => 'Color code',
								'rules' => 'required|exact_length[7]'
	        
								]

		],

		'editcolor_form_validation' => [
								[
							
								'field' => 'name',
								'label' => 'Color name',
								'rules' => 'required|alpha_numeric'
	        
								],
								[
							
								'field' => 'colorCode',
								'label' => 'Color code',
								'rules' => 'required|exact_length[7]'
	        
								],
								[
							
								'field' => 'colorId',
								'label' => 'Color',
								'rules' => 'required|is_natural_no_zero'
	        
								],

		]
];
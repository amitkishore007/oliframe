<!DOCTYPE html>
<html lang="en">


<head>
  <title>Shop</title>

  <meta charset="utf-8">
  <!--[if IE]><meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'><![endif]-->
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <meta name="description" content="">
  
  <!-- Google Fonts -->
  <link href='http://fonts.googleapis.com/css?family=Maven+Pro:400,700%7CRaleway:300,400,700%7CPlayfair+Display:700' rel='stylesheet'>

  <!-- Css -->
  <!-- <link rel="stylesheet" href="css/bootstrap.min.css" /> -->
  <?php echo link_tag('assets/public/css/bootstrap.min.css','stylesheet') ?>
  <!-- <link rel="stylesheet" href="css/magnific-popup.css" /> -->
  <?php echo link_tag('assets/public/css/magnific-popup.css','stylesheet') ?>
  <!-- <link rel="stylesheet" href="css/font-icons.css" /> -->
  <?php echo link_tag('assets/public/css/font-icons.css','stylesheet') ?>
  <!-- <link rel="stylesheet" href="css/sliders.css" /> -->
  <?php echo link_tag('assets/public/css/sliders.css','stylesheet') ?>
  <!-- <link rel="stylesheet" href="css/style.css" /> -->
  <?php echo link_tag('assets/public/css/style.css','stylesheet') ?>
  <!-- <link rel="stylesheet" href="css/animate.min.css" /> -->
  <?php echo link_tag('assets/public/css/animate.min.css','stylesheet') ?>

  <!-- Favicons -->
  <link rel="shortcut icon" href="<?php echo base_url(''); ?>assets/public/img/favicon.ico">
  <link rel="apple-touch-icon" href="<?php echo base_url(''); ?>assets/public/img/apple-touch-icon.html">
  <link rel="apple-touch-icon" sizes="72x72" href="<?php echo base_url(''); ?>assets/public/img/apple-touch-icon-72x72.png">
  <link rel="apple-touch-icon" sizes="114x114" href="<?php echo base_url(''); ?>assets/public/img/apple-touch-icon-114x114.png">

</head>

<body class="relative">

  <!-- Preloader -->
<!--   <div class="loader-mask">
    <div class="loader">
      <div></div>
      <div></div>
    </div>
  </div> -->

  <main class="content-wrapper oh">

    <!-- Navigation -->
    <header class="nav-type-1">

      <div class="top-bar hidden-sm hidden-xs">
        <div class="container">
          <div class="top-bar-line">
            <div class="row">
              <div class="top-bar-links">
                <ul class="col-sm-6 top-bar-acc">
                  <li class="top-bar-link"><a href="#">My Account</a></li>
                  <li class="top-bar-link"><a href="#">My Wishlist</a></li>
                  <li class="top-bar-link"><a href="#">Newsletter</a></li>
                  <li class="top-bar-link"><a href="#">Login</a></li>
                  <li class="top-bar-link"><a href="#">Contact</a></li>
                </ul>

                <ul class="col-sm-6 text-right top-bar-currency-language">
                
                  <li>
                    <div class="social-icons">
                      <a href="#"><i class="fa fa-twitter"></i></a>
                      <a href="#"><i class="fa fa-facebook"></i></a>
                      <a href="#"><i class="fa fa-google-plus"></i></a>
                      <a href="#"><i class="fa fa-linkedin"></i></a>
                      <a href="#"><i class="fa fa-vimeo"></i></a>
                    </div>
                  </li>
                </ul>              

              </div>
            </div>
          </div>
          
        </div>
      </div> <!-- end top bar -->
    
      <nav class="navbar navbar-static-top">
        <div class="navigation" id="sticky-nav">
          <div class="container relative">

            <div class="row">

              <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse">
                  <span class="sr-only">Toggle navigation</span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                </button>
                <!-- Mobile cart -->
                <div class="nav-cart mobile-cart hidden-lg hidden-md">
                  <div class="nav-cart-outer">
                    <div class="nav-cart-inner">
                      <a href="#" class="nav-cart-icon">2</a>
                    </div>
                  </div>
                </div>
              </div> <!-- end navbar-header -->

              <div class="header-wrap">
                <div class="header-wrap-holder">

                  <!-- Search -->
                  <div class="nav-search hidden-sm hidden-xs">
                    <form method="get">
                      <input type="search" class="form-control" placeholder="Search">
                      <button type="submit" class="search-button">
                        <i class="icon icon_search"></i>
                      </button>
                    </form>
                  </div>

                  <!-- Logo -->
                  <div class="logo-container">
                    <div class="logo-wrap text-center">
                      <a href="<?php base_url('shop'); ?>">
                        <img class="logo" src="<?php echo base_url(''); ?>assets/public/img/logo_dark.png" alt="logo">
                      </a>
                    </div>
                  </div>

                  <!-- Cart -->
                  <div class="nav-cart-wrap hidden-sm hidden-xs">
                    <div class="nav-cart right">
                      <div class="nav-cart-outer">
                        <div class="nav-cart-inner">
                          <a href="<?php echo base_url('cart'); ?>" class="nav-cart-icon"><?php echo isset($total_cart_items) ? $total_cart_items : '0.00'; ?></a>
                        </div>
                      </div>
                      <?php //print_r($cart_items); ?>
                      <?php if(isset($cart_items)): ?>
                      <div class="nav-cart-container mini-cart">
                        <div class="nav-cart-items">
                        <?php foreach ($cart_items as $item): ?>
                          <div class="nav-cart-item clearfix">
                            <div class="nav-cart-img">
                              <a href="<?php echo base_url('shop/quickview/'.$item['id']); ?>">
                              <?php if($item['upload_type']=='excel'): ?>
                                <img height='50' src="<?php echo $item['thumbnail']; ?>" alt="">
                              <?php else: ?>
                                
                                <img height='50' src="<?php echo base_url('uploads/'.$item['thumbnail;']); ?>" alt="">
                              <?php endif; ?>
                              </a>
                            </div>
                            <div class="nav-cart-title">
                              <a href="<?php echo base_url('shop/quickview/'.$item['id']); ?>">
                               <?php echo ucwords($item['name']); ?>
                              </a>
                              <div class="nav-cart-price">
                                <span><?php echo $item['qty']; ?> x</span>
                                <span>Rs.<?php echo $item['price']; ?></span>
                              </div>
                            </div>
                            <div class="nav-cart-remove">
                              <a href="javascript:void();"><i class="icon icon_close"></i></a>
                            </div>
                          </div>
                        <?php endforeach; ?>


                        </div> <!-- end cart items -->

                        <div class="nav-cart-summary">
                          <span>Cart Subtotal</span>
                          <span class="total-price">Rs.<?php echo $total_cart_price; ?></span>
                        </div>

                        <div class="nav-cart-actions mt-20">
                          <a href="<?php echo base_url('cart'); ?>" class="btn btn-md btn-dark"><span>View Cart</span></a>
                          <a href="<?php echo base_url('checkout'); ?>" class="btn btn-md btn-color mt-10"><span>Proceed to Checkout</span></a>
                        </div>
                      </div>
                    <?php else: ?>
                      <h4 class='text-center'> No Product in cart</h4>
                    <?php endif; ?>

                    </div>
                    <div class="menu-cart-amount right">
                      <span>
                        Cart /
                        <a href="#"> Rs.<?php echo isset($total_cart_price) ? $total_cart_price : '0.00'; ?></a>
                      </span>
                    </div>
                  </div> <!-- end cart -->

                </div>
              </div> <!-- end header wrap -->

              <div class="nav-wrap">
                <div class="collapse navbar-collapse" id="navbar-collapse">
                  
                  <ul class="nav navbar-nav">

                    <li id="mobile-search" class="hidden-lg hidden-md">
                      <form method="get" class="mobile-search relative">
                        <input type="search" class="form-control" placeholder="Search...">
                        <button type="submit" class="search-button">
                          <i class="icon icon_search"></i>
                        </button>
                      </form>
                    </li>

                    <!-- <li class="dropdown">
                      <a href="index.html">Home</a>
                    </li> -->
                   
                  <?php foreach ($categories as $category) :?>
    
                    <?php if($category['parent_id']==0): ?>

                        <li class="dropdown">
                          <a href="<?php echo base_url('shop/search/?s='.$category['name'].'&category='.$category['id']); ?>"><?php echo ucwords($category['name']); ?></a>
                           <ul class="dropdown-menu megamenu">
                           <li>
                              <div class="megamenu-wrap">
                                <div class="row">
                              <?php foreach ($categories as $child): ?>
                               <?php if($category['id']==$child['parent_id']): ?>
                                  <div class="col-md-3 megamenu-item">
                                    <h6><a href="<?php echo base_url('shop/search_product/?s='.$child['name'].'&category='.$child['id']); ?>""><?php echo ucwords($child['name']); ?></a></h6>
                                    <ul class="menu-list">
                                    <?php foreach ($categories as $sub_child) : ?>
                                    <?php if($child['id']==$sub_child['parent_id']): ?>
                                      <li><a href="<?php echo base_url('shop/search_product/?s='.$sub_child['name'].'&category='.$sub_child['id']); ?>"><?php echo ucwords($sub_child['name']); ?></a></li>
                                     <?php endif; ?> 
                                    <?php endforeach; ?>
                                      
                                    </ul>
                                  </div>
                              <?php endif; ?>
                              <?php endforeach; ?>
                                </div>
                              </div>
                            </li>

                           </ul>
                        </li>
               
                  <?php endif; ?>
                 
                  <?php endforeach; ?>
                  </ul> <!-- end menu -->
                </div> <!-- end collapse -->
              </div> <!-- end col -->
          
            </div> <!-- end row -->
          </div> <!-- end container -->
        </div> <!-- end navigation -->
      </nav> <!-- end navbar -->
    </header> <!-- end navigation -->

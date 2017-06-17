 <!-- Hero Slider -->
    <section class="section-wrap nopadding">
      <div class="container">
        <div class="entry-slider">

          <div class="flexslider" id="flexslider-hero">
            <ul class="slides clearfix">
            <?php if(isset($slides)): ?>
              <?php foreach ($slides as $slide) : ?>
                <li>
                  <img  src="<?php echo base_url('uploads/'.$slide->slide); ?>" alt="">
                  <!-- <div class="img-holder img-1"></div> -->
                  <div class="hero-holder text-center right-align">
                    <div class="hero-lines">
                      <h1 class="hero-heading white">Collection 2017</h1>
                      <h4 class="hero-subheading white uppercase">HOT AND FRESH TRENDS OF THIS YEAR</h4>
                    </div>
                    <a href="<?php echo $slide->product_link; ?>" class="btn btn-lg btn-white"><span>Shop Now</span></a>
                  </div>
                </li>
            <?php endforeach; ?>
            <?php endif; ?>
            
            </ul>
          </div>
        </div> <!-- end slider -->
      </div>
    </section> <!-- end hero slider -->


    <!-- New Arrivals -->
    <section class="section-wrap new-arrivals pb-40">
      <div class="container">

        <div class="row heading-row">
          <div class="col-md-12 text-center">
            <h2 class="heading uppercase"><small>New Arrivals</small></h2>
          </div>
        </div>
      <?php if(isset($latest_products)): ?>
        <div class="row row-10">              
        <?php foreach ($latest_products as $l_product) : ?>
          <div class="col-md-3 col-xs-6">
            <div class="product-item">
              <div class="product-img">
                <a href="<?php echo base_url('shop/quickview/'.$l_product->id); ?>">
                 <?php if($l_product->upload_type=='excel'): ?>
                  
                    <img src="<?php echo $l_product->thumbnail; ?>" alt="">
                    <img src="<?php echo $l_product->thumbnail2; ?>" alt="" class="back-img">
                  
                  <?php else: ?>
                    <img src="<?php echo base_url('uploads/'.$l_product->thumbnail); ?>" alt="">
                    <img src="<?php echo base_url('uploads/'.$l_product->thumbnail2); ?>" alt="" class="back-img">  

                 <?php endif; ?>
                </a>
                <div class="product-label">
                  <span class="sale"></span>
                </div>
                <div class="product-actions">
                  <a href="#" class="product-add-to-compare" data-toggle="tooltip" data-placement="bottom" title="Add to compare">
                    <i class="fa fa-exchange"></i>
                  </a>
                  <a href="#" class="product-add-to-wishlist" data-toggle="tooltip" data-placement="bottom" title="Add to wishlist">
                    <i class="fa fa-heart"></i>
                  </a>                    
                </div>
                <a href="<?php echo base_url('shop/quickview/'.$l_product->id); ?>" class="product-quickview">Quick View</a>
              </div>
              <div class="product-details">
                <h3>
                  <a class="product-title" href="<?php echo base_url('shop/quickview/'.$l_product->id); ?>"><?php echo ucwords($l_product->title); ?></a>
                </h3>
                <span class="price">
                  <del>
                    <span>Rs.<?php echo $l_product->compare_price; ?></span>
                  </del>
                  <ins>
                    <span class="ammount">Rs.<?php echo $l_product->price; ?></span>
                  </ins>
                </span>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
        </div> <!-- end row -->
      <?php endif; ?>
      </div>
    </section> <!-- end new arrivals -->
    <!-- Newsletter -->
    <div class="container">
      <div class="row">
        <div class="col-sm-12">
          <div class="newsletter-box">
            <h5 class="uppercase">Subscribe to Receive Our Updates</h5>
            <form>
              <input type="email" class="newsletter-input" placeholder="Your email">
              <input type="submit" class="newsletter-submit btn btn-md btn-dark" value="subscribe">
            </form>
          </div>
        </div>
      </div>
    </div>

    <!-- Best Sellers -->
    <section class="section-wrap pb-0">
      <div class="container">

        <div class="row heading-row">
          <div class="col-md-12 text-center">
            <h2 class="heading uppercase"><small>Best Sellers</small></h2>
          </div>
        </div>
        <pre><?php //print_r($hot_sale); ?></pre>
      <?php if(isset($hot_sale)): ?>
        <div class="row row-10">              
        <?php foreach ($hot_sale as $hs_product): ?>
          <div class="col-md-3 col-xs-6 animated-from-left">
            <div class="product-item">
              <div class="product-img">
                <a href="#">
                <?php if($hs_product->upload_type=='excel'): ?>
                  <img src="<?php echo $hs_product->thumbnail; ?>" alt="">
                  <img src="<?php echo $hs_product->thumbnail2; ?>" alt="" class="back-img">
                <?php else: ?>
                  <img src="<?php echo base_url('uploads/'.$hs_product->thumbnail); ?>" alt="">
                  <img src="<?php echo base_url('uploads/'.$hs_product->thumbnail2); ?>" alt="" class="back-img">
                  
                <?php endif; ?>
                </a>
                <div class="product-actions">
                  <a href="#" class="product-add-to-compare" data-toggle="tooltip" data-placement="bottom" title="Add to compare">
                    <i class="fa fa-exchange"></i>
                  </a>
                  <a href="#" class="product-add-to-wishlist" data-toggle="tooltip" data-placement="bottom" title="Add to wishlist">
                    <i class="fa fa-heart"></i>
                  </a>                    
                </div>
                <a href="<?php echo base_url('shop/quickview/'.$hs_product->id); ?>" class="product-quickview">Quick View</a>
              </div>

              <div class="product-details">
                <h3>
                  <a class="product-title" href="<?php echo base_url('shop/quickview/'.$hs_product->id); ?>"><?php echo ucwords($hs_product->title); ?></a>
                </h3>
                <span class="price">
                  <ins>
                    <span class="ammount">Rs.<?php echo $hs_product->price; ?></span>
                  </ins>
                </span>
              </div>                          
            </div>
          </div>
        <?php endforeach; ?>

        </div> <!-- end row -->

      <?php endif; ?>
      </div>
    </section> <!-- end best sellers -->            
 
    <!-- Partners -->
    <section class="section-wrap partners pt-0 pb-50">
      <div class="container">
        <div class="row">

          <div id="owl-partners" class="owl-carousel owl-theme">

            <div class="item">
              <a href="#">
                <img src="<?php echo base_url(); ?>assets/public/img/partners/partner_logo_dark_1.png" alt="">
              </a>
            </div>
            <div class="item">
              <a href="#">
                <img src="<?php echo base_url(); ?>assets/public/img/partners/partner_logo_dark_2.png" alt="">
              </a>
            </div>
            <div class="item">
              <a href="#">
                <img src="<?php echo base_url(); ?>assets/public/img/partners/partner_logo_dark_3.png" alt="">
              </a>
            </div>
            <div class="item">
              <a href="#">
                <img src="<?php echo base_url(); ?>assets/public/img/partners/partner_logo_dark_4.png" alt="">
              </a>
            </div>
            <div class="item">
              <a href="#">
                <img src="<?php echo base_url(); ?>assets/public/img/partners/partner_logo_dark_5.png" alt="">
              </a>
            </div>
            <div class="item">
              <a href="#">
                <img src="<?php echo base_url(); ?>assets/public/img/partners/partner_logo_dark_6.png" alt="">
              </a>
            </div>
            <div class="item">
              <a href="#">
                <img src="<?php echo base_url(); ?>assets/public/img/partners/partner_logo_dark_1.png" alt="">
              </a>
            </div>
            <div class="item">
              <a href="#">
                <img src="<?php echo base_url(); ?>assets/public/img/partners/partner_logo_dark_2.png" alt="">
              </a>
            </div>

          </div> <!-- end carousel -->
          
        </div>
      </div>
    </section> <!-- end partners -->      

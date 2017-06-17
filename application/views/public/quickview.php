<section class="section-wrap single-product">
      <?php if(isset($quick_product)): ?>

      <div class="container relative">
        <div class="row">

          <div class="col-sm-6 col-xs-12 mb-60">
			<?php if($quick_product->upload_type=='excel'): ?>
	            <div class="flickity flickity-slider-wrap mfp-hover" id="gallery-main">
		
	              <div class="gallery-cell">
	                <a href="<?php echo $quick_product->thumbnail; ?>" class="lightbox-img">
	                  <img src="<?php echo $quick_product->thumbnail; ?>" alt="" />
	                  <i class="icon arrow_expand"></i>
	                </a>
	              </div>
	              <div class="gallery-cell">
	                <a href="<?php echo $quick_product->thumbnail2; ?>" class="lightbox-img">
	                  <img src="<?php echo $quick_product->thumbnail2; ?>" alt="" />
	                  <i class="icon arrow_expand"></i>
	                </a>
	              </div>
	              <div class="gallery-cell">
	                <a href="<?php echo $quick_product->thumbnail3; ?>" class="lightbox-img">
	                  <img src="<?php echo $quick_product->thumbnail3; ?>" alt="" />
	                  <i class="icon arrow_expand"></i>
	                </a>
	              </div>
	              <div class="gallery-cell">
	                <a href="<?php echo $quick_product->thumbnail4; ?>" class="lightbox-img">
	                  <img src="<?php echo $quick_product->thumbnail4; ?>" alt="" />
	                  <i class="icon arrow_expand"></i>
	                </a>
	              </div>
	           
	            </div> <!-- end gallery main -->
	        <?php endif; ?>

            <div class="gallery-thumbs">

              <div class="gallery-cell">
                <img src="<?php echo $quick_product->thumbnail; ?>" alt="" />
              </div>
              <div class="gallery-cell">
                <img src="<?php echo $quick_product->thumbnail2; ?>" alt="" />
              </div>
              <div class="gallery-cell">
                <img src="<?php echo $quick_product->thumbnail3; ?>" alt="" />
              </div>
              <div class="gallery-cell">
                <img src="<?php echo $quick_product->thumbnail4; ?>" alt="" />
              </div>
            

            </div> <!-- end gallery thumbs -->

          </div> <!-- end col img slider -->

          <div class="col-sm-6 col-xs-12 product-description-wrap">
            <h1 class="product-title"><?php echo ucwords($quick_product->title); ?></h1>
            <span class="rating">
              <a href="#">3 Reviews</a>
            </span>
            <span class="price">
              <del>
                <span>Rs.<?php echo $quick_product->compare_price; ?></span>
              </del>
              <ins>
                <span class="ammount">Rs.<?php echo $quick_product->price; ?></span>
              </ins>
            </span>
            <p class="product-description"><?php echo $quick_product->description; ?></p>
           

       

            <ul class="product-actions clearfix">
              
              <li>
                <a href="javascript:void(0);" class="btn btn-color btn-lg add-to-cart left addToCart" data-productId='<?php echo $quick_product->id; ?>' data-productQty = '1' data-productThumb='<?php echo base_url(); ?>uploads/<?php echo $quick_product->thumbnail; ?>' data-productName='<?php echo $quick_product->title; ?>' ><span>Add to Cart</span></a>
              </li>                
              <li>
                <div class="icon-add-to-wishlist left">
                  <a href="#"><i class="icon icon_heart_alt"></i></a>
                </div>
              </li> 
              <li>
                <div class="quantity buttons_added">
                  <input type="button" value="-" class="minus" /><input type="number" step="1" min="0" value="1" title="Qty" class="input-text qty text" /><input type="button" value="+" class="plus" />
                </div>
              </li>          
            </ul>

            <div class="product_meta">
              <span class="sku">SKU: <a href="#"><?php echo $quick_product->sku; ?></a></span>
             
              <span class="tagged_as">Color: <label style="height:15px;width:15px;background-color: <?php echo $quick_product->color_code; ?>"></label> <?php echo ucwords($quick_product->color); ?></span>
              <span class="tagged_as">Tags: <a href="#">Elegant</a>, <a href="#">Bag</a></span>

              
            </div>

            <div class="socials-share clearfix">
              <div class="social-icons rounded">
                <a href="#"><i class="fa fa-twitter"></i></a>
                <a href="#"><i class="fa fa-facebook"></i></a>
                <a href="#"><i class="fa fa-google-plus"></i></a>
                <a href="#"><i class="fa fa-linkedin"></i></a>
                <a href="#"><i class="fa fa-vimeo"></i></a>
              </div>
            </div>
          </div> <!-- end col product description -->
        </div> <!-- end row -->

        <!-- tabs -->
        <div class="row">
          <div class="col-md-12">
            <div class="tabs tabs-bb">
              <ul class="nav nav-tabs">                                 
                <li class="active">
                  <a href="#tab-description" data-toggle="tab">Description</a>
                </li>                                 
                <li>
                  <a href="#tab-info" data-toggle="tab">Information</a>
                </li>                                 
                <li>
                  <a href="#tab-reviews" data-toggle="tab">Reviews</a>
                </li>                                 
              </ul> <!-- end tabs -->
              
              <!-- tab content -->
              <div class="tab-content">
                
                <div class="tab-pane fade in active" id="tab-description">
                  <p>
                  <?php echo $quick_product->description; ?>
                  </p>
                </div>
                
                <div class="tab-pane fade" id="tab-info">
                  <p>
                  	<?php echo $quick_product->features; ?>
                  </p>
                </div>
                
                <div class="tab-pane fade" id="tab-reviews">

                  <div class="reviews">
                    <ul class="reviews-list">
                      <li>
                        <div class="review-body">
                          <div class="review-content">
                            <p class="review-author"><strong>Alexander Samokhin</strong> - May 6, 2014 at 12:48 pm</p>
                            <div class="rating">
                              <a href="#"></a>
                            </div>
                            <p>This template is so awesome. I didn’t expect so many features inside. E-commerce pages are very useful, you can launch your online store in few seconds. I will rate 5 stars.</p>
                          </div>
                        </div>
                      </li>

                      <li>
                        <div class="review-body">
                          <div class="review-content">
                            <p class="review-author"><strong>Christopher Robins</strong> - May 6, 2014 at 12:48 pm</p>
                            <div class="rating">
                              <a href="#"></a>
                            </div>
                            <p>This template is so awesome. I didn’t expect so many features inside. E-commerce pages are very useful, you can launch your online store in few seconds. I will rate 5 stars.</p>
                          </div>
                        </div>
                      </li>

                    </ul>         
                  </div> <!--  end reviews -->
                </div>
                
              </div> <!-- end tab content -->

            </div>
          </div> <!-- end tabs -->
        </div> <!-- end row -->

        
      </div> <!-- end container -->
  <?php endif; ?>
    </section> <!-- end single product -->
	

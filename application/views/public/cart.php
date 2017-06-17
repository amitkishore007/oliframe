 <!-- Page Title -->
    <section class="page-title text-center">
      <div class="container relative clearfix">
        <div class="title-holder">
          <div class="title-text">
            <h1 class="uppercase">Shopping Cart</h1>
          </div>
        </div>
      </div>
    </section> <!-- end page title -->
<?php //print_r($cart_items); ?>
    <!-- Cart -->
    <section class="section-wrap shopping-cart pt-0">
      <div class="container relative">
      <?php if(isset($cart_items) && count($cart_items)): ?>
        <div class="row">

          <div class="col-md-12">
            <div class="table-wrap mb-30">
              <table class="shop_table cart table">
                <thead>
                  <tr>
                    <th class="product-name" colspan="2">Product</th>
                    <th class="product-price">Price</th>
                    <th class="product-quantity">Quantity</th>
                    <th class="product-subtotal">Total</th>
                  </tr>
                </thead>
                <tbody>
                <?php foreach ($cart_items as $item): ?>
                  <tr class="cart_item" id='row_<?php echo $item['rowid'] ?>'>
                    <td class="product-thumbnail">
                      <a href="<?php echo base_url('shop/quickview/'.$item['id']); ?>">
					<?php if($item['upload_type']=='excel'): ?>
                        <img src="<?php echo $item['thumbnail']; ?>" alt="">
					<?php else: ?>
                        <img src="<?php echo base_url('uploads/'.$item['thumbnail']); ?>" alt="">

					<?php endif; ?>
                      
                      </a>
                    </td>
                    <td class="product-name">
                      <a href="<?php echo base_url('shop/quickview/'.$item['id']); ?>"><?php echo ucwords($item['name']); ?></a>
                     
                    </td>
                    <td class="product-price">
                      <span class="amount">Rs.<?php echo $item['price']; ?></span>
                    </td>
                    <td class="product-quantity">
                      <div class="quantity buttons_added">
                        <input type="button" value="-" class="minus" /><input type="number" value='<?php echo $item['qty']; ?>' step="1" min="0" value="1" title="Qty" class="input-text qty text" /><input type="button" value="+" class="plus">
                      </div>
                    </td>
                    <td class="product-subtotal">
                      <span class="amount" id='price_<?php echo $item['rowid']; ?>'>Rs.<?php echo $item['subtotal']; ?></span>
                    </td>
                    <td class="product-remove">
                      <a href="javascript:void(0);" class="remove removeProduct" title="Remove this item">
                        <i class="icon icon_close"></i>
                      </a>
                    </td>
                  </tr>
              <?php endforeach; ?>

                  
                </tbody>
              </table>
            </div>

            <div class="row mb-50">
              <div class="col-md-5 col-sm-12">
                <div class="coupon">
                  <input type="text" name="coupon_code" id="coupon_code" class="input-text form-control" value placeholder="Coupon code">
                  <input type="submit" name="apply_coupon" class="btn btn-md btn-dark" value="Apply">
                </div>
              </div>

              <div class="col-md-7">
                <div class="actions right">
                  <input type="submit" name="update_cart" value="Update Cart" class="btn btn-md btn-dark">
                  <div class="wc-proceed-to-checkout">
                    <a href="<?php echo base_url('checkout'); ?>" class="btn btn-md btn-color"><span>proceed to checkout</span></a>
                  </div>
                </div>
              </div>
            </div>

          </div> <!-- end col -->
        </div> <!-- end row -->

        <div class="row">
          
          <div class="col-md-4 col-md-offset-2 pull-right">
            <div class="cart_totals">
              <h2 class="heading relative heading-small uppercase mb-30">Cart Totals</h2>

              <table class="table shop_table">
                <tbody>
                  <tr class="cart-subtotal">
                    <th>Cart Subtotal</th>
                    <td>
                      <span class="amount">Rs.<?php echo $total_cart_price; ?></span>
                    </td>
                  </tr>
                  <tr class="shipping">
                    <th>Shipping</th>
                    <td>
                      <span><?php echo 'Free Shipping'; ?></span>
                    </td>
                  </tr>
                  <tr class="order-total">
                    <th><strong>Order Total</strong></th>
                    <td>
                      <strong><span class="amount">Rs.<?php echo $total_cart_price; ?></span></strong>
                    </td>
                  </tr>
                </tbody>
              </table>

            </div>
          </div> <!-- end col cart totals -->

        </div> <!-- end row -->     
		<?php else: ?>
		<div class="row">
        	<div class="col-md-12">
        		
		      <div class="alert alert-danger text-center">
		      	<h1 class='text-center'>No products in your cart </h1>
		      	<h2 class='text-center'><a href="<?php echo base_url('shop'); ?>">Shop Here</a></h2>
		      </div>
        	</div>
        </div>
        <?php endif; ?>
     
      </div> <!-- end container -->

    </section> <!-- end cart -->      
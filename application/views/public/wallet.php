<div class="main-container container">
		

		<div class="row">
		<!--Middle Part Start-->
        <div id="content" class="col-sm-12">
        <h3 class="text-center alert alert-danger add-money-error"></h3>
          <h2 class="title text-center">Shopping Wallet</h2>
            <!-- <div class="table-responsive form-group"> -->
              
              <?php if($this->session->userdata('is_logged_in')): ?>
				     <div class="row">
						<div class="col-sm-4 col-sm-offset-3">
							<table class="table table-bordered">
								<tbody>
									<tr>
										<td class="text-right">
											<strong>Amount in your wallet:</strong>
										</td>
										<td class="text-right cart-price">Rs.<?php echo isset($wallet) ? $wallet->wallet_money : '0.00'; ?></td>
									</tr>
								</tbody>
							</table>
							
						</div>

						<div class="col-md-6 col-md-offset-4">
								<?php 

									$price='1';
									// Merchant key here as provided by Payu
									$MERCHANT_KEY = 'pYyzE4PA';
									// Merchant Salt as provided by Payu
									$txnid = mt_rand(1,9999999999);
									
									$SALT =  "H2y2OzafAe";
									$hash_string = $MERCHANT_KEY."|".$txnid."|".$price."|Add money to wallet|".'amit'."|".'kishoreamit5@gmail.com'."|".'1'."||||||||||".$SALT;
									$hash = hash('sha512', $hash_string); 

								?>
								<div class="add-wallet">
									<form role="form" class="form-horizontal" action="https://secure.payu.in/_payment" method="post" name="payuForm">
									 <input type="hidden" name="key" value="<?php echo $MERCHANT_KEY ?>" />
								      <input type="hidden" name="hash" value="<?php echo $hash ?>"/>
								      <input type="hidden" name="txnid" value="<?php echo $txnid ?>" /><?php //echo (empty($posted['email'])) ? '' : $posted['email']; ?>
										<div class="form-group">
											 
											<label for="phone-number">
												<b>Phone number</b>
											</label>
												<input name="phone" id='phone-number' class='form-control' type='number' min='0' value="" required pattern="[0-9]{10}" placeholder='Enter your phone number'/>
										</div>
										

										<div class="form-group">
											 
											<label for="wallet-money-amount">
												<b>Add money to wallet</b>
											</label>
												<input type="number" min='0' class='form-control' id="wallet-money-amount" placeholder='Amount Rs.' name="amount" value=""/>
												<input type="hidden" name="firstname" id="firstname" value="<?php echo $this->session->userdata('username'); ?>" />
												<input name="email" type="hidden" id="email" value="<?php echo $this->session->userdata('user_email'); ?>" />
												<input type='hidden' name="productinfo" value='Add money to wallet'>
												<input name="surl" type='hidden' value="<?php echo base_url('shop/success'); ?>" size="64" />
												<input name="furl" type='hidden' value="<?php echo base_url('shop/failure'); ?>" size="64" />
												<input type="hidden" name="service_provider" value="payu_paisa" size="64" />
												<input name="udf1" type='hidden' value="<?php echo $this->session->userdata('user_id'); ?>" />
										</div>
										
										  <?php //if(!$hash) { ?>
								            <input type="submit" value="Add" class="btn btn-default add-to-wallet" disabled />
								          <?php //} ?>
										<!-- <button type="submit" class="btn btn-default add-to-wallet">
											Add
										</button> -->
									</form>


								</div>
							</div>
					</div>

	          <?php else: ?>
	          	<h3 class="text-center"><b>Please login to view wallet info</b></h3>
	          	<p class='text-center'><a class='btn btn-primary button-search' href="<?php echo base_url('login'); ?>">Login</a></p>
		      <?php endif; ?>



            <!-- </div> -->
         
		
		
		
        </div>
        <!--Middle Part End -->
			
		</div>
	</div>
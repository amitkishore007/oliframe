<div class="main-container container">
		
		
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
			<div id="content" class="col-sm-12">
				<div class="page-login">
				
					<div class="account-border">
						<div class="row">
							<div class="col-md-6 col-md-offset-3">
							 <script>
                                 window.onload = function() {
                                 var d = new Date().getTime();
                                document.getElementById("tid").value = d;
                                     };
                              </script>
								 <form method="POST" name="customerData" action="<?php echo base_url('shop/ccavRequestHandler'); ?>">
									<input type="hidden" name="tid" id="tid"  />
									<input type="hidden" name="merchant_id" value="129247"/>
									<input type="hidden" name="payment_option" value="OPTNBK">  
									<input type="hidden" name="order_id" value="123654789"/>
									<input type="hidden" name="merchant_param1" value="123"/>
									<input type="hidden" name="merchant_param2" value="5"/>
									<input type="hidden" name="language" value="EN"/>
									<input type="number" name="amount" value="1" placeholder='amount'/>
									<input type="hidden" name="currency" value="INR"/>
									<input type="hidden" name="redirect_url" value="<?php  echo base_url('shop/payDone');?>"/>
									<input type="hidden" name="cancel_url" value="<?php  echo base_url('shop/cancelPayment');?>"/>
									<input type="hidden" name="billing_name" value="Amit kishore"/>
									<input type="hidden" name="billing_address" value="E-16A"/>
									<input type="hidden" name="billing_city" value="New Delhi"/>
									<input type="hidden" name="billing_state" value="Delhi"/>
									<input type="hidden" name="billing_zip" value="110071"/>
									<input type="hidden" name="billing_country" value="India"/>
									<input type="hidden" name="billing_tel" value="8800417260"/>
									<input type="hidden" name="billing_email" id="billing_email" value="kishoreamit5@gmail.com"/>
									<input type="submit" value="proceed">
								</form>
							    <script language='javascript'>//document.customerData.submit();</script>
							    <script type="text/javascript" src='<?php echo base_url('assets/js/json.js'); ?>'></script>
							</div>
						</div>
					</div>
					
				</div>
			</div>
		</div>
	</div>
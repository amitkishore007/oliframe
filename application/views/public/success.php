<div class="main-container container">
		
	
		<div class="row" >
		<!--Middle Part Start-->
        <div id="content" class="col-sm-12">
          <h2 class="title text-center">&nbsp;</h2>
            <!-- <div class="table-responsive form-group"> -->
              
              <?php if($this->session->userdata('is_logged_in')): ?>
				     <div class="row">
						<div class="col-sm-4 col-sm-offset-4">
							<table class="table table-bordered">
								<tbody>
									<tr>
										<td class="text-right">
											<h3><strong><?php echo isset($message) ? $message : ''; ?></strong></h3>
										</td>
										<!-- <td class="text-right cart-price">Rs.<?php //echo isset($wallet_money) ? $wallet_money : '0.00'; ?></td> -->
									</tr>
								</tbody>
							</table>
							
						</div>
						<div class="col-md-6 col-md-offset-4">
							
								<div class="add-wallet">
				
									

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
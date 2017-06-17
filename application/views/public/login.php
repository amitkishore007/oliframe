<div class="main-container container">
		
		
		<div class="row">
			<div id="content" class="col-sm-12">
				<div class="page-login">
				
					<div class="account-border">
						<div class="row">
							
							<form action="#" method="post" enctype="multipart/form-data">
								<div class="col-sm-6 col-md-6 col-md-offset-3 customer-login">
								<h3 class="alert alert-danger text-center error"></h3>
									<div class="well">
										<h2><i class="fa fa-file-text-o" aria-hidden="true"></i> Returning Customer</h2>
										<p><strong>Login in</strong></p>
										<div class="form-group">
											<label class="control-label " for="input-email">E-Mail Address</label>
											<input type="text" name="email" value="" id="user-email" class="form-control">
										</div>
										<div class="form-group">
											<label class="control-label " for="input-password">Password</label>
											<input type="password" name="password" value="" id="user-password" class="form-control">
										</div>
									</div>
									<div class="bottom-form">
										<a href="<?php echo base_url('login/forgot_password'); ?>" class="forgot">Forgotten Password</a>
										<input type="submit" value="Login" class="btn btn-default pull-right user-login">
									</div>
								</div>
							</form>
						</div>
					</div>
					
				</div>
			</div>
		</div>
	</div>
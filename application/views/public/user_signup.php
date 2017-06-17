<div class="main-container container">
		
		
		<div class="row">
			<div id="content" class="col-sm-12">
				<div class="page-login">
				
					<div class="account-border">
						<div class="row">
							<form method="post" enctype="multipart/form-data" id='user-register'>
								<div class="col-sm-6 col-md-6 customer-login">
									<div class="well">
										<h2><i class="fa fa-file-text-o" aria-hidden="true"></i> Personal info</h2>
										<p><strong>Sign up</strong></p>
										<div class="form-group">
											<label class="control-label " for="user-name">Name</label>
											<input type="text" name="name" value="" id="user-name" class="form-control">
											<span class='text-danger error name-error'></span>
										</div>
										
										<div class="form-group">
											<label class="control-label " for="user-email">E-Mail Address</label>
											<input type="text" name="email" value="" id="user-email" class="form-control">
											<span class='text-danger error email-error'></span>
										
										</div>
										<div class="form-group">
											<label class="control-label " for="user-phone">Phone Number</label>
											<input type="number" min='0' name="phone" value="" id="user-phone" class="form-control">
										<span class='text-danger error phone-error'></span>
										</div>
										<div class="form-group">
											<label class="control-label " for="user-password">Password</label>
											<input type="password" name="password" value="" id="user-password" class="form-control">
										<span class='text-danger error password-error'></span>
										</div>
										<div class="form-group">
											<label class="control-label " for="retype-password">Retype password</label>
											<input type="password" name="retype-password" value="" id="retype-password" class="form-control">
											<span class='text-danger error retype-error'></span>
										</div>
									</div>
									
								</div>
								<div class="col-sm-6 col-md-6 customer-login">
									<div class="well">
										<h2><i class="fa fa-file-text-o" aria-hidden="true"></i> Location info</h2>
										<p>&nbsp;</p>
										

										<div class="form-group">
											<label class="control-label " for="user-state">state</label>
											<select name="state" value="" id="user-state" class="form-control">
												<option value=''>Select state</option>
												<option value='Delhi'>Delhi</option>
												<option value='Mumbai'>Mumbai</option>
											</select>
											<span class='text-danger error state-error'></span>
										</div>
										<div class="form-group">
											<label class="control-label " for="user-city">city</label>
											<select name="city" value="" id="user-city" class="form-control">
												<option value=''>select City</option>
												<option value='delhi'>Delhi</option>
												<option value='new delhi'>New delhi</option>
												<option value='appu'>Appu</option>
												<option value='pappu'>Pappu</option>
											</select>
											<span class='text-danger error city-error'></span>
										</div>
										<div class="form-group">
											<label class="control-label " for="user-zipcode">zipcode</label>
											<input type="number" min='0' name="zipcode" value="" id="user-zipcode" class="form-control">
											<span class='text-danger error zipcode-error'></span>
										</div>
										<div class="form-group">
											<label class="control-label " for="user-address">Address</label>
											<textarea rows="6" name="address" id="user-address" class="form-control"></textarea>
											<span class='text-danger error address-error'></span>
										</div>
									</div>
									
								</div>
								<div class="col-md-12 col-sm-12 ">
									<div class="bottom-form col-md-offset-5">
										<input type="submit" value="Create Account" class="btn btn-default create-account">
									</div>
								</div>

							</form>
						</div>
					</div>
					
				</div>
			</div>
		</div>
	</div>
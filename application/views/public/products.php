<div class="main-container container">
		
		
		<div class="row">
			<!--Left Part Start -->
			<aside class="col-sm-4 col-md-3" id="column-left">
				<div class="module menu-category titleLine">
	<h3 class="modtitle">Categories</h3>
	
	<?php if(isset($categories)): ?>
		<div class="modcontent">
			<div class="box-category">
				<ul id="cat_accordion" class="list-group">
					<?php foreach ($categories as $category): ?>
						<?php if($category['parent_id']==0): ?>
						<li class=""><a href="<?php echo base_url('shop/search_product?category='.$category['id'].'&name='.$category['name']); ?>" class="cutom-parent"><?php echo $category['name']; ?><span class="dcjq-icon"></span></a>   
							<?php if($category['has_child']): ?>
								<span class="button-view  fa fa-plus-square-o"></span>
							<?php endif; ?>
							<ul style="display: none;">
								<?php foreach ($categories as $sub_cat): ?>
										<?php if($sub_cat['parent_id']==$category['id']):  ?>
											<li><?php echo anchor('shop/search_product?category='.$sub_cat['id'].'&name='.$sub_cat['name'],$sub_cat['name']); ?></li>
										<?php endif; ?>
									
								<?php endforeach; ?>
							</ul>
						</li>
					<?php endif; ?>
					<?php endforeach; ?>

					<li class=""><a href="" class="cutom-parent">Home &amp; Garden</a><span class="dcjq-icon"></span></li>
				</ul>
			</div>
		</div>
	<?php endif; ?>

</div>
</aside>
			<!--Left Part End -->
			
			<!--Middle Part Start-->
			<div id="content" class="col-md-9 col-sm-8">
				<div class="products-category">
					<!-- Filters -->
					<?php if(isset($search_products)): ?>
					<div class="product-filter filters-panel">
						<div class="row">
							<div class="col-md-2 visible-lg">
								<div class="view-mode">
									<div class="list-view">
										<button class="btn btn-default grid active" data-view="grid" data-toggle="tooltip" data-original-title="Grid"><i class="fa fa-th"></i></button>
										<button class="btn btn-default list" data-view="list" data-toggle="tooltip" data-original-title="List"><i class="fa fa-th-list"></i></button>
									</div>
								</div>
							</div>
							<div class="short-by-show form-inline text-right col-md-7 col-sm-8 col-xs-12">
								<div class="form-group short-by">
									<label class="control-label" for="input-sort">Sort By:</label>
									<select id="input-sort" class="form-control" onchange="location = this.value;">
										<option value="" selected="selected">Default</option>
										<option value="">Name (A - Z)</option>
										<option value="">Name (Z - A)</option>
										<option value="">Price (Low &gt; High)</option>
										<option value="">Price (High &gt; Low)</option>
										<option value="">Rating (Highest)</option>
										<option value="">Rating (Lowest)</option>
										<option value="">Model (A - Z)</option>
										<option value="">Model (Z - A)</option>
									</select>
								</div>
								<div class="form-group">
									<label class="control-label" for="input-limit">Show:</label>
									<select id="input-limit" class="form-control" onchange="location = this.value;">
										<option value="" selected="selected">9</option>
										<option value="">25</option>
										<option value="">50</option>
										<option value="">75</option>
										<option value="">100</option>
									</select>
								</div>
							</div>
							<div class="box-pagination col-md-3 col-sm-4 col-xs-12 text-right">
								<ul class="pagination">
									<li class="active"><span>1</span></li>
									<li><a href="">2</a></li><li><a href="">&gt;</a></li>
									<li><a href="">&gt;|</a></li>
								</ul>
							</div>
						</div>
					</div>
					<!-- //end Filters -->
					<!--changed listings-->

						<div class="products-list row grid">
							
							<div class="clearfix visible-xs-block"></div>
								
								<?php foreach ($search_products as $product): ?>
									<div class="product-layout col-md-4 col-sm-6 col-xs-12">
										<div class="product-item-container">
											<div class="left-block">
												<div class="product-image-container lazy second_img  lazy-loaded">
													<?php if(isset($product->thumbnail) && !empty($product->thumbnail)): ?>
														<?php if($product->upload_type=='excel'): ?>
														
														<img data-src="<?php echo $product->thumbnail; ?>" src="<?php echo $product->thumbnail; ?>" alt="<?php echo $product->title; ?>" class="img-responsive">
														<?php else: ?>
														
														<img data-src="<?php echo base_url(); ?>uploads/<?php echo $product->thumbnail; ?>" src="<?php echo base_url(); ?>uploads/<?php echo $product->thumbnail; ?>" alt="<?php echo $product->title; ?>" class="img-responsive">
														<?php endif; ?>	
													
													<?php else: ?>	
														
														<img data-src="<?php echo base_url('assets/img/placeholder.jpg'); ?>" src="<?php echo base_url('assets/img/placeholder.pnh'); ?>" alt="<?php echo $product->title; ?>" class="img-responsive">
													<?php endif; ?>
												</div>
												
												<!--full quick view block-->
												<a class="quickview  visible-lg" data-fancybox-type="iframe" href="<?php echo base_url('shop/quickview/'.$product->id); ?>">  Quickview</a>
												<!--end full quick view block-->
											</div>
											
											
											<div class="right-block">
												<div class="caption">
													<h4><a href="<?php echo base_url('shop/product/{$product->id}'); ?>"><?php echo $product->title; ?></a></h4>		
													<div class="ratings">
														<div class="rating-box">
															<span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span>
															<span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span>
															<span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span>
															<span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span>
															<span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i></span>
														</div>
													</div>
																		
													<div class="price">
														<span class="price-new">Rs.<?php echo $product->price; ?></span> 
														
													</div>
													<div class="description item-desc hidden">
														<?php echo $product->description; ?>
														</div>
												</div>
												
												  <div class="button-group">
														<button class="addToCart" type="button" data-productId='<?php echo $product->id; ?>' data-productQty = '1' data-productThumb='<?php echo base_url(); ?>uploads/<?php echo $product->thumbnail; ?>' data-productName='<?php echo $product->title; ?>'><i class="fa fa-shopping-cart"></i> <span class="button-group__text addToCartTxt">Add to Cart</span></button>
														<button class="wishlist" type="button" data-productId='<?php echo $product->id; ?>' ><i class="fa fa-heart"></i>  <span class="button-group__text"></span></button>
														<button class="compare" type="button" data-productId='<?php echo $product->id; ?>' ><i class="fa fa-exchange"></i>  <span class="button-group__text"></span></button>
													  </div>
											</div><!-- right block -->

										</div>
									</div>
								<?php endforeach; ?>


						</div>					<!--// End Changed listings-->
						<!-- Filters -->
							<div class="product-filter product-filter-bottom filters-panel">
								<div class="row">
									<div class="col-md-2 hidden-sm hidden-xs"></div>
								   	<div class="short-by-show text-center col-md-7 col-sm-8 col-xs-12">
										<div class="form-group" style="margin: 7px 10px">Showing 1 to 9 of 10 (2 Pages)</div>
									</div>
									<div class="box-pagination col-md-3 col-sm-4 text-right">
										<ul class="pagination">
											<li class="active">
												<span>1</span>
											</li>
											<li><a href="#">2</a></li>
											<li><a href="#">&gt;</a></li>
											<li><a href="#">&gt;|</a></li>
										</ul>
									</div>		
								</div>
							</div>
						<!-- //end Filters -->
					<?php else: ?>

						<div class="no-match">
							<h2 class="text-center">No products found</h2>
							<h4 class="text-center">Try different search</h4>
						</div>	
					
					<?php endif; ?>
					
				</div>
				
			</div>
			
			
		</div>
		<!--Middle Part End-->
	</div>
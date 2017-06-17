
                <!-- BEGIN CONTENT -->
                <div class="page-content-wrapper">
                    <!-- BEGIN CONTENT BODY -->
                    <div class="page-content">
                        <!-- BEGIN PAGE HEADER-->
                        <!-- BEGIN PAGE TITLE-->
                        <h1 class="page-title"> <?php echo $product->title; ?>
                        <span class="alert alert-success product-msg">successfully edit porduct,<b> <a href='<?php echo base_url('product'); ?>'>Back to products</a></b></span>
                        </h1>
                            

                        <!-- END PAGE TITLE-->
                        

                        <!-- start row -->
                        
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-horizontal form-row-seperated" >
                                    <div class="portlet">
                                        <div class="portlet-title">
                                            <div class="caption">
                                                <i class="fa fa-shopping-cart"></i>Edit <?php echo $product->title; ?>
                                                    

                                                </div>
                                            <div class="actions btn-set">
                                                <button type="button" name="back" class="btn btn-secondary-outline">
                                                    <i class="fa fa-angle-left"></i> Back</button>
                                                <button class="btn btn-secondary-outline">
                                                    <i class="fa fa-reply"></i> Reset</button>
                                                <button class="btn btn-success">
                                                    <i class="fa fa-check"></i> Save</button>
                                                <button class="btn btn-success">
                                                    <i class="fa fa-check-circle"></i> Save & Continue Edit</button>
                                                <div class="btn-group">
                                                    <a class="btn btn-success dropdown-toggle" href="javascript:;" data-toggle="dropdown">
                                                        <i class="fa fa-share"></i> More
                                                        <i class="fa fa-angle-down"></i>
                                                    </a>
                                                    <div class="dropdown-menu pull-right">
                                                        <li>
                                                            <a href="javascript:;"> Duplicate </a>
                                                        </li>
                                                        <li>
                                                            <a href="javascript:;"> Delete </a>
                                                        </li>
                                                        <li class="dropdown-divider"> </li>
                                                        <li>
                                                            <a href="javascript:;"> Print </a>
                                                        </li>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="portlet-body">
                                            <div class="tabbable-bordered">
                                                <ul class="nav nav-tabs">
                                                    <li class="active">
                                                        <a href="#tab_general" data-toggle="tab"> General </a>
                                                    </li>
                                                    
                                                   
                                                </ul>
                                                <div class="tab-content">
                                                    <div class="tab-pane active" id="tab_general">
                                                        <div class="form-body">
                                                            <div class="form-group">
                                                                <label class="col-md-2 control-label">Name:
                                                                    <span class="required"> * </span>
                                                                </label>
                                                                <div class="col-md-10">
                                                                    <input type="text" class="form-control product_name" name="product[name]" value='<?php echo $product->title; ?>' placeholder="">
                                                                       <span class="error name-error text-danger"></span> 
                                                                     </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="col-md-2 control-label">Description:
                                                                    <span class="required"> * </span>
                                                                </label>
                                                                <div class="col-md-10">
                                                                    <div name="summernote" class='add_product_desc' id="summernote_1"><?php echo $product->description; ?></div>
                                                                    <span class="error desc-error text-danger"></span> 
                                                                </div>
                                                            </div>
                                                          
                                                            <div class="form-group">
                                                                <label class="col-md-2 control-label">Categories:
                                                                    <span class="required"> * </span>
                                                                </label>
                                                                <div class="col-md-10">
                                                                     <div class="input-group select2-bootstrap-append">
                                                                        <select id="single-append-text" class="form-control select2-allow-clear product_cat">
                                                                           
                                                                            <option value=''> Choose categroy</option>
                                                                           <?php if(isset($categories)): ?>
                                                                            <?php foreach($categories as $categroy): ?>
                                                                                  <option value='<?php echo $categroy->id; ?>' <?php if($product->category_id==$categroy->id): echo 'selected'; endif;?>><?php echo $categroy->name; ?></option>
                                                                           <?php  endforeach; ?>
                                                                           <?php endif; ?>

                                                                        </select>

                                                                        <span class="input-group-btn">
                                                                            <button class="btn btn-default" type="button" data-select2-open="single-append-text">
                                                                                <span class="glyphicon glyphicon-search"></span>
                                                                            </button>
                                                                        </span>
                                                                    </div>
                                                                        <span class="error category-error text-danger"></span> 
                                                                </div>
                                                            </div>
                                                          
                                                            <div class="form-group">
                                                                <label class="col-md-2 control-label">SKU:
                                                                    <span class="required"> * </span>
                                                                </label>
                                                                <div class="col-md-3">
                                                                    <input type="text" class="form-control product_sku" name="product[sku]" value='<?php echo $product->sku; ?>' placeholder=""> 
                                                                    <span class="error sku-error text-danger"></span> 
                                                                </div>
                                                                
                                                                <label class="col-md-2 control-label">Quantity:
                                                                    <span class="required"> * </span>
                                                                </label>
                                                                <div class="col-md-3">
                                                                    <input type="number" class="form-control product_qty" name="product[qty]" value='<?php echo $product->quantity; ?>' placeholder=""> 
                                                                <span class="error qty-error text-danger"></span> 
                                                                </div>


                                                            </div>
                                                            <div class="form-group">
                                                                <label class="col-md-2 control-label">Price:
                                                                    <span class="required"> * </span>
                                                                </label>
                                                                <div class="col-md-3">
                                                                    <input id="touchspin_2" type="text" name="demo2" value='<?php echo $product->price; ?>' class="form-control product_price"> 
                                                               <span class="error price-error text-danger"></span> 
                                                                </div>

                                                                <label class="col-md-2 control-label">Shipping cost:
                                                                    <span class="required"> * </span>
                                                                </label>
                                                                <div class="col-md-3">
                                                                    <input id="touchspin_3" type="text"  name="demo2" value='<?php echo $product->shipping; ?>' class="form-control product_shipping"> 
                                                               <span class="error shipping-error text-danger"></span> 
                                                                </div>
                                                            </div>
                                                             <div class="form-group">
                                                                <label class="col-md-2 control-label">Image
                                                                    <span class="required"> * </span>
                                                                </label>
                                                                <div class="col-md-4">

                                                                    <form id="product_image" method="POST" action='<?php echo base_url('product/upload_image'); ?>' enctype="multipart/form-data">
                                                                        <!-- <div class="fileinput fileinput-new" data-provides="fileinput"> -->
                                                                            <!-- <span class="btn green btn-file"> -->
                                                                                <!-- <span class="fileinput-new"> Select file </span> -->
                                                                                <!-- <span class="fileinput-exists"> Change </span> -->
                                                                                <input type="file" name="file" id='file'> 
                                                                                <span class="error image-error text-danger"></span> 
                                                                                <!-- </span> -->
                                                                               
                                                                            <!-- <span class="fileinput-filename"> </span> &nbsp; -->
                                                                            <!-- <a href="javascript:;" class="close fileinput-exists" data-dismiss="fileinput"> </a> -->
                                                                        <!-- </div> -->
                                                                          
                                                                                <div class="progressBar">
                                                                                    <div class="bar"></div>
                                                                                    <div class="percent">0%</div>
                                                                                </div>
                                                                    </form>
                                                                    <img src="<?php echo base_url('uploads/'.$product->thumbnail); ?>" height='200'  class='uploaded_image'>
                                                                </div>
                                                            </div>

                                                            <div class="form-group">
                                                                <label class="col-md-2 control-label">Status:
                                                                    <span class="required"> * </span>
                                                                </label>
                                                                <div class="col-md-10">
                                                                    <select class="table-group-action-input form-control input-medium product_status" name="product[status]">
                                                               
                                                                      
                                                                        <option value="">Select...</option>
                                                                        <option value="1" <?php echo $product->status ? 'selected' : ''; ?>>Published</option>
                                                                        <option value="0" <?php echo !($product->status) ? 'selected' : ''; ?>>Not Published</option>
                                                                    </select>
                                                                    <span class="error status-error text-danger"></span> 
                                                                </div>
                                                            </div>

                                                            <div class="form-group">
                                                            <label class="col-md-2 control-label">
                                                                    <span class="required"> &nbsp; </span>
                                                                </label>
                                                                <div class="col-md-10">
                                                                    <input type="hidden" value='<?php echo $product->thumbnail; ?>' class='thumbnail' name="thumbnail">
                                                                    <button type="button" data-loading-text="Loading..." data-productId='<?php echo $product->id; ?>' class="btn btn-primary btn-lg mt-ladda-btn ladda-button mt-progress-demo edit_product" data-style="expand-left">
                                                                        <span class="ladda-label">Submit</span>
                                                                    </button>
                                                                    <h2 class="alert alert-success product-msg">successfully edit porduct,<b> <a href='<?php echo base_url('product'); ?>'>Back to products</a></b></h2>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- end row -->

                    </div>
                    <!-- END CONTENT BODY -->
                </div>
                <!-- END CONTENT -->
         

                <!-- BEGIN CONTENT -->
                <div class="page-content-wrapper">
                    <!-- BEGIN CONTENT BODY -->
                    <div class="page-content">
                        <!-- BEGIN PAGE HEADER-->
                        <!-- BEGIN PAGE TITLE-->
                        <h1 class="page-title"> Add a new product
                        <span class="alert alert-success product-msg">successfully add new porduct,<b> <a href='<?php base_url('product/create'); ?>'>Add another</a></b></span>
                        </h1>
                            

                        <!-- END PAGE TITLE-->
                        

                        <!-- start row -->
                        
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-horizontal form-row-seperated" >
                                    <div class="portlet">
                                        <div class="portlet-title">
                                            <div class="caption">
                                                <i class="fa fa-shopping-cart"></i>New Product 
                                                    

                                                </div>
                                            <div class="actions btn-set">
                                                <a href="<?php echo base_url('product'); ?>" name="back" class="btn btn-transparent dark btn-outline btn-circle btn-sm">
                                                    <i class="fa fa-angle-left"></i> Back</a>
                                                <a href="#excelModal" data-toggle="modal" class="btn btn-transparent dark btn-outline btn-circle btn-sm">upload using excel</a>
                                            
                                            </div>


                                            <!-- excel modal -->
                                        <div id="excelModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                                        <h4 class="modal-title text-center">Upload Excel file</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                       <form method='POST' action="<?php echo base_url('product/uploadExcel'); ?>" enctype="multipart/form-data" class=" dropzone-file-area" id='upload-product-excel'  style="width: 500px; margin-top: 50px;">
                                                            <h3 class="sbold">click to upload</h3>
                                                           <p class="text-center"> <input type="file" name='file' class="excel-upload"></p>
                                                                               <div class="progressBar">
                                                                                    <div class="bar"></div>
                                                                                    <div class="percent">0%</div>
                                                                                </div>
                                                            <!-- <p> Choose your excel file to upload the products. </p> -->
                                                        </form>
                                                        <div class="excel-loader"><img src="<?php echo base_url('assets/img/excel-loader.gif'); ?>"></div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button class="btn default" data-dismiss="modal" aria-hidden="true">Close</button>
                                                        <!-- <button class="btn yellow">Save</button> -->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                         <!-- excel modal  end-->
                                        </div>
                                        <div class="portlet-body">
                                            <div class="tabbable-bordered">
                                                <ul class="nav nav-tabs">
                                                    <li class="active">
                                                        <a href="#tab_general" data-toggle="tab"> General </a>
                                                    </li>
                                        
                                                </ul>
                                                <div class="tab-content product-add-div">
                                                <img class="product-loader" src="<?php  echo base_url('assets/img/loader.gif'); ?>" />
                                                    <div class="tab-pane active" id="tab_general">
                                                        <div class="form-body">
                                                            <div class="form-group">
                                                                <label class="col-md-2 control-label">Name:
                                                                    <span class="required"> * </span>
                                                                </label>
                                                                <div class="col-md-10">
                                                                    <input type="text" class="form-control product_name" name="product[name]" placeholder="">
                                                                       <span class="error name-error text-danger"></span> 
                                                                     </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="col-md-2 control-label">Description:
                                                                    <span class="required"> * </span>
                                                                </label>
                                                                <div class="col-md-10">
                                                                    <div name="summernote" class='add_product_desc' id="summernote_1"></div>
                                                                    <span class="error desc-error text-danger"></span> 
                                                                </div>
                                                            </div>
                                                          
                                                            <div class="form-group add-after-this">
                                                                <label class="col-md-2 control-label">Categories:
                                                                    <span class="required"> * </span>
                                                                </label>
                                                                <div class="col-md-10">
                                                                     <div class="input-group select2-bootstrap-append">
                                                                        <select id="single-append-text" class="form-control select2-allow-clear product_cat">
                                                                           
                                                                            <option value=''> Choose categroy</option>
                                                                           <?php if(isset($categories)): ?>
                                                                            <?php foreach($categories as $categroy): ?>
                                                                            <option value='<?php echo $categroy->id; ?>'><?php echo $categroy->name; ?></option>
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
                                                           
                                                            <div class="form-group variation-color">
                                                                <label class="col-md-2 control-label">Color: 
                                                                    <span class="required"> * </span>
                                                                </label>
                                                                <div class="col-md-10">
                                                                   
                                                                        <div class="input-group">
                                                                            <div class="icheck-inline">
                                                                                <label> <input type="radio" name="color" class="icheck" data-radio="iradio_square-grey" value='transparent' data-colorCode=''> <span style='background-color: #fff;height: 40px;width: 40px;'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span> Transparent </label>
                                                                            <?php if(isset($colors)): ?>
                                                                                <?php foreach ($colors as $color) { ?>
                                                                                   
                                                                                <label> <input type="radio" name="color" class="icheck" data-radio="iradio_square-grey" value='<?php echo $color->name; ?>' data-colorCode='<?php echo $color->code; ?>'> <span style='background-color: <?php echo $color->code; ?>;height: 40px;width: 40px;'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span> <?php echo $color->name; ?> </label>
                                                                               <?php } ?>
                                                                                 <span class="error color-error text-danger"></span> 
                                                                                <?php else: ?>
                                                                                    <h3>No Colors available</h3>
                                                                                <?php endif; ?>            
                                                                    </div>
                                                                        </div>   
                                                                </div>
                                                             </div>

                                                              <div class="form-group variation-weight">
                                                                <label class="col-md-2 control-label">Weight:
                                                                    <span class="required"> * </span>
                                                                </label>
                                                                <div class="col-md-2">
                                                                   <input type="number" min='0' name="weight" class='form-control product-weight'>
                                                                   <span class="error weight-error text-danger"></span> 
                                                                   
                                                                </div>
                                                                 <div class="col-md-2">
                                                                    <select class="form-control weight-unit" >
                                                                       <option value=''>Select unit</option>
                                                                       <option value='mg'>Milligram (mg)</option>
                                                                       <option value='g'>Gram (g)</option>
                                                                       <option value='kg'>kilogram (km)</option>
                                                                       <option value='oz'>ounce (oz)</option>
                                                                       
                                                                   </select>
                                                                       <span class="error weight-unit-error text-danger"></span> 
                                                                 </div>
                                                             </div>
                                                        


                                                            <div class="form-group">
                                                                <label class="col-md-2 control-label">SKU:
                                                                    <span class="required"> * </span>
                                                                </label>
                                                                <div class="col-md-3">
                                                                    <input type="text" class="form-control product_sku" name="product[sku]" placeholder=""> 
                                                                    <span class="error sku-error text-danger"></span> 
                                                                </div>
                                                                
                                                                <label class="col-md-2 control-label">Quantity:
                                                                    <span class="required"> * </span>
                                                                </label>
                                                                <div class="col-md-3">
                                                                    <input type="number" class="form-control product_qty" name="product[qty]" placeholder=""> 
                                                                <span class="error qty-error text-danger"></span> 
                                                                </div>


                                                            </div>
                                                            <div class="form-group">
                                                                <label class="col-md-2 control-label">Price:
                                                                    <span class="required"> * </span>
                                                                </label>
                                                                <div class="col-md-3">
                                                                    <input  type="number" min='0' value="0" name="demo2" class="form-control product_price"> 
                                                               <span class="error price-error text-danger"></span> 
                                                                </div>

                                                                <label class="col-md-2 control-label">Shipping cost:
                                                                    <span class="required"> * </span>
                                                                </label>
                                                                <div class="col-md-3">
                                                                    <input id="touchspin_3" type="text" value="0" name="demo2" class="form-control product_shipping"> 
                                                               <span class="error shipping-error text-danger"></span> 
                                                                </div>
                                                            </div>
                                                             <div class="form-group">
                                                                <label class="col-md-2 control-label">Image
                                                                    <span class="required"> * </span>
                                                                </label>
                                                                <div class="col-md-4">
                                                                    <form id="product_image" method="POST" action='<?php echo base_url('product/upload_image'); ?>' enctype="multipart/form-data">
                                                                      
                                                                                <input type="file" name="file" id='file'> 
                                                                                <span class="error image-error text-danger"></span> 
                                                                            
                                                                          
                                                                                <div class="progressBar">
                                                                                    <div class="bar"></div>
                                                                                    <div class="percent">0%</div>
                                                                                </div>
                                                                    </form>
                                                                    <img src="" class='uploaded_image'>
                                                                </div>
                                                            </div>
               

                                                            <div class="form-group">
                                                                <label class="col-md-2 control-label">Status:
                                                                    <span class="required"> * </span>
                                                                </label>
                                                                <div class="col-md-10">
                                                                    <select class="table-group-action-input form-control input-medium product_status" name="product[status]">
                                                                        <option value="">Select...</option>
                                                                        <option value="1">Published</option>
                                                                        <option value="0">Not Published</option>
                                                                    </select>
                                                                    <span class="error status-error text-danger"></span> 
                                                                </div>
                                                            </div>

                                                            <div class="form-group">
                                                            <label class="col-md-2 control-label">
                                                                    <span class="required"> &nbsp; </span>
                                                                </label>
                                                                <div class="col-md-10">
                                                                    <input type="hidden" value='' class='thumbnail' name="thumbnail">
                                                                    <button type="button" data-loading-text="Loading..." class="btn btn-primary btn-lg mt-ladda-btn ladda-button mt-progress-demo add_product" data-style="expand-left">
                                                                        <span class="ladda-label">Submit</span>
                                                                    </button>
                                                                    <h2 class="alert alert-success product-msg">successfully add new porduct,<b> <a href='<?php base_url('product/create'); ?>'>Add another</a></b></h2>
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

                
         
        
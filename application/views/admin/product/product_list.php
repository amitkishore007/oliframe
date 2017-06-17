BEGIN CONTENT -->
                <div class="page-content-wrapper">
                    <!-- BEGIN CONTENT BODY -->
                    <div class="page-content">
                        <!-- BEGIN PAGE HEADER-->
                        <!-- BEGIN PAGE TITLE-->
                        <h1 class="page-title">Product list
                            
                        </h1>
                        <!-- END PAGE TITLE-->
                        <!-- start  row -->
                       
                        <div class="row">
                            <div class="col-md-12">
                                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                                <div class="portlet light bordered">
                                    <div class="portlet-title">
                                        <div class="caption font-dark">
                                            <i class="icon-settings font-dark"></i>
                                            <span class="caption-subject bold uppercase">Manage product</span>
                                        </div>
                                        <div class="actions">
                                            <div class="btn-group btn-group-devided">
                                                <a href="<?php echo base_url('product/create'); ?>" class="btn btn-transparent dark btn-outline btn-circle btn-sm">Add a new product</a>
                                                <a href="#excelModal" data-toggle="modal" class="btn btn-transparent dark btn-outline btn-circle btn-sm">upload using excel</a>
                                            </div>
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
                                        <table class="table table-striped table-bordered table-hover table-header-fixed" id="sample_1">
                                            <thead>
                                                <tr class="">
                                                    <th>S. No.</th>
                                                    <th>Image</th>
                                                    <th>Title</th>
                                                    <th>Vandor</th>
                                                    <th>Status</th>
                                                    <th>Best seller</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php if (isset($products)):  $i=1; ?>

                                            <?php foreach ($products as $product):  ?>

                                                <tr id='row_<?php echo $product->product_id ?>'>
                                                    <td><?php echo $i; ?></td>
                                                    <?php if(isset($product->thumbnail) && !empty($product->thumbnail)): ?>
                                                            <?php if($product->upload_type=='excel'): ?>
                                                              <td><img src="<?php echo $product->thumbnail; ?>" height='80' ></td>
                                                            <?php else: ?>
                                                              <td><img src="<?php echo base_url('uploads/'.$product->thumbnail); ?>" height='80' ></td>
                                                            <?php endif; ?>
                                                        <?php else: ?>
                                                            <td><img src="<?php echo base_url('assets/img/product-placeholder.png'); ?>" height='50'></td>
                                                    <?php endif; ?>
                                                    
                                                    <td><?php echo $product->title; ?></td>
                                                    <td><?php echo $product->username; ?></td>
                                                    <td><span id="status_<?php echo $product->product_id; ?>" class='<?php echo $product->status ? 'text-success' : 'text-danger'; ?>'><?php echo $product->status ? "Published" : "Not published"; ?></span>  <input type="checkbox" <?php echo $product->status ? 'checked' : ''; ?> class="make-switch product-status" data-on-text="Public" data-productId='<?php echo $product->product_id; ?>' data-off-text="Private" data-size="mini"></td>
                                                   <td><input type="checkbox" <?php echo $product->hot_sale ? "checked" : ''; ?> class="make-switch hot-sale" data-on-text="Active" data-productId='<?php echo $product->product_id; ?>'  data-off-text="Inactive" data-size="mini"></td>
                                                    <td>
                                                    <a href="<?php echo base_url('product/edit/'.$product->product_id); ?>" class='btn btn-sm btn-info'>Edit</a>
                                                     <a class="btn red-mint btn-large delete-product " data-productId = "<?php echo $product->product_id; ?>" data-toggle="confirmation" data-original-title="Are you sure ?"
                                            title="">Delete</a>
                                                    </td>
                                                </tr>
                                            <?php $i++; ?>
                                            <?php endforeach; ?>
                                            <?php endif; ?>
                                            

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <!-- END EXAMPLE TABLE PORTLET-->
                                
                            </div>
                        </div>


                        <!-- end  row -->
                            
                        

                    </div>
                    <!-- END CONTENT BODY -->
                </div>
                <!-- END CONTENT
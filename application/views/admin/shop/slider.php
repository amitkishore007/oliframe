
                <div class="page-content-wrapper">
                    <!-- BEGIN CONTENT BODY -->
                    <div class="page-content">
                        <!-- BEGIN PAGE HEADER-->
                        <!-- BEGIN PAGE TITLE-->
                        <h1 class="page-title">Slides</h1>
                        <!-- END PAGE TITLE-->
                        <!-- start  row -->
                       
                        <div class="row">
                            <div class="col-md-12">
                                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                                <div class="portlet light bordered">
                                    <div class="portlet-title">
                                        <div class="caption font-dark">
                                            <i class="icon-settings font-dark"></i>
                                            <span class="caption-subject bold uppercase">Slide list</span>
                                        </div>
                                        <div class="actions">
                                            <div class="btn-group btn-group-devided">
                                              
                                                <a href="<?php echo base_url('slider/upload_slide'); ?>" class='btn btn-transparent dark btn-outline btn-circle btn-sm'>Upload a new slide</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="portlet-body">
                                        <table class="table table-striped table-bordered table-hover table-header-fixed" id="sample_1">
                                            <thead>
                                                <tr class="">
                                                    <th>S. No.</th>
                                                    <th>slide</th>
                                                    <th>Product link</th>
                                                  

                                                    <th>Active status</th>
                                                   
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                            <?php if (isset($slides)):  $i=1; ?>

                                            <?php foreach ($slides as $slide):  ?>

                                                <tr id='row_<?php echo $slide->id; ?>'>
                                                    <td><?php echo $i; ?></td>
                                                    <td><img src="<?php echo base_url(); ?>uploads/thumbs/<?php echo $slide->slide; ?>" height='70'></td>
                                                    <td><input type="text" name="product_link" id='slider_product_link' data-sliderId='<?php echo $slide->id; ?>' placeholder="type to select product"></td>
                                                    <td>
                                                    
                                                    <div class="md-checkbox">
                                                                <input type="checkbox" name="slide_status"  data-slideId='<?php echo $slide->id; ?>'  id='checkbox<?php echo $slide->id; ?>' class="md-check slide_status" <?php echo $slide->status ? 'checked': ''; ?>>
                                                                <label for="checkbox<?php echo $slide->id; ?>">
                                                                    <span></span>
                                                                    <span class="check"></span>
                                                                    <span class="box"></span></label>
                                                    </div>

                                                   

                                                 
                                                    </td>
                                                    
                                                    <td>
                                                    
                                                     <a class="btn red-mint btn-large delete-slide " data-slideId = "<?php echo $slide->id; ?>" data-toggle="confirmation" data-original-title="Are you sure ?"
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
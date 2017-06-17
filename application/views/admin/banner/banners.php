BEGIN CONTENT -->
                <div class="page-content-wrapper">
                    <!-- BEGIN CONTENT BODY -->
                    <div class="page-content">
                        <!-- BEGIN PAGE HEADER-->
                        <!-- BEGIN PAGE TITLE-->
                        <h1 class="page-title">Banners</h1>
                        <!-- END PAGE TITLE-->
                        <!-- start  row -->
                       
                        <div class="row">
                            <div class="col-md-12">
                                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                                <div class="portlet light bordered">
                                    <div class="portlet-title">
                                        <div class="caption font-dark">
                                            <i class="icon-settings font-dark"></i>
                                            <span class="caption-subject bold uppercase">Banner list</span>
                                        </div>
                                        <div class="actions">
                                            <div class="btn-group btn-group-devided">
                                              
                                                <a href="<?php echo base_url('banner/upload_banner'); ?>" class='btn btn-transparent dark btn-outline btn-circle btn-sm'>Upload a new banner</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="portlet-body">
                                        <table class="table table-striped table-bordered table-hover table-header-fixed" id="sample_1">
                                            <thead>
                                                <tr class="">
                                                    <th>S. No.</th>
                                                    <th>Banner</th>
                                                  <th>Position</th>
                                                    <th>Order</th>
                                                    <th>Active status</th>
                                                   
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                            <?php if (isset($banners)):  $i=1; ?>

                                            <?php foreach ($banners as $banner):  ?>

                                                <tr id='row_<?php echo $banner->id; ?>'>
                                                    <td><?php echo $i; ?></td>
                                                    <td><img src="<?php echo base_url(); ?>uploads/thumbs/<?php echo $banner->banner; ?>" height='70'></td>
                                                   
                                                    <td>
                                                    
                                                    <select class="banner-position" data-bannerId='<?php echo $banner->id; ?>'>
                                                        <option value=''>Select banner position</option>
                                                        <option value='below_slider' <?php echo $banner->page_location=='below_slider' ? 'selected': ''; ?>> Below home slider</option>
                                                        <option value='shop_category' <?php echo $banner->page_location=='shop_category' ? 'selected': ''; ?>>Below shop category products</option>
                                                        <option value="below_arrival" <?php echo $banner->page_location=='below_arrival' ? 'selected': ''; ?>>Below new arrival</option>
                                                    </select>
                                                     </td>
                                                     <td>
                                                        <input type="number" class='view-order' min='1' size='4' max="100" data-bannerId='<?php echo $banner->id; ?>' class='view-order' placeholder='1, 2, 3 ..etc' value='<?php echo $banner->view_order; ?>'>
                                                    </td>
                                                    <td>
                                                    

                                                    
                                                    <div class="md-checkbox">
                                                                <input type="checkbox" name="banner_status" data-bannerId='<?php echo $banner->id; ?>'  id='checkbox<?php echo $banner->id; ?>' class="md-check banner_status" <?php echo $banner->status ? 'checked': ''; ?>>
                                                                <label for="checkbox<?php echo $banner->id; ?>">
                                                                    <span></span>
                                                                    <span class="check"></span>
                                                                    <span class="box"></span></label>
                                                    </div>

                                                   

                                                 
                                                    </td>
                                                    
                                                    <td>
                                                    
                                                     <a class="btn red-mint btn-large delete-banner " data-bannerId = "<?php echo $banner->id; ?>" data-toggle="confirmation" data-original-title="Are you sure ?"
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
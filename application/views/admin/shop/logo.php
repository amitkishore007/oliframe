
                <div class="page-content-wrapper">
                    <!-- BEGIN CONTENT BODY -->
                    <div class="page-content">
                        <!-- BEGIN PAGE HEADER-->
                        <!-- BEGIN PAGE TITLE-->
                        <h1 class="page-title">Logos</h1>
                        <!-- END PAGE TITLE-->
                        <!-- start  row -->
                       
                        <div class="row">
                            <div class="col-md-12">
                                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                                <div class="portlet light bordered">
                                    <div class="portlet-title">
                                        <div class="caption font-dark">
                                            <i class="icon-settings font-dark"></i>
                                            <span class="caption-subject bold uppercase">Uploaded Logo list</span>
                                        </div>
                                        <div class="actions">
                                            <div class="btn-group btn-group-devided">
                                            
                                                <a href="<?php echo base_url('logo/upload_logo'); ?>" class='btn btn-transparent dark btn-outline btn-circle btn-sm'>Upload a logo</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="portlet-body">
                                        <table class="table table-striped table-bordered table-hover table-header-fixed" id="sample_1">
                                            <thead>
                                                <tr class="">
                                                    <th>S. No.</th>
                                                    <th>logo</th>
                                                  

                                                    <th>Active status</th>
                                                   
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                            <?php if (isset($logos)):  $i=1; ?>

                                            <?php foreach ($logos as $logo):  ?>

                                                <tr id='row_<?php echo $logo->id; ?>'>
                                                    <td><?php echo $i; ?></td>
                                                    <td><img src="<?php echo base_url(); ?>uploads/<?php echo $logo->logo; ?>" height='70'></td>
                                                    
                                                    <td>

                                                    <div class="md-radio text-center">
                                                        <input type="radio" id='radio<?php echo $logo->id; ?>' data-logoId='<?php echo $logo->id; ?>' name="logo_status" class="md-radiobtn logo_status" value="<?php echo $logo->status; ?>" <?php echo $logo->status ? 'checked': ''; ?>>
                                                        <label for="radio<?php echo $logo->id; ?>">
                                                            <span></span>
                                                            <span class="check"></span>
                                                            <span class="box"></span></label>
                                                    </div>

                                                 
                                                    </td>
                                                    
                                                    <td>
                                                    
                                                     <a class="btn red-mint btn-large delete-logo " data-logoId = "<?php echo $logo->id; ?>" data-toggle="confirmation" data-original-title="Are you sure ?"
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
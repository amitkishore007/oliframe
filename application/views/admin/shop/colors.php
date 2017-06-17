
                <div class="page-content-wrapper">
                    <!-- BEGIN CONTENT BODY -->
                    <div class="page-content">
                        <!-- BEGIN PAGE HEADER-->
                        <!-- BEGIN PAGE TITLE-->
                        <h1 class="page-title">Colors</h1>
                        <!-- END PAGE TITLE-->
                        <!-- start  row -->
                       
                        <div class="row">
                            <div class="col-md-12">
                                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                                <div class="portlet light bordered">
                                    <div class="portlet-title">
                                        <div class="caption font-dark">
                                            <i class="icon-settings font-dark"></i>
                                            <span class="caption-subject bold uppercase">Product color variation</span>
                                        </div>
                                        <div class="actions">
                                            <div class="btn-group btn-group-devided">
                                            
                                                <a href="<?php echo base_url('color/add'); ?>" class='btn btn-transparent dark btn-outline btn-circle btn-sm'>Add a color</a>
                                            
                                            </div>
                                        </div>
                                    </div>
                                    <div class="portlet-body">
                                        <table class="table table-striped table-bordered table-hover table-header-fixed" id="sample_1">
                                            <thead>
                                                <tr class="">
                                                    <th>S. No.</th>
                                                   
                                                    <th>Color Code</th>
                                                    <th>Name</th>
                                
                                                
                                                   
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                            <?php if (isset($colors)):  $i=1; ?>

                                            <?php foreach ($colors as $color):  ?>

                                                <tr id='row_<?php echo $color->id; ?>'>
                                                    <td><?php echo $i; ?></td>
                                                    <td><span class="color-code" style="background-color:<?php echo $color->code; ?>"></span>  <span class="color-name">: <?php echo $color->code; ?></span></td>
                                                    <td><?php echo htmlentities($color->name) ?></td>
                                                    
      
                                                    
                                                    <td>
                                                    
                                                     <a class="btn red-mint btn-large delete-color " data-colorId = "<?php echo $color->id; ?>" data-toggle="confirmation" data-original-title="Are you sure ?"
                                            title="">Delete</a>
                                            <a class="btn btn-primary btn-large " href='<?php echo base_url('color/edit/'.$color->id); ?>' >Edit</a>
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
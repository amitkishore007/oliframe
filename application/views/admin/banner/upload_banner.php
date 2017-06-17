BEGIN CONTENT -->
                <div class="page-content-wrapper">
                    <!-- BEGIN CONTENT BODY -->
                    <div class="page-content">
                        <!-- BEGIN PAGE HEADER-->
                        <!-- BEGIN PAGE TITLE-->
                        <h1 class="page-title">Upload Banner</h1>
                        <!-- END PAGE TITLE-->
                        <!-- start  row -->
                       
                        <div class="row">
                            <div class="col-md-12">
                                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                                <div class="portlet light bordered">
                                    <div class="portlet-title">
                                        <div class="caption font-dark">
                                            <!-- <i class="icon-settings font-dark"></i> -->
                                            <!-- <span class="caption-subject bold uppercase"></span> -->
                                        </div>
                                        <div class="actions">
                                            <div class="btn-group btn-group-devided">
                                               
                                                   <a href="<?php echo base_url('banner'); ?>" class='btn btn-transparent dark btn-outline btn-circle btn-sm'>Back</a>
                                            <!--     <label class="btn btn-transparent dark btn-outline btn-circle btn-sm">
                                                    <input type="radio" name="options" class="toggle" id="option2">Settings</label> -->
                                            </div>
                                        </div>
                                    </div>
                                    <div class="portlet-body">
                                     

                                        <form action="<?php echo base_url('banner/upload'); ?>" class="dropzone">
                                            <h3 class="sbold text-center">Drop files here or click to upload</h3>
                                                <p class='text-center'> You can choose multiple files. </p>
                                              <div class="fallback">
                                                <input name="file" type="file" multiple />
                                              </div>
                                        </form>
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
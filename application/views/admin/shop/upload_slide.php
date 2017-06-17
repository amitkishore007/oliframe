
                <div class="page-content-wrapper">
                    <!-- BEGIN CONTENT BODY -->
                    <div class="page-content">
                        <!-- BEGIN PAGE HEADER-->
                        <!-- BEGIN PAGE TITLE-->
                        <h1 class="page-title">Upload Slide</h1>
                        <!-- END PAGE TITLE-->
                        <!-- start  row -->
                       
                        <div class="row">
                            <div class="col-md-12">
                                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                                <div class="portlet light bordered">
                                    <div class="portlet-title">
                                        <div class="caption font-dark">
                                            
                                        </div>
                                        <div class="actions">
                                            <a href="<?php echo base_url('slider'); ?>" name="back" class="btn btn-transparent dark btn-outline btn-circle btn-sm">
                                                    <i class="fa fa-angle-left"></i> Back</a>
                                              </div>
                                    </div>
                                    <div class="portlet-body">
                                        <form action="<?php echo base_url('slider/upload'); ?>" class="dropzone">
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
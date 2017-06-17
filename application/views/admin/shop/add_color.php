
                <div class="page-content-wrapper">
                    <!-- BEGIN CONTENT BODY -->
                    <div class="page-content">
                        <!-- BEGIN PAGE HEADER-->
                        <!-- BEGIN PAGE TITLE-->
                        <h1 class="page-title">Product color variation</h1>
                        <!-- END PAGE TITLE-->
                        <!-- start  row -->
                       
                        <div class="row">
                            <div class="col-md-12">
                                <!-- BEGIN PORTLET-->
                                <div class="portlet light bordered form-fit">
                                    <div class="portlet-title">
                                        <div class="caption font-red-intense">
                                            <i class="icon-speech font-red-intense"></i>
                                            <span class="caption-subject bold uppercase">Product color variation</span>
                                            <span class="caption-helper"></span>
                                        </div>
                                        <div class="actions">
                                   
                                            <a href="<?php echo base_url('color'); ?>" class="btn btn-circle btn-default btn-sm">
                                                <i class="fa fa-plus"></i> Back to colors</a>
                                            <!-- <a class="btn btn-circle btn-icon-only btn-default" href="javascript:;">
                                                <i class="icon-wrench"></i>
                                            </a> -->
                                        </div>
                                    </div>
                                    <div class="portlet-body form">
                                        <form id="form-username" class="form-horizontal form-bordered">
                                            <div class="form-group">
                                                <label class="col-md-3 control-label">color name</label>
                                                <div class="col-md-3">
                                                    <input type="text" class="form-control colorName" name='colorName' placeholder="color name"> 
                                                    <span class="text-danger error-name"></span>

                                                    </div>
                                                   
                                            </div> 
                                            <div class="form-group">
                                                <label class="col-md-3 control-label">color code</label>
                                                <div class="col-md-3">
                                                    <input type="text" id="hue-demo" class="form-control demo colorCode" data-control="hue" value=""> 
                                                    <span class="text-danger error-code"></span>
                                                    </div>
                                                    
                                            </div>
                                           
                                            <div class="form-actions">
                                                <div class="row">
                                                    <div class="col-md-offset-3 col-md-9">
                                                        <button type="submit" class="btn green addColor">
                                                            <i class="fa fa-check"></i> Submit</button>
                                                        <a type="button" class="btn default" href='<?php echo base_url('color'); ?>'>Cancel</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <!-- END PORTLET-->
                            </div>
                        </div>


                        <!-- end  row -->
                            
                        

                    </div>
                    <!-- END CONTENT BODY -->
                </div>
                <!-- END CONTENT
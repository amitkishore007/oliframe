
                <!-- BEGIN CONTENT -->
                <div class="page-content-wrapper">
                    <!-- BEGIN CONTENT BODY -->
                    <div class="page-content">
                        <!-- BEGIN PAGE HEADER-->
                        <!-- BEGIN PAGE TITLE-->
                        <h1 class="page-title">About us 
                            
                        </h1>
                        <!-- END PAGE TITLE-->
                        

                        <!-- start row -->
                        
                        <div class="row">
                            <div class="col-md-12">
                                <form class="form-horizontal form-row-seperated" action="#">
                                    <div class="portlet">
                                        <div class="portlet-title">
                                            <div class="caption">
                                                <i class="fa fa-shopping-cart"></i>About us <span class="text-center alert alert-success success-msg"></span></div>
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
                                                   
                                                    
                                                   
                                                </ul>
                                                <div class="tab-content">
                                                    <div class="tab-pane active" id="tab_general">
                                                        <div class="form-body">
                                                            <div class="form-group">
                                                                <label class="col-md-2 control-label">Title:
                                                                    <span class="required"> * </span>
                                                                </label>
                                                                <div class="col-md-10"> 
                                                                    <input type="text" class="form-control about_title"  name="about_title" value='<?php echo $about_content->title; ?>' placeholder=""> 

                                                                     <span class="text-danger  title-error"></span>   
                                                                    </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="col-md-2 control-label">Content:
                                                                    <span class="required"> * </span>
                                                                </label>
                                                                <div class="col-md-10">
                                                                    <div name="summernote" id="summernote_1" class="about_content"><?php echo $about_content->content; ?></div>
                                                                    <span class="text-danger  about_content-error"></span> 
                                                                </div>
                                                            </div>
                                                          
                                                            

                                                          

                                                            <div class="form-group">
                                                            <label class="col-md-2 control-label">
                                                                    <span class="required"> &nbsp; </span>
                                                                </label>
                                                                <div class="col-md-10">
                                                                    <button type="button" data-loading-text="Loading..." data-aboutId='<?php echo $about_content->id; ?>' class="btn btn-primary btn-lg mt-ladda-btn ladda-button mt-progress-demo edit_about" data-style="expand-left">
                                                                        <span class="ladda-label">Submit</span>
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <!-- end row -->

                    </div>
                    <!-- END CONTENT BODY -->
                </div>
                <!-- END CONTENT -->
          

          
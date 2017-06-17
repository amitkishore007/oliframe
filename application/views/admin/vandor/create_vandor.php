
                <!-- BEGIN CONTENT -->
                <div class="page-content-wrapper">
                    <!-- BEGIN CONTENT BODY -->
                    <div class="page-content">
                        <!-- BEGIN PAGE HEADER-->
                        <!-- BEGIN PAGE TITLE-->
                        <h1 class="page-title">Create a new vandor  
                            
                        </h1>
                        <!-- END PAGE TITLE-->
                        

                        <!-- start row -->
                        
                        <div class="row">
                            <div class="col-md-12">
                                <form class="form-horizontal form-row-seperated" action="#">
                                    <div class="portlet">
                                        <div class="portlet-title">
                                            <div class="caption">
                                                <i class="fa fa-shopping-cart"></i>Create Vandor <span class="text-center alert alert-success success-msg"></span></div>
                                            <div class="actions btn-set">
                                                <a href="<?php echo base_url('admin'); ?>" name="back" class="btn btn-transparent dark btn-outline btn-circle btn-sm">
                                                    <i class="fa fa-angle-left"></i> Back to dashboard</a>

                                                    <a href="<?php echo base_url('vandors'); ?>" name="back" class="btn btn-transparent dark btn-outline btn-circle btn-sm">
                                                    <i class="fa fa-angle-left"></i> Vandors list</a>
                                               
                                           <!--      <div class="btn-group">
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
                                                </div> -->
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
                                                                <label class="col-md-2 control-label">username:
                                                                    <span class="required"> * </span>
                                                                </label>
                                                                <div class="col-md-10"> 
                                                                    <input type="text" class="form-control vandor_name"  name="andor[name]" placeholder="username"> 

                                                                     <span class="text-danger  vandor_name-error"></span>   
                                                                    </div>
                                                            </div>

                                                            <div class="form-group">
                                                                <label class="col-md-2 control-label">Email:
                                                                    <span class="required"> * </span>
                                                                </label>
                                                                <div class="col-md-10"> 
                                                                    <input type="text" class="form-control vandor_email"  name="vandor[email]" placeholder="Email"> 

                                                                     <span class="text-danger  vandor_email-error"></span>   
                                                                    </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="col-md-2 control-label">Phone:
                                                                    <span class="required"> * </span>
                                                                </label>
                                                                <div class="col-md-10"> 
                                                                    <input type="text" class="form-control vandor_phone"  name="vandor[phone]" placeholder="Phone number"> 

                                                                     <span class="text-danger  vandor_phone-error"></span>   
                                                                    </div>
                                                            </div>
                                                           <div class="form-group">
                                                                <label class="col-md-2 control-label">Password:
                                                                    <span class="required"> * </span>
                                                                </label>
                                                                <div class="col-md-10"> 
                                                                    <input type="password" class="form-control vandor_password"  name="vandor[password]" placeholder="Password"> 

                                                                     <span class="text-danger  vandor_password-error"></span>   
                                                                    </div>
                                                            </div>

                                                              <div class="form-group">
                                                                <label class="col-md-2 control-label">Retype Password:
                                                                    <span class="required"> * </span>
                                                                </label>
                                                                <div class="col-md-10"> 
                                                                    <input type="password" class="form-control vandor_retype"  name="vandor[retype]" placeholder="Retype password"> 

                                                                     <span class="text-danger  vandor_retype-error"></span>   
                                                                    </div>
                                                            </div>
                                                        
                                                          
                                                            

                                                          

                                                            <div class="form-group">
                                                            <label class="col-md-2 control-label">
                                                                    <span class="required"> &nbsp; </span>
                                                                </label>
                                                                <div class="col-md-10">
                                                                    <button type="button" data-loading-text="Loading..." class="btn btn-primary btn-lg mt-ladda-btn ladda-button mt-progress-demo create-vandor" data-style="expand-left">
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
          
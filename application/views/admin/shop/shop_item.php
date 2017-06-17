<!-- BEGIN CONTENT -->
                <div class="page-content-wrapper">
                    <!-- BEGIN CONTENT BODY -->
                    <div class="page-content">
                        <!-- BEGIN PAGE HEADER-->
                        <!-- BEGIN PAGE TITLE-->
                        <h1 class="page-title">About us</h1>
                        <!-- END PAGE TITLE-->
                        <!-- start  row -->
                       
                        <div class="row">
                            <div class="col-md-12">
                                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                                <div class="portlet light bordered">
                                    <div class="portlet-title">
                                        <div class="caption font-dark">
                                            <i class="icon-settings font-dark"></i>
                                            <span class="caption-subject bold uppercase">About</span>
                                        </div>
                                        <div class="actions">
                                            <div class="btn-group btn-group-devided" data-toggle="buttons">
                                                <label class="btn btn-transparent dark btn-outline btn-circle btn-sm active">
                                                    <input type="radio" name="options" class="toggle" id="option1">Actions</label>
                                                <label class="btn btn-transparent dark btn-outline btn-circle btn-sm">
                                                    <input type="radio" name="options" class="toggle" id="option2">Settings</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="portlet-body">
                                        <table class="table table-striped table-bordered table-hover table-header-fixed" id="sample_1">
                                            <thead>
                                                <tr class="">
                                                    <th>S. No.</th>
                                                    <th>Title</th>
                                                    <th>Content</th>

                                                    <th>Active page</th>
                                                   
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                            <?php if (isset($about)):  $i=1; ?>

                                            <?php foreach ($about as $page):  ?>

                                                <tr id='row_<?php echo $page->id; ?>'>
                                                    <td><?php echo $i; ?></td>
                                                    <td><?php echo $page->title; ?></td>
                                                    <td><?php echo $page->content; ?></td>
                                                    <td>

                                                    <div class="md-radio text-center">
                                                        <input type="radio" id='radio<?php echo $page->id; ?>' data-aboutId='<?php echo $page->id; ?>' name="about_status" class="md-radiobtn page_status" value="<?php echo $page->status; ?>" <?php echo $page->status ? 'checked': ''; ?>>
                                                        <label for="radio<?php echo $page->id; ?>">
                                                            <span></span>
                                                            <span class="check"></span>
                                                            <span class="box"></span></label>
                                                    </div>

                                                 
                                                    </td>
                                                    
                                                    <td>
                                                    <a href="<?php echo base_url('about/edit/'.$page->id); ?>" class='btn btn-sm btn-info'>Edit</a>
                                                     <a class="btn red-mint btn-large delete-about " data-aboutId = "<?php echo $page->id; ?>" data-toggle="confirmation" data-original-title="Are you sure ?"
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
                <!-- END CONTENT -->
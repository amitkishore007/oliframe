BEGIN CONTENT -->
                <div class="page-content-wrapper">
                    <!-- BEGIN CONTENT BODY -->
                    <div class="page-content">
                        <!-- BEGIN PAGE HEADER-->
                        <!-- BEGIN PAGE TITLE-->
                        <h1 class="page-title">Home categories</h1>
                        <!-- END PAGE TITLE-->
                        <!-- start  row -->
                       
                        <div class="row">
                            <div class="col-md-12">
                                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                                <div class="portlet light bordered">
                                    <div class="portlet-title">
                                        <div class="caption font-dark">
                                            <i class="icon-settings font-dark"></i>
                                            <span class="caption-subject bold uppercase">Home Categories below slider</span>
                                        </div>
                                        <div class="actions">
                                            <div class="btn-group btn-group-devided">
                                              
                                                <!-- <a href="<?php //echo base_url('category/upload_banner'); ?>" class='btn btn-transparent dark btn-outline btn-circle btn-sm'>Upload a new banner</a> -->
                                            </div>
                                        </div>
                                    </div>

                                    <div class="portlet-body">
                                    <p>These categories will be displayed below home slider</p>
                                        <table class="table table-striped table-bordered table-hover table-header-fixed" id="sample_1">
                                            <thead>
                                                <tr class="">
                                                    <th>S. No.</th>
                                                    <th>Catergory 1</th>
                                                    <th>Catergory 2</th>
                                                    <th>Catergory 3</th>
                                                
                                                </tr>
                                            </thead>
                                            <tbody>

                                           
                                                <tr >
                                                    <td>1</td>
                                                    
                                                    <td>
                                                              <select class="home-category" data-number='1' data-type='one'>
                                                              
                                                                <option value=''>Select category</option>
                                                                  <?php if(isset($categories)): ?>
                                                                        <?php foreach ($categories as $category) : ?>
                                                                                
                                                                             

                                                                                     <option value="<?php echo $category->cat_id; ?>" <?php  echo ($category->type=='one' && $category->cat_number==1) ? 'selected' : ''; ?>><?php echo $category->name; ?></option>
                                                                              
                                                                              
                                                                        <?php endforeach; ?>
                                                                  <?php endif; ?> 
                                                                </select>
                                                     </td>
                                                     <td>
                                                            <select class="home-category" data-number='2' data-type='one'>
                                                              
                                                                <option value=''>Select category</option>
                                                                  <?php if(isset($categories)): ?>
                                                                        <?php foreach ($categories as $category) : ?>
                                                                                <option value="<?php echo $category->cat_id; ?>" <?php  echo ($category->type=='one' && $category->cat_number==2) ? 'selected' : ''; ?>><?php echo $category->name; ?></option>
                                                                        <?php endforeach; ?>
                                                                  <?php endif; ?> 
                                                                </select>
                                                     </td>
                                                     <td>
                                                          <select class="home-category" data-number='3' data-type='one'>
                                                              
                                                                <option value=''>Select category</option>
                                                                  <?php if(isset($categories)): ?>
                                                                        <?php foreach ($categories as $category) : ?>
                                                                                <option value="<?php echo $category->cat_id; ?>" <?php  echo ($category->type=='one' && $category->cat_number==3) ? 'selected' : ''; ?>><?php echo $category->name; ?></option>
                                                                        <?php endforeach; ?>
                                                                  <?php endif; ?> 
                                                                </select>
                                                     </td>
           
                                                </tr>
                                            
                                     
                                            

                                            </tbody>
                                        </table>


                                    </div>
                                </div>
                                <!-- END EXAMPLE TABLE PORTLET-->
                                
                            </div>
                        </div>


                        <!-- end  row -->

                        <div class="row">
                            <div class="col-md-12">
                                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                                <div class="portlet light bordered">
                                    <div class="portlet-title">
                                        <div class="caption font-dark">
                                            <i class="icon-settings font-dark"></i>
                                            <span class="caption-subject bold uppercase">Home Categories below banner</span>
                                        </div>
                                        <div class="actions">
                                            <div class="btn-group btn-group-devided">
                                              
                                                <!-- <a href="<?php //echo base_url('category/upload_banner'); ?>" class='btn btn-transparent dark btn-outline btn-circle btn-sm'>Upload a new banner</a> -->
                                            </div>
                                        </div>
                                    </div>
                                    <div class="portlet-body">
                                    <p>These categories will be displayed below home banners</p>
                                        <table class="table table-striped table-bordered table-hover table-header-fixed" id="sample_1">
                                            <thead>
                                                <tr class="">
                                                    <th>S. No.</th>
                                                    <th>Catergory 1</th>
                                                    <th>Catergory 2</th>
                                                    <th>Catergory 3</th>
                                                
                                                </tr>
                                            </thead>
                                            <tbody>

                                           
                                                <tr >
                                                    <td>1</td>
                                                    
                                                    <td>
                                                              <select class="home-category" data-number='1' data-type='two'>
                                                              
                                                                <option value=''>Select category</option>
                                                                  <?php if(isset($categories)): ?>
                                                                        <?php foreach ($categories as $category) : ?>
                                                                                <option value="<?php echo $category->cat_id; ?>" <?php  echo ($category->type=='two' && $category->cat_number==1) ? 'selected' : ''; ?>><?php echo $category->name; ?></option>
                                                                        <?php endforeach; ?>
                                                                  <?php endif; ?> 
                                                                </select>
                                                     </td>
                                                     <td>
                                                            <select class="home-category" data-number='2' data-type='two'>
                                                              
                                                                <option value=''>Select category</option>
                                                                  <?php if(isset($categories)): ?>
                                                                        <?php foreach ($categories as $category) : ?>
                                                                                <option value="<?php echo $category->cat_id; ?>" <?php  echo ($category->type=='two' && $category->cat_number==2) ? 'selected' : ''; ?>><?php echo $category->name; ?></option>
                                                                        <?php endforeach; ?>
                                                                  <?php endif; ?> 
                                                                </select>
                                                     </td>
                                                     <td>
                                                          <select class="home-category" data-number='3' data-type='two'>
                                                              
                                                                <option value=''>Select category</option>
                                                                  <?php if(isset($categories)): ?>
                                                                        <?php foreach ($categories as $category) : ?>
                                                                                <option value="<?php echo $category->cat_id; ?>" <?php  echo ($category->type=='two' && $category->cat_number==3) ? 'selected' : ''; ?>><?php echo $category->name; ?></option>
                                                                        <?php endforeach; ?>
                                                                  <?php endif; ?> 
                                                                </select>
                                                     </td>
           
                                                </tr>
                                            
                                     
                                            

                                            </tbody>
                                        </table>

                                        
                                    </div>
                                </div>
                                <!-- END EXAMPLE TABLE PORTLET-->
                                
                            </div>
                        </div>
                            
                        

                    </div>
                    <!-- END CONTENT BODY -->
                </div>
                <!-- END CONTENT
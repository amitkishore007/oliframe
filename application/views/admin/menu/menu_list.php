
        <!-- BEGIN CONTENT -->
        <div class="page-content-wrapper">
            <!-- BEGIN CONTENT BODY -->
            <div class="page-content">
                <!-- BEGIN PAGE HEADER-->
                <!-- BEGIN PAGE TITLE-->
                <h1 class="page-title">Manage category
                    
                </h1>
                <!-- END PAGE TITLE-->
               
                <div class="col-md-12">
                    <div class="portlet light bordered">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="icon-social-dribbble font-blue-sharp"></i>
                                <span class="caption-subject font-blue-sharp bold uppercase">Category list</span>
                            </div>
                        
                        </div>
                        <div class="portlet-body category-list">
                            <?php if(isset($categories)): ?>

                                        <?php foreach($categories as $category): ?>
                                                <?php echo $category; ?>
                                        <?php endforeach; ?>

                            <?php endif; ?>
                            
                        </div>
                    </div>
                </div>
                    

            </div>
            <!-- END CONTENT BODY -->
        </div>
        <!-- END CONTENT -->

                <!-- Page Header -->
                <div class="content bg-gray-lighter">
                    <div class="row items-push">
                        <div class="col-sm-7">
                            <h1 class="page-heading">
                                Edit branch <strong><?php echo $branchs->branch_name; ?></strong>
                            </h1>
                        </div>
                        <div class="col-sm-5 text-right hidden-xs">
                            <ol class="breadcrumb push-10-t">
                                <li>branch</li>
                                <li><a class="link-effect" href="">Edit</a></li>
                            </ol>
                        </div>
                    </div>
                </div>
                <!-- END Page Header -->

                <div class="content content-narrow">
                    <!-- Forms Row -->
                    <div class="row">
                        <div class="col-lg-12">
                            <!-- Bootstrap Forms Validation -->
                            <h2 class="content-heading">Edit Branch Information</h2>
                            <div class="block">
                                <!-- <div class="block-header">
                                    <ul class="block-options">
                                        <li>
                                            <button type="button"><i class="si si-settings"></i></button
                                        </li>
                                    </ul>
                                    
                                </div> -->
                                <div class="block-content block-content-narrow">
                                    <!-- jQuery Validation (.js-validation-bootstrap class is initialized in js/pages/base_forms_validation.js) -->
                                    <!-- For more examples you can check out https://github.com/jzaefferer/jquery-validation -->
                                    <?php echo form_open('', ['class'=>'js-validation-bootstrap form-horizontal']); ?>
                                    
                                       <div class="row">
                                                 <div class="col-lg-8">
                                                    <div class="form-group">
                                                        <label class="col-md-4 control-label" for="val-username">Branch Name <span class="text-danger">*</span></label>
                                                        <div class="col-md-7">
                                                            <input class="form-control" type="text" id="inputBranchName" name="inputBranchName" placeholder="Enter branch Name" value="<?php echo $branchs->branch_name; ?>">
                                                        </div>
                                                    </div>   
                                                    <div class="form-group">
                                                        <label class="col-md-4 control-label" for="val-email">Branch Location<span class="text-danger">*</span></label>
                                                        <div class="col-md-7">
                                                            <input class="form-control" type="text" id="inputBranchLocation" name="inputBranchLocation" placeholder="Enter Branch Location" value="<?php echo $branchs->branch_location; ?>">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-4 control-label" for="val-password">Branch Address</label>
                                                        <div class="col-md-7">
                                                            <input class="form-control" type="text" id="inputBranchAddress" name="inputBranchAddress" placeholder="Enter Branch Address" value="<?php echo $branchs->branch_address; ?>">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-4 control-label" for="val-confirm-password">Branch Admin<span class="text-danger">*</span></label>
                                                        <div class="col-md-7">
                                                            <input class="form-control" type="text" id="inputBranchAdmin" name="inputBranchAdmin" placeholder="Enter Branch Admin" value="<?php echo $branchs->branch_admin; ?>">
                                                        </div>
                                                    </div>
                                                </div>                                                  
                                                <div class="form-group">
                                            <div class="col-md-8 col-md-offset-4">
                                                <button class="btn btn-sm btn-primary" type="submit">Edit Submit</button>
                                                <a href="/admin/branch"><button class="btn btn-sm btn-danger" type="button">Cancel</button></a>

                                            </div>
                                        </div> 
                                        </div>
                                                                        
                                        
                                        </div>
                                    <?php echo form_close(); ?>
                                        </div>
                            </div>
                            <!-- Bootstrap Forms Validation -->
                        </div>
                        
                    </div>
                    <!-- END Forms Row -->

                    
                    <!-- END Terms Modal -->
                </div>
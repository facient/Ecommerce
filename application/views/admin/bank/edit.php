                <!-- Page Header -->
                <div class="content bg-gray-lighter">
                    <div class="row items-push">
                        <div class="col-sm-7">
                            <h1 class="page-heading">
                                Edit Bank <strong><?php echo $banks->name; ?></strong>
                            </h1>
                        </div>
                        <div class="col-sm-5 text-right hidden-xs">
                            <ol class="breadcrumb push-10-t">
                                <li>Bank</li>
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
                            <h2 class="content-heading">Edit Bank Information</h2>
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
                                                 <div class="col-lg-9">
                                                    <div class="form-group">
                                                        <label class="col-md-4 control-label" for="val-username">Name <span class="text-danger">*</span></label>
                                                        <div class="col-md-7">
                                                            <input class="form-control" type="text" id="inputBankName" name="inputBankName" placeholder="Enter Bank Name" value="<?php echo $banks->name; ?>">
                                                        </div>
                                                    </div>   
                                                    <div class="form-group">
                                                        <label class="col-md-4 control-label" for="val-email">Branch Name<span class="text-danger">*</span></label>
                                                        <div class="col-md-7">
                                                            <input class="form-control" type="text" id="inputBranchName" name="inputBranchName" placeholder="Enter Branch Name" value="<?php echo $banks->branch_name; ?>">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-4 control-label" for="val-password">Account Number</label>
                                                        <div class="col-md-7">
                                                            <input class="form-control" type="text" id="inputAccountNumber" name="inputAccountNumber" placeholder="Enter Account Number" value="<?php echo $banks->account_no; ?>">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-4 control-label" for="val-confirm-password">Initial Balance<span class="text-danger">*</span></label>
                                                        <div class="col-md-7">
                                                            <input class="form-control" type="text" id="inputInitialBalance" name="inputInitialBalance" placeholder="Enter Initial Balance" value="<?php echo $banks->initial_balance; ?>">
                                                        </div>
                                                    </div>
                                                    

                                                </div>
                                                
                                                    
                                                   
                                                
                                                <div class="form-group">
                                            <div class="col-md-8 col-md-offset-4">
                                                <button class="btn btn-sm btn-primary" type="submit">Edit Submit</button>
                                                <a href="/admin/bank"><button class="btn btn-sm btn-danger" type="button">Cancel</button></a>

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
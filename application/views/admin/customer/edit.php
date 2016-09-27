                <!-- Page Header -->
                <div class="content bg-gray-lighter">
                    <div class="row items-push">
                        <div class="col-sm-7">
                            <h1 class="page-heading">
                                Edit Customer <strong><?php echo $customers->name; ?></strong>
                            </h1>
                        </div>
                        <div class="col-sm-5 text-right hidden-xs">
                            <ol class="breadcrumb push-10-t">
                                <li>Customer</li>
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
                            <h2 class="content-heading">Edit Customer Information</h2>
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
                                    
                                        <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="col-md-4 control-label" for="val-username">Name <span class="text-danger">*</span></label>
                                            <div class="col-md-7">
                                                <input class="form-control" type="text" id="inputName" name="inputName" placeholder="Enter Customer Name" value="<?php echo $customers->name; ?>">
                                            </div>
                                        </div>   
                                        <div class="form-group">
                                            <label class="col-md-4 control-label" for="val-email">Contact Person <span class="text-danger">*</span></label>
                                            <div class="col-md-7">
                                                <input class="form-control" type="text" id="inputContactPerson" name="inputContactPerson" placeholder="Enter Contact Person Name" value="<?php echo $customers->contact_person; ?>">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-4 control-label" for="val-password">Landline Number </label>
                                            <div class="col-md-7">
                                                <input class="form-control" type="text" id="inputLandlineNumber" name="inputLandlineNumber" placeholder="Enter Landline Number" value="<?php echo $customers->landline_no; ?>">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-4 control-label" for="val-confirm-password">Mobile Number <span class="text-danger">*</span></label>
                                            <div class="col-md-7">
                                                <input class="form-control" type="text" id="inputMobileNumber" name="inputMobileNumber" placeholder="Enter Mobile Number" value="<?php echo $customers->mobile_no; ?>">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-4 control-label" for="val-email">Email<span class="text-danger">*</span></label>
                                            <div class="col-md-7">
                                                <input class="form-control" type="email" id="inputEmail" name="inputEmail" placeholder="Enter your valid email.." value="<?php echo $customers->email; ?>">
                                            </div>
                                        </div>
                                          
                                        </div>
                                        <div class="col-lg-6"> 
                                        <div class="form-group">
                                            <label class="col-md-4 control-label" for="val-username">Initial Balance<span class="text-danger">*</span></label>
                                            <div class="col-md-7">
                                                <input class="form-control" type="text" id="inputIntBal" name="inputIntBal" placeholder="Enter Initial Balance" value="<?php echo $customers->initial_balance; ?>">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-4 control-label" for="val-username">GST Number <span class="text-danger">*</span></label>
                                            <div class="col-md-7">
                                                <input class="form-control" type="text" id="inputGST" name="inputGST" placeholder="Enter General Sales Tax Number" value="<?php echo $customers->gst_no; ?>">
                                            </div>
                                        </div>  
                                        <div class="form-group">
                                            <label class="col-md-4 control-label" for="val-username">NTN Number <span class="text-danger">*</span></label>
                                            <div class="col-md-7">
                                                <input class="form-control" type="text" id="inputNTN" name="inputNTN" placeholder="Enter NTN Number" value="<?php echo $customers->ntn_no; ?>">
                                            </div>
                                        </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-8 col-md-offset-4">
                                                <button class="btn btn-sm btn-primary" type="submit">Submit</button>
                                                <a href="/admin/customer"><button class="btn btn-sm btn-danger" type="button">Cancel</button></a>
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
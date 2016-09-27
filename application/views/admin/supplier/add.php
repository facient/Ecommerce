                <!-- Page Header -->
                <div class="content bg-gray-lighter">
                    <div class="row items-push">
                        <div class="col-sm-7">
                            <h1 class="page-heading">
                                Add Supplier
                            </h1>
                        </div>
                        <div class="col-sm-5 text-right hidden-xs">
                            <ol class="breadcrumb push-10-t">
                                <li>Supplier</li>
                                <li><a class="link-effect" href="">Add</a></li>
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
                            <h2 class="content-heading">Add Supplier Information</h2>
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
                                                <input class="form-control" type="text" id="inputName" name="inputName" placeholder="Enter Supplier Name">
                                            </div>
                                        </div>   
                                        <div class="form-group">
                                            <label class="col-md-4 control-label" for="val-email">Contact Person <span class="text-danger">*</span></label>
                                            <div class="col-md-7">
                                                <input class="form-control" type="text" id="inputContactPerson" name="inputContactPerson" placeholder="Enter Contact Person Name">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-4 control-label" for="val-password">Landline Number </label>
                                            <div class="col-md-7">
                                                <input class="form-control" type="password" id="inputLandlineNumber" name="inputLandlineNumber" placeholder="Enter Landline Number">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-4 control-label" for="val-confirm-password">Mobile Number <span class="text-danger">*</span></label>
                                            <div class="col-md-7">
                                                <input class="form-control" type="password" id="inputMobileNumber" name="inputMobileNumber" placeholder="Enter Mobile Number">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-4 control-label" for="val-email">Email<span class="text-danger">*</span></label>
                                            <div class="col-md-7">
                                                <input class="form-control" type="email" id="inputEmail" name="inputEmail" placeholder="Enter your valid email..">
                                            </div>
                                        </div>
                                          
                                        </div>
                                        <div class="col-lg-6"> 
                                        <div class="form-group">
                                            <label class="col-md-4 control-label" for="val-username">Initial Balance<span class="text-danger">*</span></label>
                                            <div class="col-md-7">
                                                <input class="form-control" type="text" id="inputIntBal" name="inputIntBal" placeholder="Enter Initial Balance">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-4 control-label" for="val-username">GST Number <span class="text-danger">*</span></label>
                                            <div class="col-md-7">
                                                <input class="form-control" type="text" id="inputGST" name="inputGST" placeholder="Enter General Sales Tax Number">
                                            </div>
                                        </div>  
                                        <div class="form-group">
                                            <label class="col-md-4 control-label" for="val-username">NTN Number <span class="text-danger">*</span></label>
                                            <div class="col-md-7">
                                                <input class="form-control" type="text" id="inputNTN" name="inputNTN" placeholder="Enter NTN Number">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-4 control-label" for="val-skill">Select User <span class="text-danger">*</span></label>
                                            <div class="col-md-7">
                                                <select class="form-control" id="inputUser" name="inputUser">
                                                    <option value="">Select User</option>
                                                    <option value="1">HTML</option>
                                                    <option value="2">CSS</option>
                                                    <option value="3">Javascript</option>
                                                  
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-4 control-label" for="val-skill">Select Branch <span class="text-danger">*</span></label>
                                            <div class="col-md-7">
                                                <select class="form-control" id="inputBranch" name="inputBranch">
                                                    <option value="">Select Branch</option>
                                                    <option value="1">HTML</option>
                                                    <option value="2">CSS</option>
                                                    <option value="3">Javascript</option>
                                                   
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-4 control-label" for="val-skill">Select Group <span class="text-danger">*</span></label>
                                            <div class="col-md-7">
                                                <select class="form-control" id="inputGroup" name="inputGroup">
                                                    <option value="">Select Group</option>
                                                    <option value="1">HTML</option>
                                                    <option value="2">CSS</option>
                                                    <option value="3">Javascript</option>
                                                   
                                                </select>
                                            </div>
                                        </div>
                                        
                                        
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-8 col-md-offset-4">
                                                <button class="btn btn-sm btn-primary" type="submit">Submit</button>
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
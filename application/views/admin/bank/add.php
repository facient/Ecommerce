                <!-- Page Header -->
                <div class="content bg-gray-lighter">
                    <div class="row items-push">
                        <div class="col-sm-7">
                            <h1 class="page-heading">
                                Add Bank
                            </h1>
                        </div>
                        <div class="col-sm-5 text-right hidden-xs">
                            <ol class="breadcrumb push-10-t">
                                <li>Bank</li>
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
                            <h2 class="content-heading">Add Bank Information</h2>
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
                                                <input class="form-control" type="text" id="inputName" name="inputName" placeholder="Enter Customer Name">
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
                                                <input class="form-control" type="text" id="inputLandlineNumber" name="inputLandlineNumber" placeholder="Enter Landline Number">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-4 control-label" for="val-confirm-password">Mobile Number <span class="text-danger">*</span></label>
                                            <div class="col-md-7">
                                                <input class="form-control" type="text" id="inputMobileNumber" name="inputMobileNumber" placeholder="Enter Mobile Number">
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
                                                    <option value="1">User 1</option>
                                                    <option value="2">User 2</option>
                                                    <option value="3">User 3</option>
                                                  
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-4 control-label" for="val-skill">Select Branch <span class="text-danger">*</span></label>
                                            <div class="col-md-7">
                                                <select class="form-control" id="inputBranch" name="inputBranch">
                                                    <option value="">Select Branch</option>
                                                    <option value="01">Branch 1</option>
                                                    <option value="02">Branch 2</option>
                                                    <option value="03">Branch 3</option>
                                                   
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-4 control-label" for="val-skill">Select Group <span class="text-danger">*</span></label>
                                            <div class="col-md-7">
                                                <select class="form-control" id="inputGroup" name="inputGroup">
                                                    <option value="">Select Group</option>
                                                    <option value="001">Group 1</option>
                                                    <option value="002">Group 2</option>
                                                    <option value="003">Group 3</option>
                                                   
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
                        <<a class="btn btn-primary" data-toggle="modal" href='#modal-id'>Trigger modal</a>
                        <div class="modal fade" id="modal-id">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                        <h4 class="modal-title">Modal title</h4>
                                    </div>
                                    <div class="modal-body">
                                        
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-primary">Save changes</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    
                    <!-- END Terms Modal -->
                </div>

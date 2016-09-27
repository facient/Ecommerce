                <!-- Page Header -->
                <div class="content bg-gray-lighter">
                    <div class="row items-push">
                        <div class="col-sm-7">
                            <h1 class="page-heading">
                                Edit Purchase <strong><?php //echo $customers->name; ?></strong>
                            </h1>
                        </div>
                        <div class="col-sm-5 text-right hidden-xs">
                            <ol class="breadcrumb push-10-t">
                                <li>Purchase</li>
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
                            <h2 class="content-heading">Edit Purcahse Transaction</h2>
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
                                        <pre><?php print_r($edits); ?></pre>
                                        <div class="row">
                                         <div class="col-lg-6">
                                             <div class="form-group">
                                                <label class="col-md-4 control-label" for="example-datepicker1">Date</label>
                                                <div class="col-md-7">
                                                    <input class="js-datepicker form-control" name="inputDate" type="text" 
                                                    id="inputDate" data-date-format="dd/mm/yy" placeholder="dd/mm/yy" required value="<?php echo $edits[0]['date']; ?>">
                                                </div>
                                            </div>  
                                            <div class="form-group">
                                            <label class="col-md-4 control-label" for="example-textarea-input">Description</label>
                                            <div class="col-md-7">
                                                <textarea class="form-control" id="inputDescription" name="inputDescription" rows="3" placeholder="Description" required></textarea>
                                            </div>
                                        </div>           
                                        </div>
                                       <div class="col-lg-6"> 
                                            <div class="form-group">
                                                <?php $suppliers=$this->supplier->view_all_active(); ?>                       
                                                <label class="col-md-4 control-label" for="val-skill">Supplier<span class="text-danger">*</span></label>
                                                <div class="col-md-7">
                                                    <select class="form-control" id="inputSupplier" name="inputSupplier" required>
                                                       <option value="">Select Supplier</option>
                                                      <?php foreach ($suppliers as $supplier): ?>
                                                       <option value="<?php echo $supplier->id; ?>" <?php if ($supplier->id==$edits[0]['supplier_id']):echo "selected";endif ?>><?php echo $supplier->name; ?></option>
                                                        <?php endforeach ?>
                                                   </select>
                                               </div>
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
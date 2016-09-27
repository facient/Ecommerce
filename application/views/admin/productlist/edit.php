                <!-- Page Header -->
                <div class="content bg-gray-lighter">
                    <div class="row items-push">
                        <div class="col-sm-7">
                            <h1 class="page-heading">
                                Edit Product <?php echo $products->name; ?>
                            </h1>
                        </div>
                        <div class="col-sm-5 text-right hidden-xs">
                            <ol class="breadcrumb push-10-t">
                                <li>Product</li>
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
                            <h2 class="content-heading">Edit Product Information</h2>
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
                                                <input class="form-control" type="text" id="itemName" name="inputName" placeholder="Enter Item Name" value="<?php echo $products->name; ?>">
                                            </div>
                                        </div>
                                        <?php $items=$this->item->active_item(); ?>
                                       
                                            
                                          <div class="form-group">
                                            <label class="col-md-4 control-label" for="val-skill">Select Item Category <span class="text-danger">*</span></label>
                                            <div class="col-md-7">
                                                <select class="form-control" id="inputItemCategory" name="inputItemCategory">
                                                    <option value="">Select Category</option>
                                                   <?php foreach ($items as $key=>$value): ?>
                                                       
                                                    <option value="<?php echo $items[$key]->id; ?>"<?php if($items[$key]->id==$products->category_id):echo "selected";endif;?>><?php echo $items[$key]->category_name; ?></option>
                                                   <?php endforeach ?>
                                                   
                                                  
                                                </select>
                                            </div>
                                        </div>   
                                        <div class="form-group">
                                            <label class="col-md-4 control-label" for="val-email">Sale Price<span class="text-danger">*</span></label>
                                            <div class="col-md-7">
                                                <input class="form-control" type="text" id="inputSalePr" name="inputSalePr" placeholder="Enter Sale Price" value="<?php echo $products->price_sale; ?>">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-4 control-label" for="val-password">Cost Price</label>
                                            <div class="col-md-7">
                                                <input class="form-control" type="text" id="inputCostPr" name="inputCostPr" placeholder="Enter Cost Price" value="<?php echo $products->price_cost; ?>">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-4 control-label" for="val-confirm-password">Barcode<span class="text-danger">*</span></label>
                                            <div class="col-md-7">
                                                <input class="form-control" type="text" id="inputBarcode" name="inputBarcode" placeholder="Enter Barcode" value="<?php echo $products->barcode; ?>">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-4 control-label" for="val-confirm-password">Minimum Quantity<span class="text-danger">*</span></label>
                                            <div class="col-md-7">
                                                <input class="form-control" type="text" id="inputMinQnt" name="inputMinQnt" placeholder="Enter Minimum Quantity" value="<?php echo $products->min_quantity; ?>">
                                            </div>
                                        </div>
                                          
                                        </div>
                                        <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="col-md-4 control-label" for="val-confirm-password">Maximum Quantity<span class="text-danger">*</span></label>
                                            <div class="col-md-7">
                                                <input class="form-control" type="text" id="inputMaxQnt" name="inputMaxQnt" placeholder="Enter Maximum Quantity" value="<?php echo $products->max_quantity; ?>">
                                            </div>
                                        </div>
                                         
                                        <div class="form-group">
                                            <label class="col-md-4 control-label" for="val-username">Initial Quantity<span class="text-danger">*</span></label>
                                            <div class="col-md-7">
                                                <input class="form-control" type="text" id="inputIntQnt" name="inputIntQnt" placeholder="Enter Initial Quantity" value="<?php echo $products->initial_quantity; ?>">
                                            </div>
                                        </div>                                        
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-8 col-md-offset-4">
                                                <button class="btn btn-sm btn-primary" type="submit">Edit Product</button>
                                                <a href="/admin/productlist"><button class="btn btn-sm btn-danger" type="button">Cancel</button></a>

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
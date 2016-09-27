
<!-- Start My Page Content -->
<div class="page-content">
          <div class="header">
            <h4><strong>Prouduct</strong></h4>
            <div class="breadcrumb-wrapper">
              <ol class="breadcrumb">
                <li><a href="/admin">Dashboard</a>
                </li>
                <li><a href="/admin/productlist">Prouduct</a>
                </li>
                <li class="active">List</li>
              </ol>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-12 portlets">
              <div class="panel">
                <div class="panel-header panel-controls">
                 <a id="addModalCustomer" href="#Product" data-toggle="modal">
                 <button type="button" class="btn btn-primary push-5-r push-10"><i class="fa fa-plus push-5-r"></i>Add Prouduct</button></a>

                  <?php if ($this->session->flashdata('success')): ?>
                   <div class="alert alert-success" id="successMsg"> <?php echo $this->session->flashdata('success'); ?></div>
               <?php endif ?>

               <div class="alert alert-danger flashdelete" style="display:none"></div>
                </div>
                <div class="panel-content pagination2 table-responsive">
                  <table class="table table-hover table-dynamic" id="mydatatable1">
                    <thead>
                                    <tr>
                                        <th></th>
                                        <th>Name</th>
                                        <th>Price Sale</th>
                                        <th>Price Cost</th>
                                        <th>Barcode</th>
                                        <th>Min_Quantity</th>
                                        <th>Max_Quantity</th>
                                        <th>Initial_Quantity</th>
                                        <th>Status</th>
                                        
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php if ($products): ?>
                                  <?php $count=1; ?>
                                    <?php foreach ($products as $product): ?>
                                        
                                    <tr>
                                        <td><?php echo $count; ?></td>
                                        <td><?php echo $product->name; ?></td>
                                        <td><?php echo $product->price_sale; ?></td>
                                        <td><?php echo $product->price_cost; ?></td>
                                        <td><?php echo $product->barcode; ?></td>
                                        <td><?php echo $product->min_quantity; ?></td>
                                        <td><?php echo $product->max_quantity; ?></td>
                                        <td><?php echo $product->initial_quantity; ?></td>
                                        
                                        <td>
                                         <?php if ($product->status=='Active'):?>
                                            <a class="singleStatus" href="/admin/productlist/status/<?php echo $product->id;  ?>"><span class="label label-primary">Active</span></a>
                                            <?php else: ?>
                                            <a class="singleStatus" href="/admin/productlist/status/<?php echo $product->id; ?>"><span class="label label-danger">Deacitve</span></a>
                                            <?php endif ?>
                                        </td>
                                        <td>
                                            <div class="btn-group">
                                                <a id="<?php echo $product->id; ?>" class="editProduct" data-toggle="modal" href="#Product"> 
                                               <button class="btn btn-xs btn-default" type="button" data-toggle="tooltip" title="Edit Client"><i class="fa fa-pencil"></i></button></a>
                                                <a href="/admin/productlist/delete/<?php echo $product->id; ?>" class="singleDelete"><button class="btn btn-xs btn-default"  type="button" data-toggle="tooltip" title="Remove Client"><i class="fa fa-times"></i></button></a>
                                            </div>
                                        </td>
                                    </tr>
                                    <?php $count++; ?>
                                    <?php endforeach ?>
                                    <?php endif; ?>
                                    
                                </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>         
        </div>
<!-- END My Page Content -->

<!-- Start Add Customer -->

   <div class="modal fade" id="Product" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="dialog" >
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="myModalLabel" ><strong>Add Prouduct</strong></h4>
          <h4 class="modal-title" id="myEditModalLabel" style="display:none;"><strong>Edit Prouduct</strong></h4>
      </div>
      <div class="modal-body">
        <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
         <?php echo form_open('/admin/productlist/add', ['id'=>'validateForm','class'=>'form-validation','novalidate'=>'novalidate']); ?>
          
            <div class="row">
              <div class="col-md-6">
                 <div class="form-group">
                  <?php $items=$this->item->active_item(); ?>
                    <label class="control-label">Select Item Category</label>
                                     
                      <select data-search="true" class="form-control" id="inputItemCategory" name="inputItemCategory" required="">
                        <option value="">Select Category</option>
                           <?php foreach ($items as $item): ?>
                            <option value="<?php echo $item->id; ?>"><?php echo $item->category_name; ?></option>
                           <?php endforeach ?>
                       
                      </select>
                    
                    
                 </div>
                <div class="form-group">
                  <label class="control-label">Item Name</label>
                  <div class="append-icon">
                    <input class="form-control" type="text" id="inputName" name="inputName" 
                    placeholder="Enter Item Name" minlength="3" required="" 
                    aria-required="true">                                
                    <i class="fa fa-tag"></i>
                  </div>
                </div>
            
                <div class="form-group">
                  <label class="control-label">Sale Price</label>
                  <div class="append-icon">
                    <input class="form-control" type="text" id="inputSalePr" 
                    name="inputSalePr" placeholder="Enter Sale Price" minlength="3" required="" aria-required="true">
                    <i class="fa fa-usd"></i>
                  </div>
                </div>
           
            
              
                <div class="form-group">
                  <label class="control-label">Cost Price</label>
                  <div class="append-icon">
                    <input class="form-control" type="text" id="inputCostPr" 
                    name="inputCostPr" placeholder="Enter Cost Price"  
                    required="" aria-required="true">
                    <i class="fa fa-usd"></i>
                  </div>
                </div>                
              </div>  
              <div class="col-sm-6">      
                  <div class="form-group">
                  <label class="control-label">Barcode</label>
                  <div class="append-icon">
                  <input class="form-control" type="text" id="inputBarcode" 
                  name="inputBarcode" placeholder="Enter Barcode Number"  required="" 
                  aria-required="true">
                    <i class="fa fa-code"></i>
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label">Minimum Quantity</label>
                  <div class="append-icon">
                  <input class="form-control" type="text" id="inputMinQnt" 
                  name="inputMinQnt" placeholder="Enter Minimum Quantity"  required="" 
                  aria-required="true">
                    <i class="fa fa-bars"></i>
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label">Maximum Quantity</label>
                  <div class="append-icon">
                  <input class="form-control" type="text" id="inputMaxQnt" 
                  name="inputMaxQnt" placeholder="Enter Maximum Quantity"  required="" 
                  aria-required="true">
                    <i class="fa fa-bars"></i>
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label">Initial Quantity</label>
                  <div class="append-icon">
                  <input class="form-control" type="text" id="inputIntQnt" 
                  name="inputIntQnt" placeholder="Enter Initial Quantity"  required="" 
                  aria-required="true">
                    <i class="fa fa-bars"></i>
                  </div>
                </div>
              </div>
            </div>                       
        
         </div>
         </div>

          <div class="modal-footer">
              <div id="result"></div>
              <button class="btn btn-md btn-primary " type="" id="myAddButton">Add Prouduct</button>
              <button class="btn btn-md btn-primary" type="submit" id="myEditPrdButton" style="display:none;">Edit Prouduct</button>
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
      </div>
  </div>
  </div>
  </div>

    <?php echo form_close(); ?>


<!-- End Add Customer -->


<!-- TESTING MATERIAL -->



<!-- TESTING MATERIAL -->



<!-- Start Add Customer Details-->
    
  <div class="modal fade" id="customerdetail">
      <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                  <h4 class="modal-title"></h4>
              </div>
              <div class="modal-body">
                  <table class="table table-bordered table-hover">
                      <thead>
                          <tr>
                              <th>Landline Number</th>
                              <th>NTN Number</th>
                              <th>GST Number</th>
                              <th>Initial Balance</th>
                             
                          </tr>
                      </thead>
                      <tbody id="addtr">
                     
                      </tbody>
                  </table>
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                  
              </div>
          </div>
      </div>
  </div>

<!-- End  Customer Details-->

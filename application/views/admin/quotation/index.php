<!-- Start My Page Content -->
<div class="page-content">
          <div class="header">
            <h4><strong>Quotation</strong></h4>
            <div class="breadcrumb-wrapper">
              <ol class="breadcrumb">
                <li><a href="/admin">Dashboard</a>
                </li>
                <li><a href="/admin/quotation">Quotation</a>
                </li>
                <li class="active">List</li>
              </ol>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-12 portlets">
              <div class="panel">
                <div class="panel-header panel-controls">
                 <a id="#addtemppurchase" href="#Quotation" data-toggle="modal">
                 <button type="button" class="btn btn-primary push-5-r push-10"><i class="fa fa-plus push-5-r"></i>Add Quotation</button></a>

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
                                <th>Date</th>
                                <th>Customer Name</th>
                                <th>Description</th>                                
                                <th>Details</th>                                
                                <th>Purchase Grand Total</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                             
          
                            <?php $count=1;
                             if (isset($sales)): ?>
                                <?php foreach ($sales as $sale): ?>

                                    <tr id="editRow">
                                        <td><?php echo $count; ?></td>
                                        <td><?php echo date('d-m-Y',strtotime($sale->date)); ?></td>
                                        <td><?php echo $sale->customer_name; ?></td>
                                        <td><?php echo $sale->description; ?></td>                                        
                                        <td><a name="<?php echo $sale->mini_trans_id; ?>" href="sale" data-toggle="modal" class="label label-primary saledet">View Details</a></td>
                                        <td><?php echo $sale->sale_grand_total; ?></td>
                                        <td>
                                            <?php if ($sale->status=='Initial'):?>
                                            <span class="label label-default"><?php echo $sale->status; ?></span>
                                            <?php elseif ($sale->status=='Revised'):?>
                                            <span class="label label-info"><?php echo $sale->status; ?></span>
                                            <?php elseif ($sale->status=='InProcess'):?>
                                            <span class="label label-primary"><?php echo $sale->status; ?></span>
                                            <?php elseif ($sale->status=='Approved'):?>
                                            <span class="label label-success"><?php echo $sale->status; ?></span>
                                            <?php elseif ($sale->status=='Rejected'):?>
                                            <span class="label label-danger"><?php echo $sale->status; ?></span>                                            
                                            <?php else: ?>
                                            <span class="label label-danger">Deacitve</span>
                                            <?php endif ?>
                                        </td>
                                        <td>
                                            <div class="btn-group">                                              
                                               <a href="#editQuotation" data-toggle="modal"> <button name="<?php echo $sale->mini_trans_id; ?>" 
                                               class="btn btn-xs btn-default editQuot" type="button" data-toggle="tooltip" 
                                               title="Edit Client"><i class="fa fa-pencil"></i></button></a>                                               
                                               <a href="/admin/quotation/delete/<?php echo $sale->mini_trans_id; ?>" class="singleDelete">
                                               <button class="btn btn-xs btn-default"  type="button" 
                                               data-toggle="tooltip" title="Remove Client"><i class="fa fa-times"></i></button></a>
                                           </div>
                                       </td>
                                   </tr>
                                   <?php $count++; ?>
                               <?php endforeach; ?>
                           <?php endif; ?>

                       </tbody>
                       </table>
                </div>
              </div>
            </div>
          </div>         
        </div>
<!-- END My Page Content -->
 <!-- Add Quotation Modal -->

       <?php $random= rand(1,999); ?>
        <form action="" method="post" id="validateForm" class="form-validation form-horizontal temptableclassQuot" novalidate="novalidate" >
         <div class="modal fade" id="Quotation" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog modal-lg" role="dialog" >
            <div class="modal-content">
              <div class="modal-header">
               <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
               <h4 class="modal-title" id="myModalLabel" ><strong>Add Quotation</strong></h4>
            </div>
            <div class="modal-body">
                <div class="row">
                 <div class="col-lg-6">
                     <div class="form-group">
                        <label class="col-md-4 control-label" for="example-datepicker1">Date</label>
                        <div class="col-md-7">
                            <input class="b-datepicker form-control" name="inputDate" type="text" 
                            id="inputDate" data-date-format="dd/mm/yy" placeholder="dd/mm/yy" required>
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
                        <?php $customers=$this->customer->view_all(); ?>                       
                        <label class="col-md-4 control-label" for="val-skill">Customer<span class="text-danger">*</span></label>
                        <div class="col-md-7">
                            <select data-search="true" class="form-control" id="inputCustomer" name="inputCustomer" required>
                               <option value="">Select Customer</option>
                              <?php foreach ($customers as $customer): ?>
                               <option value="<?php echo $customer->id; ?>"><?php echo $customer->name; ?></option>
                                <?php endforeach ?>
                           </select>
                       </div>
                   </div> 
                   <div class="form-group">
                      <?php $quot_status=$this->quot_status->view_all(); ?>                       
                      <label class="col-md-4 control-label" for="val-skill">Quotation Status<span class="text-danger">*</span></label>
                      <div class="col-md-7">
                          <select class="form-control" id="inputQuotStatus" name="inputQuotStatus" required>
                             <option value="">Select Status</option>
                            <?php foreach ($quot_status as $status): ?>
                             <option value="<?php echo $status->status; ?>"><?php echo $status->status; ?></option>
                              <?php endforeach ?>
                         </select>
                     </div>
                   </div>               
               </div>
               </div>
                <hr>
            <div class="row">
            <div class="col-sm-12">          
              <div class="panel panel-success">
                  <!-- Default panel contents -->
                  <div class="panel-heading">Add Transaction
                  <button id="addtransaction" style="float:right;" type="button">Add Transaction</button>
                  </div>
                  <div class="panel-body">
                  <div class="block-content">
                      <div class="table-responsive">
                        <table class="table table-responsive" >
                          <thead>                   
                            <tr>
                              <th>id</th>
                              <th style="width:200px;">Item Name</th>
                              <th style="width:100px;">Quantity</th>
                              <th style="width:100px;">Price</th>
                              <th>Total</th>
                              <th>Action</th>
                              
                              </tr>
                          </thead>                      
                          <tbody id="result">                     
                              <?php 
                              $products=$this->productlist->view_all_active();
                             ?>
                           
                            <tr id="addrow" style="display:none;">                                               
                               <td></td>
                               <td>
                              <?php if (isset($products)): ?>
                              <div class="form-group">
                                <div class="col-md-11">
                                  <input name="inputHiddenId" id="inputHiddenId" type="hidden"  value="<?php  echo $random;  ?>">
                                  <select data-search="true" name="inputProduct" id="inputProduct" class="form-control"  onchange="checkvalue()">
                                    <option value="">Select Item</option>
                                    <?php foreach ($products as $product): ?>                                
                                    <option value="<?php echo $product->id; ?>"><?php echo $product->name; ?></option>
                                    <?php endforeach ?>
                                  </select>
                                </div>
                              </div>
                                <?php else: ?>
                              <div class="alert alert-danger">
                                No Item Active!
                              </div>
                              <?php endif ?> 
                              </td>
                              <td>
                              <div class="form-group">                         
                                <div class="col-md-11">
                                  <input id="inputQuantity"  type="number" name="inputQuantity"  
                                  class="form-control"  disabled>
                                </div>
                              </div>
                              </td>
                              <td>
                              <div class="form-group">                         
                                <div class="col-md-11">
                                  <input id="inputPrice" type="number" name="inputPrice"  
                                  class="form-control" disabled>
                                </div>
                              </div>
                              </td>
                              <td>
                              <div class="form-group">                         
                                <div class="col-md-11">
                                  <input id="inputTotal"  type="number" name="inputTotal" class="form-control" readonly>
                                </div>
                              </div>
                              </td>
                              <td>
                                 <a><button id="subsave" disabled  style="margin-bottom:2px;" class="btn btn-xs btn-primary"
                                  type="submit" title="Add Purchase" style="padding-bottom:2px;">Add</button></a>
                                 <a><button id="clearFields" disabled class="btn btn-xs btn-danger" type="button" 
                                 title="Clear Fields">Clear</button></a>                          
                              </td>                      
                            </tr> 
                            <tr id="grandrow" style="display:none">
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td>
                              <div class="form-group">
                              <label class="control-label">Grand Total
                                </label>
                                </div></td>
                              <td>
                                <div class="form-group">                         
                                <div class="col-md-11">
                                  <input id="inputGrand" type="number" name="inputGrand" class="form-control" readonly>
                                </div>
                              </div>
                              </td>
                            </tr>                   
                          </tbody>
                          <?php echo form_close(); ?>
                        </table>
                      </div>
                  </div>                   
              </div>
            </div>
          </div> 
    </div>
    </div>
        <div class="modal-footer">
            <button id="inputAddQuot" disabled  class="btn btn-md btn-primary" type="submit">
            Add Quotation</button>
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
    </div>
  </div>
  </div>

<?php echo form_close(); ?>
<!-- End Add Quotation Modal -->

<!-- Start Edit Quotation Modal -->

    <?php $random1= rand(1,999); ?>
        <form action="" method="post" id="validateForm" class="form-validation form-horizontal" novalidate="novalidate">
         <div class="modal fade" id="editQuotation" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog modal-lg" role="dialog" >
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="editTransitionTitle">Edit Quotation</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                
                 <div class="col-lg-6">
                     <div class="form-group">
                        <label class="col-md-4 control-label" for="example-datepicker1">Date</label>
                        <div class="col-md-7">
                            <input class="b-datepicker form-control" name="inputDate" type="text" 
                            id="inputEditDate" data-date-format="dd/mm/yy" placeholder="dd/mm/yy" required>
                        </div>
                    </div>  
                    <div class="form-group">
                    <label class="col-md-4 control-label" for="example-textarea-input">Description</label>
                    <div class="col-md-7">
                        <textarea class="form-control" id="inputEditDescription" name="inputDescription" rows="3" placeholder="Description" required></textarea>
                    </div>
                </div>           
                </div>
               <div class="col-lg-6"> 
                   <div class="form-group">
                      <?php $customers=$this->customer->view_all(); ?>                       
                      <label class="col-md-4 control-label" for="val-skill">Customer<span class="text-danger">*</span></label>
                      <div class="col-md-7">
                          <select data-search="true" class="form-control" id="inputEditSupplier" name="inputEditSupplier" required>
                             <option value="">Select Customer</option>
                            <?php foreach ($customers as $customer): ?>
                             <option value="<?php echo $customer->id; ?>"><?php echo $customer->name; ?></option>
                              <?php endforeach ?>
                         </select>
                     </div>
                   </div>
                   <div class="form-group">
                      <?php $quot_status=$this->quot_status->view_all(); ?>                       
                      <label class="col-md-4 control-label" for="val-skill">Quotation Status<span class="text-danger">*</span></label>
                      <div class="col-md-7">
                          <select class="form-control" id="inputEditQuotStatus" name="inputEditQuotStatus" required>
                             <option value="">Select Status</option>
                            <?php foreach ($quot_status as $status): ?>
                             <option value="<?php echo $status->status; ?>"><?php echo $status->status; ?></option>
                              <?php endforeach ?>
                         </select>
                     </div>
                   </div>     

               </div>
               </div>
                <hr>
      <div class="row">    
        <div class="panel panel-success">
            <!-- Default panel contents -->
            <div class="panel-heading editAddSale">Add Transaction
            <a class="editaddtransaction"><button style="float:right;" type="button">
            Add Transaction</button></a>
            </div>
            <div class="panel-body">
            <div class="block-content">
                <div class="table-responsive">
                  <table class="table table-hover" >
                    <thead>                   
                      <tr>
                        <th>id</th>
                        <th style="width:200px;">Item Name</th>
                        <th style="width:100px;">Quantity</th>
                        <th style="width:100px;">Price</th>
                        <th>Total</th>
                        <th>Action</th>
                        
                        </tr>
                    </thead>
                    <tbody>
                      <?php 
                          $products=$this->productlist->view_all_active();
                         ?>
                      <tr id="editSaleaddrow" style="display:none">                                               
                         <td></td>
                         <td>
                          <?php if (isset($products)): ?>

                        <div class="form-group">
                          <div class="col-md-11">
                            <input type="hidden" name="inputEditHiddenId" id="inputEditHiddenId" >
                            <select data-search="true" name="inputEditProduct" id="inputEditProduct" class="form-control" required="required" onchange="checkvalueedit()">
                              <option value="">Select Item</option>
                              <?php foreach ($products as $product): ?>                                
                              <option value="<?php echo $product->id; ?>"><?php echo $product->name; ?></option>
                              <?php endforeach ?>
                            </select>
                          </div>
                        </div>
                          <?php else: ?>
                        <div class="alert alert-danger">
                          No Item Active!
                        </div>
                        <?php endif ?> 
                        </td>
                        <td>
                        <div class="form-group">                         
                          <div class="col-md-11">
                            <input id="inputEditQuantity"  type="number" name="inputEditQuantity"  class="form-control" required="required" disabled pattern="" title="">
                          </div>
                        </div>
                        </td>
                        <td>
                        <div class="form-group">                         
                          <div class="col-md-11">
                            <input id="inputEditPrice" type="number" name="inputEditPrice"  class="form-control" required="required" disabled >
                          </div>
                        </div>
                        </td>
                        <td>
                        <div class="form-group">                         
                          <div class="col-md-11">
                            <input id="inputEditTotal"  type="number" name="inputEditTotal" class="form-control" required="required" readonly>
                          </div>
                        </div>
                        </td>
                        <td>
                           <a><button id="editQuotsubsave" disabled  style="margin-bottom:2px;" class="btn btn-xs btn-primary"
                            type="submit" title="Add Purchase" style="padding-bottom:2px;">Add</button></a>
                           <a><button id="EditclearFields" disabled class="btn btn-xs btn-danger" type="button" 
                           title="Clear Fields">Clear</button></a>                          
                        </td>                      
                      </tr>
                      
                    </tbody>                      
                    <tbody id="editSaleresult">
                                                                       
                    </tbody>

                    
                    <?php echo form_close(); ?>
                  </table>
                </div>
            </div>                   
        </div>
      </div>
    </div> 
</div>
        <div class="modal-footer">
            <button id="inputEditQuot" class="btn btn-md btn-primary">
            Update Quotation</button>
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
    </div>
  </div>
  </div>
  

 <?php echo form_close(); ?>

<!-- End Edit Quotation Modal -->

  <!--Start view Quotation Details -->
  <div class="modal fade" id="saledetail">
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
                                        <th>Item Name</th>
                                        <th>Quantity</th>
                                        <th>Price</th>
                                        <th>Total</th>
                                       
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
<!--End view Quotation Details -->


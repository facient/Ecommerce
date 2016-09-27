<!-- Start My Page Content -->
<div class="page-content">
          <div class="header">
            <h4><strong>Receipt</strong></h4>
            <div class="breadcrumb-wrapper">
              <ol class="breadcrumb">
                <li><a href="/admin">Dashboard</a>
                </li>
                <li><a href="/admin/receipt">Receipt</a>
                </li>
                <li class="active">List</li>
              </ol>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-12 portlets">
              <div class="panel">
                <div class="panel-header panel-controls">
                 <a id="inputAddPayment" href="#Receipt" data-toggle="modal">
                 <button type="button" class="btn btn-primary push-5-r push-10"><i class="fa fa-plus push-5-r"></i>Add Receipt</button></a>

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
                                <th  style="display:none;">Supplier name</th>
                                <th>Customer Name</th>
                                <th>Description</th>                                
                                <th>Payment Mode</th>
                                <th  style="display:none;">Supplier Name</th>                                                                
                                <th>Bank</th>                                
                                <th>Cheque Date / Number</th>
                                <th>Cheque Return</th>                                                                                                                        
                                <th>Payment Amount</th>
                                <th>Status</th>
                                <th  style="display:none;">Supplier Name</th>

                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>                            
          
                            <?php $count=1;
                             if (isset($payments)): ?>
                                <?php foreach ($payments as $payment): ?>
                                    <tr id="rowdetail">
                                        <td><?php echo $count; ?></td>
                                        <td><?php echo date('d/m/Y',strtotime($payment->date));?></td>
                                         <td style="display:none;">
                                         <?php echo $payment->customer_id; ?>
                                          
                                        </td>
                                        <td><?php echo $payment->customer_name; ?></td>
                                        <td><?php echo $payment->description; ?></td>                                        
                                        <td><label class="label label-<?php echo ($payment->payment_mode=='bank')?'primary':'success';?>"><?php echo $payment->payment_mode; ?></label></td>
                                        <td style="display:none;">
                                         <?php echo $payment->bank_id; ?></td>
                                        <td><?php echo $payment->bank_name; ?></td>
                                        <?php if ($payment->payment_mode=='bank'): ?>
                                        <td><?php echo date('d/m/Y',strtotime($payment->cheque_date)).'<br>'.
                                        $payment->cheque_no;?></td>
                                        <?php else: ?>
                                        <td> </td>                                            
                                          <?php endif ?>
                                        <td><p class="text-danger">
                                        <?php echo $payment->cheque_return; ?></p></td>                                        
                                        <td><?php echo $payment->payment_amount; ?></td>
                                        <td>
                                            <?php if ($payment->status=='Active'):?>
                                            <a class="singleStatus" href="/admin/payment/status/<?php echo $payment->id;  ?>"><span class="label label-primary">Active</span></a>
                                            <?php else: ?>
                                            <a class="singleStatus" href="/admin/payment/status/<?php echo $payment->id; ?>"><span class="label label-danger">Deacitve</span></a>
                                            <?php endif ?>
                                        </td>
                                        <td style="display:none;">
                                         <?php echo $payment->id; ?>
                                          
                                        </td> 
                                        <td>
                                            <div class="btn-group">                                              
                                               <a href="#Receipt" class="editreceipt" data-toggle="modal"> 
                                               <button name="<?php echo $payment->id; ?>" 
                                                class="btn btn-xs btn-default" type="button" data-toggle="tooltip" 
                                                title="Edit Client"><i class="fa fa-pencil"></i></button></a>                                               
                                               <a href="/admin/payment/delete/<?php echo $payment->id; ?>" 
                                               class="singleDelete"><button class="btn btn-xs btn-default"  
                                               type="button" data-toggle="tooltip">
                                               <i class="fa fa-times"></i></button></a>
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

<!--Start Add Receipt Modal -->

       <?php $random= rand(1,99999); ?>
        <form action="/admin/receipt/add" method="post" id="validateForm" class="form-validation form-horizontal" novalidate="novalidate">       
         <input type="hidden" name="inputHiddenId" id="inputHiddenId" class="form-control" value="<?php echo $random; ?>">
         <input type="hidden" name="inputEditHiddenId" id="inputEditHiddenId" class="form-control" >
         
         <div class="modal fade" id="Receipt" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog modal-lg" role="dialog" >
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Add Receipt</h4>
                <h4 class="modal-title" id="myEditModalLabel" style="display:none;">Edit Receipt</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                 <div class="col-lg-6">
                     <div class="form-group">
                        <label class="col-md-4 control-label" for="example-datepicker1">Date
                        <span class="text-danger">*</span></label>
                        <div class="col-md-7">
                            <input class="b-datepicker form-control" name="inputDate" type="text" 
                            id="inputDate" data-date-format="dd/mm/yy" placeholder="dd/mm/yy" required>
                        </div>
                    </div>  
                    <div class="form-group">
                    <label class="col-md-4 control-label" for="example-textarea-input">Description
                    <span class="text-danger">*</span></label>
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
                            <select data-search="true" class="form-control" id="inputSupplier" name="inputSupplier" required>
                               <option value="">Select Customer</option>
                              <?php foreach ($customers as $customer): ?>
                               <option value="<?php echo $customer->id; ?>"><?php echo $customer->name; ?></option>
                                <?php endforeach ?>
                           </select>
                       </div>
                   </div>                
               </div>
                <div class="col-lg-6"> 
                    <div class="form-group">                        
                        <label class="col-md-4 control-label" for="val-skill">Payment Mode<span class="text-danger">*</span></label>
                        <div class="col-md-7">
                            <select class="form-control" id="inputPaymentMode" name="inputPaymentMode" required onchange="payment_mode()">
                               <option value="">Select Payment Mode</option>                              
                               <option value="cash">Cash</option>
                               <option value="bank">Bank</option>
                                
                           </select>
                       </div>
                   </div>                
               </div>
               </div>
                <hr>
      <div class="row">
        <div class="col-sm-12">
        <!--Start Cash Tab  -->
        <div id="divCash" style="display:none;">    
        <div class="panel panel-success">
            <!-- Default panel contents -->
            <div class="panel-heading"><strong>Add Cash Transaction</strong></div>
            <div class="panel-body">
            <div class="block-content">
               <div class="row">                
                <div class="col-lg-6">             
                 <div class="form-group">
                  <label class="col-md-4 control-label" for="val-username">Amount</label>
                    <div class="col-md-7">
                      <input class="form-control valid" type="number" id="inputCash" 
                      name="inputCash" placeholder="Enter Cash Amount" 
                      aria-required="true" aria-invalid="false" aria-describedby="val-username-error">
                    </div>
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="form-group">                                     
                     <div class="col-lg-5" style="margin-top: 8px;">
                       <label>
                      <input type="checkbox" name="inputStatus" id="inputStatus" value="Active" data-checkbox="icheckbox_square-blue"> Post</label>
                    </div>
                    <div class="col-lg-1">                      
                    </div>
                    </div>
                </div>
               </div>
            </div>                   
        </div>
      </div>
      </div>
      <!--End Cash Tab  -->

      <!--Start Bank Tab  -->

        <div id="divBank" style="display:none;">    
        <div class="panel panel-success">
            <!-- Default panel contents -->
            <div class="panel-heading"><strong>Add Bank Transaction</strong></div>
            <div class="panel-body">
            <div class="block-content">
                <div class="row">
                  <div class=" col-lg-6">
                   <div class="form-group">
                      <label class="col-md-4 control-label" for="val-skill">Bank 
                      <span class="text-danger">*</span></label>
                      <div class="col-md-7">
                            <?php $banks=$this->bank->view_all_active(); ?>
                          <select data-search="true" class="form-control valid" id="inputBank" name="inputBank" 
                            aria-required="true" aria-invalid="false" 
                            aria-describedby="val-skill-error" >
                              <option value="">Please Select Bank</option>                              
                              <?php foreach ($banks as $bank): ?>
                              <option value="<?php echo $bank->id; ?>"><?php echo $bank->name; ?></option>
                                
                              <?php endforeach ?>
                              
                          </select>
                      </div>
                  </div>
                     <div class="form-group">
                        <label class="col-md-4 control-label" for="example-datepicker1">Date
                        <span class="text-danger">*</span></label>
                        <div class="col-md-7">
                            <input class="b-datepicker form-control" name="inputChequeDate" type="text" 
                            id="inputChequeDate" data-date-format="dd/mm/yy" placeholder="Enter Cheque Date" >
                        </div>
                    </div> 

                    <div class="form-group">
                    <label class="col-md-4 control-label" for="val-username">Amount<span class="text-danger">*</span></label>
                    <div class="col-md-7">
                      <input class="form-control valid" type="number" id="inputBankCash" 
                      name="inputBankCash"  placeholder="Enter Cash Amount" 
                      aria-required="true" aria-invalid="false" aria-describedby="val-username-error">
                    </div>
                  </div> 
                  </div>
                  <div class="col-lg-6">
                    <div class="form-group">
                    <label class="col-md-4 control-label" for="val-username">Cheque Number<span class="text-danger">*</span></label>
                    <div class="col-md-7">
                      <input class="form-control valid" type="number" id="inputChequeNumber" 
                      name="inputChequeNumber"  placeholder="Enter Cheque Number" 
                      aria-required="true" aria-invalid="false" aria-describedby="val-username-error">
                    </div>
                  </div>
                    <div class="form-group">
                    <div class="col-lg-5">
                      <label class="css-input css-checkbox css-checkbox-primary">
                          <input name="inputChequeReturn" id="inputChequeReturn" type="checkbox"
                          value="return" data-checkbox="icheckbox_square-blue"><span></span> Cheque Return
                      </label>
                    </div>
                   <!--  <div class="col-lg-1">                      
                                      </div> -->                   
                  </div>
                    <div class="form-group">                                     
                     <div class="col-lg-5">
                      <label class="css-input css-checkbox css-checkbox-primary">
                          <input name="inputBankStatus" id="inputBankStatus" type="checkbox" value="Active" data-checkbox="icheckbox_square-blue" >
                          <span></span> Post
                      </label>
                    </div>
                    <div class="col-lg-1">                      
                    </div>
                    </div>

                  </div>

                 
                </div>
            </div>                   
        </div>
      </div>
      </div>
      <!--End Bank Tab  -->

    </div> 
    </div> 
    </div>
      <div class="modal-footer">
        <div class="row">
         <div class="col-sm-12"> 
          <div id="responseResult" class="col-lg-6">
          
          </div>
         <div class="col-lg-6">
           <div style="float:right;">
            <button id="inputAddPaymentButton" class="btn btn-md btn-primary" type="submit">
            Add Receipt</button>
            <button id="inputEditReceiptButton" class="btn btn-md btn-primary" type="submit" style="display:none;">
            Update Receipt</button>
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
           </div>
          </div>
         </div>
        </div>
      </div>
    </div>
  </div>
  </div>


  <?php echo form_close(); ?>
  <!-- End Add Receipt Modal -->
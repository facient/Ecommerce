
<!-- Start My Page Content -->
<div class="page-content">
          <div class="header">
            <h4><strong>Account Receivable Report</strong></h4>
            <div class="breadcrumb-wrapper">
              <ol class="breadcrumb">
                <li><a href="/admin">Dashboard</a>
                </li>
                <li><a href="/admin/reports">Report</a>
                </li>
                <li class="active">Account Receivable Report</li>
              </ol>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-12 portlets">
              <div class="panel">
                <div class="panel-header">
                <div class="row">
                <div class="col-sm-2"></div>
                  <div class="col-sm-8">                  
                    <div class="plan-header bg-primary">
                    <?php 
                     $initialBal=$this->customer->view_by('48');
                     $initialBalCus=$initialBal->initial_balance;
      
                     ?>
                      <div class="title"><h2 id="openBody">Initial Balance:&nbsp; &nbsp;<?php echo (isset($openingBal))?  $openingBal: $initialBalCus; ?></h2></div>                      
                                           
                    </div>
                  </div>
                <div class="col-sm-2"></div>    
                </div>
               <div class="alert alert-danger flashdelete" style="display:none"></div>
                  <form id="validateForm" action="#" method="POST" class="form-validation" novalidate="novalidate">
                  <div class="row">                    
                     <div class="col-sm-4">
                      <div class="form-group">
                        <?php $customers=$this->customer->view_all(); ?>                       
                        <label class="control-label">Customer</label>
                        <div class="option-group">
                            <select data-search="true" class="form-control" id="inputCustomer" name="inputCustomer" required>
                               <option value="">Select Customer</option>
                              <?php foreach ($customers as $customer): ?>
                               <option value="<?php echo $customer->id; ?>" <?php echo($customer->id=='48')?'selected':null; ?>><?php echo $customer->name; ?></option>
                                <?php endforeach ?>
                           </select>
                       </div>
                   </div>   
                    </div>                                    
                    <div class="col-sm-2">
                      <div class="form-group">
                          <label class="control-label">User</label>
                          <div class="append-icon">
                            <input type="text" name="inputUser" id="inputUser"  class="form-control"  placeholder="" >
                            <i class="icon-user"></i>
                          </div>
                        </div>
                    </div>
                     <div class="col-sm-2">
                      <div class="form-group">
                        <label class="control-label">&nbsp;</label>
                        <br>
                        <button type="submit" id ="searchBtnAccountReceivable" class="btn btn-embossed btn-primary">Search</button>
                      </div>
                    </div>
                  </div>
                </form>  
                </div>
                <div class="panel-content">
                <div class="filter-left">
                  
                  <table class="table table-reponsive" id="mydatatable2">
                    <thead>
                            <tr>
                                <th></th>                                
                                <th>Customer ID</th>                                
                                <th>Customer Name</th>                                
                                <th>Receivable</th>
                                <th>User</th>
                                <th>Details</th>
                               
                            </tr>
                        </thead>
                    <tbody id="reportBody">      
                        <?php $count=1;
                         if ($purchases!=false): ?>
                           
                            <?php foreach ($purchases as $purchase): ?>


                                <tr id="editRow">
                                    <td><?php echo $count; ?></td>
                                    
                                    <td><?php echo $purchase->customer_id; ?></td>                                    
                                    <td><?php echo $purchase->customer_name; ?></td>  
                                    <td><?php $initialQuantity=$this->customer->view_by($purchase->customer_id); 
                                        $receivable= ($initialQuantity->initial_balance+$purchase->st)-$purchase->rt;
                                        echo $receivable;
                                    ?>
                                    </td>                                      
                                   
                                   
                                   
                                    <td><?php echo $purchase->user_id; ?></td>
                                    <td>
                                    <a name="<?php echo $purchase->customer_id; ?>" 
                                    id="<?php echo $purchase->transaction; ?>" 
                                    href="#<?php echo ($purchase->transaction=='purchase')?'secondDetails':($purchase->transaction=='sales')?'secondDetails':
                                    ($purchase->transaction=='quotation')?'secondDetails':'secondDetails'; ?>" 
                                    data-toggle="modal" class="label label-primary accountreportDetails">View Details</a>
                                    </td></tr>
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
        </div>
<!-- END My Page Content -->


<!--Start view Details -->
  <div class="modal fade" id="secondDetails">
    <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              <h4 class="modal-title" id="secondmodaltranstitle"></h4>
          </div>
          <div class="modal-body">
              <table class="table table-bordered table-hover">
                  <thead>
                      <tr>
                          <th>Date</th>
                          <th>Transaction</th>
                          <th>Grand Total</th>
                          
                         
                      </tr>
                  </thead>
                  <tbody id="secondaddtr">
                     
                  </tbody>
              </table>
          </div>
          <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              
          </div>
      </div>
   </div>
  </div>
<!--End view Details -->



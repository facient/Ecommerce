
<!-- Start My Page Content -->
<div class="page-content">
          <div class="header">
            <h4><strong>Payment and Receipt Reports</strong></h4>
            <div class="breadcrumb-wrapper">
              <ol class="breadcrumb">
                <li><a href="/admin">Dashboard</a>
                </li>
                <li><a href="/admin/reports/payment_receipt">Payment and Receipt Reports</a>
                </li>
                <li class="active">List</li>
              </ol>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-12 portlets">
              <div class="panel">
                <div class="panel-header">
                
                  <?php if ($this->session->flashdata('success')): ?>
                   <div class="alert alert-success" id="successMsg"> <?php echo $this->session->flashdata('success'); ?></div>
               <?php endif ?>
                <?php //print_r($details); ?>
               <div class="alert alert-danger flashdelete" style="display:none"></div>
                  <form id="validateForm" action="#" method="POST" class="form-validation" novalidate="novalidate">
                  <div class="row">
                    <div class="col-sm-4">
                       <label class="form-label">Date Range</label>
                        <div class="input-daterange b-datepicker input-group" id="datepicker">
                            <input type="text"  class="input-md form-control"  id="inputStartDate" name="inputStartDate" placeholder="From..." />
                            <span class="input-group-addon">to</span>
                            <input type="text" class="input-md form-control" id="inputEndDate" name="inputEndDate" placeholder="To ..."/>
                        </div>  
                    </div>
                     <div class="col-sm-2">
                      <div class="form-group">
                          <label class="control-label">Transaction ID</label>
                          <div class="append-icon">
                            <input type="text" id="inputTransId" name="inputTransId" class="form-control"  placeholder="" >
                            <i class="icon-user"></i>
                          </div>
                        </div>
                    </div>
                    <div class="col-sm-2">
                      <div class="form-group">
                          <label class="control-label">Transaction</label>
                          <div class="option-group">
                            <select id="inputTransType" name="inputTransType"  required>
                              <option value="">Transaction</option>
                              <option value="payment">Payment</option>
                              <option value="receipt">Receipt</option>
                             
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
                        <button type="submit" id ="searchBtnPR" class="btn btn-embossed btn-primary">Search</button>
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
                                <th>ID</th>
                                <th>Date</th>
                                <th>Supplier/ Customer Name</th>
                                <th>Description</th>                                
                                <th>Details</th>
                                <th>Transaction</th>                                
                                <th>Grand Total</th>
                                <th>Status</th>
                               
                            </tr>
                        </thead>
                    <tbody id="reportBody">      
                        <?php $count=1;
                         if ($purchases!=false): ?>
                            <?php foreach ($purchases as $purchase): ?>


                                <tr id="editRow">
                                    <td><?php echo $count; ?></td>
                                    <td><?php echo $purchase->mini_trans_id; ?></td>
                                    <td><?php echo date('d/m/Y', strtotime($purchase->date)); ?></td>
                                    <td><?php echo $purchase->supplier_name; ?></td>
                                    <td><?php echo $purchase->description; ?></td>                                        
                                     <td>
                                    <a name="<?php echo $purchase->mini_trans_id; ?>" 
                                    id="<?php echo $purchase->transaction; ?>" 
                                    href="#<?php echo ($purchase->transaction=='purchase')?'Details':($purchase->transaction=='sales')?'Details':
                                    ($purchase->transaction=='quotation')?'Details':'Detail'; ?>" 
                                    data-toggle="modal" class="label label-primary reportDetails">View Details</a></td>
                                    <td>
                                    <?php if($purchase->transaction=='payment'): ?>
                                    <span class="label label-info">Payment</span>
                                     <?php elseif($purchase->transaction=='receipt'): ?>
                                    <span class="label label-warning">Receipt</span>
                                    <?php endif; ?>
                                    </td>  
                                    <td><?php echo $purchase->payment_amount; ?></td>
                                    
                                    <td>
                                        <?php if ($purchase->status=='Active'):?>
                                        <span class="label label-primary">Active</span>
                                       <?php else: ?>
                                        <span class="label label-danger">Deacitve</span>
                                        <?php endif ?>
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
        </div>
<!-- END My Page Content -->




 


<!--Start view Details -->
  <div class="modal fade" id="Detail">
    <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              <h4 class="modal-title" id="modaltranstitles"></h4>
          </div>
          <div class="modal-body">
              <table class="table table-bordered table-hover">
                  <thead>
                      <tr>
                         <th>Transaction Type</th>
                          <th>Payment Mode</th>
                          <th>Payment Amount</th>                         
                      </tr>
                  </thead>
                  <tbody id="addtrs">
                     
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


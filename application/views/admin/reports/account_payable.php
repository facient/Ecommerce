
<!-- Start My Page Content -->
<div class="page-content">
          <div class="header">
            <h4><strong>Account Payable Report</strong></h4>
            <div class="breadcrumb-wrapper">
              <ol class="breadcrumb">
                <li><a href="/admin">Dashboard</a>
                </li>
                <li><a href="/admin/reports">Report</a>
                </li>
                <li class="active">Account Payable Report</li>
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
                      <div class="title"><h2 id="openBody">Initial Balance:&nbsp; &nbsp;<?php echo (isset($openingBal))?  $openingBal: null; ?></h2></div>                      
                                           
                    </div>
                  </div>
                <div class="col-sm-2"></div>    
                </div>
               <div class="alert alert-danger flashdelete" style="display:none"></div>
                  <form id="validateForm" action="#" method="POST" class="form-validation" novalidate="novalidate">
                  <div class="row">
                  
                     <div class="col-sm-4">
                      <div class="form-group">
                        <?php $suppliers=$this->supplier->view_all(); ?>                       
                        <label class="control-label">Supplier</label>
                        <div class="option-group">
                            <select data-search="true" class="form-control" id="inputSupplier" name="inputSupplier" required>
                               <option value="">Select Supplier</option>
                              <?php foreach ($suppliers as $supplier): ?>
                               <option value="<?php echo $supplier->id; ?>" <?php echo($supplier->id=='50')?'selected':null; ?>><?php echo $supplier->name; ?></option>
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
                        <button type="submit" id ="searchBtnAccountPayable" class="btn btn-embossed btn-primary">Search</button>
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
                                <th>Supplier ID</th>                                
                                <th>Supplier Name</th>                                
                                <th>Payable</th>
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
                                    
                                    <td><?php echo $purchase->supplier_id; ?></td>                                    
                                    <td><?php echo $purchase->supplier_name; ?></td>  
                                    <td><?php $initialQuantity=$this->supplier->view_by($purchase->supplier_id); 
                                        $payable= ($initialQuantity->initial_balance+$purchase->pt)-$purchase->payt;
                                        echo $payable;
                                    ?>
                                    </td>                                      
                                   
                                   
                                   
                                    <td><?php echo $purchase->user_id; ?></td>
                                    <td><a name="<?php echo $purchase->mini_trans_id; ?>" href="purchase" data-toggle="modal" class="label label-primary purchasedet">View Details</a></td>
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
  <div class="modal fade" id="purchasedetail">
    <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              <h4 class="modal-title" id="modaltranstitle"></h4>
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
<!--End view Details -->


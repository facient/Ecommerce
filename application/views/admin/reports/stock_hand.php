
<!-- Start My Page Content -->
<div class="page-content">
          <div class="header">
            <h4><strong>Stock In Hand Report</strong></h4>
            <div class="breadcrumb-wrapper">
              <ol class="breadcrumb">
                <li><a href="/admin">Dashboard</a>
                </li>
                <li><a href="/admin/reports">Report</a>
                </li>
                <li class="active">Stock In Hand</li>
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
                       <label class="form-label">Date Range</label>
                        <div class="input-daterange b-datepicker input-group" id="datepicker">
                            <input type="text"  class="input-md form-control"  id="inputStartDate" name="inputStartDate" placeholder="From..." value="<?php echo date('01-m-Y'); ?>" />
                            <span class="input-group-addon">to</span>
                            <input type="text" class="input-md form-control" id="inputEndDate" name="inputEndDate" placeholder="To ..." value="<?php echo date('t-m-Y'); ?>" />
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
                        <button type="submit" id ="searchBtnStockHand" class="btn btn-embossed btn-primary">Search</button>
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
                                <th>Item ID</th>                                
                                <th>Item Name</th>                                
                                <th>Initial Quantity</th>                                
                                <th>Purchase Quantity</th>
                                <th>Sale Quantity</th>
                                <th>Current Quantity</th>
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
                                    
                                    <td><?php echo $purchase->item_id; ?></td>                                    
                                    <td><?php echo $purchase->item_name; ?></td>  
                                    <td><?php $initialQuantity=$this->productlist->view_by($purchase->item_id); 
                                        echo $initialQuantity->initial_quantity;
                                    ?></td>                                      
                                   
                                    <td>
                                        <?php echo $purchase->pq; ?>
                                    </td>
                                   
                                
                                  <td>
                                        <?php echo $purchase->sq; ?>                                    
                                  </td>  
                                  
                                  
                                   
                                    <td>
                                    <?php echo $initialQuantity->initial_quantity+=$purchase->pq-$purchase->sq; ?>                                        
                                    </td>
                                   
                                    <td><?php echo $purchase->user_id; ?></td>
                                    <td>
                                    <a name="<?php echo $purchase->item_id; ?>" 
                                    id="<?php echo $purchase->transaction; ?>" 
                                    href="#<?php echo ($purchase->transaction=='purchase')?'secondDetails':($purchase->transaction=='sales')?'secondDetails':
                                    ($purchase->transaction=='quotation')?'secondDetails':'secondDetails'; ?>" 
                                    data-toggle="modal" class="label label-primary secondreportDetails">View Details</a>
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
                          <th>Quantity</th>
                          <th>Price</th>
                         
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


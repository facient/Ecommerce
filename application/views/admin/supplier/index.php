
<!-- Start My Page Content -->
<div class="page-content">
          <div class="header">
            <h4><strong>Supplier</strong></h4>
            <div class="breadcrumb-wrapper">
              <ol class="breadcrumb">
                <li><a href="/admin">Dashboard</a>
                </li>
                <li><a href="/admin/supplier">Supplier</a>
                </li>
                <li class="active">List</li>
              </ol>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-12 portlets">
              <div class="panel">
                <div class="panel-header panel-controls">
                 <a id="addModalCustomer" href="#addcustomer" data-toggle="modal">
                 <button type="button" class="btn btn-primary push-5-r push-10"><i class="fa fa-plus push-5-r"></i>Add Supplier</button></a>

                  <?php if ($this->session->flashdata('success')): ?>
                   <div class="alert alert-success" id="successMsg"> <?php echo $this->session->flashdata('success'); ?></div>
               <?php endif ?>

               <div class="alert alert-danger flashdelete" style="display:none"></div>
                </div>
                <div class="panel-content pagination2 table-responsive">
                  <table class="table table-hover table-dynamic" id="mydatatable1">
                    <thead>
                        <tr>
                            <th>S.No</th>
                            <th>Name</th>
                            <th>Contact Person</th>
                            <th>Mobile Number</th>
                            <th>More Details</th>                               
                            <th>Email</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                            <?php if (isset($customers)): ?>
                              <?php $count=1; ?>
                                <?php foreach ($customers as $customer): ?>

                                    <tr id="editRow">
                                        <td><?php echo $count; ?></td>
                                        <td><?php echo $customer->name; ?></td>
                                        <td><?php echo $customer->contact_person; ?></td>
                                        <td><?php echo $customer->mobile_no; ?></td>
                                        <td>
                                        <a name="<?php echo $customer->id; ?>" href="#supplierdetail"  class="label label-primary supplierdet" 
                                        data-toggle="modal" >View Details</a></td>
                                        
                                        <td><?php echo $customer->email; ?></td>
                                        <td>
                                            <?php if ($customer->status=='Active'):?>
                                            <a class="singleStatus"  href="/admin/supplier/status/<?php echo $customer->id ?>">
                                            <span class="label label-primary">Active</span></a>
                                            <?php else: ?>
                                            <a class="singleStatus" href="/admin/supplier/status/<?php echo $customer->id ?>">
                                            <span class="label label-danger">Deacitve</span></a>
                                            <?php endif ?>
                                        </td>
                                        <td>
                                            <div class="btn-group">
                                             
                                               <a id="<?php echo $customer->id; ?>" class="editSupplier" data-toggle="modal" href="#addcustomer">
                                              <button class="btn btn-xs btn-primary" type="button" title="Edit Client">
                                               <i class="fa fa-pencil"></i></button></a>
                                             
                                               <a href="/admin/supplier/delete/<?php echo $customer->id; ?>" class="singleDelete">
                                               <button class="btn btn-xs btn-danger"  type="button" 
                                               title="Remove Record"><i class="fa fa-times"></i></button></a>
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

   <div class="modal fade" id="addcustomer" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="dialog" >
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="myModalLabel" ><strong>Add Supplier</strong></h4>
          <h4 class="modal-title" id="myEditModalLabel" style="display:none;"><strong>Edit Supplier</strong></h4>
      </div>
      <div class="modal-body">
        <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
         <?php echo form_open('/admin/supplier/add', ['id'=>'validateForm','class'=>'form-validation','novalidate'=>'novalidate']); ?>
          
            <div class="row">
              <div class="col-md-6">

                <div class="form-group">
                  <label class="control-label">Name</label>
                  <div class="append-icon">
                    <input class="form-control" type="text" id="inputName" name="inputName" placeholder="Enter Customer Name" minlength="3" required="" aria-required="true">                                
                    <i class="fa fa-user"></i>
                  </div>
                </div>
            
                <div class="form-group">
                  <label class="control-label">Contact Person</label>
                  <div class="append-icon">
                    <input class="form-control" type="text" id="inputContactPerson" name="inputContactPerson" placeholder="Enter Contact Person Name" minlength="3" required="" aria-required="true">
                    <i class="fa fa-user"></i>
                  </div>
                </div>
           
            
              
                <div class="form-group">
                  <label class="control-label">Landline Number</label>
                  <div class="append-icon">
                    <input class="form-control" type="text" id="inputLandlineNumber" name="inputLandlineNumber" placeholder="Enter Landline Number"  required="" aria-required="true">
                    <i class="fa fa-phone-square"></i>
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label">Mobile Number</label>
                  <div class="append-icon">
                  <input class="form-control" type="text" id="inputMobileNumber" name="inputMobileNumber" placeholder="Enter Mobile Number"  required="" aria-required="true">
                    <i class="fa fa-mobile-phone"></i>
                  </div>
                </div>


                <div class="form-group">
                  <label class="control-label">Email</label>
                  <div class="append-icon">
                  <input class="form-control" type="email" id="inputEmail" name="inputEmail" placeholder="Enter Customer Email" minlength="3" required="" aria-required="true">
                    <i class="fa fa-envelope"></i>
                  </div>
                </div>
              </div>  
              <div class="col-sm-6">      
                <div class="form-group">
                  <label class="control-label">Initial Balance</label>
                  <div class="append-icon">
                  <input class="form-control" type="text" id="inputIntBal" name="inputIntBal" placeholder="Enter Initial Balance"  required="" aria-required="true">
                    <i class="fa fa-calculator"></i>
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label">GST Number</label>
                  <div class="append-icon">
                  <input class="form-control" type="text" id="inputGST" name="inputGST" placeholder="Enter GST Number"  required="" aria-required="true">
                    <i class="fa fa-calculator"></i>
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label">NTN Number</label>
                  <div class="append-icon">
                  <input class="form-control" type="text" id="inputNTN" name="inputNTN" placeholder="Enter NTN Number"  required="" aria-required="true">
                    <i class="fa fa-calculator"></i>
                  </div>
                </div>
              </div>
            </div>                       
        
         </div>
         </div>

          <div class="modal-footer">
              <div id="result"></div>
              <button class="btn btn-md btn-primary " type="submit" id="myAddButton">Add Supplier</button>
              <button class="btn btn-md btn-primary"  id="myEditSupButton" style="display:none;">Edit Supplier</button>
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



<!-- Start Add Supplier Details-->
    
  <div class="modal fade" id="supplierdetail">
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

<!-- End  Supplier Details-->

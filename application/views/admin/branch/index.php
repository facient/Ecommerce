
<!-- Start My Page Content -->
<div class="page-content">
          <div class="header">
            <h4><strong>Branch</strong></h4>
            <div class="breadcrumb-wrapper">
              <ol class="breadcrumb">
                <li><a href="/admin">Dashboard</a>
                </li>
                <li><a href="/admin/branch">Branch</a>
                </li>
                <li class="active">List</li>
              </ol>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-12 portlets">
              <div class="panel">
                <div class="panel-header panel-controls">
                 <a id="addModalCustomer" href="#Branch" data-toggle="modal">
                 <button type="button" class="btn btn-primary push-5-r push-10"><i class="fa fa-plus push-5-r"></i>Add Branch</button></a>

                  <?php if ($this->session->flashdata('success')): ?>
                   <div class="alert alert-success" id="successMsg"> <?php echo $this->session->flashdata('success'); ?></div>
               <?php endif ?>

               <div class="alert alert-danger flashdelete" style="display:none"></div>
                </div>
                <div class="panel-content pagination2 table-responsive">
                  <table class="table table-hover table-dynamic" id="mydatatable1">
                   <thead>
                            <tr>
                                <th class="text-center"  style="width: 10%;"></th>
                                <th  style="width: 15%;">Branch Name</th>
                                <th>Branch Location</th>
                                <th>Branch Address</th>
                                <th>Branch Admin</th>
                                <th class="hidden-xs" style="width: 15%;">Status</th>
                                <th class="text-center" style="width: 10%;">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (isset($branchs)): ?>
                              <?php $count=1; ?>
                                <?php foreach ($branchs as $branch): ?>

                                    <tr id="editRow">
                                        <td class="text-center"><?php echo $count; ?></td>
                                        <td class="font-w600"><?php echo $branch->branch_name; ?></td>
                                        <td class="font-w600"><?php echo $branch->branch_location; ?></td>
                                        <td class="font-w600"><?php echo $branch->branch_address; ?></td>
                                        <td class="font-w600"><?php echo $branch->branch_admin; ?></td>
                                        
                                        <td class="hidden-xs">
                                             <?php if ($branch->status=='Active'):?>
                                            <a class="singleStatus" href="/admin/branch/status/<?php echo $branch->id;  ?>"><span class="label label-primary">Active</span></a>
                                            <?php else: ?>
                                            <a class="singleStatus" href="/admin/branch/status/<?php echo $branch->id; ?>"><span class="label label-danger">Deacitve</span></a>
                                            <?php endif ?>
                                        </td>
                                        <td class="text-center">
                                            <div class="btn-group">
                                                <a id="<?php echo $branch->id; ?>" class="editBranch" data-toggle="modal" href="#Branch"> <button class="btn btn-xs btn-default" type="button" data-toggle="tooltip" title="Edit Client"><i class="fa fa-pencil"></i></button></a>
                                               
                                               <a href="/admin/branch/delete/<?php echo $branch->id; ?>" class="singleDelete"><button class="btn btn-xs btn-default"  type="button" data-toggle="tooltip" title="Remove Client"><i class="fa fa-times"></i></button></a>
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

<!-- Start Add Bank -->

   <div class="modal fade" id="Branch" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="dialog" >
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="myModalLabel" ><strong>Add Bank</strong></h4>
          <h4 class="modal-title" id="myEditModalLabel" style="display:none;"><strong>Edit Bank</strong></h4>
      </div>
      <div class="modal-body">
        <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
         <?php echo form_open('/admin/branch/add', ['id'=>'validateForm','class'=>'form-validation','novalidate'=>'novalidate']); ?>
          
            <div class="row">
              <div class="col-md-6">

                <div class="form-group">
                  <label class="control-label">Branch Name </label>
                  <div class="append-icon">
                    <input class="form-control" type="text" id="inputBranchName" name="inputBranchName" placeholder="Enter Bank Name" minlength="3" required="" aria-required="true">                                
                    <i class="fa fa-building-o"></i>
                  </div>
                </div>
            
                <div class="form-group">
                  <label class="control-label">Branch Location</label>
                  <div class="append-icon">
                    <input class="form-control" type="text" id="inputBranchLocation" name="inputBranchLocation" placeholder="Enter Branch Name" minlength="3" required="" aria-required="true">
                    <i class="fa fa-building-o"></i>
                  </div>
                </div> 
               
              </div>  
              <div class="col-sm-6">      
                <div class="form-group">
                  <label class="control-label">Branch Address</label>
                  <div class="append-icon">
                  <input class="form-control" type="text" id="inputBranchAddress" name="inputBranchAddress" placeholder="Enter Account Number"  required="" aria-required="true">
                    <i class="fa fa-building-o"></i>
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label">Branch Admin</label>
                  <div class="append-icon">
                  <input class="form-control" type="text" id="inputBranchAdmin" name="inputBranchAdmin" placeholder="Enter Initial Balance"  required="" aria-required="true">
                    <i class="fa fa-user"></i>
                  </div>
                </div>               
              </div>
            </div>                       
        
         </div>
         </div>

          <div class="modal-footer">
              <div id="result"></div>
              <button class="btn btn-md btn-primary " type="" id="myAddButton">Add Bank</button>
              <button class="btn btn-md btn-primary" type="submit" id="myEditBrhButton" style="display:none;">Edit Bank</button>
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
      </div>
  </div>
  </div>
  </div>

    <?php echo form_close(); ?>


<!-- End Add Bank -->

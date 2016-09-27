
<!-- Start My Page Content -->
<div class="page-content">
          <div class="header">
            <h4><strong>Categories</strong></h4>
            <div class="breadcrumb-wrapper">
              <ol class="breadcrumb">
                <li><a href="/admin">Dashboard</a>
                </li>
                <li><a href="/admin/item">Categories</a>
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
                 <button type="button" class="btn btn-primary push-5-r push-10"><i class="fa fa-plus push-5-r">
                     
                 </i>Add Category</button></a>

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
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                            <?php if (isset($items)): ?>
                              <?php $count=1; ?>
                                <?php foreach ($items as $customer): ?>

                                    <tr id="editRow">
                                        <td><?php echo $count; ?></td>
                                        <td><?php echo $customer->category_name; ?></td>
                                       
                                        <td>
                                            <?php if ($customer->status=='Active'):?>
                                            <a class="singleStatus"  href="/admin/item/status/<?php echo $customer->id ?>">
                                            <span class="label label-primary">Active</span></a>
                                            <?php else: ?>
                                            <a class="singleStatus" href="/admin/item/status/<?php echo $customer->id ?>">
                                            <span class="label label-danger">Deacitve</span></a>
                                            <?php endif ?>
                                        </td>
                                        <td>
                                            <div class="btn-group">
                                             
                                               <a id="<?php echo $customer->id; ?>" class="editCategory" data-toggle="modal" href="#addcustomer">
                                              <button class="btn btn-xs btn-primary" type="button" title="Edit Client">
                                               <i class="fa fa-pencil"></i></button></a>
                                             
                                               <a href="/admin/item/delete/<?php echo $customer->id; ?>" class="singleDelete">
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
    <div class="modal-dialog modal-md" role="dialog" >
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="myModalLabel" ><strong>Add Category</strong></h4>
          <h4 class="modal-title" id="myEditModalLabel" style="display:none;"><strong>Edit Category</strong></h4>
      </div>
      <div class="modal-body">
        <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
         <?php echo form_open('/admin/item/add', ['id'=>'validateForm','class'=>'form-validation','novalidate'=>'novalidate']); ?>
          
            <div class="row">
              <div class="col-md-10">

                <div class="form-group">
                  <label class="control-label">Name</label>
                  <div class="append-icon">
                    <input class="form-control" type="text" id="inputName" name="inputName" placeholder="Enter Category Name" minlength="3" required="" aria-required="true">                                
                    <i class="fa fa-tags"></i>
                  </div>
                </div>               
              </div>
            </div>                       
        
         </div>
         </div>

          <div class="modal-footer">
              <div id="result"></div>
              <button class="btn btn-md btn-primary " type="" id="myAddButton">Add Category</button>
              <button class="btn btn-md btn-primary" type="submit" id="myEditCatButton" style="display:none;">Edit Category</button>
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





<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Business
    <small>Here's what you've got so far</small>
  </h1>
  <?php $this->load->view('admin/general/t_breadcrumb');?>
</section>

<!-- Main content -->
<section class="content">
  <?php $this->load->view('admin/general/t_notifs') ?>
  <!-- Default box -->
  <div class="box">
    <div class="box-header with-border">
      <h3 class="box-title">Business List</h3>

      <div class="box-tools pull-right">
        <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
          <i class="fa fa-minus"></i></button>
        <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
          <i class="fa fa-times"></i></button>
      </div>
    </div>
    <div class="box-body">
      <a href="<?php echo base_url();?>admin/category/add/">
        <button class="btn btn-sm bg-olive"><i class="fa fa-plus"></i> Add new</button>
      </a>
      <br/><br/>

      <table id="table-all" class="table table-bordered table-striped">
        <thead>
        <tr>
          <th>ID</th>
          <th>Name</th>
          <th>Slug</th>
          <th>Options</th>
        </tr>
        </thead>
        <tbody>
          <?php
          foreach ($categories as $key => $value) {
            ?>
            <tr>
              <td><?php echo $value['business_id'];?></td>
              <td><?php echo $value['name']?></td>
              <td><?php echo $value['slug'];?></td>
              <td>
                <div class="btn-group">
                  <button type="button" class="btn btn-default btn-sm">Actions</button>
                  <button type="button" class="btn btn-default dropdown-toggle btn-sm" data-toggle="dropdown">
                    <span class="caret"></span>
                    <span class="sr-only">Toggle Dropdown</span>
                  </button>
                  <ul class="dropdown-menu" role="menu">
                    <li><a href="<?php echo base_url();?>admin/business/detail/<?php echo urlencode(base64_encode($value['business_id']));?>">Detail</a></li>
                    <li><a href="<?php echo base_url();?>admin/business/edit/<?php echo urlencode(base64_encode($value['business_id']));?>">Edit</a></li>
                    <li class="divider"></li>
                    <li><a href="#" onclick="confirm_delete('<?php echo base_url();?>admin/business/delete/<?php echo urlencode(base64_encode($value['business_id']));?>')">Remove</a></li>
                  </ul>
                </div>
              </td>
            </tr>
            <?php
          }
          ?>
        </tbody>
        <tfoot>
        <tr>
          <th>Name</th>
          <th>Role</th>
          <th>Email</th>
          <th>Options</th>
        </tr>
        </tfoot>
      </table>
    </div>
    <!-- /.box-body -->
    <div class="box-footer">
      Footer
    </div>
    <!-- /.box-footer-->
  </div>
  <!-- /.box -->
  <script>
  function confirm_delete(p){
    $('#a-modal-confirmation-url').attr('href', p);
    $('#modal-confirmation').modal('show');
  }
  </script>
  <div class="modal modal-danger" id="modal-confirmation">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Confirmation</h4>
        </div>
        <div class="modal-body">
          <p>Are you sure to delete this user?</p>
        </div>
        <div class="modal-footer">
          <a id="a-modal-confirmation-url" href="#"><button type="button" class="btn btn-outline">Delete</button></a>
          <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->

</section>
<!-- /.content -->

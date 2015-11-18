
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      <?php echo $this->lang->line('title_admin_users');?>
      <small><?php echo $this->lang->line('desc_admin_home');?></small>
    </h1>
    <?php
      // $this->load->helper('brd');
      echo(create_breadcrumb());
    ?>
  </section>

  <!-- Main content -->
  <section class="content">
    <?php $this->load->view('admin/general/notifs') ?>
    <div class="box">
      <div class="box-header">
        <h3 class="box-title">User List</h3>
      </div>
      <!-- /.box-header -->
      <div class="box-body">
        <!-- <div class="row">
          <div class="col-md-12"> -->
            <a href="<?php echo base_url();?>admin/user/add/">
              <button class="btn btn-sm bg-olive"><i class="fa fa-plus"></i> Add new</button>
            </a>
            <br/><br/>
          <!-- </div>
        </div> -->
        <table id="table-users" class="table table-bordered table-striped">
          <thead>
          <tr>
            <th>Name</th>
            <th>Role</th>
            <th>Email</th>
            <th>Options</th>
          </tr>
          </thead>
          <tbody>
            <?php
            foreach ($users as $key => $value) {
              ?>
              <tr>
                <td><?php echo $value['first_name']." ".$value['last_name'];?></td>
                <td><?php echo $value['role'];?></td>
                <td><?php echo $value['email'];?></td>
                <td>
                  <div class="btn-group">
                    <button type="button" class="btn btn-info">Actions</button>
                    <button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown">
                      <span class="caret"></span>
                      <span class="sr-only">Toggle Dropdown</span>
                    </button>
                    <ul class="dropdown-menu" role="menu">
                      <li><a href="<?php echo base_url();?>admin/user/detail/<?php echo urlencode(base64_encode($value['email']));?>">Detail</a></li>
                      <li><a href="<?php echo base_url();?>admin/user/edit/<?php echo urlencode(base64_encode($value['email']));?>">Edit</a></li>
                      <li class="divider"></li>
                      <li><a href="#" onclick="confirm_delete('<?php echo base_url();?>admin/user/delete/<?php echo urlencode(base64_encode($value['email']));?>')">Remove</a></li>
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
</div>
<!-- /.content-wrapper -->

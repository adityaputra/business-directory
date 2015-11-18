
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
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">User Detail</h3>
      </div>
      <!-- /.box-header -->
        <!-- form start -->
          <div class="box-body">
            <div class="row">
              <div class="col-md-3">
                <!-- <div class="box box-profile"> -->
                  <img src="<?php echo base_url().AVATAR_DIR.$detail['avatar_loc'];?>" class="profile-user-img img-responsive"/>
                <!-- </div> -->
              </div>
              <div class="col-md-3">
                <div class="table-responsive">
                  <table class="table table-condensed">
                    <tbody>
                      <tr>
                        <td>
                          First name
                        </td>
                        <td>
                          <?php echo $detail['first_name'];?>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          Last name
                        </td>
                        <td>
                          <?php echo $detail['last_name'];?>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          Email
                        </td>
                        <td>
                          <?php echo $detail['email'];?>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          Role
                        </td>
                        <td>
                          <?php echo $detail['role'];?>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          Registration date
                        </td>
                        <td>
                          <?php echo $detail['create_time'];?>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          Website
                        </td>
                        <td>
                          <?php echo $detail['website'];?>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          Twitter
                        </td>
                        <td>
                          <?php echo $detail['twitter'];?>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          Facebook
                        </td>
                        <td>
                          <?php echo $detail['facebook'];?>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          About
                        </td>
                        <td>
                          <?php echo $detail['about'];?>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
              <!-- /col -->
            </div>
            <!-- /row -->
          </div>
          <!-- /.box-body -->
          <div class="box-footer">
            <div class="col-md-6"></div>
            <div class="col-md-6">
              <button type="submit" class="btn btn-danger pull-right">Remove</button><span class="pull-right">&nbsp;</span>
              <button type="submit" class="btn btn-warning pull-right">Edit</button><span class="pull-right">
            </div>

          </div>
        </form>
      </div>
      <!-- /.box -->

  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

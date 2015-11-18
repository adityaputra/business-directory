
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
        <h3 class="box-title">Edit User</h3>
      </div>
      <!-- /.box-header -->
        <!-- form start -->
        <form role="form" action="<?php echo base_url();?>admin/user/edit" method="post" enctype="multipart/form-data">
          <div class="box-body">
            (*) Required fields<br/><br/>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="first_name">First name *</label>
                  <input type="text" class="form-control" id="first_name" name="first_name" placeholder="Enter first name" value="<?php echo !empty($detail['first_name']) ? $detail['first_name'] : set_value('first_name'); ?>">
                </div>
                <div class="form-group">
                  <label for="last_name">Last name *</label>
                  <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Enter last name" value="<?php echo !empty($detail['last_name']) ? $detail['last_name'] : set_value('last_name'); ?>">
                </div>
                <div class="form-group">
                  <label for="email">Email address *</label>
                  <input type="email" class="form-control" readonly="readonly" id="email" name="email" placeholder="Enter email" value="<?php echo !empty($detail['email']) ? $detail['email'] : set_value('email'); ?>">
                </div>
                <div class="form-group">
                  <label for="password">Password *</label>
                  <input type="password" class="form-control" id="password" name="password" placeholder="(Password unchanged)">
                </div>
                <div class="form-group">
                  <label for="role">Role</label>
                  <select class="form-control" id="role" name="role" placeholder="Select role">
                    <option value="0" <?php echo !empty($detail['role']) ? 'selected="selected"' : set_select('role', '0'); ?>>Administrator</option>
                    <option value="1" <?php echo !empty($detail['role']) ? 'selected="selected"' : set_select('role', '1'); ?>>Business owner</option>
                    <option value="2" <?php echo !empty($detail['role']) ? 'selected="selected"' : set_select('role', '2'); ?>>Contributor</option>
                    <option value="5" <?php echo !empty($detail['role']) ? 'selected="selected"' : set_select('role', '5'); ?>>User</option>
                  </select>
                </div>
              </div>
              <!-- /col -->
              <div class="col-md-6">
                <div class="form-group">
                  <label for="website">Website</label>
                  <div class="input-group">
                    <span class="input-group-addon">http://</span>
                    <input type="text" class="form-control" id="website" name="website" placeholder="www.example.com" value="<?php echo !empty($detail['website']) ? $detail['website'] : set_value('website'); ?>">
                  </div>
                  <!-- <p class="help-block">Example block-level help text here.</p> -->
                </div>
                <div class="form-group">
                  <label for="twitteer">Twitter</label>
                  <div class="input-group">
                    <span class="input-group-addon">http://www.twitter.com/</span>
                    <input type="text" class="form-control" id="twitter" name="twitter" placeholder="Username" value="<?php echo !empty($detail['twitter']) ? $detail['twitter'] : set_value('twitter'); ?>">
                  </div>
                </div>
                <div class="form-group">
                  <label for="role">Facebook</label>
                  <div class="input-group">
                    <span class="input-group-addon">http://www.facebook.com/</span>
                    <input type="text" class="form-control" id="facebook" name="facebook" placeholder="URL" value="<?php echo !empty($detail['facebook']) ? $detail['facebook'] : set_value('facebook'); ?>">
                  </div>
                </div>
                <div class="form-group">
                  <label for="about">About</label>
                  <input type="text" class="form-control" id="about" name="about" placeholder="About yourself (max 140 chars.)" value="<?php echo !empty($detail['about']) ? $detail['about'] : set_value('about'); ?>">
                </div>
                <div class="form-group">
                  <label for="avatar">Avatar</label>
                  <input type="file" id="avatar" name="avatar">
                  <p class="help-block">Leave this blank to make your avatar remains unchanged.</p>
                </div>
              </div>
            </div>
            <!-- /row -->
          </div>
          <!-- /.box-body -->
          <div class="box-footer">
            <div class="col-md-6"></div>
            <div class="col-md-6"><button type="submit" class="btn btn-primary pull-right">Submit</button></div>

          </div>
        </form>
      </div>
      <!-- /.box -->

  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

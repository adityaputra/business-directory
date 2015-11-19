<!-- Logo -->
<a href="<?php echo base_url();?>admin/" class="logo">
  <!-- mini logo for sidebar mini 50x50 pixels -->
  <span class="logo-mini"><b>B</b>D</span>
  <!-- logo for regular state and mobile devices -->
  <span class="logo-lg"><b>Business</b>Directory</span>
</a>
<!-- Header Navbar: style can be found in header.less -->
<nav class="navbar navbar-static-top" role="navigation">
  <?php
  if (($this->session->userdata('logged_in') == TRUE)): ?>
  <!-- Sidebar toggle button-->
  <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
    <span class="sr-only">Toggle navigation</span>
    <span class="icon-bar"></span>
    <span class="icon-bar"></span>
    <span class="icon-bar"></span>
  </a>

  <div class="navbar-custom-menu">
    <ul class="nav navbar-nav">
      <!-- User Account Menu -->
      <li class="dropdown user user-menu">
        <!-- Menu Toggle Button -->
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
          <!-- The user image in the navbar-->
          <img src="<?php echo get_user_avatar_url($this->session->userdata('email'));?>" class="user-image" alt="User Image">
          <!-- hidden-xs hides the username on small devices so only the image appears. -->
          <span class="hidden-xs"><?php echo $this->session->userdata('first_name')." ".$this->session->userdata('last_name');?></span>
        </a>
        <ul class="dropdown-menu">
          <!-- The user image in the menu -->
          <li class="user-header">
            <img src="<?php echo get_user_avatar_url($this->session->userdata('email'));?>" class="img-circle" alt="User Image">

            <p>
              <?php echo $this->session->userdata('first_name')." ".$this->session->userdata('last_name');?>
              <small>Member since XXXXXXXXX</small>
            </p>
          </li>
          <!-- Menu Body -->
          <li class="user-body">
            <div class="row">
              <div class="col-xs-4 text-center">
                <a href="#"></a>
              </div>
              <div class="col-xs-4 text-center">
                <a href="#">Settings</a>
              </div>
              <div class="col-xs-4 text-center">
                <a href="#"></a>
              </div>
            </div>
            <!-- /.row -->
          </li>
          <!-- Menu Footer-->
          <li class="user-footer">
            <div class="pull-left">
              <a href="#" class="btn btn-default btn-flat">Profile</a>
            </div>
            <div class="pull-right">
              <a href="#" class="btn btn-default btn-flat">Sign out</a>
            </div>
          </li>
        </ul>
      </li>
      <!-- Control Sidebar Toggle Button -->
      <li>
        <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
      </li>
    </ul>
  </div>
  <?php endif;?>
</nav>

<!-- sidebar: style can be found in sidebar.less -->
<section class="sidebar">
  <?php if($this->session->userdata('logged_in')):?>
    <!-- Sidebar user panel -->
    <div class="user-panel">
      <div class="pull-left image">
        <img src="<?php echo get_user_avatar_url($this->session->userdata('email'));?>" class="img-circle" alt="User Image">
      </div>
      <div class="pull-left info">
        <p><?php echo $this->session->userdata('first_name')." ".$this->session->userdata('last_name');?></p>
        <!-- Status -->
        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
      </div>
    </div>

    <!-- search form (Optional) -->
    <form action="#" method="get" class="sidebar-form">
      <div class="input-group">
        <input type="text" name="q" class="form-control" placeholder="Search...">
            <span class="input-group-btn">
              <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
              </button>
            </span>
      </div>
    </form>
    <!-- /.search form -->
  <?php endif;?>
  <!-- sidebar menu: : style can be found in sidebar.less -->
  <ul class="sidebar-menu">
    <li class="header">MENU</li>
    <?php if(!$this->session->userdata('logged_in')):?>
      <li class="active"><a href="#"><i class="fa fa-link"></i> <span>Admin login</span></a></li>
    <?php endif;?>
    <?php if($this->session->userdata('logged_in')):?>
      <li><a href="#"><i class="fa fa-dashboard <?php if($this->uri->segment(2)=="dashboard"){echo "active";}?>"></i> <span>Dashboard</span></a></li>
      <!-- <li><a href="#"><i class="fa fa-user"></i> <span>Profile</span></a></li> -->
      <li class="treeview <?php if($this->uri->segment(2)=="business"){echo "active";}?>">
        <a href="#"><i class="fa fa-briefcase"></i> <span>Business</span> <i class="fa fa-angle-left pull-right"></i></a>
        <ul class="treeview-menu">
          <li><a href="<?php echo base_url();?>admin/business/">All businesses</a></li>
          <li><a href="<?php echo base_url();?>admin/business/add/">Add new business</a></li>
        </ul>
      </li>
      <li class="treeview <?php if($this->uri->segment(2)=="category"){echo "active";}?>">
        <a href="#"><i class="fa fa-folder"></i> <span>Category</span> <i class="fa fa-angle-left pull-right"></i></a>
        <ul class="treeview-menu">
          <li><a href="<?php echo base_url();?>admin/category/">All categories</a></li>
          <li><a href="<?php echo base_url();?>admin/category/add/">Add new category</a></li>
        </ul>
      </li>
      <li class="treeview <?php if($this->uri->segment(2)=="user"){echo "active";}?>">
        <a href="#"><i class="fa fa-users"></i> <span>Users</span> <i class="fa fa-angle-left pull-right"></i></a>
        <ul class="treeview-menu">
          <li><a href="<?php echo base_url();?>admin/user/all/">All users</a></li>
          <li><a href="<?php echo base_url();?>admin/user/add/">Add new user</a></li>
        </ul>
      </li>
      <li class="treeview <?php if($this->uri->segment(2)=="post"){echo "active";}?>">
        <a href="#"><i class="fa fa-file"></i> <span>Posts</span> <i class="fa fa-angle-left pull-right"></i></a>
        <ul class="treeview-menu">
          <li><a href="#">Link in level 2</a></li>
          <li><a href="#">Link in level 2</a></li>
        </ul>
      </li>
      <li class="treeview <?php if($this->uri->segment(2)=="page"){echo "active";}?>">
        <a href="#"><i class="fa fa-file-o"></i> <span>Pages</span> <i class="fa fa-angle-left pull-right"></i></a>
        <ul class="treeview-menu">
          <li><a href="#">Link in level 2</a></li>
          <li><a href="#">Link in level 2</a></li>
        </ul>
      </li>
      <li class="treeview <?php if($this->uri->segment(2)=="frontpagesettings"){echo "active";}?>">
        <a href="#"><i class="fa fa-gear"></i> <span>Frontpage Settings</span> <i class="fa fa-angle-left pull-right"></i></a>
        <ul class="treeview-menu">
          <li><a href="#">Link in level 2</a></li>
          <li><a href="#">Link in level 2</a></li>
        </ul>
      </li>
      <li class="treeview <?php if($this->uri->segment(2)=="widget"){echo "active";}?>">
        <a href="#"><i class="fa fa-th"></i> <span>Widgets</span> <i class="fa fa-angle-left pull-right"></i></a>
        <ul class="treeview-menu">
          <li><a href="#">Link in level 2</a></li>
          <li><a href="#">Link in level 2</a></li>
        </ul>
      </li>
    <?php endif;?>
    <!-- <li class="header">LABELS</li>
    <li><a href="#"><i class="fa fa-circle-o text-red"></i> <span>Important</span></a></li>
    <li><a href="#"><i class="fa fa-circle-o text-yellow"></i> <span>Warning</span></a></li>
    <li><a href="#"><i class="fa fa-circle-o text-aqua"></i> <span>Information</span></a></li> -->
  </ul>
</section>
<!-- /.sidebar -->

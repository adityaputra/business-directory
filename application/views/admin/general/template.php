<!DOCTYPE html>
<html>
<head>
  <?php $this->load->view('admin/general/t_top_resources'); // general resources?>
  <?php if(!empty($content_top_resources))
    $this->load->view($content_top_resources); // content resources: css, title, etc
  ?>
</head>
<body class="hold-transition skin-green sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">

  <header class="main-header">
    <?php $this->load->view('admin/general/t_header'); // general top header?>
  </header>

  <!-- =============================================== -->

  <!-- Left side column. contains the sidebar -->
  <aside class="main-sidebar">
    <?php $this->load->view('admin/general/t_sidebar'); // general sidebar?>
  </aside>

  <!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <?php if(!empty($content))
      $this->load->view($content); // main content
    ?>
  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer">
    <?php $this->load->view('admin/general/t_footer'); // general footer?>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <?php //$this->load->view('admin/general/t_control_sidebar'); // general control sidebar?>
  </aside>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<?php $this->load->view('admin/general/t_bottom_resources');?>
<?php if(!empty($content_bottom_resources))
  $this->load->view($content_bottom_resources); // main content
?>
</body>
</html>

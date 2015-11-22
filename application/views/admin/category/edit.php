<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Category
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
      <h3 class="box-title">Edit category</h3>

      <div class="box-tools pull-right">
        <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
          <i class="fa fa-minus"></i></button>
        <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
          <i class="fa fa-times"></i></button>
      </div>
    </div>
    <form role="form" action="<?php echo base_url();?>admin/category/edit" method="post" enctype="multipart/form-data">
      <div class="box-body">
        (*) Required fields<br/><br/>
        <div class="row">
          <div class="col-md-12">
            <input type="hidden" value="<?php echo !empty($detail['category_id']) ? $detail['category_id'] : set_value('category_id'); ?>" name="category_id"/>
            <div class="form-group">
              <label for="name">Category name *</label>
              <input type="text" class="form-control" id="name" name="name" placeholder="Enter category name" value="<?php echo !empty($detail['name']) ? $detail['name'] : set_value('name'); ?>">
            </div>
            <div class="form-group">
              <label for="slug">Slug *</label>
              <input type="text" class="form-control" id="slug" name="slug" placeholder="Only alphanumerical characters and dashes (-) allowed" value="<?php echo !empty($detail['slug']) ? $detail['slug'] : set_value('slug'); ?>">
            </div>
          </div>
          <!-- /col -->
        </div>
        <!-- /row -->
      </div>
      <!-- /.box-body -->
      <div class="box-footer">
        <div class="col-md-6"></div>
        <div class="col-md-6"><button type="submit" class="btn btn-primary pull-right">Submit</button></div>
      </div>
      <!-- /.box-footer-->
    </form>

  </div>
  <!-- /.box -->

</section>
<!-- /.content -->

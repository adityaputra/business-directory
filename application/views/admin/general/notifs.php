<?php if(!empty($success)):?>
  <div class="row">
    <div class="col-md-12">
      <div class="callout callout-success">
        <h4>Success</h4>
        <?php if(!empty($success)):?>
          <?php foreach ($success as $key => $value): ?>
            <p><?php echo $value;?></p>
          <?php endforeach; ?>
        <?php endif;?>
      </div>
    </div>
    <!-- /.col -->
  </div>
<?php endif;?>
<?php if(!empty($notification)):?>
  <div class="row">
    <div class="col-md-12">
      <div class="callout callout-info">
        <h4>Notification</h4>
        <?php if(!empty($notification)):?>
          <?php foreach ($notification as $key => $value): ?>
            <p><?php echo $value;?></p>
          <?php endforeach; ?>
        <?php endif;?>
      </div>
    </div>
    <!-- /.col -->
  </div>
<?php endif;?>
<?php if(validation_errors() || !empty($error)):?>
  <div class="row">
    <div class="col-md-12">
      <div class="callout callout-danger">
        <h4>Error</h4>
        <?php if(!empty($error)):?>
          <?php foreach ($error as $key => $value): ?>
            <p><?php echo $value;?></p>
          <?php endforeach; ?>
        <?php endif;?>
        <p><?php echo validation_errors(); ?></p>
      </div>
    </div>
    <!-- /.col -->
  </div>
<?php endif;?>
<!-- /.row -->
<!-- END ALERTS AND CALLOUTS -->

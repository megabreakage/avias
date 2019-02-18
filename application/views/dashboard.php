<?php if (isset($_SESSION['loggedin'])) { ?>

<div class="row dBoard">
  <div class="col-md-3 col-sm-6 mb-3 pt">
    <div class="card text-white bg-primary o-hidden h-100">
      <div class="card-body">
        <div class="card-body-icon">
          <i class="fa fa-fw fa-comments"></i>
        </div>
        <div class="mr-5">26 New Messages!</div>
      </div>
      <a class="card-footer text-white clearfix small z-1" href="<?php echo base_url('messages'); ?>">
        <span class="float-left">View Details</span>
        <span class="float-right">
          <i class="fa fa-angle-right"></i>
        </span>
      </a>
    </div>
  </div>
  <div class="col-md-3 col-sm-6 mb-3 pt">
    <div class="card text-white bg-warning o-hidden h-100">
      <div class="card-body">
        <div class="card-body-icon">
          <i class="fa fa-fw fa-list"></i>
        </div>
        <div class="mr-5">Tasks Almost Due!</div>
      </div>
      <a class="card-footer text-white clearfix small z-1" href="<?php echo base_url('maintenance/expired_tasks'); ?>">
        <span class="float-left">View Details</span>
        <span class="float-right">
          <i class="fa fa-angle-right"></i>
        </span>
      </a>
    </div>
  </div>
  <div class="col-md-3 col-sm-6 mb-3 pt">
    <div class="card text-white bg-success o-hidden h-100">
      <div class="card-body">
        <div class="card-body-icon">
          <i class="fa fa-fw fa-list"></i>
        </div>
        <div class="mr-5">Recently Updated Tasks!</div>
      </div>
      <a class="card-footer text-white clearfix small z-1" href="<?php echo base_url('maintenance/recently_updated'); ?>">
        <span class="float-left">View Details</span>
        <span class="float-right">
          <i class="fa fa-angle-right"></i>
        </span>
      </a>
    </div>
  </div>
  <div class="col-md-3 col-sm-6 mb-3 pt">
    <div class="card text-white bg-danger o-hidden h-100">
      <div class="card-body">
        <div class="card-body-icon">
          <i class="fa fa-fw fa-list"></i>
        </div>
        <div class="mr-5">Due Tasks!!</div>
      </div>
      <a class="card-footer text-white clearfix small z-1" href="<?php echo base_url('maintenance/expired_tasks'); ?>">
        <span class="float-left">View Details</span>
        <span class="float-right">
          <i class="fa fa-angle-right"></i>
        </span>
      </a>
    </div>
  </div>
  <div class="col-md-12">
    <br>
    <h1>Projected Maintenance</h1>
    <hr>
  </div>
  <div class="col-md-12">

  </div>
</div>
  </div>
</div>

<?php
} else {
    redirect('auth', 'refresh');
  }
?>

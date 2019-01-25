<div id="addAircraft" class="modal fade addTask" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
    <div class="card">
      <form id="aircraftTask" action="add_task" method="post">
        <div class="card-header text-center">
          <h5>Add Task</h5>
        </div>
        <div class="card-body">
          <div class="col-xl-6 offset-md-3 alert hidden">
            <!-- response texts -->
          </div>
          <h6>Scheduled Maintenance Task</h6>
          <hr>
          <!-- Airframe data -->
          <div class="row">
            <div class="col-xl-3">
              <label>Aircraft Reg</label>
              <select class="form-control" name="registration">
                <option value=""> -- select aircraft --</option>
                <?php foreach ($aircrafts as $aircraft): ?>
                  <option value="<?php echo $aircraft['aircraft_id']; ?>"><?php echo $aircraft['aircraft_reg']; ?></option>
                <?php endforeach; ?>
              </select>
            </div>
          </div>
          <input id="engine_data" type="hidden" name="engine_data" value="">
          <input id="prop_data" type="hidden" name="prop_data" value="">
        </div>
        <div class="card-footer">
          <div class="col-xl-12 text-right">
            <button name="clear" class="aviaBtn btn btn-danger" data-dismiss="modal"> Cancel</button>
            <button type="submit" class="aviaBtn btn btn-primary">Submit</button>
          </div>
        </div>
      </form>
    </div>
    </div>
  </div>
</div>

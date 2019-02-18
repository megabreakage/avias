<?php if (isset($_SESSION['loggedin'])) { ?>

  <h5>Reports</h5>

  <div class="row">
    <div class="col-md-12">
      <div class="row">
        <div class="col-md-3 input-group mb-3">
          <div class="input-group-append">
            <span class="input-group-text">Aircraft Reg</span>
          </div>
          <select id="selectAircraft" class="form-control" name="engine_status">
            <option value=""> -- select aircraft --</option>
            <?php foreach ($aircrafts as $aircarft): ?>
              <option value="<?php echo $aircarft['aircraft_id']; ?>"><?php echo $aircarft['aircraft_reg']; ?></option>
            <?php endforeach; ?>
          </select>
        </div>
        <div class="col-md-2">
          <select id="reportCategory" class="form-control" name="reportCategory">
            <option value=""> -- select report --</option>
            <option value="1">Airframe</option>
            <option value="2">APU</option>
            <option value="3">ADs Status</option>
            <option value="4">Engines</option>
            <option value="5">Propellers</option>
          </select>
        </div>
        <div id="engineSelect" class="col-md-2 hidden">
          <select id="engineStatus" class="form-control" name="engineStatus">
            <option value=""> -- select engine --</option>
            <option value="1">Engine 1</option>
            <option value="2">Engine 2</option>
          </select>
        </div>
        <div id="propellerSelect" class="col-md-2 hidden">
          <select id="propellerStatus" class="form-control" name="propellerStatus">
            <option value=""> -- select propeller --</option>
            <option value="1">Propellers 1</option>
            <option value="2">Propellers 2</option>
          </select>
        </div>
      </div>
    </div>
    <div class="col-md-12">
      <div class="row">
        <div class="col-md-6 offset-md-3 text-center alert alert-info displayInfo">
          Select a report by the filters above to display a report.
        </div>
      </div>
    </div>
  </div>

<?php
} else {
  redirect('auth', 'refresh');
}
 ?>

<div id="addAircraft" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
    <div class="card">
      <form id="aircraftAdd" action="add_aircraft" method="post">
        <div class="card-header text-center">
          <h5>Add Aircraft</h5>
        </div>
        <div class="card-body">
          <div class="col-xl-6 offset-md-3 alert hidden">
            <!-- response texts -->
          </div>
          <h6>Airframe</h6>
          <hr>
          <!-- Airframe data -->
          <div class="row">
            <div class="col-xl-3">
              <label>Registration</label>
              <input id="registration" type="text" name="registration" class="form-control" placeholder="Aircraft Registration" required>
            </div>
            <div class="col-xl-3">
              <label>Serial Number</label>
              <input id="serialNumber" type="text" name="serialNumber" class="form-control" placeholder="Serial Number" required>
            </div>
            <div class="col-xl-3">
              <label>Manufacturer</label>
              <select id="manufacturer" name="manufacturer" class="form-control" required>
                <option value=""> -- select manufacturer --</option>
                <?php foreach ($manufacturers as $manufacturer): ?>
                  <option value="<?php echo $manufacturer['manufacturer_id'] ?>"><?php echo $manufacturer['manufacturer'] ?></option>
                <?php endforeach; ?>
              </select>
            </div>
            <div class="col-xl-3">
              <label>Manufacture Date</label>
              <input id="manufactureDate" type="date" name="manufactureDate" class="form-control" required>
            </div>
            <div class="col-xl-3">
              <label>Series</label>
              <input id="series" type="text" name="series" class="form-control" placeholder="Aircraft Series" required>
            </div>
            <div class="col-xl-3">
              <label>Model</label>
              <select id="model" class="form-control" name="model" required>
                <option value=""> -- Select Model --</option>
                <?php foreach ($aircraft_models as $model): ?>
                  <option value="<?php echo $model['model_id'] ?>"><?php echo $model['model'] ?></option>
                <?php endforeach; ?>
              </select>
            </div>
            <div class="col-xl-3">
              <label>Type</label>
              <select id="engineType" class="form-control" name="engineType" required>
                <option value=""> -- Select Type --</option>
                <?php foreach ($engineTypes as $type): ?>
                  <option value="<?php echo $type['id']?>"><?php echo $type['type'] ?></option>
                <?php endforeach; ?>
              </select>
            </div>
            <div class="col-xl-3">
              <label>Category</label>
              <select id="category" class="form-control" name="category" required>
                <option value=""> -- Select Category --</option>
                <option value="public">Public</option>
                <option value="private">Private</option>
              </select>
            </div>
            <div class="col-xl-12 pt">
              <div class="row">
                <div class="col-xl-2">
                  <label>No. Engines</label>
                  <select id="engines" class="form-control" name="engines" required>
                    <option value="1">1</option>
                    <option value="2">2</option>
                  </select>
                </div>
                <div class="col-xl-3">
                  <label>TAT</label>
                  <input id="tat" type="text" name="tat" class="form-control" placeholder="Aircraft Hours" required>
                </div>
                <div class="col-xl-3">
                  <label>TAC</label>
                  <input id="tac" type="text" name="tac" class="form-control" placeholder="Aircraft Cycles" required>
                </div>
                <div class="col-xl-4">
                  <label>Update Date</label>
                  <input id="updateDate" type="date" name="updateDate" class="form-control" placeholder="Update Date" required>
                </div>
              </div>
            </div>
            <!-- Engine data -->
            <div class="col-xl-12 pt">
              <h6>Engines</h6>
              <hr>
              <div class="row">
                <div class="col-xl-12 pt">
                  <div class="row">
                    <div class="col-xl-12">
                      <table class="table table-sm table-hover table-stripped">
                        <thead>
                          <tr>
                            <td>#</td>
                            <td>Make</td>
                            <td>Serial No.</td>
                            <td>Hours</td>
                            <td>Cycles</td>
                          </tr>
                        </thead>
                        <tbody id="engData">
                          <!-- engine data display -->
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
                <div class="col-xl-12">
                  <div class="row">
                    <div class="col-xl-2">
                      <select id="engineNumber" class="form-control">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                      </select>
                    </div>
                    <div class="col-xl-2">
                      <input id="engineSerialNumber" type="text" class="form-control" placeholder="Serial No." required>
                    </div>
                    <div class="col-xl-2">
                      <input id="engineModel" type="text" class="form-control" placeholder="Model" required>
                    </div>
                    <div class="col-xl-2">
                      <input id="teh" type="number" class="form-control" placeholder="Hours" required>
                    </div>
                    <div class="col-xl-2">
                      <input id="tec" type="number" class="form-control" placeholder="Cycles" required>
                    </div>
                    <div class="col-xl-2">
                      <button id="addEngine" name="add" class="aviaBtn btn btn-primary"> Add</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- Propeller data -->
            <div class="col-xl-12 pt">
              <h6>Propellers</h6>
              <hr>
              <div class="row">
                <div class="col-xl-12 pt">
                  <div class="row">
                    <div class="col-xl-12">
                      <table class="table table-sm table-hover table-stripped">
                        <thead>
                          <tr>
                            <td>#</td>
                            <td>Make</td>
                            <td>Serial No.</td>
                            <td>Hours</td>
                            <td>Cycles</td>
                          </tr>
                        </thead>
                        <tbody id="propData">
                          <!-- Display propeller data -->
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
                <div class="col-xl-12">
                  <div class="row">
                    <div class="col-xl-2">
                      <select id="propNumber" class="form-control">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                      </select>
                    </div>
                    <div class="col-xl-2">
                      <input id="propSerialNumber" type="text" class="form-control" placeholder="Serial No." required>
                    </div>
                    <div class="col-xl-2">
                      <input id="propModel" type="text" class="form-control" placeholder="Model" required>
                    </div>
                    <div class="col-xl-2">
                      <input id="tph" type="number" class="form-control" placeholder="Hours" required>
                    </div>
                    <div class="col-xl-2">
                      <input id="tpc" type="number" class="form-control" placeholder="Cycles" required>
                    </div>
                    <div class="col-xl-2">
                      <button id="addProp" class="aviaBtn btn btn-primary"> Add</button>
                    </div>
                  </div>
                </div>
              </div>
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

<div id="addAircraft" class="modal fade editModel" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="card">
        <form id="flightAdd" action="add_flight" method="post">
          <div class="card-header text-center">
            <h5>Add Flight</h5>
          </div>
          <div class="card-body">
            <div id="response" class="col-xl-6 offset-md-3 alert hidden">
              <!-- response texts -->
            </div>
              <div class="row">
                <div class="col-lg-12">
                  <div class="row">
                    <div class="col-lg-12 pb">
                      <div class="row">
                        <div class="col-lg-3">
                          <label>Aircraft Reg:</label>
                          <select class="form-control" name="aircraftReg" required>
                            <option value="">-- select aircraft --</option>
                            <?php foreach ($aircrafts as $aircraft): ?>
                              <option value="<?php echo $aircraft['aircraft_id']; ?>"><?php echo $aircraft['aircraft_reg']; ?></option>
                            <?php endforeach; ?>
                          </select>
                        </div>
                        <div class="col-lg-3">
                          <label>Techlog number</label>
                          <input class="form-control" type="text" name="techLogNumber" placeholder="Techlog Number" required>
                        </div>
                        <div class="col-lg-3">
                          <label>Type of entry</label>
                          <select class="form-control" name="type">
                            <option value="">--select type --</option>
                            <option value="scheduled">Scheduled</option>
                            <option value="maintenance">Maintenance</option>
                          </select>
                        </div>
                        <div class="col-lg-3">
                          <label>Date of Entry</label>
                          <input class="form-control" type="date" name="entryDate">
                        </div>
                      </div>
                    </div>
                    <!-- Entry Display table -->
                    <div class="col-lg-12 pt pb">
                      <div class="col-xl-12">
                        <div class="row contentTabs text-center">
                          <div id="logTab" class="col-xl-2 col-md-2 col-sm-2 col-xs-2 tab">
                            <a href="#"><span class="active">Techlog</span></a>
                          </div>
                          <div id="pirepsTab" class="col-xl-2 col-md-2 col-sm-2 col-xs-2">
                            <a href="#"><span>Pireps</span></a>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div id="logData" class="pt col-lg-12">
                          <table class="table table-sm table-striped table-bordered pt">
                              <thead>
                                  <tr>
                                      <td>From</td>
                                      <td>To</td>
                                      <td>Hours</td>
                                      <td>Cycles</td>
                                      <td class="text-center">Cancel</td>
                                  </tr>
                              </thead>
                              <tbody id="entryRow">
                                <!-- Display entry data -->
                              </tbody>
                          </table>
                          <input id="logs" type="hidden" name="logs" value=""> <!-- JavaScript assigned value -->
                        </div>
                        <div id="pirepsData" class="pt col-lg-12 hidden">

                        </div>
                      </div>
                    </div>
                    <!-- Entry point inputs -->
                    <div class="col-lg-12">
                      <br>
                      <div class="row">
                        <div class="col-lg-2">
                            <label>From</label>
                            <select id="from" class="form-control" required>
                                <option> -- select from --</option>
                                <?php foreach ($locations as $location): ?>
                                  <option value="<?php echo $location['location']; ?>"><?php echo $location['location']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="col-lg-2">
                            <label>To</label>
                            <select id="to" class="form-control" required>
                                <option>-- select to --</option>
                                <?php foreach ($locations as $location): ?>
                                  <option value="<?php echo $location['location']; ?>"><?php echo $location['location']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="col-lg-3">
                            <label>Take Off</label>
                            <input id="takeoff" class="form-control" type="datetime-local" required/>
                        </div>
                        <div class="col-lg-3">
                            <label>Landing</label>
                            <input id="landing" class="form-control" type="datetime-local" required/>
                        </div>
                        <div class="col-lg-2">
                            <label>Hours</label>
                            <input id="hours" class="form-control" type="text" value="0.00" readonly/>
                        </div>
                        <div class="col-lg-12 text-right">
                          <br />
                          <button id="add" class="aviaBtn btn btn-primary">Add</button>
                        </div>
                      </div>
                    </div>
                  </div>
              </div>
            </div>
          </div>
          <div class="card-footer">
            <div class="col-lg-12">
                <div class="row">
                  <div class="col-lg-6">
                    <div class="row">
                      <div class="col-lg-6">
                        <!-- <label> Total hours</label> -->
                        <input id="totalHours" class="form-control" name="totalHours" value="0.00" readonly/>
                      </div>
                      <div class="col-lg-6">
                        <!-- <label> Total Cycles</label> -->
                        <input id="totalCycles" class="form-control" name="totalCycles" value="0.00" readonly/>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-6 text-right">
                    <!-- <br /> -->
                    <div class="row">
                      <div class="col-lg-6">
                        <button class="aviaBtn btn btn-danger" data-dismiss="modal"> Cancel</button>
                      </div>
                      <div class="col-lg-6">
                        <button type="submit" id="save" class="aviaBtn btn btn-primary form-control">Save Techlog</button>
                      </div>
                    </div>
                  </div>
                </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

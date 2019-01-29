<div id="addAircraft" class="modal fade addFlight" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="card">
        <form id="flightAdd" action="<?php echo base_url("add_flight"); ?>" method="post">
          <div class="card-header text-center">
            <h5>Add Flight</h5>
          </div>
          <div class="card-body">
            <div id="log_response" class="col-md-6 offset-md-3 alert hidden">
              <!-- response texts -->
            </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="row">
                    <div class="col-md-12 pb">
                      <div class="row">
                        <div class="col-md-3">
                          <label>Aircraft Reg:</label>
                          <select class="form-control" name="aircraftReg" required>
                            <option value="">-- select aircraft --</option>
                            <?php foreach ($aircrafts as $aircraft): ?>
                              <option value="<?php echo $aircraft['aircraft_id']; ?>"><?php echo $aircraft['aircraft_reg']; ?></option>
                            <?php endforeach; ?>
                          </select>
                        </div>
                        <div class="col-md-3">
                          <label>Techlog number</label>
                          <input class="form-control" type="text" name="techLogNumber" placeholder="Techlog Number" required>
                        </div>
                        <div class="col-md-3">
                          <label>Type of entry</label>
                          <select class="form-control" name="type">
                            <option value="">--select type --</option>
                            <option value="scheduled">Scheduled</option>
                            <option value="maintenance">Maintenance</option>
                          </select>
                        </div>
                        <div class="col-md-3">
                          <label>Date of Entry</label>
                          <input class="form-control" type="date" name="entryDate">
                        </div>
                      </div>
                    </div>
                    <!-- Entry Display table -->
                    <div class="col-md-12 pt">
                      <div class="col-md-12">
                        <div class="row contentTabs text-center">
                          <div id="logTab" class="col-md-2 col-md-2 col-sm-2 col-xs-2 tab">
                            <a href="#"><span class="active">Techlog</span></a>
                          </div>
                          <div id="pirepsTab" class="col-md-2 col-md-2 col-sm-2 col-xs-2">
                            <a href="#"><span>Pireps</span></a>
                          </div>
                          <div id="trendTab" class="col-md-2 col-md-2 col-sm-2 col-xs-2">
                            <a href="#"><span>Trend Monitor</span></a>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <!-- Flight logs data -->
                        <div id="logData" class="pt col-md-12">
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
                      </div>
                    </div>
                    <!-- Data entry points -->
                    <div id="logDataEntry" class="col-md-12 pt">
                      <div class="row">
                        <div class="col-md-12">
                          <hr>
                        </div>
                        <div class="col-md-2">
                            <label>From</label>
                            <select id="from" class="form-control" required>
                                <option> -- select from --</option>
                                <?php foreach ($locations as $location): ?>
                                  <option value="<?php echo $location['location']; ?>"><?php echo $location['location']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="col-md-2">
                            <label>To</label>
                            <select id="to" class="form-control" required>
                                <option>-- select to --</option>
                                <?php foreach ($locations as $location): ?>
                                  <option value="<?php echo $location['location']; ?>"><?php echo $location['location']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label>Take Off</label>
                            <input id="takeoff" class="form-control" type="datetime-local" required/>
                        </div>
                        <div class="col-md-3">
                            <label>Landing</label>
                            <input id="landing" class="form-control" type="datetime-local" required/>
                        </div>
                        <div class="col-md-2">
                            <label>Hours</label>
                            <input id="hours" class="form-control text-center" type="text" value="0.00" readonly/>
                        </div>
                        <div class="col-md-12 text-right">
                          <br />
                          <button id="add" class="aviaBtn btn btn-primary">Add</button>
                        </div>
                        <div class="col-md-6 pt">
                          <div class="row">
                            <div class="col-md-6 input-group mb-3">
                              <div class="input-group-prepend">
                                <span class="input-group-text">Total hours</span>
                              </div>
                              <input id="totalHours" class="form-control text-center" name="totalHours" value="0.00" title="Total hours" readonly/>
                            </div>
                            <div class="col-md-6 input-group mb-3">
                              <div class="input-group-prepend">
                                <span class="input-group-text">Total Cycles</span>
                              </div>
                              <input id="totalCycles" class="form-control text-center" name="totalCycles" value="0.00" title="Total cycles" readonly/>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- Pireps data entry points -->
                    <div id="pirepsData" class="pt col-md-12 hidden">
                      <div class="row">
                        <div class="col-md-12 pireps">
                          <table class="table table-sm table-striped table-bordered">
                            <thead>
                              <tr>
                                <th>Defect</th>
                                <th>MEL</th>
                                <th class="text-center">Categoty</th>
                                <th class="text-center">Deferred</th>
                                <th>Defer reason</th>
                                <th class="text-center">Defer date</th>
                                <th></th>
                              </tr>
                            </thead>
                            <tbody id="tblDefects">
                              <!-- JavaScript populate field -->

                            </tbody>
                          </table>
                        </div>
                        <div class="col-md-12 pt">
                          <div class="row">
                            <div class="col-md-12">
                              <hr>
                            </div>
                            <div class="col-md-7 defectDetails">
                              <p>Defect details</p>
                              <hr>
                              <div class="row">
                                <div class="col-md-8">
                                  <!-- <label>defect</label> -->
                                  <textarea id="defect" class="form-control" rows="3" cols="80" placeholder="Defect" title="Defect"></textarea>
                                </div>
                                <div class="col-md-4">
                                  <div class="row">
                                    <div class="col-md-12">
                                      <select id="ata_chapter_id" class="form-control" title="ATA Code">
                                        <option value="">-- ATA Code --</option>
                                        <?php foreach ($ata_chapters as $ata_chapter): ?>
                                          <option value="<?php echo $ata_chapter['ata_chapter_id']; ?>">00<?php echo $ata_chapter['ata_chapter']; ?>: <?php echo $ata_chapter['ata_name']; ?></option>
                                        <?php endforeach; ?>
                                      </select>
                                    </div>
                                    <div class="col-md-12 input-group mb-3 pt">
                                      <input id="dfr_status" type="checkbox">
                                      <div class="chck_label">
                                        <label><span>__</span>Defer</label>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="col-md-5 deferredDetails">
                              <div class="row">
                                <div class="col-md-12">
                                  <div class="row">
                                    <div class="col-md-8">
                                      <textarea id="limitations" class="form-control" rows="4" cols="80" placeholder="Operational limitations" title="Operational limitations"></textarea>
                                    </div>
                                    <div class="col-md-4">
                                      <div class="row">
                                        <div class="col-md-12">
                                          <input id="mel_reference" type="text" class="form-control" placeholder="MEL" title="MEL reference">
                                        </div>
                                        <div class="col-md-12 pt">
                                          <select id="dfr_reason" class="form-control" title="Deferred reason">
                                            <option value="">-- select reason --</option>
                                            <option value="Lack of spares">Lack of spares</option>
                                            <option value="Insufficient time">Insufficient time</option>
                                          </select>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="col-md-4 pt">
                                      <select id="dfr_category" class="form-control" title="Defer category">
                                        <option value="">-- Defer category --</option>
                                        <option value="A">A</option>
                                        <option value="B">B</option>
                                        <option value="C">C</option>
                                        <option value="D">D</option>
                                      </select>
                                    </div>
                                    <div class="col-md-4 pt">
                                      <input id="dfr_date" type="date" class="form-control" title="Deferred date">
                                    </div>
                                    <div class="col-md-4 pt">
                                      <input id="exp_date" type="date" class="form-control" title="Deferred expiry date">
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="col-md-12 dfrClearanceDetails hidden">
                              <div class="row">
                                <div class="col-md-3 pt">
                                  <textarea id="rectification" class="form-control" rows="1" cols="80" placeholder="Rectification/Actions taken" title="Rectification/Action taken"></textarea>
                                </div>
                                <div class="col-md-2 pt">
                                  <input id="techlog_number" type="text" class="form-control" placeholder="Techlog number" title="Techlog number">
                                </div>
                                <div class="col-md-2 pt">
                                  <input id="cleared_date" type="date" class="form-control" title="Cleared date">
                                </div>
                                <div class="col-md-2 pt">
                                  <input id="wo_number" type="text" class="form-control" placeholder="Work order number" title="Work order number">
                                </div>
                                <div class="col-md-3 pt">
                                  <textarea id="remarks" class="form-control" rows="1" cols="80" placeholder="Remarks" title="Remarks"></textarea>
                                </div>
                              </div>
                            </div>
                            <div class="col-md-12 text-right pt">
                              <button id="addDefect" class="aviaBtn btn btn-primary">Add</button>
                            </div>

                          </div>
                        </div>
                      </div>

                      <input id="pireps" type="hidden" name="pireps" value=""> <!-- JavaScript assigned value -->
                    </div>
                    <!-- Trend monitor data entry point -->
                    <div id="trendData" class="pt col-md-12 hidden">

                      <input id="trendMonitor" type="hidden" name="trend_monitor" value=""> <!-- JavaScript assigned value -->
                    </div>
                  </div>
              </div>
            </div>
          </div>
          <div class="card-footer">
            <div class="col-md-12 text-right">
              <button class="aviaBtn btn btn-danger" data-dismiss="modal"> Cancel</button>
              <button type="submit" id="save" class="aviaBtn btn btn-primary">Save Techlog</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

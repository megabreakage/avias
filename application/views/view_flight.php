<?php if (isset($_SESSION['loggedin'])) { ?>
  <script>
    fv_logs = JSON.parse('<?php echo json_encode($logs); ?>');
    fv_pireps = JSON.parse('<?php echo json_encode($defects); ?>');
    fv_trends = JSON.parse('<?php echo json_encode($trends); ?>');
  </script>

  <form id="fv_flightAdd" action="<?php echo base_url("add_flight"); ?>" method="post">
    <input id="fv_flight_id" type="hidden" name="flight_id" value="<?php echo $flight['flight_id']; ?>">
    <div class="text-center">
      <h5>Add Flight</h5>
    </div>
    <div class="card-body">
      <div id="fv_log_response" class="col-md-6 offset-md-3 alert hidden">
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
                      <option value="<?php echo $flight['aircraft_id']; ?>"><?php echo $flight['aircraft_reg']; ?></option>
                      <?php foreach ($aircrafts as $aircraft): ?>
                        <option value="<?php echo $aircraft['aircraft_id']; ?>"><?php echo $aircraft['aircraft_reg']; ?></option>
                      <?php endforeach; ?>
                    </select>
                  </div>
                  <div class="col-md-3">
                    <label>Techlog number</label>
                    <input class="form-control" type="text" name="techLogNumber" value="<?php echo $flight['techlog']; ?>" placeholder="Techlog Number" required>
                  </div>
                  <div class="col-md-3">
                    <label>Type of entry</label>
                    <select class="form-control" name="type">
                      <option value="<?php echo $flight['techlog_type']; ?>"><?php echo $flight['techlog_type']; ?></option>
                      <option value="scheduled">Scheduled</option>
                      <option value="maintenance">Maintenance</option>
                    </select>
                  </div>
                  <div class="col-md-3">
                    <label>Date of Entry</label>
                    <input class="form-control" type="date" name="entryDate" value="<?php echo date('Y-m-d', strtotime($flight['flight_date'])); ?>">
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
                          <?php if ($_SESSION['role'] == 1) { ?>
                            <td class="text-center">Cancel</td>
                          <?php } ?>
                        </tr>
                      </thead>
                      <tbody id="fv_entryRow">
                        <!-- Display entry data -->
                        <?php if ($_SESSION['role'] == 1) { ?>
                          <?php foreach ($logs as $log): ?>
                            <tr>
                              <td class="hidden"><?php echo $log['log_id']; ?></td>
                              <td><?php echo $log['origin']; ?></td>
                              <td><?php echo $log['destination']; ?></td>
                              <td><?php echo number_format((float)$log['hours'], 2, '.', '');?></td>
                              <td><?php echo $log['cycles']; ?></td>
                              <td class="text-center"> <a ><i onclick="logRemoveFreq()" class="fa fa-times iconDel"></i></a> </td></tr>
                            </tr>
                          <?php endforeach; ?>
                        <?php } else { ?>
                          <?php foreach ($logs as $log): ?>
                            <tr>
                              <td class="hidden"><?php echo $log['log_id']; ?></td>
                              <td><?php echo $log['origin']; ?></td>
                              <td><?php echo $log['destination']; ?></td>
                              <td><?php echo number_format((float)$log['hours'], 2, '.', '');?></td>
                              <td><?php echo $log['cycles']; ?></td>
                            </tr>
                          <?php endforeach; ?>
                        <?php } ?>
                      </tbody>
                    </table>
                    <input id="fv_logs" type="hidden" name="logs" value=""> <!-- JavaScript assigned value -->
                  </div>
                </div>
              </div>
              <!-- Data entry points -->
              <div id="logDataEntry" class="col-md-12 pt">
                <div class="row">
                  <div class="col-md-12">
                    <hr>
                  </div>
                  <!-- Active when based on user role -->
                  <?php if ($_SESSION['role'] == 1) { ?>
                    <div class="col-md-2">
                        <label>From</label>
                        <select id="fv_from" class="form-control" required>
                            <option value=""> -- select from --</option>
                            <?php foreach ($locations as $location): ?>
                              <option value="<?php echo $location['location']; ?>"><?php echo $location['location']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <label>To</label>
                        <select id="fv_to" class="form-control" required>
                            <option value="">-- select to --</option>
                            <?php foreach ($locations as $location): ?>
                              <option value="<?php echo $location['location']; ?>"><?php echo $location['location']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label>Take Off</label>
                        <input id="fv_takeoff" class="form-control" type="datetime-local" required/>
                    </div>
                    <div class="col-md-3">
                        <label>Landing</label>
                        <input id="fv_landing" class="form-control" type="datetime-local" required/>
                    </div>
                    <div class="col-md-2">
                        <label>Hours</label>
                        <input id="fv_hours" class="form-control text-center" type="text" value="0.00" readonly/>
                    </div>
                    <div class="col-md-12 text-right">
                      <br />
                      <button id="fv_add" class="aviaBtn btn btn-primary">Add</button>
                    </div>
                  <?php } ?>

                  <div class="col-md-6 pt">
                    <div class="row">
                      <div class="col-md-6 input-group mb-3">
                        <div class="input-group-prepend">
                          <span class="input-group-text">Total hours</span>
                        </div>
                        <input id="fv_totalHours" class="form-control text-center" name="totalHours" value="<?php echo number_format((float)$flight['hours'], 2, '.', ''); ?>" title="Total hours" readonly/>
                      </div>
                      <div class="col-md-6 input-group mb-3">
                        <div class="input-group-prepend">
                          <span class="input-group-text">Total Cycles</span>
                        </div>
                        <input id="fv_totalCycles" class="form-control text-center" name="totalCycles" value="<?php echo $flight['cycles']; ?>" title="Total cycles" readonly/>
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
                          <?php if ($_SESSION['role'] == 1) { ?>
                            <td>Cancel</td>
                          <?php } ?>
                        </tr>
                      </thead>
                      <tbody id="fv_tblDefects">
                        <!-- JavaScript populate field -->
                        <?php foreach ($defects as $defect): ?>
                          <tr>
                            <td class="hidden"><?php echo $defect['pirep_id']; ?></td>
                            <td><?php echo $defect['defect']; ?></td>
                            <td><?php echo $defect['mel_reference']; ?></td>
                            <td><?php echo $defect['dfr_category']; ?></td>
                            <td><?php echo $defect['deferred']; ?></td>
                            <td><?php echo $defect['dfr_reason']; ?></td>
                            <td><?php echo $defect['dfr_date']; ?></td>
                            <?php if ($_SESSION['role'] == 1) { ?>
                              <td class="text-center"> <a ><i id="<?php echo $defect['pirep_id']; ?>" onclick="defectRemove(this.id)" class="fa fa-times iconDel"></i></a> </td></tr>
                            <?php } ?>
                          </tr>
                        <?php endforeach; ?>

                      </tbody>
                    </table>
                  </div>
                  <?php if ($_SESSION['role'] == 1) { ?>
                    <div class="col-md-12 pt">
                      <div class="row">
                        <div class="col-md-12">
                          <hr>
                        </div>
                        <div class="col-md-6 defectDetails">
                          <p>Defect details</p>
                          <div class="row">
                            <div class="col-md-8">
                              <!-- <label>defect</label> -->
                              <textarea id="fv_defect" class="form-control" rows="3" cols="80" placeholder="Defect" title="Defect"></textarea>
                            </div>
                            <div class="col-md-4">
                              <div class="row">
                                <div class="col-md-12">
                                  <select id="fv_ata_chapter_id" class="form-control" title="ATA Code">
                                    <option value="">-- ATA Code --</option>
                                    <?php foreach ($ata_chapters as $ata_chapter): ?>
                                      <option value="<?php echo $ata_chapter['ata_chapter_id']; ?>">00<?php echo $ata_chapter['ata_chapter']; ?>: <?php echo $ata_chapter['ata_name']; ?></option>
                                    <?php endforeach; ?>
                                  </select>
                                </div>
                                <div class="col-md-12 input-group mb-3 pt">
                                  <input id="fv_dfr_status" type="checkbox">
                                  <div class="chck_label">
                                    <label><span>__</span>Defer</label>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div id="fv_deferredDetails" class="col-md-6 deferredDetails hidden">
                          <p>Defer details</p>
                          <div class="row">
                            <div class="col-md-12">
                              <div class="row">
                                <div class="col-md-12">
                                  <textarea id="fv_limitations" class="form-control" rows="1" cols="80" placeholder="Operational limitations" title="Operational limitations"></textarea>
                                </div>
                                <div class="col-md-12">
                                  <div class="row">
                                    <div class="col-md-4 pt">
                                      <input id="fv_mel_reference" type="text" class="form-control" placeholder="MEL" title="MEL reference">
                                    </div>
                                    <div class="col-md-4 pt">
                                      <select id="fv_dfr_reason" class="form-control" title="Deferred reason">
                                        <option value="">-- select reason --</option>
                                        <option value="Lack of spares">Lack of spares</option>
                                        <option value="Insufficient time">Insufficient time</option>
                                      </select>
                                    </div>
                                    <div class="col-md-4 pt">
                                      <input id="fv_add_number" type="text" class="form-control" title="add_number" placeholder="ADD number">
                                    </div>
                                  </div>
                                </div>
                                <div class="col-md-4 pt">
                                  <select id="fv_dfr_category" class="form-control" title="Defer category">
                                    <option value="">-- Defer category --</option>
                                    <option value="A">A</option>
                                    <option value="B">B</option>
                                    <option value="C">C</option>
                                    <option value="D">D</option>
                                  </select>
                                </div>
                                <div class="col-md-4 pt">
                                  <input id="fv_dfr_date" type="date" class="form-control" title="Deferred date">
                                </div>
                                <div class="col-md-4 pt">
                                  <input id="fv_exp_date" type="date" class="form-control" title="Deferred expiry date">
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-12 clearanceDetails">
                          <p>Rectification details</p>
                          <div class="row">
                            <div class="col-md-3 pt">
                              <textarea id="fv_rectification" name="rectification" class="form-control" rows="1" cols="80" placeholder="Rectification/Actions taken" title="Rectification/Action taken"></textarea>
                            </div>
                            <div class="col-md-2 pt">
                              <input id="fv_techlog_number" name="techlog_number" type="text" class="form-control" placeholder="Techlog number" title="Techlog number">
                            </div>
                            <div class="col-md-2 pt">
                              <input id="fv_cleared_date" name="cleared_date" type="date" class="form-control" title="Cleared date">
                            </div>
                            <div class="col-md-2 pt">
                              <input id="fv_wo_number" name="wo_number" type="text" class="form-control" placeholder="Work order number" title="Work order number">
                            </div>
                            <div class="col-md-3 pt">
                              <textarea id="fv_remarks" name="remarks" class="form-control" rows="1" cols="80" placeholder="Remarks" title="Remarks"></textarea>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-12 text-right pt">
                          <button id="fv_addDefect" class="aviaBtn btn btn-primary">Add</button>
                        </div>

                      </div>
                    </div>
                  <?php } ?>
                </div>

                <input id="fv_pireps" type="hidden" name="pireps" value=""> <!-- JavaScript assigned value -->
              </div>
              <!-- Trend monitor data entry point -->
              <div id="trendData" class="pt col-md-12 hidden">
                <div class="row">
                  <div class="col-md-12">
                    <table class="table table-sm table-hover table-bordered">
                      <thead>
                        <th>Trend</th>
                        <th class="text-center">Engine 1</th>
                        <th class="text-center">Engine 2</th>
                        <?php if ($_SESSION['role'] == 1) { ?>
                          <th class="text-center">Cancel</th>
                        <?php } ?>
                      </thead>
                      <tbody id="fv_trendTable">
                        <!-- JavaScript populated table -->
                        <?php foreach ($trends as $trend): ?>
                          <tr>
                            <td><?php echo $trend['trend'] ?></td>
                            <td class="text-center"><?php echo $trend['engine_1'] ?></td>
                            <td class="text-center"><?php echo $trend['engine_2'] ?></td>
                            <?php if ($_SESSION['role'] == 1) { ?>
                              <td class="text-center"> <a ><i id="<?php echo $trend['id']; ?>" onclick="trendRemove(this.id)" class="fa fa-times iconDel"></i></a> </td></tr>
                            <?php } ?>
                          </tr>
                        <?php endforeach; ?>

                      </tbody>
                    </table>
                  </div>
                  <?php if ($_SESSION['role'] == 1) { ?>
                    <div class="col-md-12 pt">
                      <hr>
                      <div class="row">
                        <div class="col-md-3">
                          <select id="fv_trend" class="form-control" class="form-control">
                            <option value="">-- select* --</option>
                            <?php foreach ($trends as $trend): ?>
                              <option value="<?php echo $trend['trend_id']; ?>"><?php echo $trend['trend']; ?></option>
                            <?php endforeach; ?>
                          </select>
                        </div>
                        <div class="col-md-3">
                          <input id="fv_lh_eng_trend" type="text" class="form-control" value="" placeholder="Engine 1 trend *">
                        </div>
                        <div class="col-md-3">
                          <input id="fv_rh_eng_trend" type="text" class="form-control" value="" placeholder="Engine 2 trend *">
                        </div>
                        <div class="col-md-3 text-center">
                          <button id="fv_addTrend" type="button" class="aviaBtn btn btn-primary">Add</button>
                        </div>
                        <div class="col-md-12 text-center">
                          <p id="fv_trendAlert"></p>
                        </div>
                      </div>
                    </div>
                  <?php } ?>
                </div>

                <input id="fv_trendMonitor" type="hidden" name="trend_monitor" value=""> <!-- JavaScript assigned value -->
              </div>
            </div>
        </div>
      </div>
    </div>
    <hr>
    <div class="col-md-12 text-right">
      <?php if ($_SESSION['role'] == 1) { ?>
        <button type="submit" id="fv_fv_update" class="aviaBtn btn btn-primary">Update</button>
      <?php } ?>

    </div>
  </form>
<?php } else {
  redirect('auth', 'refresh');
}
 ?>

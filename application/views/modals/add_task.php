<div id="addAircraft" class="modal fade addTask" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
    <div class="card">
      <form id="taskAdd" action="maintenance/add_task" method="post">
        <div class="card-header text-center">
          <h5>Add Scheduled Task</h5>
        </div>
        <div class="card-body">
          <div id="response" class="col-xl-6 offset-md-3 alert hidden">
            <!-- response texts -->
          </div>
          <!-- Airframe data -->
          <div class="row">
            <div class="col-xl-6">
              <h6>Task Details</h6>
              <hr>
              <div class="row">
                <div class="col-xl-12">
                  <div class="row">
                    <div class="col-xl-6">
                      <label>Aircraft Reg</label>
                      <select class="form-control" name="aircraft_id" required>
                        <option value=""> -- select aircraft --</option>
                        <?php foreach ($aircrafts as $aircraft): ?>
                          <option value="<?php echo $aircraft['aircraft_id']; ?>"><?php echo $aircraft['aircraft_reg']; ?></option>
                        <?php endforeach; ?>
                      </select>
                    </div>
                    <div class="col-xl-6">
                      <label>Task Number</label>
                      <input class="form-control" type="text" name="task_card" placeholder="Task number">
                    </div>
                  </div>
                </div>
                <div class="col-xl-12">
                  <label>Task</label>
                  <textarea class="form-control" name="task" rows="2 " cols="80" placeholder="Task"></textarea>
                </div>
                <div class="col-xl-12">
                  <div class="row">
                    <div class="col-xl-4">
                      <label>Category</label>
                      <select class="form-control" name="comp_cat_id" required>
                        <option value=""> -- select category --</option>
                        <?php foreach ($comp_cats as $comp_cat): ?>
                          <option value="<?php echo $comp_cat['comp_cat_id']; ?>"><?php echo $comp_cat['comp_cat']; ?></option>
                        <?php endforeach; ?>
                      </select>
                    </div>
                    <div class="col-xl-4">
                      <label>Zone</label>
                      <input class="form-control" type="text" name="zone" placeholder="Zone">
                    </div>
                    <div class="col-xl-4">
                      <label>Location</label>
                      <input class="form-control" type="text" name="location" placeholder="Location">
                    </div>
                  </div>
                </div>
                <div class="col-xl-12 pt">
                  <div class="row">
                    <div class="col-xl-3">
                      <label>Schedule type</label>
                      <select class="form-control" name="schedule_type_id" required>
                        <option value=""> -- select --</option>
                        <?php foreach ($schedule_types as $schedule_type): ?>
                          <option value="<?php echo $schedule_type['type_id']; ?>"><?php echo $schedule_type['schedule_type']; ?></option>
                        <?php endforeach; ?>
                      </select>
                    </div>
                    <div class="col-xl-3">
                      <label>Task category</label>
                      <select class="form-control" name="task_category_id" required>
                        <option value=""> -- select --</option>
                        <?php foreach ($task_categories as $task_cat): ?>
                          <option value="<?php echo $task_cat['task_category_id']; ?>"><?php echo $task_cat['task_category']; ?></option>
                        <?php endforeach; ?>
                      </select>
                    </div>
                    <div class="col-xl-3">
                      <label>Schedule category</label>
                      <select class="form-control" name="schedule_cat_id" required>
                        <option value=""> -- select --</option>
                        <?php foreach ($schedule_categories as $schedule_cat): ?>
                          <option value="<?php echo $schedule_cat['schedule_cat_id']; ?>"><?php echo $schedule_cat['schedule_category']; ?></option>
                        <?php endforeach; ?>
                      </select>
                    </div>
                    <div class="col-xl-3">
                      <label>Inspection type</label>
                      <select class="form-control" name="inspection_id" required>
                        <option value=""> -- select --</option>
                        <?php foreach ($inspection_types as $inspection_type): ?>
                          <option value="<?php echo $inspection_type['inspection_id']; ?>"><?php echo $inspection_type['inspection']; ?></option>
                        <?php endforeach; ?>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="col-xl-12 pb">
                  <label>ATA Chapter</label>
                  <select class="form-control" name="ata_chapter_id" required>
                    <option value=""> -- select ATA Chapter --</option>
                    <?php foreach ($ata_chapters as $ata_chapter): ?>
                      <option value="<?php echo $ata_chapter['ata_chapter_id']; ?>">00<?php echo $ata_chapter['ata_chapter']; ?>: <?php echo $ata_chapter['ata_name']; ?></option>
                    <?php endforeach; ?>
                  </select>
                </div>
                <div class="col-xl-12 pt pb">
                  <h6>Component details</h6>
                  <hr>
                  <div class="row">
                    <div class="col-xl-4">
                      <label>Part name</label>
                      <input class="form-control" type="text" name="part_name" placeholder="Part name">
                    </div>
                    <div class="col-xl-4">
                      <label>Part number</label>
                      <input class="form-control" type="text" name="part_number" placeholder="Part number">
                    </div>
                    <div class="col-xl-4">
                      <label>Serial number</label>
                      <input class="form-control" type="text" name="serial_number" placeholder="Serial number">
                    </div>
                  </div>
                </div>
                <div class="col-xl-12">
                  <textarea class="form-control" name="reference" rows="2" cols="80" placeholder="Task/Component reference"></textarea>
                </div>

              </div>
            </div>
            <div class="col-xl-6">
              <h6>Frequencies</h6>
              <hr>
              <div class="row">
                <div class="col-xl-12">
                  <div class="row">
                    <div class="col-xl-12">
                      <table class="table table-sm table-bordered table-hover">
                        <thead>
                          <tr>
                            <th>Type</th>
                            <th class="text-right">Cycles</th>
                            <th class="text-right">Hours</th>
                            <th class="text-center">Calendar</th>
                            <th class="text-center">Action</th>
                          </tr>
                        </thead>
                        <tbody id="schedule_details">
                          <!-- JavaScript data display -->

                        </tbody>
                      </table>
                    </div>
                    <div class="col-xl-12">
                      <div class=row>
                        <div class="col-xl-3">
                          <label>Type</label>
                          <select id="maint_type_id" class="form-control">
                            <option value="1">Initial</option>
                            <option value="2">Repeat</option>
                          </select>
                        </div>
                        <div class="col-xl-3">
                          <label>Cycles</label>
                          <input id="freq_cycles" class="form-control" type="text" placeholder="cycles" value="0">
                        </div>
                        <div class="col-xl-3">
                          <label>Hours</label>
                          <input id="freq_hours" class="form-control" type="text" placeholder="hours" value="0.00">
                        </div>
                        <div class="col-xl-3">
                          <label>Calendar</label>
                          <div class="row">
                            <div class="col-xl-12 input-group mb-3">
                              <input id="freq_calendar" class="form-control" name="freq_calendar" type="text" placeholder=" Calendar" value="0">
                              <select id="freq_period" class="form-control" name="period">
                                <option value="D">D</option>
                                <option value="M">M</option>
                                <option value="Y">Y</option>
                              </select>
                            </div>
                          </div>
                        </div>
                        <div class="col-xl-12 pb text-right">
                          <button id="add_freq" type="button" class="aviaBtn btn btn-primary">Add</button>
                        </div>
                        <input id="frequencies" type="hidden" name="frequencies" value="">
                      </div>
                    </div>
                    <div class="col-12">
                      <div class="row">
                        <div class="col-xl-12 input-group mb-3">
                          <div class="input-group-prepend">
                            <span class="input-group-text">Life Limits:</span>
                          </div>
                          <input id="life_limit_cycles" class="form-control" type="text" name="life_limit_cycles" placeholder="cycles" value="0" title="cycles">
                          <input id="life_limit_hours" class="form-control" type="text" name="life_limit_hours" placeholder="hours" value="0" title="hours">
                          <input id="life_limit_calendar" class="form-control" type="text" name="life_limit_calendar" placeholder=" Calendar" value="0" title="calendar time">
                          <select id="life_limit_period" class="form-control" name="life_limit_period">
                            <option value="D">D</option>
                            <option value="M">M</option>
                            <option value="Y">Y</option>
                          </select>
                        </div>
                        <div class="col-xl-12 input-group mb-3">
                          <div class="input-group-prepend">
                            <span class="input-group-text">Alarm:</span>
                          </div>
                          <input id="alarm_cycles" class="form-control" type="text" name="alarm_cycles" placeholder="cycles" value="0" title="cycles" required>
                          <input id="alarm_hours" class="form-control" type="text" name="alarm_hours" placeholder="hours" value="0" title="hours" required>
                          <input id="alarm_calendar" class="form-control" type="text" name="alarm_calendar" placeholder=" Calendar" value="0" required>
                          <select id="alarm_period" class="form-control" name="alarm_period" required>
                            <option value="D">D</option>
                            <option value="M">M</option>
                            <option value="Y">Y</option>
                          </select>
                        </div>

                      </div>
                    </div>
                    <div class="col-xl-12 pt">
                      <h6>Compliance details</h6>
                      <hr>
                      <div class="row">
                        <div class="col-xl-12 input-group mb-3">
                          <div class="input-group-prepend">
                            <span class="input-group-text">Last done:</span>
                          </div>
                          <input id="last_done_cycles"  class="form-control" type="text" name="last_done_cycles" placeholder="cycles" value="0" title="cycles" required>
                          <input id="last_done_hours"  class="form-control" type="text" name="last_done_hours" placeholder="hours" value="0" title="hours" required>
                          <input id="last_done_date"  class="form-control" type="date" name="last_done_date" placeholder="Date" title="date">
                        </div>
                        <div class="col-xl-12 input-group mb-3">
                          <div class="input-group-prepend">
                            <span class="input-group-text">Cumulative:</span>
                          </div>
                          <input id="cum_cycles" class="form-control" type="text" name="cum_cycles" placeholder="cycles" value="0" title="cycles" required>
                          <input id="cum_hours" class="form-control" type="text" name="cum_hours" placeholder="hours" value="0" title="hours" required>
                        </div>
                        <div class="col-xl-12 input-group mb-3">
                          <div class="input-group-prepend">
                            <span class="input-group-text">Next due:</span>
                          </div>
                          <!-- populate details from JavaScript/Db -->
                          <input id="next_due_cycles" class="form-control" type="text" name="next_due_cycles" placeholder="cycles" value="" readonly title="Due cycles">
                          <input id="next_due_hours" class="form-control" type="text" name="next_due_hours" placeholder="hours" value="" readonly title="Due hours">
                          <input id="next_due_date" class="form-control" type="text" name="next_due_date" placeholder="Date" value="" readonly title="Due date">
                        </div>
                        <div class="col-xl-12 text-right">
                          <!-- <button id="calcDues" class="aviaBtn btn btn-primary" type="button" >Calculate</button> -->
                        </div>

                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
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

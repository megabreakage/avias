<script>
  task_frequencies = JSON.parse('<?php echo json_encode($schedule_details); ?>');
</script>

<form id="taskUpdate" action="<?php echo base_url('maintenance/update_task')?>" method="post">
  <div id="v_task_response" class="col-md-6 offset-md-3 alert hidden text-center">
    <!-- response texts -->
  </div>
  <!-- Airframe data -->
  <div class="row">
    <div class="col-xl-6 pb">
      <h6>Task Details</h6>
      <hr>
      <div class="row">
        <input id="v_schedule_id" type="hidden" name="schedule_id" value="<?php echo $schedule['schedule_id']?>">
        <div class="col-md-12">
          <div class="row">
            <div class="col-md-6">
              <label>Aircraft Reg</label>
              <select class="form-control" name="aircraft_id" required>
                <option value="<?php echo $schedule['aircraft_id']; ?>"><?php echo $schedule['aircraft_reg']; ?></option>
                <?php foreach ($aircrafts as $aircraft): ?>
                  <option value="<?php echo $aircraft['aircraft_id']; ?>"><?php echo $aircraft['aircraft_reg']; ?></option>
                <?php endforeach; ?>
              </select>
            </div>
            <div class="col-md-6">
              <label>Task Number</label>
              <input class="form-control" type="text" name="task_card" value="<?php echo $schedule['task_card']; ?>" placeholder="Task number">
            </div>
          </div>
        </div>
        <div class="col-md-12">
          <label>Task</label>
          <textarea class="form-control" name="task" rows="2 " cols="80" placeholder="Task"> <?php echo $schedule['task']; ?></textarea>
        </div>
        <div class="col-md-12">
          <div class="row">
            <div class="col-md-4">
              <label>Category</label>
              <select class="form-control" name="comp_cat_id" required>
                <option value="<?php echo $schedule['comp_cat_id']; ?>"> <?php echo $schedule['comp_cat']; ?></option>
                <?php foreach ($comp_cats as $comp_cat): ?>
                  <option value="<?php echo $comp_cat['comp_cat_id']; ?>"><?php echo $comp_cat['comp_cat']; ?></option>
                <?php endforeach; ?>
              </select>
            </div>
            <div class="col-md-4">
              <label>Zone</label>
              <input class="form-control" type="text" name="zone" value="<?php echo $schedule['zone'] ?>" placeholder="Zone">
            </div>
            <div class="col-md-4">
              <label>Location</label>
              <input class="form-control" type="text" name="location" value="<?php echo $schedule['location']; ?>" placeholder="Location">
            </div>
          </div>
        </div>
        <div class="col-md-12 pt">
          <div class="row">
            <div class="col-md-3">
              <label>Schedule type</label>
              <select class="form-control" name="schedule_type_id" required>
                <option value="<?php echo $schedule['type_id'] ?>"><?php echo $schedule['schedule_type'] ?></option>
                <?php foreach ($schedule_types as $schedule_type): ?>
                  <option value="<?php echo $schedule_type['type_id']; ?>"><?php echo $schedule_type['schedule_type']; ?></option>
                <?php endforeach; ?>
              </select>
            </div>
            <div class="col-md-3">
              <label>Task category</label>
              <select class="form-control" name="task_category_id" required>
                <option value="<?php echo $schedule['task_category_id'] ?>"> <?php echo $schedule['task_category'] ?></option>
                <?php foreach ($task_categories as $task_cat): ?>
                  <option value="<?php echo $task_cat['task_category_id']; ?>"><?php echo $task_cat['task_category']; ?></option>
                <?php endforeach; ?>
              </select>
            </div>
            <div class="col-md-3">
              <label>Schedule category</label>
              <select class="form-control" name="schedule_cat_id" required>
                <option value="<?php echo $schedule['schedule_cat_id'] ?>"> <?php echo $schedule['schedule_category'] ?></option>
                <?php foreach ($schedule_categories as $schedule_cat): ?>
                  <option value="<?php echo $schedule_cat['schedule_cat_id']; ?>"><?php echo $schedule_cat['schedule_category']; ?></option>
                <?php endforeach; ?>
              </select>
            </div>
            <div class="col-md-3">
              <label>Inspection type</label>
              <select class="form-control" name="inspection_id" required>
                <option value="<?php echo $schedule['inspection_id'] ?>"><?php echo $schedule['schedule_type'] ?></option>
                <?php foreach ($inspection_types as $inspection_type): ?>
                  <option value="<?php echo $inspection_type['inspection_id']; ?>"><?php echo $inspection_type['inspection']; ?></option>
                <?php endforeach; ?>
              </select>
            </div>
          </div>
        </div>
        <div class="col-md-12 pb">
          <label>ATA Chapter</label>
          <select class="form-control" name="ata_chapter_id" required>
            <option value="<?php echo $schedule['ata_chapter_id'] ?>"><?php echo $schedule['ata_chapter']; ?>00: <?php echo $schedule['ata_name'] ?></option>
            <?php foreach ($ata_chapters as $ata_chapter): ?>
              <option value="<?php echo $ata_chapter['ata_chapter_id']; ?>"><?php echo $ata_chapter['ata_chapter']; ?>00: <?php echo $ata_chapter['ata_name']; ?></option>
            <?php endforeach; ?>
          </select>
        </div>
        <div class="col-md-12 pt pb">
          <h6>Component details</h6>
          <hr>
          <div class="row">
            <div class="col-md-4">
              <label>Part name</label>
              <input class="form-control" type="text" name="part_name" value="<?php echo $schedule['part_name']; ?>" placeholder="Part name">
            </div>
            <div class="col-md-4">
              <label>Part number</label>
              <input class="form-control" type="text" name="part_number" value="<?php echo $schedule['part_number']; ?>" placeholder="Part number">
            </div>
            <div class="col-md-4">
              <label>Serial number</label>
              <input class="form-control" type="text" name="serial_number" value="<?php echo $schedule['serial_number']; ?>" placeholder="Serial number">
            </div>
          </div>
        </div>
        <div class="col-md-12">
          <textarea class="form-control" name="reference" rows="2" cols="80" placeholder="Task/Component reference"><?php echo $schedule['reference'] ?></textarea>
        </div>

      </div>
    </div>
    <div class="col-xl-6">
      <h6>Frequencies</h6>
      <hr>
      <div class="row">
        <div class="col-md-12">
          <div class="row">
            <div class="col-md-12">
              <table id="v_tblScheduleFrequencies" class="table table-sm table-bordered table-hover">
                <thead>
                  <tr>
                    <th>Type</th>
                    <th class="text-right">Cycles</th>
                    <th class="text-right">Hours</th>
                    <th class="text-center">Calendar</th>
                    <th class="text-center"></th>
                  </tr>
                </thead>
                <?php if ($_SESSION['role'] == 1) { ?>
                  <tbody id="v_freqScheduleDetails">
                    <?php foreach ($schedule_details as $detail): ?>
                      <tr>
                        <td class="hidden"><?php echo $detail['schedule_details_id']; ?></td>
                        <td><?php echo $detail['maint_type_id']; ?></td>
                        <td class="text-right"><?php echo $detail['cycles']; ?></td>
                        <td class="text-right"><?php echo $detail['hours']; ?></td>
                        <td class="text-center"><?php echo $detail['calendar'].$detail['period']; ?></td>
                        <td class="text-center"> <a ><i onclick="removeFreq()" class="fa fa-times iconDel"></i></a> </td></tr>
                      </tr>
                    <?php endforeach; ?>
                  </tbody>
                <?php } else { ?>
                  <tbody id="v_freqScheduleDetails">
                    <?php foreach ($schedule_details as $detail): ?>
                      <tr>
                        <td class="hidden"><?php echo $detail['schedule_details_id']; ?></td>
                        <td><?php echo $detail['maint_type_id']; ?></td>
                        <td class="text-right"><?php echo $detail['cycles']; ?></td>
                        <td class="text-right"><?php echo $detail['hours']; ?></td>
                        <td class="text-center"><?php echo $detail['calendar'].$detail['period']; ?></td>
                        <td class="text-center"> <a><i class=""></i></a> </td></tr>
                      </tr>
                    <?php endforeach; ?>
                  </tbody>
                <?php } ?>
              </table>
            </div>
            <?php if ($_SESSION['role'] == 1) { ?>
              <div class="col-md-12">
                <div class=row>
                  <div class="col-md-3">
                    <label>Type</label>
                    <select id="v_maint_type_id" class="form-control">
                      <option value="1">Initial</option>
                      <option value="2">Repeat</option>
                      <option value="3">Discard</option>
                    </select>
                  </div>
                  <div class="col-md-3">
                    <label>Cycles</label>
                    <input id="v_freq_cycles" class="form-control" type="text" placeholder="cycles" value="0">
                  </div>
                  <div class="col-md-3">
                    <label>Hours</label>
                    <input id="v_freq_hours" class="form-control" type="text" placeholder="hours" value="0.00">
                  </div>
                  <div class="col-md-3">
                    <label>Calendar</label>
                    <div class="row">
                      <div class="col-md-12 input-group mb-3">
                        <input id="v_freq_calendar" class="form-control" name="freq_calendar" type="text" placeholder=" Calendar" value="0">
                        <select id="v_freq_period" class="form-control" name="period">
                          <option value="D">D</option>
                          <option value="M">M</option>
                          <option value="Y">Y</option>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-12 pb text-right">
                    <button id="v_add_freq" type="button" class="aviaBtn btn btn-primary">Add</button>
                  </div>
                  <input id="v_frequencies" type="hidden" name="frequencies" value="<?php echo json_encode($schedule_details); ?>">
                </div>
              </div>
            <?php } ?>
            <div class="col-12">
              <div class="row">
                <div class="col-md-12 input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text">Life Limits:</span>
                  </div>
                  <input id="v_life_limit_cycles" class="form-control" type="text" name="life_limit_cycles" placeholder="cycles" value="<?php echo $schedule['life_limit_cycles']; ?>" title="cycles">
                  <input id="v_life_limit_hours" class="form-control" type="text" name="life_limit_hours" placeholder="hours" value="<?php echo $schedule['life_limit_hours']; ?>" title="hours">
                  <input id="v_life_limit_calendar" class="form-control" type="text" name="life_limit_calendar" placeholder=" Calendar" value="<?php echo $schedule['life_limit_calendar']; ?>" title="calendar time">
                  <select id="v_life_limit_period" class="form-control" name="life_limit_period">
                    <option value="<?php echo $schedule['life_limit_period']; ?>"><?php echo $schedule['life_limit_period']; ?></option>
                    <option value="D">D</option>
                    <option value="M">M</option>
                    <option value="Y">Y</option>
                  </select>
                </div>
                <div class="col-md-12 input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text">Alarm:</span>
                  </div>
                  <input id="v_alarm_cycles" class="form-control" type="text" name="alarm_cycles" placeholder="cycles" value="<?php echo $schedule['alarm_cycles']; ?>" title="cycles" required>
                  <input id="v_alarm_hours" class="form-control" type="text" name="alarm_hours" placeholder="hours" value="<?php echo $schedule['alarm_hours']; ?>" title="hours" required>
                  <input id="v_alarm_calendar" class="form-control" type="text" name="alarm_calendar" placeholder=" Calendar" value="<?php echo $schedule['alarm_calendar']; ?>" required>
                  <select id="v_alarm_period" class="form-control" name="alarm_period" required>
                  <option value="<?php echo $schedule['alarm_period']; ?>"><?php echo $schedule['alarm_period']; ?></option>
                    <option value="D">D</option>
                    <option value="M">M</option>
                    <option value="Y">Y</option>
                  </select>
                </div>

              </div>
            </div>
            <div class="col-md-12 pt">
              <h6>Compliance details</h6>
              <hr>
              <div class="row">
                <div class="col-md-12 input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text">Last done:</span>
                  </div>
                  <input id="v_last_done_cycles"  class="form-control" type="text" name="last_done_cycles" placeholder="cycles" value="<?php echo $schedule['last_done_cycles']; ?>" title="cycles" required>
                  <input id="v_last_done_hours"  class="form-control" type="text" name="last_done_hours" placeholder="hours" value="<?php echo $schedule['alarm_hours']; ?>" title="hours" required>
                  <input id="v_last_done_date"  class="form-control" type="date" name="last_done_date" placeholder="Date" value="<?php echo date('Y-m-d', strtotime($schedule['date_checked'])); ?>" title="date">
                </div>
                <div class="col-md-12 input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text">Cumulative:</span>
                  </div>
                  <input id="v_cum_cycles" class="form-control" type="text" name="cum_cycles" placeholder="cycles" value="<?php echo $schedule['cum_cycles']; ?>" title="cycles" required>
                  <input id="v_cum_hours" class="form-control" type="text" name="cum_hours" placeholder="hours" value="<?php echo $schedule['cum_hours']; ?>" title="hours" required>
                </div>
                <div class="col-md-12 input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text">Next due:</span>
                  </div>
                  <!-- populate details from JavaScript/Db -->
                  <input id="v_next_due_cycles" class="form-control" type="text" name="next_due_cycles" placeholder="cycles" value="<?php echo $schedule['next_due_cycles']; ?>" readonly title="Due cycles">
                  <input id="v_next_due_hours" class="form-control" type="text" name="next_due_hours" placeholder="hours" value="<?php echo $schedule['next_due_hours']; ?>" readonly title="Due hours">
                  <input id="v_next_due_date" class="form-control" type="text" name="next_due_date" placeholder="Date" value="<?php echo date('Y-m-d', strtotime($schedule['next_due_date'])); ?>" readonly title="Due date">
                </div>
                <div class="col-md-12 text-right">
                  <!-- <button id="v_calcDues" class="aviaBtn btn btn-primary" type="button" >Calculate</button> -->
                </div>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-12 text-right">
      <!-- <button name="clear" class="aviaBtn btn btn-danger" data-dismiss="modal"> Cancel</button> -->
      <?php if ($_SESSION['role'] == 1) { ?>
        <button type="submit" class="aviaBtn btn btn-primary">Update</button>
      <?php } ?>

    </div>
  </div>

</form>

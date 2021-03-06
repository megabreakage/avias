<?php if (isset($_SESSION['loggedin'])) { ?>

  <h5>Scheduled Maintenance Tasks</h5>

  <div class="row">
    <div class="col-md-12 pt">
      <form action="maintenance/search_tasks" method="post">
        <div class="row">
          <div class="col-md-3 input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text">Select Aircraft:</span>
            </div>
            <select id="all_search_id" class="form-control" name="aircraft_id">
              <option value="all">All</option>
              <?php foreach ($aircrafts as $aircraft): ?>
                <option value="<?php echo $aircraft['aircraft_id'] ?>"><?php echo $aircraft['aircraft_reg'] ?></option>
              <?php endforeach; ?>
            </select>
          </div>
        </div>
      </form>
    </div>
    <div class="col-md-12 pt pb scheduledTasks">
      <table class="table table-sm table-hover table-bodered table-striped">
        <thead>
          <tr>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th class="cat1"></th>
            <th class="text-center cat1">Frequency</th>
            <th class="cat1"></th>
            <th class="cat2"></th>
            <th class="text-center cat2">Since Maint</th>
            <th class="cat2"></th>
            <th class="cat3"></th>
            <th class="text-center cat3">Remaining</th>
            <th class="cat3"></th>
            <th></th>
          </tr>
          <tr>
            <th></th>
            <th>Reg</th>
            <th>ATA</th>
            <th>Component/Task</th>
            <th class="text-center">Type</th>
            <th class="text-center">Last Check</th>
            <th class="text-center cat1">Cycles</th>
            <th class="text-center cat1">Hours</td>
            <th class="text-center cat1">Calendar</th>
            <th class="text-center cat2">Cycles</th>
            <th class="text-center cat2">Hours</th>
            <th class="text-center cat2">Calendar</th>
            <th class="text-center cat3">Cycles</th>
            <th class="text-center cat3">Hours</th>
            <th class="text-center cat3">Days</th>
          </tr>
        </thead>
        <tbody id="tblAllTasks">
          <?php $i = 1; foreach ($scheduled_tasks as $task): ?>
            <tr>
              <td><?php echo $i; ?>.</td>
              <td><?php echo $task['aircraft_reg']; ?></td>
              <td><?php echo $task['ata_chapter']."00"; ?></td>
              <td> <a href="<?php echo base_url()?>maintenance/view_task/<?php echo $task['schedule_id']; ?>"><?php echo substr($task['task'], 0, 35); ?> <?php echo substr($task['part_name'], 0, 35); ?></a> </td>
              <td class="text-center"><?php echo $task['task_category']; ?></td>
              <td class="text-center"><?php echo date('d, M Y', strtotime($task['date_checked'])); ?></td>
              <td class="text-center cat1"><?php echo $task['cycles']; ?></td>
              <td class="text-center cat1"><?php echo $task['hours']; ?></td>
              <td class="text-center cat1"><?php echo $task['calendar'].$task['period']; ?></td>
              <td class="text-center cat2"><?php echo $task['cum_cycles'] - $task['last_done_cycles']; ?></td>
              <td class="text-center cat2"><?php echo $task['cum_hours'] - $task['last_done_hours']; ?></td>
              <td class="text-center cat2"><?php echo $task['calendar'].$task['period']; ?></td>
              <td class="text-center cat3"><?php echo $task['next_due_cycles'] - $task['cum_cycles']; ?></td>
              <td class="text-center cat3"><?php echo $task['next_due_hours'] - $task['cum_hours']; ?></td>
              <td class="text-center cat3"><?php echo (date_diff(date_create($task['next_due_date']), date_create($task['date_checked'])))->format("%a days"); ?></td>
              <td class="text-center">
                <a href="maintenance/edit_task/<?php echo $task['schedule_id']; ?>"><i class="fa fa-pencil tableIcons" title="edit <?php echo $task['task']; ?>"></i></a>
              </td>
            </tr>
          <?php $i += 1; endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>

<?php
  } else {
    redirect('auth', 'refresh');
  }
?>

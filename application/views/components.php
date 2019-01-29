
<div class="row">
  <div class="col-md-12 pt">
    <form action="maintenance/search_tasks" method="post">
      <div class="row">
        <div class="col-md-2 input-group mb-3">
          <div class="input-group-prepend">
            <span class="input-group-text">Search by:</span>
          </div>
          <select class="form-control" id="search_by">
            <option value="1">Aircraft Reg</option>
            <option value="2">ATA chapter</option>
            <option value="3">Component category</option>
            <option value="4">Inspection type</option>
            <option value="5">Schedule category</option>
            <option value="6">Schedule type</option>
            <option value="7">Task categoty</option>
          </select>
        </div>
        <div id="c_aircraft_id" class="col-md-2">
          <select id="cs_craft_id" class="form-control" name="aircraft_id">
            <option value=""> -- select -- </option>
            <?php foreach ($aircrafts as $aircraft): ?>
              <option value="<?php echo $aircraft['aircraft_id'] ?>"><?php echo $aircraft['aircraft_reg'] ?></option>
            <?php endforeach; ?>
          </select>
        </div>
        <div id="c_ata_chapter_id" class="col-md-2 hidden">
          <select id="cs_ata_id" class="form-control" name="ata_chapter_id">
            <?php foreach ($ata_chapters as $ata_chapter): ?>
              <option value="<?php echo $ata_chapter['ata_chapter_id']; ?>">00<?php echo $ata_chapter['ata_chapter']; ?>: <?php echo $ata_chapter['ata_name']; ?></option>
            <?php endforeach; ?>
          </select>
        </div>
        <div id="c_comp_cat_id" class="col-md-2 hidden">
          <select id="cs_comp_cat_id" class="form-control" name="comp_cat_id">
            <?php foreach ($comp_cats as $comp_cat): ?>
              <option value="<?php echo $comp_cat['comp_cat_id']; ?>"><?php echo $comp_cat['comp_cat']; ?></option>
            <?php endforeach; ?>
          </select>
        </div>
        <div id="c_inspection_id" class="col-md-2 hidden">
          <select id="cs_insp_id" class="form-control" name="inspection_id">
            <?php foreach ($inspection_types as $inspection_type): ?>
              <option value="<?php echo $inspection_type['inspection_id']; ?>"><?php echo $inspection_type['inspection']; ?></option>
            <?php endforeach; ?>
          </select>
        </div>
        <div id="c_schedule_cat_id" class="col-md-2 hidden">
          <select id="cs_sche_cat_id" class="form-control" name="schedule_cat_id">
            <?php foreach ($schedule_categories as $schedule_cat): ?>
              <option value="<?php echo $schedule_cat['schedule_cat_id']; ?>"><?php echo $schedule_cat['schedule_category']; ?></option>
            <?php endforeach; ?>
          </select>
        </div>
        <div id="c_schedule_type_id" class="col-md-2 hidden">
          <select id="cs_type_id" class="form-control" name="schedule_type_id">
            <?php foreach ($schedule_types as $schedule_type): ?>
              <option value="<?php echo $schedule_type['type_id']; ?>"><?php echo $schedule_type['schedule_type']; ?></option>
            <?php endforeach; ?>
          </select>
        </div>
        <div id="c_task_category_id" class="col-md-2 hidden">
          <select id="cs_id_cat_id" class="form-control" name="task_category_id">
            <?php foreach ($task_categories as $task_cat): ?>
              <option value="<?php echo $task_cat['task_category_id']; ?>"><?php echo $task_cat['task_category']; ?></option>
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
          <th>Component</th>
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
      <tbody>
        <?php $i = 1; foreach ($component_tasks as $task): ?>
          <tr>
            <td><?php echo $i; ?>.</td>
            <td><?php echo $task['aircraft_reg']; ?></td>
            <td><?php echo "00".$task['ata_chapter']; ?></td>
            <td> <a href="<?php echo base_url()?>maintenance/view_task/<?php echo $task['schedule_id']; ?>"><?php echo substr($task['part_name'], 0, 35); ?></a> </td>
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

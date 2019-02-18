<?php if (isset($_SESSION['loggedin'])) { ?>
  
  <div class="row">
    <div class="col-md-2 input-group">
      <div class="input-group-prepend">
        <span class="input-group-text">Select Aircraft: </span>
      </div>
      <select id="d_search_by" class="form-control" name="aircraft_reg">
        <option value="all">All</option>
        <option value="1">Aircraft Reg</option>
        <option value="2">ATA Chapter</option>
        <option value="3">Deferred</option>
        <option value="4">Defered date Between</option>
      </select>
    </div>
    <div id="d_aircraft_id" class="col-md-2 hidden">
      <select id="dfr_aircraft_id" class="form-control">
        <?php foreach ($aircrafts as $aircraft): ?>
          <option value="<?php echo $aircraft['aircraft_id'] ?>"><?php echo $aircraft['aircraft_reg'] ?></option>
        <?php endforeach; ?>
      </select>
    </div>
    <div id="d_ata_id" class="col-md-2 hidden">
      <select id="dfr_ata_id" class="form-control">
        <?php foreach ($ata_chapters as $ata_chapter): ?>
          <option value="<?php echo $ata_chapter['ata_chapter_id']; ?>"><?php echo $ata_chapter['ata_chapter']; ?>00: <?php echo $ata_chapter['ata_name']; ?></option>
        <?php endforeach; ?>
      </select>
    </div>
    <div id="d_status" class="col-md-2 hidden">
      <select id="dfr_status" class="form-control">
        <option value="Yes">Yes</option>
        <option value="No">No</option>
      </select>
    </div>
    <div id="d_dates" class="col-md-4 input-group mb3 hidden">
      <div class="input-group-prepend">
        <span class="input-group-text"> between </span>
      </div>
      <input id="dfr_from_date" type="date" class="form-control">
      <div class="input-group-append input-group-prepend">
        <span class="input-group-text"> and </span>
      </div>
      <input id="dfr_to_date" type="date" class="form-control">
    </div>
    <div class="col-md-12 pt pb models">
      <table class="table table-sm table-hover table-bodered table-striped">
        <thead>
          <tr>
            <th></th>
            <th>Techlog</th>
            <th class="text-center">Aircraft Reg</th>
            <th class="text-center">ATA Code</th>
            <th>Defect</th>
            <th class="text-center">Deferred</th>
            <th class="text-center">Category</th>
            <th class="text-center">Dfr date</th>
            <th class="text-center">Expiry date</th>
          </tr>
        </thead>
        <tbody id="defectsDisplay">
          <?php $i = 1; foreach ($defects as $defect): ?>
            <tr>
              <td><?php echo $i; ?>.</td>
              <td><?php echo $defect['techlog']; ?></td>
              <td class="text-center"><?php echo $defect['aircraft_reg']; ?></td>
              <td class="text-center">00<?php echo $defect['ata_chapter']; ?></td>
              <td><?php echo $defect['defect']; ?></td>
              <td class="text-center"><?php echo $defect['deferred']; ?></td>
              <td class="text-center"><?php echo $defect['dfr_category']; ?></td>
              <td class="text-center"><?php echo $defect['dfr_date']; ?></td>
              <td class="text-center"><?php echo $defect['exp_date']; ?></td>
              <td class="text-center">
                <a href="#"><i class="fa fa-pencil tableIcons" title="view defect>"></i></a>
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

<h5>Defects</h5>

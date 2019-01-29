<h5>Defects</h5>
<div class="row">
  <div class="col-md-3 input-group">
    <div class="input-group-prepend">
      <span class="input-group-text">Select Aircraft: </span>
    </div>
    <select id="dfr_aircraft_reg" class="form-control" name="aircraft_reg">
      <option value="all">All</option>
      <?php foreach ($aircrafts as $aircraft): ?>
        <option value="<?php echo $aircraft['aircraft_id'] ?>"><?php echo $aircraft['aircraft_reg'] ?></option>
      <?php endforeach; ?>
    </select>
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
      <tbody id="flightDisplay">
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

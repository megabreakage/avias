<h2>Flights</h2>
<div class="row">
  <div class="col-lg-12 pt">
    <div class="row">
      <div class="col-lg-1 text-right col-sm-6">
        Select Aircraft
      </div>
      <div class="col-lg-2 col-sm-6">
          <select id="aircraft_reg" class="form-control" name="aircraft_reg">
            <option value="all">All</option>
            <?php foreach ($aircrafts as $aircraft): ?>
              <option value="<?php echo $aircraft['aircraft_id'] ?>"><?php echo $aircraft['aircraft_reg'] ?></option>
            <?php endforeach; ?>
          </select>
      </div>
    </div>
  </div>
  <div class="col-xl-12 pt pb models">
    <table class="table table-hover table-bodered table-striped">
      <thead>
        <tr>
          <td>#</td>
          <td>Techlog</td>
          <td>Aircraft Reg</td>
          <td class="text-right">Cycles</td>
          <td class="text-right"> Hours</td>
          <td>Date Posted</td>
          <td class="text-center">Action</td>
        </tr>
      </thead>
      <tbody id="flightDisplay">
        <?php $i = 1; foreach ($flights as $flight): ?>
          <tr>
            <td><?php echo $i; ?>.</td>
            <td><?php echo $flight['techlog']; ?></td>
            <td><?php echo $flight['aircraft_reg']; ?></td>
            <td class="text-right"><?php echo $flight['cycles']; ?></td>
            <td class="text-right"><?php echo $flight['hours']; ?></td>
            <td><?php echo $flight['date_posted']; ?></td>
            <td class="text-center">
              <a href="#"><i class="fa fa-pencil tableIcons" title="view flight ?>"></i></a>
            </td>
          </tr>
        <?php $i += 1; endforeach; ?>
      </tbody>
    </table>
  </div>
</div>

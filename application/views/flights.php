<?php if (isset($_SESSION['loggedin'])) { ?>

<h5>Flights</h5>
<div class="row">
  <div class="col-md-3 input-group">
    <div class="input-group-prepend">
      <span class="input-group-text">Select Aircraft: </span>
    </div>
    <select id="aircraft_reg" class="form-control" name="aircraft_reg">
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
          <th class="text-right">Cycles</th>
          <th class="text-right"> Hours</th>
          <th class="text-center">Date Posted</th>
          <th class="text-center">Action</th>
        </tr>
      </thead>
      <tbody id="flightDisplay">
        <?php $i = 1; foreach ($flights as $flight): ?>
          <tr>
            <td><?php echo $i; ?>.</td>
            <td><?php echo $flight['techlog']; ?></td>
            <td class="text-center"><?php echo $flight['aircraft_reg']; ?></td>
            <td class="text-right"><?php echo $flight['cycles']; ?></td>
            <td class="text-right"><?php echo $flight['hours']; ?></td>
            <td class="text-center"><?php echo $flight['date_posted']; ?></td>
            <td class="text-center">
              <a href="<?php echo base_url('flights/view_flight/'.$flight['flight_id']); ?>"><i class="fa fa-pencil tableIcons" title="view flight ?>"></i></a>
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

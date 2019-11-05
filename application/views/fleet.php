<?php if (isset($_SESSION['loggedin'])) { ?>

<h2>List of Aircrafts</h2>

<div class="row">
  <div class="col-lg-12 pt pb fleet">
    <table class="table table-hover table-bodered table-striped">
      <thead>
        <tr>
          <th></th>
          <th>Aircraft Reg</th>
          <th>Model</th>
          <th>Series</th>
          <th>Serial #</th>
          <th class="text-center">Engines</th>
          <th>Manufacturer</th>
          <th class="text-right">TAC</th>
          <th class="text-right">TAT</th>
          <th class="text-center">Next CofA</th>
          <th class="text-center">Action</th>
        </tr>
      </thead>
      <tbody>
        <?php $i = 1; foreach ($aircrafts as $aircraft):?>
          <tr>
            <td><?php echo $i ?>.</td>
            <td><?php echo $aircraft['aircraft_reg']; ?></td>
            <td><?php echo $aircraft['model']; ?></td>
            <td><?php echo $aircraft['series']; ?></td>
            <td><?php echo $aircraft['serial_number']; ?></td>
            <td class="text-center"><?php echo $aircraft['engines']; ?></td>
            <td><?php echo $aircraft['manufacturer']; ?></td>
            <td class="text-right"><?php echo $aircraft['cum_cycles']; ?></td>
            <td class="text-right"><?php echo number_format((float)$aircraft['cum_hours'], 2, '.', ''); ?></td>
            <td class="text-center"><?php echo date('d, M Y', strtotime($aircraft['nextCofA'])); ?></td>
            <td class="text-center">
              <a href="#"> <i id="<?php echo $aircraft['aircraft_id']?>" onclick="get_aircraft(this.id)" class="fa fa-eye tableIcons" data-toggle="modal" data-target=".viewAircraft" title="view <?php echo $aircraft['aircraft_reg'] ?>"></i> </a>
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

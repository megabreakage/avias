<?php if (isset($_SESSION['loggedin'])) { ?>

<h1>Aircraft Models</h1>
<div class="row">
  <div class="col-xl-12 pt pb models">
    <table class="table table-hover table-bodered table-striped">
      <thead>
        <tr>
          <td>#</td>
          <td>Model</td>
          <td>Make</td>
          <td>Manufacturer</td>
          <td class="text-center">Engines</td>
          <td>Craft type</td>
          <td class="text-center">Action</td>
        </tr>
      </thead>
      <tbody>
        <?php $i = 1; foreach ($aircraft_models as $model): ?>
          <tr>
            <td><?php echo $i; ?>.</td>
            <td><?php echo $model['model']; ?></td>
            <td><?php echo $model['make']; ?></td>
            <td><?php echo $model['manufacturer']; ?></td>
            <td class="text-center"><?php echo $model['engines']; ?></td>
            <td><?php echo $model['craft_type']; ?></td>
            <td class="text-center">
              <a href="#"><i class="fa fa-pencil tableIcons" title="edit <?php $model['model']; ?>"></i></a>
              <span> _ </span>
              <a href="#"><i class="fa fa-times iconDel" title="delete <?php $model['model']; ?>"></i></a>
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

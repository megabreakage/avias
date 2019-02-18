<?php if (isset($_SESSION['loggedin'])) { ?>

  <h5>APU Tasks</h5>
  <div class="row">

  </div>

<?php
} else {
  redirect('auth', 'refresh');
}
 ?>

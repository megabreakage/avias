<?php if (isset($_SESSION['loggedin'])) { ?>

  <div class="row">
    
  </div>

<?php
} else {
  redirect('auth', 'refresh');
}
 ?>

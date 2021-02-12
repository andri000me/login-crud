<?php
include "api/panggil.php";
include 'backend/layouts/head.php';
?>
<div class="container">
  <div class="alert alert-info">
    <h3>Your session has been expired</h3>
    <hr />
    <p><a href="<?= $abs; ?>/backend">Please login here</a></p>
  </div>
</div>

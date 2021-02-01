<?php include "../api/panggil.php"; ?>
<?php
session_start();
session_destroy();
header("location: " . $abs . "/backend/index.php?signout=sukses");
?>
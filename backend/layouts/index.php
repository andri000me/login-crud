<?php include "../../api/panggil.php";
session_start();
session_destroy();
header('location: '.$abs.'/backend');
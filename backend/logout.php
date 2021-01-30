<?php
    session_start();
    session_destroy();
    header("location: ".$abs."/login-crud/backend/index.php?signout=sukses"); 
?>
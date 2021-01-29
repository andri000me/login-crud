<?php
    require '../../api/panggil.php';

    // login
    if(!empty($_GET['aksi'] == 'login'))
    {   
        // validasi text untuk filter karakter khusus dengan fungsi strip_tags()
        $user = strip_tags($_POST['user']);
        $pass = strip_tags($_POST['pass']);
        // panggil fungsi proses_login() yang ada di class prosesCrud()
        $result = $proses->proses_login($user,$pass);
        if($result == 'gagal')
        {
        header('location: ' . $abs . '/backend/login.php?get='.urlencode('gagal maning, gagal maning son'));
            // echo "<script>window.location='../login.php?get=gagal';</script>";
        }else{
            // status yang diberikan 
            session_start();
            $_SESSION['ADMIN'] = $result;
            // status yang diberikan
            header('location: '.$abs.'/backend/user');
            // echo "<script>window.location='".$abs."/backend/user';</script>";
        }
    }
?>
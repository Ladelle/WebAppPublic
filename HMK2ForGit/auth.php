<?php
if(isset($_SESSION['user'])){
    $us_id = $_SESSION['user'];
    $us = $user->get(['uid'=>$us_id]);
    if(count($us)){
        $udata = $us[0];
    }
    else{
        $_SESSION['user'] = null;
        $error['email'] = 'Login Required To Access This Page';
        header('location:login.php');
    }
}
else{
    $error['email'] = 'Login Required To Access This Page';
    header('location:login.php');
}
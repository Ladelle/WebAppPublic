<!-- This page Verifies emails/login information -->
<?php
include('lib/init.php');
$error = array();
Flash::setOld();
extract($_POST);
if(!valid_email($email)){
    $error['email'] = 'Enter Valid Email Id';
}
if(!preg_match('/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%]{8,}$/', $pwd)){
    $error['pwd'] = 'Password Must Be Alphanumeric and more then 8 charecters';
}
if(empty($error)){
    $us = $user->get(['username'=>$email,'password'=>$pwd]);
    if(count($us)){
        $_SESSION['user'] = $us[0]['uid'];
        Flash::resetOld();
        $_SESSION['error'] = null;
        header('location:index.php');
        die;
    }
    else{
        $error['email'] = "Invalid Login Details Entered";
    }
}
$_SESSION['error'] = $error;
header('location:login.php');
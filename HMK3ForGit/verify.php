<!-- This page Verifies emails/login information -->
<?php
include('lib/init.php');
$error = array();
Flash::setOld();
extract($_POST);
if(!valid_email($email)){
    $error['email'] = 'Enter Valid Email';
}
if(!preg_match('/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%]{8,}$/', $pwd)){
    $error['pwd'] = 'Password Must Be Alphanumeric and More Than 8 Characters';
}
if(empty($error)){
    $us = $user->get(['username'=>$email,'password'=>md5($pwd)]);
    if(count($us)){
        $_SESSION['user'] = $us[0]['uid'];
        $_SESSION['roleID'] = $us[0]['roleID'];
        $_SESSION['expire_time'] = date('d-m-Y H:i:s A',strtotime('+30 minutes'));
        $_SESSION['last_action'] = time();
        Flash::resetOld();
        $_SESSION['error'] = null;
        if($us[0]['roleID'] == 1){
            header('location:edit.php');
        }
        else if($us[0]['roleID'] == 2){
            header('location:tables.php');
        }
        else if($us[0]['roleID'] == 3){
            header('location:tables.php');
        }
        else{
            header('location:index.php');
        }
        die;
    }
    else{
        $error['email'] = "Invalid Login Details Entered";
    }
}
$_SESSION['error'] = $error;
header('location:login.php');
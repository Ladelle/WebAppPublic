<?php
include('../lib/init.php');

$result = array();
if(isset($_POST['email'])){
    $email = $_POST['email'];
    $us = $user->get(['username'=>$email]);
    if(count($us)){
        $result = array(
            'status'=>'error',
            'message'=>'Email Id Already Registered With Us'
        );
    }
    else{
        $result = array(
            'status'=>'success',
            'message'=>'You can use this email'
        );
    }
}
else{
    $result = array(
        'status'=>'error',
        'message'=>'Method Not Allowed'
    );
}
print json_encode($result);
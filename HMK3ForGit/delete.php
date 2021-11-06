<?php
//<!-- This page handles the deleting of user information -->
include('lib/init.php');
include('auth.php');
if(isset($_GET['id']) && $_GET['id'] != ''){
    $user->delete(['uid'=>$_GET['id']]);
    $profile->delete(['uid'=>$_GET['id']]);
    $purchase->delete(['uid'=>$_GET['id']]);
    $_SESSION['message'] = "User Successfully Deleted";
    header('location:tables.php');
}
else{
    header('location:tables.php');
}
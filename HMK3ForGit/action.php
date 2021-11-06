<!-- This page is the action page and which validates all fields are correctly entered according to  -->
<?php
include('lib/init.php');

$error = array();
Flash::setOld();
extract($_POST);
if($fname == ''){
    $error['fname'] = 'First Name Must be Filled';
}
if(!preg_match ("/^[a-zA-z]*$/", $fname)){
    $error['fname'] = 'First Name Can\'t be Alphanumaric';
}
if($lname == ''){
    $error['lname'] = 'Last Name Must be Filled';
}
if(!preg_match ("/^[a-zA-z]*$/", $lname)){
    $error['lname'] = 'Last Name Can\'t be Alphanumaric';
}
if(!valid_email($email)){
    $error['email'] = 'Enter Valid Email ';
}
if(!preg_match('/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%]{8,}$/', $pwd)){
    $error['pwd'] = 'Password Must Be Alphanumeric And More Than 8 Characters';
}
if($add1 == ''){
    $error['add1'] = 'Address1 Must Be Filled';
}
if($city == ''){
    $error['city'] = 'City&nbsp;&nbsp; Must Be Filled';
}
if($state == ''){
    $error['state'] = 'State Must Be Filled';
}
if($country == ''){
    $error['country'] = 'Country Must Be Filled';
}
if($itemsP == ''){
    $error['itemsP'] = 'Purchese Item Must be Selected';
}
if($purDate == ''){
    $error['purDate'] = 'Purchese Date Must Be Filled';
}
if($sernum == ''){
    $error['sernum'] = 'Serial Number Must Be Filled';
}
if(!ctype_digit(strval($zip))){
    $error['zip'] = 'Only Numeric Values are Allowed';
}
if(empty($error)){
    $us = $user->get(['username'=>$email]);
    if(count($us)){
        $error['email'] = "Email Already Registered With Us";
    }
    else{
        $uid = $user->insert(array('username'=>$email,'password'=>md5($pwd)));
        $profile->insert(array(
            'uid'=>$uid,
            'first_name'=>$fname,
            'last_name'=>$lname,
            'email_address'=>$email,
            'address_one'=>$add1,
            'address_two'=>$add2,
            'city'=>$city,
            'state'=>$state,
            'zip'=>$zip,
            'country'=>$country
        ));
        $purchase->insert(array(
            'uid'=>$uid,
            'pid'=>$itemsP,
            'purchase_date'=>$purDate,
            'serial_number'=>$sernum,
            'used_for'=>$usesec,
            'op_sys'=>implode(",",$check1),
            'comments'=>$CommentsSection
        ));
        $mail->sendRegistrationMail(array('username'=>$email,'password'=>$pwd,'to'=>$email));
        Flash::resetOld();
        $_SESSION['success'] = "Registration Successful";
       
    }
    

}
$_SESSION['error'] = $error;
header('location:reg.php');
?>
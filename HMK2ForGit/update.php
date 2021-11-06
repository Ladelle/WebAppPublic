<!-- This page updates the user information  -->
<?php
include('lib/init.php');
include('auth.php');
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
    $error['email'] = 'Enter Valid Email Id';
}
if($pwd != ''){
    if(!preg_match('/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%]{8,}$/', $pwd)){
        $error['pwd'] = 'Password Must Be Alphanumeric and more then 8 charecters';
    }
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
    $error['purDate'] = 'Purchese Date Must be Filled';
}
if($sernum == ''){
    $error['sernum'] = 'Serial Number Must be Filled';
}
if(!ctype_digit(strval($zip))){
    $error['zip'] = 'Only Numeric Values are Allowed';
}
if(empty($error)){
        $u_datas = array('username'=>$email);
        if($pwd != ''){
            $u_datas['password'] = $pwd;
        }
        $user->update($u_datas,['uid'=>$uid]);
        $profile->update(array(
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
        ),['uid'=>$uid]);
        $purchase->update(array(
            'uid'=>$uid,
            'pid'=>$itemsP,
            'purchase_date'=>$purDate,
            'serial_number'=>$sernum,
            'used_for'=>$usesec,
            'op_sys'=>implode(",",$check1),
            'comments'=>$CommentsSection
        ),['uid'=>$uid]);
        $_SESSION['success'] = "User Details Updated Successfully";
        
    

}
$_SESSION['error'] = $error;
header('location:edit.php?id='.$uid);
?>
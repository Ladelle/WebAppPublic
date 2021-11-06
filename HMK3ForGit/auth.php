<?php
if(isset($_SESSION['user'])){
    $us_id = $_SESSION['user'];
    $us = $user->get(['uid'=>$us_id]);
    if(count($us)){
        $udata = $us[0];
        //The session expires if user is inactive for 30
        //minutes or more.
        $expireAfter = 30;

        //Checks to see if  "last action" session
        //variable has been set.
        if(isset($_SESSION['last_action'])){
            
            //Figures out how many seconds have passed
            //since the user was last active.
            $secondsInactive = time() - $_SESSION['last_action'];
            
            //Converts  minutes into seconds.
            $expireAfterSeconds = $expireAfter * 60;
            
            //Check to see if they have been inactive for too long.
            if($secondsInactive >= $expireAfterSeconds){
                //User has been inactive for too long.
                //Kill their session.
                session_unset();
                session_destroy();
            }
            
        }

        //Assigns the current timestamp as the user's
        //latest activity
        $_SESSION['last_action'] = time();
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
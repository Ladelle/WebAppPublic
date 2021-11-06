<!-- This is the log out page and it destroys the session of the users and sends user back to login page -->
<?php
session_start();
session_unset();
session_destroy();
header('location:login.php');
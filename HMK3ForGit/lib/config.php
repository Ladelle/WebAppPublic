
<?php
//<!-- This is my configuration page with my mail and database information -->
session_start();
date_default_timezone_set('America/Chicago');
define('DB_HOST','localhost:3307');
define('DB_USER','root');
define('DB_PASS','');
define('DB_NAME','mycompany');

define('WEBSITE','localhost/HMK3/'); //Website url required for forgot password
//Mail configuration
define('MAIL_SMTP_HOST','smtp.gmail.com');
define('MAIL_SMTP_PORT','465');
define('MAIL_SMTP_USERNAME','place email here');
define("MAIL_SMTP_PASSWORD",'place email password');
define('FROM_EMAIL','place email here');
?>

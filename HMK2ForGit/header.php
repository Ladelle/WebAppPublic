<!-- This Page is the header.php file. This page consists of the layout of the page along with the styling and the header linkes along with user sessions.  -->
<?php 
    include('lib/init.php');
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Registration form homework 2">
    <title>Homepage</title>
    <link rel="stylesheet" href="pure.css">
    <link rel="stylesheet" href="responsive.css">
    <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="style1.css">
    <link rel ="stylesheet" href="style3.css">
   
</head>
<body>

<div class="header">
    <div class="home-menu pure-menu pure-menu-horizontal pure-menu-fixed">
        <a class="pure-menu-heading" href="">Homework 2</a>

        <ul class="pure-menu-list">
            <li class="pure-menu-item pure-menu-selected">
                <a href="index.php" class="pure-menu-link">Home</a></li>
                <?php
                    if(isset($_SESSION['user'])){

                ?>
                 
                    <li class="pure-menu-item"><a href="tables.php" class="pure-menu-link">All Users</a></li>
                    <li class="pure-menu-item"><a href="logout.php" class="pure-menu-link">Logout</a></li>
                <?php
                    }
                    else{
                        
                ?>
                    <li class="pure-menu-item"><a href="reg.php" class="pure-menu-link">Registration</a></li>
                    <li class="pure-menu-item"><a href="login.php" class="pure-menu-link">Login</a></li>
                <?php
                    }
                ?>
            
        </ul>
    </div>
</div>
	
	
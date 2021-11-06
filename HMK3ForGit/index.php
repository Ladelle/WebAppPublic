<!-- This page is the home page of the homework it includes the header.php file as wellas the footer.php file -->
<?php
    include('header.php');
?>
<div class="splash-container">
    <div class="splash">
        <h1 class="splash-head">Welcome to Homepage</h1>
        <p class="splash-subhead">
            Click here to go to the registration page
        </p>
        <p>
            <a href="reg.php" class="pure-button pure-button-primary">Registration</a>
        </p>
    </div>
</div>

<div class="content-wrapper">
    <div class="content">
        <h2 class="content-head is-center">What This Program Does</h2>

        <div class="pure-g">
            <div class="l-box pure-u-1 pure-u-md-1-2 pure-u-lg-1-4">

                <h3 class="content-subhead">
                    <i class="fa fa-envelope"></i>
                    Sends an emails.
                </h3>
                <p>
                    This program sends an email to the user after they have registered and after they have reset their password.
                </p>
            </div>
            <div class="l-box pure-u-1 pure-u-md-1-2 pure-u-lg-1-4">
                <h3 class="content-subhead">
				<i class=" fa fa-database"></i>
                    Sends information to database.
                </h3>
                <p>
                   This program sends the user information from the registration form that is valid to the databse. 
                </p>
            </div>
            <div class="l-box pure-u-1 pure-u-md-1-2 pure-u-lg-1-4">
                <h3 class="content-subhead">
                    <i class="fa fa-users"></i>
                    Users Populated by role
                </h3>
                <p>
                    This program shows all the users that have registered, can edit, delete and update information depending on users role id.
                </p>
            </div>
            <div class="l-box pure-u-1 pure-u-md-1-2 pure-u-lg-1-4">
                <h3 class="content-subhead">
                    <i class="fa fa-sign-in"></i>
                    Login/Logout/Reset Passwords
                </h3>
                <p>
                    This program has the capabilities to log in users and log them out, and reset the users password. 
                </p>
            </div>
        </div>
    </div>

    <div class="ribbon l-box-lrg pure-g">
        <div class="l-box-lrg is-center pure-u-1 pure-u-md-1-2 pure-u-lg-2-5">
        </div>
        <div class="pure-u-1 pure-u-md-1-2 pure-u-lg-3-5">

            <h2 class="content-head content-head-ribbon"><a style="color:white;" href ="https://docs.google.com/document/d/1X3ZSiQRNhg01NYWr8neh0u482yav9FpbQOtyNJXytUc/edit?usp=sharing">Link To My Report: Homework3 </a></h2>
            <p>
					This is the section that can link to the report for Homework 3.
            </p>
        </div>
    </div>

    <div class="content">
        <h2 class="content-head is-center">INFORMATION</h2>

        <div class="pure-g">
            
            <div class="l-box-lrg pure-u-1 pure-u-md-5-5">
                <h4>HOMEWORK3</h4>
                <p>
                    AUTHOR: LADELLE AUGUSTINE<br>
					CMPS: WEB APPLICATION SECURITY<br>
					PROFESSOR: SAIKAT DAS <br>
					TA: CALEB SNEATH
                </p>
		

            </div>
        </div>

    </div>

    <div class="footer l-box is-center">
        Copyright &copy; <?php echo date('Y'); ?>
    </div>

</div>
<?php
    include('footer.php');
?>

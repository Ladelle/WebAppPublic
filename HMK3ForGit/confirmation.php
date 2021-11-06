<?php
//<!-- This page is the confirmation page that showcases the current date of confirmation -->
    include('header.php');
?>
<div class="jumbotron text-center">
<h1 class="display-3">Congratulations You Have Registered!</h1>
    <p class="lead"><strong>Please check your email</strong> 
    <br>
    <br>
    <form >
        <fieldset>
            <legend>Confirmation Information</legend>
            <br><br>
            <label for="currentdate">Confirmation</label>
            <?php 
            date_default_timezone_set("America/Chicago");
            echo date("h:i A\, l F j\, Y") ."<br>"; 
               ?>
              <br>
              <br>
          </fieldset>  
        </form>
        <br><br><br>
    <div class="footer l-box is-center">
        Copyright &copy; <?php echo date('Y'); ?>
    </div>

</div>
<?php
    include('footer.php');
?>

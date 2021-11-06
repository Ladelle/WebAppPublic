<!-- This is the login page which verifies if the login information is correct. -->
<?php
    include('header.php');
    if(isset($_SESSION['user'])){
        header('location:index.php');
    }
?>
<div class="">
    <div class="content">
		<div class="container" style="min-height: 500px;">
			<form action="verify.php" method ="POST">
                
                <div class="form-group">
                    <div class="pure-g">
                        <div class="l-box pure-u-1 pure-u-md-1-5 pure-u-lg-1-5"></div>
                        <div class="l-box pure-u-1 pure-u-md-3-5 pure-u-lg-3-5">
                            <div class="pure-g">
                                <div class="l-box pure-u-1 pure-u-md-1-4 pure-u-lg-1-4">
                                    <label for="email" class="flex-item" >Email: </label>
                                </div>
                                <div class="l-box pure-u-1 pure-u-md-3-4 pure-u-lg-3-4">
                                    <input type="email" autocomplete="new-email" class="flex-item form-control" value="<?php echo Flash::getOld('email'); ?>"  placeholder="youremail@gmail.com"  name="email" id="email" size="">
                                    <?php 
                                        if(isset($_SESSION['error']['email'])){
                                            echo '<small class="text-danger">'.$_SESSION['error']['email'].'</small>';
                                        }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br><br>

                    <div class="pure-g">
                        <div class="l-box pure-u-1 pure-u-md-1-5 pure-u-lg-1-5"></div>
                        <div class="l-box pure-u-1 pure-u-md-3-5 pure-u-lg-3-5">
                            <div class="pure-g">
                                <div class="l-box pure-u-1 pure-u-md-1-4 pure-u-lg-1-4">
                                    <label for="pwd"class="flex-item" >Password: </label>
                                </div>
                                <div class="l-box pure-u-1 pure-u-md-3-4 pure-u-lg-3-4">
                                    <input type="password" autocomplete="new-password" class="flex-item form-control"   name="pwd"  id="pwd" size="" minlength="8">
                                    <?php 
                                        if(isset($_SESSION['error']['pwd'])){
                                            echo '<small class="text-danger">'.$_SESSION['error']['pwd'].'</small>';
                                        }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
				<br>
                
                <div class="form-group" style="margin-bottom:50px;">
                    <div class="pure-g">
                        <div class="l-box pure-u-1 pure-u-md-1-5 pure-u-lg-1-5">
                        </div>
                        <div class="l-box pure-u-1 pure-u-md-2-5 pure-u-lg-2-5">
                            <button class="button button5" style="margin-top: 20px;margin-left: 50px;" type="submit">Login</button>
                        </div>
                        <div class="l-box pure-u-1 pure-u-md-2-5 pure-u-lg-2-5">
                            <button class="button button6"  style="margin-top: 20px;" type="reset" >Cancel</button>
                        </div>
                        <div class="l-box pure-u-1 pure-u-md-2-5 pure-u-lg-2-5">
                            <a href="forgot-pass.php" class="button button6"  style="  margin: 0;position: absolute;top: 60%;left: 52%;-ms-transform: translate(-67%, -60%);transform: translate(-64%, -69%);"  id="forgot-pass" >Forgot Password</a>
                        </div>
                    </div>
                </div>


				</form>	
			</div>
        </div>
        <div class="footer l-box is-center">
        Copyright &copy; <?php echo date('Y'); ?>
    </div>
</div>

<?php
    Flash::resetOld();
    $_SESSION['error'] = null;
    include('footer.php');
?>
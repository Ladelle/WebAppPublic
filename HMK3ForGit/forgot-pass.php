<?php
//This page is to reset the users password if they forget
error_reporting(E_ALL);
ini_set('display_errors',1);
    include('header.php');
    if(isset($_SESSION['user'])){
        header('location:index.php');
    }
    $msg = '';
    if($_POST){
        $email = $_POST['email'];
        $us = $user->get(['username'=>$email]);
        if(count($us)){
            $token = generateRandomString().time().uniqid();
            $user->update(['token'=>$token],['uid'=>$us[0]['uid']]);
            $url = WEBSITE.'reset.php?token='.$token;
            $mail->sendResetPassMail(array('to'=>$email,'url'=>$url));
            $msg = "Reset Password Link Sent to your mail";
        }
        else{
            $_SESSION['error']['email'] = true;
            $msg = "Email Id is not registered with us";
        }
        
    }

?>
<style>
    .text-success{
        color:green;
    }
</style>
<div class="">
    <div class="content">
		<div class="container" style="min-height: 500px;">
			<form action="" id="forgot-pass" method ="POST">
                
                <div class="form-group">
                    <div class="pure-g">
                        <div class="l-box pure-u-1 pure-u-md-1-5 pure-u-lg-1-5"></div>
                        <div class="l-box pure-u-1 pure-u-md-3-5 pure-u-lg-3-5">
                            <h4 style="text-align:center;">Forgot Password</h4>
                            <div class="pure-g">
                                <div class="l-box pure-u-1 pure-u-md-1-4 pure-u-lg-1-4">
                                    <label for="email" class="flex-item" >Email: </label>
                                </div>
                                <div class="l-box pure-u-1 pure-u-md-3-4 pure-u-lg-3-4">
                                    <input type="email" autocomplete="new-email" class="flex-item form-control" value="<?php echo Flash::getOld('email'); ?>"  placeholder="youremail@gmail.com"  name="email" id="email" size="">
                                    <?php 
                                        if(isset($_SESSION['error']['email'])){
                                            echo '<small class="text-danger">'.$msg.'</small>';
                                        }
                                        echo '<small class="text-success">'.$msg.'</small>';
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br><br>
                </div>
				<br>
                
                <div class="form-group" style="margin-bottom:50px;">
                    <div class="pure-g">
                        <div class="l-box pure-u-1 pure-u-md-1-5 pure-u-lg-1-5">
                        </div>
                        <div class="l-box pure-u-1 pure-u-md-2-5 pure-u-lg-2-5">
                            <a href="reset.php" class="button button5" style="margin-top: 20px;margin-left: 50px;" id="ForgotPassword" type="submit">Submit</a>
                        </div>
                        <div class="l-box pure-u-1 pure-u-md-2-5 pure-u-lg-2-5">
                            <button class="button button6"  style="margin-top: 20px;" type="reset" >Cancel</button>
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
<script>
    $(document).ready(()=>{
        $("#ForgotPassword").click((e)=>{
            e.preventDefault();
            $(".errors").remove();

            var email = $("#email").val();
            if(email == ''){
                error = true;
                showError($("#email"),'Enter Your Email Id');
            }
            else if(!IsEmail(email)){
                error = true;
                showError($("#email"),'Enter Valid Email Id');
            }
            else{
                $("#ForgotPassword").prop('disabled',true);
                $("#ForgotPassword").text('Please Wait....');
                $.ajax({
                    type:"post",
                    url:"ajax/check.php",
                    data:{
                        email:email
                    },
                    success:(res)=>{
                        
                        var Result = JSON.parse(res);
                        if(Result.status == 'success'){
                            $("#ForgotPassword").prop('disabled',false);
                            $("#ForgotPassword").text('Submit');
                            error = true;
                            showError($("#email"),'Email&nbsp;&nbsp;Id&nbsp;&nbsp;is Not Registered With Us');
                        }
                        else{
                            $("#forgot-pass").submit();
                        }
                    }
                })
            }
        })
        

    })
    function IsEmail(emailAddress) {
        var pattern = /^([a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+(\.[a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+)*|"((([ \t]*\r\n)?[ \t]+)?([\x01-\x08\x0b\x0c\x0e-\x1f\x7f\x21\x23-\x5b\x5d-\x7e\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|\\[\x01-\x09\x0b\x0c\x0d-\x7f\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))*(([ \t]*\r\n)?[ \t]+)?")@(([a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.)+([a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.?$/i;
        return pattern.test(emailAddress);
    };
    function showError(e,error){
        var html = '<small class="text-danger errors">'+error+'</small>';
        e.focus();
        e.after(html);
    }
</script>
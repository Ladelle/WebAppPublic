<?php
    include('header.php');
    if(isset($_SESSION['user'])){
        header('location:index.php');
    }
    if(isset($_GET['token'])){
        $token = $_GET['token'];
        $us = $user->get(['token'=>$token]);
        if(count($us)){
            $usd = $us[0];
            if($_POST){
                $user->update(['password'=>md5($_POST['pwd']),'token'=>''],['uid'=>$usd['uid']]);
                $_SESSION['success'] = "Password Update Successful";
                header('location:reg.php');
            }
        }
        else{
            header('location:index.php');
        }
    }
    else{
        header('location:index.php');
    }
?>
<div class="">
    <div class="content">
		<div class="container" style="min-height: 500px;">
			<form action="" id="UpdatePass" method ="POST">
                
                <div class="form-group">
                    <div class="pure-g">
                        <div class="l-box pure-u-1 pure-u-md-1-5 pure-u-lg-1-5"></div>
                        <div class="l-box pure-u-1 pure-u-md-3-5 pure-u-lg-3-5">
                            <div class="pure-g">
                                <div class="l-box pure-u-1 pure-u-md-1-4 pure-u-lg-1-4">
                                    <label for="email" class="flex-item" >Email: </label>
                                </div>
                                <div class="l-box pure-u-1 pure-u-md-3-4 pure-u-lg-3-4">
                                    <input type="email" disabled autocomplete="new-email" class="flex-item form-control" value="<?php echo $usd['username']; ?>"  placeholder="youremail@gmail.com"  name="email" id="email" size="">
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
                            <button class="button button5" style="margin-top: 20px;margin-left: 50px;" id="update_pass" type="submit">Update</button>
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
        $("#update_pass").click((e)=>{
            e.preventDefault();
            var password = $("#pwd").val();
            if(password == ''){
                error = true;
                showError($("#pwd"),'Enter&nbsp;&nbsp;Your Password');
            }
            else if(validateCode(password) || password.length <9){
                error = true;
                showError($("#pwd"),'Password&nbsp;&nbsp;Must need to be Alphanumeric(Must Have A Minimum One Uppercase And One Lowercase) And More Than 8 Characters');
            }
            else{
                $("#UpdatePass").submit();
            }
        })
    })


    function validateCode(TCode){
        var passw = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,20}$/;

        if(TCode.match(passw)) {
            return false;
        }
        return true;     
    }
    function showError(e,error){
        var html = '<small class="text-danger errors">'+error+'</small>';
        e.focus();
        e.after(html);
    }

</script>
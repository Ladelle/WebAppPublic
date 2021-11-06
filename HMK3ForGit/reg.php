<?php
    include('header.php');
    $usedFor = array(
        'Home',
        'Business',
        'Religous or Charitable Institution',
        'Government',
        'Educational Institution'
    );
    $networkOs = array(
        'Netware',
        'Banyan Vines',
        'Windows',
        'IBM Lan Server',
        'PC/NFS'
    );
    $products = $product->get();
?>

<div class="">
    <div class="content">
		<div class="container">
            <?php
                if(isset($_SESSION['success'])){
                    echo '<p style="color:green;text-align:center;">'.$_SESSION['success'].'</p>';
                }
            ?>
			<form action="action.php" method ="POST" id="registration_form">
                <div class="form-group">
                    <div class="pure-g">
                        <div class="l-box pure-u-1 pure-u-md-1-2 pure-u-lg-1-2">
                            <div class="pure-g">
                                <div class="l-box pure-u-1 pure-u-md-1-4 pure-u-lg-1-4">
                                    <label for="fname" class="flex-item" > First Name  </label>
                                </div>
                                <div class="l-box pure-u-1 pure-u-md-3-4 pure-u-lg-3-4">
                                    <input type="text"class="flex-item form-control" value="<?php echo Flash::getOld('fname'); ?>"  placeholder="Janet"  name="fname" id="fname" size="">
                                    <?php 
                                        if(isset($_SESSION['error']['fname'])){
                                            echo '<small class="text-danger">'.$_SESSION['error']['fname'].'</small>';
                                        }
                                    ?>
                                </div>
                            </div>
                        </div>
                        <div class="l-box pure-u-1 pure-u-md-1-2 pure-u-lg-1-2">
                            <div class="pure-g">
                                <div class="l-box pure-u-1 pure-u-md-1-4 pure-u-lg-1-4">
                                    <label for="lname" class="flex-item" > Last Name    </label>
                                </div>
                                <div class="l-box pure-u-1 pure-u-md-3-4 pure-u-lg-3-4">
                                    <input type="text" class="flex-item form-control"  value="<?php echo Flash::getOld('lname'); ?>" placeholder="Chidi"   name="lname" id="lname" size="">
                                    <?php 
                                        if(isset($_SESSION['error']['lname'])){
                                            echo '<small class="text-danger">'.$_SESSION['error']['lname'].'</small>';
                                        }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="pure-g">
                        <div class="l-box pure-u-1 pure-u-md-1-2 pure-u-lg-1-2">
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
                        <div class="l-box pure-u-1 pure-u-md-1-2 pure-u-lg-1-2">
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
                <hr>
                <div class="form-group">
                    <div class="pure-g">
                        <div class="l-box pure-u-1 pure-u-md-1-2 pure-u-lg-1-2">
                            <div class="pure-g">
                                <div class="l-box pure-u-1 pure-u-md-1-4 pure-u-lg-1-4">
                                    <label for="add1" class="flex-item" > Address#1  </label>
                                </div>
                                <div class="l-box pure-u-1 pure-u-md-3-4 pure-u-lg-3-4">
                                    <input type="text" class="flex-item form-control" placeholder="1017 Caterine Rd" value="<?php echo Flash::getOld('add1'); ?>"  name="add1" id="add1" size="">
                                    <?php 
                                        if(isset($_SESSION['error']['add1'])){
                                            echo '<small class="text-danger">'.$_SESSION['error']['add1'].'</small>';
                                        }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="pure-g">
                        <div class="l-box pure-u-1 pure-u-md-1-2 pure-u-lg-1-2">
                            <div class="pure-g">
                                <div class="l-box pure-u-1 pure-u-md-1-4 pure-u-lg-1-4">
                                    <label for="add2" class="flex-item" > Address#2  </label>
                                </div>
                                <div class="l-box pure-u-1 pure-u-md-3-4 pure-u-lg-3-4">
                                    <input type="text" class="flex-item form-control" value="<?php echo Flash::getOld('add2'); ?>"  name="add2" id="add2" size="">
                                    <?php 
                                        if(isset($_SESSION['error']['add2'])){
                                            echo '<small class="text-danger">'.$_SESSION['error']['add2'].'</small>';
                                        }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="pure-g">
                        <div class="l-box pure-u-1 pure-u-md-1-2 pure-u-lg-1-2">
                            <div class="pure-g">
                                <div class="l-box pure-u-1 pure-u-md-1-4 pure-u-lg-1-4">
                                    <label for="city" class="flex-item form-control" > City </label>
                                </div>
                                <div class="l-box pure-u-1 pure-u-md-3-4 pure-u-lg-3-4">
                                    <input type="text" class="flex-item form-control"  value="<?php echo Flash::getOld('city'); ?>"  name="city" id="add2" size="">
                                    <?php 
                                        if(isset($_SESSION['error']['city'])){
                                            echo '<small class="text-danger">'.$_SESSION['error']['city'].'</small>';
                                        }
                                    ?>
                                </div>
                            </div>
                        </div>
                        <div class="l-box pure-u-1 pure-u-md-1-2 pure-u-lg-1-2">
                            <div class="pure-g">
                                <div class="l-box pure-u-1 pure-u-md-1-4 pure-u-lg-1-4">
                                    <label for="state" class="flex-item" > State </label>
                                </div>
                                <div class="l-box pure-u-1 pure-u-md-3-4 pure-u-lg-3-4">
                                    <input type="text" class="flex-item form-control"  value="<?php echo Flash::getOld('state'); ?>" name="state" id="state" size="">
                                    <?php 
                                        if(isset($_SESSION['error']['state'])){
                                            echo '<small class="text-danger">'.$_SESSION['error']['state'].'</small>';
                                        }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="pure-g">
                        <div class="l-box pure-u-1 pure-u-md-1-2 pure-u-lg-1-2">
                            <div class="pure-g">
                                <div class="l-box pure-u-1 pure-u-md-1-4 pure-u-lg-1-4">
                                    <label for="zip" class="flex-item" > Zip </label>
                                </div>
                                <div class="l-box pure-u-1 pure-u-md-3-4 pure-u-lg-3-4">
                                    <input type="number" class="flex-item form-control" value="<?php echo Flash::getOld('zip'); ?>"  placeholder="74111147" name="zip" id="zip" size="" maxlength="5">
                                    <?php 
                                        if(isset($_SESSION['error']['zip'])){
                                            echo '<small class="text-danger">'.$_SESSION['error']['zip'].'</small>';
                                        }
                                    ?>
                                </div>
                            </div>
                        </div>
                        <div class="l-box pure-u-1 pure-u-md-1-2 pure-u-lg-1-2">
                            <div class="pure-g">
                                <div class="l-box pure-u-1 pure-u-md-1-4 pure-u-lg-1-4">
                                    <label for="country" class="flex-item"> Country</label>
                                </div>
                                <div class="l-box pure-u-1 pure-u-md-3-4 pure-u-lg-3-4">
                                    <input type="text" class="flex-item form-control" value="<?php echo Flash::getOld('country'); ?>" name="country" id="country" size="">
                                    <?php 
                                        if(isset($_SESSION['error']['country'])){
                                            echo '<small class="text-danger">'.$_SESSION['error']['country'].'</small>';
                                        }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
				<br>
			    <hr>
                <div class="form-group">
                    <div class="pure-g">
                        <div class="l-box pure-u-1 pure-u-md-1-2 pure-u-lg-1-2">
                            <div class="pure-g">
                                <div class="l-box pure-u-1 pure-u-md-2-5 pure-u-lg-2-5">
                                    <label for="itemsP" class="flex-item"> Item Purchased </label>
                                </div>
                                <div class="l-box pure-u-1 pure-u-md-3-5 pure-u-lg-3-5">
                                    <select name="itemsP" id="itemsP" class="flex-item form-control" >
                                        <option value="" label="Select Items" selected="selected">Select items</option>
                                        <optgroup label="Grocery">
                                            <?php
                                                if(count($products)){
                                                    foreach($products as $prd){
                                                        if(Flash::getOld('itemsP') == $prd['pid']){
                                                            echo '<option selected value="'.$prd['pid'].'">'.$prd['product_name'].'</option>';
                                                            continue;
                                                        }
                                                        echo '<option value="'.$prd['pid'].'">'.$prd['product_name'].'</option>';
                                                    }
                                                }
                                            ?>
                                        </optgroup>
                                    
                                    </select>
                                    <?php 
                                        if(isset($_SESSION['error']['itemsP'])){
                                            echo '<small class="text-danger">'.$_SESSION['error']['itemsP'].'</small>';
                                        }
                                    ?>
                                </div>
                            </div>
                        </div>
                        <div class="l-box pure-u-1 pure-u-md-1-2 pure-u-lg-1-2">
                            <div class="pure-g">
                                <div class="l-box pure-u-1 pure-u-md-2-5 pure-u-lg-2-5">
                                    <label for="purDate" class="flex-item" > Purchase Date</label>
                                </div>
                                <div class="l-box pure-u-1 pure-u-md-3-5 pure-u-lg-3-5">
                                    <input type="date" value="<?php echo Flash::getOld('purDate'); ?>" class="flex-item form-control"   name="purDate" id="purDate" >
                                    <?php 
                                        if(isset($_SESSION['error']['purDate'])){
                                            echo '<small class="text-danger">'.$_SESSION['error']['purDate'].'</small>';
                                        }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="pure-g">
                        <div class="l-box pure-u-1 pure-u-md-1-2 pure-u-lg-1-2">
                            
                        </div>
                        <div class="l-box pure-u-1 pure-u-md-1-2 pure-u-lg-1-2">
                            <div class="pure-g">
                                <div class="l-box pure-u-1 pure-u-md-2-5 pure-u-lg-2-5">
                                    <label for="sernum" class="flex-item" >Serial Number </label>
                                </div>
                                <div class="l-box pure-u-1 pure-u-md-3-5 pure-u-lg-3-5">
                                    <input type="text" value="<?php echo Flash::getOld('sernum'); ?>" class="flex-item form-control"  name="sernum" id="sernum" >
                                    <?php 
                                        if(isset($_SESSION['error']['sernum'])){
                                            echo '<small class="text-danger">'.$_SESSION['error']['sernum'].'</small>';
                                        }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
                <hr>
                <div class="form-group">
                    <div class="pure-g">
                        <div class="l-box pure-u-1 pure-u-md-11-24 pure-u-lg-11-24">
                            <fieldset id="checkOne" class="form-control">
                                <legend > Used For (check one)</legend>
                                <?php
                                    if(count($usedFor)){
                                        foreach($usedFor as $uf){
                                            if(Flash::getOld('usesec') == $uf){
                                                echo('
                                                    <input type="radio" checked id="'.$uf.'" name="usesec" value="'.$uf.'">
                                                    <label for="'.$uf.'">'.$uf.'</label><br>
                                                ');
                                                continue;
                                            }
                                            echo('
                                                <input type="radio" id="'.$uf.'" name="usesec" value="'.$uf.'">
                                                <label for="'.$uf.'">'.$uf.'</label><br>
                                            ');
                                        }
                                    }
                                ?>
                                
                            </fieldset>
                        </div>
                        <div class="l-box pure-u-1 pure-u-md-13-24 pure-u-lg-13-24">
                            <fieldset id="checkAll" class="form-control">
                                <legend> Network Operating System (check all that apply)</legend>
                                <?php
                                    if(count($networkOs)){
                                        foreach($networkOs as $nos){
                                            if(is_array($nos ) && in_array($nos ,Flash::getOld(('check1[]')))){
                                                echo ('
                                                    <input checked type="checkbox" id="'.$nos.'" name="check1[]" value="'.$nos.'">
                                                    <label for="'.$nos.'">'.$nos.'</label><br>
                                                ');
                                                continue;
                                            }
                                            echo ('
                                                <input type="checkbox" id="'.$nos.'" name="check1[]" value="'.$nos.'">
                                                <label for="'.$nos.'">'.$nos.'</label><br>
                                            ');
                                        }
                                    }
                                ?>
                            </fieldset>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="form-group">
                    <div class="pure-g">
                        <div class="l-box pure-u-1 pure-u-md-1-4 pure-u-lg-1-4">
                            <label for="textarea" class="textarea-label">Comments?:</label>
                        </div>
                        <div class="l-box pure-u-1 pure-u-md-3-4 pure-u-lg-3-4">
                            <textarea class="form-control" id="Comments" name="CommentsSection" rows ="3" col ="" ><?php echo Flash::getOld('CommentsSection'); ?></textarea>
                        </div>
                    </div>
                </div>

                <div class="form-group" style="margin-bottom:50px;">
                    <div class="pure-g">
                        <div class="l-box pure-u-1 pure-u-md-1-5 pure-u-lg-1-5">
                        </div>
                        <div class="l-box pure-u-1 pure-u-md-2-5 pure-u-lg-2-5">
                            <button class="button button5" style="margin-top: 20px;margin-left: 50px;" id="RegistrationBtn"  type="submit">Send Registration</button>
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
    $_SESSION['success'] = null;
    include('footer.php');
?>
<script>
    $(document).ready(()=>{
        $("#RegistrationBtn").click((e)=>{
            e.preventDefault();
            $(".errors").remove();
            var fname = $("#fname").val();
            var lname = $("#lname").val();
            var email = $("#email").val();
            var password = $("#pwd").val();
            var add1 = $("#add1").val();
            var city = $("#city").val();
            var state = $("#state").val();
            var country = $("#country").val();
            var itemsP = $("#itemsP").val();
            var purDate = $("#purDate").val();
            var sernum = $("#sernum").val();
            var zip = $("#zip").val();
            


            var error = false;
            if(fname == ''){
                error = true;
                showError($("#fname"),'Enter Your First Name');
            }
            else if(alphabet(fname)){
                error = true;
                showError($("#fname"),'Only&nbsp;&nbsp;Characters Are Allowed');
            }
            if(lname == ''){
                error = true;
                showError($("#lname"),'Enter Your Last Name');
            }
            else if(alphabet(lname)){
                error = true;
                showError($("#lname"),'Only&nbsp;&nbsp;Characters Are Allowed');
            }

            
            if(password == ''){
                error = true;
                showError($("#pwd"),'Enter Your Password');
            }
            else if(validateCode(password) || password.length <9){
                error = true;
                showError($("#pwd"),'Password Must Be Alphanumeric(Minimum One Uppercase And One Lowercase) And More Than 8 Characters');
            }

            if(add1 == ''){
                error = true;
                showError($("#add1"),'Address#1 Must Be Filled');
            }
            if(city == ''){
                error = true;
                showError($("#city"),'City&nbsp;&nbsp;Must Be Filled');
            }
            if(state == ''){
                error = true;
                showError($("#state"),'State Must Be Filled');
            }
            if(country == ''){
                error = true;
                showError($("#country"),'Country Must Be Filled');
            }
            if(itemsP == ''){
                error = true;
                showError($("#itemsP"),'Purchese Item Must Be Selected');
            }
            if(purDate == ''){
                error = true;
                showError($("#purDate"),'Purchese Date Must Be Filled');
            }
            if(sernum == ''){
                error = true;
                showError($("#sernum"),'Serial Number Must Be Filled');
            }
            if(zip == ''){
                error = true;
                showError($("#zip"),'ZIP&nbsp;&nbsp;Must Be Filled');
            }
            else if(!isNumber(zip)){
                error = true;
                showError($("#zip"),'Only Numbers Are Allowed');
            }

            if(email == ''){
                error = true;
                showError($("#email"),'Enter Your Email');
            }
            else if(!IsEmail(email)){
                error = true;
                showError($("#email"),'Enter Valid Email ');
            }
            else{
                $("#RegistrationBtn").prop('disabled',true);
                $("#RegistrationBtn").text('Please Wait....');
                $.ajax({
                    type:"post",
                    url:"ajax/check.php",
                    data:{
                        email:email
                    },
                    success:(res)=>{
                        
                        var Result = JSON.parse(res);
                        if(Result.status != 'success'){
                            error = true;
                            showError($("#email"),Result.message);
                        }
                        else{
                            $("#registrationBtn").prop('disabled',false);
                            $("#registrationBtn").text('Send Registration');
                            
                        }
                    }
                })
                // This is added to attempt to stop the please wait part. 
                <?php
                header("location:reg.php");
                ?>
            }

            if(error === false){
                $("#registration_form").submit()
            }



        })
    })

    function showError(e,error){
        var html = '<small class="text-danger errors">'+error+'</small>';
        e.focus();
        e.after(html);
    }
    function IsEmail(emailAddress) {
        var pattern = /^([a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+(\.[a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+)*|"((([ \t]*\r\n)?[ \t]+)?([\x01-\x08\x0b\x0c\x0e-\x1f\x7f\x21\x23-\x5b\x5d-\x7e\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|\\[\x01-\x09\x0b\x0c\x0d-\x7f\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))*(([ \t]*\r\n)?[ \t]+)?")@(([a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.)+([a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.?$/i;
        return pattern.test(emailAddress);
    };

    function alphabet(string){
        var letters = /^[A-Za-z]+$/;
        if(string.match(letters)){
            return false;
        }
        else{
            return true;
        }

    }
    function isNumber(n) {
        return !isNaN(parseFloat(n)) && isFinite(n);
    }
    function validateCode(TCode){
        var passw = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,20}$/;

        if(TCode.match(passw)) {
            return false;
        }
        return true;     
    }
</script>
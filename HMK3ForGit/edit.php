<?php
//<!-- This page handles the editing of information of the user. -->
    include('header.php');
    include('auth.php');
    if(isset($_GET['id']) && $_GET['id'] != ''){
        if($udata['roleID'] == 2 || $udata['roleID'] == 3){
            $uid = $_GET['id'];
            $u_details = $user->get(['uid'=>$uid]);
            $p_details = $profile->get(['uid'=>$uid]);
            $pur_details = $purchase->get(['uid'=>$uid]);
            if($u_details && $p_details && $pur_details){

            }
            else{
                header('location:tables.php');
            }
        }
        else{
            header('location:tables.php');
        }
    }
    else{
        if($udata['roleID'] == 1){
            $uid = $udata['uid'];
            $u_details = $user->get(['uid'=>$uid]);
            $p_details = $profile->get(['uid'=>$uid]);
            $pur_details = $purchase->get(['uid'=>$uid]);
            if($u_details && $p_details && $pur_details){

            }
            else{
                header('location:tables.php');
            }
        }
        else{
            header('location:tables.php');
        }
    }
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
			<form action="update.php" method ="POST">
                <input type="hidden" id="uid" name="uid" value="<?php echo $_GET['id']; ?>" />
                <div class="form-group">
                    <div class="pure-g">
                        <div class="l-box pure-u-1 pure-u-md-1-2 pure-u-lg-1-2">
                            <div class="pure-g">
                                <div class="l-box pure-u-1 pure-u-md-1-4 pure-u-lg-1-4">
                                    <label for="fname" class="flex-item" > First Name  </label>
                                </div>
                                <div class="l-box pure-u-1 pure-u-md-3-4 pure-u-lg-3-4">
                                    <input type="text"class="flex-item form-control" value="<?php echo $p_details[0]['first_name']; ?>"  placeholder="Janet"  name="fname" id="fname" size="">
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
                                    <input type="text" class="flex-item form-control"  value="<?php echo $p_details[0]['last_name']; ?>" placeholder="Chidi"   name="lname" id="lname" size="">
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
                                    <input type="email" autocomplete="new-email" class="flex-item form-control" value="<?php echo $u_details[0]['username']; ?>"  placeholder="something@gmail.com"  name="email" id="email" size="">
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
                                    <small>Keep Empty For No Change</small>
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
                                    <input type="text" class="flex-item form-control" placeholder="1017 Caterine Rd" value="<?php echo $p_details[0]['address_one']; ?>"  name="add1" id="add1" size="">
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
                                    <input type="text" class="flex-item form-control" value="<?php echo $p_details[0]['address_two']; ?>"  name="add2" id="add2" size="">
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
                                    <input type="text" class="flex-item form-control"  value="<?php echo $p_details[0]['city']; ?>"  name="city" id="add2" size="">
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
                                    <input type="text" class="flex-item form-control"  value="<?php echo $p_details[0]['state']; ?>" name="state" id="state" size="">
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
                                    <input type="number" class="flex-item form-control" value="<?php echo $p_details[0]['zip']; ?>"  placeholder="74111147" name="zip" id="zip" size="" maxlength="5">
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
                                    <input type="text" class="flex-item form-control" value="<?php echo $p_details[0]['country']; ?>" name="country" id="country" size="">
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
                                                        if($pur_details[0]['pid'] == $prd['pid']){
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
                                    <input type="date" value="<?php echo $pur_details[0]['purchase_date']; ?>" class="flex-item form-control"   name="purDate" id="purDate" >
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
                                    <input type="text" value="<?php echo $pur_details[0]['serial_number']; ?>" class="flex-item form-control"  name="sernum" id="sernum" >
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
                                            if($pur_details[0]['used_for'] == $uf){
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
                                            if(in_array($nos,explode(",",$pur_details[0]['op_sys']))){
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
                            <textarea class="form-control" id="Comments" name="CommentsSection" rows ="3" col ="" ><?php echo $pur_details[0]['comments']; ?></textarea>
                        </div>
                    </div>
                </div>

                <div class="form-group" style="margin-bottom:50px;">
                    <div class="pure-g">
                        <div class="l-box pure-u-1 pure-u-md-1-5 pure-u-lg-1-5">
                        </div>
                        <div class="l-box pure-u-1 pure-u-md-2-5 pure-u-lg-2-5">
                            <button class="button button5" style="margin-top: 20px;margin-left: 50px;" type="submit">Update</button>
                        </div>
                        <div class="l-box pure-u-1 pure-u-md-2-5 pure-u-lg-2-5">
                            <a href="tables.php">
                                <button class="button button6"  style="margin-top: 20px;" type="button" >Back</button>
                            </a>
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
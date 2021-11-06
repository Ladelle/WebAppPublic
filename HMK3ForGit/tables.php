<!-- This page displayes the users information in a table format -->
<?php
error_reporting(0);
ini_set('display_errors',0);
    include('header.php');
    include('auth.php');
    if($udata['roleID'] == 2 || $udata['roleID'] == 3){
        if($udata['roleID'] == 2){
            $users = $user->get(['roleID'=>1],'','order by uid desc');
        }
        else{
            $users = $user->get([],'','order by uid desc');
        }
    }
    else{
        header('location:edit.php');
    }
    
?>
<div class="">
    <div class="content">
		<div class="container" style="max-width:inherit !important;padding:0;width:100%;overflow-y: scroll;">
            <p style="text-align:center;"><b>All Users List</b><br>
            <small>Scroll To The Right Side To See The Remaining Data</small>  
            
            <?php
                if(isset($_SESSION['message'])){
                    echo '<br><p style="color:green;text-align:center;">'.$_SESSION['message'].'</p>';
                }
            ?>  
        </p>
            <table class="" style="width:100%;overflow:scroll;">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Address1</th>
                        <th>Address2</th>
                        <th>City</th>
                        <th>State</th>
                        <th>Zip</th>
                        <th>Country</th>
                        <th>Item Purchased</th>
                        <th>Item Cost</td>
                        <th>Purchase Date</th>
                        <th>Serial No</th>
                        <th>Used For</th>
                        <th>Network Operating System</th>
                        <th>Comments</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        if(count($users)){
                            $i = 0;
                            foreach($users as $usd){
                                $prf = $profile->get(['uid'=>$usd['uid']]);
                                $itm = $purchase->get(['uid'=>$usd['uid']]);
                                if($itm){
                                    $prd = $product->get(['pid'=>$itm[0]['pid']]);
                                   
                                }

                           
                    ?>
                    <tr>
                        <td><?php echo ++$i; ?></td>
                        <td>
                            <?php
                                if($prf){
                                    echo $prf[0]['first_name'].' '.$prf[0]['last_name'];
                                }
                                
                            ?>
                        </td>
                        <td>
                            <?php echo $usd['username']; ?>
                        </td>
                        <td>
                            <?php if($prf){
                                echo $prf[0]['address_one'];
                            } ?>
                        </td>
                        <td>
                            <?php if($prf){
                              
                                echo $prf[0]['address_two'];
                            } ?>
                        </td>
                        <td>
                            <?php if($prf){
                                echo $prf[0]['city'];
                            } ?>
                        </td>
                        <td>
                            <?php if($prf){
                                echo $prf[0]['state'];
                            } ?>
                        </td>
                        <td>
                            <?php if($prf){
                                echo $prf[0]['zip'];
                            } ?>
                        </td>
                        <td>
                            <?php if($prf){
                                echo $prf[0]['country'];
                            } ?>
                        </td>
                        <td>
                            <?php
                                if($prd){
                                    echo $prd[0]['product_name'];
                                }
                            ?>
                        </td>
                        <td>
                            <?php
                                if($prd){
                                    echo $prd[0]['price'];
                                }
                            ?>
                        </td>
                        <td>
                            <?php
                                if($itm){
                                    echo $itm[0]['purchase_date'];
                                }
                            ?>
                        </td>
                        <td>
                            <?php
                                if($itm){
                                    echo $itm[0]['serial_number'];
                                }
                            ?>
                        </td>
                        <td>
                            <?php
                                if($itm){
                                    echo $itm[0]['used_for'];
                                }
                            ?>
                        </td>
                        <td>
                            <?php
                                if($itm){
                                    $nos = explode(",",$itm[0]['op_sys']);
                                    if(count($nos)){
                                        foreach($nos as $no){
                                            echo $no.'<br>';
                                        }
                                    }
                                }
                            ?>
                        </td>
                        <td>
                            <?php
                                if($itm){
                                    echo $itm[0]['comments'];
                                }
                            ?>
                        </td>
                        <td>
                            <?php
                                $roles = $rl->get(['id'=>$usd['roleID']]);
                                if(count($roles)){
                                    echo $roles[0]['name'];
                                }
                            ?>
                        </td>
                        <td>
                            <a href="edit.php?id=<?php echo $usd['uid']; ?>">
                                <button class="pure-button">Edit</button>
                            </a>
                            <br><br>
                            <?php
                                if($udata['roleID'] == 3){
                                    if($udata['uid'] != $usd['uid']){
                                        ?>
                                        <a href="delete.php?id=<?php echo $usd['uid']; ?>">
                                            <button class="pure-button">Delete</button>
                                        </a>
                                        <?php
                                    }
                                }
                            ?>
                        </td>
                    </tr>
                    <?php
                             
                            }
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php
include('footer.php');
$_SESSION['message'] = null;
?>
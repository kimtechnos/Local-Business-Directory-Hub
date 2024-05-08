<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
error_reporting(0);
if (strlen($_SESSION['lssemsuid']==0)) {
  header('location:logout.php');
  } else{
if(isset($_POST['submit']))
{
$uid=$_SESSION['lssemsuid'];
$cpassword=md5($_POST['currentpassword']);
$newpassword=md5($_POST['newpassword']);
$sql ="SELECT ID FROM tbluser WHERE ID=:uid and Password=:cpassword";
$query= $dbh -> prepare($sql);
$query-> bindParam(':uid', $uid, PDO::PARAM_STR);
$query-> bindParam(':cpassword', $cpassword, PDO::PARAM_STR);
$query-> execute();
$results = $query -> fetchAll(PDO::FETCH_OBJ);

if($query -> rowCount() > 0)
{
$con="update tbluser set Password=:newpassword where ID=:uid";
$chngpwd1 = $dbh->prepare($con);
$chngpwd1-> bindParam(':adminid', $adminid, PDO::PARAM_STR);
$chngpwd1-> bindParam(':newpassword', $newpassword, PDO::PARAM_STR);
$chngpwd1->execute();

echo '<script>alert("Your password successully changed")</script>';
} else {
echo '<script>alert("Your current password is wrong")</script>';

}



}

  
  ?>
<!DOCTYPE html>
<html lang="en">

<head>
    
    <!-- Page Title -->
    <title>Directory Listing Management System || Change 
    password</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900" rel="stylesheet">
    <!-- Themify Icon -->
    <link rel="stylesheet" href="css/themify-icons.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <!-- Hover Effects -->
    <link href="css/set1.css" rel="stylesheet">
    <!-- Main CSS -->
    <link rel="stylesheet" href="css/style.css">
    <script type="text/javascript">
function checkpass()
{
if(document.changepassword.newpassword.value!=document.changepassword.confirmpassword.value)
{
alert('New Password and Confirm Password field does not match');
document.changepassword.confirmpassword.focus();
return false;
}
return true;
}   

</script>
</head>

<body>
   <?php include_once('includes/header.php');?>
    <!--============================= SUBPAGE HEADER BG =============================-->
    <section class="subpage-bg">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <div class="titile-block title-block_subpage">
                        <h2>Change Password</h2>
                        <p> <a href="index.php"> Home</a> / Change Password</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--// SUBPAGE HEADER BG -->
    <!--============================= PAYMENT METHORD =============================-->
    <section class="main-block">
        <div class="container-fluid">
            <div class="row justify-content-center">

                <div class="col-md-10">

                    <div class="row">
                        <div class="col-md-8">
                            <form name="changepassword" method="post" onsubmit="return checkpass();" action="">
                                
                                <div class="payment-wrap">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="payment-title">
                                                <span class="ti-files"></span>
                                                <h4>Change Password</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Current Password</label>
                                                <input type="password" name="currentpassword" id="currentpassword" class="form-control" required="true">
                                            </div>
                                        </div>
                                      
                                    </div>
                                      <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>New Password</label>
                                                <input type="password" name="newpassword"  class="form-control" required="true">
                                            </div>
                                        </div>
                                       
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Confirm Password</label>
                                               <input type="password" name="confirmpassword" id="confirmpassword" value=""  class="form-control">
                                            </div>
                                        </div>
                                       
                                    </div>

                                </div>  
                                <div class="payment-wrap">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div id="accordion" class="payment-method-collapse">
                                    <button type="submit" class="btn btn-primary" name="submit">Change</button>
                                </div>
                            </form>
                            <!--// Payment method -->
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--//END PAYMENT METHORD -->
    <?php include_once('includes/footer.php');?>

    <!-- jQuery, Bootstrap JS. -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

</body>

</html><?php }  ?>
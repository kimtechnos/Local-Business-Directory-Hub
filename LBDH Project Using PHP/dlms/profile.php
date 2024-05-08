<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['lssemsuid']==0)) {
  header('location:logout.php');
  } else{
    if(isset($_POST['submit']))
  {
    $uid=$_SESSION['lssemsuid'];
    $fname=$_POST['fname'];
  
  $sql="update tbluser set FullName=:fname where ID=:uid";
     $query = $dbh->prepare($sql);
     $query->bindParam(':fname',$fname,PDO::PARAM_STR);
     $query->bindParam(':uid',$uid,PDO::PARAM_STR);
$query->execute();
echo '<script>alert("Your profile has been updated")</script>';
 
  }
  ?>
<!DOCTYPE html>
<html lang="en">

<head>
    
    <!-- Page Title -->
    <title>Directory Listing Management System || Profile</title>
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
</head>

<body>
   <?php include_once('includes/header.php');?>
    <!--============================= SUBPAGE HEADER BG =============================-->
    <section class="subpage-bg">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <div class="titile-block title-block_subpage">
                        <h2>Profile</h2>
                        <p> <a href="index.php"> Home</a> / Profile</p>
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
                            <form method="post">
                                <?php
$uid=$_SESSION['lssemsuid'];
$sql="SELECT * from  tbluser where ID=:uid";
$query = $dbh -> prepare($sql);
$query->bindParam(':uid',$uid,PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $row)
{               ?>
                                <div class="payment-wrap">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="payment-title">
                                                <span class="ti-files"></span>
                                                <h4>Profile Information</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Name</label>
                                                <input type="text" class="form-control add-listing_form" value="<?php  echo $row->FullName;?>" name="fname" required="true">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Phone</label>
                                                <input type="text" class="form-control add-listing_form" value="<?php  echo $row->MobileNumber;?>" name="mobno" readonly ="true" maxlength="10" pattern="[0-9]+">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Registration Date</label>
                                                <input type="text" class="form-control add-listing_form" value="<?php  echo $row->RegDate;?>" readonly ="true">
                                            </div>
                                        </div>
                                       
                                    </div>

                                </div> <?php $cnt=$cnt+1;}} ?>  
                                <div class="payment-wrap">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div id="accordion" class="payment-method-collapse">
                                    <button type="submit" class="btn btn-primary" name="submit">Update NOW</button>
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
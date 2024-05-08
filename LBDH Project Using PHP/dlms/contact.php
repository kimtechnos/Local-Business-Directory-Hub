<?php
include('includes/dbconnection.php');
session_start();
error_reporting(0);

if(isset($_POST['submit']))
  {
    $name=$_POST['name'];
    $email=$_POST['email'];
    $message=$_POST['message'];
    $sql= "insert into tblcontact(Name,Email,Message) value(:name,:email,:message)";
    $query=$dbh->prepare($sql);
$query->bindParam(':name',$name,PDO::PARAM_STR);
$query->bindParam(':email',$email,PDO::PARAM_STR);
$query->bindParam(':message',$message,PDO::PARAM_STR);
$query->execute();
   $LastInsertId=$dbh->lastInsertId();
   if ($LastInsertId>0) {
   echo "<script>alert('Your message was sent successfully!.');</script>";
echo "<script>window.location.href ='contact.php'</script>";
  }
  else
    {
         echo '<script>alert("Something Went Wrong. Please try again")</script>';
    } 

  

  
}
  ?>
<!DOCTYPE html>
<html lang="en">

<head>
   
    <!-- Page Title -->
    <title>Local Business directory Hub || Contact Us</title>
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
                        <h2>Contact Us</h2>
                        <p><a href="index.php"> Home</a> / Contact</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--// SUBPAGE HEADER BG -->
    <!--============================= CONTACT =============================-->
    <section class="main-block">
        <div class="container-fluid">
            <div class="row justify-content-center mb-5">
                <div class="col-md-8">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="address-box">
                                <span class="ti-location-pin"></span>
                                <?php

$sql="SELECT * from  tblpage where PageType='contactus'";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
foreach($results as $row)
{               ?>
                                <h5>Address</h5>
                                <p><?php  echo $row->PageDescription;?></p>
                             </div>
                        </div>
                        <div class="col-md-4">
                            <div class="address-box">
                                <span class="fa fa-mobile-phone"></span>
                                <h5>Contact Number</h5>
                                <p><?php  echo $row->MobileNumber;?></p>
                            </div>
                        </div>

                         <div class="col-md-4">
                            <div class="address-box">
                                <span class="fa fa-envelope"></span>
                                <h5>Email</h5>
                                <p><?php  echo $row->Email;?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div><?php } ?>
            <h3 class="text-center pt-5 mb-5">Send us a Message</h3>
            <div class="row no-gutters justify-content-center">

                <div class="col-md-10 gray">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="contact-form pl-4 py-4">

                                <form method="post">
                                    <div class="form-group">
                                        <label>Name</label>
                                        <input type="text" name="name" class="form-control" required="true">
                                    </div>
                                    <div class="form-group">
                                        <label>Email address</label>
                                        <input type="email" name="email" class="form-control" required="true">
                                    </div>
                                   
                                    <div class="form-group">
                                        <label>Message</label>
                                        <textarea name="message" class="form-control" rows="3" required="true"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn-submit" id="js-contact-btn" name="submit">SEND MESSAGE</button>
                                    </div>
                                    
                                </form>
                            </div>
                        </div>
                   
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--//END CONTACT -->
    <!--============================= FOOTER =============================-->
  <?php include_once('includes/footer.php');?>



    <!-- jQuery, Bootstrap JS. -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/script.js"></script>
    <!-- Map JS (Please change the API key below. Read documentation for more info) -->
    <script src="https://maps.googleapis.com/maps/api/js?callback=myMap&key=AIzaSyDMTUkJAmi1ahsx9uCGSgmcSmqDTBF9ygg"></script>
    <!-- Validate JS -->
    <script src="js/validate.js"></script>
    <!-- Contact JS -->
    <script src="js/contact.js"></script>
</body>

</html>
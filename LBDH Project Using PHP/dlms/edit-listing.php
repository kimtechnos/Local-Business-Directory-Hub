<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['lssemsuid']==0)) {

header('location:logout.php');
  } else{
    if(isset($_POST['submit']))
  {

$listingtitle=$_POST['listingtitle'];
$keywords=$_POST['keywords'];
$category=$_POST['category'];
$website=$_POST['website'];
$add=$_POST['add'];
$tadd=$_POST['tadd'];
$city=$_POST['city'];
$county=$_POST['county'];
$country=$_POST['country'];
$zipcode=$_POST['zipcode'];
$ownername=$_POST['ownername'];
$email=$_POST['email'];
$phone=$_POST['phone'];
$comwebsite=$_POST['comwebsite'];
$ownerdesi=$_POST['ownerdesi'];
$company=$_POST['company'];
$flink=$_POST['flink'];
$twitterlink=$_POST['twitterlink'];
$googlelink=$_POST['googlelink'];
$linkedin=$_POST['linkedin'];
$description=$_POST['description'];
$eid=$_GET['editid'];
$sql="update tbllisting set ListingTitle=:listingtitle,Keyword=:keywords,Category=:category,Website=:website,Address=:add,TemporaryAddress=:tadd,City=:city,county=:county,Country=:country,Zipcode=:zipcode,OwnerName=:ownername,Email=:email,Phone=:phone,CompanyWebsite=:comwebsite,OwnerDesignation=:ownerdesi,Company=:company,FacebookLink=:flink,TweeterLink=:twitterlink,Googlepluslink=:googlelink, Linkedinlink=:linkedin,Description=:description where ID=:eid";

$query=$dbh->prepare($sql);
$query->bindParam(':listingtitle',$listingtitle,PDO::PARAM_STR);
$query->bindParam(':keywords',$keywords,PDO::PARAM_STR);
$query->bindParam(':category',$category,PDO::PARAM_STR);
$query->bindParam(':website',$website,PDO::PARAM_STR);
$query->bindParam(':add',$add,PDO::PARAM_STR);
$query->bindParam(':tadd',$tadd,PDO::PARAM_STR);
$query->bindParam(':city',$city,PDO::PARAM_STR);
$query->bindParam(':county',$county,PDO::PARAM_STR);
$query->bindParam(':country',$country,PDO::PARAM_STR);
$query->bindParam(':zipcode',$zipcode,PDO::PARAM_STR);
$query->bindParam(':ownername',$ownername,PDO::PARAM_STR);
$query->bindParam(':email',$email,PDO::PARAM_STR);
$query->bindParam(':phone',$phone,PDO::PARAM_STR);
$query->bindParam(':comwebsite',$comwebsite,PDO::PARAM_STR);
$query->bindParam(':ownerdesi',$ownerdesi,PDO::PARAM_STR);
$query->bindParam(':company',$company,PDO::PARAM_STR);
$query->bindParam(':flink',$flink,PDO::PARAM_STR);
$query->bindParam(':twitterlink',$twitterlink,PDO::PARAM_STR);
$query->bindParam(':googlelink',$googlelink,PDO::PARAM_STR);
$query->bindParam(':linkedin',$linkedin,PDO::PARAM_STR);
$query->bindParam(':description',$description,PDO::PARAM_STR);
$query->bindParam(':eid',$eid,PDO::PARAM_STR);

 $query->execute();
  echo '<script>alert("Listing has been updated")</script>';
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    
    <!-- Page Title -->
    <title>Directory Listing Management System|| Edit Listing</title>
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
                        <h2>Edit Listing</h2>
                        <p> <a href="index.php"> Home</a> / Edit Listing</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--// SUBPAGE HEADER BG -->
    <!--============================= ADD LISTING =============================-->
    <section class="main-block">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="listing-wrap">
                        <form method="post" enctype="multipart/form-data">
                            <?php
$eid=$_GET['editid'];
$userid=$_SESSION['lssemsuid'];   
$sql="SELECT tblcategory.Category as cat,tbllisting.*  from tbllisting inner join tblcategory on tblcategory.ID=tbllisting.Category where tbllisting.ID=:eid and tbllisting.UserID=:userid";
$query = $dbh -> prepare($sql);
$query->bindParam(':eid',$eid,PDO::PARAM_STR);
$query->bindParam(':userid',$userid,PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $row)
{               ?>
                            <!-- General Information -->
                            <div class="listing-title">
                                <span class="ti-files"></span>
                                <h4>General Information</h4>
                                <p>Update Something General Information About Your Listing</p>
                            </div>


                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Listing Title</label>
                                        <input type="text" class="form-control add-listing_form" name="listingtitle" required="true" value="<?php  echo $row->ListingTitle;?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Keyword</label>
                                        <input type="text" class="form-control add-listing_form" name="keywords" required="true" value="<?php  echo $row->Keyword;?>">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Category</label>
                                        <select class="form-control add-listing_form" name="category" required="true">
                                            <option value="<?php  echo $row->Category;?>"><?php  echo $row->cat;?></option>
       <?php 

$sql2 = "SELECT * from   tblcategory ";
$query2 = $dbh -> prepare($sql2);
$query2->execute();
$result2=$query2->fetchAll(PDO::FETCH_OBJ);

foreach($result2 as $row2)
{          
    ?>  
<option value="<?php echo htmlentities($row2->ID);?>"><?php echo htmlentities($row2->Category);?></option>
 <?php } ?> 
    </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Website</label>
                                        <input type="text" class="form-control add-listing_form" name="website" value="<?php  echo $row->Website;?>">
                                    </div>
                                </div>
                            </div>
                            <!--//End General Information -->
                            <!-- Add Location -->
                            <div class="listing-title">
                                <span class="ti-location-pin"></span>
                                <h4>Add Location</h4>
                                <p>Write Something General Information About Your Listing</p>
                            </div>


                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Address</label>
                                        <input type="text" class="form-control add-listing_form" name="add" required="true" value="<?php  echo $row->Address;?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Temporary Address</label>
                                        <input type="text" class="form-control add-listing_form" name="tadd" required="true" value="<?php  echo $row->TemporaryAddress;?>">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>City</label>
                                        <input type="text" class="form-control add-listing_form" name="city" required="true" value="<?php  echo $row->City;?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>county</label>
                                        <input type="text" class="form-control add-listing_form" name="county" required="true" value="<?php  echo $row->county;?>">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Country</label>
                                        <input type="text" class="form-control add-listing_form" name="country" required="true" value="<?php  echo $row->Country;?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Zip-Code</label>
                                        <input type="text" class="form-control add-listing_form" name="zipcode" required="true" value="<?php  echo $row->Zipcode;?>">
                                    </div>
                                </div>
                            </div>
                            <!--//End Add Location -->

                            <!-- Full Details -->
                            <div class="listing-title">
                                <span class="ti-location-pin"></span>
                                <h4>Full Details</h4>
                                <p>Update Something General Information About Your Listing</p>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Owner Name</label>
                                        <input type="text" class="form-control add-listing_form" name="ownername" required="true" value="<?php  echo $row->OwnerName;?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="email" class="form-control add-listing_form" name="email" required="true" value="<?php  echo $row->Email;?>">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Phone</label>
                                        <input type="text" class="form-control add-listing_form" name="phone" required="true" maxlength="10" pattern="[0-9]+" value="<?php  echo $row->Phone;?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Company Website</label>
                                        <input type="text" class="form-control add-listing_form" name="comwebsite" value="<?php  echo $row->CompanyWebsite;?>">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Owner Designation</label>
                                        <input type="text" class="form-control add-listing_form" name="ownerdesi" required="true" value="<?php  echo $row->OwnerDesignation;?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Company</label>
                                        <input type="text" class="form-control add-listing_form" name="company" required="true" value="<?php  echo $row->Company;?>">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Facebook Link</label>
                                        <input type="text" class="form-control add-listing_form" name="flink" value="<?php  echo $row->FacebookLink;?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Twitter User</label>
                                        <input type="text" class="form-control add-listing_form" name="twitterlink" value="<?php  echo $row->TweeterLink;?>">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Google Plus</label>
                                        <input type="text" class="form-control add-listing_form" name="googlelink" value="<?php  echo $row->Googlepluslink;?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Linked In</label>
                                        <input type="text" class="form-control add-listing_form" name="linkedin" value="<?php  echo $row->Linkedinlink;?>">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="exampleFormControlTextarea1">Description</label>
                                        <textarea class="form-control add-listing_form" id="exampleFormControlTextarea1" rows="3" name="description" required="true">"<?php  echo $row->Description;?>"</textarea>
                                    </div>
                                </div>
                            </div>
                            <!--//End Full Details -->

                            <!-- Add Gallery -->
                            <div class="listing-title">
                                <span class="ti-gallery"></span>
                                <h4>Update Image</h4>
                                <p>Update Something General Information About Your Listing</p>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="custom-file">
                                       
                                       
<img src="images/<?php echo $row->Logo;?>" width="200" height="200" value="<?php  echo $row->Logo;?>"><a href="changeimage.php?editid=<?php echo $row->ID;?>"> &nbsp; Edit Image</a>
                                    </div>
                                </div>
                            </div>
                            <!--//End Add Gallery --><?php $cnt=$cnt+1;}} ?>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="btn-wrap btn-wrap2">
                                       <button type="submit" class="btn btn-primary" name="submit" id="submit">UPDATE LISTING</button>
                                    </div>
                                </div>
                            </div>
                            <!--//End Opening Hours -->

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--//END ADD LISTING -->
   <?php include_once('includes/footer.php');?>

    <!-- jQuery, Bootstrap JS. -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>



</body>

</html><?php } ?>
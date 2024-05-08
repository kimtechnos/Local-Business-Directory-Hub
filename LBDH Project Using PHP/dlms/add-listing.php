<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['lssemsuid']==0)) {
echo "<script>alert('Please login for add listing.');</script>";
echo "<script>window.location.href ='logout.php'</script>";
  } else{
    if(isset($_POST['submit']))
  {

$lssemsuid=$_SESSION['lssemsuid'];
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

$logo=$_FILES["logo"]["name"];
$extension = substr($logo,strlen($logo)-4,strlen($logo));
$allowed_extensions = array(".jpg","jpeg",".png",".gif");
if(!in_array($extension,$allowed_extensions))
{
echo "<script>alert('Logo has Invalid format. Only jpg / jpeg/ png /gif format allowed');</script>";
}
else
{

$logo=md5($logo).time().$extension;
 move_uploaded_file($_FILES["logo"]["tmp_name"],"images/".$logo);
$sql="insert into tbllisting(UserID,ListingTitle,Keyword,Category,Website,Address,TemporaryAddress,City,county,Country,Zipcode,OwnerName,Email,Phone,CompanyWebsite,OwnerDesignation,Company,FacebookLink,TweeterLink,Googlepluslink,Linkedinlink,Description,Logo) values(:lssemsuid,:listingtitle,:keywords,:category,:website,:add,:tadd,:city,:county,:country,:zipcode,:ownername,:email,:phone,:comwebsite,:ownerdesi,:company,:flink,:twitterlink,:googlelink,:linkedin,:description,:logo)";
$query=$dbh->prepare($sql);
$query->bindParam(':lssemsuid',$lssemsuid,PDO::PARAM_STR);
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
$query->bindParam(':logo',$logo,PDO::PARAM_STR);

 $query->execute();
   $LastInsertId=$dbh->lastInsertId();
   if ($LastInsertId>0) {
    echo '<script>alert("Listing Detail has been added.")</script>';
echo "<script>window.location.href ='add-listing.php'</script>";
  }
  else
    {
         echo '<script>alert("Something Went Wrong. Please try again")</script>';
    }  
}
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    
    <!-- Page Title -->
    <title>Local Busines Directory Hub|| Listed</title>
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
                        <h2>Add Listing</h2>
                        <p> <a href="index.php"> Home</a> / Add Listing</p>
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
                            <!-- General Information -->
                            <div class="listing-title">
                                <span class="ti-files"></span>
                                <h4>General Information</h4>
                                <p>Write Something General Information About Your Listing</p>
                            </div>


                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Listing Title</label>
                                        <input type="text" class="form-control add-listing_form" name="listingtitle" required="true">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Keyword</label>
                                        <input type="text" class="form-control add-listing_form" name="keywords" required="true">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Category</label>
                                        <select class="form-control add-listing_form" name="category" required="true">
       <?php 

$sql2 = "SELECT * from   tblcategory ";
$query2 = $dbh -> prepare($sql2);
$query2->execute();
$result2=$query2->fetchAll(PDO::FETCH_OBJ);

foreach($result2 as $row)
{          
    ?>  
<option value="<?php echo htmlentities($row->ID);?>"><?php echo htmlentities($row->Category);?></option>
 <?php } ?> 
    </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Website</label>
                                        <input type="text" class="form-control add-listing_form" name="website">
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
                                        <input type="text" class="form-control add-listing_form" name="add" required="true">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Temporary Address</label>
                                        <input type="text" class="form-control add-listing_form" name="tadd" required="true">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>City</label>
                                        <input type="text" class="form-control add-listing_form" name="city" required="true">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>County</label>
                                        <input type="text" class="form-control add-listing_form" name="county" required="true">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Country</label>
                                        <input type="text" class="form-control add-listing_form" name="country" required="true">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Zip-Code</label>
                                        <input type="text" class="form-control add-listing_form" name="zipcode" required="true">
                                    </div>
                                </div>
                            </div>
                            <!--//End Add Location -->

                            <!-- Full Details -->
                            <div class="listing-title">
                                <span class="ti-location-pin"></span>
                                <h4>Full Details</h4>
                                <p>Write Something General Information About Your Listing</p>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Owner Name</label>
                                        <input type="text" class="form-control add-listing_form" name="ownername" required="true">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="email" class="form-control add-listing_form" name="email" required="true">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Phone</label>
                                        <input type="text" class="form-control add-listing_form" name="phone" required="true" maxlength="10" pattern="[0-9]+">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Website</label>
                                        <input type="text" class="form-control add-listing_form" name="comwebsite">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Owner Designation</label>
                                        <input type="text" class="form-control add-listing_form" name="ownerdesi" required="true">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Company</label>
                                        <input type="text" class="form-control add-listing_form" name="company" required="true">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Facebook Link</label>
                                        <input type="text" class="form-control add-listing_form" name="flink">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Twitter User</label>
                                        <input type="text" class="form-control add-listing_form" name="twitterlink">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Google Plus</label>
                                        <input type="text" class="form-control add-listing_form" name="googlelink">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Linked In</label>
                                        <input type="text" class="form-control add-listing_form" name="linkedin">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="exampleFormControlTextarea1">Description</label>
                                        <textarea class="form-control add-listing_form" id="exampleFormControlTextarea1" rows="3" name="description" required="true"></textarea>
                                    </div>
                                </div>
                            </div>
                            <!--//End Full Details -->

                            <!-- Add Gallery -->
                            <div class="listing-title">
                                <span class="ti-gallery"></span>
                                <h4>Add featured Image</h4>
                                <p>Write Something General Information About Your Listing</p>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="custom-file">
                                        <div class="add-gallery-text">
                                            <i class="ti-gallery"></i>
                                            <span>Drag &amp; Drop To Image</span>
                                        </div>
                                       
                                        <input type="file" class="custom-file-input" id="logo" name="logo" required="true">
                                    </div>
                                </div>
                            </div>
                            <!--//End Add Gallery -->
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="btn-wrap btn-wrap2">
                                       <button type="submit" class="btn btn-primary" name="submit" id="submit">SUBMIT LISTING</button>
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
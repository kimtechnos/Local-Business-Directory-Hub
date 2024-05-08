<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['lssemsuid']==0)) {

header('location:logout.php');
  } else{
if(isset($_POST['submit']))
  {
$eid=$_GET['editid'];
$propic=$_FILES["newpic"]["name"];
$extension = substr($propic,strlen($propic)-4,strlen($propic));
$allowed_extensions = array(".jpg","jpeg",".png",".gif");
if(!in_array($extension,$allowed_extensions))
{
echo "<script>alert('Logo has Invalid format. Only jpg / jpeg/ png /gif format allowed');</script>";
}
else
{

$propic=md5($propic).time().$extension;
 move_uploaded_file($_FILES["newpic"]["tmp_name"],"images/".$propic);

 $sql="update tbllisting set Logo=:pic where ID=:eid";

$query = $dbh->prepare($sql);
$query->bindParam(':pic',$propic,PDO::PARAM_STR);
$query->bindParam(':eid',$eid,PDO::PARAM_STR);
    $query->execute();

    echo '<script>alert("Image has been updated")</script>';

  }
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
$sql="SELECT tblcategory.Category as cat,tbllisting.*  from tbllisting inner join tblcategory on tblcategory.ID=tbllisting.Category where tbllisting.ID=:eid";
$query = $dbh -> prepare($sql);
$query->bindParam(':eid',$eid,PDO::PARAM_STR);
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
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Listing Title</label>
                                        <input type="text" class="form-control add-listing_form" name="listingtitle" readonly="true" value="<?php  echo $row->ListingTitle;?>">
                                    </div>
                                </div>
                              
                            </div>

                           <div class="row">
                                
                               <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Old Image</label>
                                        <img src="images/<?php echo $row->Logo;?>" width="100" height="100" value="<?php  echo $row->Logo;?>">
                                    </div>
                                </div>
                            </div>
                            <!--//End Full Details -->

                            <!-- Add Gallery -->
                            <div class="listing-title">
                                <span class="ti-gallery"></span>
                                <h4>Update Gallery</h4>
                                <p>Update Something General Information About Your Listing</p>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="custom-file">

 <input type="file" name="newpic" value="" class="form-control" id="newpic" required='true'>
                                    </div>
                                </div>
                            </div>
                            <!--//End Add Gallery --><?php $cnt=$cnt+1;}} ?>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="btn-wrap btn-wrap2">
                                       <button type="submit" class="btn btn-primary" name="submit" id="submit">UPDATE Image</button>
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
<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
   
    <!-- Page Title -->
    <title>Local Business directory Hub|| Listing</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900" rel="stylesheet">
    <!-- Themify Icon -->
    <link rel="stylesheet" href="css/themify-icons.css">
    <!-- Line Icon -->
    <link rel="stylesheet" href="css/simple-line-icons.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <!-- Hover Effects -->
    <link href="css/set1.css" rel="stylesheet">
    <!-- Main CSS -->
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <?php include_once('includes/header.php');?>
   <section class="featured-wrap">
        <div class="container-fluid container-subpage">
            <div class="row">
                <div class="col-md-12 responsive-wrap">
                    <div class="row detail-filter-wrap">
                  

                    </div>
                    <div class="map-responsive-wrap">
                        <a class="map-icon btn btn-block" href="#"><i class="icon-location-pin"></i> <small>OPEN LISTING IN MAP</small></a>
                    </div>
                    <div class="row detail-checkbox-wrap">
                       
                       <h3 class="card-title" style="padding-left: 20px;">Listing Detail</h3>
                      
                    </div>
                    <div class="row">
                                                       <?php

$sql="SELECT * from  tbllisting";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $row)
{               ?>
                        <div class="col-md-3 card-2">
                            <!-- card-1 -->
                            <div class="card">
 
                                <a href="listing-detail.php?lid=<?php echo $row->ID;?>"><img class="card-img-top" src="images/<?php echo $row->Logo;?>" height="200" width="300" alt="Card image cap"></a>
                                <div class="card-body">
                                    <h5 class="card-title"><a href="listing-detail.php?lid=<?php echo $row->ID;?>"><?php echo $row->ListingTitle;?></a></h5>
                                    <ul class="card-rating">
                                        
                                       
                                       
                                    </ul>
                                    <p class="card-text"><?php echo substr($row->Description,-150);?> </p>
                                </div>
                                <div class="card-bottom">
                                    <p><i class="ti-location-pin"></i><?php echo $row->Country;?></p>
                                    <span><?php echo $row->State;?></span>
                                    <span style="padding-left: 10px"><?php echo $row->City;?></span>
                                </div>
                            </div>
                        </div>
<?php }} ?>
                    </div>
                </div>

            </div>
        </div>
    </section>
     <?php include_once('includes/footer.php');?>
  
    <!-- jQuery, Bootstrap JS. -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/script.js"></script>
    <!-- Map JS (Please change the API key below. Read documentation for more info) -->
    <script src="https://maps.googleapis.com/maps/api/js?callback=myMap&key=AIzaSyDMTUkJAmi1ahsx9uCGSgmcSmqDTBF9ygg"></script>

</body>

</html>
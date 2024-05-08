
<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
?><!DOCTYPE html>
<html lang="en">

<head>
   
    <!-- Page Title -->
    <title>Local Business directory Hub|| Home Page</title>
    
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
<!--======header=====-->
<?php include_once('includes/header.php');?>
 
<section class="hero-wrap d-flex align-items-center">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="hero-title">
                    <h1>Seeking the ideal business venue in your city?</h1>
                    <h3>Dive into our extensive catalog of over 1,000 local business listings to find your perfect spot. </h3>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <form name="search" action="search-listing.php" method="post">
                        <div class="search-box">
                            <div class="row">
                                <div class="col-md-6 search-box_line">
                                    <div class="search-box1">
                                        <div class="search-box-title">
                                            <label>What?</label><br>
                                            <select class="search-form" name="categories" >
                                <option class="options" value="all-categories">all categories</option>
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
                                </div>
                                <div class="col-md-6">
                                    <div class="search-box2">
                                        <div class="search-box-title">
                                            <label>Where?</label><br>
                                            
                                            <input class="search-form" type="text" name="location" style="height:55px;" required="true" placeholder="Eg:  Murang'a, UP"> 
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="btn-search">
                            <button  class="btn btn-primary" type="submit" name="search"><h2>Search →</h2></button>                            
                            
                        </div>
                    </form>
                    <p class="search-bottom-title">By using this website, you are agreeing to our <a href="#"> terms and conditions</a></p>
                </div>
            </div>
        </div>
    </section>
    <!--//END MAIN TITLE -->
 


   
    <!--============================= ADD LISTING =============================-->
    <section class="main-block">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <div class="titile-block">
                        <h2>Grow Locally, Impact Globally</h2>
                        <p>Boost your local business and substantially enhance your earnings with our directory.</p>
                    </div>
                    <div class="btn-wrap btn-wrap2">
                        <a href="add-listing.php" class="btn btn-simple">Add your Listing →</a>
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

</html>
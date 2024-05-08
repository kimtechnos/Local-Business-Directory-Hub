<?php
session_start();
//error_reporting(0);
include('includes/dbconnection.php');
if (isset($_POST['review'])) {
    $name = $_POST['name'];
    $review = $_POST['reviewmessage'];

    $reviewtitle = $_POST['reviewtitle'];
    $lid = $_GET['lid'];


    $sql = "insert into tblreview(ListingID,ReviewTitle,Review,Name) values(:lid,:reviewtitle,:review,:name)";
    $query = $dbh->prepare($sql);

    $query->bindParam(':lid', $lid, PDO::PARAM_STR);
    $query->bindParam(':reviewtitle', $reviewtitle, PDO::PARAM_STR);
    $query->bindParam(':review', $review, PDO::PARAM_STR);
    $query->bindParam(':name', $name, PDO::PARAM_STR);
    $query->execute();
    $LastInsertId = $dbh->lastInsertId();
    if ($LastInsertId > 0) {
        echo "<script>alert('Your review was sent successfully!.');</script>";
        echo "<script>window.location.href ='index.php'</script>";
    } else {
        echo '<script>alert("Something Went Wrong. Please try again")</script>';
    }
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->

    <!-- Page Title -->
    <title>local Business Directory Hub || Listing Detail</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900" rel="stylesheet">
    <!-- Themify Icon -->
    <link rel="stylesheet" href="css/themify-icons.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />


    <!-- line icons -->
    <link rel="stylesheet" href="css/simple-line-icons.css">
    <!-- Swipper Slider -->
    <link rel="stylesheet" href="css/swiper.min.css">
    <!-- Magnific Popup CSS -->
    <link rel="stylesheet" href="css/magnific-popup.css">
    <!-- Hover Effects -->
    <link href="css/set1.css" rel="stylesheet">
    <!-- Main CSS -->
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <?php include_once('includes/header.php'); ?>
    <!--============================= BOOKING =============================-->
    <?php
    $lid = intval($_GET['lid']);
    $sql = "SELECT * from  tbllisting 
join tblcategory on tblcategory.ID=tbllisting.Category
where tbllisting.ID=:lid";
    $query = $dbh->prepare($sql);
    $query->bindParam(':lid', $lid, PDO::PARAM_STR);
    $query->execute();
    $results = $query->fetchAll(PDO::FETCH_OBJ);
    $cnt = 1;
    if ($query->rowCount() > 0) {
        foreach ($results as $row) {               ?>
            <div align="center">
                <!-- Swiper -->

                <img src="images/<?php echo $row->Logo; ?>" height="400" width="800">


            </div>
            <!--//END BOOKING -->
            <!--===== RESERVE A SEAT ======-->

            <section class="reserve-block">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                            <h5><?php echo $row->ListingTitle; ?></h5>

                            <p class="reserve-description"><?php echo substr($row->Description, -100); ?></p>
                        </div>

                    </div>
                </div>
            </section>
            <!--//END RESERVE A SEAT -->
            <!--============================= BOOKING DETAILS =============================-->
            <section class="gray-dark booking-details_wrap">
                <div class="container">
                    <div class="row">
                        <div class="col-md-8 responsive-wrap">
                            <div class="booking-checkbox_wrap">

                           
                                <div class="booking-checkbox_wrap">
                                    <div class="booking-checkbox" style="padding: 15px;">
                                        <p style="font-weight: bold;"><?php echo $row->Company; ?></p>
                                        <p style="line-height: 1.5;"><?php echo nl2br(substr($row->Description, 0, 700)); ?>...</p>
                                        <p> Keyword: <?php echo $row->Keyword; ?></p>
                                        <p> Category: <?php echo $row->Category; ?></p>
                                        <p> Website: <a href="<?php echo $row->Website; ?>" style="color: #007bff;"><?php echo $row->Website; ?></a></p>
                                        <p>
                                            <i class="fas fa-phone" style="color: #007bff;"></i> <a href="tel:<?php echo $row->Phone; ?>" style="color: #007bff;"><?php echo $row->Phone; ?></a> &nbsp;
                                            <i class="fas fa-envelope" style="color: #007bff;"></i> <a href="mailto:<?php echo $row->Email; ?>" style="color: #007bff;"><?php echo $row->Email; ?></a>
                                            
                                        
                                        <hr>
                                    </div>
                                </div>




                            </div>
                            <div class="booking-checkbox_wrap booking-your-review">
                                <h5>Write a Review</h5>
                                <hr>
                                <form enctype="multipart/form-data" method="post">
                                    <div class="customer-review_wrap">
                                        <div class="customer-img">
                                            <!-- <img src="images/avatar.jpg" class="img-fluid" alt="#"> -->
                                        </div>
                                        <div class="customer-content-wrap">


                                            <div class="your-comment-wrap">
                                                <label for="form-message">Title for your review*</label>
                                                <input type="text" id="reviewtitle" name="reviewtitle" required="true" class="form-control add-listing_form">

                                            </div>
                                            <div class="your-comment-wrap">
                                                <label for="form-message">Your review*</label>
                                                <textarea rows="5" name="reviewmessage" required="true" class="form-control"></textarea>

                                            </div>
                                            <div class="your-comment-wrap">
                                                <label for="form-message">Your name*</label>
                                                <input type="text" id="name" name="name" required="true" class="form-control add-listing_form">

                                            </div>
                                            <div class="row">

                                                <div class="col-md-4">
                                                    <div class="your-rating-btn" style="padding-top: 20px;">
                                                        <button class="btn btn-primary" type="submit" name="review">Send</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                </form>
                            </div>
                        </div>
                        <div class="booking-checkbox_wrap my-4">
                            <?php
                            $lid = $_GET['lid'];

                            $ret = "select * from tblreview where ListingID='$lid' && Status='Review Accept'";
                            $query1 = $dbh->prepare($ret);
                            $query1->bindParam(':lid', $lid, PDO::PARAM_STR);
                            $query1->execute();
                            $results1 = $query1->fetchAll(PDO::FETCH_OBJ);
                            $cnt = 1;
                            if ($query1->rowCount() > 0) {
                                foreach ($results1 as $row1) {               ?>
                                    <hr>
                                    <div class="customer-review_wrap">


                                        <div class="customer-img">
                                            <img src="images/customer-img1.jpg" class="img-fluid" alt="#">

                                            <p><?php echo $row1->Name; ?></p>

                                        </div>
                                        <div class="customer-content-wrap">
                                            <div class="customer-content">
                                                <div class="customer-review">
                                                    <h5><?php echo $row1->ReviewTitle; ?></h5>

                                                    <p><?php echo $row1->DateofReview; ?></p>
                                                </div>

                                            </div>
                                            <p class="customer-text"><?php echo $row1->Review; ?>. </p>


                                        </div>
                                    </div>
                                    <hr>

                            <?php $cnt = $cnt + 1;
                                }
                            } ?>
                        </div>
                    </div>
                    <div class="col-md-4 responsive-wrap">
                        <div class="contact-info">

                            <img src="images/map.jpg" class="img-fluid" alt="#">
                            <div class="address">

                                <p><strong>Company Name: </strong><?php echo $row->Company; ?></p>
                                <span class="icon-location-pin"></span>
                                <p><strong>Permanent Address: </strong><?php echo $row->Address; ?></p>
                                <span class="icon-location-pin"></span>
                                <p><strong>Temporary Address: </strong><?php echo $row->TemporaryAddress; ?></p>


                                <br>Country: <?php echo $row->Country; ?><br>county: <?php echo $row->State; ?> <br>City: <?php echo $row->City; ?> <br>Zipcode: <?php echo $row->Zipcode; ?>
                            </div>
                            <div class="address">
                                <span class="icon-screen-smartphone"></span>
                                <p> +<?php echo $row->Phone; ?></p>
                            </div>
                            <div class="address">
                                <span class="fa fa-envelope"></span>
                                <p><?php echo $row->Email; ?></p>
                            </div>
                            <div class="address">
                                <span class="icon-link"></span>
                                <p><?php echo $row->CompanyWebsite; ?></p>
                            </div>


                        </div>
                        <div class="follow">
                            <div class="follow-img">
                                <img src="images/follow-img.jpg" class="img-fluid" alt="#">
                                <h6><?php echo $row->OwnerName; ?></h6>
                                <span><?php echo $row->Country; ?></span>
                            </div>
                            <ul class="d-flex">
                                <li class=" flex-fill">
                                    <h6>Facebook</h6>
                                    <span><a href="<?php echo $row->FacebookLink; ?>" target="_blank"><?php echo $row->FacebookLink; ?></a></span>
                                </li>
                            </ul>
                            <ul class="d-flex">
                                <li class=" flex-fill">
                                    <h6>Tweeter</h6>
                                    <span><a href="<?php echo $row->TweeterLink; ?>" target="_blank"><?php echo $row->TweeterLink; ?></a></span>
                                </li>

                            </ul>
                            <ul class="d-flex">

                                <li class=" flex-fill">
                                    <h6>Linkdn</h6>
                                    <span>
                                        <a href="<?php echo $row->Linkedinlink; ?>" target="_blank"><?php echo $row->Linkedinlink; ?></a>

                                    </span>
                                </li>
                            </ul>
                            <ul class="d-flex">
                                <li class=" flex-fill">
                                    <h6>Google Plus</h6>
                                    <span>
                                        <a href="<?php echo $row->Googlepluslink; ?>" target="_blank"><?php echo $row->Googlepluslink; ?></a>

                                    </span>
                                </li>

                            </ul>

                        </div><?php $cnt = $cnt + 1;
                            }
                        } ?>
                    </div>
                </div>
                </div>
            </section>
            <!--//END BOOKING DETAILS -->
            <?php include_once('includes/footer.php'); ?>

            <!-- jQuery, Bootstrap JS. -->
            <!-- jQuery first, then Popper.js, then Bootstrap JS -->
            <script src="js/jquery-3.2.1.min.js"></script>
            <script src="js/popper.min.js"></script>
            <script src="js/bootstrap.min.js"></script>

            <!-- Magnific popup JS -->
            <script src="js/jquery.magnific-popup.js"></script>
            <!-- Swipper Slider JS -->
            <script src="js/swiper.min.js"></script>
            <script>
                var swiper = new Swiper('.swiper-container', {
                    slidesPerView: 3,
                    slidesPerGroup: 3,
                    loop: true,
                    loopFillGroupWithBlank: true,
                    pagination: {
                        el: '.swiper-pagination',
                        clickable: true,
                    },
                    navigation: {
                        nextEl: '.swiper-button-next',
                        prevEl: '.swiper-button-prev',
                    },
                });
            </script>
            <script>
                if ($('.image-link').length) {
                    $('.image-link').magnificPopup({
                        type: 'image',
                        gallery: {
                            enabled: true
                        }
                    });
                }
                if ($('.image-link2').length) {
                    $('.image-link2').magnificPopup({
                        type: 'image',
                        gallery: {
                            enabled: true
                        }
                    });
                }
            </script>

</body>

</html>3
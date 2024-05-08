<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['lssemsaid']==0)) {
  header('location:logout.php');
  } else{
    
  ?>
<!DOCTYPE html>
<html>
<head>
  
  <title>Local Business DIrectory Hub | View Listing Detail</title>
    
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <?php include_once('includes/header.php');?>

 
<?php include_once('includes/sidebar.php');?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>View Listing Detail</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
              <li class="breadcrumb-item active">View Listing Detail</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">View Listing Detail</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              
                
                <div class="card-body">

                  <div class="form-group">
                    <table id="example1" class="table table-bordered table-striped">
                       <?php
$vid=intval($_GET['viewid']);
$sql="SELECT * from  tbllisting 
join tblcategory on tblcategory.ID=tbllisting.Category join tbluser on tbluser.ID=tbllisting.UserID
where tbllisting.ID=:vid";
$query = $dbh -> prepare($sql);
$query-> bindParam(':vid', $vid, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $row)
{               ?>
  <tr>
    <th>Listed By</th>
    <td><?php  echo htmlentities($row->FullName);?></td>
    <th>Lister Mobile Number</th>
    <td><?php  echo htmlentities($row->MobileNumber);?></td>
  </tr>
 <tr>
   <th style="color:blue;text-align: center;font-size: 20px;" colspan="6">Listing Detail</th>
 </tr>
                    <tr>
                      <th>Listing Title</th>
                      <td><?php  echo htmlentities($row->ListingTitle);?></td>
                      <th>Keyword</th>
                      <td><?php  echo htmlentities($row->Keyword);?></td>
                    </tr>
                    <tr>
                      <th>Category</th>
                      <td><?php  echo htmlentities($row->Category);?></td>
                      <th>Website</th>
                      <td><?php  echo htmlentities($row->Website);?></td>
                    </tr>
                    <tr>
                      <th>Address</th>
                      <td><?php  echo htmlentities($row->Address);?></td>
                      <th>Temporary Address</th>
                      <td><?php  echo htmlentities($row->TemporaryAddress);?></td>
                    </tr>
                    <tr>
                      <th>City</th>
                      <td><?php  echo htmlentities($row->City);?></td>
                      <th>State</th>
                      <td><?php  echo htmlentities($row->State);?></td>
                    </tr>
                    <tr>
                      <th>Country</th>
                      <td><?php  echo htmlentities($row->Country);?></td>
                      <th>Zipcode</th>
                      <td><?php  echo htmlentities($row->Zipcode);?></td>
                    </tr>

                     <tr>
                      <th>Owner Name</th>
                      <td><?php  echo htmlentities($row->OwnerName);?></td>
                      <th>Email</th>
                      <td><?php  echo htmlentities($row->Email);?></td>
                    </tr>
                     <tr>
                      <th>Phone</th>
                      <td><?php  echo htmlentities($row->Phone);?></td>
                      <th>Company Website</th>
                      <td><?php  echo htmlentities($row->CompanyWebsite);?></td>
                    </tr>

                    <tr>
                      <th>Owner Designation</th>
                      <td><?php  echo htmlentities($row->OwnerDesignation);?></td>
                      <th>Company</th>
                      <td><?php  echo htmlentities($row->Company);?></td>
                    </tr>
                     <tr>
                      <th>Facebook Link</th>
                      <td><?php  echo htmlentities($row->FacebookLink);?></td>
                      <th>Tweeter Link</th>
                      <td><?php  echo htmlentities($row->TweeterLink);?></td>
                    </tr>
                     <tr>
                      <th>Googleplus link</th>
                      <td><?php  echo htmlentities($row->Googlepluslink);?></td>
                      <th>Linkedin link</th>
                      <td><?php  echo htmlentities($row->Linkedinlink);?></td>
                    </tr>
                     <tr>
                      <th>Description</th>
                      <td><?php  echo htmlentities($row->Description);?></td>
                      <th>Logo</th>
                      <td> <img src="../images/<?php echo $row->Logo;?>" class="img-fluid" alt="#"></td>
                    </tr>
                    <?php $cnt=$cnt+1;}} ?></table>
            </div></div>
            <!-- /.card -->

          </div>
          <!--/.col (left) -->
          <!-- right column -->
         
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
 
<?php include_once('includes/footer.php');?>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- bs-custom-file-input -->
<script src="plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<script type="text/javascript">
$(document).ready(function () {
  bsCustomFileInput.init();
});
</script>
</body>
</html>
<?php }  ?>
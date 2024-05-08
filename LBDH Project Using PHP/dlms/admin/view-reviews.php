<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['lssemsaid']==0)) {
  header('location:logout.php');
  } else{
    if(isset($_POST['submit']))
  {

$rid=$_GET['rid'];
    $ressta=$_POST['status'];
    $remark=$_POST['restremark'];

$sql="update tblreview set Status=:ressta,Remark=:remark where ID=:rid";
$query=$dbh->prepare($sql);
$query->bindParam(':ressta',$ressta,PDO::PARAM_STR);
$query->bindParam(':remark',$remark,PDO::PARAM_STR);
$query->bindParam(':rid',$rid,PDO::PARAM_STR);
 $query->execute();

   $query->execute();

    echo '<script>alert("Review status has been updated")</script>';
echo "<script type='text/javascript'> document.location ='all-review.php'; </script>";
  }
  ?>
<!DOCTYPE html>
<html>
<head>
  
  <title>Local Business DIrectory Hub | View Review Detail</title>
    
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
            <h1>View Review Detail</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
              <li class="breadcrumb-item active">View Review Detail</li>
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
                <h3 class="card-title">View Review Detail</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              
                
                <div class="card-body">

                  <div class="form-group">
                    <table id="example1" class="table table-bordered table-striped">
                       <?php
$rid=intval($_GET['rid']);
$sql="select tblreview.ID,tblreview.ListingID,tblreview.ReviewTitle,tblreview.Review,tblreview.Status,tblreview.Name,tblreview.DateofReview,tbllisting.ListingTitle,tbllisting.Company,tbllisting.CompanyWebsite,tbllisting.CompanyWebsite,tbllisting.Email, tbllisting.Phone,tbllisting.OwnerName from tblreview join tbllisting on tbllisting.ID=tblreview.ListingID
where tblreview.ID=:rid";
$query = $dbh -> prepare($sql);
$query-> bindParam(':rid', $rid, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $row)
{               ?>
  <tr>
    <th>Company Name</th>
    <td><?php  echo htmlentities($row->Company);?></td>
    <th>Listing Title</th>
    <td><?php  echo htmlentities($row->ListingTitle);?></td>
  </tr>
   <tr>
    <th>Company Website</th>
    <td><?php  echo htmlentities($row->CompanyWebsite);?></td>
    <th>Company Email</th>
    <td><?php  echo htmlentities($row->Email);?></td>
  </tr>
  <tr>
    <th>Phone</th>
    <td><?php  echo htmlentities($row->Phone);?></td>
    <th>Owner Name</th>
    <td><?php  echo htmlentities($row->OwnerName);?></td>
  </tr>
  <tr>
    <th>Review Status</th>
    <td><?php $status= $row->Status;
if($row->Status=="Review Accept")
{
  echo "Review Accept";
}


if($row->Status=="Review Reject")
{
  echo "Review Reject";
}

if($row->Status=="")
{
  echo "Wait for approval";
}

  ?></td>
  </tr>
 <tr>
   <th style="color:blue;text-align: center;font-size: 20px;" colspan="6">Review Detail</th>
 </tr>
                     <tr>
    <th>Review By</th>
    <td><?php  echo $row->Name;?></td>
    <th>Review Title</th>
    <td><?php  echo $row->ReviewTitle;?></td>
  </tr>
  <tr>
    <th>Review</th>
    <td><?php  echo $row->Review;?></td>
    <th>Date of Review</th>
    <td><?php  echo $row->DateofReview;?></td>
  </tr>
                    
                    <?php $cnt=$cnt+1;}} ?></table>
                    <table class="table table-bordered data-table">
<?php

  if($status=="" ){ ?>
<form name="submit" method="post"> 
<tr>
    <th>Remark :</th>
    <td colspan="6">
    <textarea name="restremark" placeholder="" rows="5" cols="14" class="form-control" required="true"></textarea></td>
  </tr>

  <tr>
    <th>Status :</th>
    <td>
   <select name="status" class="form-control" required="true" >
     <option value="Review Accept" selected="true">Review Accept</option>
          <option value="Review Reject">Review Reject</option>
     
   </select></td>
  </tr>
    <tr align="center" style="text-align: center';">
    <td ><button type="submit" name="submit" class="btn btn-primary">Update Review</button></td>
  </tr>
</form>

</table>

<?php } ?>
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
<?php
include('includes/dbconnection.php');
$id=$_GET['id'];
$select="SELECT * FROM holiday WHERE id='$id'";
$query_run=mysqli_query($con, $select);
if (mysqli_num_rows($query_run)>0) 
{
 foreach ($query_run as $holiday) {
 }
 }
 ?>
 <?php
if(isset($_POST['submit']))
  {
   
    
    
    $date=$_POST['date'];
    
   
     $query="UPDATE holiday SET  Hours='$date' where ID='$id'";
 $ret=mysqli_query($con,$query);
    if($ret)
{
  echo "<script>alert('Successfully Updated Employee Leave.');</script>";
   echo "<script>window.location.href ='leaves.php'</script>";
}
else{echo "<script>alert('Please correctly fill in your datails and try again!');</script>";
       echo "<script>window.location.href ='leaves.php'</script>";
   }
  }
  ?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>DU|HRMS</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
  <?php include_once('includes/sidebar.php')?>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
         <?php include_once('includes/header.php')?>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800">Employee Leave Update </h1>

<form class="user" method="post" action="" enctype="multipart/form-data" role="form">                                                                     
                     <div class="row">
                      <div class="col-4 mb-3">Date Of Update</div>
                    <div class="col-8  mb-3">
                      <input type="text" class="form-control form-control-user" value="<?= $holiday['Hours'];?>" id="jDate" name="date">
                    </div></div>

                  

                    <div class="row" style="margin-top:4%">
                      <div class="col-4"></div>
                      <div class="col-4">
                      <input type="submit" name="submit"  value="Update" class="btn btn-primary btn-user btn-block">
                    </div>
                    </div>


                  <div class="row" style="margin-top:4%">
                      <div class="col-4"></div>
                      <div class="col-4">
                      <button><a href="leaves.php" style="text-decoration: none;" >Back</a></button>
                    </div>
                    </div>
                  
                  </form>





        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
   <?php include_once('includes/footer.php');?>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>
</body>

</html>


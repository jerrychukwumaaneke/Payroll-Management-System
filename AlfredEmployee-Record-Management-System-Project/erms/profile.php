<?php 
session_start();
error_reporting(0);
include('includes/dbconnection.php');
?>

<?php
    $empid=$_SESSION['uid'];
$ret=mysqli_query($con, "SELECT * FROM empprofile WHERE ID='$empid'");
$row=mysqli_fetch_array($ret);
$FName=$row['Firstname'];
$LName=$row['Lastname'];
    $empcode=$row['Empcode'];
    $EmpDept=$row['EmpDept'];
    $EmpDesignation=$row['EmpDesignation'];
    $EmpContactNo=$row['EmpContactNo'];
    $Email=$row['email'];
    $gender=$row['gender'];
    ?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>DU|Payroll System</title>

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
          <h1 class="h3 mb-4 text-gray-800">My Profile</h1>

<form class="user" method="post">
  
               <div class="row">
                <div class="col-4 mb-3">First Name</div>
                   <div class="col-8 mb-3">  
        <p class="form-control form-control-user" ><?php echo $FName; ?></p>

                   </div>
                    </div>  
                    <div class="row">
                      <div class="col-4 mb-3">Last Name </div>
                     <div class="col-8 mb-3">
                      <p class="form-control form-control-user" ><?php echo $LName; ?></p>

                       </div>  
                     </div>



                    <div class="row">
                    <div class="col-4 mb-3">Employee Code </div>
                    <div class="col-8 mb-3">
                      <p class="form-control form-control-user" ><?php echo $empcode; ?></p>

                      </div>
                    </div>

                    <div class="row">
                      <div class="col-4 mb-3">Employee Dept</div>
                     <div class="col-8 mb-3">
                      <p class="form-control form-control-user" ><?php echo $EmpDept; ?></p>

                    </div></div>
                    <div class="row">
                    <div class="col-4 mb-3">Employee Desigantion</div>

                    <div class="col-8 mb-3">
                      <p class="form-control form-control-user" ><?php echo $EmpDesignation; ?></p>

                    </div></div>
                    <div class="row">
                      <div class="col-4 mb-3">Employee Contact No.</div>
                    <div class="col-8 mb-3">
                      <p class="form-control form-control-user" ><?php echo $EmpContactNo; ?></p>

                    </div></div>
                    <div class="row">
                    <div class="col-4 mb-3">Email</div>
                   <div class="col-8 mb-3">
                     
                     <p class="form-control form-control-user" ><?php echo $Email; ?></p>

                    </div></div>
                
                    
                    <div class="row">
                      <div class="col-4 mb-3">Gender</div>
                    <div class="col-4 mb-3">
                   <div class="clip-radio radio-primary">
                  <p class="form-control form-control-user" ><?php echo $gender; ?></p>
                </div> 
                    </div></div>
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



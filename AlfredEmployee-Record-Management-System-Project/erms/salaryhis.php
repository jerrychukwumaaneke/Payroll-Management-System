<?php 
session_start();
error_reporting(0);
include('includes/dbconnection.php');
include('includes/checklogin.php');
check_login();
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
    <!-- <div id="content-wrapper" class="d-flex flex-column"> -->

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
         <?php include_once('includes/header.php')?>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800">My Salary History</h1>


                  <table class="table table-hover" id="sample-table-1">
<thead>
<tr>
<th class="center">s/n</th>
<th>Image</th>
<th>FullName</th>
<th>Work Department</th>
<th>Attendance</th>
 <th>Email </th>
  <th>Month </th>
<th>Work Salary</th>
<th>House Allowance</th>
<th>Transport Allowance</th>
<th>Total Salary</th>
</tr>
</thead>
<tbody>
<?php
$empid=$_SESSION['uid'];
$query= "SELECT * FROM salary WHERE ID='$empid'";
$sql=mysqli_query($con, $query);
$cnt=1;
if (mysqli_num_rows($sql)>0) 
{
 foreach ($sql as $salary) {
    	
?>
<tr>
	<td><?php echo $cnt;?></td>
  <td><img src="img/emprofilepic/<?= $salary['profilpic'];?>" width="80" height="80"></td>
	<td><?= $salary['Fullname']?></td>
	<td><?= $salary['wd']?></td>
	<td><?= $salary['Hours']?></td>
	<td><?= $salary['email']?></td>
  <td><?= $salary['month']?></td>
	<td><?= $salary['rate']?></td>
	<td><?= $salary['ha']?></td>
	<td><?= $salary['ta']?></td>
	<td><?= $salary['salary']?></td>	
</tr>
<?php 
$cnt=$cnt+1;
 }
   }
      ?>
</tbody>
</table>






        </div>
        <!-- /.container-fluid -->

      <!-- </div> -->
      <!-- End of Main Content -->

      <!-- Footer --><br><br><br><br><br><br>
   <?php include_once('includes/footer.php');?>
      <!-- End of Footer -->

   <!--  </div> -->
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>
</body>

</html>



<?php 
session_start();
// error_reporting(0);
include('includes/dbconnection.php');
if(isset($_POST['submit']))
  {
    $FName=$_POST['FirstName'];
    $wd=$_POST['work'];
    $LName=$_POST['LastName'];
    

 $query=mysqli_query($con, "insert into holiday(Fullname,wd,Hours) values('$FName','$wd','$LName')");
   if($query)
{
  echo "<script>alert('Successfully Applied for a leave. Goodluck!');</script>";
   echo "<script>window.location.href ='leaves.php'</script>";
}
else{echo "<script>alert('Please correctly fill in your datails and try again!');</script>";
       echo "<script>window.location.href ='leave.php'</script>";
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
          <h1 class="h3 mb-4 text-gray-800"> Apply for a Leave</h1>

<form class="user" method="post" >
  
               <div class="row">
                <div class="col-4 mb-3">Full Name</div>
                   <div class="col-8 mb-3">   
                     <select name="FirstName" class="form-control" id="FirstName" required="required">
                                <option value=""></option>
<?php $ret=mysqli_query($con,"select * from salary");
while($row=mysqli_fetch_array($ret))
{
?>
                                <option value="<?php echo htmlentities($row['Fullname']);?>">
                                  <?php echo htmlentities($row['Fullname']);?>
                                </option>
                                <?php } ?>
                                
                              </select>





                   </div>
                    </div> 

                    <div class="row">
                <div class="col-4 mb-3">Work Department</div>
                   <div class="col-8 mb-3">  
              <select name="work" class="form-control" required="required">
                                <option value=""></option>
<?php $ret=mysqli_query($con,"select * from department");
while($row=mysqli_fetch_array($ret))
{
?>
                                <option value="<?php echo htmlentities($row['department']);?>">
                                  <?php echo htmlentities($row['department']);?>
                                </option>
                                <?php } ?>
                                
                              </select>
                   </div>
                    </div>  
                    <div class="row">
                      <div class="col-4 mb-3">Leave Duration </div>
                     <div class="col-8 mb-3">  <input type="text" class="form-control form-control-user" id="LastName" name="LastName"  required="true"></div>  
                     </div>
                
                    <div class="row" style="margin-top:4%">
                      <div class="col-4"></div>
                      <div class="col-4">
                      <input type="submit" name="submit"  value="submit" class="btn btn-primary btn-user btn-block">
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



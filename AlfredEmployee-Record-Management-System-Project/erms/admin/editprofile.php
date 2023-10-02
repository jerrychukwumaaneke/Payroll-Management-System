<?php
include('includes/dbconnection.php');
$id=$_GET['id'];
$select="SELECT * FROM empprofile WHERE id='$id'";
$query_run=mysqli_query($con, $select);
if (mysqli_num_rows($query_run)>0) 
{
 foreach ($query_run as $empprofile) {
 }
 }
 ?>
 <?php
if(isset($_POST['submit']))
  {
   
    
    $FName=$_POST['FirstName'];
    $LName=$_POST['LastName'];
    $empcode=$_POST['EmpCode'];
    $EmpDept=$_POST['EmpDept'];
    $EmpDesignation=$_POST['EmpDesignation'];
    $EmpContactNo=$_POST['EmpContactNo'];
    $Email=$_POST['Email'];
    $gender=$_POST['gender'];
    $empjdate=$_POST['EmpJoingdate'];
     $file_name=$_FILES['image']['name'];
    $file_path= '../img/emprofilepic/'. $file_name;
 move_uploaded_file($_FILES['image']['tmp_name'], $file_path);

     $query="UPDATE empprofile SET profilpic='$file_name', Firstname='$FName',  LastName='$LName',Empcode='$empcode', EmpDept='$EmpDept', EmpDesignation='$EmpDesignation', EmpContactNo='$EmpContactNo', email='$Email', gender='$gender',EmpJoingdate='$empjdate' where ID='$id'";
 $ret=mysqli_query($con,$query);
    if($ret)
{
  echo "<script>alert('Successfully Updated an employee profile.');</script>";
   echo "<script>window.location.href ='emprofile.php'</script>";
}
else{echo "<script>alert('Please correctly fill in your datails and try again!');</script>";
       echo "<script>window.location.href ='emprofile.php'</script>";
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
          <h1 class="h3 mb-4 text-gray-800">Update Profile</h1>

<form class="user" method="post" action="" enctype="multipart/form-data" role="form">
               <div class="row">
                <div class="col-4 mb-3">First Name</div>
                   <div class="col-8 mb-3">   <input type="text" class="form-control form-control-user" id="FirstName" name="FirstName"  required="true" value="<?=$empprofile['Firstname'];?>"></div>
                    </div>  
                    <div class="row">
                      <div class="col-4 mb-3">Last Name </div>
                     <div class="col-8 mb-3">  <input type="text" class="form-control form-control-user" id="LastName" name="LastName" aria-describedby="emailHelp" required="true" value="<?=$empprofile['Lastname'];?>"></div>  
                     </div>



                    <div class="row">
                    <div class="col-4 mb-3">Employee Code </div>
                    <div class="col-8 mb-3">
                      <input type="text" class="form-control form-control-user" id="EmpCode" name="EmpCode" aria-describedby="emailHelp" required="true" value="<?= $empprofile['Empcode'];?>"></div>
                    </div>

                    <div class="row">
                      <div class="col-4 mb-3">Employee Dept</div>
                     <div class="col-8 mb-3">
                      <input type="text" class="form-control form-control-user" id="EmpDept" name="EmpDept" aria-describedby="emailHelp" required="true" value="<?= $empprofile['EmpDept'];?>">
                    </div></div>
                    <div class="row">
                    <div class="col-4 mb-3">Employee Desigantion</div>

                    <div class="col-8 mb-3">
                      <input type="text" class="form-control form-control-user" id="EmpDesignation" name="EmpDesignation" aria-describedby="emailHelp" required="true" value="<?= $empprofile['EmpDesignation'];?>">
                    </div></div>
                    <div class="row">
                      <div class="col-4 mb-3">Employee Contact No.</div>
                    <div class="col-8 mb-3">
                      <input type="text" class="form-control form-control-user" id="EmpContactNo" name="EmpContactNo" aria-describedby="emailHelp" required="true" value="<?= $empprofile['EmpContactNo'];?>">
                    </div></div>
                    <div class="row">
                    <div class="col-4 mb-3">Email</div>
                   <div class="col-8 mb-3">
                     <input type="email" id="Email" name="Email" class="form-control form-control-user" required="true" value="<?=$empprofile['email']; ?>" >
                    </div></div>
                
                    <div class="row">
                      <div class="col-4 mb-3">Employee Joing Date(yyyy-mm-dd)</div>
                    <div class="col-8  mb-3">
                      <input type="text" class="form-control form-control-user" value="<?= $empprofile['EmpJoingdate'];?>" id="jDate" name="EmpJoingdate">
                    </div></div>

                    <div class="row">
                      <div class="col-4 mb-3">Employee Image</div>
                    <div class="col-8  mb-3">
                      <img src="../img/emprofilepic/<?= $empprofile['profilpic'];?>" width="80" height="80">
                    </div></div>


<div class="row">
                      <div class="col-4 mb-3">Update Image</div>
                    <div class="col-8  mb-3">
                      <input type="file" size="60" required class="form-control form-control-user"  id="jDate" name="image" >
                    </div></div>

                    <div class="row">
                      <div class="col-4 mb-3">Gender</div>
                    <div class="col-4 mb-3">
                   <div class="clip-radio radio-primary">
                  <input type="radio" id="rg-female" name="gender" value="female" checked required>
                  <label for="rg-female">
                    Female
                  </label>
                  <input type="radio" id="rg-male" name="gender" value="male"  required>
                  <label for="rg-male">
                    Male
                  </label>
                </div> 
                    </div></div>

                    <div class="form-group">


                    <div class="row" style="margin-top:4%">
                      <div class="col-4"></div>
                      <div class="col-4">
                      <input type="submit" name="submit"  value="Update" class="btn btn-primary btn-user btn-block">
                    </div>
                    </div>
<br><br>
                  <center>  <button><a href="emprofile.php" style="text-decoration: none;">Back</a></button></center>
                  
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

  

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>
  <script type="text/javascript">
    $(".jDate").datepicker({
    format: 'yyyy-mm-dd',
    autoclose: true
}).datepicker("update", "10/10/2016"); 
  </script>
</body>

</html>


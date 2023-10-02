<?php 
session_start();
error_reporting(0);
include('includes/dbconnection.php');
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
    $Password=$_POST['Password'];
    $RPassword=$_POST['RepeatPassword'];
    $file_name=$_FILES['image']['name'];
    $file_path= '../img/emprofilepic/'. $file_name;
 move_uploaded_file($_FILES['image']['tmp_name'], $file_path);



$ret=mysqli_query($con, "select empcode from empprofile where empcode='$empcode' || EmpContactNo='$EmpContactNo' || Email='$Email'");
    $result=mysqli_fetch_array($ret);
    if($result>0){
echo "<script>alert('Emp-Code / Contact-Number / email already associated with another account!');</script>";
}

else{
      if($_POST['Password']==$_POST['RepeatPassword']){
     $query=mysqli_query($con, "insert into empprofile(profilpic,Firstname,Lastname,Empcode,EmpDept,EmpDesignation,EmpContactNo,email,gender,password,EmpJoingdate) values('$file_name','$FName','$LName','$empcode','$EmpDept','$EmpDesignation','$EmpContactNo','$Email','$gender','$Password','$empjdate')");
   if($query)
{
	echo "<script>alert('Successfully Registered an employee profile.');</script>";
	 echo "<script>window.location.href ='welcome.php'</script>";
}
else{echo "<script>alert('Please correctly fill in your datails and try again!');</script>";
       echo "<script>window.location.href ='regemprofile.php'</script>";
   }
 }
 else{
     echo  "<script>alert('password did not match!');</script>" ;
   }
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
          <h1 class="h3 mb-4 text-gray-800">Register Employee Profile</h1>

<form class="user" method="post"  action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" enctype="multipart/form-data">
  
               <div class="row">
                <div class="col-4 mb-3">First Name</div>
                   <div class="col-8 mb-3">   <input type="text" class="form-control form-control-user" id="FirstName" name="FirstName" required="true" title="only letters and blankspace required" pattern="^[a-zA-z ]*$"></div>
                    </div>  
                    <div class="row">
                      <div class="col-4 mb-3">Last Name </div>
                     <div class="col-8 mb-3">  <input type="text" class="form-control form-control-user" id="LastName" name="LastName" required="true" title="only letters and blankspace required" pattern="^[a-zA-z ]*$"></div>  
                     </div>



                    <div class="row">
                    <div class="col-4 mb-3">Employee Code </div>
                    <div class="col-8 mb-3">
                      <input type="text" class="form-control form-control-user" id="EmpCode" name="EmpCode"  required="true"></div>
                    </div>

                    <div class="row">
                      <div class="col-4 mb-3">Employee Dept</div>
                     <div class="col-8 mb-3">
                      <select type="text" class="form-control " id="EmpDept" name="EmpDept"  required="true">
                      <?php $ret=mysqli_query($con,"select * from department");
while($row=mysqli_fetch_array($ret))
{
?>
                                <option value="<?php echo htmlentities($row['department']);?>">
                                  <?php echo htmlentities($row['department']);?>
                                </option>
                                <?php } ?>
                                </select>

                    </div></div>
                    <div class="row">
                    <div class="col-4 mb-3">Employee Desigantion</div>

                    <div class="col-8 mb-3">
                      <input type="text" class="form-control form-control-user" id="EmpDesignation" name="EmpDesignation"  required="true" title="only letters and blankspace required" pattern="^[a-zA-z ]*$">
                    </div></div>
                    <div class="row">
                      <div class="col-4 mb-3">Employee Contact No.</div>
                    <div class="col-8 mb-3">
                      <input type="text" class="form-control form-control-user" id="EmpContactNo" name="EmpContactNo" aria-describedby="emailHelp" required="true">
                    </div></div>
                    <div class="row">
                    <div class="col-4 mb-3">Email</div>
                   <div class="col-8 mb-3">
                     
                      <input type="email" id="Email" name="Email" class="form-control form-control-user" required="true" >
                    </div></div>
                
                    <div class="row">
                      <div class="col-4 mb-3">Employee Joing Date(yyyy-mm-dd)</div>
                    <div class="col-8  mb-3">
                      <input type="text" class="form-control form-control-user" id="jDate" name="EmpJoingdate" >
                    </div></div>
                     <div class="row">
                      <div class="col-4 mb-3">Password</div>
                    <div class="col-8  mb-3">
                      <input type="password" class="form-control form-control-user" id="Password" name="Password" required="true">
                    </div></div>
                     <div class="row">
                      <div class="col-4 mb-3">Repeat password</div>
                    <div class="col-8  mb-3">
                     <input type="password" class="form-control form-control-user" id="RepeatPassword" name="RepeatPassword" required="true">
                    </div></div>
                     <div class="row">
                      <div class="col-4 mb-3">Employee Image</div>
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

                    

                    <div class="row" style="margin-top:4%">
                      <div class="col-4"></div>
                      <div class="col-4">
                      <input type="submit" name="submit"  value="Register" class="btn btn-primary btn-user btn-block">
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



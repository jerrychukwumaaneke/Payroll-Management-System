<?php
include('includes/dbconnection.php');
error_reporting(0);
if(isset($_POST['submit']))
  {
    $FName=$_POST['FirstName'];
    $LName=$_POST['LastName'];
    $empcode=$_POST['empcode'];
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


$ret=mysqli_query($con, "select Email from empprofile where Email='$Email' || empcode='$empcode' || EmpContactNo='$EmpContactNo' || password='$Password'");
    $result=mysqli_fetch_array($ret);
    if($result>0){
echo "<script>alert('password / email / code / phone number, already associated with another account!');</script>";
}

    else{
      if($_POST['Password']==$_POST['RepeatPassword']){
    $query=mysqli_query($con, "insert into empprofile(profilpic,Firstname,Lastname,Empcode,EmpDept,EmpDesignation,EmpContactNo,email,gender,password,EmpJoingdate) value('$file_name','$FName','$LName','$empcode','$EmpDept','$EmpDesignation','$EmpContactNo','$Email', '$gender','$Password','$empjdate' )");

    if($query)
{
  echo "<script>alert('Successfully Registered. You can login now');</script>";
   echo "<script>window.location.href ='loginerms.php'</script>";
}
else{echo "<script>alert('Please correctly fill in your datails and try again!');</script>";
       echo "<script>window.location.href ='registerrems.php'</script>";
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

  <title>DU|Payroll Management System</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">
   <link href="css/sb-admin-2.css" rel="stylesheet" type="text/css">
</head>

<body style="background-color: black;">
 

  <div class="container">
    <h3 align="center" style="color: white; padding-top: 1%">DU|Payroll Management System</h3>

    <div class="card o-hidden border-0 shadow-lg my-5">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <!-- <div class="row">
          <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
          <div class="col-lg-7"> -->
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
              </div>
              <p style="font-size:16px; color:red" align="center"> <?php if($msg){
    echo $msg;
  }  ?> </p>
              <form class="user" name="register" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" enctype="multipart/form-data" onsubmit="return checkpass();">
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="text" class="form-control form-control-user" id="FirstName" name="FirstName" placeholder="First Name" pattern="[A-Za-z]+" required="true">
                  </div>
                  <div class="col-sm-6">
                    <input type="text" class="form-control form-control-user" id="LastName" name="LastName" placeholder="Last Name" pattern="[A-Za-z]+" required="true">
                  </div>
                </div>
                 <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                  <input type="text" class="form-control form-control-user" id="empcode" name="empcode" placeholder="Enter your Employee Code" pattern="[0-9]+" required="true">
                </div >
                <div class="col-sm-6 mb-3 mb-sm-0">
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
                     
                </div >
                </div>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                  <input type="text" class="form-control form-control-user" id="EmpDesignation" name="EmpDesignation"  required="true" title="only letters and blankspace required" pattern="^[a-zA-z ]*$" placeholder="Employee Designation">
                </div >
                <div class="col-sm-6 mb-3 mb-sm-0">
                  <input type="text" class="form-control form-control-user" id="EmpContactNo" name="EmpContactNo"  required="true" placeholder="Phone Number">
                </div >
                </div>
                <div class="form-group">
                  <input type="email" class="form-control form-control-user" id="Email" name="Email" placeholder="Email Address" required="true">
                </div>
                <div class="form-group">
                 <div class="clip-radio radio-primary">
                  <div>Gender</div>
                  <input type="radio" id="rg-female" name="gender" value="female" checked required>
                  <label for="rg-female">
                    Female
                  </label>
                  <input type="radio" id="rg-male" name="gender" value="male"  required>
                  <label for="rg-male">
                    Male
                  </label>
                </div>
                </div>

                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                   <input type="text" class="form-control form-control-user" id="jDate" name="EmpJoingdate" aria-describedby="emailHelp" placeholder="Date Joined">
                
                </div >
                <div class="col-sm-6 mb-3 mb-sm-0">
                  
                      <input type="file" size="60"  required class="form-control form-control-user"  id="jDate" name="image" >
                </div >
                </div>       

                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="password" class="form-control form-control-user" id="Password" name="Password" placeholder="Password" required="true">
                  </div>
                  <div class="col-sm-6">
                    <input type="password" class="form-control form-control-user" id="RepeatPassword" name="RepeatPassword" placeholder="Repeat Password" required="true">
                  </div>
                 
                </div>


              <input type="submit" name="submit" value="Register Account" class="btn btn-primary btn-user btn-block" style="background-color: black;">
                
                
                </form>
                <hr>
             
              <div class="text-center">
                <a class="small" href="loginerms.php">Already have an account? Login!</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>

 
</body>

</html>

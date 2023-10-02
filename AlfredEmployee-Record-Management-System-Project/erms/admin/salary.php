<?php 
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if(isset($_POST['submit']))
  {
    $FName=$_POST['FirstName'];
    $wd=$_POST['work'];
    $LName=$_POST['LastName'];
    $Email=$_POST['Email'];
    $month=$_POST['month'];
    $rate=$_POST['rate'];
    $house=$_POST['house'];
    $tp=$_POST['tp'];
    $ts=$_POST['ts'];
    $dt=$_POST['date'];
    $file_name=$_FILES['image']['name'];
    $file_path= '../img/emprofilepic/'. $file_name;
 move_uploaded_file($_FILES['image']['tmp_name'], $file_path);



$ret=mysqli_query($con, "select Email from salary where Email='$Email'");
    $result=mysqli_fetch_array($ret);
    if($result>0){
echo "<script>alert('email already associated with another account!');</script>";
}

// $hrs=mysqli_query($con, "select Rate from salary where Rate='$rate'");
//     $result=mysqli_fetch_array($hrs);
//     if($result<15){
// echo "<script>alert('Liminited work hours for the month was not met!');</script>";

// }

     $query=mysqli_query($con, "insert into salary(profilpic,Fullname,wd,Hours,email,month,rate,ha,ta,salary,paydate) values('$file_name','$FName','$wd','$LName','$Email','$month','$rate','$house','$tp','$ts','$dt')");
   if($query)
{
  echo "<script>alert('Successfully Salary inpute Successful.');</script>";
   echo "<script>window.location.href ='pay.php'</script>";
}
else{echo "<script>alert('Please correctly fill in your datails and try again!');</script>";
       echo "<script>window.location.href ='salary.php'</script>";
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
          <h1 class="h3 mb-4 text-gray-800"> Register Employee salary</h1>

<form class="user" method="post"  action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" enctype="multipart/form-data">
  
               <div class="row">
                <div class="col-4 mb-3">Full Name</div>
                   <div class="col-8 mb-3">   <input type="text" class="form-control form-control-user" id="FirstName" name="FirstName"  required="true" title="only letters and blankspace required" pattern="^[a-zA-z ]*$"></div>
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
                      <div class="col-4 mb-3">Attendance in a Month(should be 15 days or more) </div>
                     <div class="col-8 mb-3">  <input type="text" class="form-control form-control-user" id="LastName" name="LastName"  required="true"></div>  
                     </div>



                   
                    <div class="row">
                    <div class="col-4 mb-3">Email</div>
                   <div class="col-8 mb-3">
                     
                      <input type="email" id="Email" name="Email" class="form-control form-control-user" required="true" >
                    </div></div>

                    <div class="row">
                <div class="col-4 mb-3">Month</div>
                   <div class="col-8 mb-3">  
              <select name="month" class="form-control" required="required">
                                <option value=""></option>
<?php $ret=mysqli_query($con,"select * from month");
while($row=mysqli_fetch_array($ret))
{
?>
                                <option value="<?php echo htmlentities($row['month']);?>">
                                  <?php echo htmlentities($row['month']);?>
                                </option>
                                <?php } ?>
                                
                              </select>
                   </div>
                    </div>

                    <div class="row">
                      <div class="col-4 mb-3">Work Salary</div>
                     <div class="col-8 mb-3">  <!-- <input type="text" class="form-control form-control-user" id="LastName" name="rate"  required="true"> -->
                        <select name="rate" class="form-control" required="required">
                                <option value=""></option>
<?php $ret=mysqli_query($con,"select * from department");
while($row=mysqli_fetch_array($ret))
{
?>
                                <option value="<?php echo htmlentities($row['rate']);?>">
                                  <?php echo htmlentities($row['rate']);?>
                                </option>
                                <?php } ?>
                                
                              </select>


                     </div>  
                     </div>


                     <div class="row">
                <div class="col-4 mb-3">House Allowance</div>
                   <div class="col-8 mb-3">   
                      <select name="house" class="form-control" required="required">
                                <option value=""></option>
<?php $ret=mysqli_query($con,"select * from department");
while($row=mysqli_fetch_array($ret))
{
?>
                                <option value="<?php echo htmlentities($row['ha']);?>">
                                  <?php echo htmlentities($row['ha']);?>
                                </option>
                                <?php } ?>
                                
                              </select>

                   </div>
                    </div> 


                    <div class="row">
                <div class="col-4 mb-3">Transportation Allowance</div>
                   <div class="col-8 mb-3">  
                      <select name="tp" class="form-control" required="required">
                                <option value=""></option>
<?php $ret=mysqli_query($con,"select * from department");
while($row=mysqli_fetch_array($ret))
{
?>
                                <option value="<?php echo htmlentities($row['ta']);?>">
                                  <?php echo htmlentities($row['ta']);?>
                                </option>
                                <?php } ?>
                                
                              </select>


                   </div>
                    </div> 


                    <div class="row">
                <div class="col-4 mb-3">Total Salary</div>
                   <div class="col-8 mb-3"> 
                      <select name="ts" class="form-control" required="required">
                                <option value=""></option>
<?php $ret=mysqli_query($con,"select * from department");
while($row=mysqli_fetch_array($ret))
{
?>
                                <option value="<?php echo htmlentities($row['salary']);?>">
                                  <?php echo htmlentities($row['salary']);?>
                                </option>
                                <?php } ?>
                                
                              </select>


                   </div>
                    </div> 
                     <div class="row">
                      <div class="col-4 mb-3">Date Of Payment </div>
                     <div class="col-8 mb-3">  <input type="text" class="form-control form-control-user" id="date" name="date"  required="true"></div>  
                     </div>



                    <div class="row">
                      <div class="col-4 mb-3">Employee Image</div>
                    <div class="col-8  mb-3">
                      <input type="file" size="60" required class="form-control form-control-user"  id="jDate" name="image" >
                    </div></div>

                
                    <div class="row" style="margin-top:4%">
                      <div class="col-4"></div>
                      <div class="col-4">
                      <input type="submit" name="submit"  value="Salary inpute" class="btn btn-primary btn-user btn-block">
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



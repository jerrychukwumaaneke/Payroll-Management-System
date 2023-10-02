<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');

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
  
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <!-- <div id="content-wrapper" class="d-flex flex-column">
 -->
      <!-- Main Content -->
      <div id="content">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800">Employee Monthly Payment</h1>
<div class="container-fluid container-fullw bg-white">
<div class="row">
<div class="col-md-12">
<form role="form" method="post" name="search">

<div class="row">
Search by Fullname/Work department.
</label>
<input type="text" name="searchdata" id="searchdata" class="form-control" value="" required='true'>
</div>

<button type="submit" name="search" id="submit" class="btn btn-o btn-primary">
Search
</button>
</form>
<?php
if(isset($_POST['search']))
{ 

$sdata=$_POST['searchdata'];
  ?>
  <h4 align="center">Result against "<?php echo $sdata;?>" keyword </h4>
<table border="1" class="table table-bordered">
<thead>
<tr>
  <th class="center">s/n</th>
  <th>Image</th>
<th>Full Name</th>
<th>Work Departmaent</th>
<th> Attendance </th>
<th>Email </th>
<th>Month </th>
<th>Work Salary </th>
<th>House Allowance</th>
<th>Transportation Allowance</th>
<th>Date</th>
<th>Total Salary</th>
<th>Action</th>
</tr>
</thead>

<tbody>
<?php

$sql=mysqli_query($con,"select * from salary where FullName like '%$sdata%'|| wd like '%$sdata%'");
$num=mysqli_num_rows($sql);
if($num>0){
$cnt=1;
while($row=mysqli_fetch_array($sql))
{
?>
<tr>
<td class="center"><?php echo $cnt;?>.</td>
<td><img src="../img/emprofilepic/<?php  echo $row['profilpic'];?>" width="80" height="80"></td>
<td class="hidden-xs"><?php echo $row['Fullname'];?></td>
<td><?php echo $row['wd'];?></td>
<td><?php echo $row['Hours'];?></td>
<td><?php echo $row['email'];?></td>
<td><?php echo $row['month'];?></td>
<td><?php echo $row['rate'];?></td>
<td><?php echo $row['ha'];?></td>
<td><?php echo $row['ta'];?></td>
<td><?php echo $row['paydate'];?></td>
<td><?php echo $row['salary'];?></td>
<td>
   <a href="uppay.php?id=<?php echo $row['ID'];?>"   title="edit"><i class="fa fa-edit" style="color: blue;"></i></a>
  <a onclick="return confirm('Are you sure, you want to delete?')" href="deletepay.php?id=<?php echo $row['ID']; ?>"  title="delete" ><i class="fa fa-trash" style="color: red;"></i></a>
</td>
</tr>
<?php 
$cnt=$cnt+1;
} } else { ?>
  <tr>
    <td colspan="8"> No record found against this search</td>

  </tr>
   
<?php } }?></tbody>
</table>
<br><br><br>
  <table border="1" class="table table-bordered">
<thead>
<tr>
<th class="center">s/n</th>
  <th>Image</th>
<th>Full Name</th>
<th>Work Department</th>
<th>Attendance</th>
<th>Email</th>
<th>Month</th>
<th>Work Salary</th>
<th>House Allowance</th>
<th>Transportation Allowance</th>
<th>Date</th>
<th>Total Salary</th>
<th>Action</th>
</tr>
</thead>
<tbody>
<?php
$uid=$_SESSION['id'];
$query= "SELECT * FROM salary";
$sql=mysqli_query($con, $query);
$cnt=1;
if (mysqli_num_rows($sql)>0) 
{
 foreach ($sql as $salary) {
      //echo $students['name'];
?>
<tr>
  <td><?php echo $cnt;?></td>
  <td><img src="../img/emprofilepic/<?= $salary['profilpic'];?>" width="80" height="80"></td>
  <td><?= $salary['Fullname']?></td>
  <td><?= $salary['wd']?></td>
  <td><?= $salary['Hours']?></td>
  <td><?= $salary['email']?></td>
    <td><?= $salary['month']?></td>
  <td><?= $salary['rate']?></td>
  <td><?= $salary['ha']?></td>
  <td><?= $salary['ta']?></td>
    <td><?= $salary['paydate']?></td>
  <td><?= $salary['salary']?></td>
  <td>
     <a href="uppay.php?id=<?=$salary['ID'];?>"   title="edit"><i class="fa fa-edit" style="color: blue;"></i></a>
  <a onclick="return confirm('Are you sure, you want to delete?')" href="deletepay.php?id=<?=$salary['ID']; ?>"  title="delete" ><i class="fa fa-trash" style="color: red;"></i></a>
    </td> 
</tr>
<?php 
$cnt=$cnt+1;
 }
   }
      ?>
</tbody>
</table>

<br>
          <br>
          <center>
<button><a href="welcome.php" style="text-decoration: none;">Back</a></button>
</center>

</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
      <!-- start: FOOTER -->
  <?php include('includes/footer.php');?>
      <!-- end: FOOTER -->
      
      <!-- end: SETTINGS -->
    </div>
    <!-- start: MAIN JAVASCRIPTS -->
    
  </body>
</html>

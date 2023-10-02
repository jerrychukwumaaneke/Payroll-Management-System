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
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
         
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <!-- <div class="container-fluid">
 -->
          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800">View Employee Profile</h1>
<div class="container-fluid container-fullw bg-white">
<div class="row">
<div class="col-md-12">
<form role="form" method="post" name="search">

<div class="row">
Search by Name/Mobile No.
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
<th>First Name</th>
<th>Last Name</th>
<th> Emp-Code </th>
<th>Emp-Dept </th>
<th>Emp-Designation </th>
<th>Emp-Contact number</th>
<th>Email</th>
<th>Gender</th>
<th>Date</th>
<th>Action</th>
</tr>
</thead>

<tbody>
<?php

$sql=mysqli_query($con,"select * from empprofile where FirstName like '%$sdata%'|| EmpContactNo like '%$sdata%'");
$num=mysqli_num_rows($sql);
if($num>0){
$cnt=1;
while($row=mysqli_fetch_array($sql))
{
?>
<tr>
<td class="center"><?php echo $cnt;?>.</td>
<td><img src="../img/emprofilepic/<?php  echo $row['profilpic'];?>" width="80" height="80"></td>
<td class="hidden-xs"><?php echo $row['Firstname'];?></td>
<td><?php echo $row['Lastname'];?></td>
<td><?php echo $row['Empcode'];?></td>
<td><?php echo $row['EmpDept'];?></td>
<td><?php echo $row['EmpDesignation'];?></td>
<td><?php echo $row['EmpContactNo'];?></td>
<td><?php echo $row['email'];?></td>
<td><?php echo $row['gender'];?></td>
<td><?php echo $row['EmpJoingdate'];?></td>
<td>
  <a href="editprofile.php?id=<?php echo $row['ID'];?>"   title="edit"><i class="fa fa-edit" style="color: blue;"></i></a>
  <a onclick="return confirm('Are you sure, you want to delete?')" href="delete.php?id=<?php echo $row['ID']; ?>"  title="delete" ><i class="fa fa-trash" style="color: red;"></i></a>
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
<th>First Name</th>
<th>Last Name</th>
<th> Emp-Code </th>
<th>Emp-Dept </th>
<th>Emp-Designation </th>
<th>Emp-Contact number</th>
<th>Email</th>
<th>Gender</th>
<th>Date</th>
<th>Action</th>
</tr>
</thead>
<tbody>
<?php
$uid=$_SESSION['id'];
$query= "SELECT * FROM empprofile";
$sql=mysqli_query($con, $query);
$cnt=1;
if (mysqli_num_rows($sql)>0) 
{
 foreach ($sql as $empprofile) {
    	//echo $students['name'];
?>
<tr>
	<td><?php echo $cnt;?></td>
	<td><img src="../img/emprofilepic/<?= $empprofile['profilpic'];?>" width="80" height="80"></td>
	<td><?= $empprofile['Firstname']?></td>
	<td><?= $empprofile['Lastname']?></td>
	<td><?= $empprofile['Empcode']?></td>
	<td><?= $empprofile['EmpDept']?></td>
	<td><?= $empprofile['EmpDesignation']?></td>
	<td><?= $empprofile['EmpContactNo']?></td>
	<td><?= $empprofile['email']?></td>
	<td><?= $empprofile['gender']?></td>
	<td><?= $empprofile['EmpJoingdate']?></td>
	<td>
  <a href="editprofile.php?id=<?=$empprofile['ID'];?>"   title="edit"><i class="fa fa-edit" style="color: blue;"></i></a>
  <a onclick="return confirm('Are you sure, you want to delete?')" href="delete.php?id=<?=$empprofile['ID']; ?>"  title="delete" ><i class="fa fa-trash" style="color: red;"></i></a>
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

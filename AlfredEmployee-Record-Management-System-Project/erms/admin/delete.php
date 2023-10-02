<?php 
include('includes/dbconnection.php');
$id=$_GET['id'];
$query="DELETE FROM empprofile WHERE ID='$id'";
$query_run=mysqli_query($con, $query);

echo "<script>alert('Data deleted');</script>"; 
echo "<script>window.location.href = 'emprofile.php'</script>";     

if ($query_run){
	?>
<script type="text/javascript">
	alert("Data Deleted Successfully")
	window.open("http://localhost/AlfredEmployee-Record-Management-System-Project/erms/admin/emprofile.php",
    		"_self");
</script>
	<?php
}
else{
	?>

	<script type="text/javascript">
		alert("Data failed to delete");
	</script>
	<?php
}
?>

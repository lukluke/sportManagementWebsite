<!doctype  html>
<html>
<head> </head>
<body>
<?php 
	echo"ssss";
	$VolunteerID = $_GET['VolunteerID'];
	echo $VolunteerID;
	
	require_once('conn.php');
	$sql = "select * from Volunteer where VolunteerID ='$VolunteerID'";
	$rs = mysqli_query($conn,$sql)
		 or die (mysqli_connect_error());
	if(mysqli_num_rows($rs)==1){
		$sql = "Delete from Volunteer where VolunteerID = '$VolunteerID' ";
		$rs = mysqli_query($conn,$sql)
		 or die (mysqli_connect_error());
		 
		if(mysqli_affected_rows ($conn) !=1){
			$message = "Record for Volunteer '$VolunteerID' cannot be deleted!";
			
		}else{
			$message = "Record for Volunteer '$VolunteerID' is deleted by other user";
		}
	}
	
	mysqli_close($conn);
	header("Location:Admin_Volunteer.php");
		
	
?>
</table>		
</body>
</html>
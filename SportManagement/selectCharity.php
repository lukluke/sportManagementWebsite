<!doctype  html>
<html>
<head> </head>
<body>
<?php 
	
	$CharityID = $_GET['CharityID'];
	$RunnerID = $_GET['RunnerID'];
	$Reg = $_GET['RegID'];
	echo "VID".$CharityID;
	echo "RID".$RunnerID;
	
	/*require_once('conn.php');
	
		$sql = "Update Runner set VolunteerID ='$VolunteerID' where RunnerID = '$RunnerID' ";
		$rs = mysqli_query($conn,$sql)
		 or die (mysqli_connect_error());
		 
		if(mysqli_affected_rows ($conn) !=1){
			$message = "Record for custID '$RunnerID' cannot be deleted!";
			
		}else{
			$message = "Record for custID '$RunnerID' is deleted by other user";
		}
	
	
	mysqli_close($conn);
	header("Location:Admin_Runner.php");*/
		
	
?>
</table>		
</body>
</html>
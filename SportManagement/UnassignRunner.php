<!doctype  html>
<html>
<head> </head>
<body>
<?php 
	echo"ssss";
	
	$RunnerID = $_GET['RunnerID'];
	
	echo $RunnerID;
	
	require_once('conn.php');
	
		$sql = "Update Runner set VolunteerID =null where RunnerID = '$RunnerID' ";
		$rs = mysqli_query($conn,$sql)
		 or die (mysqli_connect_error());
		 
		if(mysqli_affected_rows ($conn) !=1){
			$message = "Runner has been cancel volunteer";
			
		}else{
			$message = "Runner can not cancel volunteer";
		}
	
	
	mysqli_close($conn);
	header("Location:Admin_Runner.php");
		
	
?>
</table>		
</body>
</html>
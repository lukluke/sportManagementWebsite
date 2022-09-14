<!doctype  html>
<html>
<head> </head>
<body>
<?php 
	echo"ssss";
	$EventID = $_GET['EventID'];
	require_once('conn.php');
	$sql = "select * from Event where EventID ='$EventID'";
	$rs = mysqli_query($conn,$sql)
		 or die (mysqli_connect_error());
	if(mysqli_num_rows($rs)==1){
		$sql = "Delete from Event where EventID = '$EventID' ";
		$rs = mysqli_query($conn,$sql)
		 or die (mysqli_connect_error());
		 
		if(mysqli_affected_rows ($conn) !=1){
			$message = "Record for EventID '$EventID' cannot be deleted!";
			
		}else{
			$message = "Record for EventID '$EventID' is deleted by other user";
		}
	}
	
	mysqli_close($conn);
	header("Location:Admin_Event.php");
		
	
?>
</table>		
</body>
</html>
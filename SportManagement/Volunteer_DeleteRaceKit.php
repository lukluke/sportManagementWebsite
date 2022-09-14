<!doctype  html>
<html>
<head> </head>
<body>
<?php 
	echo"ssssssssssss";
	$RaceKitID = $_GET['RaceKitID'];
	$filename = $_GET['Photo'];
	echo $filename;
	
	
	
	require_once('conn.php');
	$sql = "select * from RaceKitChoice where RaceKitID = '$RaceKitID'";
	$rs = mysqli_query($conn,$sql)
		 or die (mysqli_connect_error());
	if(mysqli_num_rows($rs)==1){
		$sql = "Delete from RaceKitChoice where RaceKitID = '$RaceKitID'";
		$rs = mysqli_query($conn,$sql)
		 or die (mysqli_connect_error());
		 //Delete photo from file
		 if($rs){
		 		$filepath = "RaceKit/".$filename;
				unlink($filepath);
		 }
		if(mysqli_affected_rows ($conn) !=1){
		 
			$message = "Record for RaceKitID '$RaceKitID' cannot be deleted!";
			
		}else{
			$message = "Record for RaceKitID '$RaceKitID' is deleted by other user";
		}
	}
	
	mysqli_close($conn);
	header("Location:Volunteer_ViewRaceKit.php");
		
	
?>
</table>		
</body>
</html>



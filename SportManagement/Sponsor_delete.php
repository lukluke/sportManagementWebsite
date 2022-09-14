<!doctype  html>
<html>
<head> </head>
<body>
<?php 
	echo"ssss";
	$reg = $_GET['RegID'];
	$SponsorID = $_GET['SponsorID'];
	require_once('conn.php');
	$sql = "select * from SponsorRecord where SponsorID = '$SponsorID'and RegID = '$reg'";
	$rs = mysqli_query($conn,$sql)
		 or die (mysqli_connect_error());
	if(mysqli_num_rows($rs)==1){
		$sql = "Delete from SponsorRecord where SponsorID = '$SponsorID'and RegID = '$reg'";
		$rs = mysqli_query($conn,$sql)
		 or die (mysqli_connect_error());
		 
		if(mysqli_affected_rows ($conn) !=1){
			$message = "Record for SponsorRecord '$SponsorRecord' cannot be deleted!";
			
		}else{
			$message = "Record for SponsorRecord '$SponsorRecord' is deleted by other user";
		}
	}
	
	mysqli_close($conn);
	header("Location:Sponsor_remove.php");
		
	
?>
</table>		
</body>
</html>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>delReg</title>
</head>

<body>
<?php
	require_once("conn.php");
	$sql="DELETE FROM eventregister Where RegID='".$_POST["rID"]."'";
	$rs=mysqli_query($conn,$sql)or die(mysqli_error($conn));
	if(mysqli_affected_rows($conn)>0){
				$message = "Delete register successfully";
			}else{
				
				$message = "Delete register unsuccessfully";
				}
				
					mysqli_close($conn);
					header("Location:Runner_DeleteEvent.php");
?>


</body>
</html>
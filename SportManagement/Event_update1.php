<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
	<?php
    			
										 if(isset($_GET["EventID"])){
										 	require_once('conn.php');
											$id = $_GET['EventID']; // pass customer id through $_GET function
											$sql = "select * from Event where EventID = '$id'";
											$result = mysqli_query($conn,$sql);
											$result = mysqli_fetch_assoc($result);
											
									?>
									    <form style="padding-left:20px" method="POST">
                                          <div class="row">
                                             <div class="col-md-2">
                                                <div class="form-group"></br>
                                                   <label>Customer IDnmhmhmhnh d</label>
                                                   <input type="text" class="form-control" name="CustID" placeholder="Customer ID" value="<?php echo $id; ?>" readonly>
                                                </div>
                                             </div>
											 <div class="col-md-3">
                                                <div class="form-group"></br>
                                                   <label>Surname</label>
                                                   <input type="text" class="form-control" name="Surname" placeholder="Surname" value="<?php echo $result['Surname']; ?>" required>
                                                </div>
                                             </div>
											 <div class="col-md-3">
                                                <div class="form-group"></br>
                                                   <label>Given Name</label>
                                                   <input type="text" class="form-control" name="GivenName" placeholder="Given Name" value="<?php echo $result['GivenName']; ?>" required>
                                                </div>
                                             </div>
											 <div class="col-md-2">
                                                <div class="form-group"></br>
                                                   <label>Passport</label>
                                                   <input type="text" class="form-control" name="Passport" placeholder="Passport" value="<?php echo $result['Passport']; ?>" required>
                                                </div>
                                             </div>
                                          </div>
                                          <div class="modal-footer">
                                             <button type="submit" class="btn btn-info btn-fill pull-right" name="customer_update">Update</button>
											 <button type="button" class="btn btn-info btn-fill pull-right" onclick="back();">Back</button>
                                          </div>
                                       </form>
										<?php 
										}
										  if(isset($_POST['customer_update'])){
											extract($_POST);
											$sql = "update customer set Surname = '$Surname', GivenName = '$GivenName', Passport = '$Passport' where CustID = '$CustID'"; // update customer information
											$result = mysqli_query($conn,$sql);
											if(mysqli_affected_rows($conn) == 1){
												echo "<script>window.location.href = \"./admin.php\"</script>"; // redirect to admin.php
											}else{
												echo "<script>alert('Failed to uodate the information or the information has no any modification!')</script>";
											}
										  }
										?>	
	

</body>
</html>
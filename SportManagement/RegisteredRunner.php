<?php
   session_start();

?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
   <link href="css/layout.css" rel="stylesheet">

      <link href="css/font-awesome/css/font-awesome.min.css" rel="stylesheet">


    <link href="css/icon.css" rel="stylesheet">
	  <title>Marathons Skills</title>
   </head>
   <body class="nav-md">
      <div class="container body">
      <div class="main_container">
         <div class="col-md-3 left_col">
            <div class="left_col scroll-view">
               <div class="navbar nav_title" style="border: 0;">
                  <a class="site_title"><i class="fa fa-star-o"></i> <span>Marathons Skills</span></a>
               </div>
               <div class="clearfix"></div>
               <!-- menu profile quick info -->
               <div class="profile">
                  <div class="profile_pic">
                  </div>
               </div>
               <!-- /menu profile quick info -->
               <br />
               <!-- sidebar menu -->
             
               <!-- /sidebar menu -->
            </div>
         </div>
      </div>
      <!-- /top navigation -->
      <!-- page content -->
      <div class="right_col" role="main">
      <div class="">
         <div class="page-title">
            <div class="title_left">
            </div>
            <div class="title_right">
               <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
               </div>
            </div>
         </div>
         <div class="clearfix"></div>
         <div>
            <a class="hiddenanchor" id="signup"></a>
            <a class="hiddenanchor" id="signin"></a>
            <!--login-->
            <div class="login_wrapper">
               <div class="animate form login_form">
                  <section class="login_content">
                     <form method="post" action="RegisteredRunner.php" enctype="multipart/form-data">
                        <h1>Registered runner</h1>
                        </br>
                        <div>
                <input type="text" class="form-control" name="firstname" placeholder="First Name" required="required"
					pattern="^[A-Z][A-Za-z0-9]*$" title="The first letter must be capital letter and only allow digit and number."/>
              </div>
			  <div>
                <input type="text" class="form-control" name="lastname" placeholder="Last Name" required="required" 
					pattern="^[A-Z][A-Za-z0-9]*$" title="The first letter must be capital letter and only allow digit and number."/>
              </div>

        <div class="col-md-10">
                 <div class="form-group"></br>
                 
                       <button class ="btn btn-info btn-fill ">Your picture<input type="file" name="file_img" id="image"   /></button>
                        
                   </div>
         </div>
			  <div>
                <input type="email" class="form-control" name="email" placeholder="Email" required="required" 
					 />
              </div>
			  <div>

				<h4>Gender :
                <input type="radio"  name="gender"  value="M" checked="checked" />Male
				<input type="radio"  name="gender"  value="F"  />Female</h4>
              </div><br>
			  <div>
					<label for="dateOfBrith"><h4>Date of Brith :</h4></label>
					<input type="date" name="dateOfBrith" max="1999-12-31" min="1900-01-01" required>
			  </div><br>
			  
			  <h4>Country :</h4>
			  <select name="country" class="form-control">
			  <optgroup label="Country">
				<option value="Andorra">Andorra</option>
				<option value="Argentina">Argentina</option>
				<option value="Australia">Australia</option>
				<option value="Austria">Austria</option>
				<option value="Belgium">Belgium</option>
				<option value="Botswana">Botswana</option>
				<option value="Brazil">Brazil</option>
				<option value="Bulgaria">Bulgaria</option>
				
				<option value="Canada">Canada</option>
				<option value="Chile">Chile</option>
				<option value="China">China</option>
		
				<option value="Cameroon">Cameroon</option>
				<option value="Colombia">Colombia</option>
				<option value="Croatia">Croatia</option>
                <option value="Czech Republic">Czech Republic</option>
				<option value="Denmark">Denmark</option>
				<option value="Dominican Republic">Dominican Republic</option>
				<option value="Ecuador">Ecuador</option>
				<option value="Egypt">Egypt</option>
                </optgroup>
			  </select><br>

              <div>
                <input type="password" class="form-control" name="password" placeholder="Password" required="required"
				pattern="(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$"
				title="Password must include UpperCase, LowerCase, Number/SpecialChar and min 8 Chars"/>
              </div>
			  <div>
                <input type="password" class="form-control" name="repassword" placeholder="Re-Password" required="required"
				pattern="(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$"
				title="Re-Password must include UpperCase, LowerCase, Number/SpecialChar and min 8 Chars"/>
              </div>
			  
			  
				<br>
				    <button type="Reset" class="btn btn-info btn-fill pull-right" id ="insert" name="Resets"> Reset</button>
				    <button type="submit" class="btn btn-info btn-fill pull-right" id ="submit" name="submit">Register Account</button>

                        <div class="clearfix"></div>
                        <div class="separator">
                        
                      <button type="button" class="btn btn-default btn-block" onclick="Register();">Back</button>
                        </div>
                     </form>
                  </section>
               </div>
               <!--user record-->
            </div>
         </div>
      </div>
      <script src="js/jf.js"></script>
      <script src="js/layout.js"></script>
      <script src="js/nprogress.js"></script>
      <script src="js/raphael.min.js"></script>
      <script src="js/morris.min.js"></script>
      <script src="js/CS.js"></script>
	  <?php
    $number = rand("10000","99999"); 
			if(isset($_POST['submit'])){
				require_once("conn.php");

	
	if($_POST["password"]!=$_POST["repassword"]){
		echo "<script>alert('Your Password and Re-Password do not match.')</script>";
	}else {
    if(!empty($_FILES['file_img']['tmp_name'])) { ////
        extract($_POST);
         $uploadOk = 1;
        $filetmp = $_FILES["file_img"]["tmp_name"];
        $filename = $_FILES["file_img"]["name"];
        $filetype = $_FILES["file_img"]["type"];
        $filepath = "uploadedPicture/".$filename;
        $imageFileType = pathinfo($filepath,PATHINFO_EXTENSION);
        if ($_FILES["file_img"]["size"] > 500000000000) { //500KB
                                  echo "<script>alert('Sorry, your file is too large.')</script>";
                                   $uploadOk = 0;
         }
         if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                                    && $imageFileType != "gif" ) {
                     echo "<script>alert('Sorry, only JPG, JPEG, PNG & GIF files are allowed.')</script>";
                     $uploadOk = 0;
         }
        $md5Pwd = md5($password);
        if ($uploadOk == 0) {
                 echo "<script>alert('Sorry, Can not uploaded.')</script>";
        }else{
          $sql= "insert into Runner(RunnerID,Password,FirstName,LastName,Gender,DateOfBirth,Email,Country,ProfilePicture)  VALUES('$number','$md5Pwd','$firstname','$lastname','$gender','$dateOfBrith','$email','$country','".$_FILES["file_img"]["name"]."')";
         
          mysqli_query($conn,$sql)or die(mysqli_error($conn));
          if(mysqli_affected_rows($conn)>0){
             if (move_uploaded_file($filetmp,$filepath)){
                echo "<script>alert('Your register is successfully')</script>";
				echo "<script>alert('Your login ID is '+".$number.")</script>";
             }


            }else{
              echo "<script>alert('Fail to add Runner')</script>";
            }
          mysqli_close($conn);
        }
        
      }else {
         extract($_POST);
         $md5Pwd = md5($password);
        $sql= "insert into Runner(RunnerID,Password,FirstName,LastName,Gender,DateOfBirth,Email,Country)  VALUES('$number','$md5Pwd','$firstname','$lastname','$gender','$dateOfBrith','$email','$country')";
         
          mysqli_query($conn,$sql)or die(mysqli_error($conn));
          if(mysqli_affected_rows($conn)>0){
              echo "<script>alert('Your register is successfully')</script>";
			  echo "<script>alert('Your login ID is '+".$number.")</script>";
          }else{
            echo "<script>alert('Fail to add Runner')</script>";
          }
          mysqli_close($conn);
      }


  }///!!!!
			
}
			
			?>
	  
	  <script> 
      function Register(){
         window.location.href = "./index.php"
      } 
</script>
	  
	  
	  
	  
   </body>
</html>
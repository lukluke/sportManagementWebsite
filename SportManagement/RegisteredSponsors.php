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
                     <form method="post" action="RegisteredSponsors.php">
                        <h1>Registered sponsor</h1>
                        </br>
                        <div>
                <input type="text" class="form-control" name="firstname" placeholder="First Name" required="required"
					pattern="^[A-Z][A-Za-z0-9]*$" title="The first letter must be capital letter and only allow digit and number."/>
              </div>
			  <div>
                <input type="text" class="form-control" name="lastname" placeholder="Last Name" required="required" 
					 title="The first letter must be capital letter and only allow digit and number."/>
              </div>
			  <div>
                <input type="email" class="form-control" name="email" placeholder="Email" required="required" 
					 />
              </div>
               <div>
                <input type="text" class="form-control" name="company" placeholder="Company" required="required"/>
              </div>
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
				
				
				<button type="button" class="btn btn-info btn-fill pull-right"  name="reset" >Reset </button>
				<button type="submit" class="btn btn-info btn-fill pull-right"  name="submit" >Register </button>
                        <div class="clearfix"></div>
                        <div class="separator">
      						<button type="button" class="btn btn-default btn-block" onclick="Register();">Back </button>
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
	 $number = rand("100","999"); 
	if(isset($_POST['submit'])){
				require_once("conn.php");

	if($_POST["password"]!=$_POST["repassword"]){
		echo "<script>alert('Your Password and Re-Password do not match.')</script>";
	
		
		
	}else {
		
		extract($_POST);
		$md5Pwd = md5($password);
		$sql="INSERT INTO sponsor 
			VALUES('$number','$md5Pwd','$firstname','$lastname','$email','$company')";
		$rs=mysqli_query($conn,$sql)or die(mysqli_error($conn));
		if(mysqli_affected_rows($conn)>0){
					echo "<script>alert('Your register is successfully')</script>";
          echo "<script>alert('Your Login ID :'+$number)</script>";
			}else{
				echo "<script>alert('Fail to add Sponsors')</script>";
			}
		mysqli_close($conn);

			}
		}
			
	?>
<script> 
      function Register(){
         window.location.href = "./index.php"
      } 
</script>
	  
	  
	  
	  
	  
   </body>
</html>

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
	  <title>Marathon Skills</title>
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
                     <form method="post" action="verify.php">
                        <h1>Login Your Account</h1>
                        </br>
                        <div>
                           <input type="text" class="form-control"  name ="username" placeholder="Username" required="" />
                        </div>
                        <div>
                           <input type="password" class="form-control" name ="password" placeholder="Password" required="" />
                        </div>
                        <div>
                           <input type="submit" class="btn btn-info pull-right" name="login" value="Log in" />
                        </div>
                        <div class="clearfix"></div>
                        <div class="separator">
                           <br />
                           <div>
                              <button type="button" class="btn btn-default btn-block" onclick="Register();">Register Account </button>
                           </div>
                        </div>
                        <div class="separator">
                           <br />
                           <div>
                              <h1><i class="fa fa-star-o"></i>Marathon Skills</h1>
                              <p>Welcome to my marathon skills Website </p>
                           </div>
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
       <script> 
      function Register(){
         window.location.href = "./RegisterChoice.php"
      }    
   </script>
   </body>
</html>
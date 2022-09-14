<?php
  //  $sql = "select rs.*,er.RegID,er.RunnerID,er.EventID,E.Name,E.DateOfEvent from SponsorRecord rs,EventRegister er,Event E where rs.RegID = er.RegID and er.EventID = E.EventID AND = E.EventID='1001'";
   session_start();
   if(!$_SESSION['username'] || !$_SESSION['password']){
      $caption = "Login";
   header("Location: index.php");
   die();
   }else{
      $caption = "Logout";
   }
   // if user is not a staff 
   if($_SESSION['usertype'] != "Sponsor"){
      header('HTTP/1.0 403 Forbidden');
      die('<!DOCTYPE HTML PUBLIC "-//IETF//DTD HTML 2.0//EN">
      <HTML><HEAD>
      <TITLE>403 Forbidden</TITLE>
      </HEAD><BODY>
      <H1>Forbidden</H1>
      You don\'t have permission to access sponsor.php on this server.
      <HR>
      <I><!--#echo var="HTTP_HOST" --></I>
      </BODY></HTML>');
   }
   include('conn.php');
   $username = $_SESSION['username']; // get username
   $sql = "SELECT * FROM Sponsor where SponsorID='$username'";

   $action ="login";
   


   $result = mysqli_query($conn,$sql);
   $result = mysqli_fetch_assoc($result);
   $SpID =$result['SponsorID']; 
?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
      <!-- Meta, title, CSS, favicons, etc. -->
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link href="css/layout.css" rel="stylesheet">

      <link href="css/font-awesome/css/font-awesome.min.css" rel="stylesheet">


    <link href="css/icon.css" rel="stylesheet">
     <title>Marathon Skills</title>
    <script>
      function setValue(SpID){
        hiddentElement = document.getElementById("");
        hiddentElement.value = 
        document.getElementById()
      }

    </script>
   </head>
   <body class="nav-md">
      <div class="container body">
         <div class="main_container">
            <div class="col-md-3 left_col">
               <div class="left_col scroll-view">
                  <div class="navbar nav_title" style="border: 0;">
                      <a  class="site_title"><i class="fa fa-star-o"></i> <span>Marathon Skills</span></a>
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
                  <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                     <div class="menu_section">
                        <ul class="nav side-menu">
                          <li><a href ="Sponsor_update.php"><i class="fa fa-user" ></i> Update Profit<span class="fa fa-chevron"></span></a>
                           </li>
                           <li><a href ="Sponsor_sponsor.php"><i class="fa fa-hospital-o" ></i> Sponsor Runner<span class="fa fa-chevron"></span></a>
                           </li>
                           <li><a href="Sponsor_remove.php"><i class="fa fa-street-view"></i> Revew Sponsorship<span class="fa fa-chevron"></span></a>
                           </li>
        
                           </li>
                        </ul>
                     </div>
                  </div>
                  <!-- /sidebar menu -->
               </div>
            </div>
            <!-- top navigation -->
            <div class="top_nav">
               <div class="nav_menu">
                  <nav>
                     <div class="nav toggle">
                        <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                     </div>
                     <ul class="nav navbar-nav navbar-right">
                        <li class="">
                           <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                           <b><?php echo "Sponsor :"." ".$result['FirstName']." ".$result['LastName']; ?></b> <!--get Name-->
                           <span class=" fa fa-angle-down"></span>
                           </a>
                           <ul class="dropdown-menu dropdown-usermenu pull-right">
                              
                              <?php
                                 if($caption == "Logout"){
                                    echo "<li><a href=\"?action=logout\"><i 
                                    class=\"fa fa-sign-out pull-right\"></i> Logout</a></li>";
                                 }else{
                                    echo "<li><a href=\"index.php\"><i class=\"fa fa-sign-out pull-right\"></i> Login</a></li>";
                                 }
                                 if(isset($_GET['action'])){
                                    $action = $_GET['action'];
                                    
                                    if($action == "logout"){
                                       session_destroy();
                                       header("Location: index.php");
                                    }
                                 }
                                 ?>
                           </ul>
                        </li>
                        </li>
                     </ul>
                  </nav>
               </div>
            </div>
            <!-- /top navigation -->
            <!-- page content -->
            <div class="right_col" role="main">
               <div class="">
                  <div class="page-title">
                     <div class="title_left">
                        <h3>Update Profile</h3>
                       
                     </div>
                     <div class="title_right">
                        <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                        </div>
                     </div>
                  </div>
                  <div class="clearfix"></div>
                  <!---user record-->
                  <div class="row">
                     <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                           <div class="x_title">
                              <ul class="nav navbar-right panel_toolbox">
                                 <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                 </li>
                                 </li>
                                 <li><a class="close-link"><i class="fa fa-close"></i></a>
                                 </li>
                              </ul>
                              <div class="clearfix"></div>
                           </div>
                           <div class="x_content">
                              <div class="col-md-3 col-sm-3 col-xs-12 profile_right">
                                 <!-- go up function-->
                                 <div class="col-md-6">
                                 </div>
                              </div>
                              <div class="" role="tabpanel" data-example-id="togglable-tabs">
                                 <h3>Sponsor Management</h3>
                                 <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                           <li role="presentation" class="active"><a href="#tab_content3" role="tab" id="customer-tab" data-toggle="tab" aria-expanded="false">Update Profile</a></li>
 
                                  </ul>
                                 <div id="myTabContent" class="tab-content">
                                    <div role="tabpanel" class="tab-pane fade" id="tab_content1" aria-labelledby="airline-tab">
                                  
                                       <form style="padding-left:20px"  method="POST" action="admin_airline.php" id="admin_airline">
                                          <div class="row" >
                                             <div class="col-md-3">
                                                <div class="form-group"></br>
                                                   
                                                 
                                                </div>co
                                             </div>
                                          </div>
                                <div class="modal-footer">
                             
                                          </div>
                                       </form>
                              <div id="airline"></div>
                                    </div>
                                    <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="">
                                      
                                       <div id=""></div>
                                    </div>
                                    <div role="tabpanel" class="tab-pane fade active in" id="tab_content3" aria-labelledby="customer-tab">
                           <?php
                              
                              
                              if($action != "update"){
                               // $id = $_GET['id']; // pass Runner id through $_GET function
                               $sql = "select * from Sponsor  where SponsorID = $SpID";
                               
                               $result = mysqli_query($conn,$sql);
                               $result = mysqli_fetch_assoc($result);

                           ?>
                              <!--Concel Sponship!!!-->     
                    <!-- Form Start -->
                    <form id="demo-form2" method="post"  class="form-horizontal form-label-left">
          
            <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Sporsor ID</label>
                        <div class="col-md-2 col-sm-6 col-xs-12">
                          <input type="text" name="SID" value="<?php echo $SpID ?>"  readonly="readonly"  class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="first-name" class="control-label col-md-3 col-sm-3 col-xs-12" >First Name 
                        </label>
                        <div class="col-md-3 col-sm-6 col-xs-12">
                          <input type="text" id="first-name" name="FirstName" value="<?php echo  $result['FirstName']; ?>" pattern="[A-Za-z]+$" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="last-name" class="control-label col-md-3 col-sm-3 col-xs-12" >Last Name 
                        </label>
                        <div class="col-md-3 col-sm-6 col-xs-12">
                          <input type="text" id="last-name" name="LastName" value="<?php echo $result['LastName']; ?>" pattern="[A-Za-z]+$" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="Email" class="control-label col-md-3 col-sm-3 col-xs-12">E-mail</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="email" id="Email" name="Email" value="<?php echo $result['Email'];?>"  title="The Format is not correct"  class="form-control col-md-7 col-xs-12"   >
                        </div>
                      </div>
            <div class="form-group"> 
                        <label for="Company" class="control-label col-md-3 col-sm-3 col-xs-12">Company</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="Company" name="Company" value="<?php echo $result['Company']; ?>" class="form-control col-md-7 col-xs-12" type="text" required="required"  >
                        </div>

                        
      
                      </div>

                      <div class="ln_solid"></div>
                      <div class="form-group">
                          <label for="Company" class="control-label col-md-3 col-sm-3 col-xs-12">Old Password</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="passowrd" name="oldpwd"  class="form-control col-md-7 col-xs-12" type="text"  >
                        </div> 
                        </div>

                      <div class="form-group">
                          <label for="Company" class="control-label col-md-3 col-sm-3 col-xs-12">New Password</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="newPwd" name="newPassword"  class="form-control col-md-7 col-xs-12" type="text" 
                          pattern="(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$"
                          title="Password must include UpperCase, LowerCase, Number/SpecialChar and min 8 Chars" >
                        </div> 
                      </div>

                      <div class="form-group">
                          <label for="Company" class="control-label col-md-3 col-sm-3 col-xs-12">Re-New Password</label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="renewpwd" name="renewpwd"  class="form-control col-md-7 col-xs-12" type="text"   >
                      </div> 
                      </div>
                        
                    </div>
                      <div class="modal-footer">
                             <button type="submit" class="btn btn-info btn-fill pull-right" name="btn_pwd">Edit Profile</button>
                             <button type="reset" class="btn btn-info btn-fill pull-right" name="">Reset</button>
                      </div>
                        
                      </div>

                      </div>


                    </from>
                 </div>
                  <?php 
                              
                      if(isset($_POST['btn_pwd'])){
							$password = mysqli_real_escape_string($conn,$_POST['oldpwd']);
							$password = md5($password);
                             extract($_POST);
							
                              $sql = "select * from sponsor where SponsorID = $SpID and Password ='$password'" ;
                              $result = mysqli_query($conn,$sql);
                              $rc = mysqli_fetch_assoc($result);
                                if($oldpwd !=null || $newPassword !=null || $renewpwd !=null){  
                                      if(mysqli_num_rows($result)>0){
                                            $oldpwd =1 ;
                                            echo $oldpwd;
                                            if($newPassword == $renewpwd && $newPassword != null && $renewpwd !=null){
                                                $md5Pwd = md5($newPassword);
                                                 $sql = "update sponsor set Password ='$md5Pwd' , FirstName = '$FirstName', LastName = '$LastName', Company = '$Company',Email = '$Email' where SponsorID = '$SID'"; // update customer information
                                                 //$sql = "update Sponsor set Password ='123' where SponsorID = '$SID'"; // update customer information
                                                 $result = mysqli_query($conn,$sql);
                                                /* echo $sql;
                                                 echo $result;*/

                                                 if(mysqli_affected_rows($conn) == 1){
                                                    echo "<script>alert('Edit successful')</script>";
                                                    echo "<script>window.location.href = \"./Sponsor_update.php\"</script>"; // redirect to admin.php
                                                 }else{
                                                    echo "<script>alert('Failed to update the information or the information has no any modification!')</script>";
                                                 }

                                             }else{
                                                    echo "<script>alert('New Passward and Re-New Passward is not match or empty!')</script>"; 
                                             }      
                                      }else{
                                          echo "<script>alert(' Old Passward is not correct')</script>"; 
                                      }
                               }else {
                                     $sql = "update sponsor set FirstName = '$FirstName', LastName = '$LastName', Company = '$Company',Email = '$Email' where SponsorID = '$SID'"; 
                                      $result = mysqli_query($conn,$sql);
                                                /* echo $sql;
                                                 echo $result;*/

                                                 if(mysqli_affected_rows($conn) == 1){
                                                    echo "<script>alert('Edit successful')</script>";
                                                    echo "<script>window.location.href = \"./Sponsor_update.php\"</script>"; // redirect to admin.php
                                                 }else{
                                                    echo "<script>alert('Failed to update the information or the information has no any modification!')</script>";
                                                 }
                                     
                               }
                            }
                      }
                ?>                
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      </div>
      </div>
      </div>
      </div>
      </div>
      </div>
      <script src="js/jf.js"></script>
      <script src="js/layout.js"></script>
      <script src="js/nprogress.js"></script>
      <script src="js/raphael.min.js"></script>
      <script src="js/morris.min.js"></script>
      <script src="js/CS.js"></script>
      <!-- use ajax to get the data -->
      
   <script> 
      function back(){
         window.location.href = "./Sponsor_update.php"
      }    
   </script>
   </body>
</html>
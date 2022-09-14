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
   if($_SESSION['usertype'] != "Administrator"){
      header('HTTP/1.0 403 Forbidden');
      die('<!DOCTYPE HTML PUBLIC "-//IETF//DTD HTML 2.0//EN">
      <HTML><HEAD>
      <TITLE>403 Forbidden</TITLE>
      </HEAD><BODY>
      <H1>Forbidden</H1>
      You don\'t have permission to access admin.php on this server.
      <HR>
      <I><!--#echo var="HTTP_HOST" --></I>
      </BODY></HTML>');
   }
   include('conn.php');
   $username = $_SESSION['username']; // get username
   $sql = "SELECT * FROM Administrator where AdministratorID='$username'";
   $action ="login";
   $result = mysqli_query($conn,$sql);
   $result = mysqli_fetch_assoc($result);
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
                          <li><a href ="Admin_Event.php"><i class="fa fa-hospital-o" ></i> Event<span class="fa fa-chevron"></span></a>
                           </li>
                           <li><a href="Admin_Runner.php"><i class="fa fa-street-view"></i> Runner<span class="fa fa-chevron"></span></a>
                           </li>
                        
                           <li><a href="Admin_Charity.php"><i class="fa fa-heart"></i> Charity<span class="fa fa-chevron"></span></a>
                           </li>
                           <li><a href="Admin_Sponsor.php"><i class="fa fa-money"></i>Sponsor<span class="fa fa-chevron"></span></a>                           </li>
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
                           <b><?php echo "Admin:"." ".$result['FirstName']." ".$result['LastName']; ?></b> <!--get Name-->
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
                        <h3>Adminstration</h3>
                       
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
                                 <h3>Admin Management</h3>
                                 <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                
                             <li role="presentation" class="active"><a href="#tab_content2" role="tab" id="hotel-tab" data-toggle="tab" aria-expanded="false">Delete SponsorShip</a></li>
                                  </ul>
                                 <div id="myTabContent" class="tab-content">
                                    <div role="tabpanel" class="tab-pane fade" id="tab_content1" aria-labelledby="airline-tab">
                                  
                                       <form style="padding-left:20px"  method="POST" action="admin_airline.php" id="admin_airline">
                                          <div class="row" >
                                             <div class="col-md-3">
                                                <div class="form-group"></br>
                                                   
                                                 
                                                </div>
                                             </div>
                                          </div>
                                <div class="modal-footer">
                             
                                          </div>
                                       </form>
                              <div id=""></div>
                                    </div>
                                    <div role="tabpanel" class="tab-pane fade active in" id="tab_content2" aria-labelledby="">
                                       <form method="POST">
                                       <table class="data table table-striped no-margin">
                                    
                                         <thead>
                                             <tr>
                                                 <th>Runner ID</td>
                                                 <th>Icon</th>  
                                                <th>Runner Name</th>
                                                <th>Gender</th>
                                                <th>Event Name</th>
                                                <th>Distance</th>
                                                <th>Sponsor Name</th>
                                                <th>Charity</th>
                                                <th>Amount</th>
                                                 <th>Action</th>
                                                                                               	
                                             </tr>
                                          </thead>
                                          <tbody>
                                 <?php
                              		
                              		$sql= "select sp.FirstName as SponsorFName,sp.LastName as SponsorLName ,
                              				r.RunnerID,r.FirstName as RunnerFName,r.LastName as RunnerLName,r.ProfilePicture,r.Gender,
                              				e.Name as EventName,e.Distance,e.DateOfEvent,ch.Name,sr.*
                              				from Sponsor sp,SponsorRecord sr,Runner r,Event e,Charity ch,EventRegister er
                              				where sr.SponsorID = sp.SponsorID and sr.CharityID = ch.CharityID and sr.RegID = er.RegID
                              				and er.EventID = e.EventID and er.RunnerID = r.RunnerID";
                                    $result = mysqli_query($conn,$sql);
                                    while($rc = mysqli_fetch_assoc($result)){
                                    	 date_default_timezone_set('Asia/Hong_Kong'); // get HONG KONG Time
                                       	$today = date("Y-m-d"); //get today time
                                      	if($rc['DateOfEvent'] < $today){
                                       echo 
                                       '<tr><td>'.$rc['RunnerID'].'</td>';
                                       if($rc["ProfilePicture"] != null){
                                        echo '<td><img src="RunnerPicture/'.$rc["ProfilePicture"].'"style="width:100px;height:100px"></td>';
                                       }else{
                                          echo '<td><img src="RunnerPicture/null.png"style="width:100px;height:100px"></td>';
                                       }
                                        echo '<td>'.$rc['RunnerFName']." ".$rc['RunnerLName'].'</td>';
                                        echo'<td>'.$rc["Gender"].'</td>';
                                        echo'<td>'.$rc["EventName"].'</td>';
                                        echo'<td>'.$rc["Distance"].'</td>';
                                        echo '<td>'.$rc['SponsorFName']." ".$rc['SponsorLName'].'</td>';
                                        echo'<td>'.$rc["Name"].'</td>';
                                        echo'<td>'.$rc["Amount"].'</td>';
                                        echo '<td><a href="Admin_Sponsor_Delete.php?SponsorID='.$rc['SponsorID'].'&RegID='.$rc['RegID'].'">Delete Sponsorship</a></td></tr>';
                                        
                                        }
                                    }
                                 ?>
                                          </tbody>
                                       </table>
                                 
                              </form>
                                       <div id="hotel"></div>
                                    </div>
                                    <div role="tabpanel" class="tab-pane fade active in" id="tab_content3" aria-labelledby="customer-tab">
                                         
                             
                         
                              <?php 
                              
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
     
      </script>
   <script> 
      function back(){
         window.location.href = "./Admin_Runner.php"
      }    
   </script>
   </body>
</html>
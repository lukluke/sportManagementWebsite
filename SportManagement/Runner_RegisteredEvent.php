<?php
   session_start();
   if(!$_SESSION['username'] || !$_SESSION['password']){
      $caption = "Login";
   header("Location: index.php");
   die();
   }else{
      $caption = "Logout";
   }
   // if user is not a staff 
   if($_SESSION['usertype'] != "Member"){
      header('HTTP/1.0 403 Forbidden');
      die('<!DOCTYPE HTML PUBLIC "-//IETF//DTD HTML 2.0//EN">
      <HTML><HEAD>
      <TITLE>403 Forbidden</TITLE>
      </HEAD><BODY>
      <H1>Forbidden</H1>
      You don\'t have permission to access runner.php on this server.
      <HR>
      <I><!--#echo var="HTTP_HOST" --></I>
      </BODY></HTML>');
   }
   include('conn.php');
   $username = $_SESSION['username']; // get username
   $sql = "SELECT * FROM runner where RunnerID='$username'";
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
                           <li><a href ="Runner_Profile.php"><i class="fa fa-hospital-o" ></i> Profile<span class="fa fa-chevron"></span></a>
                           </li>
                           <li><a href="Runner_RegisteredEvent.php"><i class="fa fa-street-view"></i> Event Register<span class="fa fa-chevron"></span></a>
                           </li>
                           <li><a href="Runner_DeleteEvent.php"><i class="fa fa-hand-paper-o"></i>Delete Register<span class="fa fa-chevron"></span></a>
                           </li>
                           <li><a href="Runner_Payment.php"><i class="fa fa-heart"></i>View Event & Payment<span class="fa fa-chevron"></span></a>
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
                           <b><?php echo "Runner:"." ".$result['FirstName']." ".$result['LastName']; ?></b> <!--get Name-->
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
                        <h3>Runner</h3>
                       
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
                                 <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                           <li role="presentation" class="active"><a href="#tab_content3" role="tab" id="customer-tab" data-toggle="tab" aria-expanded="false">Event Register</a></li>
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
                                             <button type="submit" class="btn btn-info btn-fill pull-right" name="airline_search">Search</button>
                                          </div>
                                       </form>
                              <div id="airline"></div>
                                    </div>
                                    <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="hotel-tab">
                                       <form style="padding-left:20px" method="POST" id="admin_hotel" action="admin_hotel.php">
                                          <div class="row">
                                             <div class="col-md-4">
                                                <div class="form-group"></br>
                                                 
                                          
                                     
                                                   </select>
                                                </div>
                                             </div>
                                 </div>
                                          <div class="modal-footer">
                                             <button type="submit" class="btn btn-info btn-fill pull-right" name="hotel_search">Search</button>
                                          </div>
                                       </form>
                                       <div id="hotel"></div>
                                    </div>
                                    <div role="tabpanel" class="tab-pane fade active in" id="tab_content3" aria-labelledby="customer-tab">
                          
                              <form method="POST">
                                       <table class="data table table-striped no-margin">
                                         <thead>
                                             <tr>
                                                 <th>Event ID</th>
                                                <th>Event Name</th>
                                                <th>Distance</th>
                                                <th>Date of Event</th>
                                                <th>Time Start</th>
                                                <th>Price</th>

                                             </tr>
                                          </thead>
                                          <tbody>
                                 <?php
                                    // get all customers
                                    $sql = "select * from Event";
                                    $result = mysqli_query($conn,$sql);
                                    while($rc = mysqli_fetch_assoc($result)){
                                       echo "<tr>
                                          <td>{$rc['EventID']}</td>
                                          <td>{$rc['Name']}</td>
                                          <td>{$rc['Distance']}</td>
                                           <td>{$rc['DateOfEvent']}</td>
                                            <td>{$rc['TimeStart']}</td>
                                             <td>{$rc['Price']}</td>
                                          "
                                          ;
                                    }
                                 ?>
                                          </tbody>
                                       </table>
                                 
                              </form>
							  <div class="row">

                                            
                                          </div>
							  <form method="POST">
                                       <table class="data table table-striped no-margin">
                                         <thead>
                                             <tr>
                                                 <th>RacekitID</th>
                                                <th>Racekit Name</th>
                                                <th>Description	</th>
                                                <th>Price</th>
                         

                                             </tr>
                                          </thead>
                                          <tbody>
                                 <?php
                                    // get all racekitchoice
                                    $sql = "select * from racekitchoice";
                                    $result = mysqli_query($conn,$sql);
                                    while($rc = mysqli_fetch_assoc($result)){
                                       echo "<tr>
                                          <td>{$rc['RaceKitID']}</td>
                                          <td>{$rc['Name']}</td>
                                          <td>{$rc['Description']}</td>
                                             <td>{$rc['Price']}</td>
                                          "
                                          ;
                                    }
                                 ?>
                                          </tbody>
                                       </table>
                                 
                              </form>
							  <div class="row">

                                            
                                          </div>
							  <form style="padding-left:20px" method="POST">
                                          
										  <div class="row">
             
                                             <div class="col-md-4">
                                                
												<div class="form-group"></br>
                                                   <label>Event Name :</label>
                                                   <select  name="EventName" class="form-control"  >
												   <optgroup label="Event Name">
												   <?php
												   $sql="SELECT * FROM event";
												   $rs=mysqli_query($conn,$sql)or die(mysqli_connect_error());
													while($rc=mysqli_fetch_assoc($rs)){
														echo "<option value='".$rc['EventID']."'>".$rc['Name']."</option>";
													}        
												   
												   ?>
												    </select><br>
                                                </div>
                                             </div>
											 
											 <div class="col-md-4">
                                                
												<div class="form-group"></br>
                                                   <label>Racekit Option :</label>
                                                   <select  name="RacekitOp" class="form-control"  >
												   <optgroup label="Racekit option">
												   <?php
												   $sql="SELECT * FROM racekitchoice";
												   $rs=mysqli_query($conn,$sql)or die(mysqli_connect_error());
													while($rc=mysqli_fetch_assoc($rs)){
														echo "<option value='".$rc['RaceKitID']."'>".$rc['Name']."</option>";
													}        
												   
												   ?>
												    </select><br>
                                                </div>
                                             </div>
                                 
                                  <div class="row">

                                            
                                          </div>
                                          <div class="modal-footer">
                                             <button type="submit" class="btn btn-info btn-fill pull-right" name="EventAdd">Register Event</button>
                                          </div>
                                       </form>
                              <?php
                              if(isset($_POST['EventAdd'])){
								  $sql="SELECT * FROM runner where RunnerID='".$_SESSION['username']."'";
	$rs=mysqli_query($conn,$sql)or die(mysqli_connect_error());
		while($rc=mysqli_fetch_assoc($rs)){
			$ID=$rc['RunnerID'];
		}
		$TP=0;
	$sql="SELECT * FROM event where EventID='".$_POST['EventName']."'";
	$rs=mysqli_query($conn,$sql)or die(mysqli_connect_error());
		while($rc=mysqli_fetch_assoc($rs)){
			$TP+=$rc['Price'];
		}
		$sql="SELECT * FROM racekitchoice where RaceKitID='".$_POST['RacekitOp']."'";
	$rs=mysqli_query($conn,$sql)or die(mysqli_connect_error());
		while($rc=mysqli_fetch_assoc($rs)){
			$TP+=$rc['Price'];
		}
		
		
		
	
	extract($_POST);
	
	//check Event if Register repeat!
	$sql="SELECT * FROM eventregister WHERE EventID='$EventName' and RaceKitID='$RacekitOp' and RunnerID='".$ID."'";
	$rs=mysqli_query($conn,$sql)or die(mysqli_error($conn));
	if(mysqli_num_rows($rs)!=0){
		echo "<script>alert('Event have been registered.')</script>";
	}else{
	
	
	
	
	$sql="INSERT INTO eventregister (RunnerID,EventID,RaceKitID,PaymentTotal) VALUES ('".$ID."','$EventName','$RacekitOp','".$TP."')";
	$rs=mysqli_query($conn,$sql)or die(mysqli_error($conn));
	if(mysqli_affected_rows($conn)>0){
						 echo "<script>alert('Event is  registered  successfully!')</script>";
						 
			}else{
				 echo "<script>alert('Event is  registered unsuccessfully')</script>";
				
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
         window.location.href = "./admin.php"
      }    
   </script>
   </body>
</html>
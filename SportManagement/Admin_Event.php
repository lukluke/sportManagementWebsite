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
                           <li><a href="Admin_Sponsor.php"><i class="fa fa-money"></i>Sponsor<span class="fa fa-chevron"></span></a>
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
                        <h3>Administration</h3>
                       
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
                           <li role="presentation" class="active"><a href="#tab_content3" role="tab" id="customer-tab" data-toggle="tab" aria-expanded="false">Event Management</a></li>
                                  </ul>
                                 <div id="myTabContent" class="tab-content">
                                    <div role="tabpanel" class="tab-pane fade" id="tab_content1" aria-labelledby="airline-tab">
                                       <!--Fight search-->
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
                                                   <label>Hotel</label>
                                                   <select class="form-control" value="hotel" name="EngName">
                                     
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
                           <?php
                              
                              
                              if($action != "update" && $action !="View"){
                           ?>
                                       <form style="padding-left:20px" method="POST">
                                          <div class="row">
                                             <div class="col-md-2">
                                                <div class="form-group"></br>
                                                   <label>Event ID</label>
                                       <?php
                                       // automatically calculate the next EventID
                                       $sql = "select max(EventID) as EventID from Event";
                                       $result = mysqli_query($conn,$sql);
                                       $result = mysqli_fetch_assoc($result);
                                       $prefix = substr($result['EventID'],0,1); // get the prefix (C)
                                       $postfix = substr($result['EventID'],1); // get the postfix (3 numbers)
                                       $EventID = ($prefix . str_pad(((integer)$postfix + 1), 3, '0', STR_PAD_LEFT)); // concatenate the EventID
                                       ?>
                                                   <input type="text" class="form-control" name="EventID" placeholder="Event ID" value="<?php echo $EventID; ?>" readonly>
                                                </div>
                                             </div>
                                             <div class="col-md-4">
                                                <div class="form-group"></br>
                                                   <label>Event Name :</label>
                                                   <input type="text" class="form-control" name="EventName" placeholder="EventName" required>
                                                </div>
                                             </div>
                                  <div class="col-md-3">
                                                <div class="form-group"></br>
                                                   <label>Distance</label>
                                                   <input type="number" min = "0" class="form-control" name="Distance" placeholder="Distance" required>
                                                </div>
                                             </div>
                                  <div class="col-md-3">
                                                 <div class="form-group"></br>
                                                   <label>Price</label>
                                                   <input type="number" min = "0" class="form-control" name="Price" placeholder="Price" required>
                                                </div>
                                             </div>
                                          </div>
                                  <div class="row">
                                             <div class="col-md-4">
                                                <div class="form-group"></br>
                                                   <label>Date Of Event</label>
                                                   <input type="date" class="form-control" name="DateOfEvent" value="<?php echo date("Y-m-d"); ?>" required>
                                                </div>
                                             </div>
                                             <div class="col-md-2">
                                                <div class="form-group"></br>
                                                   <label> Time Start</label>
                                                   <input type="time" class="form-control" name="TimeStart" value="<?php echo date("Y-m-d"); ?>" required>
                                                </div>
                                             </div>
                                
                                               
                                            
                                          </div>
                                          <div class="modal-footer">
                                             <button type="submit" class="btn btn-info btn-fill pull-right" name="EventAdd">Create Event</button>
                                          </div>
                                       </form>
                              <?php
                              if(isset($_POST['EventAdd'])){
                                 extract($_POST);
                                 $sql = "insert into Event values ('$EventID','$EventName','$Distance','$DateOfEvent','$TimeStart','$Price')";
                                 $result = mysqli_query($conn,$sql);
                                 if(mysqli_affected_rows($conn) == 1){
                                    echo "<script>alert('Event is added to database!')</script>";
                                    //header("location: admin.php");
                                 }else{
                                    echo "<script>alert('Failed to add Event!')</script>";
                                 }
                              }
                              ?>
                              <form method="POST">
                                       <table class="data table table-striped no-margin">
                                         <thead>
                                             <tr>
                                                 <th>Event ID</td>
                                                <th>Event Name</th>
                                                <th>Distance</th>
                                                <th>Date of Event</th>
                                                <th>Time Start</th>
                                                <th>Price</th>
                                                 <th>Update Event</th>
                                                 <th>Delete Event</th>
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
                                          <td>{$rc['Distance']} KM</td>
                                           <td>{$rc['DateOfEvent']}</td>
                                            <td>{$rc['TimeStart']}</td>
                                             <td>{$rc['Price']}</td>
                                          <td><a href=\"Admin_Event.php?action=update&id={$rc['EventID']}\">Edit Event</a></td>
                                          <td><a href=\"Admin_Event_delete.php?EventID={$rc['EventID']}\">Delete Event</a></td></tr>"
                                          ;
                                    }
                                 ?>
                                          </tbody>
                                       </table>
                                 
                              </form>
                                    </div>
                         
                             
                             
                         

                            

                           <?php
                             
                             
                              }elseif($action=="update" && $action !="View"){
                                 $id = $_GET['id']; // pass Event id through $_GET function
                                 $sql = "select * from Event where EventID = '$id'";
                                 $result = mysqli_query($conn,$sql);
                                 $result = mysqli_fetch_assoc($result);
                           ?>
                               <form style="padding-left:20px" method="POST">
                                          <div class="row">
                                             <div class="col-md-2">
                                                <div class="form-group"></br>
                                                   <label>Event ID</label>
                                                   <input type="text" class="form-control" name="EventID" placeholder="Event ID" value="<?php echo $id; ?>" readonly>
                                                </div>
                                             </div>
                                  <div class="col-md-3">
                                                <div class="form-group"></br>
                                                   <label>EventName</label>
                                                   <input type="text" class="form-control" name="EventName" placeholder="EventName" value="<?php echo $result['Name']; ?>" required>
                                                </div>
                                             </div>
                                  <div class="col-md-3">
                                                <div class="form-group"></br>
                                                   <label>Distance</label>
                                                   <input type="number" min = "0"class="form-control" name="Distance" placeholder=" Distance" value="<?php echo $result['Distance']; ?>" required>
                                                </div>
                                             </div>
                                  <div class="col-md-2">
                                                <div class="form-group"></br>
                                                   <label>Price</label>
                                                   <input type="number" min ="0" class="form-control" name="Price" placeholder="Date" value="<?php echo $result['Price']; ?>" required>
                                                </div>
                                             </div>
                                          </div>

                                  <div class="col-md-3">
                                                <div class="form-group"></br>
                                                   <label>DateOfEvent</label>
                                                   <input type="Date" class="form-control" name="DateOfEvent" placeholder="Date" value="<?php echo $result['DateOfEvent']; ?>" required>
                                                </div>
                                             </div>
                                            
                                    <div class="col-md-3">
                                                <div class="form-group"></br>
                                                   <label>Time Start</label>
                                                   <input type="time" class="form-control" name="TimeStart" placeholder="time" value="<?php echo $result['TimeStart']; ?>" required>
                                                </div>
                                             </div>
                                          </div>

                                          <div class="modal-footer">
                                              <button type="button" class="btn btn-info btn-fill pull-right" onclick="back();">Back</button>
                                             <button type="submit" class="btn btn-info btn-fill pull-right" name="Event_update">Update</button>
                              
                                          </div>
                                       </form>
                              <?php 
                              
                                if(isset($_POST['Event_update'])){
                                 extract($_POST);
                                 $sql = "update Event set Name = '$EventName', Distance = '$Distance', DateOfEvent = '$DateOfEvent', TimeStart = '$TimeStart',Price = '$Price'   where EventID = '$EventID'"; // update customer information
                                 $result = mysqli_query($conn,$sql);
                                 if(mysqli_affected_rows($conn) == 1){
                                  	echo "<script>alert('Update sucessful')</script>";
                                    echo "<script>window.location.href = \"./Admin_Event.php?action=View&EventID=$EventID\"</script>"; // redirect to admin.php
                                 }else{
                                    echo "<script>alert('Failed to update the information or the information has no any modification!')</script>";
                                 }
                                }
                               ?>
                               <?php 
                               }else 
                                if($action=="View"){
                                $EventID = $_GET['EventID'];
                                $sql ="select er.*,r.*,e.* from EventRegister er ,Runner r ,Event e
                                       
                                      where er.RunnerID = r.RunnerID and er.EventID = e.EventID and er.EventID ='$EventID'";
                                
                                $result = mysqli_query($conn,$sql);
                               
                           ?>
                           <h3>	Affected runners List :</h3>
                           <form method="POST">
                                       <table class="data table table-striped no-margin">
                                         <thead>
                                             <tr>
                                               <th>Runner ID</td>
                                                <th>Runner Picture</td>
                                                 <th>Runner Name</td>
                                                  <th>Gender</td>
                                                <th>Event Name</th>
                                                <th>Distance</th>
                    
                                                
                                             </tr>
                                          </thead>
                                          <tbody>
                            <?php 
                            while($rc = mysqli_fetch_assoc($result)){
                                       echo "<tr>
                                       <td>{$rc['RunnerID']}</td>";
                                        if($rc["ProfilePicture"] != null){
                                            echo '<td><img src="uploadedPicture/'.$rc["ProfilePicture"].'"style="width:100px;height:100px"></td>';
                                        }else{
                                            echo '<td><img src="uploadedPicture/null.png"style="width:100px;height:100px"></td>';
                                        }

                                       	echo " <td>{$rc['FirstName']} {$rc['LastName']}</td>
                                          <td>{$rc['Gender']}</td>
                                          <td>{$rc['Name']}</td>
                                          <td>{$rc['Distance']} KM</td>
                                          "
                                          ;
                            }
                            ?>
                                      </tbody>
                                </table>
                                <div class="modal-footer">
                                              <button type="button" class="btn btn-info btn-fill pull-right" onclick="back();">Back</button>
                                    
                              
                                          </div>
                                 
                              </form>
                              </div>
                              <?php
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
         window.location.href = "./Admin_Event.php"
      }    
   </script>
   </body>
</html>
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
   if($_SESSION['usertype'] != "Volunteer"){
      header('HTTP/1.0 403 Forbidden');
      die('<!DOCTYPE HTML PUBLIC "-//IETF//DTD HTML 2.0//EN">
      <HTML><HEAD>
      <TITLE>403 Forbidden</TITLE>
      </HEAD><BODY>
      <H1>Forbidden</H1>
      You don\'t have permission to access this.php on this server.
      <HR>
      <I><!--#echo var="HTTP_HOST" --></I>
      </BODY></HTML>');
   }
   include('conn.php');
   $username = $_SESSION['username']; // get username
   $sql = "SELECT * FROM Volunteer where VolunteerID='$username'";
   $action ="login";
   $result = mysqli_query($conn,$sql);
   $result = mysqli_fetch_assoc($result);
   $EventID =$_GET['EventID'];
   $RunnerID =$_GET['RunnerID'];

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
                            <li><a href ="Volunteer_checkIn.php"><i class="fa fa-child" ></i> Check-in Event<span class="fa fa-chevron"></span></a>
                           </li>
                             <li><a href ="Volunteer_View_Update.php"><i class="fa fa-clone" ></i> Runner Event Record<span class="fa fa-chevron"></span></a>
                           </li>
                           <li><a href="Volunteer_RaceKit.php"><i class="fa fa-map"></i> Create RaceKit<span class="fa fa-chevron"></span></a>
                           </li>
                           <li><a href="Volunteer_ViewRaceKit.php"><i class=" fa fa-newspaper-o"></i>View All RaceKit<span class="fa fa-chevron"></span></a>
                           </li>
                           <li><a href="SendRaceKitList.php"><i class="fa fa-heart"></i> Arrange Race Kit<span class="fa fa-chevron"></span></a>
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
                           <b><?php echo "Volunteer :"." ".$result['FirstName']." ".$result['LastName']; ?></b> <!--get Name-->
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
                        <h3>Volunteeer</h3>
                       
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
                           <li role="presentation" class="active"><a href="#tab_content3" role="tab" id="customer-tab" data-toggle="tab" aria-expanded="false">Check-In</a></li>
                                  </ul>
                           <li
                                  </ul>
                                 <div id="myTabContent" class="tab-content">
                                    <div role="tabpanel" class="tab-pane fade" id="tab_content1" aria-labelledby="airline-tab">
                               
                                       <form style="padding-left:20px"  method="POST" action="" id="admin_airline">
                                          <div class="row" >
                                             <div class="col-md-3">
                                                <div class="form-group"></br>
                                                   
                                                 
                                                </div>
                                             </div>
                                          </div>
                                <div class="modal-footer">
                             
                                          </div>
                                       </form>
                              <div id="airline"></div>
                                    </div>
                                    <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="">
                                       <form style="padding-left:20px" method="POST" id="admin_hotel" action="">
                                          <div class="row">
                                             <div class="col-md-4">
                                                <div class="form-group"></br>
                                                   <select class="form-control" value="" name="EngName">
                                     
                                                   </select>
                                                </div>
                                             </div>
                                         </div>
                                          <div class="modal-footer">
                                          
                                          </div>
                                       </form>
                                       <div id="hotel"></div>
                                    </div>
                                    <div role="tabpanel" class="tab-pane fade active in" id="tab_content3" aria-labelledby="customer-tab">
                                    <?php
                                       $sql ="select r.*,e.Name,e.EventID,e.Distance,er.CheckInTime,er.RegID from Runner r ,Event e,EventRegister er 
                                             where er.EventID = e.EventID and er.RunnerID = r.RunnerID and er.RunnerID = '$RunnerID' and er.EventID = '$EventID' ";
                                       $result = mysqli_query($conn,$sql);
                                        $result = mysqli_fetch_assoc($result);
                                        date_default_timezone_set('Asia/Hong_Kong'); // get HONG KONG Time
                                        $today = date("h:i:sa"); //get today time
                                    ?>

                                       <form style="padding-left:20px" method="POST" enctype="multipart/form-data">
                                          <div class="row">
                                             <div class="col-md-2">
                                             <div class="form-group"></br>
                                                   <label>Runner Picture</label>
                                                   <?php 
                                                      if($result["ProfilePicture"] != null){
                                                          echo '<img src="uploadedPicture/'.$result["ProfilePicture"].'"style="width:100px;height:100px"/>';
                                                      }else{
                                                            echo '<img src="uploadedPicture/null.png"style="width:100px;height:100px"/>';
                                                       }?>
                                                </div>
                                             </div>

                                             <div class="col-md-1">
                                                <div class="form-group"></br>
                                                   <label>RunnerID</label>
                                    
                                                   <input type="text" class="form-control" name="RunnerID" placeholder="RunnerID" value="<?php echo $RunnerID; ?>" readonly>
                                                   <input type="hidden" class="form-control" name="RegID" placeholder="RegID" value="<?php echo $result ['RegID']; ?>" readonly>
                                                </div>
                                             </div>
                                             <div class="col-md-3">
                                                <div class="form-group"></br>
                                                   <label>Runner Name :</label>
                                                   <input type="text" class="form-control" name="Name" placeholder="Name" value ="<?php echo $result ['FirstName'] ." ".$result ['LastName']   ?>"readonly>
                                                </div>
                                             </div>
                                             <div class="col-md-2">
                                                <div class="form-group"></br>
                                                   <label>Country</label>
                                                   <input type="text" class="form-control" name="Country" placeholder="Country" value ="<?php echo $result ['Country']  ?>"readonly>
                                                </div>
                                             </div>
                                              <div class="col-md-1">
                                                <div class="form-group"></br>
                                                   <label>Gender</label>
                                                   <input type="text" class="form-control" name="Gender" placeholder="Gender" value ="<?php echo $result ['Gender']  ?>"readonly>
                                                </div>
                                             </div>
                                 
                                  <div class="col-md-10">

                                            
                                              <div class="col-md-5">
                                                <div class="form-group"></br>
                                                   <label> Event Name</label>
                                                    <input type="text" class="form-control" name="EventName" value="<?php echo $result ['Name'] ?>" readonly>
                                                   <input type="hidden" class="form-control" name="EventID" value="<?php echo  $EventID ?>" required>
                                                </div>
                                             </div>
                                             <div class="col-md-2">
                                                <div class="form-group"></br>
                                                   <label> Distance</label>
                                                    <input type="text" class="form-control" name="Disance" value="<?php echo  $result ['Distance'].'Km'?>" readonly>
                                                   
                                                </div>
                                             </div>
                                            
                                          </div>

                                  <div class="row">

                                               
                                            
                                          </div>
                                          <div class="modal-footer">
                                            <button type="button" class="btn btn-info btn-fill pull-right" onclick="back();">Back</button>
                                          
                                              <button type="submit" class="btn btn-info btn-fill pull-right"  name="CheckIn">Check-In</button>
                                          </div>
                                       </form>


                              <?php
                                
                              if(isset($_POST['CheckIn'])){
                                 extract($_POST);
                                    date_default_timezone_set('Asia/Hong_Kong'); // get HONG KONG Time
                                    $today = date("h:i:sa"); //get today time
                         
                                     $sql = "update EventRegister set CheckInTime = '$today' where EventID = '$EventID' and RunnerID ='$RunnerID' and RegID ='$RegID'"; // update customer information
                                     $rs = mysqli_query($conn,$sql) or die (mysqli_connect_error());

                                  

                                     if(mysqli_affected_rows ($conn) == 1){
 
                                        echo "<script>alert('Check-in sucessful')</script>";
                                 
                                        echo "<script>window.location.href = \"./Volunteer_checkIn.php\"</script>";;
                                    
                                       
                                     }else{
                                       echo "<script>alert('Check-in Unsucessful')</script>";

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
         window.location.href = "./Volunteer_checkIn.php"
      }    
   </script>
   <!--Set Photo Format-->
   
   </body>
</html>
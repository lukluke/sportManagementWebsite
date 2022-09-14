<?php
   session_start();
   if(!$_SESSION['username'] || !$_SESSION['password']){
      $caption = "Login";
   header("Location: index.php");
   die();
   }else{
      $caption = "Logout";
   }
   // if user is not a Administrator 
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
                           <li><a href ="admin.php"><i class="fa fa-hospital-o" ></i> Event<span class="fa fa-chevron"></span></a>
                           </li>
                           <li><a href="Admin_Runner.php"><i class="fa fa-street-view"></i> Runner<span class="fa fa-chevron"></span></a>
                           </li>
                           <li><a href="Admin_Volunteer.php"><i class="fa fa-hand-paper-o"></i>Volunteer<span class="fa fa-chevron"></span></a>
                           </li>
                           <li><a href="Charity.php"><i class="fa fa-heart"></i> Charity<span class="fa fa-chevron"></span></a>
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
                              <li><a href="admin.php"> Management</a></li>
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
                           <li role="presentation" class="active"><a href="#tab_content3" role="tab" id="customer-tab" data-toggle="tab" aria-expanded="false">Volunteer Management</a></li>
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
                             
                                          </div>
                                       </form>
                              <div id="airline"></div>
                                    </div>
                                    <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="">
                                       <form style="padding-left:20px" method="POST" id="admin_hotel" action="">
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
                                          
                                          </div>
                                       </form>
                                       <div id="hotel"></div>
                                    </div>
                                    <div role="tabpanel" class="tab-pane fade active in" id="tab_content3" aria-labelledby="customer-tab">
                           <?php
                              
                              
                              if($action != "update"){
                           ?>
                                       <form style="padding-left:20px" method="POST">
                                          <div class="row">
                                             <div class="col-md-2">
                                                <div class="form-group"></br>
                                                   <label>Volunteer ID</label>
                                       <?php
                                       // automatically calculate the next VolunteerID
                                       $sql = "select max(VolunteerID) as VolunteerID from Volunteer";
                                       $result = mysqli_query($conn,$sql);
                                       $result = mysqli_fetch_assoc($result);
                                       $prefix = substr($result['VolunteerID'],0,1); // get the prefix (C)
                                       $postfix = substr($result['VolunteerID'],1); // get the postfix (3 numbers)
                                       $VolunteerID = ($prefix . str_pad(((integer)$postfix + 1), 3, '0', STR_PAD_LEFT)); // concatenate the custID
                                       ?>
                                                   <input type="text" class="form-control" name="VolunteerID" placeholder="Volunteer ID" value="<?php echo $VolunteerID; ?>" readonly>
                                                </div>
                                             </div>
                                             <div class="col-md-4">
                                                <div class="form-group"></br>
                                                   <label>First Name :</label>
                                                   <input type="text" class="form-control" name="FirstName" placeholder="FirstName" pattern="[A-Za-z]+$" title ="Eg:Ben Chan"required>
                                                </div>
                                             </div>
                                  <div class="col-md-3">
                                                <div class="form-group"></br>
                                                   <label>LastName</label>
                                                   <input type="text" min = "0" class="form-control" name="LastName" placeholder="LastName" pattern="[A-Za-z]+$" required>
                                                </div>
                                             </div>
                                  <div class="col-md-3">
                                                 <div class="form-group"></br>
                                                   <label>Password</label>
                                                   <input type="Password" class="form-control" name="Password" placeholder="Password" required>
                                                </div>
                                             </div>
                                          </div>
                                  <div class="row">
                                             <div class="col-md-2">
                                                <div class="form-group"></br>
                                                  <label>Gender</label>
                                                   <select class="form-control" value="gender" name="Gender">
                                                      <option>M</option>
                                                      <option>F</option>
                                                   </select>

                                                </div>
                                             </div>
                                             <div class="col-md-4">
                                                <div class="form-group"></br>
                                                   <label> Email</label>
                                                   <input type="Text" class="form-control" name="Email"  pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" required>
                                                </div>
                                             </div>
                                
                                               
                                            
                                          </div>
                                          <div class="modal-footer">
                                             <button type="submit" class="btn btn-info btn-fill pull-right" name="VolunteerAdd">Create Volunteer</button>
                                          </div>
                                       </form>
                              <?php
                              if(isset($_POST['VolunteerAdd'])){
                                 extract($_POST);
                                 $md5Pwd = md5($Password);
                                 $sql = "insert into Volunteer values ('$VolunteerID','$md5Pwd','$FirstName','$LastName','$Gender','$Email')";
                                 $result = mysqli_query($conn,$sql);
                                 if(mysqli_affected_rows($conn) == 1){
                                    echo "<script>alert('Volunteer is added to database!')</script>";
                                 }else{
                                    echo "<script>alert('Failed to add Volunteer!')</script>";
                                 }
                              }
                              ?>
                              <form method="POST">
                                       <table class="data table table-striped no-margin">
                                         <thead>
                                             <tr>
                                                 <th>Volunteer ID</td>
                                                <th>First Name</th>
                                                <th>Last Name</th>
                                                <th>Gender</th>
                                                <th>Email </th>
                                                 <th>Update Event</th>
                                                 <th>Delete Event</th>
                                             </tr>
                                          </thead>
                                          <tbody>
                                          
                                          
                                          rb.check // dfadsfs
                                 <?php
                                    // get all customers
                                    $sql = "select * from Volunteer";
                                    $result = mysqli_query($conn,$sql);
                                    while($rc = mysqli_fetch_assoc($result)){
                                       echo "<tr>
                                          <td>{$rc['VolunteerID']}</td>
                                          <td>{$rc['VfirstName']}</td>
                                          <td>{$rc['VLastName']}</td>
                                           <td>{$rc['Gender']}</td>
                                            <td>{$rc['Email']}</td>
                                           
                                          <td><a href=\"Volunteer.php?action=update&id={$rc['VolunteerID']}\">Edit Event</a></td>
                                          <td><a href=\"Volunteer_delete.php?VolunteerID={$rc['VolunteerID']}\">Delete Event</a></td></tr>"
                                          ;
                                    }
                                 ?>
                                          </tbody>
                                       </table>
                                 
                              </form>
                                    </div>
                           <?php
                              // delete all booking related to the customer and the customer
                             
                              }else if($action=="update"){
                                 $id = $_GET['id']; // pass customer id through $_GET function
                                 $sql = "select * from Volunteer where VolunteerID = '$id'";
                                 $result = mysqli_query($conn,$sql);
                                 $result = mysqli_fetch_assoc($result);
                           ?>
                               <form style="padding-left:20px" method="POST">
                                          <div class="row">
                                             <div class="col-md-2">
                                                <div class="form-group"></br>
                                                   <label>Volunteer ID</label>
                                                   <input type="text" class="form-control" name="VolunteerID" placeholder="Volunteer ID" value="<?php echo $id; ?>" readonly>
                                                </div>
                                             </div>
                                  <div class="col-md-3">
                                                <div class="form-group"></br>
                                                   <label>FirstName</label>
                                                   <input type="text" class="form-control" name="FirstName" placeholder="Surname" pattern="[A-Za-z]+$"value="<?php echo $result['VfirstName']; ?>" required>
                                                </div>
                                             </div>
                                  <div class="col-md-3">
                                                <div class="form-group"></br>
                                                   <label>LastName</label>
                                                   <input type="text" class="form-control" name="LastName" placeholder="Given Name" pattern="[A-Za-z]+$" value="<?php echo $result['VLastName']; ?>" required>
                                                </div>
                                             </div>
                                 <div class="col-md-3">
                                                <div class="form-group"></br>
                                                   <label>Password</label>
                                                   <input type="Password" class="form-control" name="Password" placeholder="Password" value="<?php echo $result['Password']; ?>"required>
                                                </div>
                                             </div>
                                  <div class="col-md-2">
                                                <div class="form-group"></br>
                                                    <label>Gender</label>
                                                   <select class="form-control" value="gender" name="Gender" value="<?php echo $result['Gender']; ?>" >
                                                      <option>M</option>
                                                      <option>F</option>
                                                   </select>
                                                </div>
                                             </div>
                                          

                                  <div class="col-md-4">
                                                <div class="form-group"></br>
                                                   <label>Email</label>
                                                   <input type="text" class="form-control" name="Email" placeholder="Email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" value="<?php echo $result['Email']; ?>" required>
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
                                 $md5Pwd = md5($Password);
                                 $sql = "update Volunteer set Password = '$md5Pwd', VfirstName = '$FirstName', VLastName = '$LastName', Gender = '$Gender',Email = '$Email'   where VolunteerID = '$VolunteerID'"; // update Volunteer information
                                 $result = mysqli_query($conn,$sql);
                                 if(mysqli_affected_rows($conn) == 1){
                                    echo "<script>window.location.href = \"./Admin_Volunteer.php\"</script>"; // redirect to admin.php
                                 }else{
                                    echo "<script>alert('Failed to uodate the information or the information has no any modification!')</script>";
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
      <script type="text/javascript">
         $(document).ready(function(){
          $(document).on('submit', '#admin_airline', function(){
           var data = $(this).serialize();
           $.ajax({
           type : 'POST',
           url  : 'admin_airline.php',
           data : data,
           success :  function(data){
               $("div#airline").html(data);
           }});
           return false;
          });
         });
       
       $(document).ready(function(){
          $(document).on('submit', '#admin_hotel', function(){
           var data = $(this).serialize();
           $.ajax({
           type : 'POST',
           url  : 'admin_hotel.php',
           data : data,
           success :  function(data){
               $("div#hotel").html(data);
           }});
           return false;
          });
         });
      </script>
   <script> 
      function back(){
         window.location.href = "./Admin_Volunteer.php"
      }    
   </script>
   </body>
</html>
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
                           </li>                        </ul>
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
                           <b><?php echo "Sponsor:"." ".$result['FirstName']." ".$result['LastName']; ?></b> <!--get Name-->
                           
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
                        <h3>Sponsor</h3>
                       
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
                           <li role="presentation" class="active"><a href="#tab_content3" role="tab" id="customer-tab" data-toggle="tab" aria-expanded="false">Sponsor Runner</a></li>
                             
                                  </ul>
                                 <div id="myTabContent" class="tab-content">
                                    <div role="tabpanel" class="tab-pane fade" id="tab_content1" aria-labelledby="airline-tab">
                                  
                                       <form style="padding-left:20px"  method="POST" action="admin.php" id="admin">
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
                                
                                    <div role="tabpanel" class="tab-pane fade active in" id="tab_content3" aria-labelledby="customer-tab">
                           <?php
                              
                              
                              if($action != "update" && $action !="sp"){
                           ?>
                              <!--Assgin Volunteer-->     
                              <form method="POST">
                                       <table class="data table table-striped no-margin">
                                    
                                         <thead>
                                             <tr>
                                                 <th>Runner ID</td>
                                                 <th>Icon</th>  
                                                <th>Runner Name</th>
                                                
                                                <th>Gender</th>
                                                <th>Event</th>
                                                <th>top speed</th>
                                                 <th>Sponsor</th>
                                                 
                                             </tr>
                                          </thead>
                                          <tbody>
                                 <?php
                                    // get all
                                    $sql = "select r.*,er.TopSpeed,e.DateOfEvent ,e.TimeStart ,er.RegID,e.Name from Runner r,EventRegister er,Event e where r.RunnerID = er.RunnerID And er.EventID = e.EventID ORDER BY er.TopSpeed  ";

                                    $result = mysqli_query($conn,$sql);
                                    while($rc = mysqli_fetch_assoc($result)){
                                       /*"<tr>
                                          <td>{$rc['RunnerID']}</td>
                                          <td><img src="RunnerPicture/'.{$rc['FirstName']}.'></td>
                                          <td>{$rc['FirstName']} {$rc['LastName']}</td>
                                           <td>{$rc['Gender']}</td>
                                           <td>NO volunteer</td>
                                       
                                           
                                          <td><a href=\"Volunteer.php?action=update&id={$rc['VolunteerID']}\">Assign Volunteer</a></td>
                                          </tr>"
                                          ;*/
                                      date_default_timezone_set('Asia/Hong_Kong'); // get HONG KONG Time
                                      $today = date("Y-m-d"); //get today time
                                      $Hour = date("H:i:s");
                                      //echo "$Hour </br>" ;
                                      if($rc['DateOfEvent'] > $today ){
                                          
                                         echo '<tr><td>'.$rc['RunnerID'].'</td>';
                                         if($rc["ProfilePicture"] != null){
                                          echo '<td><img src="uploadedPicture/'.$rc["ProfilePicture"].'"style="width:100px;height:100px"></td>';
                                         }else{
                                            echo '<td><img src="uploadedPicture/null.png"style="width:100px;height:100px"></td>';
                                         }
                                         
                                          echo '<td>'.$rc['FirstName']." ".$rc['LastName'].'</td>';
                                          echo'<td>'.$rc["Gender"].'</td>';
                                            echo'<td>'.$rc["Name"].'</td>';
                                          if($rc["TopSpeed"] == null){  
                                          echo'<td>- - - - - - - -</td>';
                                          }else{
                                            echo'<td>'.$rc["TopSpeed"].'</td>';
                                          }
                                          echo '<td><a href="Sponsor_sponsor.php?action=update&id='.$rc['RunnerID'].'&reg='.$rc['RegID'].'">Sponsor</a></td></tr>'; 
                                        
                                      }
                                    }
                                 ?>
                                          </tbody>
                                       </table>
                                 
                              </form>
                                    </div>
                           <?php
                              
                             
                              }else if($action=="update"){
                                 $id = $_GET['id']; // pass Runner id through $_GET function
                                 $Reg =$_GET['reg'];
                                  $sql1 ="select * from SponsorRecord where RegID = '$Reg' and SponsorID ='$SpID'";
                                  $rs=mysqli_query($conn,$sql1)or die(mysqli_error($conn));
                                  $result = mysqli_fetch_assoc($rs);
                                 if(mysqli_num_rows($rs) !=0){
                                  echo "<script>alert('You have been Sponsor this runner.')</script>";
                                    echo "<script>window.location.href = \"./Sponsor_sponsor.php\"</script>";
                                  }else{
                                 $sql = "select r.* from Runner r ,EventRegister er where r.RunnerID = er.RunnerID && er.RunnerID = '$id' && er.RegID ='$Reg'";
                                 $result = mysqli_query($conn,$sql);
                                 $result = mysqli_fetch_assoc($result);
                               
                           ?>
                               <form style="padding-left:20px" method="POST">
                                    <div class="row">
                                       <h3 style ="color :Brown">Spnosr Runner Infromation : </h3> 
                                       <div class="col-md-2">
                                                <div class="form-group"></br>
                                                   <label></label>
                                                   <?php 
                                                      if($result["ProfilePicture"] != null){
                                                          echo '<td><img src="uploadedPicture/'.$result["ProfilePicture"].'"style="width:100px;height:100px"></td>';
                                                      }else{
                                                            echo '<td><img src="uploadedPicture/null.png"style="width:100px;height:100px"></td>';
                                                       }?>
                                                </div>
                                             </div>
                                             <div class="col-md-2">
                                                <div class="form-group"></br>
                                                  <label>Sponsor: <?php echo  $SpID;?></label>
                                                   <label>RegisterID: <?php echo  $Reg;?></label>
                                                   <label>Runner ID :  <?php echo $id; ?></label>
                                                  <label>Name :<h7><?php echo $result['FirstName'] ." ". $result['LastName']; ?></h7> </label>
                                                  <label>Gender : <?php echo $result['Gender']; ?></label>
                                                

                                                </div>
                                             </div>         
                                   
                                          </div>
                                       </br>
                                       <table class="data table table-striped no-margin">
                                         <h3 style ="color :Green;">Select Charity List : </h3> 
                                         <thead>
                                             <tr>
                                                <th>Charity ID</td>
                                                  <th>logo</th>     
                                                <th>Name</th>         
                                                <th>Description</th>
                                               
                                                 <th>Action</th>
                                               
                                             </tr>
                                          </thead>
                                          <tbody>
                                            <?php }?>
                                 <?php
                                     $id = $_GET['id']; // pass Runner id through $_GET function
                                    $Reg =$_GET['reg'];
                                    // get all customers
                                    $sql = "select * from Charity ";
                                    
                                    $result = mysqli_query($conn,$sql);
                                    while($rc = mysqli_fetch_assoc($result)){
                                        echo '<tr><td>'.$rc['CharityID'].'</td>';
                                       echo '<td><img src="CharityLogo/'.$rc["Logo"].'"style="width:120px;height:200px"></td>';
                                       echo '<td>'.$rc["Name"].'</td>';
                                      
                                       echo '<td>'.$rc["Description"].'</td>';

                                          
                                        echo '<td><a href="Sponsor_sponsor.php?action=sp&Name='.$rc['Name'].'&Cid='.$rc['CharityID'].'&id='.$id.'&reg='.$Reg.'">Select</a></td></tr>'; 
                                         
                                          ;
                                    }
                                 ?>
                                          </tbody>
                                       </table>

                                       </form>
                                        <div class="modal-footer">
                                            
                                            <button type="button" class="btn btn-info btn-fill pull-right" onclick="back();">Back</button>
                                          </div>
                              <?php 

                              }else
                              if($action =='sp'){
                                 $id = $_GET['id']; // pass Runner id through $_GET function
                                 $Reg =$_GET['reg'];
                                 $Cname=$_GET['Name'];
                                 $Cid =$_GET['Cid'];
                                 $sql = "select r.* from Runner r ,EventRegister er where r.RunnerID = er.RunnerID && er.RunnerID = '$id' && er.RegID ='$Reg'";
                                 $result = mysqli_query($conn,$sql);
                                 $result = mysqli_fetch_assoc($result);
                              ?>
                              <form style="padding-left:20px" method="POST">
                                    <div class="row">
                                       <h3 style ="color :Brown">Sponsor Confirm </h3> 
                                       <div class="col-md-2">
                                                <div class="form-group"></br>
                                                   <label>Runner Picture :</label>
                                                   <?php 
                                                      if($result["ProfilePicture"] != null){
                                                          echo '<td><img src="uploadedPicture/'.$result["ProfilePicture"].'"style="width:100px;height:100px"></td>';
                                                      }else{
                                                            echo '<td><img src="uploadedPicture/null.png"style="width:100px;height:100px"></td>';
                                                       }?>
                                                </div>
                                             </div>
                                             <div class="col-md-2">
                                                <div class="form-group"></br>
                                                  <!--<label>Sponsor: <?php echo  $SpID;?></label> -->
                                                  <!-- <label>RegisterID: <?php echo  $Reg;?></label> -->
                                                   <label>Runner ID :  <?php echo $id; ?></label>
                                                   <label>Runner Name :<h7><?php echo $result['FirstName'] ." ". $result['LastName']; ?></h7> </label>
                                                  <label>Gender : <?php echo $result['Gender']; ?></label>
                                               	<label>Charity : <?php echo $Cname ?></label></br>
                                                <label>Dollars:</label><input type ="number" min ="1" name ="amount" required/>
                                                </div>
                                             </div>         
                                   
                                          </div>
                                       </br>
                                       
                                       <div class="modal-footer">
                                             
                                            <button type="button" class="btn btn-info btn-fill pull-right" onclick="back();">Back</button>
                                            <button type="submit" class="btn btn-info btn-fill pull-right" name="Donate">Donate</button>

                                          </div>
                                       </form>
                                       

                               <?php
                              if(isset($_POST['Donate'])){
                                 extract($_POST);
                                 $sql = "insert into SponsorRecord values ('$SpID','$Cid','$Reg','$amount','1')";
                                 $result = mysqli_query($conn,$sql);
                                 if(mysqli_affected_rows($conn) == 1){
                                 	
                                	echo "<script>window.location.href = \"./Sponsor_remove.php\"</script>";
                                    echo "<script>alert('Donate successful')</script>";
                                   
                                 }else{
                                    echo "<script>alert('You has Donate this runner')</script>";
                                 }
                              }
                              ?>

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
         window.location.href = "./Sponsor_sponsor.php"
      }    
   </script>
   </body>
</html>
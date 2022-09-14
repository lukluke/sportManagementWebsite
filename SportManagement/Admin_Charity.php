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
                           <li role="presentation" class="active"><a href="#tab_content3" role="tab" id="customer-tab" data-toggle="tab" aria-expanded="false">Charity Management</a></li>
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
                          
                                       <form style="padding-left:20px" method="POST" action ="Admin_Charity.php" enctype="multipart/form-data"> <!--enctype="multipart/form-data" for photo  for undefine-->
                                          <div class="row">
                                             <div class="col-md-2">
                                                <div class="form-group"></br>
                                                   <label>Charity ID</label>
                                       <?php
                                       // automatically calculate the next custID
                                       $sql = "select max(CharityID) as CharityID from Charity";
                                       $result = mysqli_query($conn,$sql);
                                       $result = mysqli_fetch_assoc($result);
                                       $prefix = substr($result['CharityID'],0,1); // get the prefix (C)
                                       $postfix = substr($result['CharityID'],1); // get the postfix (3 numbers)
                                       $CharityID = ($prefix . str_pad(((integer)$postfix + 1), 3, '0', STR_PAD_LEFT)); // concatenate the custID
                                       ?>
                                                   <input type="text" class="form-control" name="CharityID" placeholder="CharityID" value="<?php echo $CharityID; ?>" readonly>
                                                </div>
                                             </div>
                                             <div class="col-md-4">
                                                <div class="form-group"></br>
                                                   <label> Name :</label>
                                                   <input type="text" class="form-control" name="Name" placeholder="Name" required>
                                                </div>
                                             </div>
                                  <div class="col-md-2">
                                                <div class="form-group"></br>
                                                   <label>Logo</label>
                                                   <input type="file" name="file_img" id="image"  />
                                                </div>
                                             </div>
                                  <div class="col-md-10">

                                             <div class="col-md-10">
                                                <div class="form-group"></br>
                                                   <label> WebsiteUrl</label>
                                                   <input type="url" class="form-control" name="WebsiteUrl"  required>
                                                </div>
                                             </div>
                                
                                                 <div class="form-group"></br>
                                                   <label>Description
                                                   <textarea  class="form-control" rows='5' cols ='75' id="count" onkeyup="document.getElementById('Countnumber').innerHTML =this.value.length *1" name ="Description"  placeholder="Description" required></textarea>
                                                   <p align = "right"id ="Countnumber" onfocus ="this.style.backgroundColor ='yellow';">0</p></label>
                                                </div>
                                             </div>
                                          </div>

                                  <div class="row">
                                           
                                               
                                            
                                          </div>
                                          <div class="modal-footer">
                                             <button type="reset" class="btn btn-info btn-fill pull-right" name="Reset">Reset</button>
                                              <button type="submit" class="btn btn-info btn-fill pull-right" id ="insert" name="CharityAdd">Create Charity</button>
                                           
                                          </div>
                                       </form>


                              <?php
                                
                              if(isset($_POST['CharityAdd'])){
                                 extract($_POST);
                                   
                                       
                                       $sql = "insert into Charity values ('$CharityID','$Name','$Description','$WebsiteUrl','".$_FILES["file_img"]["name"]."')";
                                    
                                       $filetmp = $_FILES["file_img"]["tmp_name"];
                                       $filename = $_FILES["file_img"]["name"];
                                       $filetype = $_FILES["file_img"]["type"];
                                       $filepath = "CharityLogo/".$filename;
                                       $uploadOk = 1;
                                       // Check if file already exists
                                       if (file_exists($filepath)) {
                                          echo "<script>alert('Sorry, file already exists.your file was not uploaded.')</script>";
                                        $uploadOk = 0;
                                        }
                                       // Check file size
                                       if ($_FILES["file_img"]["size"] > 500000000000) {
                                            echo "<script>alert('Sorry, your file is too large.')</script>";
                                            $uploadOk = 0;
                                       }
                                       if ($uploadOk == 0) {
                                           echo "Sorry, your file was not uploaded.";
                                       }else {
                                           if(mysqli_affected_rows($conn) == 1){
                                              if (move_uploaded_file($filetmp,$filepath)){
   
                                                $result = mysqli_query($conn,$sql);
                                            
                                                echo "<script>alert('Charity is added to database!')</script>";
                                             }else{
                                                echo "<script>alert('Failed to add Charity!')</script>";
                                             }

                                          }else {
                                            echo "<script>alert('Failed to add Charity!')</script>";
                                          }
                                       }        
                              }
                              ?>
                              <form method="POST">
                                       <table class="data table table-striped no-margin" >
                                         <thead>
                                             <tr>
                                                 <th>Charity ID</td>
                                                <th>Logo</th>
                                                <th>Name</th>
                                                <th>WebsiteUrl</th>
                                                <th >Description </th>
                                               
                                             </tr>
                                          </thead>
                                          <tbody>
                                 <?php
                                    // get all customers
                                    $sql = "select * from Charity";
                                    $result = mysqli_query($conn,$sql);
                                    while($rc = mysqli_fetch_assoc($result)){
                                       echo '<tr><td>'.$rc['CharityID'].'</td>';
                                       echo '<td><img src="CharityLogo/'.$rc["Logo"].'"style="width:120px;height:200px"></td>';
                                       echo '<td>'.$rc["Name"].'</td>';
                                       echo '<td>'.$rc["WebsiteUrl"].'</td>';
                                       echo '<td>'.$rc["Description"].'</td></tr>';
                                          
                                    }
                                 ?>
                                          </tbody>
                                       </table>
                                 
                              </form>
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
         window.location.href = "./Admin_Charity.php"
      }    
   </script>
   <!--Set Photo Format-->
   <script>  
    $(document).ready(function(){  
         $('#insert').click(function(){  
              var image_name = $('#image').val();  
              if(image_name == '')  
              {  
                   alert("Please Select Image");  
                   return false;  
              }  
              else  
              {  
                   var extension = $('#image').val().split('.').pop().toLowerCase();  
                   if(jQuery.inArray(extension, ['gif','png','jpg','jpeg']) == -1)  
                   {  
                        alert('Invalid Image File');  
                        $('#image').val('');  
                        return false;  
                   }  
              }  
         });  
    });  
    </script>  
   </body>
</html>
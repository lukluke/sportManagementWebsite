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
   if($_SESSION['usertype'] != "Member"){
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
   $sql = "SELECT * FROM Runner where RunnerID='$username'";

   $action ="login";
   


   $result = mysqli_query($conn,$sql);
   $result = mysqli_fetch_assoc($result);
   $RunnerID =$result['RunnerID']; 
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
                             <li><a href ="Runner_Profile.php"><i class="fa fa-hospital-o" ></i> Profile<span class="fa fa-chevron"></span></a>
                           </li>
                           <li><a href="Runner_RegisteredEvent.php"><i class="fa fa-street-view"></i> Event Register<span class="fa fa-chevron"></span></a>
                           </li>
                           <li><a href="Runner_DeleteEvent.php"><i class="fa fa-hand-paper-o"></i>Delete Register<span class="fa fa-chevron"></span></a>
                           </li>
                           <li><a href="Runner_Payment.php"><i class="fa fa-heart"></i>View Event & Payment<span class="fa fa-chevron"></span></a>
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
                           <b><?php echo "Runner :"." ".$result['FirstName']." ".$result['LastName']; ?></b> <!--get Name-->
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
                                 <h3>Your Profile</h3>
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
                               $sql = "select * from Runner where RunnerID = $RunnerID";
                               
                               $result = mysqli_query($conn,$sql);
                               $result1 = mysqli_query($conn,$sql);
                               $result1 =mysqli_fetch_assoc($result1);

                               while ($rc = mysqli_fetch_assoc($result)) {
                                  $sex = $rc['Gender'];

                                  if($sex =="M"){
                                    $maleChecked ="checked";
                                    $femaleChecked =" ";
                                  }else{
                                    $maleChecked =" ";
                                    $femaleChecked ="checked";
                                  }
                                 # code...
                               }

                           ?>
                              <!--Concel Sponship!!!-->     
                    <!-- Form Start -->
                    <form id="demo-form2" method="post"  class="form-horizontal form-label-left" action ="Runner_Profile.php" enctype="multipart/form-data">
               
   

            <div class="form-group">



                        <label class="control-label col-md-3 col-sm-3 col-xs-12"></label>
                        <div class="col-md-2 col-sm-6 col-xs-12">
                       <?php  if($result1["ProfilePicture"] != null){
                                     echo '<td><img src="uploadedPicture/'.$result1["ProfilePicture"].'"style="width:150px;height:150px"></td>';
                               }else{
                                    echo '<td><img src="uploadedPicture/null1.png"style="width:150px;height:150px"></td>';
                          }?>
                            
                        </div>
                            <div class="col-md-2">
                                                <div class="form-group"></br>
                                                  
                                                   <input type="file" name="file_img" id="image"  />
                                                </div>
                                             </div>
                      </div>
                      <div class="form-group">
                        <label for="first-name" class="control-label col-md-3 col-sm-3 col-xs-12" >RunnerID
                        </label>
                        <div class="col-md-3 col-sm-6 col-xs-12">
                        
                          <input type="text" id="first-name" name="FirstName" value="<?php echo  $RunnerID ?>" pattern="[A-Za-z]+$" readonly class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      
                      <div class="form-group">
                        <label for="first-name" class="control-label col-md-3 col-sm-3 col-xs-12" >First Name 
                        </label>
                        <div class="col-md-3 col-sm-6 col-xs-12">
                          <input type="text" id="first-name" name="FirstName" value="<?php echo  $result1['FirstName']; ?>" pattern="[A-Za-z]+$" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="last-name" class="control-label col-md-3 col-sm-3 col-xs-12" >Last Name 
                        </label>
                        <div class="col-md-3 col-sm-6 col-xs-12">
                          <input type="text" id="last-name" name="LastName" value="<?php echo $result1['LastName']; ?>" pattern="[A-Za-z]+$" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="Email" class="control-label col-md-3 col-sm-3 col-xs-12">Gender</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          
                         <input type="radio"  name="Gender<?php echo $rc['RunnerID'] ?>" value ="M"<?php echo $maleChecked;?>>  Male   
                           <input type="radio"  name="Gender<?php echo $rc['RunnerID'] ?>" value ="F"<?php echo $femaleChecked;?>>Female</label>
                        

                        </div>
                      </div>
                      <div class="form-group">
                        <label for="Email" class="control-label col-md-3 col-sm-3 col-xs-12">DateOFBirth</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="Date" id="DateOfBirth" name="DateOfBirth"  max="1999-12-31" min="1900-01-01" value="<?php echo $result1['DateOfBirth'];?>"   class="form-control col-md-7 col-xs-12"   >
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="Email" class="control-label col-md-3 col-sm-3 col-xs-12">E-mail</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="email" id="Email" name="Email" value="<?php echo $result1['Email'];?>"   class="form-control col-md-7 col-xs-12"   >
                        </div>
                      </div>
            <div class="form-group"> 
                        <label for="Company" class="control-label col-md-3 col-sm-3 col-xs-12">Country</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                         <select name="Country" class="form-control"  value ="<?php echo $result1['Country'];?>">
                               <optgroup label="Country">
                               <?php
                               	echo '<option value="'.$result1['Country'].'">'.$result1['Country'].'</option>';
								?>
                                  <option value="Andorra">Andorra</option>
                                  <option value="Argentina">Argentina</option>
                                  <option value="Australia">Australia</option>
                                  <option value="Austria">Austria</option>
                                  <option value="Belgium">Belgium</option>
                                  <option value="Botswana">Botswana</option>
                                  <option value="Brazil">Brazil</option>
                                  <option value="Bulgaria">Bulgaria</option>
                                  
                                  <option value="Canada">Canada</option>
                                  <option value="Chile">Chile</option>
                                  <option value="China">China</option>
                              
                                  <option value="Cameroon">Cameroon</option>
                                  <option value="Colombia">Colombia</option>
                                  <option value="Croatia">Croatia</option>
                                  <option value="Czech Republic">Czech Republic</option>
								  <option value="Denmark">Denmark</option>
								  <option value="Dominican Republic">Dominican Republic</option>
								  <option value="Ecuador">Ecuador</option>
								  <option value="Egypt">Egypt</option>
                                  
                           </optgroup>
                          </select>
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
                          <input id="newPwd" name="Password"  class="form-control col-md-7 col-xs-12" type="text" 
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
                                 <button type="reset" class="btn btn-info btn-fill pull-right" name="">Reset Password</button>
                             <button type="submit" class="btn btn-info btn-fill pull-right" id ="insert" name="btn_pwd">Edit Profile</button>
                    
                      </div>
                        
                    </div>


                    </from>
                
                  <?php 
                              
                      if(isset($_POST['btn_pwd'])){
						  
                             extract($_POST);
							  
                              $sql = "select * from Runner where RunnerID = $RunnerID";
                              $result = mysqli_query($conn,$sql);
                              $result = mysqli_fetch_assoc($result);
                              $filename = $result["ProfilePicture"];
                              $filepath = "uploadedPicture/".$filename;
                              //echo $_FILES["file_img"]["tmp_name"];                    
                              

                              if(!empty($_FILES['file_img']['tmp_name'])) 
                              {
                               
                           

                              
                                // Check if image file is a actual image or fake image
                               $uploadOk = 1;
                              //Photo
                                  $filetmp = $_FILES["file_img"]["tmp_name"];
                                 $filename = $_FILES["file_img"]["name"];
                                 $filetype = $_FILES["file_img"]["type"];
                                $filepath = "uploadedPicture/".$filename;
                                 $imageFileType = pathinfo($filepath,PATHINFO_EXTENSION);
                              
                               
                                // Check file size
                                if ($_FILES["file_img"]["size"] > 500000000000) { //500KB
                                  echo "<script>alert('Sorry, your file is too large.')</script>";
                                   $uploadOk = 0;
                                }
                                // Allow certain file formats
                                if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                                    && $imageFileType != "gif" ) {
                                        echo "<script>alert('Sorry, only JPG, JPEG, PNG & GIF files are allowed.')</script>";
                                        $uploadOk = 0;
                                }
                                 if ($uploadOk == 0) {
                                    echo "<script>alert('Sorry, Can not uploaded.')</script>";
                                }else { //!!!
                                        if($oldpwd !=null && $uploadOk = 1){  ////
                                          if($result['Password'] == $oldpwd){
                                              
                                                echo $oldpwd;
                                                if($Password == $renewpwd){
                                                    $md5Pwd = md5($Password);

                                                          $sql = "update Runner set Password ='$Password' , FirstName = '$FirstName', LastName = '$LastName',Gender ='$Gender', DateOfBirth = '$DateOfBirth',Email = '$Email' ,Country ='$Country',ProfilePicture = '".$_FILES["file_img"]["name"]."' where RunnerID = '$RunnerID'"; // update customer information
                                                     //$sql = "update Sponsor set Password ='123' where SponsorID = '$SID'"; // update customer information
                                                           $result = mysqli_query($conn,$sql);


                                                       
                                                     echo $sql;
                                                     echo $result;
                                                     if (move_uploaded_file($filetmp,$filepath)){
                                                         if(mysqli_affected_rows($conn) == 1){
                                                            echo "<script>alert('Edit successful')</script>";
                                                            echo "<script>window.location.href = \"./Runner_Profile.php\"</script>"; // redirect to admin.php
                                                         }else{
                                                            echo "<script>alert('Failed to uodate the information or the information has no any modification!')</script>";
                                                         }
                                                    }else{
                                                      echo "<script>alert('Failed to Edit!')</script>";
                                                    }

                                                }else{
                                                    echo "<script>alert('New Passward and Re-New Passward is not maatch!')</script>"; 
                                                }      
                                          }else{
                                            echo "<script>alert(' Old Passward is not cprrect')</script>"; 
                                          }
                                    }else {
                                          
                                             
                                                  
                                              
                                             
                                         $sql = "update Runner set FirstName = '$FirstName', LastName = '$LastName', Gender = '$Gender',DateOfBirth = '$DateOfBirth',Email = '$Email' ,Country ='$Country',ProfilePicture = '".$_FILES["file_img"]["name"]."'  where RunnerID = '$RunnerID'"; 
                                          //$sql = "insert into Runner values ('1002','null','$FirstName','$LastName','$Gender','$DateOfBirth','$Email','China','".$_FILES["file_img"]["name"]."')";
                                          mysqli_query($conn,$sql);
                                      
                                        
                                               
                                          
                                                     echo $sql;
                                                

                                                      
                                               if (move_uploaded_file($filetmp,$filepath)){
                                                       if(mysqli_affected_rows($conn) == 1){

                                                       
                                                          echo "<script>alert('Edit successful')</script>";
                                                          echo "<script>window.location.href = \"./Runner_Profile.php\"</script>"; // redirect to admin.php
                                                       }else{
                                                          echo "<script>alert('Upload photo sucessful')</script>";
                                                       }
                                                     }else{
                                                        echo "<script>alert('Failed to Edit!')</script>";
                                                     }
                                         
                                    }///

                                   

                               }///!!!
                              }else{
                                    if($oldpwd !=null && $uploadOk = 1){  
                                          if($result['Password'] == $oldpwd){
                                                $oldpwd =1 ;
                                                echo $oldpwd;
                                                if($Password == $renewpwd){
                                                    $md5Pwd = md5($Password);
                                                     $sql = "update Runner set Password ='$Password' , FirstName = '$FirstName', LastName = '$LastName',Gender ='$Gender', DateOfBirth = '$DateOfBirth',Email = '$Email',Country ='$Country' where RunnerID = '$RunnerID'"; // update customer information
                                                     //$sql = "update Sponsor set Password ='123' where SponsorID = '$SID'"; // update customer information
                                                     $result = mysqli_query($conn,$sql);
                                                     echo $sql;

                                                     echo $result;

                                                     if(mysqli_affected_rows($conn) == 1){
                                                        echo "<script>alert('Edit successful')</script>";
                                                        echo "<script>window.location.href = \"./Runner_Profile.php\"</script>"; // redirect to admin.php
                                                     }else{
                                                        echo "<script>alert('Failed to uodate the information or the information has no any modification!')</script>";
                                                     }

                                                }else{
                                                    echo "<script>alert('New Passward and Re-New Passward is not maatch!')</script>"; 
                                                }      
                                          }else{
                                            echo "<script>alert(' Old Passward is not cprrect')</script>"; 
                                          }
                                    }else {
                                       
                                          $sql = "update Runner set FirstName = '$FirstName', LastName = '$LastName', Gender = '$Gender',DateOfBirth = '$DateOfBirth',Email = '$Email',Country ='$Country' where RunnerID = '$RunnerID'"; 
                                          $result = mysqli_query($conn,$sql);
                                                     echo $sql;
                                                     echo $result;
                                                     echo"1";
                                                     if(mysqli_affected_rows($conn) == 1){
                                                        echo "<script>alert('Edit successful')</script>";
                                                        echo "<script>window.location.href = \"./Runner_Profile.php\"</script>"; // redirect to admin.php
                                                     }else{
                                                        echo "<script>alert('Failed to uodate the information or the information has no any modification!')</script>";
                                                     }
                                         
                                    }///  
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
         window.location.href = "./Admin_Runner.php"
      }    
   </script>
   <script>  
   
    </script>  
   </body>
</html>
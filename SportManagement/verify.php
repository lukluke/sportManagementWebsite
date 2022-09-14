<?php
   session_start();
   include('conn.php');
   if(isset($_POST['login'])){
      $username = mysqli_real_escape_string($conn,$_POST['username']);
      $password = mysqli_real_escape_string($conn,$_POST['password']);
      $password = md5($password);
      $sql = "SELECT * FROM Runner where RunnerID='$username' and Password='$password'";
      $result = mysqli_query($conn,$sql);
      if(mysqli_num_rows($result)>0){    
         $_SESSION['username'] = $username;
         $_SESSION['password'] = $password;
         $_SESSION['usertype'] = 'Member';
         header("Location: Runner_RegisteredEvent.php");
         die();
      }else{
         header("Location: index.php"); //login
      }
  
      $sql = "SELECT * FROM Sponsor where SponsorID='$username' and Password='$password'";
      $result = mysqli_query($conn,$sql);
      if(mysqli_num_rows($result)>0){    
         $_SESSION['username'] = $username;
         $_SESSION['password'] = $password;
         $_SESSION['usertype'] = 'Sponsor';
         header("Location: Sponsor_update.php");
         die();
      }else{
         header("Location: index.php");
      }
      $username1 = $_POST['username'];
	  $password1 = $_POST['password'];

      $sql = "SELECT * FROM Administrator where AdministratorID='$username1' and Password='$password1'";
      $result = mysqli_query($conn,$sql);
      if(mysqli_num_rows($result)>0){    
         $_SESSION['username'] = $username;
         $_SESSION['password'] = $password;
         $_SESSION['usertype'] = 'Administrator';
         header("Location: Admin_Event.php");
         die();
      }else{
      
         header("Location: index.php");
      }
    
      $sql = "SELECT * FROM Volunteer where VolunteerID='$username' and Password='$password'";
      $result = mysqli_query($conn,$sql);
      if(mysqli_num_rows($result)>0){    
         $_SESSION['username'] = $username;
         $_SESSION['password'] = $password;
         $_SESSION['usertype'] = 'Volunteer';
         header("Location: Volunteer_checkIn.php");
         die();
      }else{
         header("Location: index.php");
      }
      mysqli_close($conn);
   }else{
      header("Location: index.php");
   }
?>
<?php
session_start();
include('conn.php');
if(isset($_POST)){
	extract($_POST);
	
	/*if($daydiff <= 0){
		echo "<script>alert('Sorry, the minimum reservation night is 1 night!')</script>";
		exit;
	}else if($daydiff > 28){
		echo "<script>alert('Sorry, the maximum reservation night is 28 night!')</script>";
		exit;
	}
	// optional field
	if($minPrice != "" and $maxPrice != ""){
		$query = "and r.Price between $minPrice and $maxPrice";
	}else{
		$query = "";
	}*/
	// find overlapping date
	 $sql = "select e.Name,e.EventID,e.Distance,e.DateOfEvent,r.FirstName,r.LastName,r.RunnerID,r.Gender,r.ProfilePicture,er.*
                                           from Event e ,Runner r ,EventRegister er where er.RunnerID = r.RunnerID and e.EventID = er.EventID order by er.RegID ASC";
	$result = mysqli_query($conn,$sql);
	// find all hotels which matches the condition
	

?>
<table class="data table table-striped no-margin">
     <thead>
         <tr>
             <th > RegID</th>                                  
              <th>Runner ID</td>                                    
              <th>Runner Picture</td>                                  
              <th>Runner Name</td>                              
              <th>Event Name</th>                                  
              <th>Distance</th>                             
              <th>CheckInTime</th>                        
              <th>TopSpeed</th>                                 
               <th>FinishTime</th>                               
               <th>Action</th>                               
       </tr>
    </thead>                              
                                            
  <tbody>
	<?php 
		$result = mysqli_query($conn,$sql);
             while($rc = mysqli_fetch_assoc($result)){
                  date_default_timezone_set('Asia/Hong_Kong'); // get HONG KONG Time                  
                  $today = date("Y-m-d"); //get today time                   
                  if($rc['DateOfEvent'] <= $today){                
                        echo "<tr>                     
                        <td>{$rc['RegID']}</td>
                        <td>{$rc['RunnerID']}</td>";
                        if($rc["ProfilePicture"] != null){
                        	echo '<td><img src="RunnerPicture/'.$rc["ProfilePicture"].'"style="width:100px;height:100px"></td>';
                        }else{
                            echo '<td><img src="RunnerPicture/null.png"style="width:100px;height:100px"></td>';
                        }
                        echo "<td>{$rc['FirstName']} {$rc['LastName']}</td>
                         <td>{$rc['Name']}</td>
                         <td>{$rc['Distance']}KM</td>
                         <td>{$rc['CheckInTime']}</td>
                         <td>{$rc['TopSpeed']}</td>
                         <td>{$rc['FinishTime']}</td>
                                               
                         <td><a href=\"Volunteer_view_Update.php?action=update&RegID={$rc['RegID']}&id={$rc['RunnerID']}\">Update Event recode</a></td>
                          </tr>"
                          ;                 
        }
	?>
  </tbody>
</table>
<?php 
} 
?>
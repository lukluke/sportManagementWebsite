<html>
<body>
<?php
//fetch.php
$connect = mysqli_connect("localhost", "root", "", "projectDB");
$output = '';
if(isset($_POST["query"]))
{
 $search = mysqli_real_escape_string($connect, $_POST["query"]);
 $query = "
  select e.Name,e.EventID,e.Distance,e.DateOfEvent,r.FirstName,r.LastName,r.RunnerID,r.Gender,r.Country,r.ProfilePicture,er.*
  from Event e ,Runner r ,EventRegister er 
  where er.RunnerID = r.RunnerID and e.EventID = er.EventID and
  r.RunnerID LIKE '%".$search."%' or r.FirstName LIKE '%".$search."%' && r.LastName LIKE '%".$search."%' 
  order by er.RegID ASC

 ";
}
else
{
 $query = "
  select e.Name,e.EventID,e.Distance,e.DateOfEvent,r.FirstName,r.LastName,r.RunnerID,r.Gender,r.Country,r.ProfilePicture,er.*
  from Event e ,Runner r ,EventRegister er 
  where er.RunnerID = r.RunnerID and e.EventID = er.EventID 
  order by er.RegID ASC
 ";
}
$result = mysqli_query($connect, $query);
date_default_timezone_set('Asia/Hong_Kong'); // get HONG KONG Time
$today = date("Y-m-d"); //get today time
$time = date("H-i");

?>


 
  <div class="table-responsive">
   <table class="table table bordered">
    <tr>
     <th>Runner ID</th>
    <th>Runner Picture</th>
     <th>Runner Name</th>
     <th>Gender</th>
     <th>Country</th>
     <th>Evnet</th>
     <th>Distance</th>
      <th>Action</th>
    </tr>

<?php
if(mysqli_num_rows($result) > 0)
{
 
 while($row = mysqli_fetch_array($result))
 {
  if($row['DateOfEvent'] == $today){

  $output .= "
   <tr>
    <td>{$row["RunnerID"]}</td>";
     if($row["ProfilePicture"] != null){
        $output .='<td><img src="uploadedPicture/'.$row["ProfilePicture"].'"style="width:100px;height:100px"></td>';
     }else{
        $output .='<td><img src="uploadedPicture/null.png"style="width:100px;height:100px"></td>';
    }
    $output .="<td>{$row["FirstName"]} {$row["LastName"]}</td>
    <td>{$row["Gender"]} </td>
    <td>{$row["Country"]} </td>
     <td>{$row["Name"]} </td>
     <td>{$row["Distance"]} </td>";

   $output .=' <td><a href="Volunteer_CheckInRunner.php?EventID='.$row['EventID'].'&RunnerID='.$row['RunnerID'].'">Check-in </a></td></tr>
   </tr>
  ';
 }


}

}
else
{
 echo 'Data Not Found';
}
 echo $output;
?>
 </body>
</html>
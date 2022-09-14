<?php
//fetch.php
$connect = mysqli_connect("localhost", "root", "", "projectDB");
$output = '';
if(isset($_POST["query"]))
{
 $search = mysqli_real_escape_string($connect, $_POST["query"]);
 $query = "
  SELECT * FROM Event 
  WHERE Name LIKE '%".$search."%'
   OR EventID LIKE '%".$search."%'
 ";
}
else
{
 $query = "
  SELECT * FROM Event ORDER BY Name
 ";
}
$result = mysqli_query($connect, $query);
if(mysqli_num_rows($result) > 0)
{
 $output .= '
  <div class="table-responsive">
   <table class="table table bordered">
    <tr>
     <th>Evnet ID</th>
     <th>Evnet Name</th>
     <th>Distance</th>
      <th>Action</th>
    </tr>
 ';
 while($row = mysqli_fetch_array($result))
 {
  $EventID = $row['EventID'];

  $output .= "
   <tr>
    <td>{$row["EventID"]}</td>
    <td>{$row["Name"]}</td>
    <td>{$row["Distance"]} km</td>";
   $output .=' <td><a href="RaceKit.php?EventID='.$row['EventID'].'&Name='.$row['Name'].'">Select</a></td></tr>
   </tr>
  ';
 }
 echo $output;
}
else
{
 echo 'Data Not Found';
}

?>
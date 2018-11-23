<?php 
 $conn = mysqli_connect("localhost","root","","dpbodega") or die("Couldn't connect");
 $conn->query("SET NAMES 'utf8'");
$string = "SELECT Pos,Nombres FROM ejecutivos ORDER BY Nombres;";
$query = mysqli_query($conn,$string);
 while($row = $query->fetch_assoc()) {
         $myArray[] = $row;
  }
echo json_encode($myArray);
?>
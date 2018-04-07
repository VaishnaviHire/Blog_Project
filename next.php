<?php

$con=mysqli_connect("localhost","root","","pmvh");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

$result=mysqli_query($con,"SELECT * FROM test1");
while($row=mysqli_fetch_array($result))
     echo $row['usernamesignup']." | ",$row['emailsignup'] ."  | ",$row['passwordsignup'] ."<br>";

mysqli_close($con);

?>
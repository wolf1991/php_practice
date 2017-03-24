<?php
  // $servername='localhost'; 
  // $username='cs641'; 
  // $password='Spring@2017'; 
  // $dbname='mydatabase'; 

  // $conn= mysqli_connect($servername,$username, $password,$dbname) OR DIE ('Unable to connect to database! Please try again later.'); 
  // $rs = @mysqli_select_db($conn, $dbname);
  // if (!$conn){
  //   die('Could not connect: ' . mysqli_error());
  // }
?>

<?php
  $servername='localhost'; 
  $username='root'; 
  $password=''; 
  $dbname='mydatabase'; 

  $conn= mysqli_connect($servername,$username, $password,$dbname) OR DIE ('Unable to connect to database! Please try again later.'); 
  $rs = @mysqli_select_db($conn, $dbname);
  if (!$conn){
    die('Could not connect: ' . mysqli_error());
  }
?>
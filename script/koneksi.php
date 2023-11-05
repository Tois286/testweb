<?php 
  $username = "root";
  $host="localhost";
  $pas="";
  $db="pilkar";
  $conn = mysqli_connect($host, $username, $pas, $db);
  if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }
?>
<?php
    

    //CONNECT TO MYSQL DATABASE USING MYSQLI

// Create connection
$conn = mysqli_connect("localhost","root","", "you");

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
// echo "Connected successfully";
    
?>
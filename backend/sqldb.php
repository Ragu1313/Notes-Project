<?php

$servername ="localhost";
$username = "root";
$password = "@Ragu2004";

$conn =   mysqli_connect('localhost','root',$password);

$Sqldb = "CREATE DATABASE notesdb ";
if($conn->query($Sqldb)===TRUE){
  echo" database created";
}
else{
    echo"ERROR IN DATABASE";
}

?>
<?php
$servername ="localhost";
$username = "root";
$password = "@Ragu2004";
$dbname = "notesdb";

$conn =   mysqli_connect('localhost','root',$password,$dbname);

$SQL="CREATE TABLE Notes_Datas(
    id int AUTO_INCREMENT PRIMARY KEY,
    filename varchar(250) NOT NULL,
    folder_path varchar(250) NOT NULL,
    time_stamp TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP);";
$sqltable = mysqli_query($conn,$SQL);
if($sqltable){
    echo"table created";
}
else{
    echo"Error to create a table";
}
?>


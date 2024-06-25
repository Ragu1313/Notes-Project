<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "@Ragu2004";
$dbname = "notesdb";
$conn = new mysqli($servername, $username, $password, $dbname);

if(isset($_POST['submit'])){

    $username = $_POST['username'];
    $problem = $_POST['feedback'];
    $subject = $_POST['subject'];

    $qry = "insert into contact(username,problem,sub) values('$username','$problem','$subject');";

    if($conn->query($qry)===true){
    echo 'Thank You for Contact Us';

    header("Location: link.php");
    exit();
}

}
// // Redirect user to a thank you page
// 
?>
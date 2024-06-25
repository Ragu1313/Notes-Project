<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "@Ragu2004";
$dbname = "notesdb";
$conn =   mysqli_connect('localhost', 'root', $password, $dbname);

 
if (isset($_POST['submit'])) {
    $targetDir = "uploads/";
    $targetFile = $targetDir . $_POST['Select_regulation'] . $_POST['Select_dept'] . '/' . $_POST['Select_Sem'] . '/' . $_POST['Select_Subject'] . '/';
    $_SESSION['Select_regulation']=$_POST['Select_regulation'] ;
    $_SESSION['Select_dept']=$_POST['Select_dept'] ;
    $_SESSION['Select_Sem']=$_POST['Select_Sem'] ;
    $_SESSION['Select_Subject'] =$_POST['Select_Subject'] ;

    header("Location: admindelete.php");
exit;
}
?>

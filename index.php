<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "@Ragu2004";
$dbname = "notesdb";

$conn =   mysqli_connect('localhost', 'root', $password, $dbname);

$regulation = $_SESSION['Select_regulation'];
$department = $_SESSION['Select_dept'];
$semester = $_SESSION['Select_Sem'];
$subject = $_SESSION['Select_Subject'];
if (isset($_POST['submit'])) {
    $targetDir = "uploads/";
    $targetFile = $targetDir .$regulation.'/'.$department . '/' .$semester. '/' .$subject. '/'
        . $_POST['Select_choice'] . '/' . $_FILES['files']['name'];
    
    $fileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
    if ($fileType != 'pdf' || $_FILES['files']['size'] > 10000000) {
        echo "Error : Only Pdf files lessthan 2 mb is allowed";
    } else {
        if (move_uploaded_file($_FILES['files']['tmp_name'], $targetFile)) {
            $filename = $_FILES['files']['name'];
            $folder_path = $targetFile;
            $time_stamp = date("Y-m-d H:i:s");
            $sql = "INSERT INTO pdffiles (filename,folder_path,time_stamp) VALUES('$filename','$folder_path','$time_stamp')";

            if ($conn->query($sql) === TRUE) {
                header("Location: index.html");
           }else{
            header("Location:error.html");
           }
    }

}
}//  $conn->close();
?>
   
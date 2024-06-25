
<?php
$con = mysqli_connect("localhost", "root", "@Ragu2004", "notesdb");

if (isset($_POST['submit'])) {
  $email = $_POST["email_id"];
  $password = $_POST["password"];

  if (mysqli_connect_error()) {
    die('Connect Error (' . mysqli_connect_errno() . ') '
      . mysqli_connect_error());
  } else {
    $sql1 = "SELECT * FROM logintable WHERE email_id='$email' AND psw='$password';";
    $result1 = mysqli_query($con, $sql1);
    $resultcheck1 = mysqli_num_rows($result1);
    
    $sql2 = "SELECT * FROM studentlogin WHERE email_id='$email' AND psw='$password' ;";
    $result2 = mysqli_query($con, $sql2);
    $resultcheck2 = mysqli_num_rows($result2);

    if ($resultcheck1 > 0) {
      header("Location:adminselect.html");//need to change
    }
    else if($resultcheck2>0){
      header("Location:select.php");
    }
     else {
      echo "mismatch username/password";
    }
  
  }
}




?>
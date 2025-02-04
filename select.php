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
    header("Location:link.php");
exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reselect</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        .text {
            font-size: 20px;
            opacity: 0.7;
            font-weight: 900;
        }

        .container-fluid {
            font-family:  new;
            font-weight: 400;
        }

        .title {
            font-size: 24px;
            font-weight: 700;
        }

        body {
            background-color: #f0f7ff;
        }
    </style>

</head>

<body>

    <div class="container-fluid text-black">
        <div class="row justify-content-center">
            <div class="col-lg-10 col-sm-12 p-2 text-center">
                <img src="LogoR.png" class="img-fluid" alt="Responsive Image">
                <div class="mt-3"> <!-- Add margin to separate the image and the select box -->
                    <div class="title">KCE NOTES</div>
                    <br><br>
                    <form method="post">
                        <p class="text"> Select Your Regulation </p>
                        <select class="form-select form-select-lg mb-2" id="Select_regulation" name="Select_regulation" onchange="Populate()" required>
                            <option></option>
                            <option value="2021">2021</option>
                            <option value="2023">2023</option>
                            <!-- <option>2025</option> -->
                        </select>
                        <p class="text">Select Your Department </p>
                        <select class="form-select form-select-lg mb-3" id="Select_dept" name="Select_dept" onchange="Populate()" required>
                            <option></option>
                            <option value="CSE">CSE</option>
                            <option value="IT">IT</option>
                            <option value="AIDS">AIDS</option>
                            <option value="CST">CST</option>
                            <option value="CSD">CSD</option>
                            <option value="EEE">EEE</option>
                            <option value="ECE">ECE</option>
                            <option value="CIVIL">CIVIL</option>
                            <option value="MECH">MECH</option>
                            <option value="ETE">ETE</option>
                            <option value="CY">CYBER SECURITY</option>
                        </select>
                        <p class="text"> Select Your Semester</p>
                        <select class="form-select form-select-lg mb-2" id="Select_Sem" name="Select_Sem" onchange="Populate()" required>
                            <option></option>
                            <option value="SEM1">Semester 1</option>
                            <option value="SEM2">Semester 2</option>
                            <option value="SEM3">Semester 3</option>
                            <option value="SEM4">Semester 4</option>
                            <option value="SEM5">Semester 5</option>
                            <option value="SEM6">Semester 6</option>
                            <option value="SEM7">Semester 7</option>
                            <option value="SEM8">Semester 8</option>

                        </select>
                        <p class="text"> Select Your Subject </p>
                        <select class="form-select form-select-lg mb-2" id="Select_Subject" name="Select_Subject" required>
                            <!-- <option>Select--Regulation</option> -->
                            <!-- <option>CCN</option>
                        <option>PLD</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option> -->
                        </select>
                        <!-- <p class="text">Select Module </p>
                        <select class="form-select form-select-lg mb-3" id="Select_mod" name="Select_mod" >
                            <option></option>
                            <option value="CSE">MODULE I</option>
                            <option value="IT">MODULE II</option>
                            <option value="AIDS">MODULE III</option>
                        </select> -->
                       <!-- <input type="submit" value="Submit" class="btn" name="submit"> -->
                       <button type="submit" name="submit">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="select.js"></script>
</body>

</html>

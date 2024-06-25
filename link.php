<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "@Ragu2004";
$dbname = "notesdb";
$conn = new mysqli($servername, $username, $password, $dbname);
$subject = $_SESSION['Select_Subject'];
$targetDir;
$result;
$targetFile;
if (isset($_POST['submit']) && !isset($_SESSION['form_submitted'])) {
    $targetDir = "uploads/";
    $targetFile =  $targetDir . $_SESSION['Select_regulation'] . '/' . $_SESSION['Select_dept'] . '/' .  $_SESSION['Select_Sem'] . '/' .
        $_SESSION['Select_Subject'] . '/' . $_POST['Select_Choice'] . '/';
    // echo $targetFile;
    if ($conn->connect_error) {
        die("Connection Failed");
    }
    $sql = "SELECT * FROM pdffiles where folder_path LIKE '$targetFile%'";
    $result = $conn->query($sql);
    $conn->close();
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>show</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        .container-fluid {
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
        }

        .title {
            font-size: 24px;
            font-weight: 700;
        }

        body {
            background-color: #f0f7ff;
        }

        .navbar-nav {
            display: flex;
            justify-content: space-around;
        }

        * {
            box-sizing: border-box
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
        }

        .navbar {
            width: 100%;
            background-color: 	#aad6ec;
            overflow: auto;
        }

        .navbar a {
            float:left;
            padding: 12px;
            color: black;
            text-decoration: none;
            font-size: 17px;
            width: 25%;
            text-align: center;
        }

        .navbar a:hover {
            background-color:lightblue;
            color: #f0f7ff;
        } 
        #Select_Choice{
            text-align: center; 
          
        }
        /* @media screen and (max-width: 500px) {
            .navbar a {
                float: none;
                display: block;
                width: 100%;
                text-align: left;
            }
        } */
    </style>
</head>

<body>
        <div class="container-fluid text-black">
            <div class="row justify-content-center">
                <div class="col-lg-10 col-sm-12 p-2 text-center">
                    <img src="LogoR.png" class="img-fluid" alt="Responsive Image">
                    <div class="mt-3"> <!-- Add margin to separate the image and the select box -->
                        <div class="title">
                            <h1>KCE NOTES</h1>
                        </div>
                        <br><br>
                        <div class="navbar">
                            <a href="select.php"><i class="fa fa-fw fa-home"></i> Home</a>
                            <a href="contact.html"><i class="fa fa-fw fa-envelope"></i> Contact</a>
                            <a href="login.html"><i class="fa fa-fw fa-user"></i> Logout</a>
                        </div>
                        <br><br>
                        <form action="link.php" method="post">
                            <select class="form-select form-select-lg mb-2" id="Select_Choice" name="Select_Choice" onchange="Populate()" required>
                                <option >-----SELECT--YOUR--OPTION-----</option>
                                <option value="PDF">PDF</option>
                                
                                <option value="HWN">Hand Written Notes</option>
                                <option value="QBANK">Question bank</option>
                                <option value="LINK">Answer Key</option>
                            </select>
                            <br>
                            <input type="submit" name="submit" value="Click here" id="submitBtn">
                        </form>
                        <br>
                        <div class="container">
                            <h1><?php echo $subject ?> Notes</h1>
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Module.No</th>
                                            <th>File Name</th>
                                            <th>Action</th>
                                            <th>View</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        if (isset($_POST['submit'])) {
                                            $count = 1;
                                            if ($result !== false && $result->num_rows > 0) {

                                                while ($row = $result->fetch_assoc()) {
                                                    echo "<tr>";
                                                    echo "<td>" . $count . "</td>";
                                                    echo "<td>" . $row['filename'] . "</td>"; //$row['filename']
                                                    //  echo  $targetFile . $row['filename'].'<br>' ;
                                                    $short = $targetFile . $row['filename'];
                                                    echo '<td><a href="' . $short .  '" class="btn btn-info" download>Download</a></td>';
                                                    echo '<td><a href="' . $short .  '" class="btn btn-info" target="_self">View</a></td>';
                                                   // echo '<td> <a href= "' . $targetFile . $row['filename'] . '" class=btn btn-info" target="_self">View</a></td>';
                                                    echo "<tr>";
                                                    $count++;
                                                }
                                            } else {
                                                echo "<tr><td colspan='3'>No Records Found.</td></tr>";
                                            }
                                            // } catch (Exception $ex){}
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <script>
                            document.getElementById('submitBtn').addEventListener('click', function() {
                                this.disabled = false;
                            });
                        </script>
    </body>
</html>
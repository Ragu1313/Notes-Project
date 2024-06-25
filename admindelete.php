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
global $targetFile;
    
$targetFile =" ";
 
if (isset($_POST['choiceSubmitted']) && !isset($_SESSION['form_submitted'])) {
    $targetDir = "uploads/";
    $targetFile =  $targetDir . $_SESSION['Select_regulation'] . '/' . $_SESSION['Select_dept'] . '/' .  $_SESSION['Select_Sem'] . '/' .
        $_SESSION['Select_Subject'] . '/' . $_POST['Select_Choice'] . '/';
    if ($conn->connect_error) {
        die("Connection Failed");
    }
    $sql = "SELECT * FROM pdffiles where folder_path LIKE '$targetFile%'";
    $result = $conn->query($sql);
    $conn->close();
}
else if(isset($_POST['deletepath'])){
    $targetFile = $_POST['deletepath'];
    // Retrieve the ID of the file based on its folder path
    echo $targetFile;
    $delqry = "SELECT id FROM pdffiles WHERE folder_path = '$targetFile'";
    $result = $conn->query($delqry);

    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $fileId = $row['id'];
            if (file_exists($targetFile)) {
               
                unlink($targetFile); 
                $delSql = "DELETE FROM pdffiles WHERE id = $fileId";
                if ($conn->query($delSql) === TRUE) {
                    
                echo "File deleted successfully.";
            } else {
                echo "File not found in folder.";
            }
        }else {
            echo "Error deleting file: " . $conn->error;
        }
    } else {
        echo "No file found with that path.";
    }
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
                            <a href="adminselect.html"><i class="fa fa-fw fa-home"></i> Home</a>
                            <a href="index.html"><i class="fa fa-fw fa-envelope"></i>Upload Files</a>
                            <a href="sample.php"><i class="fa fa-fw fa-envelope"></i>Problems</a>
                            <a href="login.html"><i class="fa fa-fw fa-user"></i> Logout</a>
                        </div>
                        <br><br>
                        <form action="admindelete.php" method="post">
                            <select class="form-select form-select-lg mb-2" id="Select_Choice" name="Select_Choice" onchange="Populate()" required>
                                <option >-----SELECT--YOUR--OPTION-----</option>
                                <option value="PDF">PDF</option>
                                
                                <option value="HWN">Hand Written Notes</option>
                                <option value="QBANK">Question bank</option>
                                <option value="LINK">Answer Key</option>
                            </select>
                            <br>
                            <input type="submit" name="choiceSubmitted" value="Click here" id="submitBtn" required>
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
                                        if (isset($_POST['choiceSubmitted'])) {
                                            $count = 1;
                                            if ($result !== false && $result->num_rows > 0) {

                                                while ($row = $result->fetch_assoc()) {
                                                    echo "<tr>";
                                                    echo "<td>" . $count . "</td>";
                                                    echo "<td>" . $row['filename'] . "</td>"; //$row['filename']
                                                    //  echo  '<br>' ;
                                                    $short = $targetFile . $row['filename'];
                                                    echo '<td><form action="admindelete.php" method="post">
                    <input type="hidden" name="deletepath" value="'.$targetFile . $row['filename'].'">
                    <input type="submit" value="Delete">
                </form></td>';
                                                  //  echo '<td><a href="' . $short .  '" class="btn btn-info" name="deletepath" >Delete</a></td>';
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
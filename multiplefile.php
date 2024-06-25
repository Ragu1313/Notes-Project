<?php
$servername = "localhost";
$username = "root";
$password = "@Ragu2004";
$dbname = "notesdb";


$conn =   mysqli_connect('localhost', 'root', $password, $dbname);

if (isset($_POST['submit'])) {
    $targetDir = "uploads/";
    $targetFile = $targetDir .$_POST['Select_regulation'] .'/'.$_POST['Select_dept'] . '/' . $_POST['Select_Sem'] . '/' . $_POST['Select_Subject'] . '/'
    . $_POST['Select_choice'] . '/' ;
    if (!file_exists($targetDir)) {
        mkdir($targetDir, 0755, true);
    }
    foreach ($_FILES["files"]["tmp_name"] as $key => $tmp_name) {
        $fileName = basename($_FILES["files"]["name"][$key]);
        echo$fileName;
        $targetFilePath = $targetFile.$fileName;

        // Check if file already exists
        if (file_exists($targetFilePath)) {
            echo "File {$fileName} already exists.<br>";
        } else {
           // Move the uploaded file to the target directory
            if (move_uploaded_file($tmp_name, $targetFilePath)) {
                
                $time_stamp = date("Y-m-d H:i:s");
                $sql = "INSERT INTO pdffiles (fileName,folder_path,time_stamp) VALUES('$fileName','$targetFilePath','$time_stamp')";
                if ($conn->query($sql) === TRUE) {
                    echo 'file uploaded successfully';
                } else {
                    echo "error " . $sql . "<br>" . $conn->error;
                }
            } else {
                echo "Error uploading file {$fileName}.<br>";
            }
        }
    }
    } else {
        $targetFile;
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
        .title {

            font-size: 20px;
            font-weight: 700;
        }

        body {
            background-color: #f0f7ff;
            font-family: serif;
        }
    </style>

</head>

<body>

    <div class="container-fluid text-black">
        <div class="row justify-content-center">
            <div class="col-lg-10 col-sm-12 p-2 text-center">
                <h1>Admin Page</h1>
                <div class="mt-3"> <!-- Add margin to separate the image and the select box -->
                    <div class="title">KCE NOTES</div>
                    <br><br>
                    <form  method="post" enctype="multipart/form-data">
                        <input type="file" class="form-select" id= "files" name="files[]" multiple="multiple" accept=".pdf">
                        <p class="text"> Select Your Regulation </p>
                        <select class="form-select form-select-lg mb-2" id="Select_regulation" name="Select_regulation" onchange="Populate()" required>
                            <option></option>
                            <option value="2021">2021</option>
                            <option value="2023">2023</option>
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
                        <p class="text"> Select Your Semester </p>
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
                           
                        </select>
                        <p class="text">Your option</p>
                        <select class="form-select form-select-lg mb-2" id="Select_choice" name="Select_choice" required>
                            <option></option>
                            <option value="pdf">PDF</option>
                            <option value="hwn">Hand Written Notes</option>
                            <option value="qbank">Question Bank</option>
                            <option value="link">Video Link</option>
                       
                        </select>
                        <br>
                       <button type="submit" name="submit">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
   
    <script>
        let contents = {
            2021: {
                CSE: {
                    SEM1: ['TE-1', 'M&C', 'ESE', 'PLD', 'CCN'],
                    SEM2: ['TE-2', 'VCIT', 'EP', 'ACP', 'FWS']
                },
                IT: {
                    SEM1: ['TE-1', 'M&C', 'ESE', 'PLD', 'CCN'],
                    SEM2: ['TE-2', 'VCIT', 'EP', 'ACP', 'FWS']
                },
                CST: {
                    SEM1: ['TE-1', 'M&C', 'ESE', 'PLD', 'CCN'],
                    SEM2: ['TE-2', 'VCIT', 'EP', 'ACP', 'FWS']
                },
                CSD: {
                    SEM1: ['TE-1', 'M&C', 'ESE', 'PLD', 'CCN'],
                    SEM2: ['TE-2', 'VCIT', 'EP', 'ACP', 'FWS']
                },
                CY: {
                    SEM1: ['TE-1', 'M&C', 'ESE', 'PLD', 'CCN'],
                    SEM2: ['TE-2', 'VCIT', 'EP', 'ACP', 'FWS']
                },
                AIDS: {
                    SEM1: ['TE-1', 'M&C', 'ESE', 'PLD', 'CCN'],
                    SEM2: ['TE-2', 'VCIT', 'EP', 'ACP', 'FWS']
                },
                CIVIL: {
                    SEM1: ['TE-1', 'M&C', 'ESE', 'PLD', 'CCN'],
                    SEM2: ['TE-2', 'VCIT', 'EP', 'ACP', 'FWS']
                },
                MECH: {
                    SEM1: ['TE-1', 'M&C', 'ESE', 'PLD', 'CCN'],
                    SEM2: ['TE-2', 'VCIT', 'EP', 'ACP', 'FWS']
                },
                ETE: {
                    SEM1: ['TE-1', 'M&C', 'ESE', 'PLD', 'CCN'],
                    SEM2: ['TE-2', 'VCIT', 'EP', 'ACP', 'FWS']
                },
                ECE: {
                    SEM1: ['TE-1', 'M&C', 'ESE', 'PLD', 'CCN'],
                    SEM2: ['TE-2', 'VCIT', 'EP', 'ACP', 'FWS']
                },
                EEE: {
                    SEM1: ['TE-1', 'M&C', 'ESE', 'PLD', 'CCN'],
                    SEM2: ['TE-2', 'VCIT', 'EP', 'ACP', 'FWS']
                }

            },
            2023: {
                CSE: {
                    SEM1: ['TE-2', 'M&C', 'ESE', 'PLD', 'CCN'],
                    SEM2: ['TE-2', 'VCIT', 'EP', 'ACP', 'FWS']
                },
                IT: {
                    SEM1: ['TE-1', 'M&C', 'ESE', 'PLD', 'CCN'],
                    SEM2: ['TE-2', 'VCIT', 'EP', 'ACP', 'FWS']
                },
                CST: {
                    SEM1: ['TE-1', 'M&C', 'ESE', 'PLD', 'CCN'],
                    SEM2: ['TE-2', 'VCIT', 'EP', 'ACP', 'FWS']
                },
                CSD: {
                    SEM1: ['TE-1', 'M&C', 'ESE', 'PLD', 'CCN'],
                    SEM2: ['TE-2', 'VCIT', 'EP', 'ACP', 'FWS']
                },
                CY: {
                    SEM1: ['TE-1', 'M&C', 'ESE', 'PLD', 'CCN'],
                    SEM2: ['TE-2', 'VCIT', 'EP', 'ACP', 'FWS']
                },
                AIDS: {
                    SEM1: ['TE-1', 'M&C', 'ESE', 'PLD', 'CCN'],
                    SEM2: ['TE-2', 'VCIT', 'EP', 'ACP', 'FWS']
                },
                CIVIL: {
                    SEM1: ['TE-1', 'M&C', 'ESE', 'PLD', 'CCN'],
                    SEM2: ['TE-2', 'VCIT', 'EP', 'ACP', 'FWS']
                },
                MECH: {
                    SEM1: ['TE-1', 'M&C', 'ESE', 'PLD', 'CCN'],
                    SEM2: ['TE-2', 'VCIT', 'EP', 'ACP', 'FWS']
                },
                ETE: {
                    SEM1: ['TE-1', 'M&C', 'ESE', 'PLD', 'CCN'],
                    SEM2: ['TE-2', 'VCIT', 'EP', 'ACP', 'FWS']
                },
                ECE: {
                    SEM1: ['TE-1', 'M&C', 'ESE', 'PLD', 'CCN'],
                    SEM2: ['TE-2', 'VCIT', 'EP', 'ACP', 'FWS']
                },
                EEE: {
                    SEM1: ['TE-1', 'M&C', 'ESE', 'PLD', 'CCN'],
                    SEM2: ['TE-2', 'VCIT', 'EP', 'ACP', 'FWS']
                }
            }

        }


        function Populate() {
            var select1 = document.getElementById("Select_regulation").value;
            var select2 = document.getElementById("Select_dept").value;
            var select3 = document.getElementById("Select_Sem").value;

            let x = contents[select1][select2][select3];
            console.log(x);

            let select4 = document.getElementById("Select_Subject");
            select4.innerHTML = "";
            if (select1 != undefined && select2 != undefined && select3 != undefined) {
                for (const i of x) {
                    let option = document.createElement("option");
                    option.value = i;
                    option.textContent = i;
                    select4.appendChild(option);
                }
            }
        }
    </script>
</body>

</html>
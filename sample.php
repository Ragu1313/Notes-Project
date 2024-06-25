<!-- <?php
session_start();
$servername = "localhost";
$username = "root";
$password = "@Ragu2004";
$dbname = "notesdb";
$conn = new mysqli($servername, $username, $password, $dbname);
 

if(isset($_POST['deletepath'])){

    $path = $_POST['deletepath'];
    $qry = "DELETE FROM contact WHERE problem='$path';";
    $conn->query($qry);

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <title>Document</title>
    <style>
        
    /* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content/Box */
.modal-content {
  background-color: #fefefe;
  margin: 15% auto; /* 15% from the top and centered */
  padding: 20px;
  border: 1px solid #888;
  width: 80%; /* Could be more or less, depending on screen size */
}

/* Close Button */
.close {
  color: #aaa;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: black;
  text-decoration: none;
  cursor: pointer;
}

 
    </style>
</head>
<body>
<table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>S.No</th>
                                            <th>Subject</th>
                                            <th>Action</th>
                                            <th>View</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                       
                                            $sql = "SELECT * FROM contact ";
            $result = $conn->query($sql);

                                            $count = 1;
                                            if ($result !== false && $result->num_rows > 0) {
                                                $modalId =1;
                                                while ($row = $result->fetch_assoc()) {
                                                    echo "<tr>";
                                                    echo "<td>" . $count . "</td>";
                                                    echo "<td>" . $row['sub'] . "</td>"; //$row['filename']
                                                    //  echo  '<br>' ;
                                                    $short =   $row['sub'];
                                                    echo '<td><form action="sample.php" method="post">
                    <input type="hidden" name="deletepath" value="'.$row['problem'].'">
                    <input type="submit" value="Delete">
                </form></td>';
                
                                                  //  echo '<td><a href="' . $short .  '" class="btn btn-info" name="deletepath" >Delete</a></td>';
                                                //   echo "<td><button id='openModalBtn'>Open Subwindow</button></td>";
                                                echo '<td><button class="openModalBtn" data-modal-id="modal'.$modalId.'">Open Subwindow</button></td>';

                                                   $modalId++;
  echo "
  <div id='modal' class='modal'>
  <div class='modal-content'>
    <span class='close'>&times;</span>
    <p>This is the subwindow content.</p>
  </div>
</div>";

                                                   // echo '<td> <a href= "' . $targetFile . $row['filename'] . '" class=btn btn-info" target="_self">View</a></td>';
                                                    echo "<tr>";
                                                    $count++;
                                                }
                                            } else {
                                                echo "<tr><td colspan='3'>No Records Found.</td></tr>";
                                            }
                                            // } catch (Exception $ex){}
                                        
                                        ?>
                                    </tbody>
                                </table>
                                
                                <script>
 document.addEventListener('DOMContentLoaded', function() {
  document.querySelectorAll('.openModalBtn').forEach(function(button) {
    button.addEventListener('click', function() {
      var modalId = this.getAttribute('data-modal-id');
      var modal = document.getElementById(modalId);
      if (modal) {
        modal.style.display = "block";
      }
    });
  });

  document.querySelectorAll('.close').forEach(function(closeButton) {
    closeButton.addEventListener('click', function() {
      var modal = this.closest('.modal');
      if (modal) {
        modal.style.display = "none";
      }
    });
  });

  window.addEventListener('click', function(event) {
    if (event.target.classList.contains('modal')) {
      event.target.style.display = "none";
    }
  });
});

</script>
</body>
</html> -->
<?php

$servername = "localhost";
$username = "root";
$password = "@Ragu2004";
$dbname = "notesdb";
$conn = new mysqli($servername, $username, $password, $dbname);
 

if(isset($_POST['deletepath'])){

    $path = $_POST['deletepath'];
    $qry = "DELETE FROM contact WHERE problem='$path';";
    $conn->query($qry);

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <title>Document</title>
    <style>
        
    /* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content/Box */
.modal-content {
  background-color: #fefefe;
  margin: 15% auto; /* 15% from the top and centered */
  padding: 20px;
  border: 1px solid #888;
  width: 80%; /* Could be more or less, depending on screen size */
}

/* Close Button */
.close {
  color: #aaa;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: black;
  text-decoration: none;
  cursor: pointer;
}

 
    </style>
</head>
<body>
<table class="table table-striped">
    <thead>
        <tr>
            <th>S.No</th>
            <th>Subject</th>
            <th>Action</th>
            <th>View</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $sql = "SELECT * FROM contact ";
        $result = $conn->query($sql);
        $count = 1;
        if ($result !== false && $result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $count . "</td>";
                echo "<td>" . $row['sub'] . "</td>"; //$row['filename']
                $short = $row['sub'];
                echo '<td><form action="sample.php" method="post">
                        <input type="hidden" name="deletepath" value="'.$row['problem'].'">
                        <input type="submit" value="Delete">
                    </form></td>';
                echo '<td><button class="openModalBtn" data-modal-id="modal'.$count.'">Open</button></td>';
                echo "<tr>";
                echo "
                    <div id='modal{$count}' class='modal'>
                        <div class='modal-content'>
                       
                            <span class='close'>&times;</span>
                            <h3>User:".$row['username']."</h3><br>
                            <p>".$row['problem']."</p>
                        </div>
                    </div>";
                $count++;
            }
        } else {
            echo "<tr><td colspan='3'>No Records Found.</td></tr>";
        }
        ?>
    </tbody>
</table>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        document.querySelectorAll('.openModalBtn').forEach(function(button) {
            button.addEventListener('click', function() {
                var modalId = this.getAttribute('data-modal-id');
                var modal = document.getElementById(modalId);
                if (modal) {
                    modal.style.display = "block";
                }
            });
        });

        document.querySelectorAll('.close').forEach(function(closeButton) {
            closeButton.addEventListener('click', function() {
                var modal = this.closest('.modal');
                if (modal) {
                    modal.style.display = "none";
                }
            });
        });

        window.addEventListener('click', function(event) {
            if (event.target.classList.contains('modal')) {
                event.target.style.display = "none";
            }
        });
    });
</script>
</body>
</html>

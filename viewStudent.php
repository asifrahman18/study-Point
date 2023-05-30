<?php
session_start();
include('connect.php');
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" />

    <!-- font awesome cdn -->
    <link rel="stylesheet" type="text/css"
        href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
    <!-- Owl Carousel -->
    <link rel="stylesheet" type="text/css" href="css/owl.carousel.min.css" />
    <link rel="stylesheet" type="text/css" href="css/owl.theme.default.min.css" />

    <!-- custom css file link up -->
    <link rel="stylesheet" type="text/css" href="style2.css" />

    <style>
    .headr {
        background-color: #009879;
        color: #ffffff;
        text-align: left;
        border: 1px solid black;
    }

    .zigzag {
        margin: 25px 0;
        font-size: 0.9em;
        font-family: sans-serif;
        min-width: 400px;

        margin-left: auto;
        margin-right: auto;
        border: 1px solid black;
    }

    .zigzag tbody tr {
        border-bottom: 1px solid #dddddd;
    }

    .zigzag th,
    .zigzag td {
        padding: 12px 15px;
        border: 1px solid rgb(255, 255, 255);
    }

    .zigzag td {
        background-color: rgb(9, 54, 232);
        color: #ffffff;
    }

    .boxx {
        float: right;
        margin-right: 150px;
        color: white;
        background: rgb(46, 36, 222);
        background: linear-gradient(90deg,
                rgba(46, 36, 222, 0.6) 0%,
                rgba(51, 205, 245, 0.6) 50%,
                rgba(27, 90, 103, 0.6) 100%);
        padding: 10px;
        border-radius: 5%;
    }

    .btn {
        margin-top: 10px;
        color: white;
        background-color: red;
    }

    .seat {
        font-weight: bold;
        font-size: large;
    }
    </style>

    <title>Admin | Student</title>
</head>

<body>
    <header>
        <div class="overlay">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <nav class="navbar navbar-expand-lg navbar-light">
                            <a class="navbar-brand" href="#">STUDY POINT | Admin</a>
                            <button class="navbar-toggler" type="button" data-toggle="collapse"
                                data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                                aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                            </button>

                            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                <ul class="navbar-nav ml-auto">
                                    <li class="nav-item active">
                                        <a class="nav-link" href="adminHome.php">Home <span
                                                class="sr-only">(current)</span></a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="adminTeacher.php">Teachers</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="adminStudent.php">Students</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="s-out" href="index.php">Sign Out</a>
                                    </li>
                                </ul>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>

            <div class="boxx">
                <p class="seat">Remove a student?</p>
                <form name="f2" action="adminStudent.php" method="POST">
                    <label class="seat">Enter Student ID</label>
                    <br />
                    <input type="text" name="bid" required />
                    <br />
                    <input type="submit" name="bking" value="Remove" class="btn" />
                    <br />
                </form>
            </div>


            <!-- student delete -->

            <?php
                if(isset($_POST['bking'])){

                    $user = $_POST['bid'];
                    
                    $sql = "SELECT * FROM student WHERE S_ID = $user";
                    
                    $result = mysqli_query($conn , $sql);
                    $count = mysqli_num_rows($result);
                    $row = $result->fetch_assoc();
                    if($count==1)
                    {

                    $sql2 = "DELETE FROM enrolls WHERE S_ID = $user";
                    $sql3 = "DELETE FROM student WHERE S_ID = $user";
                    $sql4 = "UPDATE teaches SET S_ID = 0 WHERE S_ID = $user";
                    $result2 = mysqli_query($conn , $sql2);
                    $result3 = mysqli_query($conn , $sql3);
                    $result3 = mysqli_query($conn , $sql4);
                    
                    echo "<script>window.location.href='adminStudent.php?deletion_confirm'</script>";
                    }
                    else
                    {
                    echo "You are not enrolled in this course";
                    }
                    
                    
                    }
            ?>

            <table class="zigzag" id="tabl">
                <thead>
                    <tr>
                        <th class="headr"><b>Student ID</b></th>
                        <th class="headr"><b>Student Name</b></th>
                        <th class="headr"><b>Gender</b></th>
                        <th class="headr"><b>Status</b></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                      
                      $query = "SELECT student.S_ID, Name, Gender, enrolls.Status
                      FROM student, enrolls
                      WHERE student.S_ID = enrolls.S_ID";
                      $data = mysqli_query($conn,$query);
                      $row = mysqli_fetch_array($data, MYSQLI_ASSOC); 
                      $total = mysqli_num_rows($data);
      
      
                      $result = $conn->query($query); if ($result->num_rows > 0) {
                      while($row = $result->fetch_assoc()) { ?>

                    <tr>
                        <td><?php echo  $row["S_ID"]; ?></td>
                        <td><?php echo  $row["Name"]; ?></td>
                        <td><?php echo  $row["Gender"]; ?></td>
                        <td><?php echo  $row["Status"]; ?></td>

                    </tr>

                    <?php
                          
                      }
                      } else {
                      echo "No Student available";
                      }
      
                      exit();
  
  
          ?>
                </tbody>
            </table>
        </div>
    </header>
</body>

</html>
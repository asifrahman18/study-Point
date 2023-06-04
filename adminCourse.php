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

    <title>Student | Course List</title>
</head>

<body>
    <?php
        if($_SESSION['adminID'] != NULL){
    ?>
    <header>
        <div class="overlay">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <nav class="navbar navbar-expand-lg navbar-light">
                            <a class="navbar-brand" href="#">জীবন যুদ্ধ | Course List</a>
                            <button class="navbar-toggler" type="button" data-toggle="collapse"
                                data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                                aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                            </button>

                            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                <ul class="navbar-nav ml-auto">
                                    <li class="nav-item active">
                                        <a class="nav-link" href="adminProfile.php">Home <span
                                                class="sr-only">(current)</span></a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="viewTeacher.php">Teachers</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="viewStudent.php">Students</a>
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
                <p class="seat">Remove a course?</p>
                <form name="f2" action="drop.php" method="POST">
                    <label class="seat">Enter Course ID</label>
                    <br />
                    <input type="text" name="bid" required />
                    <br />
                    <input type="submit" name="bking2" value="Delete" class="btn" />
                    <br />
                </form>
            </div>


            <table class="zigzag" id="tabl">
                <thead>
                    <tr>
                        <th class="headr"><b>Course ID</b></th>
                        <th class="headr"><b>Course Name</b></th>
                        <th class="headr"><b>Category</b></th>
                        <th class="headr"><b>Description</b></th>
                    </tr>
                </thead>
                <tbody>
                    <?php

                      $query = "SELECT* FROM business, course WHERE business.C_ID = course.C_ID";
                      
                      $data = mysqli_query($conn,$query);
                      $row = mysqli_fetch_array($data, MYSQLI_ASSOC); 
                      $total = mysqli_num_rows($data);
      
      
                      $result = $conn->query($query); 
                      if ($result->num_rows > 0) {
                      while($row = $result->fetch_assoc()) 
                      { ?>

                    <tr>
                        <td><?php echo  $row["C_ID"] ?></td>
                        <td><?php echo  $row["C_Name"]; ?></td>
                        <td><?php echo $row["category"]; ?></td>
                        <td><?php echo $row["description"]; ?></td>

                    </tr>

                    <?php
                          
                      }
                      }
                      $query1 = "SELECT* FROM medical, course WHERE medical.C_ID = course.C_ID";
                      
                      $data1 = mysqli_query($conn,$query1);
                      $row1 = mysqli_fetch_array($data1, MYSQLI_ASSOC); 
                      $total1 = mysqli_num_rows($data1);
      
      
                      $result1 = $conn->query($query1); 
                      if ($result1->num_rows > 0) {
                      while($row1 = $result1->fetch_assoc()) 
                      { ?>

                    <tr>
                        <td><?php echo  $row1["C_ID"]; ?>
                        </td>
                        <td><?php echo  $row1["C_Name"]; ?></td>
                        <td><?php echo  $row1["category"]; ?></td>
                        <td><?php echo  $row1["description"]; ?></td>

                    </tr>

                    <?php
                          
                      }
                      }
                      $query2 = "SELECT* FROM engineering, course WHERE engineering.C_ID = course.C_ID";
                      
                      $data2 = mysqli_query($conn,$query2);
                      $row2 = mysqli_fetch_array($data2, MYSQLI_ASSOC); 
                      $total2 = mysqli_num_rows($data2);
      
      
                      $result2 = $conn->query($query2); 
                      if ($result2->num_rows > 0) {
                      while($row2 = $result2->fetch_assoc()) 
                      { ?>

                    <tr>
                        <td><?php echo  $row2["C_ID"];  ?></td>
                        <td><?php echo  $row2["C_Name"]; ?></td>
                        <td><?php echo  $row2["category"]; ?></td>
                        <td><?php echo  $row2["description"]; ?></td>

                    </tr>

                    <?php
                          
                      }
                      }
                      $query3 = "SELECT* FROM general, course WHERE general.C_ID = course.C_ID";
                      
                      $data3 = mysqli_query($conn,$query3);
                      $row3 = mysqli_fetch_array($data3, MYSQLI_ASSOC); 
                      $total3 = mysqli_num_rows($data3);
      
      
                      $result3 = $conn->query($query3); 
                      if ($result3->num_rows > 0) {
                      while($row3 = $result3->fetch_assoc()) 
                      { ?>
                    <tr>
                        <td><?php echo  $row3["C_ID"]; ?></td>
                        <td><?php echo  $row3["C_Name"]; ?></td>
                        <td><?php echo  $row3["category"]; ?></td>
                        <td><?php echo  $row3["description"]; ?></td>

                    </tr>

                    <?php
                          
                      }
                      }
      
                      exit();
  
  
          ?>
                </tbody>
            </table>
        </div>
    </header>
    <?php
        }
        else
        {
            ?>

    <script>
    alert("Error. Login Required");
    </script>

    <?php
        echo "<script>window.location.href='index.php?'</script>";
        }
    ?>
</body>

</html>
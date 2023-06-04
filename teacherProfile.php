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
    <link rel="stylesheet" type="text/css" href="css/style.css" />

    <style>
    header {
        width: 100%;
        background-image: url(img/banner/banner.png);
        background-position: center;
        background-size: cover;
        background-repeat: no-repeat;
        height: 100vh;
        position: relative;
    }
    </style>

    <title>জীবন যুদ্ধ | Teacher Profile</title>
</head>

<body>
    <?php
        if($_SESSION['teacherID'] != NULL){
    ?>
    <!-- header section code start from here -->
    <header>

        <?php
                    
        $mail = $_SESSION['mail'];
        $id = $_SESSION['teacherID'];
        $sql = "SELECT * FROM teacher WHERE mail = '$mail'";
                
        $result = mysqli_query($conn , $sql);
        $count = mysqli_num_rows($result);
        $row = $result->fetch_assoc();

        $status = $row['status'];
    ?>

        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <nav class="navbar navbar-expand-lg navbar-light">
                        <a class="navbar-brand" href="#">জীবন যুদ্ধ | Teacher Profile</a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse"
                            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>

                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav ml-auto">
                                <li class="nav-item active">
                                    <a class="nav-link" href="teacherProfile.php">Home <span
                                            class="sr-only">(current)</span></a>
                                </li>
                                <li class="nav-item">
                                    <?php 
                                    if ($status == 'verified'){
                                        ?>
                                    <a class="nav-link" href="createCourse.php">Create Course</a>
                                    <?php 
                                    }
                                    ?>
                                </li>
                                <li class="nav-item">
                                    <?php 
                                    if ($status == 'verified'){
                                        ?>
                                    <a class="nav-link" href="teacherCourse.php">My Courses</a>
                                    <?php 
                                    }
                                    ?>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="editProfile.php">Edit Profile</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="s-out" href="index.php">Sign Out</a>
                                </li>
                            </ul>
                        </div>
                    </nav>

                    <div class="banner-text">
                        <h1>WELCOME</h1>
                        <br>
                        <h2><?php echo $_SESSION['tname'] ?></h2>
                        <h6><?php echo $_SESSION['mail'] ?></h6>
                        <h5>Teacher ID: <?php echo $id ?></h5>
                        <?php
                        if($status == 'unverified'){
                        ?>
                        <h5>You are not verified yet. Check status <a href="teacherInbox.php">Here</a></h5>
                        <?php
                        }
                        else if ($status == 'verified') {
                            }
                        
                        ?>
                    </div>
                </div>
            </div>
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
</body>

</html>
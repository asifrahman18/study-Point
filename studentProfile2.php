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

    <title>জীবন যুদ্ধ | Student Profile</title>
</head>

<body>
    <!-- header section code start from here -->
    <header>
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <nav class="navbar navbar-expand-lg navbar-light">
                        <a class="navbar-brand" href="#">জীবন যুদ্ধ | Student Profile</a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse"
                            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>

                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav ml-auto">
                                <li class="nav-item active">
                                    <a class="nav-link" href="studentprofile2.php">Home <span
                                            class="sr-only">(current)</span></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="studentCourse.php">My Courses</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="courses.php">Course List</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="s-out" href="index.php">Sign Out</a>
                                </li>
                            </ul>
                        </div>
                    </nav>

                    <?php
                    
                            $id = $_SESSION['userID'];
                            $sql = "SELECT * FROM enrolls WHERE S_ID = $id and Status = 'Enrolled'";
                        
                            $result = mysqli_query($conn , $sql);
                            $count = mysqli_num_rows($result);
                    
                    ?>
                    <div class="banner-text">
                        <h1>WELCOME</h1>
                        <br>
                        <h2><?php echo $_SESSION['name'] ?></h2>
                        <h6><?php echo $_SESSION['mail'] ?></h6>
                        <h5>Student ID: <?php echo $_SESSION['userID'] ?></h5>
                        <?php
                        if($count>=1){
                        ?>
                        <h5>You are enrolled in <a href="studentCourse.php"><?php echo $count ?> courses</a></h5>
                        <?php
                        }
                        else{
                        ?>
                        <h5>You are currently not enrolled in any courses. <a href="#">Enroll Now</a></h5>
                        <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>

        <div class="service-cat">
            <div class="overlay"></div>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h2 class="title">WHAT WE HAVE</h2>
                        <div class="cat-icon">
                            <ul>
                                <li>
                                    <a href="course2.php?value=engineering">
                                        <i class="fa fa-desktop"></i> <br />
                                        <p>ENGINEERING</p>
                                    </a>
                                </li>
                                <li>
                                    <a href="course2.php?value=business">
                                        <i class="fa fa-desktop"></i><br />
                                        <p>BUSINESS</p>
                                    </a>
                                </li>
                                <li>
                                    <a href="course2.php?value=medical">
                                        <i class="fa fa-desktop"></i><br />
                                        <p>MEDICAL</p>
                                    </a>
                                </li>
                                <li>
                                    <a href="course2.php?value=general">
                                        <i class="fa fa-desktop"></i><br />
                                        <p>GENERAL</p>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
</body>

</html>
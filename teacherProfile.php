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

    <title>Study Point</title>
</head>

<body>
    <!-- header section code start from here -->
    <header>
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <nav class="navbar navbar-expand-lg navbar-light">
                        <a class="navbar-brand" href="#">STUDY POINT</a>
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
                                    <a class="nav-link" href="teachers.php">Inbox</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="teachers.php">My Courses</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="courses.php">Edit Profile</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="s-out" href="index.php">Sign Out</a>
                                </li>
                            </ul>
                        </div>
                    </nav>

                    <?php
                    
                            $id = $_SESSION['teacherID'];
                            $sql = "SELECT * FROM enrolls WHERE S_ID = $id and Status = 'Enrolled'";
                        
                            $result = mysqli_query($conn , $sql);
                            $count = mysqli_num_rows($result);
                    
                    ?>
                    <div class="banner-text">
                        <h1>WELCOME</h1>
                        <br>
                        <h2><?php echo $_SESSION['name'] ?></h2>
                        <h6><?php echo $_SESSION['mail'] ?></h6>
                        <h5>Teacher ID: <?php echo $_SESSION['teacherID'] ?></h5>
                        <?php
                        if($count>=1){
                        ?>
                        <h5>You are created <a href="teacherCourse.php"><?php echo $count ?> courses</a></h5>
                        <?php
                        }
                        else{
                        ?>
                        <h5>You are currently do not have any courses. <a href="createCourse.php">Create Now</a></h5>
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
                                    <a href="course2.php?value=science">
                                        <i class="fa fa-desktop"></i> <br />
                                        <p>SCIENCE</p>
                                    </a>
                                </li>
                                <li>
                                    <a href="course2.php?value=commerce">
                                        <i class="fa fa-desktop"></i><br />
                                        <p>COMMERCE</p>
                                    </a>
                                </li>
                                <li>
                                    <a href="course2.php?value=arts">
                                        <i class="fa fa-desktop"></i><br />
                                        <p>ARTS</p>
                                    </a>
                                </li>
                                <li>
                                    <a href="course2.php?value=others">
                                        <i class="fa fa-desktop"></i><br />
                                        <p>General</p>
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
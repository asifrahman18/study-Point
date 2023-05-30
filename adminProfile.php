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

    <title>Coaching Centre | Admin</title>
</head>

<body>
    <!-- header section code start from here -->
    <header>
        <div class="overlay"></div>
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
                                    <a class="nav-link" href="adminProfile.php">Home <span
                                            class="sr-only">(current)</span></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="inboxAdmin.php">Inbox</a>
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
                    <div class="banner-text">
                        <h1>WELCOME</h1>
                        <h5>Admin</h5>
                    </div>
                </div>
            </div>
        </div>
    </header>
</body>

</html>
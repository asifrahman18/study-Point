<?php
session_start();
include('connect.php');
?>

<!DOCTYPE html>
<html>

<head>
    <title>Course Profile</title>
    <style>
    body {
        /* background-image: url("https://as1.ftcdn.net/v2/jpg/02/09/45/00/1000_F_209450029_lgIqRbGM5Fj9ChUUjxSYZjjCyHidpX8Q.jpg"); */
        font-family: Arial, sans-serif;
        background: linear-gradient(135deg, #71b7e6, #9b59b6);
        margin: 0;
        padding: 0;
    }

    .container {
        max-width: 800px;
        margin: 0 auto;
        margin-top: 50px;
        padding: 20px;
        background-color: #fff;
        border-radius: 5px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }

    h2 {
        margin-top: 0;
        margin-bottom: 20px;
    }

    .course-info {
        margin-bottom: 20px;
    }

    .course-info h3 {
        margin-top: 0;
    }

    .course-info p {
        margin: 0;
        color: #777;
    }

    .course-actions {
        display: flex;
        justify-content: space-between;
        margin-bottom: 20px;
    }

    .action-button {
        padding: 10px 20px;
        font-weight: bold;
        color: #fff;
        background-color: #007bff;
        border: none;
        border-radius: 3px;
        cursor: pointer;
    }

    .action-button:hover {
        background-color: #0056b3;
    }

    .delete-button {
        padding: 10px 20px;
        font-weight: bold;
        color: #fff;
        background-color: #fc2929;
        border: none;
        border-radius: 3px;
        cursor: pointer;
    }

    .delete-button:hover {
        background-color: #ff0000;
    }

    .material-list {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .material-item {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 10px;
        border-bottom: 1px solid #ccc;
    }

    .material-item:last-child {
        border-bottom: none;
    }

    .material-item .material-name {
        flex-grow: 1;
        margin-right: 10px;
    }

    .material-item .material-actions {
        display: flex;
    }

    .material-item .material-actions .edit-button {
        margin-left: 10px;
        padding: 5px 10px;
        font-weight: bold;
        color: #fff;
        background-color: #0056b3;
        border: none;
        border-radius: 3px;
        cursor: pointer;
    }

    .material-item .material-actions .delete-button {
        margin-left: 10px;
        padding: 5px 10px;
        font-weight: bold;
        color: #fff;
        background-color: #f83737;
        border: none;
        border-radius: 3px;
        cursor: pointer;
    }

    .material-item .material-actions .edit-button:hover {
        background-color: #057af8;
    }

    .material-item .material-actions .delete-button:hover {
        background-color: #b30000;
    }
    </style>
</head>

<body>


    <?php

        $cat = $_SESSION['cat'];
        $cid = $_SESSION['course'];


        $query = "SELECT* FROM $cat WHERE C_ID = $cid";
                                
        $data = mysqli_query($conn,$query);
        $row = mysqli_fetch_array($data, MYSQLI_ASSOC); 

        $name = $row['C_Name'];
        $desc = $row["description"];

        $total = mysqli_num_rows($data);

    ?>

    <div class="container">
        <h2><?php echo  $name; ?></h2>

        <div class="course-info">
            <h3>Course ID: <?php echo  $cid; ?></h3>
            <p>
                <?php echo  $desc; ?>
            </p>
        </div>

        <div class="course-actions">
            <button class="action-button">Upload Material</button>
            <button class="action-button">Edit Course</button>
            <button class="delete-button">Delete Course</button>
        </div>

        <ul class="material-list">
            <li class="material-item">
                <div class="material-name">Lecture 1: Introduction</div>
                <div class="material-actions">
                    <button class="edit-button">Edit</button>
                    <button class="delete-button">Delete</button>
                </div>
            </li>
            <li class="material-item">
                <div class="material-name">Lecture 2: Relational Models</div>
                <div class="material-actions">
                    <button class="edit-button">Edit</button>
                    <button class="delete-button">Delete</button>
                </div>
            </li>
            <li class="material-item">
                <div class="material-name">Lecture 3: SQL</div>
                <div class="material-actions">
                    <button class="edit-button">Edit</button>
                    <button class="delete-button">Delete</button>
                </div>
            </li>
            </li>
            <li class="material-item">
                <div class="material-name">Lecture 4: Advanced SQL</div>
                <div class="material-actions">
                    <button class="edit-button">Edit</button>
                    <button class="delete-button">Delete</button>
                </div>
            </li>
            <li class="material-item">
                <div class="material-name">Lecture 5: Relational Algebra</div>
                <div class="material-actions">
                    <button class="edit-button">Edit</button>
                    <button class="delete-button">Delete</button>
                </div>
            </li>
            <!-- Add more material items as needed -->
        </ul>
    </div>
</body>

</html>
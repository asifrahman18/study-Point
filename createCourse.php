<?php
session_start();
include('connect.php');
?>

<!DOCTYPE html>
<html>

<head>
    <title>Create Course</title>
    <style>
    body {
        background: linear-gradient(135deg, #71b7e6, #9b59b6);
    }

    .container {
        max-width: 500px;
        margin: 50px auto;
        padding: 20px;
        background-color: #ffffff;
        border-radius: 5px;
    }

    h1 {
        text-align: center;
    }

    label {
        display: block;
        margin-bottom: 10px;
    }

    input[type="text"],
    textarea {
        width: 100%;
        padding: 8px;
        border-radius: 3px;
        border: 1px solid #ccc;
    }

    #btnn {
        display: block;
        width: 100%;
        padding: 10px;
        background-color: skyblue;
        color: #ffffff;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        border: 2px solid black;
        transition: 0.8s;
    }

    #btnn:hover {
        background-color: #1e41db;
    }

    input[type="file"] {
        display: inline;
        margin-bottom: 10px;
    }

    input[type="submit"] {
        display: inline;
        border: none;
        padding: 5px;
        background-color: #4c82af;
        color: #fff;
        text-align: center;
        font-size: 16px;
        font-weight: bold;
        cursor: pointer;
        border-radius: 5px;
    }
    </style>
</head>

<body>
    <?php
        if($_SESSION['teacherID'] != NULL){
    ?>

    <div class="container">
        <h1>Create Course</h1>
        <form action="createCourse.php" method="post">
            <label for="years">Course Name:</label>
            <input type="text" id="years" name="cName" required />

            <label for="qualifications">Category</label>
            <select name="category" required>
                <option disabled selected>Select category</option>
                <option>Business</option>
                <option>Engineering</option>
                <option>General</option>
                <option>Medical</option>
            </select>
            <br>
            <label for="skills">Course Description:</label>
            <textarea id="skills" name="desc" rows="3" required></textarea>

            <input type="submit" id="btnn" name="submit" value="Create Course" />
        </form>
    </div>


    <?php

      if(isset($_POST['submit'])){

        $mail = $_SESSION['mail'];
        $name = $_POST['cName'];
        $dept = $_POST['category'];
        $_SESSION['catgory'] = $_POST['category'];
        $desc = $_POST['desc'];
        $tid = $_SESSION['teacherID'];

                $sql2 = "INSERT INTO $dept (C_ID, C_Name, T_ID, description, category) VALUES (NULL, '$name', '$tid', '$desc', '$dept');";

                $result2 = mysqli_query($conn , $sql2);

                echo "<script>window.location.href='teacherProfile.php?createCourseSuccess'</script>";
    }

    ?>

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
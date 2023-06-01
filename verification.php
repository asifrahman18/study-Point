<?php
session_start();
include('connect.php');
?>

<!DOCTYPE html>
<html>

<head>
    <title>Verification Page</title>
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
    <div class="container">
        <h1>Verification Page</h1>
        <form action="verification.php" method="post">
            <label for="years">Years of Experience:</label>
            <input type="text" id="years" name="years" required />

            <label for="qualifications">Qualifications:</label>
            <input type="text" id="qualifications" name="qualifications" required />

            <label for="specialization">Specialization:</label>
            <input type="text" id="specialization" name="special" required />

            <label for="previous">Previous Experience:</label>
            <textarea id="previous" name="previous" rows="3" required></textarea>

            <label for="skills">Other Skills:</label>
            <textarea id="skills" name="skills" rows="3" required></textarea>

            <!-- <form action="insert.php" method="post" enctype="multipart/form-data">
                <label for="documents">Upload Documents:</label>
                <input type="file" name="pdf" id="fileToUpload" required />
                <input type="submit" value="Upload" />
            </form> -->

            <input type="submit" id="btnn" name="submit" value="Submit and Proceed" />
        </form>
    </div>


    <?php

      if(isset($_POST['submit'])){

          $mail = $_SESSION['mail'];

          $sql = "select *from verification where mail = '$mail'";
                
                $result = mysqli_query($conn , $sql);
                $count = mysqli_num_rows($result);
                $row = $result->fetch_assoc();
                if($count==1)
                {
                  ?>
    <script>
    alert("You have already applied for verification");
    </script>
    <?php
                }

                else{
                      
                      $mail = $_SESSION['mail'];
                      $exp = $_POST['years'];
                      $qual = $_POST['qualifications'];
                      $spec = $_POST['special'];
                      $prev = $_POST['previous'];
                      $other = $_POST['skills'];

                            $sql = "INSERT INTO verification (experience, qualification, specialization, prevExp, other, pdf, mail) VALUES ('$exp', '$qual', '$spec', '$prev', '$other', NULL , '$mail');";

                            $sql2 = "UPDATE teacher SET Specialization = '$spec' WHERE Mail = '$mail';";

                            $result = mysqli_query($conn, $sql);
                            $result = mysqli_query($conn , $sql2);

                            echo "<script>window.location.href='insert.php'</script>";


      }
    }

    ?>
</body>

</html>
<?php
session_start();
include('connect.php');
?>

<!DOCTYPE html>
<html>

<head>
    <title>Upload Course</title>
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
        <h1>Upload Material</h1>
        <form action="uploadForm.php" method="post">
            <label for="years">Course Name: <?php echo $_SESSION['cName']; ?></label>

            <label for="qualifications">Course ID: <?php echo $_SESSION['courseID']; ?></label>

            <label for="specialization">Material Type </label>
            <select name="mat" required>
                <option disabled selected>Select</option>
                <option>lecture</option>
                <option>assignment</option>
            </select>

            <label for="specialization">Material Number </label>
            <input type="number" id="specialization" name="num" required />

            <label for="specialization">Lecture Name</label>
            <input type="text" id="specialization" name="nem" required />

            <input type="submit" id="btnn" name="submit11" value="Proceed to upload" />
        </form>
    </div>


    <?php

      if(isset($_POST['submit11'])){

          $lec = $_POST['num'];
          $_SESSION['nem'] = $_POST['nem'];
          $_SESSION['lecture'] = $_POST['num'];
          $course = $_SESSION['courseID'];
          $_SESSION['type'] = $_POST['mat'];

          $sql = "SELECT lecture FROM course WHERE lecture = $lec AND C_ID = $course";

                
                $result = mysqli_query($conn , $sql);
                $count = mysqli_num_rows($result);
                if($count!=0)
                {
                     ?>
    <script>
    alert("Lecture Number already exists");
    </script>
    <?php
                }

                else if ($count==0)
                {
                    echo "<script>window.location.href='upload.php'</script>";
                }
    
}

    ?>
</body>

</html>
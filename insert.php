<?php
session_start();
include('connect.php');
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <title>Insert PDF</title>
    <style media="screen">
    div {
        border: 2px solid black;
        width: 500px;
        margin-left: 370px;
        margin-top: 50px;
        padding: 30px;
    }

    form {
        margin-left: 70px;
    }

    label {
        font-size: 25px;
        font-weight: bold;
    }

    #pdf {
        font-size: 20px;
        font-weight: bold;
        margin-top: 10px;
    }

    #upload {
        font-size: 20px;
        font-weight: bold;
        margin-left: 100px;
    }
    </style>
</head>

<body>
    <?php
        if($_SESSION['teacherID'] != NULL){
    ?>


    <div class="">
        <form class="" action="insert.php" method="post" enctype="multipart/form-data">
            <label for="">Choose Your PDF File</label><br>
            <input id="pdf" type="file" name="pdf" value="" required><br><br>
            <input id="upload" type="submit" name="submit" value="Upload">
            <?php

        if (isset($_POST['submit'])) {
          $pdf=$_FILES['pdf']['name'];
          $pdf_type=$_FILES['pdf']['type'];
          $pdf_size=$_FILES['pdf']['size'];
          $pdf_tem_loc=$_FILES['pdf']['tmp_name'];
          $pdf_store="pdf/".$pdf;

          $mail = $_SESSION['mail'];

          move_uploaded_file($pdf_tem_loc,$pdf_store);

          $sql="INSERT INTO pdf_file(pdf, mail) values('$pdf', '$mail')";
          $query=mysqli_query($conn,$sql);

          echo "<script>window.location.href='teacherProfile.php'</script>";

        }



         ?>

        </form>

    </div>

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
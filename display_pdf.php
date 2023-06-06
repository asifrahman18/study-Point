<?php
session_start();
include('connect.php');
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <title>Display PDF</title>
    <style media="screen">
    embed {
        border: 2px solid black;
        margin-top: 30px;
    }

    .div1 {
        margin-left: 170px;
    }
    </style>
</head>

<body>
    <div class="div1">
        <?php
        $mail = $_POST['selected_id'];
      $sql="SELECT pdf from pdf_file WHERE mail = '$mail'";
      $query=mysqli_query($conn,$sql);
      // $row = mysqli_fetch_array($query, MYSQLI_ASSOC);
      while ($info=mysqli_fetch_array($query)) {
        // echo $row["mail"];
        ?>
        <embed type="application/pdf" src="pdf/<?php echo $info['pdf'] ; ?>" width="900" height="500">
        <?php
      }

      ?>

    </div>

</body>

</html>
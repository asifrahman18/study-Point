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
        if (isset($_POST['submit2'])){
        $cid = $_SESSION['courseID'];
      $sql="SELECT pdf FROM course WHERE C_ID = $cid";
      $query=mysqli_query($conn,$sql);
   
      while ($info=mysqli_fetch_array($query)) {
        // echo $row["mail"];
        ?>
        <embed type="application/pdf" src="pdf/<?php echo $info['pdf'] ; ?>" width="900" height="500">
        <?php
      }
    }


      if (isset($_POST['selected_id'])){
      $cid = $_SESSION['courseID'];
      $lec = $_POST['selected_id'];
      $sql2="SELECT pdf FROM course WHERE C_ID = $cid AND lecture = $lec";
      $query2=mysqli_query($conn,$sql2);
      while ($info2=mysqli_fetch_array($query2)) {
        ?>
        <embed type="application/pdf" src="pdf/<?php echo $info2['pdf'] ; ?>" width="900" height="500">
        <?php
      }
    }
      ?>

    </div>

</body>

</html>
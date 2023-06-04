<?php

session_start();
include('connect.php');


$course = $_SESSION['courseID'];
$cat = $_SESSION['catD'];
$stID = $_SESSION['userID'];

        if(isset($_POST['submit11']))                    
        {


            // echo $course;
            // echo $cat;
    
            $query3 = "UPDATE enrolls SET Status='drop' WHERE S_ID = $stID AND C_ID = $course;";
            $data3 = mysqli_query($conn , $query3);



            echo "<script>window.location.href='studentProfile2.php?dropSuccess'</script>";
    
    }

    if(isset($_POST['submit3']))                    
        {


            // echo $course;
            // echo $cat;
    
            $query0 = "DELETE FROM course WHERE C_ID = $course";
            $data0 = mysqli_query($conn , $query0);
    
    
            $query1 = "DELETE FROM $cat WHERE C_ID = $course";
            $data1 = mysqli_query($conn , $query1);

            echo "<script>window.location.href='teacherProfile.php?deleteSuccess'</script>";
    
    }
?>
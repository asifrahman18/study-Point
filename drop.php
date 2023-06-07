<?php

session_start();
include('connect.php');


        if(isset($_POST['submit11']))                    
        {
            $course = $_SESSION['courseID'];
            $cat = $_SESSION['catD'];
            $stID = $_SESSION['userID'];


            // echo $course;
            // echo $cat;
    
            $query3 = "UPDATE enrolls SET Status='drop' WHERE S_ID = $stID AND C_ID = $course;";
            $data3 = mysqli_query($conn , $query3);



            echo "<script>window.location.href='studentProfile2.php?dropSuccess'</script>";
    
        }

    if(isset($_POST['submit3']))                    
        {
            $course = $_SESSION['courseID'];
            $cat = $_SESSION['catD'];
            $stID = $_SESSION['userID'];

            // echo $course;
            // echo $cat;
    
            $query0 = "DELETE FROM course WHERE C_ID = $course";
            $data0 = mysqli_query($conn , $query0);

            $query2 = "DELETE FROM enrolls WHERE C_ID = $course";
            $data2 = mysqli_query($conn , $query2);
    
            $query1 = "DELETE FROM $cat WHERE C_ID = $course";
            $data1 = mysqli_query($conn , $query1);

            echo "<script>window.location.href='teacherProfile.php?deleteSuccess'</script>";
    
    }

    if(isset($_POST['selected_id']))                    
        {
            $cid = $_POST['selected_id'];

            $query0 = "DELETE FROM course WHERE C_ID = $cid";
            $data0 = mysqli_query($conn , $query0);

            $query2 = "DELETE FROM enrolls WHERE C_ID = $course";
            $data2 = mysqli_query($conn , $query2);

            echo "<script>window.location.href='adminProfile.php?deleteSuccess'</script>";
    
    }
?>
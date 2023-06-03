<?php

session_start();
include('connect.php');



        
        $sid = $_SESSION['userID'];
        $course = $_SESSION['course'];

        if(isset($_POST['submit']))
        {
            $sql = "INSERT INTO enrolls (S_ID, C_ID, Status) VALUES ($sid, $course, 'enrolled');";

            $result = mysqli_query($conn , $sql);

            // echo $sid;
            // echo $course;

            echo "<script>window.location.href='enroll2.php?enrollSuccess'</script>";
        }



?>
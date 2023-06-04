<?php

session_start();
include('connect.php');

        
        $sid = $_SESSION['userID'];
        $course = $_SESSION['course'];

        if(isset($_POST['submit']))
        {

            $sql0 = "SELECT status FROM enrolls WHERE S_ID = $sid AND C_ID = $course AND status = 'enrolled'";

            $result0 = mysqli_query($conn , $sql0);
            $count = mysqli_num_rows($result0);
            $row = $result0->fetch_assoc();
                if($count==0)
                {
                    $sql = "INSERT INTO enrolls (S_ID, C_ID, Status) VALUES ($sid, $course, 'enrolled');";

                    $result = mysqli_query($conn , $sql);
        
                    // echo $sid;
                    // echo $course;
        
                    echo "<script>window.location.href='studentProfile2.php?enrollSuccess'</script>";
                }

                else{
                    ?>
<script>
alert("You have already enrolled in this course");
</script>
<?php
                echo "<script>window.location.href='courses.php?enrollSuccess'</script>";
                }

        }


?>
<?php
session_start();
include('connect.php');
?>

<!DOCTYPE html>
<html>

<head>
    <title>Course</title>
    <style>
    body {
        /* background-image: url("https://as1.ftcdn.net/v2/jpg/02/09/45/00/1000_F_209450029_lgIqRbGM5Fj9ChUUjxSYZjjCyHidpX8Q.jpg"); */
        font-family: Arial, sans-serif;
        background: linear-gradient(135deg, #71b7e6, #9b59b6);
        margin: 0;
        padding: 0;
    }

    .zigzag {
        margin: 25px 0;
        font-size: 0.9em;
        font-family: sans-serif;
        min-width: 400px;

        margin-left: auto;
        margin-right: auto;
        border: 1px solid black;
    }

    .zigzag tbody tr {
        border-bottom: 1px solid #dddddd;
    }

    .zigzag th,
    .zigzag td {
        padding: 12px 15px;
        border: 1px solid rgb(255, 255, 255);
    }

    .zigzag td {
        background-color: rgb(9, 54, 232);
        color: #ffffff;
    }


    .container {
        max-width: 800px;
        margin: 0 auto;
        margin-top: 50px;
        padding: 20px;
        background-color: #fff;
        border-radius: 5px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }

    h2 {
        margin-top: 0;
        margin-bottom: 20px;
    }

    .course-info {
        margin-bottom: 20px;
    }

    .course-info h3 {
        margin-top: 0;
    }

    .course-info p {
        margin: 0;
        color: #777;
    }

    .course-actions {
        display: flex;
        justify-content: space-between;
        margin-bottom: 20px;
    }

    .action-button {
        padding: 10px 20px;
        font-weight: bold;
        color: #fff;
        background-color: #007bff;
        border: none;
        border-radius: 3px;
        cursor: pointer;
    }

    .action-button:hover {
        background-color: #0056b3;
    }

    .delete-button {
        padding: 10px 20px;
        font-weight: bold;
        color: #fff;
        background-color: #fc2929;
        border: none;
        border-radius: 3px;
        cursor: pointer;
    }

    .delete-button:hover {
        background-color: #ff0000;
    }

    .material-list {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .material-item {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 10px;
        border-bottom: 1px solid #ccc;
    }

    .material-item:last-child {
        border-bottom: none;
    }

    .material-item .material-name {
        flex-grow: 1;
        margin-right: 10px;
    }

    .material-item .material-actions {
        display: flex;
    }

    .material-item .material-actions .edit-button {
        margin-left: 10px;
        padding: 5px 10px;
        font-weight: bold;
        color: #fff;
        background-color: #0056b3;
        border: none;
        border-radius: 3px;
        cursor: pointer;
    }

    .material-item .material-actions .delete-button {
        margin-left: 10px;
        padding: 5px 10px;
        font-weight: bold;
        color: #fff;
        background-color: #f83737;
        border: none;
        border-radius: 3px;
        cursor: pointer;
    }

    .material-item .material-actions .edit-button:hover {
        background-color: #057af8;
    }

    .material-item .material-actions .delete-button:hover {
        background-color: #b30000;
    }
    </style>
</head>

<body>
    <?php
        if($_SESSION['userID'] != NULL){
    ?>
    <?php
                if(isset($_POST['selected_id'])){

                    $cid = $_POST['selected_id'];
                    $_SESSION['course'] = $cid;
                    
                    $sql2 = "SELECT * FROM engineering WHERE C_ID = $cid";
                    
                    $result2 = mysqli_query($conn , $sql2);
                    $count2 = mysqli_num_rows($result2);
                    $row2 = $result2->fetch_assoc();
                    if($count2==1)
                    {
                        $cat = $row2['category'];
                    }
                    else if($count2==0)
                    {
                    
                        $sql = "SELECT * FROM medical WHERE C_ID = $cid";
                        
                        $result = mysqli_query($conn , $sql);
                        $count = mysqli_num_rows($result);
                        $row = $result->fetch_assoc();
                        if($count==1)
                        {
                            $cat = $row['category'];
                        }
                        else if($count==0)
                        {
                            $sql1 = "SELECT * FROM business WHERE C_ID = $cid";
                        
                            $result1 = mysqli_query($conn , $sql1);
                            $count1 = mysqli_num_rows($result1);
                            $row1 = $result1->fetch_assoc();
                            if($count1==1)
                            {
                                $cat = $row1['category'];
                            }
                            else if($count1==0)
                            {
                                $sql3 = "SELECT * FROM general WHERE C_ID = $cid";
                        
                                $result3 = mysqli_query($conn , $sql3);
                                $count3 = mysqli_num_rows($result3);
                                $row3 = $result3->fetch_assoc();
                                if($count3==1)
                                {
                                    $cat = $row3['category'];
                                }
                                else if($count3==0)
                                {
                                    echo "No Course found";
                                }
                        }
                        else
                        {
                            
                        }
                    }
                    }
                }
            ?>


    <?php

        if(isset($_POST['selected_id']))                    
        {
            $cid = $_POST['selected_id'];
            $sql4 = "SELECT * FROM $cat WHERE C_ID = $cid";

            $result4 = mysqli_query($conn , $sql4);
            $count4 = mysqli_num_rows($result4);
            $row4 = $result4->fetch_assoc();

            $_SESSION['name'] = $row4['C_Name'];
            $tid = $row4['T_ID'];
            $_SESSION['desc'] = $row4['description'];

            $sql5 = "SELECT Name FROM teacher WHERE T_ID = $tid";

            $result5 = mysqli_query($conn , $sql5);
            $count5 = mysqli_num_rows($result5);
            $row5 = $result5->fetch_assoc();

            $_SESSION['tname'] = $row5['Name'];
        }

    ?>



    <div class="container">
        <h2><?php echo  $_SESSION['name']; ?></h2>

        <div class="course-info">
            <h3>Course ID: <?php echo  $_SESSION['course']; ?></h3>
            <h3>Teacher: <?php echo  $_SESSION['tname']; ?></h3>
            <p>
                <?php echo  $_SESSION['desc']; ?>
                <br>
            </p>
        </div>

        <div class="course-actions">
            <form action="enroll.php" name="submit" method="POST">
                <input type="submit" name="submit" value="Enroll" class="action-button"></input>
            </form>
        </div>


        <table class="zigzag" id="tabl">
            <thead>
                <tr>
                    <th class="headr"><b>Lecture Number</b></th>
                    <th class="headr"><b>Lecture Name</b></th>
                </tr>
            </thead>
            <tbody>

                <?php

            if(isset($_POST['selected_id']))                    
        {

            $cid = $_POST['selected_id'];
            $query = "SELECT* FROM course WHERE C_ID = $cid";
            $data = mysqli_query($conn , $query);
            $row8 = mysqli_fetch_array($data, MYSQLI_ASSOC);
            $total = mysqli_num_rows($data);


            $result = $conn->query($query); if ($result->num_rows > 0) {
                while($row8 = $result->fetch_assoc())
                 { ?>
                <tr>
                    <td><?php echo  $row8["lecture"]; ?></td>
                    <td><?php echo  $row8["name"]; ?></td>

                </tr>
                <?php
                  }
        }
    }

    ?>

            </tbody>
        </table>
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
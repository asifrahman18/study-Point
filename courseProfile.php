<?php
session_start();
include('connect.php');
?>

<!DOCTYPE html>
<html>

<head>
    <title>Course Profile</title>
    <style>
    body {
        /* background-image: url("https://as1.ftcdn.net/v2/jpg/02/09/45/00/1000_F_209450029_lgIqRbGM5Fj9ChUUjxSYZjjCyHidpX8Q.jpg"); */
        font-family: Arial, sans-serif;
        background: linear-gradient(135deg, #71b7e6, #9b59b6);
        margin: 0;
        padding: 0;
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
                if(isset($_POST['bking'])){

                    $cid = $_POST['bid'];
                    $_SESSION['c'] = $cid;
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

        if(isset($_POST['bking']))                    
        {
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
            <h3>Course ID: <?php echo  $_SESSION['c']; ?></h3>
            <h3>Teacher: <?php echo  $_SESSION['tname']; ?></h3>
            <p>
                <?php echo  $_SESSION['desc']; ?>
                <br>
            </p>
        </div>

        <div class="course-actions">
            <form action="uploadForm.php" name="submit" method="POST">
                <input type="submit" name="submit" value="Upload Material" class="action-button"></input>
            </form>
            <form action="enroll.php" name="submit2" method="POST">
                <input type="submit" name="submit2" value="Edit Course" class="action-button"></input>
            </form>
            <form action="enroll.php" name="submit3" method="POST">
                <input type="submit" name="submit3" value="Delete Course" class="delete-button"></input>
            </form>
        </div>

        <ul class="material-list">
            <li class="material-item">
                <div class="material-name">Lecture 1: Introduction</div>
                <div class="material-actions">
                    <button class="edit-button">Edit</button>
                    <button class="delete-button">Delete</button>
                </div>
            </li>
            <li class="material-item">
                <div class="material-name">Lecture 2: Relational Models</div>
                <div class="material-actions">
                    <button class="edit-button">Edit</button>
                    <button class="delete-button">Delete</button>
                </div>
            </li>
            <li class="material-item">
                <div class="material-name">Lecture 3: SQL</div>
                <div class="material-actions">
                    <button class="edit-button">Edit</button>
                    <button class="delete-button">Delete</button>
                </div>
            </li>
            </li>
            <li class="material-item">
                <div class="material-name">Lecture 4: Advanced SQL</div>
                <div class="material-actions">
                    <button class="edit-button">Edit</button>
                    <button class="delete-button">Delete</button>
                </div>
            </li>
            <li class="material-item">
                <div class="material-name">Lecture 5: Relational Algebra</div>
                <div class="material-actions">
                    <button class="edit-button">Edit</button>
                    <button class="delete-button">Delete</button>
                </div>
            </li>
        </ul>
    </div>

</body>

</html>
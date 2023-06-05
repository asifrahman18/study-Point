<?php
session_start();
include('connect.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600&display=swap');

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: 'Poppins', sans-serif;
    }

    body {
        min-height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        background-image: url('https://wallpaperaccess.com/full/2785178.jpg');
    }

    .container {
        position: relative;
        max-width: 700px;
        max-height: 800px;
        width: 100%;
        border-radius: 6px;
        padding: 30px;
        margin: 0 15px;
        background-color: white;
        box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);
    }

    .container header {
        position: relative;
        font-size: 20px;
        font-weight: 600;
        color: #333;
    }

    .container header::before {
        content: "";
        position: absolute;
        left: 0;
        bottom: -2px;
        height: 3px;
        width: 27px;
        border-radius: 8px;
        background-color: #4070f4;
    }

    .container form {
        position: relative;
        margin-top: 16px;
        min-height: 490px;
        background-color: #fff;
        overflow: hidden;
    }

    .container form .form {
        position: absolute;
        background-color: #fff;
        transition: 0.3s ease;
    }

    .container form .form.second {
        opacity: 0;
        pointer-events: none;
        transform: translateX(100%);
    }

    form.secActive .form.second {
        opacity: 1;
        pointer-events: auto;
        transform: translateX(0);
    }

    form.secActive .form.first {
        opacity: 0;
        pointer-events: none;
        transform: translateX(-100%);
    }

    .container form .title {
        display: block;
        margin-bottom: 8px;
        font-size: 16px;
        font-weight: 500;
        margin: 6px 0;
        color: #333;
    }

    .container form .fields {
        display: flex;
        align-items: center;
        justify-content: space-between;
        flex-wrap: wrap;
    }

    form .fields .input-field {
        display: flex;
        width: calc(100% / 3 - 15px);
        flex-direction: column;
        margin: 4px 0;
    }

    .input-field label {
        font-size: 12px;
        font-weight: 500;
        color: #2e2e2e;
    }

    .input-field input,
    select {
        outline: none;
        font-size: 14px;
        font-weight: 400;
        color: #333;
        border-radius: 5px;
        border: 1px solid #aaa;
        padding: 0 15px;
        height: 42px;
        margin: 8px 0;
    }

    .input-field input :focus,
    .input-field select:focus {
        box-shadow: 0 3px 6px rgba(0, 0, 0, 0.13);
    }

    .input-field select,
    .input-field input[type="date"] {
        color: #707070;
    }

    .input-field input[type="date"]:valid {
        color: #333;
    }

    .container form button,
    .backBtn {
        display: flex;
        align-items: center;
        justify-content: center;
        height: 45px;
        max-width: 200px;
        width: 100%;
        border: none;
        outline: none;
        color: #fff;
        border-radius: 5px;
        margin: 25px 0;
        background-color: #4070f4;
        transition: all 0.3s linear;
        cursor: pointer;
    }

    .container form .btnText {
        font-size: 14px;
        font-weight: 400;
    }

    form button:hover {
        background-color: #265df2;
    }

    .nextBtn {
        background-color: #265df2;
        margin: 0 6px;
        margin-right: 14px;
        display: flex;
        align-items: center;
        justify-content: center;
        height: 45px;
        max-width: 200px;
        width: 100%;
        border: none;
        outline: none;
        color: #fff;
        border-radius: 5px;
        margin: 25px 0;
        background-color: #4070f4;
        transition: all 0.3s linear;
        cursor: pointer;
    }

    .nextBtn:hover {
        background-color: #7453ce;
    }

    form button i,
    form .backBtn i {
        margin: 0 6px;
    }


    form .backBtn i {
        transform: rotate(180deg);
    }

    form .buttons {
        display: flex;
        align-items: center;
    }

    form .buttons button,
    .backBtn {
        margin-right: 14px;
    }

    @media (max-width: 750px) {
        .container form {
            overflow-y: scroll;
        }

        .container form::-webkit-scrollbar {
            display: none;
        }

        form .fields .input-field {
            width: calc(100% / 2 - 15px);
        }
    }

    @media (max-width: 550px) {
        form .fields .input-field {
            width: 100%;
        }
    }
    </style>

    <title>Edit Profile</title>
</head>

<body>
    <?php
        if($_SESSION['teacherID'] != NULL or $_SESSION['userID']!= NULL){
    ?>
    <div class="container">
        <header>Edit Profile</header>

        <form action="editProfile.php" method="post">
            <div class="form first">
                <div class="details personal">

                    <div class="fields">
                        <div class="input-field">
                            <label>Email</label>
                            <input type="email" name="mailID" placeholder="Enter Email ID" required>
                        </div>

                        <div class="input-field">
                            <label>New Password</label>
                            <input type="password" name="passW" placeholder="Enter New Password" required>
                        </div>

                        <div class="input-field">
                            <label>Confirm Password</label>
                            <input type="password" name="confPass" placeholder="Confirm Password" required>
                        </div>

                        <div class="input-field">
                            <label>Account Type</label>
                            <select name="role" required>
                                <option disabled selected>Select</option>
                                <option>student</option>
                                <option>teacher</option>
                            </select>
                        </div>

                        <input type="submit" class="nextBtn" name="submit" value="Reset" />

                    </div>
                </div>
        </form>
    </div>

    <?php

        if(isset($_POST['submit']))
        {

            $role = $_POST['role'];
            $email = $_POST['mailID'];  

            $sql = "select *from $role where Mail = '$email'";
            $result = mysqli_query($conn, $sql);  
            $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
            $count = mysqli_num_rows($result);  
            
            if($count == 0){  
                ?>
    <script>
    alert("User Does Not Exist! Try Again");
    </script>
    <?php  
            }

            else{

            if($_POST['passW'] == $_POST['confPass']){

            if($role == 'student'){
                        
                        $user = $_POST['mailID'];  
                        $password = $_POST['passW'];
    
    
                        $sql1 = "UPDATE student SET Pass = '$password' WHERE Mail = '$user'";
                        $result1 = mysqli_query($conn, $sql1);

                        echo "<script>window.location.href='studentProfile2.php?updateSuccess'</script>";
                    }
                        
                    else if($role == 'teacher'){
                        
                        $user = $_POST['mailID'];  
                        $password = $_POST['passW'];
    
    
                        $sql1 = "UPDATE teacher SET Pass = '$password' WHERE Mail = '$user'";
                        $result1 = mysqli_query($conn, $sql1);
                        

                        echo "<script>window.location.href='teacherProfile.php?updateSuccess'</script>";
                    }
                    }
        
                    else{

                        ?>
    <script>
    alert("Passwords do not match. Please try again");
    </script>
    <?php
                    }
                }
        }
    ?>

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
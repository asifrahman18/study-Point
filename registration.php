<?php
session_start();
include('connect.php');
?>

<!DOCTYPE html>

<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8" />
    <title>Registration Form</title>
    <style>
    @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@600&display=swap");

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: "Poppins", sans-serif;
    }

    body {
        /* display: flex;
        height: 100vh;
        justify-content: center;
        align-items: center;
        padding: 10px; */
        background: linear-gradient(135deg, #71b7e6, #9b59b6);
    }

    .container {
        margin-left: 29%;
        margin-top: 5%;
        max-width: 700px;
        width: 100%;
        background: #fff;
        padding: 25px 30px;
        border-radius: 5px;
    }

    .container .title {
        font-size: 25px;
        font-weight: 500;
        position: relative;
    }

    .container .title::before {
        content: "";
        position: absolute;
        left: 0;
        bottom: 0;
        height: 3px;
        width: 30px;
        background: linear-gradient(135deg, #71b7e6, #9b59b6);
    }

    .container form .user-details {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
        margin: 20px 0 12px 0;
    }

    form .user-details .input-box {
        margin-bottom: 15px;
        width: calc(100% / 2 - 20px);
    }

    .user-details .input-box details {
        display: block;
        font-weight: 500;
        margin-bottom: 5px;
    }

    .user-details .input-box input {
        height: 45px;
        width: 100%;
        outline: none;
        border-radius: 5px;
        border: 1px solid #ccc;
        padding-left: 15px;
        font-size: 16px;
        border-bottom-width: 2px;
        transition: all 0.3s ease;
    }

    .user-details .input-box input:focus,
    .user-details .input-box input:valid {
        border-color: #9b59b6;
    }

    .button {
        height: 30px;
        width: 100px;
        margin-left: 45%;
        outline: none;
        color: #fff;
        border: none;
        font-size: 18px;
        font-weight: 500;
        border-radius: 5px;
        letter-spacing: 1px;
        background: linear-gradient(135deg, #71b7e6, #9b59b6);
        cursor: pointer;
    }

    .button:hover {
        background: linear-gradient(135deg, #9b59b6, #71b7e6);
        border: 1px solid black;
        transform: scale(1.1);
        transition: 0.8s;
    }

    #link {
        color: white !important;
        font-weight: 600;
        font-size: 24px;
        margin-left: 13%;
        text-decoration: none;
    }

    #link:hover {
        text-decoration: underline;
    }

    .signup_link a {
        color: #2691d9;
        text-decoration: none;
    }

    .signup_link a:hover {
        text-decoration: underline;
    }
    </style>
    <meta name="viewport" content="width=devce-width, initial-scale=1.0" />
</head>

<body>
    <a href="index.html" id="link">জীবন যুদ্ধ</a>
    <div class="container">
        <div class="title">Registration</div>
        <form action="#">
            <div class="user-details">
                <div class="input-box">
                    <span class="details">Full Name</span>
                    <input type="text" placeholder="Enter Your Name" required />
                </div>
                <div class="input-box">
                    <span class="details">Register As:</span>
                    <form>
                        <label for="user-role"></label>
                        <select id="user-role" name="user-role">
                            <option value="student">Student</option>
                            <option value="teacher">Teacher</option>
                        </select>
                    </form>
                </div>
                <div class="input-box">
                    <span class="details">Email</span>
                    <input type="email" placeholder="Enter Your email" required />
                </div>
                <div class="input-box">
                    <span class="details">Phone Number</span>
                    <input type="text" id="phone" placeholder="Enter Your number" required />
                </div>
                <div class="input-box">
                    <span class="details">Password</span>
                    <input type="password" placeholder="Enter Your password" required />
                </div>
                <div class="input-box">
                    <span class="details">Confirm Password</span>
                    <input type="password" placeholder="Confrim your Password" required />
                </div>
            </div>
            <div class="gender-details">
                <span class="details">Gender:</span>
                <form>
                    <label for="gender"></label>
                    <select id="gender" name="gender">
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                    </select>
                </form>
            </div>
            <div id="details">
                <input type="submit" class="button" value="Register" />
            </div>
            <br />
            <div class="signup_link">
                Already Have An Account?
                <a href="login.html">Login</a>
            </div>
        </form>
    </div>
</body>

</html>
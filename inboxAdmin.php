<?php
session_start();
include('connect.php');
?>

<!DOCTYPE html>
<html>

<head>
    <title>Inbox Page</title>
    <style>
    /* Styles for the inbox page */
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        background-image: url('https://img.freepik.com/premium-vector/flat-back-school-background_23-2149045449.jpg?w=2000');
    }

    .navbar {
        background-color: #333;
        color: #fff;
        padding: 10px;
        display: flex;
        justify-content: flex-end;
    }

    .navbar ul {
        list-style-type: none;
        padding: 0;
        margin: 0;
        display: flex;
        align-items: center;
    }

    .navbar li {
        margin-left: 30px;
    }

    .navbar li:first-child {
        margin-left: auto;
    }

    .navbar li a {
        text-decoration: none;
        color: #fff;
        font-weight: bold;
    }

    .container {

        margin: 0 auto;
        padding: 20px;
    }

    .title {
        font-size: 24px;
        font-weight: bold;
        margin-bottom: 20px;
    }

    .notice-list {
        list-style-type: none;
        padding: 0;
    }

    .notice-item {
        border: 1px solid #ccc;
        border-radius: 5px;
        margin-bottom: 10px;
        padding: 10px;
    }

    .notice-item .title {
        font-weight: bold;
        margin-bottom: 5px;
    }

    .notice-item .date {
        font-size: 12px;
        color: #666;
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
        background-color: black;
        color: #ffffff;
    }

    .boxx {
        float: right;
        margin-right: 150px;
        color: white;
        background: rgb(46, 36, 222);
        background: linear-gradient(90deg,
                rgba(46, 36, 222, 0.6) 0%,
                rgba(51, 205, 245, 0.6) 50%,
                rgba(27, 90, 103, 0.6) 100%);
        padding: 10px;
        border-radius: 5%;
    }
    </style>
</head>

<body>
    <?php
        if($_SESSION['adminID'] != NULL){
    ?>
    <div class="navbar">
        <ul>
            <li><a href="adminProfile.php">Home</a></li>
            <li><a href="inboxAdmin.php">Inbox</a></li>
            <li><a href="index.php">Logout</a></li>
        </ul>
    </div>
    <div class="container">
        <h1 class="title">Inbox</h1>
        <h1 class="title">Admin | Inbox</h1>
        <h1 class="title"><a href="display_pdf.php">View All Documents</a></h1>
        <ul class="notice-list">

            <div class="boxx">
                <p class="seat">Verify a teacher?</p>
                <form name="f2" action="inboxAdmin.php" method="POST">
                    <label class="seat">Enter Email ID</label>
                    <br />
                    <input type="email" name="bid" required />
                    <br />
                    <input type="submit" name="bking" value="Verify" class="btn" />
                    <br />
                </form>
            </div>

            <?php
            if(isset($_POST['bking'])){
                            
                $user = $_POST['bid'];
                
                $sql = "SELECT T_ID FROM teacher WHERE Mail = '$user' and Status ='unverified'";
                
                $result = mysqli_query($conn , $sql);
                $count = mysqli_num_rows($result);
                $row = $result->fetch_assoc();
                if($count==1)
                {
                    $sql2 = "UPDATE teacher SET Status = 'verified' WHERE Mail = '$user'";
                    $result2 = mysqli_query($conn , $sql2);

                    $sql3 = "DELETE FROM verification WHERE mail = '$user'";
                    $result2 = mysqli_query($conn , $sql3);

                    $sql4 = "DELETE FROM pdf_file WHERE mail = '$user'";
                    $result2 = mysqli_query($conn , $sql4);

                    echo "<script>window.location.href='inboxAdmin.php?verification_confirm'</script>";
                }
            }
            ?>

            <table class="zigzag" id="tabl">
                <thead>
                <tbody>
                    <tr>
                        <th class="headr"><b>Email</b></th>
                        <th class="headr"><b>Experience</b></th>
                        <th class="headr"><b>Qualification</b></th>
                        <th class="headr"><b>Specialization</b></th>
                        <th class="headr"><b>Previous Experience</b></th>
                        <th class="headr"><b>Other Skills</b></th>
                    </tr>
                    </thead>
                    <?php
                      
                      $query = "SELECT * FROM verification WHERE 1";
                      
                      $data = mysqli_query($conn,$query);
                      $row = mysqli_fetch_array($data, MYSQLI_ASSOC); 
                      $total = mysqli_num_rows($data);
      
      
                      $result = $conn->query($query); 
                      if ($result->num_rows > 0) {
                      while($row = $result->fetch_assoc()) {
                        $num = 1;

                ?>
                    <div class="title"></div>
                    <div class="content">
                        <tr>
                            <td><?php echo $row["mail"]; ?></td>
                            <td><?php echo $row["experience"]; ?></td>
                            <td><?php echo $row["qualification"]; ?></td>
                            <td><?php echo $row["specialization"]; ?></td>
                            <td><?php echo $row["prevExp"]; ?></td>
                            <td><?php echo $row["other"]; ?></td>
                        </tr>

                        <?php

                          
                        }
                        }

                    ?>
                    </div>
                </tbody>
            </table>
        </ul>
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
<?php
session_start();
include('connect.php');
?>

<?php

// Query the data from the table
$query = "SELECT S_ID, Name, Mail FROM student WHERE 1";
$result = mysqli_query($conn, $query);

// Process the form submission
if (isset($_POST['selected_id'])) {

    $selectedID = $_POST['selected_id'];


    $_SESSION['testID'] = $selectedID;


    header('Location: test.php');
    exit();
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Grid Example</title>
    <style>
    table {
        border-collapse: collapse;
    }

    th,
    td {
        padding: 5px;
        border: 1px solid #ccc;
    }
    </style>
</head>

<body>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Mail</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = mysqli_fetch_assoc($result)) { ?>
            <tr>
                <td><?php echo $row['S_ID']; ?></td>
                <td><?php echo $row['Name']; ?></td>
                <td><?php echo $row['Mail']; ?></td>
                <td>
                    <form method="post" action="dummy.php">
                        <input type="hidden" name="selected_id" value="<?php echo $row['S_ID']; ?>">
                        <button type="submit">Process</button>
                    </form>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</body>

</html>
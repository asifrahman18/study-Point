<?php

session_start();
include('connect.php');



$rec = $_SESSION['course'];
$rec2 = $_SESSION['cat'];

echo $rec;
echo $rec2;



?>
<?php

session_start();
include('connect.php');



$rec = $_SESSION['course'];

echo $rec;



?>
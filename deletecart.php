<?php
session_start();
require_once 'inc/config.php';
//delte order
$userID= $_SESSION['ID'];
$name= $_GET['name'];


$sql = "DELETE FROM cart WHERE UserID='$userID' AND Name='$name'";
$result = mysqli_query($conn, $sql);

header("Location: dashboard.php");


?>
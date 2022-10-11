<?php
session_start();
require_once 'inc/config.php';

$userID= $_SESSION['ID'];


    $sql2 = "SELECT * FROM cart WHERE UserID='$userID'";
    $result2 = mysqli_query($conn, $sql2);

    if(mysqli_num_rows($result2)>0)
    {

        $sql3 = "UPDATE cart SET Status='1' WHERE UserID='$userID'";
        $result3 = mysqli_query($conn, $sql3);
        
    }
    else
    {
        header("Location: dashboard.php?errorlogin=The Item Already sold Out");
    }

    header("Location: dashboard.php?errorlogin:All Item Already Paid");



?>
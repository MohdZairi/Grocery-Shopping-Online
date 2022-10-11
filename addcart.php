<?php
session_start();
require_once 'inc/config.php';
//upload order into dashboard
$name= $_GET['name'];
$userID= $_SESSION['ID'];

$sql = "SELECT * FROM product WHERE Name='$name'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$image=$row['Picture'];
$price=$row['Price'];

$quantity= 1;

//selection
if(mysqli_num_rows($result)>0)
{
    $sql2 = "SELECT * FROM cart WHERE Name='$name' AND UserID='$userID'";
    $result2 = mysqli_query($conn, $sql2);

    if(mysqli_num_rows($result2)===1)
    {

        $quantity=$quantity+1;
        $sql3 = "UPDATE cart SET quantity='$quantity' WHERE UserID='$userID' AND Name='$name'";
        $result3 = mysqli_query($conn, $sql3);
        $price=$price*$quantity;
        $sql4 = "UPDATE cart SET Price='$price' WHERE UserID='$userID' AND Name='$name'";
        $result4 = mysqli_query($conn, $sql4);
        
    }
    else
    {
        $sql2 = "INSERT INTO cart (Name,Quantity,Price,Image,UserID	) VALUES('$name','$quantity','$price','$image','$userID')";
		$result2 = mysqli_query($conn, $sql2);
    }

    header("Location: dashboard.php");
}
else
{
    header("Location: dashboard.php?errorlogin=The Item Already sold Out");
}

?>
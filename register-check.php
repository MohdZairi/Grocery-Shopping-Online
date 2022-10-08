<?php
require_once "inc/config.php";

if(isset($_POST["submit_form"]))
{
	 function validate_data($data)
	 {
	  $data = trim($data);
	  $data = stripslashes($data);
	  $data = strip_tags($data);
	  $data = htmlspecialchars($data);
	  return $data;    
	 }

	 $error="" ;
	 $fullname = validate_data( $_POST['FullName'] );
	 $username = validate_data( $_POST['UserName'] );
	 $phone = validate_data( $_POST['Telephone'] );
	 $email = validate_data( $_POST['EMail'] );
	 $address = validate_data( $_POST['Address'] );
	 $password = validate_data( $_POST['Password'] );
	 $imageName = $_FILES["image"]["name"];
     $imageSize = $_FILES["image"]["size"];
     $tmpName = $_FILES["image"]["tmp_name"];

     $imageExtension = explode('.', $imageName);
     $imageExtension = strtolower(end($imageExtension));

	$sql = "SELECT * FROM user WHERE Email='$email' ";
	$result = mysqli_query($conn, $sql);
	if (mysqli_num_rows($result) > 0) 
	{
		header("Location: register.php?error=This email ".$email." is already taken");
	}
	else
	{
		$newImageName = "img/".$username . " - " . date("Y.m.d") . " - " . date("h.i.sa"); // Generate new image name
        $newImageName .= '.' . $imageExtension;
		$sql2 = "INSERT INTO user (FullName,UserName,Password,Phone,Email,Address,Picture) VALUES('$fullname','$username','$password','$phone','$email','$address',' $newImageName')";
		$result2 = mysqli_query($conn, $sql2);
		if ($result2) 
		{	
			move_uploaded_file($tmpName, $newImageName);
		   //header("Location: register.php?error=Your account has been created successfully");
			header("Location: index.php?error=Your account has been created successfully");
			exit();
		}
		else 
		{
		   header("Location: register.php?error=Unknown error occurred");
		   
		} 
		
	}
	
	
	 
  
}
 
    
?>
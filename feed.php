<?php
session_start();
require_once "inc/config.php";

if(isset($_POST["feedback_form"]))
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
     $image =$_SESSION['Picture'];
	 $email = validate_data( $_POST['EMail'] );
	 $subject = validate_data( $_POST['Subject'] );
	 $content = validate_data( $_POST['Content'] );
	 $rating = validate_data( $_POST['Rating'] );
     

		$sql2 = "INSERT INTO feedback (Email,Subject,Content,Rating,Picture) VALUES('$email','$subject','$content','$rating','$image')";
		$result2 = mysqli_query($conn, $sql2);
		if ($result2) 
		{	
			header("Location: dashboard.php?error=Your feedback has been recorded");
			exit();
		}
		else 
		{
		   header("Location: dashboard.php?error=Unknown error occurred");
		   
		} 
		
	
	
	
	 
  
}
 
    
?>
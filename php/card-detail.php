<?php
	//Variables gotten from form to be used in session
	//$fname = $_POST['fname'];
	$card_type = $_POST['car'];
	$card_no = $_POST['email'];
	$cvv = $_POST['username'];
	$exp_date = $_POST['password'];
	// Secure password using has + salting
	//$hash = password_hash($password, PASSWORD_DEFAULT);

	//Database connection
	$conn = new mysqli('localhost','root','password','cc_gen');
	if($conn->connect_error){
		die('Connection Failed : '.$conn->connect_error);
	}else{
		// mysql statement to write into the database
		$stmt = $conn->prepare("insert into card_details (card_type, card_number, cvv, expiry_date, username) values (?, ?, ?, ?, ?)");
		$stmt->bind_param("sssss",$fname, $lname, $email, $username, $hash);
		$stmt->execute();
		echo "Registration Successful...";
		//close connection to database and return to sign in page
		$stmt->close();
		$conn->close();
		header("location: html/dashboard.php");
	}
?>

<?php
	session_start();
    //if(isset($_POST['ctype'])) {
	//Variables gotten from form to be used in session
	//$fname = $_POST['fname'];
	$card_type = $_POST['ctype'];
	$card_no = $_POST['cnumber'];
	$cvv = $_POST['cardvv'];
	$exp_date = $_POST['expDate'];
	// Secure password using has + salting
	//$hash = password_hash($password, PASSWORD_DEFAULT);

	//Database connection
	$conn = new mysqli('localhost','root','password','cc_gen');
	if($conn->connect_error){
		die('Connection Failed : '.$conn->connect_error);
	}else{
		// mysql statement to write into the database
		$stmt = $conn->prepare("insert into card_details (card_type, card_number, cvv, expiry_date, username) values (?, ?, ?, ?, ?)");
		$stmt->bind_param("sssss",$card_type, $card_no, $cvv, $exp_date, $_SESSION['username']);
		$stmt->execute();
		//echo "Registration Successful...";
		//close connection to database and return to sign in page
		$stmt->close();
		$conn->close();
		header("location: ../html/dashboard.php");
	}
    //}
?>

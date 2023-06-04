<?php
	$fname = $_POST['fname'];
	$lname = $_POST['lname'];
	$email = $_POST['email'];
	$username = $_POST['username'];
	$password = $_POST['password'];
	$hash = password_hash($password, PASSWORD_DEFAULT);

	//Database connection
	$conn = new mysqli('localhost','root','password','cc_gen');
	if($conn->connect_error){
		die('Connection Failed : '.$conn->connect_error);
	}else{
		$stmt = $conn->prepare("insert into Customer (firstname, surname, email, username, password) values (?, ?, ?, ?, ?)");
		$stmt->bind_param("sssss",$fname, $lname, $email, $username, $hash);
		$stmt->execute();
		echo "Registration Successful...";
		$stmt->close();
		$conn->close();
		header("location: html/sign-in.html");
	}
?>

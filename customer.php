<?php
	$fname = $_POST['fname'];
	$lname = $_POST['lname'];
	$email = $_POST['email'];
	$username = $_POST['username'];
	$password = $_POST['password'];

	//Database connection
	$conn = new mysqli('localhost','root','','CC_generator');
	if($conn->connect_error){
		die('Connection Failed : '.$conn->connect_error);
	}else{
		$stmt = $conn->prepare("insert into Customer (firstname, surname, email, username, password) values (?, ?, ?, ?, ?)");
		$stmt->bind_param("sssss",$fname, $lname, $email, $username, $password);
		$stmt->execute();
		echo "Registration Successful...";
		$stmt->close();
		$conn->close();
		header("location: sign-in.html");
	}
?>
<?php
	session_start();
	//Variables gotten from form to be used in session
	$fname = $_POST['fname'];
	$lname = $_POST['lname'];
	$email = $_POST['email'];
	$new_username = $_POST['username'];
	//$password = $_POST['password'];
	//$hash = password_hash($password, PASSWORD_DEFAULT);

	//Database connection
	$conn = new mysqli('localhost','root','password','cc_gen');
	if($conn->connect_error){
		die('Connection Failed : '.$conn->connect_error);
	}else{
		// mysql statement to write into the database
		$stmt = $conn->prepare("update Customer set firstname=?, surname=?, email=?, username=? WHERE username=?");
		$stmt->bind_param("sssss",$fname, $lname, $email, $new_username, $_SESSION['username']);
		$stmt->execute();
		$_SESSION["username"] = $new_username;
                $_SESSION["firstname"] = $fname;
                $_SESSION["surname"] = $lname;
                $_SESSION["email"] = $email;
		echo "Edited Successfully...";
		//close connection to database and return to sign in page
		header("location: ../html/dashboard.php");
		$stmt->close();
		$conn->close();
	}
?>

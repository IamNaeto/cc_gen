<?php
	session_start();

	$usename = $_POST['username'];
	$pwd = $_POST['password'];
	$unamecheck = "SELECT * FROM Customer WHERE username = '$usename'";

	//Database connection
	$conn = new mysqli('localhost','root','password','cc_gen');
	if($conn->connect_error){
		die('Connection Failed : '.$conn->connect_error);
	}else{
		$result = mysqli_query($conn, $unamecheck);

		if (mysqli_num_rows($result) > 0) {
    			// Username exists, now verify the password
    			$row = mysqli_fetch_assoc($result);
    			$storedPassword = $row['password'];

    			if (password_verify($pwd, $storedPassword)) {
        			// Password is correct
				echo "Login successful!";
				$_SESSION["username"] = $row['username'];
				$_SESSION["firstname"] = $row['firstname'];
				$_SESSION["surname"] = $row['surname'];
				header("location: ../html/card-library.php");
    			} else {
        			// Password is incorrect
     	   			echo "Incorrect password!";
				//header("location: ../html/sign-in.html");
    			}
		} else {
    			// Username does not exist
			echo "Username not found!";
			//header("location: ../html/sign-in.html");
		}	
		// Close the database connection
		mysqli_close($conn);
	}
?>

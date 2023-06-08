<?php
	session_start();
	if (isset($_SESSION['username'])) {
		echo '<script type="text/javascript">
			window.location.href = "../index.html";
			document.addEventListener("DOMContentLoaded", function() {
                		document.getElementById("in-out").innerHTML = "Sign Out";
                		document.getElementById("in-out-link").href = "/php/logout.php";
                		document.getElementById("reg-dash").innerHTML = "Dashboard";
                		document.getElementById("reg-dash-link").href = "/index.html";
            		});
			</script>';
		exit();	
	} else {
		header("Location: ../index.html");
		exit();
	}

?>


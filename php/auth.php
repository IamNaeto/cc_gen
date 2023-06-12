<?php
// This checks if a user is signed in to access the card generator
session_start();
if($_SESSION["username"]) {
	header("Location:../html/card-gen.php");
} else {
	header("Location:../html/sign-in.html");
}
?>

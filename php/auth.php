
<?php
session_start();
if($_SESSION["username"]) {
	header("Location:../html/card-gen.html");
} else {
	header("Location:../html/sign-in.html");
}
?>

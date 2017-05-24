<?php
    session_start();
    session_unset();
    session_destroy();
    session_write_close();
    setcookie(session_name(),'',0,'/');
    session_regenerate_id(true);
	
	$default_password = "Test1";
	$password = "";
	
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$password = trim($_POST["password"]);
		if ($password == $default_password) {
			session_start();
			$_SESSION["is_logged_in"] = "logged";
			header("Location: ./galleries.php");
		} else {
			header("Location: ./unauthorized.php");
		}
	} else {
		header("Location: ./unauthorized.php");
	}
?>
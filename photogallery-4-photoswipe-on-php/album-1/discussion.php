<?php
    session_start();
	if (isset($_SESSION["is_logged_in"]) && $_SESSION["is_logged_in"] == "logged") {

		$name = $commentary = $datetime = "";

		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			$name = cleanXss($_POST["name"]);
			$commentary = cleanXss($_POST["commentary"]);
			$datetime = date('Y-m-d H:i:s');
			
			$myfile = fopen("discussion.txt", "a") or die("Unable to open file!");
			$text = "\"".$datetime."\";;; \"".$name."\";;; \"".$commentary."\"\n";
			fwrite($myfile, $text);
			fclose($myfile);
		}
		
		header("Location: ./index.php");
	} else {
		header("Location: ./../unauthorized.php");
	}
	
	function cleanXss($data) {
	  $data = trim($data);
	  $data = stripslashes($data);
	  $data = htmlspecialchars($data);
	  return $data;
	}
?>
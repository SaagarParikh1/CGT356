<?php
session_start();

	$_SESSION["name"] = "";
	$_SESSION["address"] = "";
	$_SESSION["city"] = "";
	$_SESSION["state"] = "";
	$_SESSION["zip"] = "";
	$_SESSION["counry"] = "";
	$_SESSION["phone"] = "";
	$_SESSION["email"] = "";
	$_SESSION["comments"] = "";
	$_SESSION["Sname"] = "";
	$_SESSION["Saddress"] = "";
	$_SESSION["Scity"] = "";
	$_SESSION["Sstate"] = "";
	$_SESSION["Szip"] = "";
	$_SESSION["Scounry"] = "";
	$_SESSION["errorMessage"] = "";

session_unset();
session_destroy();
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Assign 04 - finishedUpdate page</title>
</head>

<body>
	<h1 style="font-size: 14pt; text-indent: 360px;">Assign 04 - finishedUpdate page</h1>
	<p>Your information has been successfully updated in our database.</p>
	
	<p>Return to the <a href="index.php">Index page</a></p>
</body>
</html>
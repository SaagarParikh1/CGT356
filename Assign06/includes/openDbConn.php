<?php

@ $db = mysqli_connect("goss.tech.purdue.edu", "cgt356web1p", "Colleague1p4680");
mysqli_select_db($db, "cgt356web1p") or die(mysqli_error());

if(!$db)
{
	echo ("Error: Could not connect to database. Please try again later.");
	exit;
}
?>
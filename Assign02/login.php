<?php
$userID = $_POST["userID"];
$passwd = $_POST["passwd"];

if( ($userID=="page1") && ($passwd=="alpha"))
	header("Location:page1.php");
if( ($userID=="page2") && ($passwd=="beta"))
	header("Location:page2.php");
if( ($userID=="page3") && ($passwd=="gamma"))
	header("Location:page3.php");
else
	header("Location:error.php");


if( $userID =="page1")
{
	if( $passwd == "alpha")
	{
		header("Location:page1.php");
	}

	else
	{
		header("Location:error.php");
}
}
else if( $userID == "page2")
{
	if($passwd == "beta")
	{
		header("Location:page2.php");
	}
	else
	{
		header("Location:error.php");
}
}
else if( $userID == "page3")
{
	if($passwd == "gamma")
	{
		header("Location:page3.php");
	}
	else
	{
		header("Location:error.php");
}
}
else
{
	header("Location:error.php");
}

?>
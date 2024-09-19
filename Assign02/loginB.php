<?php
$userID = $_POST["userID"];
$passwd = $_POST["passwd"];

if( ($userID=="page1B") && ($passwd=="alpha"))
	header("Location:page1B.php");
if( ($userID=="page2B") && ($passwd=="beta"))
	header("Location:page2B.php");
if( ($userID=="page3B") && ($passwd=="gamma"))
	header("Location:page3B.php");
if( ($userID=="page4B") && ($passwd=="delta"))
	header("Location:page4B.php");
else
	header("Location:errorB.php");


if( $userID =="page1B")
{
	if( $passwd == "alpha")
	{
		header("Location:page1B.php");
	}

	else
	{
		header("Location:errorB.php");
}
}
else if( $userID == "page2B")
{
	if($passwd == "beta")
	{
		header("Location:page2B.php");
	}
	else
	{
		header("Location:errorB.php");
}
}
else if( $userID == "page3B")
{
	if($passwd == "gamma")
	{
		header("Location:page3B.php");
	}
	else
	{
		header("Location:errorB.php");
}
}
else if( $userID == "page4B")
{
	if($passwd == "delta")
	{
		header("Location:page4B.php");
	}
	else
	{
		header("Location:errorB.php");
}
}
else
{
	header("Location:errorB.php");
}

?>
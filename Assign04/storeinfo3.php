<?php
session_start();
header("Cache-Control: no-cache");


if(!empty ($_POST["projectID"]))
	$_SESSION["projectID"] = $_POST["projectID"];
if(!empty ($_POST["projectName"]))
	$_SESSION["projectName"] = $_POST["projectName"];
if(!empty ($_POST["projectDescription"]))
	$_SESSION["projectDescription"] = $_POST["projectDescription"];
if(!empty ($_POST["managerName"]))
	$_SESSION["managerName"] = $_POST["managerName"];
if(!empty ($_POST["managerEmail"]))
	$_SESSION["managerEmail"] = $_POST["managerEmail"];
if(!empty ($_POST["managerPhone"]))
	$_SESSION["managerPhone"] = $_POST["managerPhone"];

	if((empty($POST["projectID"])) || empty($_POST["projectName"]) ||
	empty($POST["projectDescription"]) || empty($_POST["managerName"]) ||
	empty($POST["managerEmail"]) || empty($_POST["managerPhone"]))

{
	$_SESSION["errorMessage"] = "* Please fill out all of the required form elements";
	header("Location:index3.php");
	exit;
	
}
	
	
if( empty($_POST["SprojectID"]))
{
	$_SESSION["SprojectID"] = $_SESSION["projectID"];
	$_SESSION["SprojectName"] = $_SESSION["projectName"];
	$_SESSION["SprojectDescription"] = $_SESSION["projectDescription"];
	$_SESSION["SmanagerName"] = $_SESSION["managerName"];
	$_SESSION["SmanagerEmail"] = $_SESSION["managerEmail"];
	$_SESSION["SmanagerPhone"] = $_SESSION["managerPhone"];
}

else
{
	$_SESSION["SprojectID"] = $_POST["SprojectID"];
	$_SESSION["SprojectName"] = $_POST["SprojectName"];
	$_SESSION["SprojectDescription"] = $_POST["SprojectDescription"];
	$_SESSION["SmanagerName"] = $_POST["SmanagerName"];
	$_SESSION["SmanagerEmail"] = $_POST["SmanagerEmail"];
	$_SESSION["SmanagerPhone"] = $_POST["SmanagerPhone"];
}

header("Location:displayInfo3.php");
?>
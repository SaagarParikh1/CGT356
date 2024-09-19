<?php
session_start();
header("Cache-Control: no-cache");


if(!empty($_POST["make"]))
    $_SESSION["make"] = $_POST["make"];
if(!empty($_POST["model"]))
    $_SESSION["model"] = $_POST["model"];
if(!empty($_POST["year"]))
    $_SESSION["year"] = $_POST["year"];
if(!empty($_POST["color"]))
    $_SESSION["color"] = $_POST["color"];
if(!empty($_POST["mileage"]))
    $_SESSION["mileage"] = $_POST["mileage"];
if(!empty($_POST["priceBought"]))
    $_SESSION["priceBought"] = $_POST["priceBought"];
if(!empty($_POST["countryOfOrigin"]))
	$_SESSION["countryOfOrigin"] = $_POST["countryOfOrigin"];
if(!empty($_POST["previouslyOwned"]))
	$_SESSION["previouslyOwned"] = $_POST["previouslyOwned"];
if(!empty($_POST["registrationNumber"]))
	$_SESSION["registrationNumber"] = $_POST["registrationNumber"];
if(!empty($_POST["accidents"]))
	$_SESSION["accidents"] = $_POST["accidents"];
if(!empty($_POST["lastInspection"]))
	$_SESSION["lastInspection"] = $_POST["lastInspection"];
if(!empty($_POST["AdditionalModifications"]))
	$_SESSION["AdditionalModifications"] = $_POST["AdditionalModifications"];



if (empty($_POST["make"]) || empty($_POST["model"]) ||
    empty($_POST["year"]) || empty($_POST["color"]) ||
    empty($_POST["mileage"]) || empty($_POST["priceBought"])
	empty($_POST["countryOfOrigin"]) || empty($_POST["previouslyOwned"]) ||
	empty($_POST["registrationNumber"]) || empty($_POST["accidents"]) ||
	empty($_POST["lastInspection"]) || empty($_POST["AdditionalModifications"]))
{
    $_SESSION["errorMessage"] = "* Please fill out all of the required vehicle information";
    header("Location:index2.php");
    exit;
}

if(empty($_POST["Smake"]))
{
    $_SESSION["Smake"] = $_SESSION["make"];
    $_SESSION["Smodel"] = $_SESSION["model"];
    $_SESSION["Syear"] = $_SESSION["year"];
    $_SESSION["Scolor"] = $_SESSION["color"];
    $_SESSION["Smileage"] = $_SESSION["mileage"];
    $_SESSION["SpriceBought"] = $_SESSION["priceBought"];
}
else
{
    $_SESSION["Smake"] = $_POST["Smake"];
    $_SESSION["Smodel"] = $_POST["Smodel"];
    $_SESSION["Syear"] = $_POST["Syear"];
    $_SESSION["Scolor"] = $_POST["Scolor"];
    $_SESSION["Smileage"] = $_POST["Smileage"];
    $_SESSION["SpriceBought"] = $_POST["SpriceBought"];
}

header("Location:displayInfo2.php");
?>
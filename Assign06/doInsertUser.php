<?php
session_start();
$userID = $_POST["userID"];
$lastName = addslashes( $_POST["LastName"] );
$firstName = addslashes($_POST["FirstName"] );
$title = addslashes( $_POST["Title"] );

$removeThese = array ("<?php", "<?", "</", "<", "?>", "/>", ">", ";");
$lastName = str_replace($removeThese, "", $lastName);
$firstName= str_replace($removeThese, "", $firstName);
$title = str_replace($removeThese, "", $title);

if( ($userID == "") || ($lastName == "") || ($firstName == "") || ($title == "") )
{
$_SESSION["errorMessage"] = "You must enter a value for all boxes!"; 
header("Location: insertUser.php");
exit;
}
else if( !is_numeric( $userID ) )
{

$_SESSION["errorMessage"] = "You must enter a number for UserID!";
header ("Location: insertUser.php");
exit;
}
else
{
$_SESSION["errorMessage"] = "";
}
include("includes/OpenDbConn.php");

$sql = "SELECT UserID FROM usersLab5 WHERE UserID=".$userID;
echo ($sql."<br/>");

$result = mysqli_query($db, $sql);
if (empty($result))
$num_results = 0;
else
$num_results = mysqli_num_rows($result);
if( $num_results != 0 )
	{
	$_SESSION["errorMessage"] = "The UserID you entered already exists!";
header ("Location: insertUser.php");
exit;
}
else
{
$_SESSION["errorMessage"] = "";
}

$sql = "INSERT INTO usersLab5 (UserID, LastName, FirstName, Title) VALUES (".$userID.", '".$lastName."', '".$firstName."', '".$title."')"; 
echo ($sql."<br/>");

$result = mysqli_query($db, $sql);

include("includes/CloseDbConn.php");

header ("Location: select.php");
exit;
?>
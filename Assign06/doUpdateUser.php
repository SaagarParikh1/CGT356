<?php
session_start();

$userID = $_POST["userID"];
$lastName = addslashes($_POST["LastName"] ); 
$firstName = addslashes( $_POST["FirstName"] );
$title = addslashes( $_POST["Title"] );

$removeThese = array("<?php", "<?", "</", "<", "?>", "/>", ">", ";"); 
$lastName = str_replace($removeThese, "", $lastName);
$firstName = str_replace($removeThese, "", $firstName);
$title = str_replace($removeThese, "", $title);

if( empty($userID ) )
{
header("Location: select.php");
exit;
}
include("includes/OpenDbConn.php");
$sql = "UPDATE usersLab5 SET FirstName='".$firstName."', LastName='".$lastName."', Title='".$title."' WHERE UserID=".$userID; 
echo ($sql); 

$result = mysqli_query($db, $sql);

include("includes/CloseDbConn.php");
header("Location: select.php");
?>
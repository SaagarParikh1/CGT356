<?php
session_start();

$ProjectID = $_POST["projectID"];
$ProjName = addslashes($_POST["projName"]);
$ProjCategory = $_POST["projCategory"];
$ProjDescript = addslashes($_POST["projDescription"]);
$StartMonth = $_POST["startMonth"];
$StartDay = $_POST["startDay"];
$EndMonth = $_POST["endMonth"];
$EndDay = $_POST["endDay"];

$removeThese = array("<?php", "<?", "</", "<", "?>", "/>", ">", ";");
$ProjName = str_replace($removeThese, "", $ProjName);
$ProjDescript = str_replace($removeThese, "", $ProjDescript);

if (($ProjectID == "") || ($ProjName == "- Make -") || ($ProjCategory == "- Category -")|| ($ProjDescript == "")|| ($StartMonth == "- Month -")|| ($StartDay == "- Day -") || ($EndMonth == "- Month -")|| ($EndDay == "- Day -")) {
    // Check for empty form values
    $_SESSION["errorMessage"] = "You must enter a value for all boxes!";
    header("Location: updateProject.php");
    exit;
} else if (!is_numeric($CarID)) {
    $_SESSION["errorMessage"] = "You must enter a number for Project ID!";
    header("Location: updateProject.php");
    exit;
} else {
    $_SESSION["errorMessage"] = "";
}

include("includes/openDbConn.php");


$StartDate = $StartMonth." ".$StartDay;
$EndDate = $EndMonth." ".$EndDay;


$sql = "UPDATE Assign06Projects SET ProjName='".$ProjName."', ProjCategory='".$ProjCategory."', ProjDescript='".$ProjDescript."', StartDate='".$StartDate."', EndDate='".$EndDate."' WHERE ProjectID=".$ProjectID;


$result = mysqli_query($db, $sql);

if ($result === false) {
    die("Error in SQL query: " . mysqli_error($db));
}

include("includes/closeDbConn.php");

header("Location: select.php");
exit;
?>

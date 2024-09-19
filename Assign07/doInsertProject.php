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
    header("Location: insertProject.php");
    exit;
} else if (!is_numeric($CarID)) {
    $_SESSION["errorMessage"] = "You must enter a number for Project ID!";
    header("Location: insertProject.php");
    exit;
} else {
    $_SESSION["errorMessage"] = "";
}

include("includes/openDbConn.php");
$sql = "SELECT ProjectID FROM Assign06Projects WHERE ProjectID=" .$ProjectID;
echo($sql);
exit;

$result = mysqli_query($db, $sql);

if ($result === false) {
    die("Error in SQL query: " . mysqli_error($db));
}

$num_results = mysqli_num_rows($result);

if ($num_results != 0) {
    $_SESSION["errorMessage"] = "The Project ID you entered already exists!";
    header("Location: insertProject.php");
    exit;
} else {
    $_SESSION["errorMessage"] = "";
}

$StartDate = $StartMonth." ".$StartDay;
$EndDate = $EndMonth." ".$EndDay;


$sql = "INSERT INTO Assign06Projects (ProjectID, ProjName, ProjCategory, ProjDesc, StartDate, EndDate) VALUES(" . $ProjectID . ", '" . $ProjName . "', '" . $ProjCategory . "', '" . $ProjDescript . "', '" . $StartDate . "', '" . $EndDate . "')";

$result = mysqli_query($db, $sql);

if ($result === false) {
    die("Error in SQL query: " . mysqli_error($db));
}

include("includes/closeDbConn.php");

header("Location: select.php");
exit;
?>

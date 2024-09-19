<?php
session_start();

$CarID = $_POST["carID"];
$CarMake = $_POST["carMake"];
$CarModel = addslashes($_POST["carModel"]);
$CarYear = $_POST["carYear"];
$CarColor = addslashes($_POST["carColor"]);
$CarHybrid = $_POST["carHybrid"];

$removeThese = array("<?php", "<?", "</", "<", "?>", "/>", ">", ";");
$CarModel = str_replace($removeThese, "", $CarModel);
$CarColor = str_replace($removeThese, "", $CarColor);

if(empty($CarID))
    header("Location:select.php");

if (($CarID == "") || ($CarMake == "- Make -") || ($CarModel == "")|| ($CarYear == "")|| ($CarColor == "")|| ($CarHybrid == "")) {
    // Check for empty form values
    $_SESSION["errorMessage"] = "You must enter a value for all boxes!";
    header("Location: updateCar.php");
    exit;
} else if (!is_numeric($CarID)) {
    $_SESSION["errorMessage"] = "You must enter a number for Car ID!";
    header("Location: updateCar.php");
    exit;
} else {
    $_SESSION["errorMessage"] = "";
}

include("includes/openDbConn.php");


$sql = "UPDATE Assign06Cars SET CarMake='".$CarMake."', CarModel='".$CarModel."', CarYear='".$CarYear."', CarColor='".$CarColor."', CarHybrid='".$CarHybrid."' WHERE CarID=".$CarID.;
//echo($sql);
//exit;

$result = mysqli_query($db, $sql);

if ($result === false) {
    die("Error in SQL query: " . mysqli_error($db));
}

include("includes/closeDbConn.php");

header("Location: select.php");
exit;
?>

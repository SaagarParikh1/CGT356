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

if (($CarID == "") || ($CarMake == "- Make -") || ($CarModel == "")|| ($CarYear == "")|| ($CarColor == "")|| ($CarHybrid == "")) {
    // Check for empty form values
    $_SESSION["errorMessage"] = "You must enter a value for all boxes!";
    header("Location: insertCar.php");
    exit;
} else if (!is_numeric($CarID)) {
    $_SESSION["errorMessage"] = "You must enter a number for Car ID!";
    header("Location: insertCar.php");
    exit;
} else {
    $_SESSION["errorMessage"] = "";
}

include("includes/openDbConn.php");
$sql = "SELECT CarID FROM Assign06Cars WHERE CarID=" .$CarID;
echo($sql);
exit;

$result = mysqli_query($db, $sql);

if ($result === false) {
    die("Error in SQL query: " . mysqli_error($db));
}

$num_results = mysqli_num_rows($result);

if ($num_results != 0) {
    $_SESSION["errorMessage"] = "The Car ID you entered already exists!";
    header("Location: insertCar.php");
    exit;
} else {
    $_SESSION["errorMessage"] = "";
}

$sql = "INSERT INTO Assign06Cars (CarID, CarMake, CarModel, CarYear, CarColor, CarHybrid) VALUES(" . $CarID . ", '" . $CarMake . "', '" . $CarModel . "', '" . $CarYear . "', '" . $CarColor . "', '" . $CarHybrid . "')";

$result = mysqli_query($db, $sql);

if ($result === false) {
    die("Error in SQL query: " . mysqli_error($db));
}

include("includes/closeDbConn.php");

header("Location: select.php");
exit;
?>

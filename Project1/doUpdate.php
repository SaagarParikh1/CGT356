<?php
session_start();
$BookID = $_POST["bookID"];
$Title = $_POST["title"];
$Author = $_POST["author"];
$Topic = addslashes($_POST["topic"]);
$Genre = addslashes($_POST["genre"]);
$Isbn = $_POST["isbn"];
$DatePublished = $_POST["year"] . "-" . $_POST["month"] . "-" . $_POST["day"];
$Hardcover = $_POST["hardcover"];

$removeThese = array("<?php", "<?", "</", "<", "?>", "/>", ">", ";");
$Topic = str_replace($removeThese, "", $Topic);
$Genre = str_replace($removeThese, "", $Genre);

if (empty($BookID)) {
    header("Location: select.php");
    exit;
}

if (($BookID == "") || ($Title == "- Make -") || ($Author == "") || ($Topic == "") || ($Genre == "") || ($Isbn == "") || ($DatePublished == "") || ($Hardcover == "")) {
    $_SESSION["errorMessage"] = "You must enter a value for all boxes!";
    header("Location: update.php");
    exit;
} elseif (!is_numeric($BookID)) {
    $_SESSION["errorMessage"] = "You must enter a number for Book ID!";
    header("Location: update.php");
    exit;
} else {
    $_SESSION["errorMessage"] = "";
}

include("includes/OpenDbConn.php");
$sql = "UPDATE P1Books SET BookID='".$BookID."', Title='".$Title."', Topic='".$Topic."', Genre='".$Genre."', Isbn='".$Isbn."', DatePublished='".$DatePublished."', Hardcover='".$Hardcover."' WHERE BookID=".$BookID;

$result = mysqli_query($db, $sql);

if ($result === false) {
    die("Error in SQL query: " . mysqli_error($db));
}

include("includes/closeDbConn.php");

header("Location: select.php");
exit;
?>

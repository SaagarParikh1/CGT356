<?php

session_start();
$BookID = $_POST["bookID"];
$Title = $_POST["title"];
$Author = $_POST["author"];
$Topic = $_POST["topic"];
$Genre = $_POST["genre"];
$Isbn = $_POST["isbn"];
$DatePublished = $_POST["year"] . "-" . $_POST["month"] . "-" . $_POST["day"];
$Hardcover = isset($_POST["hardcover"]) ? $_POST["hardcover"] : "";

$removeThese = array("<?php", "<?", "</", "<", "?>", "/>", ">", ";");

if (empty($BookID) || empty($Title) || empty($Author) || empty($Topic) || empty($Genre) || empty($Isbn) || empty($DatePublished) || empty($Hardcover)) {
    $_SESSION["errorMessage"] = "You must enter a value for all boxes!";
    header("Location: insert.php");
    exit;
} elseif (!is_numeric($BookID)) {
    $_SESSION["errorMessage"] = "You must enter a number for BookID!";
    header("Location: insert.php");
    exit;
} else {
    $_SESSION["errorMessage"] = "";
}

include("includes/OpenDbConn.php");

$sql = "SELECT BookID FROM P1Books WHERE BookID=?";
$stmt = mysqli_prepare($db, $sql);
mysqli_stmt_bind_param($stmt, "i", $BookID);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

if (mysqli_num_rows($result) != 0) {
    $_SESSION["errorMessage"] = "The Book ID you entered already exists!";
    header("Location: insert.php");
    exit;
} else {
    $_SESSION["errorMessage"] = "";
}

$sql = "INSERT INTO P1Books (BookID, Title, Author, Topic, Genre, ISBN, DatePublished, Hardcover) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
$stmt = mysqli_prepare($db, $sql);
mysqli_stmt_bind_param($stmt, "isssssss", $BookID, $Title, $Author, $Topic, $Genre, $Isbn, $DatePublished, $Hardcover);
mysqli_stmt_execute($stmt);

include("includes/CloseDbConn.php");

header("Location: select.php");
exit;
?>

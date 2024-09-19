<?php

session_start();
$id = $_GET["id"];

include("includes/openDbConn.php");

$sql = "DELETE FROM shippersLab5 WHERE ShipperID=2";

$result = mysqli_query($db, $sql);

include("includes/closeDbConn.php");

header("Location: select.php");
?>
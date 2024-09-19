<?php
session_start();
include("includes/OpenDbConn.php");
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="Cache-control" content="no-cache" />
<title>Project1 - SELECT</title>
</head>
<body>
<h1 style="text-align: center;">Project1 - SELECT</h1> 
<?php
include("includes/menu.php");

$sql = "SELECT BookID, Title, Author, Topic, Genre, ISBN, DatePublished, Hardcover FROM P1Books";

$result = mysqli_query($db, $sql);

if (empty($result))
$num_results = 0;

else
$num_results = mysqli_num_rows($result);
?>
	<table style="border: 0px; width: 800px; padding: 0px; margin: 0px auto; border-spacing: 0px;" title="Listing of Books">
	<thead>
<tr>
<th colspan="8" style="font-weight: bold; background-color: #b1946c; text-align: center; text-decoration: underline;"> P1Books Table 
</th>
</tr>
<tr>

	<th style="font-weight: bold; background-color: #b1946c; ">Book ID</th> 
	<th style="font-weight: bold; background-color: #b1946c; ">Title</th> 
	<th style="font-weight: bold; background-color: #b1946c;">Author</th> 
	<th style="font-weight: bold; background-color: #b1946c;">Topic</th> 
	<th style="font-weight: bold; background-color: #b1946c;">Genre</th>
	<th style="font-weight: bold; background-color: #b1946c;">ISBN</th>
	<th style="font-weight: bold; background-color: #b1946c;">DatePublished</th>
	<th style="font-weight: bold; background-color: #b1946c;">Hardcover</th>
		</tr>
</thead> 
		<tfoot>
<tr>

<td colspan="8" style="text-align: center; font-style: italic;"> Information pulled from the P1Books table.
</td>
	</tr>
</tfoot> 
		<tbody>

<?php

for ($i=0; $i < $num_results; $i++)
	{
$row = mysqli_fetch_array($result);

?>

	<td style="border-right: 1px solid #000000;"><?php echo (trim($row["BookID"] ) ); ?></td> 
	<td style="border-right: 1px solid #000000;"><?php echo ( trim( $row["Title"] ) ); ?></td>
	<td style="border-right: 1px solid #000000;"><?php echo ( trim( $row["Author"] ) ); ?></td>
	<td style="border-right: 1px solid #000000;"><?php echo ( trim( $row["Topic"] ) ); ?></td>
	<td style="border-right: 1px solid #000000;"><?php echo ( trim( $row["Genre"] ) ); ?></td>
	<td style="border-right: 1px solid #000000;"><?php echo ( trim( $row["ISBN"] ) ); ?></td>
	<td style="border-right: 1px solid #000000;"><?php echo (trim($row["DatePublished"] ) ); ?></td>
	<td><?php echo (trim($row["Hardcover"] ) ); ?></td>
</tr> 
			<?php
} 
?>
</tbody>
</table>



	<?php
include("includes/CloseDbConn.php");
?>
</body>
</html>
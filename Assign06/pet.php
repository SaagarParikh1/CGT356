<?php
session_start();
include("includes/openDbConn.php");
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Assign05 - PET EXAMPLE</title>
</head>
	
<body>
	<h1 style="text-align: center">Assign05 - PET EXAMPLE</h1> 
	<?php
	include("includes/menu.php");
	
	$sql = "SELECT PetID, Name, Descript FROM Pet";
	
	$result = mysqli_query($db, $sql);

	if( empty($result) )
	{
		$num_results = 0;
	}
	else
	{
		$num_results = mysqli_num_rows($result);
	}
	
	?>
	
	<table style="border: 0px; width: 500px; padding: 0px; margin: 0px auto; border-spacing: 0px;" title="Listing of Pets">
		<thead>
			<tr>
				<th colspan="4" style="font-weight: bold; background-color: #b1946c; text-align:center; text-decoration:underline;">Pet Table</th> 
			</tr>
			<tr>
				<th style="background-color: #b1946c; font-weight: bold;">PetID</th> 
				<th style="background-color: #b1946c; font-weight: bold;">Name</th> 
				<th style="background-color: #b1946c; font-weight: bold;">Descript</th> 
			</tr>
		</thead> 
		<tfoot>
			<tr>
				<td colspan="3" style="text-align: center; font-style:italic;">Information pulled from MySQL database</td>
			</tr> 
		</tfoot> 
		<tbody>
			<?php

			for($i=0; $i<$num_results; $i++ )
			{
			$row = mysqli_fetch_array($result);
			?>
			
			<tr>
				<td style="border-right: 1px solid #000000;"><?php echo( trim( $row["PetID"] ) ); ?></td> 
				<td style="border-right: 1px solid #000000;"><?php echo( trim( $row["Name"] ) ); ?></td> 
				<td><?php echo( trim( $row["Descript"] ) ); ?></td>
			</tr> 
			
			<?php
			}
			?>
		</tbody>
	</table>

	
	<?php
	include("includes/closeDbConn.php");

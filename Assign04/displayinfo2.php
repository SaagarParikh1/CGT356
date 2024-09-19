<?php
session_start();
if(empty($_SESSION["make"]))
{
	header("Location:index2.php");
	exit;
}
	$_SESSION["errorMessage"] = "";


?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<title>Assign 04 - displayInfo Page2</title> 
	<style type="text/css">
		ul{ list-style:none; margin-top:5px;}
		ul li{ display:block; float:left; width:100%; height:1%;}
		ul li label{ float:left; padding:7px; color:#6666ff}
		ul li input, ul li textarea{ float:right; margin-right:10px; border:1px solid #ccc; padding:3px; font-family: Georgia, Times New Roman, Times, serif; width:60%;}
		li input:focus, li textarea:focus{ border:1px solid #666; }
		fieldset{ padding:10px; border:1px solid #ccc; width:400px; overflow:auto; margin:10px;}
		legend{ color:#000099; margin:0 10px 0 0; padding:0 5px; font-size:11pt; font-weight:bold; }
		ul li span{ color:#000099; margin-left: 10px; font-family:Cambria, "Hoefler Text", "Liberation Serif", Times, "Times New Roman", "serif" }
		fieldset#billing {position:absolute; top:60px; left:20px; }
		fieldset#shipping {position:absolute; top:60px; left:460px; }
		#nav{ width: 400px; position: absolute; top: 330px; left: 200px;}
		#nav1{float: left;}
		#nav2{float: right;}
	</style>
</head>
<body>
<h1 style="font-size:14pt; text-indent:360px;">Assign 04 - displayInfo Page2</h1>

<form id="form0" method="post" action="getFormData2.php"> 
    <fieldset id="billing">
        <legend>Vehicle Information</legend>
        <ul>
			<li> <span>Make: <?php echo($_SESSION["make"]); ?></span></li>
			<li> <span>Model: <?php echo($_SESSION["model"]); ?></span></li>
			<li> <span>Year: <?php echo($_SESSION["year"]); ?></span></li>
			<li> <span>Color: <?php echo($_SESSION["color"]); ?></span></li>
			<li> <span>Mileage: <?php echo($_SESSION["mileage"]); ?></span></li>
			<li> <span>Price Bought: <?php echo($_SESSION["priceBought"]); ?></span></li>
			<li> <span>Country of Origin: <?php echo($_SESSION["countryOfOrigin"]); ?></span></li>
			<li> <span>Previously Owned: <?php echo($_SESSION["previouslyOwned"]); ?></span></li>
			<li> <span>Registration Number: <?php echo($_SESSION["registrationNumber"]); ?></span></li>
			<li> <span>Accidents: <?php echo($_SESSION["accidents"]); ?></span></li>
			<li> <span>Last Inspection: <?php echo($_SESSION["lastInspection"]); ?></span></li>
			<li> <span><br/>Additional Modifications:<br/><?php echo($_SESSION["additionalModifications"]); ?></span></li>
		</ul>
            
        </ul>
    </fieldset>
    <fieldset id="shipping">
        <legend>Vehicle Information (if different from stock)</legend>
        <ul>
		<li> <span>Make: <?php echo($_SESSION["make"]); ?></span></li>
        <li> <span>Model: <?php echo($_SESSION["model"]); ?></span></li>
        <li> <span>Year: <?php echo($_SESSION["year"]); ?></span></li>
        <li> <span>Color: <?php echo($_SESSION["color"]); ?></span></li>
        <li> <span>Mileage: <?php echo($_SESSION["mileage"]); ?></span></li>
        <li> <span>Price Bought: <?php echo($_SESSION["priceBought"]); ?></span></li>
        </ul>
    </fieldset>
</form>
	<div id="nav">
	<span id="nav1"><a href="index2.php">Continue Updating</a></span>
	<span id="nav2"><a href="finishedUpdate.php">Finished Updating</a></span>
	</div>
	
	<a href="index2.php"> <h2>Index2</h2></a>
</body>
</html>

</body>
</html>
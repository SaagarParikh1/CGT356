<?php

if(empty($_POST["make"]))
{
	header("Location:index2.php");
}

	$make = $_POST["make"];
	$model = $_POST["model"];
	$year = $_POST["year"];
	$color = $_POST["color"];
	$mileage = $_POST["mileage"];
	$pricebought = $_POST["pricebought"];
	$ogcountry = $_POST["ogcountry"];
	$prevown = $_POST["prevown"];
	$regnum = $_POST["regnum"];
	$accidents = $_POST["accidents"];
	$lastinsp = $_POST["lastinsp"];
	$addmods = $_POST["addmods"];


if( empty($_POST["Smake"]))
{
	$Smake = $make;
	$Smodel = $model;
	$Syear = $year;
	$Scolor = $Scolor;
	$Smileage = $mileage;
	$Spricebought = $pricebought;
}

else
{
	$Smake = $_POST["Smake"];
	$Smodel = $_POST["Smodel"];
	$Syear = $_POST["Syear"];
	$Scolor = $_POST["Scolor"];
	$Smileage = $_POST["Smileage"];
	$Spricebought = $_POST["Spricebought"];
}
	
	
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<title>Assign 03 - getFormData2 Page</title> 
	<style type="text/css">
		ul{ list-style:none; margin-top:5px;}
		ul li{ display:block; float:left; width:100%; height:1%;}
		ul li label{ float:left; padding:7px; color:#6666ff}
		ul li input, ul li textarea{ float:right; margin-right:10px; border:1px solid #A8F8FF; padding:3px; font-family:Baskerville, "Palatino Linotype", Palatino, "Century Schoolbook L", "Times New Roman", "serif"; width:60%;}
		li input:focus, li textarea:focus{ border:1px solid #666; }
		fieldset{ padding:10px; border:1px solid #ccc; width:700px; overflow:auto; margin:10px;}
		legend{ color:#000099; margin:0 10px 0 0; padding:0 5px; font-size:11pt; font-weight:bold; }
		label span{ color:#ff0000;  }
		fieldset#billing {position:absolute; top:60px; left:20px; }
		fieldset#shipping {position:absolute; top:60px; left:760px; }
		fieldset#submit {position:absolute; top:575px; left:20px; width:840px; text-align:center; }
		fieldset input#SubmitBtn{ background:#A8F8FF; color:#000099; border:1px solid #ccc; padding:5px; width:150px;}
	</style>
</head>
<body>
<h1 style="font-size:14pt; text-indent:360px;">Assign 03 - getFormData2 Page</h1>

<form id="form0" method="post" action="getFormData2.php"> 
    <fieldset id="billing">
        <legend>Vehicle Information</legend>
        <ul>
            <li> <label title="Make" for="make">Make <span>*</span></label> <input type="text" name="make" id="make" size="30" maxlength="30" value="<?php echo($make); ?>"/></li>
            <li> <label title="Model" for="model">Model <span>*</span></label> <input type="text" name="model" id="model" size="30" maxlength="30" value="<?php echo($model); ?>"/></li>
            <li> <label title="Year" for="year">Year <span>*</span></label> <input type="text" name="year" id="year" size="30" maxlength="30" value="<?php echo($year); ?>"/></li>
            <li> <label title="Color" for="color">Color <span>*</span></label> <input type="text" name="color" id="color" size="30" maxlength="30"  value="<?php echo($state); ?>" /></li>
            <li> <label title="Mileage" for="mileage">Mileage <span>*</span></label> <input type="text" name="mileage" id="mileage" size="7" maxlength="5" value="<?php echo($mileage); ?>"/></li>
            <li> <label title="Pricebought" for="pricebought">Price Bought <span>*</span></label> <input type="text" name="pricebought" id="pricebought" size="30" maxlength="30" value="<?php echo($pricebought); ?>"/></li>
            <li> <label title="Ogcountry" for="ogcountry">Country of Origin <span>*</span></label> <input type="text" name="ogcountry" id="ogcountry" size="30" maxlength="30" value="<?php echo($ogcountry); ?>"/></li>
            <li> <label title="Prevown" for="prevown">Previously Owned? (Y/N) <span>*</span></label> <input type="text" name="prevown" id="prevown" size="30" maxlength="30" value="<?php echo($prevown); ?>"/></li>
			<li> <label title="Regnum" for="regnum">Registration Number <span>*</span></label> <input type="text" name="regnum" id="regnum" size="30" maxlength="30" value="<?php echo($regnum); ?>"/></li>
			<li> <label title="Accidents" for="accidents">Accidents? (#) <span>*</span></label> <input type="text" name="ogcountry" id="ogcountry" size="30" maxlength="30" value="<?php echo($accidents); ?>"/></li>
			<li> <label title="Lastinsp" for="lastinsp">Last Inspection <span>*</span></label> <input type="text" name="lastinsp" id="lastinsp" size="30" maxlength="30" value="<?php echo($lastinsp); ?>"/></li>
            <li> <label title="Addmods" for="addmods">Additional Modifications <span>*</span></label> <textarea rows="5" cols="40" name="addmods" id="addmods">value="<?php echo($addmods); ?>"</textarea></li>
        </ul>
    </fieldset>
    <fieldset id="shipping">
        <legend>Vehicle Information (if different from stock)</legend>
        <ul>
            <li> <label title="Smake" for="Smake">Make </label> <input type="text" name="Smake" id="Smake" size="30" maxlength="30" value="<?php echo($Smake); ?>"/></li>
            <li> <label title="Smodel" for="Smodel">Model </label> <input type="text" name="Smodel" id="Smodel" size="30" maxlength="30" value="<?php echo($Smodel); ?>"/></li>
            <li> <label title="Syear" for="Syear">Year </label> <input type="text" name="Syear" id="Syear" size="30" maxlength="30" value="<?php echo($Syear); ?>"/></li>
            <li> <label title="Scolor" for="Scolor">Color </label> <input type="text" name="Scolor" id="Scolor" size="30" maxlength="30"  value="<?php echo($Sstate); ?>" /></li>
            <li> <label title="Smileage" for="Smileage">Mileage </label> <input type="text" name="Smileage" id="Smileage" size="7" maxlength="5" value="<?php echo($Smileage); ?>" /></li>
            <li> <label title="Spricebought" for="Spricebought">Price Bought </label> <input type="text" name="Spricebought" id="Spricebought" size="30" maxlength="30" value="<?php echo($Spricebought); ?>"/></li>
        </ul>
    </fieldset>
    <fieldset id="submit">
        <input id="SubmitBtn" name="SubmitBtn" type="submit" value="Proceed" />
    </fieldset>
</form>

<script type="text/javascript">
	document.getElementById("name").focus();
</script>

</body>
</html>

</body>
</html>
<?php

session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<title>Assign 04 - Index Page2</title> 
	<style type="text/css">
		ul{ list-style:none; margin-top:5px;}
		ul li{ display:block; float:left; width:100%; height:1%;}
		ul li label{ float:left; padding:7px; color:#6666ff}
		ul li input, ul li textarea{ float:right; margin-right:10px; border:1px solid #ccc; padding:3px; font-family: Georgia, Times New Roman, Times, serif; width:60%;}
		li input:focus, li textarea:focus{ border:1px solid #666; }
		fieldset{ padding:10px; border:1px solid #ccc; width:400px; overflow:auto; margin:10px;}
		legend{ color:#000099; margin:0 10px 0 0; padding:0 5px; font-size:11pt; font-weight:bold; }
		label span{ color:#ff0000;  }
		fieldset#billing {position:absolute; top:60px; left:20px; }
		fieldset#shipping {position:absolute; top:60px; left:460px; }
		fieldset#submit {position:absolute; top:640px; left:20px; width:840px; text-align:center; }
		fieldset input#SubmitBtn{ background:#E5E5E5; color:#000099; border:1px solid #ccc; padding:5px; width:150px;}
		div#errorMsg { color:#ff0000; font-weight: bold; font-size: 12pt; position: absolute; top: 420px; left: 480px;}
	</style>
</head>
<body>
<h1 style="font-size:14pt; text-indent:360px;">Assign 04 - Index Page2</h1>

<form id="form0" method="post" action="storeinfo2.php"> 
    <fieldset id="billing">
        <legend>Vehicle Information</legend>
        <ul>
        <li> <label title="Make" for="make">Make <span>*</span></label><input type="text" name="make" id="make" size="30" maxlength="30" value="<?php if (!empty($_SESSION["make"])) {echo ($_SESSION["make"]);} ?>"/></li>
        <li> <label title="Model" for="model">Model <span>*</span></label> <input type="text" name="model" id="model" size="30" maxlength="30" value="<?php if (!empty($_SESSION["model"])) {echo ($_SESSION["model"]);} ?>"/></li>
        <li> <label title="Year" for="year">Year <span>*</span></label> <input type="text" name="year" id="year" size="4" maxlength="4" value="<?php if (!empty($_SESSION["year"])) {echo ($_SESSION["year"]);} ?>"/></li>
        <li> <label title="Color" for="color">Color <span>*</span></label> <input type="text" name="color" id="color" size="30" maxlength="30" value="<?php if (!empty($_SESSION["color"])) {echo ($_SESSION["color"]);} ?>"/></li>
        <li> <label title="Mileage" for="mileage">Mileage <span>*</span></label> <input type="text" name="mileage" id="mileage" size="10" maxlength="10" value="<?php if (!empty($_SESSION["mileage"])) {echo ($_SESSION["mileage"]);} ?>"/></li>
        <li> <label title="PriceBought" for="priceBought">Price Bought <span>*</span></label> <input type="text" name="priceBought" id="priceBought" size="15" maxlength="15" value="<?php if (!empty($_SESSION["priceBought"])) {echo ($_SESSION["priceBought"]);} ?>"/></li>
        <li> <label title="CountryOfOrigin" for="countryOfOrigin">Country of Origin <span>*</span></label> <input type="text" name="countryOfOrigin" id="countryOfOrigin" size="30" maxlength="30" value="<?php if (!empty($_SESSION["countryOfOrigin"])) {echo ($_SESSION["countryOfOrigin"]);} ?>"/></li>
        <li> <label title="PreviouslyOwned" for="previouslyOwned">Previously Owned? <span>*</span></label> <input type="text" name="previouslyOwned" id="previouslyOwned" size="1" maxlength="1" value="<?php if (!empty($_SESSION["previouslyOwned"])) {echo ($_SESSION["previouslyOwned"]);} ?>"/></li>
        <li> <label title="RegistrationNumber" for="registrationNumber">Registration Number <span>*</span></label> <input type="text" name="registrationNumber" id="registrationNumber" size="15" maxlength="15" value="<?php if (!empty($_SESSION["registrationNumber"])) {echo ($_SESSION["registrationNumber"]);} ?>"/></li>
        <li> <label title="Accidents" for="accidents">Accidents <span>*</span></label> <input type="text" name="accidents" id="accidents" size="2" maxlength="2" value="<?php if (!empty($_SESSION["accidents"])) {echo ($_SESSION["accidents"]);} ?>"/></li>
        <li> <label title="LastInspection" for="lastInspection">Last Inspection <span>*</span></label> <input type="text" name="lastInspection" id="lastInspection" size="10" maxlength="10" value="<?php if (!empty($_SESSION["lastInspection"])) {echo ($_SESSION["lastInspection"]);} ?>"/></li>
        <li> <label title="AdditionalModifications" for="additionalModifications">Additional Modifications <span>*</span></label> <textarea rows="5" cols="40" name="additionalModifications" id="additionalModifications"><?php if (!empty($_SESSION["additionalModifications"])) {echo ($_SESSION["additionalModifications"]);} ?></textarea></li>
    </ul>
    </fieldset>
    <fieldset id="shipping">
        <legend>Vehicle Information (if different from stock)</legend>
        <ul>
        <li> <label title="SMake" for="Smake">Make </label> <input type="text" name="Smake" id="Smake" size="30" maxlength="30" value="<?php if( !empty($_SESSION["Smake"])){echo($_SESSION["Smake"]); }?>"/></li>
        <li> <label title="SModel" for="Smodel">Model </label> <input type="text" name="Smodel" id="Smodel" size="30" maxlength="30" value="<?php if( !empty($_SESSION["Smodel"])){echo($_SESSION["Smodel"]); }?>"/></li>
        <li> <label title="SYear" for="Syear">Year </label> <input type="text" name="Syear" id="Syear" size="4" maxlength="4" value="<?php if( !empty($_SESSION["Syear"])){echo($_SESSION["Syear"]); }?>" /></li>
        <li> <label title="SColor" for="Scolor">Color </label> <input type="text" name="Scolor" id="Scolor" size="30" maxlength="30" value="<?php if( !empty($_SESSION["Scolor"])){echo($_SESSION["Scolor"]); }?>"/></li>
        <li> <label title="SMileage" for="Smileage">Mileage </label> <input type="text" name="Smileage" id="Smileage" size="10" maxlength="10" value="<?php if( !empty($_SESSION["Smileage"])){echo($_SESSION["Smileage"]); }?>"/></li>
        <li> <label title="SpriceBought" for="SpriceBought">Price Bought </label> <input type="text" name="SpriceBought" id="SpriceBought" size="15" maxlength="15" value="<?php if( !empty($_SESSION["SpriceBought"])){echo($_SESSION["SpriceBought"]); }?>"/></li>
        </ul>
    </fieldset>
    <fieldset id="submit">
        <input id="SubmitBtn" name="SubmitBtn" type="submit" value="Proceed" />
    </fieldset>
</form>

<div id="errorMsg"><?php if( !empty($_SESSION["errorMessage"])){echo($_SESSION["errorMessage"]);}?></div>

<script type="text/javascript">
	document.getElementById("make").focus();
</script>
<a href="index3.php"> <h2>Index3</h2></a>
</body>
</html>

</body>
</html>
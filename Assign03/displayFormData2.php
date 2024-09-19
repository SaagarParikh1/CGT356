<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Assign 03 - displayFormData2 Page</title>
</head>

<body>
</body>
</html><?php

if(empty($_POST["make"]))
{
	header("Location:index2.php");
}
	
	
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<title>Assign 03 - displayFormData2 Page</title> 
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
	</style>
</head>
<body>
<h1 style="font-size:14pt; text-indent:360px;">Assign 03 - displayFormData2 Page</h1>

<form id="form0" method="post" action="getFormData2.php"> 
     <fieldset id="billing">
        <legend>Vehicle Information</legend>
        <ul>
            <li> <span><?php echo($_POST["make"]); ?></span></span></li>
            <li> <span><?php echo($_POST["model"]); ?></span></li>
            <li> <span><?php echo($_POST["year"]); ?></span></li>
            <li> <span><?php echo($_POST["state"]); ?></span></li>
            <li> <span><?php echo($_POST["mileage"]); ?></span></li>
            <li> <span><?php echo($_POST["pricebought"]); ?></span></li>
            <li> <span><?php echo($_POST["ogcountry"]); ?></span></li>
            <li> <span><?php echo($_POST["prevown"]); ?></span></li>
			<li> <span><?php echo($_POST["regnum"]); ?></span></li>
			<li> <span><?php echo($_POST["accidents"]); ?></span></li>
			<li> <span><?php echo($_POST["lastinsp"]); ?></span></li>
            <li> <span><br/>Additional Modifications:<br/><?php echo($_POST["addmods"]); ?></span></li>
        </ul>
    </fieldset>
    <fieldset id="shipping">
        <legend>Vehicle Information (if different from stock)</legend>
        <ul>
            <li> <span><?php echo($_POST["Smake"]); ?></span></li>
            <li> <span><?php echo($_POST["Smodel"]); ?></span></li>
            <li> <span><?php echo($_POST["Syear"]); ?></span></li>
            <li> <span><?php echo($_POST["Sstate"]); ?></span></li>
            <li> <span><?php echo($_POST["Smileage"]); ?></span></li>
            <li> <span><?php echo($_POST["Spricebought"]); ?></span></li>
        </ul>
    </fieldset>
</form>

</body>
</html>

</body>
</html>
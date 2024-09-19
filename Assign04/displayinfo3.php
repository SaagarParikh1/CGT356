<?php
session_start();
if(empty($_SESSION["projectID"]))
{
	header("Location:index3.php");
	exit;
}
	$_SESSION["errorMessage"] = "";


?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<title>Assign 04 - displayInfo3 Page</title> 
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
<h1 style="font-size:14pt; text-indent:360px;">Assign 04 - displayInfo3 Page</h1>

<form id="form0" method="post" action="getFormData3.php"> 
    <fieldset id="billing">
        <legend>Project Information</legend>
        <ul>
			<li> <span>Project ID: <?php echo($_SESSION["projectID"]); ?></span></li>
			<li> <span>Project Name: <?php echo($_SESSION["projectName"]); ?></span></li>
			<li> <span>Project Description: <?php echo($_SESSION["projectDescription"]); ?></span></li>
			<li> <span>Manager Name: <?php echo($_SESSION["managerName"]); ?></span></li>
			<li> <span>Manager Email: <?php echo($_SESSION["managerEmail"]); ?></span></li>
			<li> <span>Manager Phone: <?php echo($_SESSION["managerPhone"]); ?></span></li>
        </ul>
    </fieldset>
    <fieldset id="shipping">
        <legend>Project Information (if different from first)</legend>
        <ul>
			<li> <span>Project ID: <?php echo($_SESSION["SprojectID"]); ?></span></li>
			<li> <span>Project Name: <?php echo($_SESSION["SprojectName"]); ?></span></li>
			<li> <span>Project Description: <?php echo($_SESSION["SprojectDescription"]); ?></span></li>
			<li> <span>Manager Name: <?php echo($_SESSION["SmanagerName"]); ?></span></li>
			<li> <span>Manager Email: <?php echo($_SESSION["SmanagerEmail"]); ?></span></li>
			<li> <span>Manager Phone: <?php echo($_SESSION["SmanagerPhone"]); ?></span></li>
        </ul>
    </fieldset>
</form>
	<div id="nav">
	<span id="nav1"><a href="index3.php">Continue Updating</a></span>
	<span id="nav2"><a href="finishedUpdate.php">Finished Updating</a></span>
	</div>
	
	<a href="index3.php"> <h2>Index3</h2></a>
</body>
</html>

</body>
</html>
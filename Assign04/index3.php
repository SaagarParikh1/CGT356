<?php

session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<title>Assign 04 - Index3 Page</title> 
	<style type="text/css">
		ul{ list-style:none; margin-top:5px;}
		ul li{ display:block; float:left; width:100%; height:1%;}
		ul li label{ float:left; padding:7px; color:#6666ff}
		ul li input, ul li textarea{ float:right; margin-right:10px; border:1px solid #ccc; padding:3px; font-family: Georgia, Times New Roman, Times, serif; width:60%;}
		li input:focus, li textarea:focus{ border:1px solid #666; }
		fieldset{ padding:10px; border:1px solid #ccc; width:500px; overflow:auto; margin:10px;}
		legend{ color:#000099; margin:0 10px 0 0; padding:0 5px; font-size:11pt; font-weight:bold; }
		label span{ color:#ff0000;  }
		fieldset#billing {position:absolute; top:60px; left:20px; }
		fieldset#shipping {position:absolute; top:60px; left:560px; }
		fieldset#submit {position:absolute; top:540px; left:20px; width:840px; text-align:center; }
		fieldset input#SubmitBtn{ background:#E5E5E5; color:#000099; border:1px solid #ccc; padding:5px; width:150px;}
		div#errorMsg { color:#ff0000; font-weight: bold; font-size: 12pt; position: absolute; top: 420px; left: 480px;}
	</style>
</head>
<body>
<h1 style="font-size:14pt; text-indent:360px;">Assign 04 - Index3 Page</h1>

<form id="form0" method="post" action="storeinfo3.php"> 
    <fieldset id="billing">
        <legend>Project Information</legend>
        <ul>
            <li> <label title="ProjectID" for="projectID">Project ID <span>*</span></label><input type="text" name="projectID" id="projectID" size="30" maxlength="30" value="<?php if( !empty($_SESSION["projectID"])){echo($_SESSION["projectID"]); }?>"/></li>
            <li> <label title="ProjectName" for="projectName">Project Name <span>*</span></label> <input type="text" name="projectName" id="projectName" size="30" maxlength="30" value="<?php if( !empty($_SESSION["projectName"])){echo($_SESSION["projectName"]); }?>"/></li>
            <li> <label title="ProjectDescription" for="projectDescription">Project Description <span>*</span></label> <input type="text" name="projectDescription" id="city" size="30" maxlength="30" value="<?php if( !empty($_SESSION["projectDescription"])){echo($_SESSION["projectDescription"]); }?>"/></li>
            <li> <label title="ManagerName" for="managerName">Manager Name <span>*</span></label> <input type="text" name="managerName" id="managerName" size="30" maxlength="30"  value="<?php if( !empty($_SESSION["managerName"])){echo($_SESSION["managerName"]); }?>" /></li>
            <li> <label title="ManagerEmail" for="managerEmail">Manager Email <span>*</span></label> <input type="text" name="managerEmail" id="managerEmail" size="7" maxlength="5" value="<?php if( !empty($_SESSION["managerEmail"])){echo($_SESSION["managerEmail"]); }?>"/></li>
            <li> <label title="ManagerPhone" for="managerPhone">Manager Phone <span>*</span></label> <input type="text" name="managerPhone" id="managerPhone" size="30" maxlength="30" value="<?php if( !empty($_SESSION["managerPhone"])){echo($_SESSION["managerPhone"]); }?>"/></li></li>
        </ul>
    </fieldset>
    <fieldset id="shipping">
        <legend>Project Information (if different from first)</legend>
        <ul>
            <li> <label title="ProjectID" for="projectID">Project ID <span>*</span></label><input type="text" name="projectID" id="projectID" size="30" maxlength="30" value="<?php if( !empty($_SESSION["projectID"])){echo($_SESSION["projectID"]); }?>"/></li>
            <li> <label title="ProjectName" for="projectName">Project Name <span>*</span></label> <input type="text" name="projectName" id="projectName" size="30" maxlength="30" value="<?php if( !empty($_SESSION["projectName"])){echo($_SESSION["projectName"]); }?>"/></li>
            <li> <label title="ProjectDescription" for="projectDescription">Project Description <span>*</span></label> <input type="text" name="projectDescription" id="city" size="30" maxlength="30" value="<?php if( !empty($_SESSION["projectDescription"])){echo($_SESSION["projectDescription"]); }?>"/></li>
            <li> <label title="ManagerName" for="managerName">Manager Name <span>*</span></label> <input type="text" name="managerName" id="managerName" size="30" maxlength="30"  value="<?php if( !empty($_SESSION["managerName"])){echo($_SESSION["managerName"]); }?>" /></li>
            <li> <label title="ManagerEmail" for="managerEmail">Manager Email <span>*</span></label> <input type="text" name="managerEmail" id="managerEmail" size="7" maxlength="5" value="<?php if( !empty($_SESSION["managerEmail"])){echo($_SESSION["managerEmail"]); }?>"/></li>
            <li> <label title="ManagerPhone" for="managerPhone">Manager Phone <span>*</span></label> <input type="text" name="managerPhone" id="managerPhone" size="30" maxlength="30" value="<?php if( !empty($_SESSION["managerPhone"])){echo($_SESSION["managerPhone"]); }?>"/></li>
        </ul>
    </fieldset>
    <fieldset id="submit">
        <input id="SubmitBtn" name="SubmitBtn" type="submit" value="Proceed" />
    </fieldset>
</form>

<div id="errorMsg"><?php if( !empty($_SESSION["errorMessage"])){echo($_SESSION["errorMessage"]);}?></div>

<script type="text/javascript">
	document.getElementById("name").focus();
</script>
<a href="index.php"> <h2>Index</h2></a>
<a href="index2.php"><h2>Index2</h2></a>
</body>
</html>

</body>
</html>
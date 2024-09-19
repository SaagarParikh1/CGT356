
<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="Cache-control" content="no-cache" />
	<title>Assign05 - Insert</title>
	<style type="text/css">
		form{width:400px; margin: 0px auto;}
		ul{list-style: none; margin-top: 5px;}
		ul li{display: block; float: left; width:100%; height: 1%;}
		ul li label{float: left; padding: 7px;}
		ul li span{color:#0000ff; font-weight: bold;}
		ul li input{float: right; margin-right: 10px; border: 1px solid #000; padding: 3px; width:240px;}
		#submit{width:248px;}
		li input:focus {border: 1px solid #999;}
		fieldset{padding: 10px; border: 1px solid #000; width:420px; overflow: auto; margin: 10px;}
		legend{color: #000000; margin: 0 10px 0 0; padding: 0 5px; font-size: 11pt; font-weight: bold;}
	</style>
</head>
<body>
<h1 style="text-align:center">Assign05 - INSERT</h1>
	<?php
	include("includes/menu.php");
	?>
</p>	<form id="form0" name="form0" method="post" action="doInsertUser.php">
		<fieldset>
			<legend>Insert into usersLab5 table</legend>
			<ul>
				<li>
					<label title="UserID" for="userID">UserID</label>
					<input name="userID" id="userID" type="text" size="20" maxlength="3" />
				</li>
				<li>
					<label title="FirstName" for="FirstName">First Name</label>
					<input name="FirstName" id="FirstName" type="text" size="20" maxlength="20" />
				</li>
				<li>
					<label title="LastName" for="LastName">Last Name</label>
					<input name="LastName" id="LastName" type="text" size="20" maxlength="20" />
				</li>
				<li>
					<label title="Title" for="Title">Title</label>
					<input name="Title" id="Title" type="text" size="20" maxlength="20" />
				</li>
				<li>
					<span></span>
				</li>
				<li>
					<input type="submit" value="Insert User" name="submit" id="submit" />
				</li>
			</ul>
		</fieldset>
	</form>
	
		
	<script type="text/javascript">
		document.getElementById("shipperID").focus();
	</script>
	
</body>
</html>
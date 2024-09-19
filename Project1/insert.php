<?php

session_start();
if(empty($_SESSION["errorMessage"] ) )
	$_SESSION["errorMessage"] = "";

?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Project1 - Insert</title>
<style type="text/css">
form { width:400px; margin:0px auto;}
        ul{ list-style:none; margin-top:5px;}
        ul li { display:block; float:left; width:100%; height:1%; }
        ul li label { float:left; padding:7px; }
        ul li span { color:#0000ff; font-weight:bold;}
        ul li span#radios {color:#000000; font-weight: normal; padding: 0px; margin-right: 130px;}
        ul li input, ul li select { float:right; margin-right:10px; border:1px solid #000; padding:3px; width:240px;}
        ul li input[type="radio"] { float: none; margin-right:0px; padding:0px; width:40px;}
        input#submit {width:248px;}
        li input:focus { border:1px solid #999; }
        fieldset{ padding:10px; border:1px solid #000; width:420px; overflow:auto; margin:10px;}
        legend{ color:#000000; margin:0 10px 0 0; padding:0 5px; font-size:11pt; font-weight:bold; }
</style>
</head>
<body>
<h1 style="text-align: center;">Project1 - Insert</h1>
<?php
include("includes/menu.php");
?>
<form id="form" name="form" method="post" action="doInsert.php"> <fieldset>
<legend> Insert into P1Books table</legend>
<ul>
<li>
<label title="BookID" for="bookID">Book ID</label>
<input name="bookID" id="bookID" type="text" size="20" maxlength="3" />
</li> 
<li>
<label title="Title" for="title">Title</label>
<input name="title" id="title" type="text" size="20" maxlength="20" />
</li>
<li>
<label title="Author" for="author">Author</label>
<input name="author" id="author" type="text" size="20" maxlength="20" />
</li>
<li>
<label title="Topic" for="topic">Topic</label>
    <select name="topic" id="topic">
    <option value="- Topic -">- Topic -</option>
    <option value="Airplanes">Airplanes</option>
    <option value="Dinosaurs">Dinosaurs</option>
    <option value="Romance">Romance</option>
    <option value="Space">Space</option>
    <option value="Ocean">Ocean</option>
    <option value="Animals">Animals</option>
    <option value="Cars">Cars</option>
    <option value="Fantasy">Fantasy</option>
    <option value="Boats">Boats</option>
    <option value="Architecture">Architecture</option>
    <option value="History">History</option>
    <option value="Mystery">Mystery</option>
    <option value="Cooking">Cooking</option>
    <option value="Self-Help">Self-Help</option>
    <option value="Science Fiction">Science Fiction</option>
</select>
<li>
    <label title="Genre" for="genre">Genre</label>
    <span id="radios" style="float: right">
        <input name="genre" id="genre_war" type="radio" value="War" />War
        <input name="genre" id="genre_thriller" type="radio" value="Thriller" />Thriller
        <br>
        <input name="genre" id="genre_horror" type="radio" value="Horror" />Horror
        <input name="genre" id="genre_biography" type="radio" value="Biography" />Biography
        <br>
        <input name="genre" id="genre_comedy" type="radio" value="Comedy" />Comedy
        <input name="genre" id="genre_suspense" type="radio" value="Suspense" />Suspense
    </span>
</li>
<li>
<label title="Isbn" for="isbn">ISBN</label>
<input name="isbn" id="isbn" type="text" size="20" maxlength="13" />
</li>
<li>
    <label title="DatePublished" for="datePublished">Date Published</label>
    <select name="year">
        <option value="- Year -">- Year -</option>
        <?php
        for ($i = date("Y"); $i >= 1900; $i--) {
            echo "<option value=\"$i\">$i</option>";
        }
        ?>
    </select>
    <select name="month">
        <option value="- Month -">- Month -</option>
        <?php
        $months = [
            "January", "February", "March", "April", "May", "June",
            "July", "August", "September", "October", "November", "December"
        ];
        foreach ($months as $key => $month) {
            echo "<option value=\"" . ($key + 1) . "\">$month</option>";
        }
        ?>
    </select>
    <select name="day">
        <option value="- Day -">- Day -</option>
        <?php
        for ($i = 1; $i <= 31; $i++) {
            echo "<option value=\"$i\">$i</option>";
        }
        ?>
    </select>
</li>
<li>
<li>
    <label title="Hardcover" for="hardcover">Hardcover?</label>
    <span id="checkboxes" style="float: right">
        <input name="hardcover" id="hardcover" type="checkbox" value="Yes" />
</li>
<li>
<span><?php echo ($_SESSION["errorMessage"]); ?></span>
</li>
<li>
<input type="submit" value="Insert Info" name="submit" id="submit" />
</li>
</ul>
</fieldset>
</form>
<?php
$_SESSION["errorMessage"] = "";
?>

<script type="text/javascript">
document.getElementById("bookID").focus();
</script>
</body>
</html>
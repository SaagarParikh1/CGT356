<?php
session_start();
if( empty($_SESSION["errorMessage"] ) )
$_SESSION["errorMessage"] = "";

include("includes/OpenDbConn.php");

?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="Cache-control" content="no-cache" /> <title>Project1 - Update</title>
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
<h1 style="text-align: center;">Project1 - Update</h1>
<?php
include("includes/menu.php");

$sql = "SELECT BookID, Title, Author, Topic, Genre, Isbn, DatePublished, Hardcover FROM P1Books WHERE BookID= 2";
if (empty($result))
{
$num_results = 0;
}
else
{
$num_results = mysqli_num_rows($result); 
$row = mysqli_fetch_array($result);
}
if( $num_results == 0)
$_SESSION["errorMessage"] = "You must first insert a Book with ID = 2";
?>

<form id="form" name="form0" method="post" action="doUpdate.php">
<fieldset>
<legend>Update the P1Books table</legend>
<ul>
<li>
<label title="BookID" for="bookID">Book ID</label>
<input name="bookID" id="bookID" type="text" size="20" maxlength="3" value="<?php if( $num_results != 0){ echo ( trim( $row["BookID"] ) ); } ?>" />
</li> 
<li>
<label title="Title" for="title">Title</label>
<input name="title" id="title" type="text" size="20" maxlength="20" value="<?php if( $num_results != 0){ echo ( trim( $row["Title"] ) ); } ?>" />
</li>
<li>
<label title="Author" for="author">Author</label>
<input name="author" id="author" type="text" size="20" maxlength="20" value="<?php if( $num_results != 0){ echo ( trim( $row["Author"] ) ); } ?>" />
</li>
<li>
<li><label title="Topic" for="topic">Topic</label>
                <select name="topic" id="topic">
                <option value="- Topic -">- Topic -</option>
                <option value="Airplanes" <?php if (($num_results != 0) && (trim($row["Topic"]) == "Airplanes")) { echo "selected='selected'"; } ?>>Airplanes</option>
				<option value="Dinosaurs" <?php if (($num_results != 0) && (trim($row["Topic"]) == "Dinosaurs")) { echo "selected='selected'"; } ?>>Dinosaurs</option>
				<option value="Romance" <?php if (($num_results != 0) && (trim($row["Topic"]) == "Romance")) { echo "selected='selected'"; } ?>>Romance</option>
				<option value="Space" <?php if (($num_results != 0) && (trim($row["Topic"]) == "Space")) { echo "selected='selected'"; } ?>>Space</option>
				<option value="Ocean" <?php if (($num_results != 0) && (trim($row["Topic"]) == "Ocean")) { echo "selected='selected'"; } ?>>Ocean</option>
				<option value="Animals" <?php if (($num_results != 0) && (trim($row["Topic"]) == "Animals")) { echo "selected='selected'"; } ?>>Animals</option>
				<option value="Cars" <?php if (($num_results != 0) && (trim($row["Topic"]) == "Cars")) { echo "selected='selected'"; } ?>>Cars</option>
				<option value="Fantasy" <?php if (($num_results != 0) && (trim($row["Topic"]) == "Fantasy")) { echo "selected='selected'"; } ?>>Fantasy</option>
				<option value="Boats" <?php if (($num_results != 0) && (trim($row["Topic"]) == "Boats")) { echo "selected='selected'"; } ?>>Boats</option>
				<option value="Architecture" <?php if (($num_results != 0) && (trim($row["Topic"]) == "Architecture")) { echo "selected='selected'"; } ?>>Architecture</option>
				<option value="History" <?php if (($num_results != 0) && (trim($row["Topic"]) == "History")) { echo "selected='selected'"; } ?>>History</option>
				<option value="Mystery" <?php if (($num_results != 0) && (trim($row["Topic"]) == "Mystery")) { echo "selected='selected'"; } ?>>Mystery</option>
				<option value="Cooking" <?php if (($num_results != 0) && (trim($row["Topic"]) == "Cooking")) { echo "selected='selected'"; } ?>>Cooking</option>
				<option value="Self-Help" <?php if (($num_results != 0) && (trim($row["Topic"]) == "Self-Help")) { echo "selected='selected'"; } ?>>Self-Help</option>
				<option value="Science Fiction" <?php if (($num_results != 0) && (trim($row["Topic"]) == "Science Fiction")) { echo "selected='selected'"; } ?>>Science Fiction</option>
</select>
<li>
    <label title="Genre" for="genre">Genre</label>
    <span id="radios" style="float: right;">
        <input name="genre" id="genre" type="radio" value="War"<?php if(($num_results != 0) && (trim($row["Genre"])=="War")){echo("checked='checked'");}?>/>War
        <input name="genre" id="genre" type="radio" value="Thriller"<?php if(($num_results != 0) && (trim($row["Genre"])=="Thriller")){echo("checked='checked'");}?>/>Thriller
		<br>
        <input name="genre" id="genre" type="radio" value="Horror"<?php if(($num_results != 0) && (trim($row["Genre"])=="Horror")){echo("checked='checked'");}?>/>Horror
        <input name="genre" id="genre" type="radio" value="Biography"<?php if(($num_results != 0) && (trim($row["Genre"])=="Biography")){echo("checked='checked'");}?>/>Biography
		<br>
        <input name="genre" id="genre" type="radio" value="Comedy"<?php if(($num_results != 0) && (trim($row["Genre"])=="Comedy")){echo("checked='checked'");}?>/>Comedy
        <input name="genre" id="genre" type="radio" value="Suspense"<?php if(($num_results != 0) && (trim($row["Genre"])=="Suspense")){echo("checked='checked'");}?>/>Suspense
    </span>
</li>

<li>
<label title="Isbn" for="isbn">ISBN</label>
<input name="isbn" id="isbn" type="text" size="20" maxlength="13" value="<?php if( $num_results != 0){ echo ( trim( $row["Isbn"] ) ); } ?>" />
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
    <label title="Hardcover" for="hardcover">Hardcover?</label>
    <span id="checkboxes" style="float: right;">
        <input name="hardcover" id="hardcover" type="checkbox" value="Yes"<?php if(($num_results != 0) && (trim($row["Hardcover"])=="Yes")){echo(" checked='checked'");}?> />
</li>
	
	<li>
<span><?php echo ($_SESSION["errorMessage"]); ?></span>
</li>
<li>
<input type="submit" value="Update Info" name="submit" id="submit" />

</li>
</ul>
</fieldset>
</form>

<?php
$_SESSION["errorMessage"] = "";
?>

<script type="text/javascript">
document.getElementById("companyName").focus();
</script>

</body>
</html>
<!DOCTYPE html>
<html>
<head>
   <meta charset="UTF-8">
</head>
<body>


<h2>Detail otázky</h2>

<?php
$poradi = ($_GET["id"]);
if (!($con = mysqli_connect("localhost","respondent","heslo","otazky")))
{
  die("Nelze se připojit k databázovému serveru!</body></html>");
}
mysqli_query($con,"SET NAMES 'utf8'");
if (!($vysledek = mysqli_query($con, "SELECT id_otazky, text_otazky FROM otazky_tab WHERE id_otazky = '$poradi'")))
{
  die("Nelze provést dotaz.</body></html>");
}
?>



<table border=1>
<?php
while ($radek = mysqli_fetch_array($vysledek))
{
?>
<p><?php echo "<tr><td>" . $radek["id_otazky"] . "</td>";?>
<?php echo "<td>" . $radek["text_otazky"] . "</td>";?></p>
<?php   
}
mysqli_free_result($vysledek);
mysqli_close($con);
?>
</table>


<br>
<form method="POST" action="">
	Text odpovedi:
	<textarea name="text_odpovedi"></textarea>
	<input type="hidden" name="id_otazky" value=<?php echo ($_GET["id"]);?>>
	<input type="submit" value="Vložit" >
</form>

<!-- Zadávání otázek -->

<?php
if (!($con = mysqli_connect("localhost","respondent","heslo","otazky")))
{
	die("Nelze se připojit k databázovému serveru!</body></html>");
}


mysqli_query($con,"SET NAMES 'utf8'");
if (isset ($_POST['id_otazky']) && ($_POST['text_odpovedi'])) {


if (mysqli_query($con,
		"INSERT INTO odpovedi(id_otazky, text_odpovedi) VALUES('" .
		addslashes($_POST["id_otazky"]) . "', '" .
		addslashes($_POST["text_odpovedi"]) . "')"))
{
	echo "Úspěšně vloženo.";

}
else
{
	echo "Nelze provést dotaz. " . mysqli_error($con);
}
}
mysqli_close($con); 
?>

<?php
$poradi = ($_GET["id"]);
if (!($con = mysqli_connect("localhost","respondent","heslo","otazky")))
{
  die("Nelze se připojit k databázovému serveru!</body></html>");
}
mysqli_query($con,"SET NAMES 'utf8'");
if (!($vysledek_odpovedi = mysqli_query($con, "SELECT id_odpovedi, id_otazky, text_odpovedi FROM odpovedi WHERE id_otazky = '$poradi'")))
{
  die("Nelze provést dotaz.</body></html>");
}
?>

<h4>Drivejsi odpovedi</h4>

<table border=1>
	<tr>
		<td>ID odpověďi</td>
		<td>ID otázky</td>
		<td>Odpověď</td>
	</tr>
<?php
while ($radek = mysqli_fetch_array($vysledek_odpovedi))
{
?>
<p><?php echo "<tr><td>" . $radek["id_odpovedi"] . "</td>";?>
<?php echo "<td>" . $radek["id_otazky"] . "</td>";?>
<?php echo "<td>" . $radek["text_odpovedi"] . "</td></tr>";?></p>
<?php   
}
mysqli_free_result($vysledek_odpovedi);
?>
</table>

</body>
</html>
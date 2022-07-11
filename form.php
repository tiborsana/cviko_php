<!DOCTYPE html>
<html>
<head>
   <meta charset="UTF-8">
</head>
<body>
<?php
if (!($con = mysqli_connect("localhost","uzivatel","heslo","otazky")))
{
	die("Nelze se připojit k databázovému serveru!</body></html>");
}
mysqli_query($con,"SET NAMES 'utf8'");
if (mysqli_query($con,
		"INSERT INTO otazky_tab(text_otazky) VALUES('" .
		addslashes($_POST['text_otazky']) . "')"))
{
	echo "Úspěšně vloženo.";
}
else
{
	echo "Nelze provést dotaz. " . mysqli_error($con);
}
mysqli_close($con); 
?>
<?php
if (!($con = mysqli_connect("localhost","uzivatel","heslo","otazky")))
{
  die("Nelze se připojit k databázovému serveru!</body></html>");
}
mysqli_query($con,"SET NAMES 'utf8'");
if (!($vysledek = mysqli_query($con, "SELECT id_otazky, text_otazky FROM otazky_tab")))
{
  die("Nelze provést dotaz.</body></html>");
}
?>
<h1>Zadané otázky</h1>
<table border=1>
<?php
while ($radek = mysqli_fetch_array($vysledek))
{
?>
<p><?php echo "<tr><td>" . $radek["id_otazky"] . "</td>";?>
<?php echo "<td>" . $radek["text_otazky"] . "</td>";?></p>
<?php echo "<td>" . "<a href='detail.php?id=" . $radek["id_otazky"] . "'>Detail</a>" . "</td></tr>";?></p>
<?php   
}
mysqli_free_result($vysledek);
mysqli_close($con);
?>
</table>
<br>
<form method="POST" action="form.php">
	Text otázky:
	<textarea name="text_otazky"></textarea>
	<input type="submit" value="Vložit" >
</form>


</body>
</html>
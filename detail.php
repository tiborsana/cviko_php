<!DOCTYPE html>
<html>
<head>
   <meta charset="UTF-8">
</head>
<body>
<h2>Detail otázky</h2>

<?php
$poradi = ($_GET["id"]);
if (!($con = mysqli_connect("localhost","uzivatel","heslo","otazky")))
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

</body>
</html>
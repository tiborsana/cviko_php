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
		addslashes($_POST["popis"]) . "')"))
{
	echo "Úspěšně vloženo.";
}
else
{
	echo "Nelze provést dotaz. " . mysqli_error($con);
}
mysqli_close($con); 
?>

</body>
</html>
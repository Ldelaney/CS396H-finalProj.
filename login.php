<!DOCTYPE html>
<html>
<body>
<?php
 	$username =  $_POST["name"];
 	$password = $_POST["password"];
	$arrivaltime = time();
	$arrivaldate = getdate($arrivaltime);
	//ini_set('display_errors', 1);
	echo "your name is: ";
	echo $username; 
	echo "<br>";
	echo "Your password is: ";
	echo $password; 
	echo "<br>";
	echo "The current time is $arrivaldate[hours]:$arrivaldate[minutes]:$arrivaldate[seconds], $arrivaldate[month], $arrivaldate[mday], $arrivaldate[year]";
	echo "<br>"
?>
</body>
</html>

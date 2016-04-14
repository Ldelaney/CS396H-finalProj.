<!DOCTYPE html>
<html>
<body>
<?php
	//set the variables
 	$userusername =  $_POST["name"];
 	$userpassword = $_POST["userpassword"];
	$arrivaltime = time();
	$arrivaldate = getdate($arrivaltime);
	
	//echo the variables, confirm they were passed correctly
	ini_set('display_errors', 1);
	echo "your name is: ";
	echo $userusername; 
	echo "<br>";
	echo "Your password is: ";
	echo $userpassword; 
	echo "<br>";
	echo "The current time is $arrivaldate[hours]:$arrivaldate[minutes]:$arrivaldate[seconds], $arrivaldate[month], $arrivaldate[mday], $arrivaldate[year]";
	echo "<br>";
	

	
	
	//w3schools example of how to connect
$servername = "tcp:syllabusscheduler.database.windows.net,1433";
$username = "HowToMakeDarn";
$password = "-NearAnything1@";

// Create connection
$conn = mysqli_connect($servername, $username, $password);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

echo "Connected successfully";	

	
?>
</body>
</html>

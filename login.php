<!DOCTYPE html>
<html>
<body>
<?php
	//set the variables
 	$userusername =  $_POST["name"];
 	$userpassword = $_POST["password"];
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
	echo "<br>"
/*	
	//send the username, password, and timestamp to the database
	Server: syllabusscheduler.database.windows.net,1433 
	SQL Database: Syllabus Database\r\nUser Name: HowToMakeDarn
	
	PHP Data Objects(PDO) Sample Code:
	
	try {
		$conn = new PDO ( \"sqlsrv:server = tcp:syllabusscheduler.database.windows.net,1433; Database = Syllabus Database\", \"HowToMakeDarn\", \"{-NearAnything1@}\");
		$conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
		}
		catch ( PDOException $e ) {
		print( \"Error connecting to SQL Server.\" );
		die(print_r($e));
		}
		//SQL Server Extension Sample Code:
		$connectionInfo = array(\"UID\" => \"HowToMakeDarn@syllabusscheduler\", \"pwd\" => \"{-NearAnything1@}\", \"Database\" => \"Syllabus Database\", \"LoginTimeout\" => 30, \"Encrypt\" => 1, \"TrustServerCertificate\" => 0);
		$serverName = \"tcp:syllabusscheduler.database.windows.net,1433\";
		$conn = sqlsrv_connect($serverName, $connectionInfo);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
echo "Connected successfully";
*/	
	//w3schools example of how to connect
$servername = "syllabusscheduler.database.windows.net,1433";
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

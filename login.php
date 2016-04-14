<!DOCTYPE html>
<html>
<body>
<?php
	//set the variables
 	$username =  $_POST["name"];
 	$password = $_POST["password"];
	$arrivaltime = time();
	$arrivaldate = getdate($arrivaltime);
	
	//echo the variables, confirm they were passed correctly
	ini_set('display_errors', 1);
	echo "your name is: ";
	echo $username; 
	echo "<br>";
	echo "Your password is: ";
	echo $password; 
	echo "<br>";
	echo "The current time is $arrivaldate[hours]:$arrivaldate[minutes]:$arrivaldate[seconds], $arrivaldate[month], $arrivaldate[mday], $arrivaldate[year]";
	echo "<br>"
	
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
	
	
?>
</body>
</html>

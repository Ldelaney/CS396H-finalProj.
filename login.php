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
	

	
	//connect to the database
try {
   $conn = new PDO ( "sqlsrv:server = tcp:syllabusscheduler.database.windows.net,1433; Database = Syllabus Database", "HowToMakeDarn", "-NearAnything1@");
       $conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
    }
catch ( PDOException $e ) {
   		print( "Error connecting to SQL Server." );
    	die(print_r($e));
	}
	
	//code right below this modified from w3schools
	$sql = "INSERT INTO Users (username, password, userArrivalTime) 
	VALUES ($userusername, $userpassword, $arrivalTime)"; //FIXME: arrivaltime may have a format mismatch -- seconds since UNIX epoc vs mySQL datetime
    // use exec() because no results are returned
    $conn->exec($sql);
    echo "New record created successfully";
	
?>
</body>
</html>

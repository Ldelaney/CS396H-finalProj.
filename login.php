<!DOCTYPE html>
<html>
<body>
<?php
	//set the variables
 	$userusername =  $_POST["name"];
 	$userpassword = $_POST["userpassword"];
	$arrivalTime = time();
	$arrivaldate = getdate($arrivalTime);
	
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
	
	//Prepare an SQL instruction to be executed, in this case, an insertion
	$stmt = $conn->prepare("INSERT INTO Users (username, password, userArrivalTimeInt) VALUES (?, ?, ?)");
	//bind parameters to the statement (this way of doing things protects better against SQL injection attacks than building a string)
	$stmt->bind_param("ssi", $userusername, $userpassword, $arrivalTime);
	$stmt->execute();
	echo "New record created successfully";
	/*
	//code right below this modified from w3schools (http://www.w3schools.com/php/php_mysql_insert.asp)
	$sql = "INSERT INTO Users (username, password, userArrivalTime) 
	VALUES ($userusername, $userpassword, $arrivalTime)"; //FIXME: arrivaltime may have a format mismatch -- seconds since UNIX epoc vs mySQL datetime
    // use exec() because no results are returned
    $conn->exec($sql);
    echo "New record created successfully";
    */
	
?>
</body>
</html>

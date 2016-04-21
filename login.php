<!DOCTYPE html>
<html>
<body>
<?php
	//set the variables
 	$userusername =  $_POST["name"];
 	$userpassword = $_POST["userpassword"];
	$arrivalTime = time();
	$arrivaldate = getdate($arrivalTime);
	$newUserCreated = false;
	$inDebug = true;
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
   		if ($inDebug){
   			print( "Error connecting to SQL Server." );
    		die(print_r($e));
    	}
	}
	
	//Prepare an SQL instruction to be executed, in this case, an insertion
	$stmt = $conn->prepare("INSERT INTO Users (username, password, userArrivalTimeInt) VALUES (:user, :pass, :timeInt)");
	//bind parameters to the statement (this way of doing things protects better against SQL injection attacks than building a string)
	$stmt->bindParam(':user', $userusername);
	$stmt->bindParam(':pass', $userpassword); 
	$stmt->bindParam(':timeInt', $arrivalTime);
	$stmtFlag = $stmt->execute();
	if ($stmtFlag){
		$newUserCreated = true;
		echo "Welcome " . $userusername;
	}
	else{
		//user already exists, because user/pass are a joint primary key
		//options: either overwrite that user's stuff (making a new calendar for them), or tell them to pick a new username
		//decision: have the user pick a calendar name, and create a new calendar for that user
			//this happens regardless, so our else statment doesn't matter
		echo "Welcome " . $userusername . "!";
	}
?>
</body>
</html>

<?php
// Start the session
session_start();
?>

<!DOCTYPE html>
<html>
<body>
<?php
  //Display results
  echo "Results: <br>";
  //FIXME: remove this for launch
  echo "user is " . $_SESSION["user"] . "<br>";
  echo "password is " . $_SESSION["password"]. "<br>";
  echo "filepath is " . $_SESSION["filepathname"]. "<br>";
  
  //print_r($_SESSION);
  //end of things to be removed
   header("Location: http://syllabusscheduler.azurewebsites.net/testing.php");
?>

<?php
// Start the user session
//for REFERENCE/info about how sessions work, go here: http://www.w3schools.com/php/php_sessions.asp
	session_start();
?>

<!DOCTYPE html>
<html>
<body>

<?php
  $outputfile = fopen("testfile.txt", "w");
  $msg = "This is a line of test output";
  fwrite($outputfile, $msg);
  fclose($outputfile);
?>
</body>
</html>

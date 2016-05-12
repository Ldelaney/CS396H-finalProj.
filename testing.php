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
  
  //set the name of where we are, and the name of the source file
  $name = basename(__FILE__, '.php');
  $source = __DIR__ . "/uploads/HW5.docx";
  echo "now reading contents from " . $source. "<br>";
  $phpWord = \PhpOffice\PhpWord\IOFactory:::load($source);
	//this should read things?
	//the library has OK documentation and examples, but I am still confused
?>
</body>
</html>

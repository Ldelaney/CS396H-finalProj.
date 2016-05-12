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
  
  echo __DIR__;
  
  //this is the section that would be a header file
  require_once __DIR__ . '/vendor/phpoffice/phpword/src/PhpWord/Autoloader.php'; //this is the right filepath
  date_default_timezone_set('UTC');
  
  use PhpOffice\PhpWord\Autoloader;
  use PhpOffice\PhpWord\Settings;
  
  error_reporting(E_ALL);
  define('CLI', (PHP_SAPI == 'cli') ? true : false);
  define('EOL', CLI ? PHP_EOL : '<br />');
  define('SCRIPT_FILENAME', basename($_SERVER['SCRIPT_FILENAME'], '.php'));
  define('IS_INDEX', SCRIPT_FILENAME == 'index');
  Autoloader::register();
  Settings::loadConfig();
  
  //aren't using writers
  // Set writers
  $writers = array('Word2007' => 'docx', 'ODText' => 'odt', 'RTF' => 'rtf', 'HTML' => 'html', 'PDF' => 'pdf');
  // Set PDF renderer
  if (null === Settings::getPdfRendererPath()) {
      $writers['PDF'] = null;
  }
  // Return to the caller script when runs by CLI
  if (CLI) {
      return;
  }
  
  //this is the end of the part that would be a header file
  
  //set the name of where we are, and the name of the source file
  $name = basename(__FILE__, '.php');
  $source = __DIR__ . '/uploads/HW5.docx';
 
 echo 'now reading contents from ' . $source;
  $phpWord = \PhpOffice\PhpWord\IOFactory::load($source);
	//this should read things?
	//the library has OK documentation and examples, but I am still confused
  // Save file
  echo write($phpWord, basename(__FILE__, '.php'), $writers);
  $resultSections = $phpWord->getSections();
  $fontName = $phpWord->getDefaultFontName();
  echo 'font name is ' . $fontName;
  echo 'hello world';
?>
</body>
</html>

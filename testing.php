<?php
// Start the user session
//for REFERENCE/info about how sessions work, go here: http://www.w3schools.com/php/php_sessions.asp
	session_start();
	ini_set("display_errors", 1); 
?>

<!DOCTYPE html>
<html>
<body>

<?php
	
 // $outputfile = fopen("testfile.txt", "w");
  //$msg = "This is a line of test output";
  //fwrite($outputfile, $msg);
  //fclose($outputfile);
  
  //echo __DIR__ . '<br>';
  
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
  
  function getText2($textRun)
{
	//echo '<br>';
	//echo 'This ' . get_class($textRun) . ' element has ' . $textRun->countElements() . ' elements<br>';
   	foreach($textRun->getElements() as $el)
    	{
    		if (get_class($el) == 'PhpOffice\PhpWord\Element\Text')
 		{
 			//get the text from a text element
 			echo  $el->getText() . ' ';
 		//	echo  '<br>';
 		}
	 	else if (get_class($el) == 'PhpOffice\PhpWord\Element\TextRun')
		{
			getText2($el);
 		}
 		else
 		{
 			echo 'This element is a ' . get_class($el) . ' not a TextRun or Text element<br>';
 		}
    	}
    	//echo 'Leaving function getText2<br>';
}
  	  	
  //set the name of where we are, and the name of the source file
  $filenamepath = '\uploads\\' .$_SESSION["filepathname"];
  $source = __DIR__ . $filenamepath;
  echo 'Reading the contents of ' . $source . '<br>';
  $phpWord = \PhpOffice\PhpWord\IOFactory::load($source); //should load the file into a phpWord object

  // Save file
 echo 'finished reading<br>';
 $resultSections = $phpWord->getSections();
 $resultDocInfo = $phpWord->getDocInfo();
 echo $resultDocInfo->getModified() . '<br>'; //this is getting the correct timestamp
 
  $count = 0;
  $count2 = 0;
  echo 'number of sections = ' . count($phpWord->getSections()). '<br>';

 foreach ($phpWord->getSections() as $thisSection){//($resultSections as $section){
 	$count = $count + 1;
 	echo 'number of elements = ' . count($thisSection->getElements()) . ' or recursively ' . count($thisSection->getElements(), COUNT_RECURSIVE) . '<br>';
 
 	foreach($thisSection->getElements() as $thisElement)
 	{
 		
 		$count2 = $count2 + 1;
 		
 		if (get_class($thisElement) == 'PhpOffice\PhpWord\Element\Text')
 		{
 			//get the text from a text element
 			echo  $$thisElement->getText() . ' ';
 			//echo  '<br>';
 			//echo '<br>finished reading a text element<br>';
 		}
 		else
 		{
 			//echo '<br>';
 			//echo 'My class type is ' . get_class($element) . '<br>';
 			getText2($thisElement);
 			//echo '<br>finished a call to getText2<br>';
 		}
 	//	echo '<br>Finished reading element ' . $count2 .'<br>';
 	}
	 
 	echo 'Finished reading this section<br>';
 }
	echo '<br><br>Number of sections read is' . $count . '<br>';
	echo 'number of elements read in all of those sections total is ' . $count2 . '<br>';

 echo 'we have been unable to reach this line<br>';

 
?>
</body>
</html>

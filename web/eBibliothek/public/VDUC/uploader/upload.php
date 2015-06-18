<?php
/**
* @Autro: Bernhard Schmid
* @Datum: 17.05.2015
*/

function rmdir_recursive($dir) {
    foreach(scandir($dir) as $file) {
       if ('.' === $file || '..' === $file) continue;
       if (is_dir("$dir/$file")) rmdir_recursive("$dir/$file");
       else unlink("$dir/$file");
   }
   
   rmdir($dir);
}

if($_FILES["upl"]["name"]) {
	$filename = $_FILES["upl"]["name"];
	$source = $_FILES["upl"]["tmp_name"];
	$type = $_FILES["upl"]["type"];
	
	$name = explode(".", $filename);
	$accepted_types = array('application/zip', 'application/x-zip-compressed', 'multipart/x-zip', 'application/x-compressed');
	foreach($accepted_types as $mime_type) {
		if($mime_type == $type) {
			$okay = true;
			break;
		} 
	}
	
	
	$continue = strtolower($name[1]) == 'zip' ? true : false;
	if(!$continue) {
		$message = "The file you are trying to upload is not a .epub or .zip file. Please try again.";
	}

  /* PHP current path */
  $path = dirname(__FILE__).'/';  // absolute path to the directory where zipper.php is in
  $filenoext = basename ($filename, '.zip');  // absolute path to the directory where zipper.php is in (lowercase)
  $filenoext = basename ($filenoext, '.epub');  // absolute path to the directory where zipper.php is in (when uppercase)
    
  $targetdir = "../books/epub/". $filenoext; // target directory
  $targetzip = "../books/epub/". $filename; // target zip file
  
  /* create directory if not exists', otherwise overwrite */
  /* target directory is same as filename without extension */
  
  if (is_dir($targetdir))  rmdir_recursive ( $targetdir);
 
     
  mkdir($targetdir, 0777);
  
  
  /* here it is really happening */
	
	if(move_uploaded_file($source, $targetzip)) {
		$zip = new ZipArchive();
		$x = $zip->open($targetzip);  // open the zip file to extract
		if ($x === true) {
			$zip->extractTo($targetdir); // place in the directory with same name  
			$zip->close();
	
			unlink($targetzip);
		}
		$message = "Your .epub file was uploaded and unpacked.";
	} else {	
		$message = "There was a problem with the upload. Please try again.";
	}
}

/*
* 	Welche Files darf man überhaupt hochladen?
* Unten stehen alle File-Extentions die benutzt werden können um ein File hoch zu laden.
*/
$allowed = array('epub', 'mobi');

if(isset($_FILES['upl']) && $_FILES['upl']['error'] == 0){

	$extension = pathinfo($_FILES['upl']['name'], PATHINFO_EXTENSION);

	$filename = $_FILES['upl']['tmp_name'];
	
	if(!in_array(strtolower($extension), $allowed)){
		echo '{"status":"error"}';
		exit;
	}

	/*
	* Die nachfolgenden ifs überprüfen um welches Fileformat es sich handelt und ordnen es dem richtigen Ordner zu
	* Der File-path wird auch in die Datenbank gespeichert (ist vorerst noch geplant) um das File später auch wieder downloaden zu können
	*/
	
	if($extension == 'epub'){
		if(move_uploaded_file($filename, "../books/epub/".$_FILES['upl']['name'])){				
			echo '{"status":"success"}';
			exit;
		}
	}

	if($extension == 'mobi'){
		if(move_uploaded_file($filename, '../books/mobi/'.$_FILES['upl']['name'])){
			echo '{"status":"success"}';
			exit;
		}
	}
	if($extension == 'pdf'){
		if(move_uploaded_file($filename, '../books/pdf/'.$_FILES['upl']['name'])){
			echo '{"status":"success"}';
			exit;
		}
	}
	
}
echo '{"status":"error"}';
exit;
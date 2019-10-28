 
 <?php 
//NOTE - LOOK OUT FOR if($ext == "JPG" or $ext == "jpg" or $ext == "jpeg") AS IT IS CASE SENSITIVE- MAKE SURE ALL THE IMAGE EXTENTIONS ARE EITHER LOWER OR UPPER CASE
//USE FIND AND REPLACE AS THERES LOTS OF THEM 'JPG' || 'jpeg'


$renameAddon = "TH00";//THUMBNAIL NAME CHANGE FROM ORIGINAL - TH00 IS ADDED TO THE FRONT 
  ///RESIZE THE IMAGE
//sets maximum width/heigth

				
				
	
	
?>
 
 
 <table><tr><td>
 
  <?php
//////////////////////////////FIRST GROUP OF IMAGES -  $PATH PORTRAIT
         
			//reset column
			 //$column = 2;
////////////////////////////// just the tall portrait images first
			  	  /// START THE JPG IMAGE READING FROM THE DIRECTORIES
$filetype = $_GET[filetypes];
$dh = opendir($path);
$files = array();
	////////////LOOP to read the JPG files only and place them in an array
while (($file = readdir($dh)) !== false) {   
   $fileurl = $path."/".$file; 
	 //ONLY READ THE .JPG FILES
	 $ext = pathinfo($file, PATHINFO_EXTENSION);
	//$ext = end(explode('.', $file));
	if($ext == "JPG" or $ext == "jpg" or $ext == "jpeg")	 
{
	//READ ALL THE FILES FIRST OF ALL AND THEN FILTER OUT THE JPGS AND TXT FILES FOR DISPALY
	array_push($files, $file);
}
}
closedir($dh);
 //shuffle($files);// FOR RANDOM GALLERY
//shuffle($files);
natsort($files);
 //shuffle($files);
//shuffle($files);
//natsort($files)// FOR ordered GALLERY
///////////////end of loop to read JPG only files
	//START THE LOOP TO PRINT FILES AND TABLE CONTENTS
	//PORTRAIT OR LANDSCAPE NO PROBLEMS
	
	   foreach ($files as $file) { 

 // code to resize images
	
	$size = getimagesize ($path."/".$file);
						
						
								$new_width=$imagesize;
								if ($new_width > $size[0])
								{
								$new_width= $size[0];
								$new_height= $size[1];
								}
								
								if ($new_width < $size[0])
								{
								// finds the width of image sets it to $new_width and creates a ratio to apply to the height
								$ratio=($new_width/$size[0]);
								$new_height= $ratio*$size[1];
								}
								//$new_height2= $ratio*$size[1];
									if ($new_height > $imagesize)
									{
									$new_height = $imagesize;
									$width_ratio = ($new_height/$size[1]);
									$new_width = $width_ratio*$size[0];
									}
					

 // ONLY READ THE .JPG FILES
 $ext = pathinfo($file, PATHINFO_EXTENSION);
	// $ext = end(explode('.', $file));
if($ext == "JPG" or $ext == "jpg" or $ext == "jpeg"){//if its a JPG

  
		 		
			//check to see if its a thumbnail
	$findme = $renameAddon; //the addon name of the thumbnails at begining of filename
	$pos = strpos($file, $findme);	
		
if($pos === 0) {//if its a thumbnail

//AND IF ITS A PORTRAIT IMAGE - ie height is more than width
if($new_height > $new_width){
	
	//echo("TEST");
	$insert1 = ""; $insert2="";
    //start new row after a set number of columns decided by $columnnum
  if($column >= $columnnum){$insert1 = $tr1; $insert2 = $tr2;  $column = 0;}else {$insert1 = ""; $insert2="";}
			
		$filelink =explode($renameAddon,$file);	//explode the same addonname as above FILELINK NOW BECOMES THE FULL SIZED IMAGE FOR LINK		

 echo("<a href =\"imagesdirect.php?gallery=".$gallery."&item=".$filelink[1]."\" id=\"".$filelink[1]."\">");
  
  echo("<img src=\"".$path."/".$file."\" width='".$new_width."' height='".$new_height."' class=\"rounded2\" border =\"1\" ></a></td>".$insert2.$insert1."<td>"); //print images found 
	 //echo($column);
	  $column++;
	$numberImages1++;
    }
	}	
	}//END OF THE Three JPG/thumbnail/portrait or landscape IF CONDITIONALS
	
	//////////////////////////
  }

//////////////end of image directory reader

?>
</td></tr></table><table><tr><td>

 <?php
			//reset column
			// $column1 = 2;
			 
			 //////////////////////PATH LANDSCAPE
////////////////////////////// FIRST GROUP OF IMAGES FROM $PATH just the wide landscape images
			  	  /// START THE JPG IMAGE READING FROM THE DIRECTORIES
$filetype = $_GET[filetypes];
$dh = opendir($path);
$files1 = array();
	////////////LOOP to read the JPG files only and place them in an array
while (($file1 = readdir($dh)) !== false) {   
   $fileurl = $path."/".$file1; 
	 //ONLY READ THE .JPG FILES
	 $ext = pathinfo($file1, PATHINFO_EXTENSION);
	//$ext = end(explode('.', $file1));
	if($ext == "JPG" or $ext == "jpg" or $ext == "jpeg")	 
{
	//READ ALL THE FILES FIRST OF ALL AND THEN FILTER OUT THE JPGS AND TXT FILES FOR DISPALY
	array_push($files1, $file1);
}
}
closedir($dh);
//shuffle($files);// FOR RANDOM GALLERY
natsort($files1);// FOR ordered GALLERY
///////////////end of loop to read JPG only files
	//START THE LOOP TO PRINT FILES AND TABLE CONTENTS
	//PORTRAIT OR LANDSCAPE NO PROBLEMS
	
	   foreach ($files1 as $file1) { 
  
 // code to resize images
	
	$size = getimagesize ($path."/".$file1);
						
						
								$new_width=$imagesize;
								if ($new_width > $size[0])
								{
								$new_width= $size[0];
								$new_height= $size[1];
								}
								
								if ($new_width < $size[0])
								{
								// finds the width of image sets it to $new_width and creates a ratio to apply to the height
								$ratio=($new_width/$size[0]);
								$new_height= $ratio*$size[1];
								}
								//$new_height2= $ratio*$size[1];
									if ($new_height > $imagesize)
									{
									$new_height = $imagesize;
									$width_ratio = ($new_height/$size[1]);
									$new_width = $width_ratio*$size[0];
									}
					

 // ONLY READ THE .JPG FILES
 $ext = pathinfo($file1, PATHINFO_EXTENSION);
	 //$ext = end(explode('.', $file1));
if($ext == "JPG" or $ext == "jpg" or $ext == "jpeg"){//if its a JPG
		 		
			//check to see if its a thumbnail
	$findme = $renameAddon; //the addon name of the thumbnails at begining of filename
	$pos = strpos($file1, $findme);	
		
if($pos === 0) {//if its a thumbnail

//AND IF ITS A landscape IMAGE - ie width is more than height
if($new_height < $new_width){
	
			$insert1 = ""; $insert2="";
    //start new row after a set number of columns decided by $columnnum
  if($column1 >= $columnnum2){$insert1 = $tr1; $insert2 = $tr2;  $column1 = 0;}else {$insert1 = ""; $insert2="";}
  
		$filelink1 =explode($renameAddon,$file1);	//explode the same addonname as above FILELINK NOW BECOMES THE FULL SIZED IMAGE FOR LINK		

 echo("<a href =\"imagesdirect.php?gallery=".$gallery."&item=".$filelink1[1]."\" id=\"".$filelink1[1]."\">");
  
  echo("<img src=\"".$path."/".$file1."\" width='".$new_width."' height='".$new_height."' class=\"rounded2\" border =\"1\" ></a></td>".$insert2.$insert1."<td>"); //print images found 
	 //echo($column);
	  $column1++;
	$numberImages2++;
    }
	}	
	}//END OF THE Three JPG/thumbnail/portrait or landscape IF CONDITIONALS
	
	//////////////////////////
  }

//////////////end of FIRST IMAGE image directory reader
	
	

?>



   
         

          </td></tr></table>
          
         <?php echo("<br><br> Number of Images = ".($numberImages1 + $numberImages2)); ?>
          
         
            
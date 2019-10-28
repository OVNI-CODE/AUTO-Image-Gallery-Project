
  <?php 
  //set the thumnail WIDTH size to CREATE
  $imagesize = 444;
  //$size = 0;
  
$imagefolder='.';//means this folder directory is read
$thumbsfolder='thumbs';
$renameAddon = "TH00";
$pics=directory($imagefolder,"jpg,JPG,JPEG,jpeg,png,PNG");//FUNCTION TO READ THE DIRECTORIES AND SAVE TO PICS ARRAY
$pics=ditchtn($pics,$renameAddon);//use this to prevent thumbnails becoming reprocessed - the addon to original filename is here


if ($pics[0]!="")//IF THERE ARE PICS
{
	foreach ($pics as $p)//THEN LOOP THROUGH THE CREATE THUMB FUNCTION
	{
		 // code to resize images
	
	$size = getimagesize ($p);
						
						
								$new_width=$imagesize;
								if ($new_width > $size[0])//IF IMAGE IS ALREADY TINY THEN JUST KEEP THE SAME
								{
								$new_width= $size[0];
								$new_height= $size[1];
								}
								
								if ($new_width < $size[0])
								{
								// finds the width of image sets it to $new_width and creates a ratio to apply to the height
								$ratio=($new_width/$size[0]);
								$new_height= floor($ratio*$size[1]);
								}
								//$new_height2= $ratio*$size[1];
									if ($new_height > $imagesize)
									{
									$new_height = $imagesize;
									$width_ratio = ($new_height/$size[1]);
									$new_width = floor($width_ratio*$size[0]);
									}
									
									///////////////end thumbsize
		
		$bsize = filesize($p)  ;
				$kbsize = round(($bsize / 1000),0);	
		echo("<br>CREATED: TH00".$p." W = ".$new_width."  H = ".$new_height." ".$kbsize." Kb" );
		
		
		createthumb($p,$renameAddon.$p,$new_width,$new_height);
		
	}
}

/*
	Function ditchtn($arr,$thumbname)
	filters out thumbnails
*/
function ditchtn($arr,$thumbname)
{
	//randomise the process
	shuffle($arr);
	foreach ($arr as $item)
	{
		if (!preg_match("/^".$thumbname."/",$item)){$tmparr[]=$item;}
	}
	return $tmparr;
}

/*
	Function createthumb($name,$filename,$new_w,$new_h)
	creates a resized image
	variables:
	$name		Original filename
	$filename	Filename of the resized image
	$new_w		width of resized image
	$new_h		height of resized image
*/	
function createthumb($name,$filename,$new_w,$new_h)
{
	$system=explode(".",$name);//"/\bweb\b/i",
	if (preg_match("/jpg|jpeg/i",$system[1])){$src_img=imagecreatefromjpeg($name);}
	
	
	/////////RESIZE FUNCTIONS
	$old_x=imageSX($src_img);// old width
	$old_y=imageSY($src_img);//old height

		
		$thumb_w=$new_w;
		$thumb_h=$new_h;
	
	$dst_img=ImageCreateTrueColor($thumb_w,$thumb_h);
	imagecopyresampled($dst_img,$src_img,0,0,0,0,$thumb_w,$thumb_h,$old_x,$old_y); 
	
	
	if (preg_match("/png/",$system[1]))//if its in the png folder
	{
		imagepng($dst_img,$filename);//calls afunction 
	} else {
	$filename2 = "thumbs/".$filename;
		imagejpeg($dst_img,$filename);//calls a function 
	}
	imagedestroy($dst_img); 
	imagedestroy($src_img); 
}

/*
        Function directory($directory,$filters)
        reads the content of $directory, takes the files that apply to $filter 
		and returns an array of the filenames.
        You can specify which files to read, for example
        $files = directory(".","jpg,gif");
                gets all jpg and gif files in this directory.
        $files = directory(".","all");
                gets all files.
*/
function directory($dir,$filters)
{
	$handle=opendir($dir);
	$files=array();
	if ($filters == "all"){while(($file = readdir($handle))!==false){$files[] = $file;}}
	if ($filters != "all")
	{
		$filters=explode(",",$filters);
		while (($file = readdir($handle))!==false)
		{
			for ($f=0;$f<sizeof($filters);$f++):
				$system=explode(".",$file);
				if ($system[1] == $filters[$f]){$files[] = $file;}
			endfor;
		}
	}
	closedir($handle);
	return $files;
}
?>

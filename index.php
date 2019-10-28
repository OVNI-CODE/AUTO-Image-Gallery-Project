<!doctype html>
<html>

<?php 
//$text=""; 

    
	
	
///SET THE GALLERY COLLECTION FOR ALL IMAGES -images/ritual remnants/paper
//$gallery="images/tbilisi/";
//READS AND PRINTS THE FOLLOWING IN ORDER
$text1 = "text.txt"; //the intro text
$path = "images"; //JUST A DOT MEANS THIS DIRECTORY THE PLACE WHERE IMAGES ARE KEPT
$pagetitle = "Photographs (semi-selected) SnakeBeings: ";
//$path = "https://snakebeings.co.nz/events/2018 images/artscience residency"; //ALL FILES BOTH portrait AND LANDSCAPE
//name for thumbnails - must be same as load.php
$renameAddon = "TH00";//THUMBNAIL NAME CHANGE FROM ORIGINAL - TH00 IS ADDED TO THE FRONT 
  ///RESIZE THE IMAGE
//sets maximum width/heigth
					$imagesize = 300;//max height
					//$imagesizeHeight = 300; //max width
					//$size = 0;
					//Number of columns plus one
					//$columnnum2="8";//landscape
					$columnnum= 6; // PORTRAIT COLUMNS decide how many IMAGE columnes BEFORE APPLYING <TR> CODE to image table
					$columnnum2= 4 ; //LANDSCAPE COLUMNS
					$column =  2;//DEFAULT START COUNT AT TWO
					 $column1 = 1; // for second set of images
					$tr1="<tr></tr>";
					$tr2="</table><table>";
	
	
?>






<head>
<meta charset="utf-8">
<title><?php echo($pagetitle); ?></title>

	<link href="snakebeings.css" rel="stylesheet" type="text/css">
<style type="text/css">
body {
	background-image: url(https://snakebeings.co.nz/images/navigation/bg-repeat.jpg);
	color: #F7F3F3;
}
a:link {
	color: #2E7A1B;
}
a:visited {
	color: #151414;
}
a:hover {
	color: #F79C08;
}
a:active {
	color: #FF052B;
}
body,td,th {
	font-family: Gotham, "Helvetica Neue", Helvetica, Arial, sans-serif;
	color: #030303;
}
</style>
</head>

<body>
	
	

      <table width="800" border="0">
        <tbody>
          <tr>
            <td width="45">&nbsp;</td>
            <td width="532"><p><a href="https://snakebeings.co.nz"><img src="https://snakebeings.co.nz/images/navigation/navigation-0003-flat.jpg" alt="Back to home page" width="1200" height="171" class="rounded2" id="Image1" title="BAck to home page"></a><span class="prodlistform"><br>
            </span></p>
            <h3>&nbsp;</h3></td>
            <td width="194">&nbsp;</td>
            <td width="11">&nbsp;</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td><?php echo($pagetitle); ?><?php
	// PRINTS A TEXT directly FROM THE Intro.TXT FILE INCLUDING ALL INFO ON THE ALBUM
if (file_exists($text1))//look for the text NO PATH HERE
{
$lines = file($text1);
} else {
$lines = 'This page will be updated shortly';
}

if (file_exists($text1))
{
// Loop through our array, show HTML source as HTML source; and line numbers too.
foreach ($lines as $line_num => $line) {
    echo "</span> " . $line . "<br /></span>";
}}
//htmlspecialchars($line) was above to stop hyper links
?></td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td><?php include("inc image reader.php"); ?>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
        
</table></p>
 
        <p><a href="images/load.php">Load</a> more images<br>
       
     
</body>
</html>
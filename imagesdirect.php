
<?php

$category = strip_tags($_GET[category]); // could use the get/post function and use one page only 


$imagesize = 800;

$size = 0;

$prodtext = strip_tags($_GET[prodtext]); // prod text
$image = stripslashes($_GET[item]); // item return anchor 
$item = stripslashes($_GET[item]); // image filename hi-res SRC 
$galleryaddress = ($_GET[gallery]); // used for view others in series link
$path = "https://snakebeings.co.nz/"; //Put your website address here: URL to the top folder for return links



// take images from this directory for preview
//IE the directory where this page is located
$imagelocation = "images/";// nothing shown means the current directory
?>



<?php 
// code to resize images
	
	$size = getimagesize ($imagelocation.$image);
						
						
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
					
					


?>

<head>
<meta charset="utf-8">
<title><?php echo("Image gallery: ".$item); ?></title>
<link href="https://snakebeings.co.nz/css/snakebeings.css" rel="stylesheet" type="text/css">

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

</style>

<body>


<table width="341" border="0" class="rounded2">
  <tbody>
    <tr>
      <td width="357" align="center" valign="top"  class="rounded2" style="color: #FCF9F9"><span style="color: #F5E9E9; font-size: medium; ">[Click on image to return to <a href="index.php#<?php echo($image);?>"\">gallery page</a>] </span></td>
    </tr>
  </tbody>
</table>
<p style="color: #F5E9E9; font-family: Gotham, 'Helvetica Neue', Helvetica, Arial, sans-serif;">&nbsp;</p>
<table border="0" bgcolor="#F9F4F4" class="rounded2">
  <tbody>
    <tr>
      <td>
      <?php
// display image
echo(" <A HREF=\"index.php#".$image."\">");
echo("<img src=\"".$imagelocation.$image."\" alt=\"".$image."\" width='".$new_width."' class=\"rounded2\" height='".$new_height."' ></a>");
?>


</td>


</p>
<p>&nbsp;




 </p>

<td valign="top" width = "181"><p><span class="prodlistform">
  
  <?php //eCHO THE IMAGE NAME (minus the .jpg)
echo ("<STRONG><H2>".substr($item, 0, -4)."</H2></strong>");

?>
  
<br>
[Click on image to return to <a href="index.php#<?php echo($image);?>"\">gallery page</a>]

</tr>
  </tbody>
</table>
</td>
</tr>
  </tbody>
</table>

















<p>
  <?php



// back to product listing link
// need to do conditionals to get the type of page we are returning to
//echo("<A HREF=\"".$path.$galleryaddress."#".$image."\"> <span style=\"color: \#F7F2F2\">[View other images in this series]</span></A>");

?>
  
  <a href="index.php#<?php echo($image);?>"\">[View other images in this series]</a>
  
  
  
</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>

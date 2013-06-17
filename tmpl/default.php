
<?php
/**
 * @copyright	Copyright (C) 2013 Fabian Manzano. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */
defined('_JEXEC') or die;
?>
<?php
if ($a == null)
{echo "<pre>Oops: Or I couldnt find any images in the folder, or I couldnt find a folder with the name of <span class='label label-warning'>".$params->get('folder')."</span><br>Please make sure the folder exist in the Media Manager (Content -> Media Manager)<br>If the folder exists, please double check that you have spell it correctly in the Module Menu: Basic Options.</pre>";	
}
else
{
?>

<script type="text/javascript">

var $ = jQuery.noConflict();

$(document).ready(function() { $('#artist').carousel({ interval: 1000, cycle: true }); }); 

</script>

<?php
$folder  = $params->get('folder');
$image   = $params->get('Image_Name');
$arrows  = $params->get('arrow');
$speed   = $params->get('speed');
$files  = glob("images/".$folder."/*.*");
$b      = count($files);
/*echo $image."<br>";
if ($image==1)
{echo " there is image";}
else
{echo " means no image";}

echo display($image);
echo "<br>";
*/
$check = 0;//to check the first foto and make it active
echo "
<div class=\"carousel slide\" id=\"artist\">
<div class=\"carousel-inner\">

	 ";
//echo display($image);
for ($i=0; $i<$b; $i++) 
{ 
	$num = $files[$i];
	$base_name = basename($num);//get the name of photo
	list($width, $height) = getimagesize($num);
	if (is_numeric($width)) 
	{
		if ($check == 0 )//get the active
		{
			echo "
			<div class=\"item active\">
			<img src=\"$num\" alt=\"LaVonne LaRue. \">";
			echo display($image,$base_name);
			echo "</div>";		
		}
		else
		{
			echo "
			<div class=\"item\">
			<img src=\"$num\" alt=\"LaVonne LaRue. \">";
			echo display($image,$base_name);
			echo "</div>";
		}$check++;
	}
} 
echo "</div>";
if ($arrows == 1)
{
echo "
<a href=\"#artist\" class=\"left carousel-control\" data-slide=\"prev\">&lsaquo;</a> 
<a href=\"#artist\" class=\"right carousel-control\" data-slide=\"next\">&rsaquo;</a> ";
}
echo "</div>";
;}
?>  
<?php
function display($name,$filename){if ($name == 1){$a="<div class=\"carousel-caption\"><h4>$filename</h4></div>"; return $a;}}
//			<h4>$base_name</h4>
?>


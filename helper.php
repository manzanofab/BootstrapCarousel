<?php
/**
 * @copyright	Copyright (C) 2012 Fabian Manzano. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

// no direct access
defined('_JEXEC') or die;

JLoader::register('ContentHelperRoute', JPATH_SITE.'/components/com_content/helpers/route.php');

class modbootstrap_carouselHelper
{
public static function validation(&$params)
		{
			$folder_name = $params->get('folder');
			$files = glob("images/".$folder_name."/*.*");
			$b = count($files);
			if ($b==0) 
			{
				//return false;
				$check = null;
			}
			else
			{
				//check that there is at least 1 image;
				$cont = 0;
				for ($i=0; $i<$b; $i++) 
					{ 
					$image = $files[$i];
					list($width, $height) = getimagesize($image);
						if (is_numeric($width)) 
						{		
							$cont++;
						}
				}
				if ($count=0)
					{
						$check = null;
					}
				else
					{
						$check = $cont;
//						echo $check;
					}
			}
			return $check;

		}
}	//class ends

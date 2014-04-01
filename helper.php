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
        $num_files = count($files);
        if ($num_files==0) {
            return null;
        } else {
            //check that there is at least 1 image;
            $counter = 0;
            for ($i=0; $i<$num_files; $i++)
            {
                $image = $files[$i];
                list($width, $height) = getimagesize($image);
                if (is_numeric($width))
                {
                    $counter++;
                }
            }
            if ($count=0){
                return null;
            } else {
                return $counter;
            }
        }

    }
}	//class ends

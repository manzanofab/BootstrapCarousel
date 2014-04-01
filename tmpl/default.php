<?php
/**
 * @copyright	Copyright (C) 2013 Fabian Manzano. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */
defined('_JEXEC') or die;

if ($check_folder == null) {
    ?>
    <pre>Oops: Or I couldnt find any images in the folder, or I couldnt find a folder with the name of <span
            class='label label-warning'><?php $params->get('folder') ?></span><br>
    Please make sure the folder exist in the Media Manager (Content -> Media Manager)<br>
    If the folder exists, please double check that you have spell it correctly in the Module Menu: Basic Options.</pre>
<?php
}else {
    $folder = $params->get('folder');
    $div_id     = $params->get('id');
    $alt_text  = $params->get('Image_Name');
    //$speed   = $params->get('speed');

    $files  = glob("images/".$folder."/*.*");
    $num_files      = count($files);
    $check = true;  //to check the first foto and make it active
    ?>
    <script type="text/javascript">
        var $ = jQuery.noConflict();
        $(document).ready(function() { $('#<?php echo $div_id;?>').carousel({ interval: 1000, cycle: true }); });
    </script>

    <div id="<?php echo $div_id."_outer" ?>" class="carousel slide">
        <div id="<?php echo $div_id."_inner" ?>" class="carousel-inner">
            <?php

            for ($i=0; $i<$num_files; $i++) {
                $this_file = $files[$i];
                $base_name = basename($this_file);//get the name of photo
                list($width, $height) = getimagesize($this_file);
                if (is_numeric($width)) {?>
                    <div class="item <?php if ($check){
                                                echo "active";
                                                $check = false; }?>">
                        <img id="<?php echo $div_id."_img".$i ?>" src="<?php echo $this_file ?>" alt="<?php echo $alt_text ?>">
                        <?php if($alt_text == 1): ?>
                            <div class="carousel-caption"><h4><?php echo $base_name ?></h4></div>
                        <?php endif; ?>
                    </div>
                    <?php
                }
            }?>

        </div>
        <a href="#<?php echo $div_id."_outer" ?>" class="left carousel-control" data-slide="prev">&lsaquo;</a>
        <a href="#<?php echo $div_id."_outer" ?>" class="right carousel-control" data-slide="next">&rsaquo;</a>
    </div>
<?php }?>
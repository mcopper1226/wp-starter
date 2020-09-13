<?php 
if ($module['image_right'] != 'undefined') {
    $image_right = $module['image_right']['sizes']['medium_large']; 
   
}; 

if ($module['image_left'] != 'undefined') {
    $image_left = $module['image_left']['sizes']['medium_large']; 
}; 

if ($module['content_left'] != 'undefined') {
    $content_left = $module['content_left']; 
}; 

if ($module['content_right'] != 'undefined') {
    $content_right = $module['content_right']; 
}; 

?>

<div class="grid grid-gap-md">
    <div class="col-6@md">
        
            <?php if($image_left) : echo '<img src="' . $image_left . '"/>'; endif; ?>
            <?php if($content_left) : echo $content_left; endif; ?>
 
    </div>
    <div class="col-6@md">

            <?php if($image_right) : echo '<img src="' . $image_right. '"/>'; endif; ?>
            <?php if($content_right) : echo $content_right; endif; ?>

    </div>
</div>






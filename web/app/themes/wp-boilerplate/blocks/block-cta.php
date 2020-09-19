<?php 
if ($module['heading'] != 'undefined') {
    $heading = $module['heading']; 
}; 

if ($module['subheading'] != 'undefined') {
    $subheading = $module['subheading']; 
}; 

if ($module['button'] != 'undefined') {
    $button_link = $module['button']['url']; 
    $button_title = $module['button']['title']; 
    $button_target = $module['button']['target']; 
}

?>


<?php if($subheading) : echo '<h3>' . $subheading . '</h3>'; endif; ?>
    <?php if($heading) : echo '<h2>' . $heading . '</h2>'; endif; ?>
    <?php if($button_link) : echo '<a class="btn btn--primary" href="' . $button_link . '">' . $button_title . '</a>'; endif; ?>
  
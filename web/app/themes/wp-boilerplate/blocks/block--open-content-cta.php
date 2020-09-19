<?php 
$background = $module['background'];
$background_image = $module['background_image']['sizes']['full']; 
$heading = $module['heading']; 
$content = $module['content']; 
$button_one = $module['button_one']; 
$button_two = $module['button_two']; 

?>

<?php if($background == 'dark') { ?>
    <section class="background-black-radial-gradient text-component text-center padding-y-xl">
    <div class="container max-width-adaptive-lg">
        <h2 class="text-white"><?php echo $heading; ?></h2>
        <p class="text-white margin-y-md"><?php echo $content; ?></p>
        <div class="btn-group margin-top-md">
        <?php if($button_one) { ?>
            <a class="btn btn--primary" href="<?php echo $button_one['url']; ?>"><?php echo $button_one['title']; ?></a>
        <?php } ?>
        <?php if($button_two) { ?>
            <a class="btn btn--primary" href="<?php echo $button_two['url']; ?>"><?php echo $button_two['title']; ?></a>
        <?php } ?>
        </div>
    </div>  
</section>

<?php } ?>


<?php if($background == 'image') { ?>
    <section class="background-image-dark-overlay text-component text-center padding-y-xxl" style="background-image: url('<?php echo $background_image; ?>')">
    <div class="container max-width-adaptive-lg">
        <h2 class="text-white"><?php echo $heading; ?></h2>
        <p class="text-white margin-top-md"><?php echo $content; ?></p>
        <div class="btn-group margin-top-md">
            <?php if($button_one) { ?>
                <a class="btn btn--white" href="<?php echo $button_one['url']; ?>"><?php echo $button_one['title']; ?></a>
            <?php } ?>
            <?php if($button_two) { ?>
                <a class="btn btn--white" href="<?php echo $button_two['url']; ?>"><?php echo $button_two['title']; ?></a>
            <?php } ?>
        </div>
    </div>  
</section>

<?php } ?>
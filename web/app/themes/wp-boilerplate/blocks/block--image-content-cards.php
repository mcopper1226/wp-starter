<?php $items = $module['card_Item']; ?>

<section class="padding-y-xxl">
  <div class="container max-width-adaptive-lg">
    <div class="grid grid-gap-md">
   

<?php foreach ($items as $item) {  ?>

    <?php 
    $image_src = $item['card_item_image']['sizes']['large']; 
    $image_alt = $item['card_item_image']['alt']; 
    $heading = $item['card_item_heading']; 
    $content = $item['card_item_content']; 
    $link = $item['card_item_link']; 
    $link_title = $link['title']; 
    $link_url = $link['url']; 
    ?>

    <div class="col-6@md text-component padding-y-sm">
        <div class="overflow-hidden">
            <img src="<?php echo $image_src; ?>" alt="<?php echo $image_alt; ?>" />
        </div>
        <h3 class="margin-y-lg"><?php echo $heading; ?></h3>
        <p><?php echo $content; ?></p>
        <a href="<?php echo $link_url; ?>" class="btn btn--link"><?php echo $link_title; ?></a>
    </div>


<?php } ?>

  
</div>
  </div>
</section>
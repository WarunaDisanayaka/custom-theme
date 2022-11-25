<?php
    if (have_posts() ):while (have_posts() ): the_post(); ?>
   
<div class="container">
  <div class="row">
    <div class="col-sm shop-details-side">
    <?php the_content();?>
    </div>
    <div class="col-sm">
    <?php the_field('location')?>
    </div>
  </div>
</div>
<?php endwhile;else:endif;?>
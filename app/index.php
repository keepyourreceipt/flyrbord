<?php
  get_header(); ?>

<div class="row">
  <div clas="col-md-8">

  <?php
  if( have_posts() ) {
    while( have_posts() ) {
      the_post();
      ?>

      <h2><?php the_title(); ?></h2>
      <p><?php the_excerpt(); ?></p>
      <a href="<?php the_permalink(); ?>">permalink</a>

      <?php
    }
  } ?>

  </div class="col-md-4">
    <?php get_sidebar(); ?>
  </div>
  
</div>
  <?php
  get_footer();
?>

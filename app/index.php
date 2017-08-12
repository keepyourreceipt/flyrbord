<?php get_header(); ?>
<div class="row">
  <div class="col-md-8 post-collection">
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
  </div><!-- end post-collection -->

  <?php if( ! is_woocommerce() ) { ?>
    <div class="col-md-4 sidebar">
      <div class="row">
        <?php get_sidebar(); ?>
      </div>
    </div>
  <?php } ?><!-- end sidebar -->

</div>
<?php get_footer(); ?>

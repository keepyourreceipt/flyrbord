<?php get_header(); ?>
  <?php
    if( have_posts() ) {
      while( have_posts() ) {
        the_post();
          // If post has thumbnail, display image
          if ( has_post_thumbnail() ) {
              $featured_image_url = get_the_post_thumbnail_url(get_the_ID(),'large');
          }
    ?>
    <div class="row">
      <div class="col-sm-12 post-header">
        <div class="post-header" style="background-image: url(<?php echo $featured_image_url; ?>)">
          <div class="container">
            <div class="col-sm-10 col-sm-offset-1 content">
              <h2><?php echo get_the_title(); ?></h2>
              <h5><?php echo get_the_date(); ?></h5>
            </div>
          </div>
        </div>
      </div><!-- /.post-header -->

    <div class="container">
      <div class="row">
        <div class="col-sm-10 col-sm-offset-1 post-content">
          <div class="col-sm-12 post-comments">
            <?php the_content(); ?>
            <?php
              // If comments open, show comments form
              // NOTE: comments template modified from twentyseventeen theme
              if ( comments_open() ) {
                comments_template();
              }
            ?>
        </div>
      </div>
    </div>
  <?php
  }
} ?>

<?php get_footer(); ?>

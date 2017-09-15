<?php get_header(); ?>
<div class="row">
  <?php
    if ( is_active_sidebar( 'blog_sidebar' ) ) {
      $has_sidebar = true;
      $post_container_classes = "col-sm-8";
    } else {
      $post_container_classes = "col-sm-12 col-md-offset-1 col-md-10";
    }
  ?>
  <div class="<?php echo $post_container_classes; ?> post-container">
    <?php
    if( have_posts() ) {
      while( have_posts() ) {
        the_post();
        ?>
        <div class="post">
          <?php
          // If post has thumbnail, display image
          if ( has_post_thumbnail() ) { ?>
            <div class="featured-image">
              <a href="<?php the_permalink(); ?>">
                <?php the_post_thumbnail('post-listing'); ?>
              </a>
            </div>
          <?php } ?>

          <div class="text-content">
            <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
            <h4>Posted <?php echo get_the_date(); ?> by <?php echo get_the_author(); ?></h4>
            <h4>Archive: <?php the_category( ', ' ); ?></h4>
            <?php the_content(); ?>
          </div>
        </div>
        <?php
      }
    }
    ?>
    <?php if ( comments_open() ) { ?>
      <div class="row">
        <div class="col-sm-12 post-comments">
          <?php comments_template(); ?>
        </div>
      </div>
    <?php } ?>
  </div><!-- end .post-container -->
  <?php
    // If Blog Sidebar has active widgets, include sidebar template
    if ( $has_sidebar ) {
      get_sidebar();
    }
  ?>
</div><!-- /.row -->
<?php get_footer(); ?>

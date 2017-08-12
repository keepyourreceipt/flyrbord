<?php get_header(); ?>
<div class="row">
  <?php
    $hase_sidebar = false;
    if ( is_active_sidebar( 'blog_sidebar' ) ) {
      $has_sidebar = true;
      $posts_collection_classes = "col-sm-8";
    } else {
      $posts_collection_classes = "col-sm-10 col-sm-offset-1";
    }
  ?>
  <div class="<?php echo $posts_collection_classes; ?> post-content">
    <?php
    if( have_posts() ) {
      while( have_posts() ) {
        the_post();

          // If post has thumbnail, display image
          if ( has_post_thumbnail() ) {
              the_post_thumbnail('large');
          }
        ?>
        <h2><?php echo get_the_title(); ?></h2>
        <p><?php echo get_the_content(); ?></p>
        <?php
      }
    } ?>

    <div class="row">
      <div class="col-sm-12 post-comments">
        <?php
          // If comments open, show comments form
          // NOTE: comments template modified from twentyseventeen theme
          if ( comments_open() ) {
            comments_template();
          }
        ?>
      </div>
    </div>

  </div><!-- End single post content -->

  <?php
    // If Blog Sidebar has active widgets, include sidebar template
    if ( $has_sidebar ) { get_sidebar( 'blog' ); }
  ?>

</div>
<?php get_footer(); ?>

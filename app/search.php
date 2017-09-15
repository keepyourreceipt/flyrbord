<?php get_header(); ?>

<div class="row">
  <?php
    $hase_sidebar = false;
    if ( is_active_sidebar( 'blog_sidebar' ) ) {
      $has_sidebar = true;
      $posts_collection_classes = "col-sm-8";
    } else {
      $posts_collection_classes = "col-sm-12 col-md-offset-1 col-md-10";
    }
  ?>
  <div class="<?php echo $posts_collection_classes; ?> posts-collection">
    <h2 class="remove-top-margin">Seach Results: <?php echo get_search_query(); ?></h2>
    <?php
    if( have_posts() ) {
      while( have_posts() ) {
        the_post();
        ?>
        <div class="post">
          <div class="text-content">
            <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
            <p><?php the_excerpt(); ?></p>
            <h4>Archive: <?php the_category( ', ' ); ?></h4>
            <a href="<?php the_permalink(); ?>">Read more</a>
          </div>
        </div>
        <?php
      }
    } else { ?>
        <h4>No search reults found.</h4>
        <p>Please try searching again. If you've landed here in error, please contact us.</p>
    <?php } ?>

    <div class="row">
      <div class="col-sm-12">
        <?php
          $pagination_args = array(
            'screen_reader_text' => ' ',
            "prev_text" => "Previous Post",
            "next_text" => "Next Post",
            "mid_size" => 2
          );
          $posts_pagination_links = get_the_posts_pagination( $pagination_args );

          // Display posts pagination
          echo $posts_pagination_links;
        ?>
      </div>
    </div>

  </div><!-- end post-collection -->

  <?php
    // If Blog Sidebar has active widgets, include sidebar template
    if ( $has_sidebar ) {
      get_sidebar();
    }
  ?>
</div>
<?php get_footer(); ?>

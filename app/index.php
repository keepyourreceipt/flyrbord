<?php get_header(); ?>

<?php if( is_archive() ) { ?>
  <div class="row">
    <h2><?php the_archive_title(); ?></h2>
  </div>
<?php } ?>

<?php if( is_search() ) { ?>
  <div class="row">
    <h2>Seach Results: <?php echo get_search_query(); ?></h2>
  </div>
<?php } ?>

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
    <?php
    if( have_posts() ) {
      while( have_posts() ) {
        the_post();
        ?>
        <div class="post">
          <?php
          // If post has thumbnail, display image
          if ( has_post_thumbnail() ) { ?>
            <a href="<?php the_permalink(); ?>">
              <?php the_post_thumbnail('large'); ?>
            </a>
          <?php } ?>
          <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
          <p><?php the_excerpt(); ?></p>
          <a href="<?php the_permalink(); ?>">Read more</a>
        </div>
        <?php
      }
    } else {
      if ( is_search() ) { ?>

        <h2>No search reults found.</h2>
        <p>Please try searching again. If you've landed here in error, please contact us.</p>

      <?php }
    }

    ?>

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

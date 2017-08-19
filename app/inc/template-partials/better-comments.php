<?php
function better_comments( $comment, $args, $depth ) {
	global $post;
	$author_id = $post->post_author;
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
		case 'pingback' :
		case 'trackback' :
		// Display trackbacks differently than normal comments. ?>
		<li id="comment-<?php comment_ID(); ?>" <?php comment_class(); ?>>
			<div class="pingback-entry"><span class="pingback-heading"><?php esc_html_e( 'Pingback:', 'twenties' ); ?></span> <?php comment_author_link(); ?></div>
		<?php
			break;
			default :
		// Proceed with normal comments. ?>

		<li id="li-comment-<?php comment_ID(); ?>">
			<article id="comment-<?php comment_ID(); ?>" <?php comment_class('clr'); ?>>
				<div class="comment-details clr">

					<div class="row">
						<div class="col-xs-2">
							<div class="comment-author vcard">
								<?php echo get_avatar( $comment, 100 ); ?>
							</div>
						</div>
						<div class="col-xs-10">

							<div class="row">
								<div class="col-sm-12">
									<header class="comment-meta">
										<cite class="fn"><?php comment_author_link(); ?></cite>
										<span class="comment-date">
										<?php printf( '<a href="%1$s"><time datetime="%2$s">%3$s</time></a>',
											esc_url( get_comment_link( $comment->comment_ID ) ),
											get_comment_time( 'c' ),
											sprintf( _x( '%1$s', '1: date', 'twenties' ), get_comment_date() )
										); ?> <?php esc_html_e( 'at', 'twenties' ); ?> <?php comment_time(); ?>
										</span><!-- .comment-date -->
									</header><!-- .comment-meta -->
								</div>
							</div>

							<?php if ( '0' == $comment->comment_approved ) : ?>
								<div class="row">
									<div class="col-sm-12">
										<p class="comment-awaiting-moderation"><?php esc_html_e( 'Your comment is awaiting moderation.', 'twenties' ); ?></p>
									</div>
								</div><!-- /.row -->
							<?php endif; ?>

							<div class="row">
								<div class="col-sm-12">
									<div class="comment-content entry clr">
										<?php comment_text(); ?>
									</div>
								</div><!-- /.comment-content -->
							</div><!-- /.row -->

							<div class="row">
								<div class="col-sm-12">
									<div class="reply comment-reply-link">
										<?php comment_reply_link( array_merge( $args, array(
											'reply_text' => esc_html__( 'Reply to this message', 'twenties' ),
											'depth'      => $depth,
											'max_depth'	 => $args['max_depth'] )
										) ); ?>
									</div><!-- .reply -->
								</div>
							</div><!-- /.row -->

						</div>
					</div>

				</div><!-- .comment-details -->
			</article><!-- #comment-## -->
		<?php
		break;
	endswitch; // End comment_type check.
}

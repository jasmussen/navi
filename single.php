<?php get_header(); ?>

	<?php
	while ( have_posts() ) : the_post();

		get_template_part( 'template-parts/content', get_post_type() );

		if ( comments_open() || get_comments_number() ) :
			comments_template();
		endif;

		?>
		<div class="navigation">
			<?php
			$prevPost = get_previous_post();
			if ( $prevPost ) {
				global $post;
				$post = $prevPost;
				setup_postdata( $post );
				$title = __( 'Previous', 'navi' );
				include( locate_template( 'template-parts/content-thumbnail.php' ) );
				wp_reset_postdata();
			}
			?>
			<?php
			$nextPost = get_next_post();
			if ( $nextPost ) {
				global $post;
				$post = $nextPost;
				setup_postdata( $post );
				$title = __( 'Next', 'navi' );
				include( locate_template( 'template-parts/content-thumbnail.php' ) );
				wp_reset_postdata();
			}
			?>
		</div>
		<?php

	endwhile;
	?>

<?php get_footer();

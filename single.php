<?php get_header(); ?>

	<?php
	while ( have_posts() ) : the_post();

		get_template_part( 'template-parts/content', get_post_type() );

		// If comments are open or we have at least one comment, load up the comment template.
		if ( comments_open() || get_comments_number() ) :
			comments_template();
		endif;

		?>
		<div class="navigation">
			<h4><strong>Previous</strong> <span class="sep">&</span> <strong>Next</strong></h4>
			<div class="thumbnails">
				<?php
				$prevPost = get_previous_post( true );
				if ( $prevPost ) {
					$args = array(
						'posts_per_page' => 1,
						'include' => $prevPost->ID
					);
					$prevPost = get_posts( $args );
					foreach ( $prevPost as $post ) {
						setup_postdata( $post );
						get_template_part( 'template-parts/content', 'thumbnail' );
						wp_reset_postdata();
					}
				}

				$nextPost = get_next_post( true );
				if( $nextPost ) {
					$args = array(
						'posts_per_page' => 1,
						'include' => $nextPost->ID
					);
					$nextPost = get_posts( $args );
					foreach ( $nextPost as $post ) {
						setup_postdata( $post );
						get_template_part( 'template-parts/content', 'thumbnail' );
						wp_reset_postdata();
					}
				}
				?>
				<div class="column-spacer"></div>
			</div>
		</div>
		<?php

	endwhile;
	?>

<?php get_footer();

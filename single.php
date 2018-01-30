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
			<div class="thumbnails">
				<div class="nav-previous">
					<?php
					$prevPost = get_previous_post();
					if ( $prevPost ) {
						$args = array(
							'posts_per_page' => 1,
							'include' => $prevPost->ID
						);
						$prevPost = get_posts( $args );
						foreach ( $prevPost as $post ) {
							setup_postdata( $post );
							$title = "Previous";
							include( locate_template( 'template-parts/content-thumbnail.php' ) );
							wp_reset_postdata();
						}
					}
					?>
				</div>
				<div class="nav-next">
					<?php
					$nextPost = get_next_post();
					if( $nextPost ) {
						$args = array(
							'posts_per_page' => 1,
							'include' => $nextPost->ID
						);
						$nextPost = get_posts( $args );
						foreach ( $nextPost as $post ) {
							setup_postdata( $post );
							$title = "Next";
							include( locate_template( 'template-parts/content-thumbnail.php' ) );
							wp_reset_postdata();
						}
					}
					?>
				</div>
			</div>
		</div>
		<?php

	endwhile;
	?>

<?php get_footer();

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
					?>
					<div class="nav-previous<?php if ( has_post_thumbnail() ) { ?> has-post-thumbnail<?php } ?>">
						<a class="previous" href="<?php the_permalink(); ?>"<?php if ( has_post_thumbnail() ) { ?> style="background-image: url( '<?php echo get_the_post_thumbnail_url( get_the_ID(), 'custom-thumbnails' ) ?>' )"<?php } ?>>
						<?php the_title( '<h3 class="entry-title">', ' <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><g><path d="M10 20l8-8-8-8-1.414 1.414L15.172 12l-6.586 6.586"></path></g></svg></h3>' ); ?>
						</a>
					</div>
					<?php
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
					?>
					<div class="nav-next<?php if ( has_post_thumbnail() ) { ?> has-post-thumbnail<?php } ?>">
						<a class="next" href="<?php the_permalink(); ?>"<?php if ( has_post_thumbnail() ) { ?> style="background-image: url( '<?php echo get_the_post_thumbnail_url( get_the_ID(), 'custom-thumbnails' ) ?>' )"<?php } ?>>
						<?php the_title( '<h3 class="entry-title">', ' <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><g><path d="M10 20l8-8-8-8-1.414 1.414L15.172 12l-6.586 6.586"></path></g></svg></h3>' ); ?>
						</a>
					</div>
					<?php
					wp_reset_postdata();
				}
			}
			?>
			</div>
		</div>
		<?php

	endwhile;
	?>

<?php get_footer();

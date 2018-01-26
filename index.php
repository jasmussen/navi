<?php get_header(); ?>

	<?php if ( !function_exists( 'dynamic_sidebar' ) || !dynamic_sidebar( "Index, Above" ) ) : ?>
	<?php endif;?>

	<?php
	if ( have_posts() ) :

		if ( is_home() && ! is_front_page() ) : ?>
			<header>
				<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
			</header>
		<?php
		endif;


		// Featured post
		?>
		<div class="featured">
		<?php
		while ( have_posts() ) : the_post();

			if ( $count == 0 && !is_paged() ) {
				get_template_part( 'template-parts/content', 'featured' );
			}
			$count++;

		endwhile;
		?>
		</div>
		<?php


		?>
		<div class="posts thumbnails">
		<?php

		while ( have_posts() ) : the_post();

			if ( $count > 0 || is_paged() ) {
				get_template_part( 'template-parts/content', 'thumbnail' );
			}

		endwhile;

		?>
		</div>
		<?php







		the_posts_pagination(
			array(
				'prev_text'          => '<span class="screen-reader-text">' . __( 'Previous page', 'twentyseventeen' ) . '</span>',
				'next_text'          => '<span class="screen-reader-text">' . __( 'Next page', 'twentyseventeen' ) . '</span>',
				'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'twentyseventeen' ) . ' </span>',
			)
		);

	else :

		get_template_part( 'template-parts/content', 'none' );

	endif; ?>

	<?php if ( !function_exists( 'dynamic_sidebar' ) || !dynamic_sidebar( "Index, Below" ) ) : ?>
	<?php endif;?>

<?php get_footer();

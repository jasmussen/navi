<?php get_header();

	// Widgets top
	if ( is_front_page() && !is_paged() ) {
		dynamic_sidebar( 'Index, Above' );
	}

	// Main Content
	if ( have_posts() ) :

		// Featured post
		if ( is_front_page() && !is_paged() ) {
		?>
		<div class="featured">
		<?php
			// Fetch latest post to show featured
			query_posts( 'posts_per_page=1' );
			while ( have_posts() ) : the_post();

				get_template_part( 'template-parts/content', 'featured' );

			endwhile;
		?>
		</div>
		<?php
		}

		// Post thumbnails
		?>
		<div class="posts thumbnails">
		<?php
			// If on homepage, fetch the next 4, otherwise show standard queries on archives
			if ( is_front_page() && !is_paged() ) {
				rewind_posts();
				query_posts( 'posts_per_page=4&offset=1' );
			}
			while ( have_posts() ) : the_post();

				get_template_part( 'template-parts/content', 'thumbnail' );

			endwhile;
		?>
		</div>
		<?php

	else :

		get_template_part( 'template-parts/content', 'none' );

	endif;

	// Widgets below, and reset pagination
	if ( is_front_page() && !is_paged() ) {
		dynamic_sidebar( 'Index, Below' );
		rewind_posts();
		query_posts( 'posts_per_page=10' );
	}

	// Pagination
	the_posts_pagination(
		array(
			'prev_text'          => '<span class="screen-reader-text">' . __( 'Previous page', 'twentyseventeen' ) . '</span>',
			'next_text'          => '<span class="screen-reader-text">' . __( 'Next page', 'twentyseventeen' ) . '</span>',
			'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'twentyseventeen' ) . ' </span>',
		)
	);

get_footer();

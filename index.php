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
			the_post();
			get_template_part( 'template-parts/content', 'featured' );
		?>
		</div>
		<?php
		}

		// Post thumbnails
		?>
		<div class="posts thumbnails">
		<?php
			// If on homepage, fetch the next posts
			while ( have_posts() ) : the_post();

				get_template_part( 'template-parts/content', 'thumbnail' );

			endwhile;
		?>
		</div>
		<?php

	else :

		get_template_part( 'template-parts/content', 'none' );

	endif;

	// Widgets below
	if ( is_front_page() && !is_paged() ) {
		dynamic_sidebar( 'Index, Below' );
	}

	// Pagination
	if ( is_front_page() && !is_paged() ) { ?>
	<div class="nav-links">
		<a class="nav-archive" href="/?paged=2">Archive</a>
	</div>
	<?php
	} else {
		the_posts_pagination(
			array(
				'prev_text'          => '<span class="screen-reader-text">' . __( 'Previous page', 'navi' ) . '</span>',
				'next_text'          => '<span class="screen-reader-text">' . __( 'Next page', 'navi' ) . '</span>',
				'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'navi' ) . ' </span>',
			)
		);
	}

get_footer();

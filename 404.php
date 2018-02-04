<?php get_header(); ?>

	<header>
		<h1 class="page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'navi' ); ?></h1>
	</header>

	<section>
		<p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'navi' ); ?></p>
		<?php get_search_form(); ?>
	</section>

<?php
get_footer();

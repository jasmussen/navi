<?php get_header(); ?>

	<?php if ( !function_exists( 'dynamic_sidebar' ) || !dynamic_sidebar( "Index, Above" ) ) : ?>
	<?php endif;?>

	<div class="posts">
	<?php
	if ( have_posts() ) :

		if ( is_home() && ! is_front_page() ) : ?>
			<header>
				<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
			</header>

		<?php
		endif;

		/* Start the Loop */
		while ( have_posts() ) : the_post();

			get_template_part( 'template-parts/content', 'thumbnail' );

		endwhile;

		the_posts_navigation();

	else :

		get_template_part( 'template-parts/content', 'none' );

	endif; ?>
	</div>

	<?php if ( !function_exists( 'dynamic_sidebar' ) || !dynamic_sidebar( "Index, Below" ) ) : ?>
	<?php endif;?>

<?php get_footer();

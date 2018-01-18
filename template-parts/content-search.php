<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>

	<?php if ( 'post' === get_post_type() ) : ?>
	<div class="entry-meta">
		<?php gutenbergtheme_posted_on(); ?>
	</div><!-- .entry-meta -->
	<?php endif; ?>

	<?php the_excerpt(); ?>
</article><!-- #post-<?php the_ID(); ?> -->

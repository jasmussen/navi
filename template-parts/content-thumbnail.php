<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<section>
		<a href="<?php the_permalink(); ?>" rel="bookmark"<?php if ( has_post_thumbnail() ) { ?> style="background-image: url( '<?php echo get_the_post_thumbnail_url( get_the_ID(), 'custom-thumbnails' ) ?>' )"<?php } ?>>
		<?php the_title( '<h3 class="entry-title">', '</h3>' ); ?>
		<p><?php echo get_navi_excerpt( 14 ); ?></p>
		</a>
	</section>
</article>

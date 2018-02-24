<article <?php post_class( 'thumbnail-featured' ); ?>>
	<section>
		<a class="entry-thumbnail" href="<?php the_permalink(); ?>" aria-hidden="true"<?php if ( has_post_thumbnail() ) { ?> style="background-image: url( '<?php echo get_the_post_thumbnail_url( $post = get_the_ID(), $size = 'big-thumbnails' ) ?>' )"<?php } ?>></a>

		<p class="post-tags"><?php the_tags( '', ', ', '' ); ?></p>
		<h2><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
		<?php if ( has_excerpt() ) { the_excerpt(); } ?>
	</section>
</article>

<div <?php post_class( 'thumbnail' ); ?>>
	<section>
		<a href="<?php the_permalink(); ?>" rel="bookmark"<?php if ( has_post_thumbnail() ) { ?> style="background-image: url( '<?php echo get_the_post_thumbnail_url( get_the_ID(), 'custom-thumbnails' ) ?>' )"<?php } ?>>
		<?php if ( $title ) { echo '<h3>' . $title . '</h3>'; } ?>
		<?php the_title( '<h4 class="entry-title">', '</h4>' ); ?>
		<?php if ( has_excerpt() ) { the_excerpt(); } ?>
		</a>
	</section>
</div>

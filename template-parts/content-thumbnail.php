<div <?php post_class( 'thumbnail' ); ?>>
	<section>
		<a class="entry-thumbnail" href="<?php the_permalink(); ?>" aria-hidden="true"<?php if ( has_post_thumbnail() ) { ?> style="background-image: url( '<?php echo get_the_post_thumbnail_url( $post = get_the_ID(), $size = 'custom-thumbnails' ) ?>' )"<?php } ?>></a>

		<div class="entry-excerpt">
			<?php if ( $title ) { echo '<h3>' . $title . '</h3>'; } ?>
			<h4><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h4>
			<?php if ( has_excerpt() ) { the_excerpt(); } ?>
		</div>
	</section>
</div>

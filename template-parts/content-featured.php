<article id="post-<?php the_ID(); ?>" <?php post_class(); ?><?php if ( has_post_thumbnail() ) { ?> style="background-image: url( '<?php echo get_the_post_thumbnail_url( get_the_ID() ) ?>' )"<?php } ?>>
		<h3><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h3>

		<div class="entry-excerpt">
			<?php the_excerpt(); ?>
		</div>

		<div class="entry-meta">
			<?php navi_posted_on(); ?>
		</div>
</article>

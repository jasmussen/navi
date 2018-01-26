<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<section>
		<a href="<?php the_permalink(); ?>" rel="bookmark"<?php if ( has_post_thumbnail() ) { ?> style="background-image: url( '<?php echo get_the_post_thumbnail_url( get_the_ID(), 'custom-thumbnails' ) ?>' )"<?php } ?>>
		<?php the_title( '<h3 class="entry-title">', ' <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><g><path d="M10 20l8-8-8-8-1.414 1.414L15.172 12l-6.586 6.586"></path></g></svg></h3>' ); ?>
		</a>

		<?php if ( 'post' === get_post_type() ) : ?>
		<div class="entry-meta">
			<?php navi_posted_on(); ?>
		</div>
		<?php
		endif; ?>
	</section>
</article>

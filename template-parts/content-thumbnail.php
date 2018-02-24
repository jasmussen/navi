<div <?php post_class( 'thumbnail' ); ?>>
	<section>
		<?php the_tags( '<p class="post-tags">', '', '</p>' ); ?>
		<?php if ( $title ) { echo '<h3>' . $title . '</h3>'; } ?>
		<h4><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h4>
		<?php if ( has_excerpt() ) { the_excerpt(); } ?>
	</section>
</div>

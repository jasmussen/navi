<?php
if ( ! function_exists( 'navitheme_setup' ) ) :
	function navitheme_setup() {

		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'title-tag' );
		add_theme_support( 'post-thumbnails' );

		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'navitheme' ),
		) );

		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Support wide images in the editor
		add_theme_support( 'align-wide' );

		// Increase JPEG quality from the default 82
		add_filter( 'jpeg_quality', function( $arg ) { return 90; } );

		add_image_size( 'custom-thumbnails', 1620, 720 );
		add_image_size( 'big-thumbnails', 2160, 1080 );
	}
endif;
add_action( 'after_setup_theme', 'navitheme_setup' );


function navitheme_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'navitheme_content_width', 720 );
}
add_action( 'after_setup_theme', 'navitheme_content_width', 0 );


function navi_fonts_url() {
    $fonts_url = '';

	$notoserif = esc_html_x( 'on', 'Noto Serif font: on or off', 'navitheme' );

	if ( 'off' !== $notoserif ) {
		$font_families = array();
		$font_families[] = 'Noto Serif:400,400italic,700,700italic';

		$query_args = array(
			'family' => urlencode( implode( '|', $font_families ) ),
			'subset' => urlencode( 'latin,latin-ext' ),
		);

		$fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
	}

	return $fonts_url;

}


function navitheme_scripts() {
	wp_enqueue_style( 'gutenbergbase-style', get_stylesheet_uri() );
	wp_enqueue_style( 'navi-fonts', navi_fonts_url(), array(), null );
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'navitheme_scripts' );


if ( ! function_exists( 'navi_posted_on' ) ) :
	/**
	 * Print HTML with meta information for the current post-date/time and author.
	 *
	 * @since Twenty Ten 1.0
	 */
	function navi_posted_on() {
		// Get the author name; wrap it in a link.
		$byline = sprintf(
			/* translators: %s: post author */
			__( 'by %s', 'navi' ),
			'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . get_the_author() . '</a></span>'
		);

		// Finally, let's write all of this to the page.
		echo '<span class="posted-on">' . navi_time_link() . '</span><span class="byline"> ' . $byline . '</span>';
	}
endif;

if ( ! function_exists( 'navi_time_link' ) ) :
	/**
	 * Gets a nicely formatted string for the published date.
	 */
	function navi_time_link() {
		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
		}

		$time_string = sprintf(
			$time_string,
			get_the_date( DATE_W3C ),
			get_the_date(),
			get_the_modified_date( DATE_W3C ),
			get_the_modified_date()
		);

		// Wrap the time string in a link, and preface it with 'Posted on'.
		return sprintf(
			/* translators: %s: post date */
			__( '<span class="screen-reader-text">Posted on</span> %s', 'navi' ),
			'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
		);
	}
endif;


/**
 * Widgets
 */

if ( function_exists( 'register_sidebar' ) )
	register_sidebar( array(
		'name' => 'Index, Above',
		'id' => 'index-above',
		'before_widget' => '<div class="widget">',
		'after_widget' => '</div>',
		'before_title' => '<h2>',
		'after_title' => '</h2>',
	)
);

if ( function_exists( 'register_sidebar' ) )
	register_sidebar( array(
		'name' => 'Index, Below',
		'id' => 'index-below',
		'before_widget' => '<div class="widget">',
		'after_widget' => '</div>',
		'before_title' => '<h2>',
		'after_title' => '</h2>',
	)
);


/**
 * First post
 */

function is_first_post() {
	static $called = FALSE;

	if ( ! $called ) {
		$called = TRUE;
		return TRUE;
	}

	return FALSE;
}


/**
 * Enqueue editor style in Gutenberg
 */
function navi_gutenberg_styles() {
	 wp_enqueue_style( 'navi-gutenberg', get_theme_file_uri( '/style-editor.css' ), false, '1.0', 'all' );
}
add_action( 'enqueue_block_editor_assets', 'navi_gutenberg_styles' );


/**
 * Opt into Gutenberg opinionated theme styles
 */

 add_theme_support( 'wp-block-styles' );
 
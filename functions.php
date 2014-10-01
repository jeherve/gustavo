<?php

// General setup
function gustavo_setup() {
	// Textdomain
	load_child_theme_textdomain( 'gustavo', get_stylesheet_directory() . '/languages' );

	// Site Logo
	add_theme_support( 'site-logo', array( 'size' => 'gustavo-logo' ) );

	add_image_size( 'gustavo-logo', 512, 512 );
}
add_action( 'after_setup_theme', 'gustavo_setup' );

// Enqueue stylesheets
function gustavo_style() {
	wp_enqueue_style( 'singl-style', get_template_directory_uri() . '/style.css' );
	wp_enqueue_style( 'gustavo', get_stylesheet_directory_uri(). '/style.css' );
}
add_action( 'wp_enqueue_scripts', 'gustavo_style' );

// Fix site title color depending on body's background color
function jeherve_adjust_title_color( $colors_css, $color, $contrast ) {
	$post_id = get_the_ID();

	$tonesque = get_post_meta( $post_id, '_post_colors', true );
	extract( $tonesque );

	$colors_css = "
		body, .entry-thumbnail { background: #{$color} !important; }
		.site-header .site-branding, .site-header .site-branding a { border-color: rgb({$contrast}); color: rgb({$contrast}); }
	";

	return $colors_css;
}
add_filter( 'colorposts_css_output', 'jeherve_adjust_title_color', 10, 3 );

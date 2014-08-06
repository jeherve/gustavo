<?php

// General setup
function gustavo_setup() {
	// Textdomain
	load_child_theme_textdomain( 'gustavo', get_stylesheet_directory() . '/languages' );
}
add_action( 'after_setup_theme', 'gustavo_setup' );

// Enqueue stylesheets
function gustavo_style() {
	wp_enqueue_style( 'singl-style', get_template_directory_uri() . '/style.css' );
	wp_enqueue_style( 'gustavo', get_stylesheet_directory_uri(). '/style.css' );
}
add_action( 'wp_enqueue_scripts', 'gustavo_style' );

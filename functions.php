<?php
  /* Functions for 2016 child theme */

add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );
function theme_enqueue_styles() {
	wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
}

add_filter( 'twentysixteen_color_schemes', 'mychild_twentysixteen_color_schemes' );
function mychild_twentysixteen_color_schemes( $colours ) {
	$colours['green'] = array(
							  'label'  => __( 'Green', 'twentysixteen' ),
							  'colors' => array(
		'#5f634f',
		'#DDFFF0',
		'#1cea94',
		'#57C8CC',
		'#B2EF56',
		),
							 );

	return $colours;
}

add_action( 'after_setup_theme', 'child_theme_setup', 11 );
function child_theme_setup() {
	remove_theme_support( 'custom-logo' );

	add_theme_support( 'custom-logo', array(
		'height'      => 120,
		'width'       => 120,
		'flex-height' => true,
		) );
}

add_action( 'twentysixteen_credits', 'child_theme_add_mikes_link' );
function child_theme_add_mikes_link( ) {
	echo '<span class="site-title">Child theme by <a href="https://mikelittle.org/">Mike</a></span>';
}

add_filter( 'body_class', 'mikes_body_classes' );
function mikes_body_classes( $classes ) {
	if ( current_user_can( 'staff' ) ) {
		$classes[] = 'staff';
	}
	return $classes;
}
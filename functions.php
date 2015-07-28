<?php

//* Set Localization (do not remove)
load_child_theme_textdomain( 'sem-pinnacle-child', apply_filters( 'child_theme_textdomain', get_stylesheet_directory() . '/lang', 'sem-pinnacle-child' ) );

//* Enqueue scripts
function sem_pinnacle_child_enqueue_scripts() {
	wp_enqueue_style( 'child-style', get_stylesheet_uri(), array( 'pinnacle-style' ) );
}
add_action( 'wp_enqueue_scripts', 'sem_pinnacle_child_enqueue_scripts' );

/**
* add_home_featured_panels()
*
* @return void
**/

function add_home_featured_panels() {
	$featured_panels = array(
		'home-featured-1' => array(
			'id'          => 'home-featured-1',
			'name'        => __( 'Home Featured 1', 'sem-pinnacle-child' ) ),
		'home-featured-2' => array(
			'id'          => 'home-featured-2',
			'name'        => __( 'Home Featured 2', 'sem-pinnacle-child' ) ),
		'home-featured-3' => array(
			'id'          => 'home-featured-3',
			'name'        => __( 'Home Featured 3', 'sem-pinnacle-child' ) ),
		'home-featured-4' => array(
			'id'          => 'home-featured-4',
			'name'        => __( 'Home Featured 4', 'sem-pinnacle-child' ) ),
	);

	foreach( $featured_panels as $panel ) {
		$panel_id = $panel['id'];
		$panel_label = $panel['name'];

		register_sidebar(
			array(
				'id' => $panel_id,
				'name' => $panel_label,
				'before_widget' => '<aside id="%1$s" class="widget %2$s body_widget">' . "\n",
				'after_widget' => '</aside><!-- body_widget -->' . "\n",
				'before_title' => '<h2>',
				'after_title' => '</h2>' . "\n",
				)
			);
	}
}

function sem_pinnacle_child_setup() {
	add_action( 'pinnacle_top_panels_setup', 'add_home_featured_panels' );
}

add_action( 'pinnacle_pre_setup', 'sem_pinnacle_child_setup' );
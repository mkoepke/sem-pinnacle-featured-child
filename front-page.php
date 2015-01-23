<?php

global $sem_theme_options;

$active_layout = 'mmm';



function sem_pinnacle_child_active_layout( $layout ) {
	return 'mmm';
}


//* filter active layout for this page
add_filter( 'active_layout', 'sem_pinnacle_child_active_layout' );



# show header
include sem_path . '/header.php';

	if ( is_active_sidebar( 'home-featured-1' ) || is_active_sidebar( 'home-featured-2' )
		|| is_active_sidebar( 'home-featured-3' ) || is_active_sidebar( 'home-featured-4' ) ) {

		echo '<div id="home-featured" class="body_section">' . "\n";
		for( $i = 1; $i <= 4; $i++ ) {
			$panel_name = 'home-featured-' . $i;

			echo '<div id="' . $panel_name . '" class="home-featured sidebar" role="complementary" itemscope="itemscope" itemtype="http://schema.org/WPSideBar">' . "\n";
			echo '<div class="widget-area flexible-widget-area ' . sem_panels::count_widgets( $panel_name ) . '">' . "\n";

			sem_panels::display( $panel_name );
			echo '</div><!-- .widget-area -->' . "\n";
			echo '</div><!-- ' . $panel_name . ' -->' . "\n";
		}
		echo '</div><!-- home-featured -->' . "\n";
	}


# show footer
include sem_path . '/footer.php';

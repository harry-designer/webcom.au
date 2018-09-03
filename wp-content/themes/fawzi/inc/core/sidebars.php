<?php
/*
 * Fawzi Theme Widgets
 * Author & Copyright: VictorThemes
 * URL: http://themeforest.net/user/VictorThemes
 */

if ( ! function_exists( 'fawzi_vt_widget_init' ) ) {
	function fawzi_vt_widget_init() {
		if ( function_exists( 'register_sidebar' ) ) {

			// Main Widget Area
			register_sidebar(
				array(
					'name' => esc_html__( 'Main Widget Area', 'fawzi' ),
					'id' => 'sidebar-1',
					'description' => esc_html__( 'Appears on posts and pages.', 'fawzi' ),
					'before_widget' => '<div id="%1$s" class="fwzi-widget %2$s">',
					'after_widget' => '</div> <!-- end widget -->',
					'before_title' => '<h5 class="widget-title">',
					'after_title' => '</h5>',
				)
			);
			// Main Widget Area

			// Footer Widgets
			$footer_widgets = cs_get_option( 'footer_widget_layout' );
	    if( $footer_widgets ) {

	      switch ( $footer_widgets ) {
	        case 5:
	        case 6:
	        case 7:
	          $length = 3;
	        break;

	        case 8:
	        case 9:
	          $length = 4;
	        break;

	        default:
	          $length = $footer_widgets;
	        break;
	      }

	      for( $i = 0; $i < $length; $i++ ) {

	        $num = ( $i+1 );

	        register_sidebar( array(
	          'id'            => 'footer-' . $num,
	          'name'          => esc_html__( 'Footer Widget ', 'fawzi' ). $num,
	          'description'   => esc_html__( 'Appears on footer section.', 'fawzi' ),
	          'before_widget' => '<div class="fwzi-widget %2$s">',
	          'after_widget'  => '<div class="clear"></div></div> <!-- end widget -->',
	          'before_title'  => '<h5 class="footer-column-title">',
	          'after_title'   => '</h5>'
	        ) );

	      }

	    }
	    // Footer Widgets

			/* Custom Sidebar */
			$custom_sidebars = cs_get_option('custom_sidebar');
			if ($custom_sidebars) {
				foreach($custom_sidebars as $custom_sidebar) :
				$heading = $custom_sidebar['sidebar_name'];
				$own_id = preg_replace('/[^a-z]/', "-", strtolower($heading));
				$desc = $custom_sidebar['sidebar_desc'];

				register_sidebar( array(
					'name' => esc_html($heading),
					'id' => $own_id,
					'description' => esc_html($desc),
					'before_widget' => '<div id="%1$s" class="fwzi-widget %2$s">',
					'after_widget' => '</div> <!-- end widget -->',
					'before_title' => '<h5 class="widget-title">',
					'after_title' => '</h5>',
				) );
				endforeach;
			}
			/* Custom Sidebar */

		}
	}
	add_action( 'widgets_init', 'fawzi_vt_widget_init' );
}
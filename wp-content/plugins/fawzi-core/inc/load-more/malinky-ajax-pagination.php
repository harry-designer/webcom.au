<?php
/**
 * Plugin Name: Ajax Pagination and Infinite Scroll
 * Plugin URI: https://github.com/malinky/malinky-ajax-pagination
 * Description: Choose from infinite scroll, load more button and pagination to load paged content with Ajax on your posts, pages, custom post types and WooCommerce. Multiple pagination settings can be created for different post types and templates.
 * Version: 2.0.1
 * Author: Malinky
 * Author URI: https://github.com/malinky
 * License: GPLv2 or later
 * License URI: http://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: malinky-ajax-pagination
 * Domain Path: /languages
 */

class Malinky_Ajax_Pagination
{
	public function __construct()
	{
		// Trailing Slash.
		define( 'MALINKY_AJAX_PAGINATION_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
		// No Trailing Slash.
		define( 'MALINKY_AJAX_PAGINATION_PLUGIN_URL', plugins_url( basename( plugin_dir_path( __FILE__ ) ) ) );

		// Constant for enqueuing css.
		if ( ! defined( 'MALINKY_LOAD_CSS' ) ) {
			define( 'MALINKY_LOAD_CSS', true );
		}

		// Constand for enqueuing js.
        if ( ! defined( 'MALINKY_LOAD_JS' ) ) {
			define( 'MALINKY_LOAD_JS', true );
		}

	    // Enqueue styles and scripts.
   		add_action( 'wp_enqueue_scripts', array( $this, 'malinky_ajax_pagination_enqueue_scripts' ), 99 );
	}

	/**
	 * Conditionally enqueue styles.
	 */
	function malinky_ajax_pagination_enqueue_scripts()
	{
		if ( malinky_load_css() ) {
			$this->malinky_ajax_pagination_styles();
		}
		if ( malinky_load_js() ) {
			$this->malinky_ajax_pagination_scripts();
		}		
	}

	/**
	 * Enqueue styles.
	 */
	public function malinky_ajax_pagination_styles()
	{
		wp_register_style(
			'malinky-ajax-pagination',
			FAWZI_PLUGIN_ASTS . '/css/style.css',
			false,
			NULL
		);
		wp_enqueue_style( 'malinky-ajax-pagination' );
	}

	/**
	 * Enqueue scripts.
	 */
	public function malinky_ajax_pagination_scripts()
	{
		wp_register_script(
			'malinky-ajax-pagination-main-js',
			FAWZI_PLUGIN_ASTS . '/main.js',
			array( 'jquery' ),
			NULL,
			true
		);

		// Saved settings.
		for ( $x = 1; $x <= 1; $x++ ) {
            $malinky_settings[ $x ] = get_option( '_malinky_ajax_pagination_settings_' . $x );
    	}

		// If no settings have been saved yet.
    	if ( ! isset( $malinky_settings ) ) return;

		// Set ajax loader images.
		foreach ( $malinky_settings as $key => $setting ) {
			$malinky_settings[$key]['ajax_loader'] = malinky_ajax_pagination_ajax_loader( $malinky_settings[$key]['ajax_loader'] );	
		}

		wp_localize_script( 'malinky-ajax-pagination-main-js', 'malinkySettings', $malinky_settings );
		wp_enqueue_script( 'malinky-ajax-pagination-main-js' );
	}
}

$malinky_ajax_pagination = new Malinky_Ajax_Pagination();
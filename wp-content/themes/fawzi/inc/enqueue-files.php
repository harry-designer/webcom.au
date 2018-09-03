<?php
/*
 * All CSS and JS files are enqueued from this file
 * Author & Copyright: VictorThemes
 * URL: http://themeforest.net/user/VictorThemes
 */

/**
 * Enqueue Files for FrontEnd
 */
if ( ! function_exists( 'fawzi_vt_scripts_styles' ) ) {
  function fawzi_vt_scripts_styles() {

    // Styles
    wp_enqueue_style( 'font-awesome', FAWZI_THEMEROOT_URI . '/inc/theme-options/cs-framework/assets/css/font-awesome.min.css' );
    wp_enqueue_style( 'bootstrap', FAWZI_CSS .'/bootstrap.min.css', array(), '3.3.6', 'all' );
    wp_enqueue_style( 'owl-carousel', FAWZI_CSS .'/owl.carousel.min.css', array(), '2.4', 'all' );
    wp_enqueue_style( 'loaders', FAWZI_CSS .'/loaders.min.css', array(), FAWZI_VERSION, 'all' );
    wp_enqueue_style( 'animate', FAWZI_CSS .'/animate.min.css', array(), '3.5.1', 'all' );
    wp_enqueue_style( 'magnific-popup', FAWZI_CSS .'/magnific-popup.min.css', array(), FAWZI_VERSION, 'all' );
    wp_enqueue_style( 'simple-line-icons', FAWZI_CSS .'/simple-line-icons.css', array(), '2.4.0', 'all' );
    wp_enqueue_style( 'swiper', FAWZI_CSS .'/swiper.min.css', array(), FAWZI_VERSION, 'all' );
    wp_enqueue_style( 'fawzi-style', FAWZI_CSS .'/styles.css', array(), FAWZI_VERSION, 'all' );

    // Scripts
    wp_enqueue_script( 'bootstrap', FAWZI_SCRIPTS . '/bootstrap.min.js', array( 'jquery' ), '3.3.6', true );
    wp_enqueue_script( 'bootstrap-dropdown', FAWZI_SCRIPTS . '/bootstrap.hover.dropdown.js', array( 'jquery' ), FAWZI_VERSION, true );
    wp_enqueue_script( 'fawzi-plugins', FAWZI_SCRIPTS . '/plugins.js', array( 'jquery' ), FAWZI_VERSION, true );
    wp_enqueue_script( 'fawzi-scripts', FAWZI_SCRIPTS . '/scripts.js', array( 'jquery' ), FAWZI_VERSION, true );

    // Comments
    wp_enqueue_script( 'validate', FAWZI_SCRIPTS . '/jquery.validate.min.js', array( 'jquery' ), '1.9.0', true );
    wp_add_inline_script( 'validate', 'jQuery(document).ready(function($) {$("#commentform").validate({rules: {author: {required: true,minlength: 2},email: {required: true,email: true},comment: {required: true,minlength: 10}}});});' );

    // Responsive Active
    $fawzi_viewport = cs_get_option('theme_responsive');
    if($fawzi_viewport == 'on') {
      wp_enqueue_style( 'fawzi-responsive', FAWZI_CSS .'/responsive.css', array(), FAWZI_VERSION, 'all' );
    }

    // Adds support for pages with threaded comments
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
      wp_enqueue_script( 'comment-reply' );
    }

  }
  add_action( 'wp_enqueue_scripts', 'fawzi_vt_scripts_styles' );
}

/**
 * Apply theme's stylesheet to the visual editor.
 *
 * @uses add_editor_style() Links a stylesheet to visual editor
 * @uses get_stylesheet_uri() Returns URI of theme stylesheet
 */
function fawzi_add_editor_styles() {
  add_editor_style( get_stylesheet_uri() );
}
add_action( 'init', 'fawzi_add_editor_styles' );

/**
 * Enqueue Files for BackEnd
 */
if ( ! function_exists( 'fawzi_vt_admin_scripts_styles' ) ) {
  function fawzi_vt_admin_scripts_styles() {

    wp_enqueue_style( 'fawzi-admin-main', FAWZI_CSS . '/admin-styles.css', true );
    wp_enqueue_script( 'fawzi-admin-scripts', FAWZI_SCRIPTS . '/admin-scripts.js', true );
    wp_enqueue_style( 'simple-line-icons', FAWZI_CSS .'/simple-line-icons.css', array(), '2.4.0', 'all' );

  }
  add_action( 'admin_enqueue_scripts', 'fawzi_vt_admin_scripts_styles' );
}

/* Enqueue All Styles */
if ( ! function_exists( 'fawzi_vt_wp_enqueue_styles' ) ) {
  function fawzi_vt_wp_enqueue_styles() {
    fawzi_vt_google_fonts();
    add_action( 'wp_head', 'fawzi_vt_custom_css', 99 );
    fawzi_vt_google_fonts();
  }
  add_action( 'wp_enqueue_scripts', 'fawzi_vt_wp_enqueue_styles' );
}

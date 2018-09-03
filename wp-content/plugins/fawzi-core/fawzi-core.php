<?php
/*
Plugin Name: Fawzi Core
Plugin URI: https://victorthemes.com/wp-themes/fawzi
Description: Plugin to contain shortcodes and custom post types of the fawzi theme.
Author: VictorThemes
Author URI: https://victorthemes.com/
Version: 1.2.1
Text Domain: fawzi-core
*/

if( ! function_exists( 'fawzi_block_direct_access' ) ) {
	function fawzi_block_direct_access() {
		if( ! defined( 'ABSPATH' ) ) {
			exit( 'Forbidden' );
		}
	}
}

// Plugin URL
define( 'FAWZI_PLUGIN_URL', plugins_url( '/', __FILE__ ) );

// Plugin PATH
define( 'FAWZI_PLUGIN_PATH', plugin_dir_path( __FILE__ ) );
define( 'FAWZI_PLUGIN_ASTS', FAWZI_PLUGIN_URL . 'assets' );
define( 'FAWZI_PLUGIN_IMGS', FAWZI_PLUGIN_ASTS . '/images' );
define( 'FAWZI_PLUGIN_INC', FAWZI_PLUGIN_PATH . 'inc' );

// DIRECTORY SEPARATOR
define ( 'DS' , DIRECTORY_SEPARATOR );

// Fawzi Shortcode Path
define( 'FAWZI_SHORTCODE_BASE_PATH', FAWZI_PLUGIN_PATH . 'visual-composer/' );
define( 'FAWZI_SHORTCODE_PATH', FAWZI_SHORTCODE_BASE_PATH . 'shortcodes/' );

/**
 * Check if Codestar Framework is Active or Not!
 */
function fawzi_framework_active() {
  return ( defined( 'CS_VERSION' ) ) ? true : false;
}

/* VTHEME_NAME_P */
define('VTHEME_NAME_P', 'Fawzi', true);

// Initial File
include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
if (is_plugin_active('fawzi-core/fawzi-core.php')) {

	// Custom Post Type
	require_once( FAWZI_PLUGIN_INC . '/custom-post-type.php' );

  // Shortcodes
  require_once( FAWZI_SHORTCODE_BASE_PATH . '/vc-setup.php' );
  require_once( FAWZI_PLUGIN_INC . '/custom-shortcodes/theme-shortcodes.php' );
  require_once( FAWZI_PLUGIN_INC . '/custom-shortcodes/custom-shortcodes.php' );
  require_once( FAWZI_PLUGIN_INC . '/load-more/malinky-ajax-pagination-functions.php' );
  require_once( FAWZI_PLUGIN_INC . '/load-more/malinky-ajax-pagination.php' );

  // Widgets
  require_once( FAWZI_PLUGIN_INC . '/widgets/get-quote-widget.php' );
  require_once( FAWZI_PLUGIN_INC . '/widgets/nav-widget.php' );
  require_once( FAWZI_PLUGIN_INC . '/widgets/recent-posts.php' );
  require_once( FAWZI_PLUGIN_INC . '/widgets/testimonial-widget.php' );
  require_once( FAWZI_PLUGIN_INC . '/widgets/text-widget.php' );
  require_once( FAWZI_PLUGIN_INC . '/widgets/widget-extra-fields.php' );

}

/**
 * Plugin language
 */
function fawzi_plugin_language_setup() {
  load_plugin_textdomain( 'fawzi-core', false, dirname( plugin_basename( __FILE__ ) ) . '/languages' );
}
add_action( 'init', 'fawzi_plugin_language_setup' );

/* WPAUTOP for shortcode output */
if( ! function_exists( 'fawzi_set_wpautop' ) ) {
  function fawzi_set_wpautop( $content, $force = true ) {
    if ( $force ) {
      $content = wpautop( preg_replace( '/<\/?p\>/', "\n", $content ) . "\n" );
    }
    return do_shortcode( shortcode_unautop( $content ) );
  }
}

/* Use shortcodes in text widgets */
add_filter('widget_text', 'do_shortcode');

/* Shortcodes enable in the_excerpt */
add_filter('the_excerpt', 'do_shortcode');

/* Remove p tag and add by our self in the_excerpt */
remove_filter('the_excerpt', 'wpautop');

/* Add Extra Social Fields in Admin User Profile */
function fawzi_add_twitter_facebook( $contactmethods ) {
  $contactmethods['facebook']   = 'Facebook';
  $contactmethods['twitter']    = 'Twitter';
  $contactmethods['google_plus']  = 'Google Plus';
  $contactmethods['linkedin']   = 'Linkedin';
  $contactmethods['vine']   = 'Vine';
  $contactmethods['pinterest']   = 'Pinterest';
  $contactmethods['instagram']   = 'Instagram';
  return $contactmethods;
}
add_filter('user_contactmethods','fawzi_add_twitter_facebook',10,1);

/**
 *
 * Encode string for backup options
 *
 * @since 1.0.0
 * @version 1.0.0
 *
 */
if ( ! function_exists( 'cs_encode_string' ) ) {
  function cs_encode_string( $string ) {
    return rtrim( strtr( call_user_func( 'base'. '64' .'_encode', addslashes( gzcompress( serialize( $string ), 9 ) ) ), '+/', '-_' ), '=' );
  }
}

/**
 *
 * Decode string for backup options
 *
 * @since 1.0.0
 * @version 1.0.0
 *
 */
if ( ! function_exists( 'cs_decode_string' ) ) {
  function cs_decode_string( $string ) {
    return unserialize( gzuncompress( stripslashes( call_user_func( 'base'. '64' .'_decode', rtrim( strtr( $string, '-_', '+/' ), '=' ) ) ) ) );
  }
}

/* Custom WordPress admin login logo */
if( ! function_exists( 'fawzi_theme_login_logo' ) ) {
  function fawzi_theme_login_logo() {
    if( function_exists( 'fawzi_framework_active' ) ) {
      $login_logo = cs_get_option('brand_logo_wp');
    } else {
      $login_logo = '';
    }
    if($login_logo) {
      $login_logo_url = wp_get_attachment_url($login_logo);
    } else {
      $login_logo_url = FAWZI_IMAGES . '/logo.png';
    }
    if($login_logo) {
    echo "
      <style>
        body.login #login h1 a {
        background: url('$login_logo_url') no-repeat scroll center bottom transparent;
        height: 100px;
        width: 100%;
        margin-bottom:0px;
        }
      </style>";
    }
  }
  add_action('login_head', 'fawzi_theme_login_logo');
}

/* WordPress admin login logo link */
if( ! function_exists( 'fawzi_login_url' ) ) {
  function fawzi_login_url() {
    return site_url();
  }
  add_filter( 'login_headerurl', 'fawzi_login_url', 10, 4 );
}

/* WordPress admin login logo link */
if( ! function_exists( 'fawzi_login_title' ) ) {
  function fawzi_login_title() {
    return get_bloginfo('name');
  }
  add_filter('login_headertitle', 'fawzi_login_title');
}

/* Share Options */
if ( ! function_exists( 'fawzi_wp_share_option' ) ) {
  function fawzi_wp_share_option() {

    global $post;
    $page_url = get_permalink($post->ID );
    $title = $post->post_title;
    if( function_exists( 'fawzi_framework_active' ) ) {
      $share_text = cs_get_option('share_text');
      $share_on_text = cs_get_option('share_on_text');
    } else {
      $share_text = '';
      $share_on_text = '';
    }
    $share_text = $share_text ? $share_text : esc_html__( 'Share This :', 'fawzi' );
    $share_on_text = $share_on_text ? $share_on_text : esc_html__( 'Share On', 'fawzi' );
    ?>
    <div class="fwzi-blog-share">
      <?php echo esc_attr($share_text); ?>
      <div class="fwzi-social">
        <a href="//www.facebook.com/sharer/sharer.php?u=<?php print(urlencode($page_url)); ?>&amp;t=<?php print(urlencode($title)); ?>" class="icon-fa-facebook" data-toggle="tooltip" data-placement="top" title="<?php echo esc_attr( $share_on_text .' '); echo esc_attr('Facebook', 'fawzi'); ?>" target="_blank"><i class="fa fa-facebook"></i></a><a href="//twitter.com/home?status=<?php print(urlencode($title)); ?>+<?php print(urlencode($page_url)); ?>" class="icon-fa-twitter" data-toggle="tooltip" data-placement="top" title="<?php echo esc_attr( $share_on_text .' '); echo esc_attr('Twitter', 'fawzi'); ?>" target="_blank"><i class="fa fa-twitter"></i></a><a href="//www.linkedin.com/shareArticle?mini=true&amp;url=<?php print(urlencode($page_url)); ?>&amp;title=<?php print(urlencode($title)); ?>" class="icon-fa-linkedin" data-toggle="tooltip" data-placement="top" title="<?php echo esc_attr( $share_on_text .' '); echo esc_attr('Linkedin', 'fawzi'); ?>" target="_blank"><i class="fa fa-linkedin"></i></a><a href="http://pinterest.com/pin/create/button/?url=<?php print(urlencode($page_url)); ?>&amp;title=<?php print(urlencode($title)); ?>" class="icon-fa-pinterest" data-toggle="tooltip" data-placement="top" title="<?php echo esc_attr( $share_on_text .' '); echo esc_html__('Pinterest', 'fawzi'); ?>" target="_blank"><i class="fa fa-pinterest-p"></i></a>
      </div>
    </div>
<?php
  }
}

/* Case Studies Share Options */
if ( ! function_exists( 'fawzi_cs_share_option' ) ) {
  function fawzi_cs_share_option() {

    global $post;
    $page_url = get_permalink($post->ID );
    $title = $post->post_title;
    if( function_exists( 'fawzi_framework_active' ) ) {
      $share_text = cs_get_option('share_text');
      $share_on_text = cs_get_option('share_on_text');
    } else {
      $share_text = '';
      $share_on_text = '';
    }
    $share_text = $share_text ? $share_text : esc_html__( 'Share This :', 'fawzi' );
    $share_on_text = $share_on_text ? $share_on_text : esc_html__( 'Share On', 'fawzi' );
    ?>
    <section class="fwzi-growth-share">
      <div class="container">
      <div class="fwzi-social square">
        <a href="//www.facebook.com/sharer/sharer.php?u=<?php print(urlencode($page_url)); ?>&amp;t=<?php print(urlencode($title)); ?>" class="facebook" data-toggle="tooltip" data-placement="top" title="<?php echo esc_attr( $share_on_text .' '); echo esc_attr('Facebook', 'fawzi'); ?>" target="_blank"><i class="fa fa-facebook"></i><span class="social-title"><?php echo esc_attr('Facebook', 'fawzi'); ?></span></a><a href="//twitter.com/home?status=<?php print(urlencode($title)); ?>+<?php print(urlencode($page_url)); ?>" class="twitter" data-toggle="tooltip" data-placement="top" title="<?php echo esc_attr( $share_on_text .' '); echo esc_attr('Twitter', 'fawzi'); ?>" target="_blank"><i class="fa fa-twitter"></i><span class="social-title"><?php echo esc_attr('Twitter', 'fawzi'); ?></span></a><a href="//plus.google.com/share?url=<?php print(urlencode($page_url)); ?>" class="google" data-toggle="tooltip" data-placement="top" title="<?php echo esc_attr( $share_on_text .' '); echo esc_attr('Google+', 'fawzi'); ?>" target="_blank"><i class="fa fa-google-plus"></i><span class="social-title"><?php echo esc_attr('Google+', 'fawzi'); ?></span></a><a href="//www.linkedin.com/shareArticle?mini=true&amp;url=<?php print(urlencode($page_url)); ?>&amp;title=<?php print(urlencode($title)); ?>" class="linked" data-toggle="tooltip" data-placement="top" title="<?php echo esc_attr( $share_on_text .' '); echo esc_attr('Linkedin', 'fawzi'); ?>" target="_blank"><i class="fa fa-linkedin"></i><span class="social-title"><?php echo esc_attr('Linkedin', 'fawzi'); ?></span></a>
      </div>
      </div>
    </section>
<?php
  }
}

/**
 * One Click Install
 * @return Import Demos - Needed Import Demo's
 */
function fawzi_import_files() {
  return array(
    array(
      'import_file_name'           => 'Fawzi',
      'import_file_url'            => trailingslashit( FAWZI_PLUGIN_URL ) . 'inc/import/content.xml',
      'import_widget_file_url'     => trailingslashit( FAWZI_PLUGIN_URL ) . 'inc/import/widget.wie',
      'local_import_csf'           => array(
        array(
          'file_path'   => trailingslashit( FAWZI_PLUGIN_URL ) . 'inc/import/theme-options.json',
          'option_name' => '_cs_options',
        ),
      ),
      'import_notice'              => __( 'Import process may take 3-5 minutes, please be patient. It\'s really based on your network speed.', 'fawzi-core' ),
      'preview_url'                => 'http://victorthemes.com/themes/fawzi',
    ),
  );
}
add_filter( 'pt-ocdi/import_files', 'fawzi_import_files' );

/**
 * One Click Import Function for CodeStar Framework
 */
if ( ! function_exists( 'csf_after_content_import_execution' ) ) {
  function csf_after_content_import_execution( $selected_import_files, $import_files, $selected_index ) {

    $downloader = new OCDI\Downloader();

    if( ! empty( $import_files[$selected_index]['import_csf'] ) ) {

      foreach( $import_files[$selected_index]['import_csf'] as $index => $import ) {
        $file_path = $downloader->download_file( $import['file_url'], 'demo-csf-import-file-'. $index . '-'. date( 'Y-m-d__H-i-s' ) .'.json' );
        $file_raw  = OCDI\Helpers::data_from_file( $file_path );
        update_option( $import['option_name'], json_decode( $file_raw, true ) );
      }

    } else if( ! empty( $import_files[$selected_index]['local_import_csf'] ) ) {

      foreach( $import_files[$selected_index]['local_import_csf'] as $index => $import ) {
        $file_path = $import['file_path'];
        $file_raw  = OCDI\Helpers::data_from_file( $file_path );
        update_option( $import['option_name'], json_decode( $file_raw, true ) );
      }

    }

    // Put info to log file.
    $ocdi       = OCDI\OneClickDemoImport::get_instance();
    $log_path   = $ocdi->get_log_file_path();

    OCDI\Helpers::append_to_file( 'Codestar Framework files loaded.'. $logs, $log_path );

  }
  add_action('pt-ocdi/after_content_import_execution', 'csf_after_content_import_execution', 3, 99 );
}

/**
 * [fawzi_after_import_setup]
 * @return Front Page, Post Page & Menu Set
 */
function fawzi_after_import_setup() {
    // Assign menus to their locations.
    $main_menu = get_term_by( 'name', 'Main Menu', 'nav_menu' );

    set_theme_mod( 'nav_menu_locations', array(
        'primary' => $main_menu->term_id,
      )
    );

    // Assign front page and posts page (blog page).
    $front_page_id = get_page_by_title( 'Home' );
    $blog_page_id  = get_page_by_title( 'Blog' );

    update_option( 'show_on_front', 'page' );
    update_option( 'page_on_front', $front_page_id->ID );
    update_option( 'page_for_posts', $blog_page_id->ID );

}
add_action( 'pt-ocdi/after_import', 'fawzi_after_import_setup' );

// Install Demos Menu - Menu Edited
function fawzi_core_one_click_page( $default_settings ) {
  $default_settings['parent_slug'] = 'themes.php';
  $default_settings['page_title']  = esc_html__( 'Install Demos', 'fawzi-core' );
  $default_settings['menu_title']  = esc_html__( 'Install Demos', 'fawzi-core' );
  $default_settings['capability']  = 'import';
  $default_settings['menu_slug']   = 'install_demos';

  return $default_settings;
}
add_filter( 'pt-ocdi/plugin_page_setup', 'fawzi_core_one_click_page' );

// Model Popup - Width Increased
function fawzi_ocdi_confirmation_dialog_options ( $options ) {
  return array_merge( $options, array(
    'width'       => 600,
    'dialogClass' => 'wp-dialog',
    'resizable'   => false,
    'height'      => 'auto',
    'modal'       => true,
  ) );
}
add_filter( 'pt-ocdi/confirmation_dialog_options', 'fawzi_ocdi_confirmation_dialog_options', 10, 1 );

// Disable the branding notice - ProteusThemes
add_filter( 'pt-ocdi/disable_pt_branding', '__return_true' );

function ocdi_plugin_intro_text( $default_text ) {
    $default_text .= '<h1>Install Demos</h1>
    <div class="fawzi-core_intro-text vtdemo-one-click">
    <div id="poststuff">

      <div class="postbox important-notes">
        <h3><span>Important notes:</span></h3>
        <div class="inside">
          <ol>
            <li>Please note, this import process will take time. So, please be patient.</li>
            <li>Please make sure you\'ve installed recommended plugins before you import this content.</li>
            <li>All images are demo purposes only. So, images may repeat in your site content.</li>
          </ol>
        </div>
      </div>

      <div class="postbox vt-support-box vt-error-box">
        <h3><span>Don\'t Edit Parent Theme Files:</span></h3>
        <div class="inside">
          <p>Don\'t edit any files from parent theme! Use only a <strong>Child Theme</strong> files for your customizations!</p>
          <p>If you get future updates from our theme, you\'ll lose edited customization from your parent theme.</p>
        </div>
      </div>

      <div class="postbox vt-support-box">
        <h3><span>Need Support?</span> <a href="https://www.youtube.com/watch?v=xJJUgi02lWE" target="_blank" class="cs-section-video"><i class="fa fa-youtube-play"></i> <span>How to?</span></a></h3>
        <div class="inside">
          <p>Have any doubts regarding this installation or any other issues? Please feel free to open a ticket in our support center.</p>
          <a href="http://victorthemes.com/docs/fawzi" class="button-primary" target="_blank">Docs</a>
          <a href="https://victorthemes.com/my-account/support/" class="button-primary" target="_blank">Support</a>
          <a href="https://themeforest.net/item/fawzi-a-bold-rich-portfolio-theme/20517782?ref=VictorThemes" class="button-primary" target="_blank">Item Page</a>
        </div>
      </div>

    </div>
  </div>';

    return $default_text;
}
add_filter( 'pt-ocdi/plugin_intro_text', 'ocdi_plugin_intro_text' );

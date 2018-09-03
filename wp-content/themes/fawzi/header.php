<?php
/*
 * The header for our theme.
 * Author & Copyright: VictorThemes
 * URL: http://themeforest.net/user/VictorThemes
 */
?><!DOCTYPE html>
<!--[if IE 8]> <html <?php language_attributes(); ?> class="ie8"> <![endif]-->
<!--[if !IE]><!--> <html <?php language_attributes(); ?>> <!--<![endif]-->
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<?php
$fawzi_viewport = cs_get_option('theme_responsive');
if($fawzi_viewport == 'on') { ?>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<?php } else { }

// if the `wp_site_icon` function does not exist (ie we're on < WP 4.3)
if ( ! function_exists( 'has_site_icon' ) || ! has_site_icon() ) {
  if (cs_get_option('brand_fav_icon')) {
    echo '<link rel="shortcut icon" href="'. esc_url(wp_get_attachment_url(cs_get_option('brand_fav_icon'))) .'" />';
  } else { ?>
    <link rel="shortcut icon" href="<?php echo esc_url(FAWZI_IMAGES); ?>/favicon.ico" />
  <?php }
  if (cs_get_option('iphone_icon')) {
    echo '<link rel="apple-touch-icon" sizes="57x57" href="'. esc_url(wp_get_attachment_url(cs_get_option('iphone_icon'))) .'" >';
  }
  if (cs_get_option('iphone_retina_icon')) {
    echo '<link rel="apple-touch-icon" sizes="114x114" href="'. esc_url(wp_get_attachment_url(cs_get_option('iphone_retina_icon'))) .'" >';
    echo '<link name="msapplication-TileImage" href="'. esc_url(wp_get_attachment_url(cs_get_option('iphone_retina_icon'))) .'" >';
  }
  if (cs_get_option('ipad_icon')) {
    echo '<link rel="apple-touch-icon" sizes="72x72" href="'. esc_url(wp_get_attachment_url(cs_get_option('ipad_icon'))) .'" >';
  }
  if (cs_get_option('ipad_retina_icon')) {
    echo '<link rel="apple-touch-icon" sizes="144x144" href="'. esc_url(wp_get_attachment_url(cs_get_option('ipad_retina_icon'))) .'" >';
  }
}
$fawzi_all_element_color  = cs_get_customize_option( 'all_element_colors' );
?>
<meta name="msapplication-TileColor" content="<?php echo esc_attr($fawzi_all_element_color); ?>">
<meta name="theme-color" content="<?php echo esc_attr($fawzi_all_element_color); ?>">

<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php
// Metabox
global $post;
$fawzi_id    = ( isset( $post ) ) ? $post->ID : false;
$fawzi_id    = ( is_home() ) ? get_option( 'page_for_posts' ) : $fawzi_id;
$fawzi_id    = ( fawzi_is_woocommerce_shop() ) ? wc_get_page_id( 'shop' ) : $fawzi_id;
$fawzi_id    = ( ! is_tag() && ! is_archive() && ! is_search() && ! is_404() && ! is_singular('testimonial') ) ? $fawzi_id : false;
$fawzi_meta  = get_post_meta( $fawzi_id, 'page_type_metabox', true );

// Btn
$fawzi_analysis_btn    = cs_get_option('analysis_btn');
$fawzi_analysis_btn_text    = cs_get_option('analysis_btn_text');
$fawzi_analysis_btn_link    = cs_get_option('analysis_btn_link');
$fawzi_analysis_target    = cs_get_option('analysis_target');

$fawzi_analysis_target = $fawzi_analysis_target ? '_blank' : '';

// Header Style
$fawzi_sticky_header  = cs_get_option('sticky_header');
if ($fawzi_sticky_header) {
  $fawzi_header_class = 'fwzi-header-stic';
} else {
  $fawzi_header_class = '';
}

wp_head();
?>
</head>
<body <?php echo body_class(); ?>>

<div id="vtheme-wrapper"> <!-- #vtheme-wrapper -->
  <?php // Topbar
  get_template_part( 'layouts/header/top', 'bar' ); ?>
  <!-- Header -->
  <header class="fwzi-header <?php echo esc_attr($fawzi_header_class); ?>">
    <div class="container">
      <?php if ($fawzi_meta) {
        $fawzi_hide_header = $fawzi_meta['hide_header'];
      } else { $fawzi_hide_header = ''; }
      if (!$fawzi_hide_header) { // Hide Header - Metabox
      ?>
      <!-- Brand & Info -->
      <?php
        // Brand Logo
        get_template_part( 'layouts/header/logo' );?>

    <nav class="fwzi-menu">
      <?php  // Navigation
        get_template_part( 'layouts/header/menu', 'bar' );
        if ($fawzi_analysis_btn_link) {
      ?>
    <a href="<?php echo esc_url($fawzi_analysis_btn_link); ?>" target="<?php echo esc_attr($fawzi_analysis_target); ?>" class="fwzi-btn fwzi-btn-blue"><?php echo esc_attr($fawzi_analysis_btn_text); ?></a>
    <?php } ?>
    </nav>
    <a href="javascript:void(0);" onClick="jQuery('.fwzi-menu').slideToggle();" class="fwzi-toggle"><span class="toggle-separator"></span></a>
    <?php } // Hide Header - Metabox ?>
    </div> <!-- Container -->
  </header><?php

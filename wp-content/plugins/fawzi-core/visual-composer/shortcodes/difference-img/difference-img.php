<?php
/* ===========================================================
    Button
=========================================================== */
if ( !function_exists('difference_img_function')) {
  function difference_img_function( $atts, $content = NULL ) {

    extract(shortcode_atts(array(
      'difference_image'  => '',
      'class'  => '',
      // Design
      'css' => ''
    ), $atts));

    // Design Tab
    $custom_css = ( function_exists( 'vc_shortcode_custom_css_class' ) ) ? vc_shortcode_custom_css_class( $css, ' ' ) : '';
    $image_url = wp_get_attachment_url( $difference_image );

    $output = '<div class="column-item item-md-6 '. $custom_css .' '. $class .'">
                <div class="fwzi-image"><img src="'.$image_url.'" alt=""></div>
              </div>';

    return $output;

  }
}
add_shortcode( 'difference_img', 'difference_img_function' );

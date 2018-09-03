<?php
/* ===========================================================
    Static Slider
=========================================================== */
if ( !function_exists('fawzi_static_slider_function')) {
  function fawzi_static_slider_function( $atts, $content = NULL ) {

    extract(shortcode_atts(array(
      'slider_image'  => '',
      'alignment'  => '',
      'content_width'  => '',
      'image_width'  => '',
      'class'  => '',
      // Styling
      'title_color'  => '',
      'title_size'  => '',
      'text_color'  => '',
      'text_size'  => '',
    ), $atts));

    // fix unclosed/unwanted paragraph tags in $content
    $content = wpb_js_remove_wpautop($content, true);

    if ($class) {
      $in_class = '-'.sanitize_title($class);
    } else {
      $in_class = '';
    }

    // Shortcode Style CSS
    $e_uniqid     = uniqid();
    $inline_style = '';

    // Title Color
    if ( $title_color || $title_size) {
      $inline_style .= '.fwzi-static-slide-'.$e_uniqid.$in_class.' .banner-caption-wrap h1, .fwzi-static-slide-'.$e_uniqid.$in_class.' .banner-caption-wrap h2, .fwzi-static-slide-'.$e_uniqid.$in_class.' .banner-caption-wrap h3, .fwzi-static-slide-'.$e_uniqid.$in_class.' .banner-caption-wrap h4, .fwzi-static-slide-'.$e_uniqid.$in_class.' .banner-caption-wrap h5 {';
      $inline_style .= ( $title_color ) ? 'color:'. $title_color .';' : '';
      $inline_style .= ( $title_size ) ? 'font-size:'. fawzi_core_check_px($title_size) .';' : '';
      $inline_style .= '}';
    }
    // Text Color
    if ( $text_color || $text_size) {
      $inline_style .= '.fwzi-static-slide-'.$e_uniqid.$in_class.' .banner-caption-wrap p {';
      $inline_style .= ( $text_color ) ? 'color:'. $text_color .';' : '';
      $inline_style .= ( $text_size ) ? 'font-size:'. fawzi_core_check_px($text_size) .';' : '';
      $inline_style .= '}';
    }

    // add inline style
    add_inline_style( $inline_style );
    $styled_class  = ' fwzi-static-slide-'. $e_uniqid.$in_class;

    if ($alignment) {
      $alignment_class = 'fwzi-toggle-align';
    } else {
      $alignment_class = '';
    }
    if ($content_width) {
      $c_width = ' style="width: '.$content_width.';"';
    } else {
      $c_width = '';
    }
    if ($image_width) {
      $i_width = ' style="width: '.$image_width.';"';
    } else {
      $i_width = '';
    }
    $image_url = wp_get_attachment_url( $slider_image );

    $output = '<section class="fwzi-banner '. $styled_class .' '.$class.'">
        <div class="fwzi-banner-caption '.$alignment_class.'">
          <div class="container">
            <div class="banner-caption-wrap"'.$c_width.'>'. do_shortcode($content) .'</div>
            <div class="fwzi-image"'.$i_width.'><img src="'.$image_url.'" alt=""></div>
          </div>
        </div>
      </section>';

    return $output;

  }
}
add_shortcode( 'fawzi_static_slider', 'fawzi_static_slider_function' );

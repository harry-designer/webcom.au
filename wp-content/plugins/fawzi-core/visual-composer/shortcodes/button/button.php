<?php
/* ===========================================================
    Button
=========================================================== */
if ( !function_exists('fwzi_button_function')) {
  function fwzi_button_function( $atts, $content = NULL ) {

    extract(shortcode_atts(array(
      'button_text'  => '',
      'button_link'  => '',
      'open_link'  => '',
      'class'  => '',
      // Styling      
      'btn_min_width'  => '',
      'text_color'  => '',
      'text_hover_color'  => '',
      'bg_color'  => '',
      'bg_hover_color'  => '',
      'border_color'  => '',
      'border_hover_color'  => '',
      'text_size'  => '',
      // Design
      'css' => ''
    ), $atts));

    // Design Tab
    $custom_css = ( function_exists( 'vc_shortcode_custom_css_class' ) ) ? vc_shortcode_custom_css_class( $css, ' ' ) : '';

    if ($button_text) {
      $in_class = '-'.sanitize_title($button_text);
    } else {
      $in_class = '';
    }
    if ($btn_min_width) {
      $min_class = 'min-width-'.sanitize_title($btn_min_width);
    } else {
      $min_class = '';
    }

    // Shortcode Style CSS
    $e_uniqid     = uniqid();
    $inline_style = '';

    // Button Text Color
    if ( $text_color || $text_size || $bg_color || $border_color ) {
      $inline_style .= '.fwzi-btn-'.$e_uniqid.$in_class.'.fwzi-btn {';
      $inline_style .= ( $text_color ) ? 'color:'. $text_color .';' : '';
      $inline_style .= ( $text_size ) ? 'font-size:'. $text_size .';' : '';
      $inline_style .= ( $bg_color ) ? 'background:'. $bg_color .' !important;' : '';
      $inline_style .= ( $border_color ) ? 'border-color: '. $border_color .' !important;' : '';
      $inline_style .= '}';
    }
    // Button Hover Color
    if ( $text_hover_color || $bg_hover_color || $border_hover_color ) {
      $inline_style .= '.fwzi-btn-'.$e_uniqid.$in_class.'.fwzi-btn:hover {';
      $inline_style .= ( $text_hover_color ) ? 'color:'. $text_hover_color .';' : '';
      $inline_style .= ( $bg_hover_color ) ? 'background:'. $bg_hover_color .' !important;' : '';
      $inline_style .= ( $border_hover_color ) ? 'border-color: '. $border_hover_color .' !important;' : '';
      $inline_style .= '}';
    }
    // Btn width
    if ( $btn_min_width ) {
      $inline_style .= '.fwzi-btn-'.$e_uniqid.$in_class.'.fwzi-btn.'.$min_class.' {';
      $inline_style .= ( $btn_min_width ) ? 'min-width:'. fawzi_check_px($btn_min_width) .';' : '';
      $inline_style .= '}';
    }

    // add inline style
    add_inline_style( $inline_style );
    $styled_class  = ' fwzi-btn-'. $e_uniqid.$in_class;
 
    // Styling
    $button_text = $button_text ? $button_text : '';
    $button_link = $button_link ? 'href="'. $button_link .'"' : '';
    $open_link = $open_link ? ' target="_blank"' : '';

    $output = '<a class="fwzi-btn '. $custom_css . $styled_class .' '.$class.' '. $min_class .'" '. $button_link . $open_link .'>'. $button_text .'</a>';

    return $output;

  }
}
add_shortcode( 'fwzi_button', 'fwzi_button_function' );

<?php
/* ===========================================================
    Heading
=========================================================== */
if ( !function_exists('fwzi_heading_function')) {
  function fwzi_heading_function( $atts, $content = NULL ) {

    extract(shortcode_atts(array(

      'title'  => '',      
      'sub_title'  => '',
      'under_line'  => '',
      'alignment'  => '',
      'class'  => '',
      // Styling
      'title_size'  => '',
      'sub_title_size'  => '',
      'title_color'  => '',
      'sub_title_color'  => '',
      'underline_color'  => '',
    ), $atts));

    // Shortcode Style CSS
    $e_uniqid     = uniqid();
    $inline_style = '';

    // Title Text Color
    if ( $title_color || $title_size ) {
      $inline_style .= '.fwzi-title-'. $e_uniqid .' .section-title {';
      $inline_style .= ( $title_color ) ? 'color:'. $title_color .';' : '';
      $inline_style .= ( $title_size ) ? 'font-size:'. fawzi_check_px($title_size) .';' : '';      
      $inline_style .= '}';
    }
    // Sub Title Text Color
    if ( $sub_title_color || $sub_title_size ) {
      $inline_style .= '.fwzi-title-'. $e_uniqid .' .section-subtitle {';
      $inline_style .= ( $sub_title_color ) ? 'color:'. $sub_title_color .';' : '';
      $inline_style .= ( $sub_title_size ) ? 'font-size:'. fawzi_check_px($sub_title_size) .';' : '';
      $inline_style .= '}';
    }
    // Underline Color
    if ( $underline_color ) {
      $inline_style .= '.fwzi-title-'. $e_uniqid .' .section-subtitle:after {';
      $inline_style .= ( $underline_color ) ? 'background:'. $underline_color .';' : '';
      $inline_style .= '}';
    }

    // add inline style
    add_inline_style( $inline_style );
    $styled_class  = 'fwzi-title-'. $e_uniqid;

    if ($under_line) {
      $line_class = 'section-subtitle';
    } else {
      $line_class = 'section-subtitle no-after';      
    }
    if ($alignment) {
      $align_class = 'fwzi-style-left';
    } else {
      $align_class = '';      
    }    

    $output = '<div class="'. $align_class .' section-title-wrap '. $styled_class .' '. $class .'">
                <h2 class="section-title">'. $title .'</h2>
                <h5 class="'.$line_class.'">'. $sub_title .'</h5>
              </div>';

    return $output;

  }
}
add_shortcode( 'fwzi_heading', 'fwzi_heading_function' );

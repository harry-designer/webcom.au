<?php
/* Difference */
if ( !function_exists('fawzi_difference_function')) {
  function fawzi_difference_function( $atts, $content = true ) {

    extract(shortcode_atts(array(
      'class'  => '',
    ), $atts));

    $output  = '<section class="fwzi-difference '.$class.'"><div class="align-column-wrap">';
    $output  .= do_shortcode($content);
    $output  .= '</div></section>';
   
    return $output;

  }
}
add_shortcode( 'fawzi_difference', 'fawzi_difference_function' );

/* Differ Content */
if ( !function_exists('fawzi_differ_function')) {
  function fawzi_differ_function( $atts, $content = true ) {

    extract(shortcode_atts(array(
      'content_heading'  => '',
      'fawzi_differences' => '',
      'class'  => '',
    ), $atts));

    $content_heading = $content_heading ? '<h2 class="difference-wrap-title">'. $content_heading .'</h2>' : '';
    // Group Field
    $fawzi_differences = (array) vc_param_group_parse_atts( $fawzi_differences );
    $get_fawzi_differences = array();
    foreach ( $fawzi_differences as $differences ) {
      $differ = $differences;
      $differ['differ_image'] = isset( $differences['differ_image'] ) ? $differences['differ_image'] : '';
      $differ['differ_title'] = isset( $differences['differ_title'] ) ? $differences['differ_title'] : '';
      $differ['differ_content'] = isset( $differences['differ_content'] ) ? $differences['differ_content'] : '';
      $get_fawzi_differences[] = $differ;
    }

    // Differ Content
    $output  = '<div class="column-item item-md-6"><div class="difference-wrap '.$class.'">'. $content_heading .'';

    foreach ( $get_fawzi_differences as $differ ) {
      $image_url = wp_get_attachment_url( $differ['differ_image'] );
      $differ_title = $differ['differ_title'] ? '<h4 class="difference-title">'.$differ['differ_title'].'</h4>' : '';

      $output .= '<div class="difference-item"><div class="fwzi-icon"><img src="'. $image_url .'" alt=""></div><div class="difference-info"> '.$differ_title.'<p>'.$differ['differ_content'].'</p></div></div>';
    }

    $output .= '</div></div>';

    return $output;

    // Differ Content

  }
}
add_shortcode( 'fawzi_differ', 'fawzi_differ_function' );
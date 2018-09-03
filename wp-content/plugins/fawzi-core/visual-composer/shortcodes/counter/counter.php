<?php
/* ==========================================================
  Counter
=========================================================== */
if ( !function_exists('fwzi_counter_function')) {
  function fwzi_counter_function( $atts, $content = NULL ) {

    extract(shortcode_atts(array(
      'counter_title'  => '',
      'counter_value'  => '',
      'counter_value_in'  => '',
      'class'  => '',

      // Style
      'counter_title_color'  => '',
      'counter_value_color'  => '',
      'counter_value_in_color'  => '',
      'counter_title_size'  => '',
      'counter_value_size'  => '',
      'counter_value_in_size'  => '',
    ), $atts));

    // Style
    $counter_title_color = $counter_title_color ? 'color:'. $counter_title_color .';' : '';
    $counter_value_color = $counter_value_color ? 'color:'. $counter_value_color .';' : '';
    $counter_value_in_color = $counter_value_in_color ? 'color:'. $counter_value_in_color .';' : '';
    // Size
    $counter_title_size = $counter_title_size ? 'font-size:'. $counter_title_size .';' : '';
    $counter_value_size = $counter_value_size ? 'font-size:'. $counter_value_size .';' : '';
    $counter_value_in_size = $counter_value_in_size ? 'font-size:'. $counter_value_in_size .';' : '';

    // Value
    $counter_value = $counter_value ? '<h2 class="fwzi-counter" style="'. $counter_value_color . $counter_value_size .'">'. $counter_value .'</h2>' : '';

    // Value In
    $counter_value_in = $counter_value_in ? '<span class="counter-type" style="'. $counter_value_in_color . $counter_value_in_size .'">'. $counter_value_in .'</span>' : '';

    // Counter Title
    $counter_title = $counter_title ? '<h5 class="status-title" style="'. $counter_title_color . $counter_title_size .'">'. $counter_title .'</h5>' : '';

    // Counters
    $output = '<div class="status-item '.$class.'">'. $counter_value . $counter_value_in . $counter_title .'</div>';

    // Output
    return $output;

  }
}
add_shortcode( 'fwzi_counter', 'fwzi_counter_function' );

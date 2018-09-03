<?php
/* ===========================================================
    Revenue
=========================================================== */
if ( !function_exists('fwzi_revenue_function')) {
  function fwzi_revenue_function( $atts, $content = NULL ) {

    extract(shortcode_atts(array(

      'title'  => '',      
      'upscore_title'  => '',
      'upscore_number'  => '',
      'downscore_title'  => '',
      'downscore_number'  => '',
      'class'  => '',
      // Styling
      'title_size'  => '',
      'content_size'  => '',
      'upscore_title_size'  => '',
      'upscore_number_size'  => '',
      'downscore_title_size'  => '',
      'downscore_number_size'  => '',
      'score_numbers_lineheight'  => '',
      // Color
      'title_color'  => '',
      'content_color'  => '',
      'upscore_title_color'  => '',
      'upscore_number_color'  => '',
      'downscore_title_color'  => '',
      'downscore_number_color'  => '',
    ), $atts));

    // fix unclosed/unwanted paragraph tags in $content
    $content = wpb_js_remove_wpautop($content, true);

    $title = $title ? '<h2 class="revenue-title">'.$title.'</h2>' : '';
    $upscore_title = $upscore_title ? '<h4 class="score-title">'.$upscore_title.'</h4>' : '';
    $upscore_number = $upscore_number ? '<h3 class="score-number">'.$upscore_number.'<sub>%</sub></h3>' : '';
    $downscore_title = $downscore_title ? '<h4 class="score-title">'.$downscore_title.'</h4>' : '';
    $downscore_number = $downscore_number ? '<h3 class="score-number">'.$downscore_number.'<sub>%</sub></h3>' : '';

    // Shortcode Style CSS
    $e_uniqid     = uniqid();
    $inline_style = '';

    // Title Text Color
    if ( $title_color || $title_size ) {
      $inline_style .= '.fwzi-revenue-'. $e_uniqid .' .revenue-info h2.revenue-title {';
      $inline_style .= ( $title_color ) ? 'color:'. $title_color .';' : '';
      $inline_style .= ( $title_size ) ? 'font-size:'. fawzi_check_px($title_size) .';' : '';      
      $inline_style .= '}';
    }
    // Sub Title Text Color
    if ( $content_color || $content_size ) {
      $inline_style .= '.fwzi-revenue-'. $e_uniqid .' .revenue-info p {';
      $inline_style .= ( $content_color ) ? 'color:'. $content_color .';' : '';
      $inline_style .= ( $content_size ) ? 'font-size:'. fawzi_check_px($content_size) .';' : '';
      $inline_style .= '}';
    }
    // Upscore Title & Color
    if ( $upscore_title_color || $upscore_title_size ) {
      $inline_style .= '.fwzi-revenue-'. $e_uniqid .' .score-item.up-score h4.score-title {';
      $inline_style .= ( $upscore_title_color ) ? 'color:'. $upscore_title_color .';' : '';
      $inline_style .= ( $upscore_title_size ) ? 'font-size:'. fawzi_check_px($upscore_title_size) .';' : '';
      $inline_style .= '}';
    }
    // Upscore Number & Color
    if ( $upscore_number_color || $upscore_number_size ) {
      $inline_style .= '.fwzi-revenue-'. $e_uniqid .' .score-item.up-score h3.score-number {';
      $inline_style .= ( $upscore_number_color ) ? 'color:'. $upscore_number_color .';' : '';
      $inline_style .= ( $upscore_number_size ) ? 'font-size:'. fawzi_check_px($upscore_number_size) .';' : '';
      $inline_style .= '}';
    }
    if ( $upscore_number_color ) {
      $inline_style .= '.fwzi-revenue-'. $e_uniqid .' .score-item.up-score h3.score-number sub {';
      $inline_style .= ( $upscore_number_color ) ? 'color:'. $upscore_number_color .';' : '';
      $inline_style .= '}';
    }
    // Downscore Title & Color
    if ( $downscore_title_color || $downscore_title_size ) {
      $inline_style .= '.fwzi-revenue-'. $e_uniqid .' .score-item.down-score h4.score-title {';
      $inline_style .= ( $downscore_title_color ) ? 'color:'. $downscore_title_color .';' : '';
      $inline_style .= ( $downscore_title_size ) ? 'font-size:'. fawzi_check_px($downscore_title_size) .';' : '';
      $inline_style .= '}';
    } 
    // Downscore Number & Color
    if ( $downscore_number_color || $downscore_number_size ) {
      $inline_style .= '.fwzi-revenue-'. $e_uniqid .' .score-item.down-score h3.score-number {';
      $inline_style .= ( $downscore_number_color ) ? 'color:'. $downscore_number_color .';' : '';
      $inline_style .= ( $downscore_number_size ) ? 'font-size:'. fawzi_check_px($downscore_number_size) .';' : '';
      $inline_style .= '}';
    }
    if ( $downscore_number_color ) {
      $inline_style .= '.fwzi-revenue-'. $e_uniqid .' .score-item.down-score h3.score-number sub {';
      $inline_style .= ( $downscore_number_color ) ? 'color:'. $downscore_number_color .';' : '';
      $inline_style .= '}';
    }
    // Score Lineheight
    if ( $score_numbers_lineheight ) {
      $inline_style .= '.fwzi-revenue-'. $e_uniqid .' .revenue-score .score-item h3 {';
      $inline_style .= ( $score_numbers_lineheight ) ? 'line-height:'. fawzi_check_px($score_numbers_lineheight) .';' : '';
      $inline_style .= '}';
    }

    // add inline style
    add_inline_style( $inline_style );
    $styled_class  = 'fwzi-revenue-'. $e_uniqid;    

    $output = '<div class="column-item item-md-6 '. $styled_class .' '. $class .'">
                <div class="revenue-info">'. $title . $content .'
                  <div class="revenue-score">
                    <div class="score-item up-score">'. $upscore_number . $upscore_title .'</div>
                    <div class="score-item down-score">'. $downscore_number . $downscore_title .'</div>
                  </div>
                </div>
              </div>';

    return $output;

  }
}
add_shortcode( 'fwzi_revenue', 'fwzi_revenue_function' );

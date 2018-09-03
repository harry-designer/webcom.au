<?php
/* ===========================================================
    Search Result 
=========================================================== */
if ( !function_exists('fwzi_search_result_function')) {
  function fwzi_search_result_function( $atts, $content = NULL ) {

    extract(shortcode_atts(array(
      'title'    => '',
      'search_result'  => '',
      'class'  => '',
      // Style
      'bg_color'  => '',
      'title_color' => '',
      'content_color'  => '',
      'result_color'  => '',
    ), $atts));

    // Group Field
    $search_result = (array) vc_param_group_parse_atts( $search_result );

     // Shortcode Style CSS
    $e_uniqid        = uniqid();
    $inline_style  = '';

    if ( $bg_color ) {
      $inline_style .= '.fwzi-result-'. $e_uniqid .'.search-result-wrap {';
      $inline_style .= ( $bg_color ) ? 'background-color:'. $bg_color .';' : '';
      $inline_style .= '}';
    }  
    if ( $title_color ) {
      $inline_style .= '.fwzi-result-'. $e_uniqid .'.search-result-wrap h3 {';
      $inline_style .= ( $title_color ) ? 'color:'. $title_color .';' : '';
      $inline_style .= '}';
    } 
    if ( $content_color ) {
      $inline_style .= '.fwzi-result-'. $e_uniqid .'.search-result-wrap p {';
      $inline_style .= ( $content_color ) ? 'color:'. $content_color .';' : '';
      $inline_style .= '}';
    } 
    if ( $result_color ) {
      $inline_style .= '.fwzi-result-'. $e_uniqid .'.search-result-wrap ul li {';
      $inline_style .= ( $result_color ) ? 'color:'. $result_color .';' : '';
      $inline_style .= '}';
    } 

    // add inline style
    add_inline_style( $inline_style );
    $styled_class  = ' fwzi-result-'. $e_uniqid;

    // Atts
    $uniqtab     = uniqid();

    // Output
    $output = '<div class="search-result-wrap '. $styled_class .' '. $class .'"><h3 class="search-result-title">'. $title .'</h3><p>'. $content .'</p><ul>';

    // Foreach features
    $i = 1;
    foreach ( $search_result as $list_item ) {
      
      $output .= '<li>'.$list_item['searched_result'].'</li>';
    }
    // Foreach features

    $output .= '</ul></div>';

    return $output;

  }
}
add_shortcode( 'fwzi_search_result', 'fwzi_search_result_function' ); ?>

<?php
/* ===========================================================
    Growth
=========================================================== */
if ( !function_exists('fwzi_growth_function')) {
  function fwzi_growth_function( $atts, $content = NULL ) {

    extract(shortcode_atts(array(
      'growth_style'  => '',
      'growth_icon'         => '',
      'growth_title'    => '',
      'growth_title_link'  => '',
      'growth_content'    => '',
      'class'    => '',
      // Style
      'growth_title_color' => '',
      'growth_link_color' => '',
      'growth_title_hover_color'  => '',
      'growth_content_color'  => '',
      'growth_bghover_color'  => '',
    ), $atts));

     // Shortcode Style CSS
    $e_uniqid        = uniqid();
    $inline_style  = '';

    // title
    if ( $growth_title_color ) {
      $inline_style .= '.fwzi-growth-'. $e_uniqid .' h4.growth-point-title {';
      $inline_style .= ( $growth_title_color ) ? 'color:'. $growth_title_color .';' : '';
      $inline_style .= '}';
    }
    // link
    if ( $growth_link_color ) {
      $inline_style .= '.fwzi-growth-'. $e_uniqid .'.growth-points-style-two .growth-point {';
      $inline_style .= ( $growth_link_color ) ? 'color:'. $growth_link_color .';' : '';
      $inline_style .= '}';
    }
    // title
    if ( $growth_content_color ) {
      $inline_style .= '.fwzi-growth-'. $e_uniqid .' .growth-point-info p {';
      $inline_style .= ( $growth_content_color ) ? 'color:'. $growth_content_color .';' : '';
      $inline_style .= '}';
    }
    // Bg
    if ( $growth_title_hover_color || $growth_bghover_color ) {
      $inline_style .= '.fwzi-growth-'. $e_uniqid .'.growth-points-style-two .growth-point:hover {';
      $inline_style .= ( $growth_title_hover_color ) ? 'color:'. $growth_title_hover_color .';' : '';
      $inline_style .= ( $growth_bghover_color ) ? 'background:'. $growth_bghover_color .';' : '';
      $inline_style .= '}';
    }

    // add inline style
    add_inline_style( $inline_style );
    $styled_class  = ' fwzi-growth-'. $e_uniqid;

    $image_url = wp_get_attachment_url( $growth_icon );
    // Atts
    if ($growth_style === 'fwzi-growth-two') {
      $growth_title = $growth_title ? $growth_title : '';
    } else {
      $growth_title = $growth_title ? '<h4 class="growth-point-title">'.$growth_title.'</h4>' : '';
    }
    $growth_content = $growth_content ? '<p>'.$growth_content.'</p>' : '';
    $growth_icon = $growth_icon ? '<img src="'.$image_url.'" alt="">' : '';
    $growth_title_link = $growth_title_link ? '<a href="'.$growth_title_link.'" class="growth-point">'. $growth_icon . $growth_title .'</a>' : '<div class="growth-point">'. $growth_icon . $growth_title .'</div>';

    if ($growth_style === 'fwzi-growth-two') {
      $output = '<div class="growth-points-style-two '.$styled_class.' '.$class.'">'.$growth_title_link.'</div>';
    } else {
      $output = '<div class="growth-point '.$styled_class.' '.$class.'"><div class="fwzi-icon">'. $growth_icon .'</div><div class="growth-point-info">'. $growth_title . $growth_content .'</div></div>';
    }
    return $output;

  }
}
add_shortcode( 'fwzi_growth', 'fwzi_growth_function' ); ?>

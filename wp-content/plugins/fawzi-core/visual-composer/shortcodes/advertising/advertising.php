<?php
/* ===========================================================
    Advertising
=========================================================== */
if ( !function_exists('fwzi_advertising_function')) {
  function fwzi_advertising_function( $atts, $content = NULL ) {

    extract(shortcode_atts(array(
      'advertising_icon'         => '',
      'advertising_title'    => '',
      'advertising_content'    => '',
      'class'    => '',
      // Style
      'advertising_title_color' => '',
      'advertising_content_color'  => '',
      'advertising_border_color'  => '',
      'advertising_border_right'  => '',
      'advertising_border_bottom'  => '',
    ), $atts));

     // Shortcode Style CSS
    $e_uniqid        = uniqid();
    $inline_style  = '';

    // title
    if ( $advertising_title_color ) {
      $inline_style .= '.fwzi-advertising-'. $e_uniqid .'.advertising-item h4 {';
      $inline_style .= ( $advertising_title_color ) ? 'color:'. $advertising_title_color .';' : '';
      $inline_style .= '}';
    }
    // content
    if ( $advertising_content_color ) {
      $inline_style .= '.fwzi-advertising-'. $e_uniqid .'.advertising-item p {';
      $inline_style .= ( $advertising_content_color ) ? 'color:'. $advertising_content_color .';' : '';
      $inline_style .= '}';
    }
    // Bg
    if ( $advertising_border_color || $advertising_border_right || $advertising_border_bottom ) {
      $inline_style .= '.fwzi-advertising-'. $e_uniqid .'.advertising-item {';
      $inline_style .= ( $advertising_border_color ) ? 'border-color:'. $advertising_border_color .';' : '';
      $inline_style .= ( $advertising_border_right ) ? 'border-right-width:'. $advertising_border_right .';' : '';
      $inline_style .= ( $advertising_border_bottom ) ? 'border-bottom-width:'. $advertising_border_bottom .';' : '';
      $inline_style .= '}';
    }

    // add inline style
    add_inline_style( $inline_style );
    $styled_class  = ' fwzi-advertising-'. $e_uniqid;

    $image_url = wp_get_attachment_url( $advertising_icon );
    // Atts
    $advertising_title = $advertising_title ? '<h4 class="advertising-title">'.$advertising_title.'</h4>' : '';
    $advertising_content = $advertising_content ? '<p>'.$advertising_content.'</p>' : '';
    $advertising_icon = $advertising_icon ? '<img src="'.$image_url.'" alt="">' : '';

    $output = '<div class="advertising-item '.$styled_class.' '.$class.'"><div class="fwzi-icon">'. $advertising_icon .'</div>'. $advertising_title . $advertising_content .'</div>';
    return $output;

  }
}
add_shortcode( 'fwzi_advertising', 'fwzi_advertising_function' ); ?>

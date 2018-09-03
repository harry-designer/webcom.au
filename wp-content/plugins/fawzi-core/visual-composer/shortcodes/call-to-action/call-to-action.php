<?php
/* ===========================================================
    Revenue
=========================================================== */
if ( !function_exists('fwzi_cta_function')) {
  function fwzi_cta_function( $atts, $content = NULL ) {

    extract(shortcode_atts(array(

      'callout_style' => '',
      'title'  => '',
      'sub_title'  => '',
      'btn_text'  => '',
      'btn_link'  => '',
      'btn_two_text'  => '',
      'btn_two_link'  => '',
      'class'  => '',
      // Styling
      'title_size'  => '',
      'sub_title_size'  => '',
      'btn_text_size'  => '',
      'btn_two_text_size'  => '',
      // Color
      'title_color'  => '',
      'sub_title_color'  => '',
      'btn_min_width'  => '',
      // Btn 1
      'btn_text_color'  => '',
      'btn_text_hover_color'  => '',
      'btn_bg_color'  => '',
      'btn_bg_hover_color'  => '',
      'btn_border_color'  => '',
      'btn_border_hover_color'  => '',
      // Btn 2
      'btn_two_text_color'  => '',
      'btn_two_text_hover_color'  => '',
      'btn_two_bg_color'  => '',
      'btn_two_bg_hover_color'  => '',
      'btn_two_border_color'  => '',
      'btn_two_border_hover_color'  => '',
    ), $atts));

    if ($btn_min_width) {
      $in_class = 'min-width-'.sanitize_title($btn_min_width);
    } else {
      $in_class = '';
    }

    // Shortcode Style CSS
    $e_uniqid     = uniqid();
    $inline_style = '';

    // Title Text Color
    if ( $title_color || $title_size ) {
      $inline_style .= '.fwzi-cta-'. $e_uniqid .' h3.callout-title {';
      $inline_style .= ( $title_color ) ? 'color:'. $title_color .';' : '';
      $inline_style .= ( $title_size ) ? 'font-size:'. fawzi_check_px($title_size) .';' : '';
      $inline_style .= '}';
    }
    // Sub Title Text Color
    if ( $sub_title_color || $sub_title_size ) {
      $inline_style .= '.fwzi-cta-'. $e_uniqid .' h3.callout-title {';
      $inline_style .= ( $sub_title_color ) ? 'color:'. $sub_title_color .';' : '';
      $inline_style .= ( $sub_title_size ) ? 'font-size:'. fawzi_check_px($sub_title_size) .';' : '';
      $inline_style .= '}';
    }
    // Btn Color
    if ( $btn_text_color || $btn_text_size || $btn_bg_color || $btn_border_color ) {
      $inline_style .= '.fwzi-cta-'. $e_uniqid .' a.fwzi-btn {';
      $inline_style .= ( $btn_text_color ) ? 'color:'. $btn_text_color .';' : '';
      $inline_style .= ( $btn_bg_color ) ? 'background:'. $btn_bg_color .';' : '';
      $inline_style .= ( $btn_border_color ) ? 'border-color:'. $btn_border_color .';' : '';
      $inline_style .= ( $btn_text_size ) ? 'font-size:'. fawzi_check_px($btn_text_size) .';' : '';
      $inline_style .= '}';
    }
    // Btn Hover Color
    if ( $btn_text_hover_color || $btn_bg_hover_color || $btn_border_hover_color ) {
      $inline_style .= '.fwzi-cta-'. $e_uniqid .' a.fwzi-btn:hover {';
      $inline_style .= ( $btn_text_hover_color ) ? 'color:'. $btn_text_hover_color .';' : '';
      $inline_style .= ( $btn_bg_hover_color ) ? 'background:'. $btn_bg_hover_color .';' : '';
      $inline_style .= ( $btn_border_hover_color ) ? 'border-color:'. $btn_border_hover_color .';' : '';
      $inline_style .= '}';
    }
    // Btn 2 Color
    if ( $btn_two_text_color || $btn_two_text_size || $btn_two_bg_color || $btn_two_border_color ) {
      $inline_style .= '.callout-style-four.fwzi-cta-'. $e_uniqid .' a.fwzi-btn {';
      $inline_style .= ( $btn_two_text_color ) ? 'color:'. $btn_two_text_color .';' : '';
      $inline_style .= ( $btn_two_bg_color ) ? 'background:'. $btn_two_bg_color .';' : '';
      $inline_style .= ( $btn_two_border_color ) ? 'border-color:'. $btn_two_border_color .';' : '';
      $inline_style .= ( $btn_two_text_size ) ? 'font-size:'. fawzi_check_px($btn_two_text_size) .';' : '';
      $inline_style .= '}';
    }
    // Btn 2 Hover Color
    if ( $btn_two_text_hover_color || $btn_two_bg_hover_color || $btn_two_border_hover_color ) {
      $inline_style .= '.callout-style-four.fwzi-cta-'. $e_uniqid .' a.fwzi-btn:hover {';
      $inline_style .= ( $btn_two_text_hover_color ) ? 'color:'. $btn_two_text_hover_color .';' : '';
      $inline_style .= ( $btn_two_bg_hover_color ) ? 'background:'. $btn_two_bg_hover_color .';' : '';
      $inline_style .= ( $btn_two_border_hover_color ) ? 'border-color:'. $btn_two_border_hover_color .';' : '';
      $inline_style .= '}';
    }
    // Btn width
    if ( $btn_min_width ) {
      $inline_style .= '.fwzi-cta-'. $e_uniqid .' a.fwzi-btn.'.$in_class.' {';
      $inline_style .= ( $btn_min_width ) ? 'min-width:'. fawzi_check_px($btn_min_width) .';' : '';
      $inline_style .= '}';
    }

    // add inline style
    add_inline_style( $inline_style );
    $styled_class  = 'fwzi-cta-'. $e_uniqid;

    $title = $title ? '<h3 class="callout-title">'. $title .'</h3>' : '';
    $sub_title = $sub_title ? '<h5 class="callout-subtitle">'. $sub_title .'</h5>' : '';
    $btn_two_text = $btn_two_text ? '<a href="'.$btn_two_link.'" class="fwzi-btn fwzi-btn-medium fwzi-btn-white-border">'.$btn_two_text.'</a>' : '';

    if ($callout_style === 'fwzi-cta-two') {
      $btn_text = $btn_text ? '<a href="'.$btn_link.'" class="fwzi-btn fwzi-btn-medium fwzi-btn-white '.$in_class.'">'.$btn_text.'</a>' : '';
    } else {
      $btn_text = $btn_text ? '<div class="column-item item-md-3 text-right"><a href="'.$btn_link.'" class="fwzi-btn fwzi-btn-medium fwzi-btn-white '.$in_class.'">'.$btn_text.'</a></div>' : '';
    }

    if ($callout_style === 'fwzi-cta-two') {
      $output = '<section class="fwzi-callout callout-style-four '. $styled_class .' '. $class .'">
                  <div class="callout-wrap">
                    <div class="container">
                      '. $title . $sub_title . $btn_text . $btn_two_text .'
                    </div>
                  </div>
                </section>';
    } else {
      $output = '<section class="fwzi-callout '. $styled_class .' '. $class .'">
                  <div class="container">
                    <div class="align-column-wrap">
                      <div class="column-item item-md-9">'. $title .'</div>
                      '.$btn_text.'
                    </div>
                  </div>
                </section>';
    }

    return $output;

  }
}
add_shortcode( 'fwzi_cta', 'fwzi_cta_function' );

<?php
/* ===========================================================
    Tutorials
=========================================================== */
if ( !function_exists('fwzi_tutorials_function')) {
  function fwzi_tutorials_function( $atts, $content = NULL ) {

    extract(shortcode_atts(array(

      'title'  => '',      
      'caption'  => '',      
      'btn_icon'  => '',
      'btn_link'  => '',
      'class'  => '',
      // Styling
      'title_size'  => '',
      'caption_size'  => '',
      'btn_icon_size'  => '',
      // Color
      'title_color'  => '',
      'caption_color'  => '',
      'btn_icon_color'  => '',
      // Btn
      'btn_icon_hover_color'  => '',
      'btn_bg_color'  => '',
      'btn_bg_hover_color'  => '',
     
    ), $atts));

    // Shortcode Style CSS
    $e_uniqid     = uniqid();
    $inline_style = '';

    // Title Text Color
    if ( $title_color || $title_size ) {
      $inline_style .= '.fwzi-tutorials-'. $e_uniqid .' .fwzi-tutorial h2 {';
      $inline_style .= ( $title_color ) ? 'color:'. $title_color .';' : '';
      $inline_style .= ( $title_size ) ? 'font-size:'. fawzi_check_px($title_size) .';' : '';      
      $inline_style .= '}';
    }
    // Caption Text Color
    if ( $caption_color || $caption_size ) {
      $inline_style .= '.fwzi-tutorials-'. $e_uniqid .' .fwzi-tutorial p {';
      $inline_style .= ( $caption_color ) ? 'color:'. $caption_color .';' : '';
      $inline_style .= ( $caption_size ) ? 'font-size:'. fawzi_check_px($caption_size) .';' : '';      
      $inline_style .= '}';
    }
    // Btn Color
    if ( $btn_icon_color || $btn_icon_size || $btn_bg_color ) {
      $inline_style .= '.fwzi-tutorials-'. $e_uniqid .' .play-btn {';
      $inline_style .= ( $btn_icon_color ) ? 'color:'. $btn_icon_color .';' : '';
      $inline_style .= ( $btn_bg_color ) ? 'background:'. $btn_bg_color .';' : '';
      $inline_style .= ( $btn_icon_size ) ? 'font-size:'. fawzi_check_px($btn_icon_size) .';' : '';
      $inline_style .= '}';
    }
    // Btn Hover Color
    if ( $btn_icon_hover_color || $btn_bg_hover_color ) {
      $inline_style .= '.fwzi-tutorials-'. $e_uniqid .' .play-btn:hover {';
      $inline_style .= ( $btn_icon_hover_color ) ? 'color:'. $btn_icon_hover_color .';' : '';
      $inline_style .= ( $btn_bg_hover_color ) ? 'background:'. $btn_bg_hover_color .';' : '';
      $inline_style .= '}';
    }     

    // add inline style
    add_inline_style( $inline_style );
    $styled_class  = 'fwzi-tutorials-'. $e_uniqid;   

    $title = $title ? '<h2 class="tutorial-title">'. $title .'</h2>' : '';
    $caption = $caption ? '<p>'. $caption .'</p>' : '';
    $btn_icon = $btn_icon ? '<i class="'. $btn_icon .'" aria-hidden="true"></i>' : '<i class="fa fa-play" aria-hidden="true"></i>';
    $btn_link = $btn_link ? '<a href="'.$btn_link.'"  class="play-btn popup-video">'. $btn_icon .'</a>' : '';
    
      $output = '<section class="fwzi-tutorial '.$styled_class.' '.$class.'">
                  <div class="container">
                    <div class="align-column-wrap">
                      <div class="column-item item-md-4">'.$title.'</div>
                      <div class="column-item item-md-4 text-center">'.$btn_link.'</div>
                      <div class="column-item item-md-4"><p>'.$caption.'</p></div>
                    </div>
                  </div>
                </section>';
    
    return $output;

  }
}
add_shortcode( 'fwzi_tutorials', 'fwzi_tutorials_function' );

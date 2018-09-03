<?php
/* ==========================================================
    Slider
=========================================================== */
if ( !function_exists('fawzi_slider_function')) {
  function fawzi_slider_function( $atts, $content = NULL ) {

    extract(shortcode_atts(array(
      'sliders'  => '',
      'class'  => '',
      // Styles
      'caption_overlay'  => '',
      'title_size'  => '',
      'content_size'  => '',
      'title_color'  => '',
      'content_color'  => '',
      'bone_text_size'  => '',
      'bone_text_color'  => '',
      'bone_bg_color'  => '',
      'bone_border_color'  => '',
      'bone_text_hover_color'  => '',
      'bone_bg_hover_color'  => '',
      'bone_border_hover_color'  => '',
      'btwo_text_size'  => '',
      'btwo_text_color'  => '',
      'btwo_text_hover_color'  => '',
      'btwo_bg_color'  => '',
      'btwo_bg_hover_color'  => '',
      'btwo_border_color'  => '',
      'btwo_border_hover_color'  => '',

    ), $atts));

    // Alignment & Texts
    $class = ( $class ) ? ' '. $class : '';

    // Group Field
    $slider_items = (array) vc_param_group_parse_atts( $sliders );
    $get_each_lists = array();
    foreach ( $slider_items as $slider_item ) {
      $each_list = $slider_item;
      $each_list['slider_image'] = isset( $slider_item['slider_image'] ) ? $slider_item['slider_image'] : '';
      $each_list['caption_alignment'] = isset( $slider_item['caption_alignment'] ) ? $slider_item['caption_alignment'] : '';
      $each_list['slider_title'] = isset( $slider_item['slider_title'] ) ? $slider_item['slider_title'] : '';
      $each_list['slider_content'] = isset( $slider_item['slider_content'] ) ? $slider_item['slider_content'] : '';
      $each_list['title_animation'] = isset( $slider_item['title_animation'] ) ? $slider_item['title_animation'] : '';
      $each_list['slider_bone_text'] = isset( $slider_item['slider_bone_text'] ) ? $slider_item['slider_bone_text'] : '';
      $each_list['slider_bone_link'] = isset( $slider_item['slider_bone_link'] ) ? $slider_item['slider_bone_link'] : '';
      $each_list['bone_animation'] = isset( $slider_item['bone_animation'] ) ? $slider_item['bone_animation'] : '';
      $each_list['slider_btwo_text'] = isset( $slider_item['slider_btwo_text'] ) ? $slider_item['slider_btwo_text'] : '';
      $each_list['slider_btwo_link'] = isset( $slider_item['slider_btwo_link'] ) ? $slider_item['slider_btwo_link'] : '';
      $each_list['btwo_animation'] = isset( $slider_item['btwo_animation'] ) ? $slider_item['btwo_animation'] : '';
      $each_list['custom_class'] = isset( $slider_item['custom_class'] ) ? $slider_item['custom_class'] : '';
      $get_each_lists[] = $each_list;
    }

    // Shortcode Style CSS
    $e_uniqid        = uniqid();
    $inline_style  = '';

    // Overlay
    if ( $caption_overlay ) {
      $inline_style .= '.fawzi-slider-'. $e_uniqid .' .fwzi-slide-cpation {';
      $inline_style .= ( $caption_overlay ) ? 'background:'. $caption_overlay .';' : '';
      $inline_style .= '}';
    } 
    // Title
    if ( $title_size || $title_color ) {
      $inline_style .= '.fawzi-slider-'. $e_uniqid .' .fwzi-slide-cpation {';
      $inline_style .= ( $title_size ) ? 'font-size:'. fawzi_core_check_px($title_size) .';' : '';
      $inline_style .= ( $title_color ) ? 'color:'. $title_color .';' : '';
      $inline_style .= '}';
    } 
    // Content
    if ( $content_size || $content_color ) {
      $inline_style .= '.fawzi-slider-'. $e_uniqid .' .slide-cpation-wrap p {';
      $inline_style .= ( $content_size ) ? 'font-size:'. fawzi_core_check_px($content_size) .';' : '';
      $inline_style .= ( $content_color ) ? 'color:'. $content_color .';' : '';
      $inline_style .= '}';
    } 
    // Bone
    if ( $bone_text_size || $bone_text_color || $bone_bg_color || $bone_border_color ) {
      $inline_style .= '.fawzi-slider-'. $e_uniqid .' .fwzi-slide-cpation a.fwzi-btn.fwzi-btn-white {';
      $inline_style .= ( $bone_text_size ) ? 'font-size:'. fawzi_core_check_px($bone_text_size) .';' : '';
      $inline_style .= ( $bone_text_color ) ? 'color:'. $bone_text_color .';' : '';
      $inline_style .= ( $bone_bg_color ) ? 'background:'. $bone_bg_color .';' : '';
      $inline_style .= ( $bone_border_color ) ? 'border-color:'. $bone_border_color .';' : '';
      $inline_style .= '}';
    } 
    // Bone Hover
    if ( $bone_text_hover_color || $bone_bg_hover_color || $bone_border_hover_color ) {
      $inline_style .= '.fawzi-slider-'. $e_uniqid .' .fwzi-slide-cpation a.fwzi-btn.fwzi-btn-white:hover {';
      $inline_style .= ( $bone_text_hover_color ) ? 'color:'. $bone_text_hover_color .';' : '';
      $inline_style .= ( $bone_bg_hover_color ) ? 'background:'. $bone_bg_hover_color .';' : '';
      $inline_style .= ( $bone_border_hover_color ) ? 'border-color:'. $bone_border_hover_color .';' : '';
      $inline_style .= '}';
    } 
    // Btwo
    if ( $btwo_text_size || $btwo_text_color || $btwo_bg_color || $btwo_border_color ) {
      $inline_style .= '.fawzi-slider-'. $e_uniqid .' .fwzi-slide-cpation a.fwzi-btn.fwzi-btn-white-border {';
      $inline_style .= ( $btwo_text_size ) ? 'font-size:'. fawzi_core_check_px($btwo_text_size) .';' : '';
      $inline_style .= ( $btwo_text_color ) ? 'color:'. $btwo_text_color .';' : '';
      $inline_style .= ( $btwo_bg_color ) ? 'background:'. $btwo_bg_color .';' : '';
      $inline_style .= ( $btwo_border_color ) ? 'border-color:'. $btwo_border_color .';' : '';
      $inline_style .= '}';
    } 
    // Btwo Hover
    if ( $btwo_text_hover_color || $btwo_bg_hover_color || $btwo_border_hover_color ) {
      $inline_style .= '.fawzi-slider-'. $e_uniqid .' .fwzi-slide-cpation a.fwzi-btn.fwzi-btn-white-border:hover {';
      $inline_style .= ( $btwo_text_hover_color ) ? 'color:'. $btwo_text_hover_color .';' : '';
      $inline_style .= ( $btwo_bg_hover_color ) ? 'background:'. $btwo_bg_hover_color .';' : '';
      $inline_style .= ( $btwo_border_hover_color ) ? 'border-color:'. $btwo_border_hover_color .';' : '';
      $inline_style .= '}';
    }  

    // add inline style
    add_inline_style( $inline_style );
    $styled_class  = ' fawzi-slider-'. $e_uniqid;

    $output = '<section class="swiper-container fadeslides keyboard'.$styled_class.' '.$class.'" data-autoplay="true"><div class="swiper-wrapper">';
    
    foreach ( $get_each_lists as $each_list ) {
      if ($each_list['caption_alignment'] === 'right') {
        $align_class = ' right';
      } elseif ($each_list['caption_alignment'] === 'center') {
        $align_class = ' center';
      } else {
        $align_class = '';
      }
      if ($each_list['slider_content']) {
        $caption_content = '<p class="animated" data-animation="'.$each_list['title_animation'].'">'.$each_list['slider_content'].'</p>';
      } else {
        $caption_content = '';
      }
      $image_url = wp_get_attachment_url( $each_list['slider_image'] );
      $output .= '<div class="swiper-slide '.$each_list['custom_class'].'" style="background-image: url('. $image_url .');">
                    <div class="fwzi-slide-cpation'. $align_class .'">
                      <div class="fwzi-table-container">
                        <div class="fwzi-align-container">
                          <div class="container">
                            <div class="slide-cpation-wrap">
                              <h2 class="slide-cpation-title animated" data-animation="'.$each_list['title_animation'].'">'.$each_list['slider_title'].'</h2>'.$caption_content.'
                              <a href="'.$each_list['slider_bone_link'].'" class="fwzi-btn fwzi-btn-white animated" data-animation="'.$each_list['bone_animation'].'">'.$each_list['slider_bone_text'].'</a>
                              <a href="'.$each_list['slider_btwo_link'].'" class="fwzi-btn fwzi-btn-white-border animated" data-animation="'.$each_list['btwo_animation'].'">'.$each_list['slider_btwo_text'].'</a>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>';        }
      $output .= '</div><div class="swiper-button-prev"></div><div class="swiper-button-next"></div></section>';

    // Starts

    return $output;

  }
}
add_shortcode( 'fawzi_slider', 'fawzi_slider_function' );

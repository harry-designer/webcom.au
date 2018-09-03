<?php
/* ==========================================================
    Share
=========================================================== */
if ( !function_exists('fawzi_process_function')) {
  function fawzi_process_function( $atts, $content = NULL ) {

    extract(shortcode_atts(array(
      'success_process'  => '',
      'process_btn_text'  => '',
      'process_btn_link'  => '',
      'class'  => '',
      // Colors
      'process_title_color'  => '',
      'process_subtitle_color'  => '',
      'process_btn_text_color'  => '',      
      'process_btn_text_hover_color'  => '',      
      'process_btn_text_bg_color'  => '',
      'process_btn_text_bg_hover_color'  => '',
      'process_btn_text_border_color'  => '',
      'process_btn_text_border_hover_color'  => '',
      // Style - Size
      'process_title_size'  => '',
      'process_subtitle_size'  => '',
    ), $atts));

    // Alignment & Texts
    $class = ( $class ) ? ' '. $class : '';

    // Group Field
    $process_items = (array) vc_param_group_parse_atts( $success_process );
    $get_each_lists = array();
    foreach ( $process_items as $process_item ) {
      $each_list = $process_item;
      $each_list['process_type'] = isset( $process_item['process_type'] ) ? $process_item['process_type'] : '';
      $each_list['process_icon'] = isset( $process_item['process_icon'] ) ? $process_item['process_icon'] : '';
      $each_list['process_title'] = isset( $process_item['process_title'] ) ? $process_item['process_title'] : '';
      $each_list['process_subtitle'] = isset( $process_item['process_subtitle'] ) ? $process_item['process_subtitle'] : '';
      $get_each_lists[] = $each_list;
    }

    // Shortcode Style CSS
    $e_uniqid        = uniqid();
    $inline_style  = '';

    // Btn Style
    if ( $process_btn_text_border_color || $process_btn_text_bg_color || $process_btn_text_color ) {
      $inline_style .= '.fawzi-process-'. $e_uniqid .' .fwzi-btn {';
      $inline_style .= ( $process_btn_text_border_color ) ? 'border-color:'. $process_btn_text_border_color .';' : '';
      $inline_style .= ( $process_btn_text_bg_color ) ? 'background-color:'. $process_btn_text_bg_color .';' : '';
      $inline_style .= ( $process_btn_text_color ) ? 'color:'. $process_btn_text_color .';' : '';
      $inline_style .= '}';
    }
    // Btn Hover Style
    if ( $process_btn_text_border_hover_color || $process_btn_text_bg_hover_color || $process_btn_text_hover_color ) {
      $inline_style .= '.fawzi-process-'. $e_uniqid .' .fwzi-btn:hover, .fawzi-process-'. $e_uniqid .' .fwzi-btn:focus {';
      $inline_style .= ( $process_btn_text_border_hover_color ) ? 'border-color:'. $process_btn_text_border_hover_color .';' : '';
      $inline_style .= ( $process_btn_text_bg_hover_color ) ? 'background-color:'. $process_btn_text_bg_hover_color .';' : '';
      $inline_style .= ( $process_btn_text_hover_color ) ? 'color:'. $process_btn_text_hover_color .';' : '';
      $inline_style .= '}';
    }
    if ( $process_title_color || $process_title_size ) {
      $inline_style .= '.fawzi-process-'. $e_uniqid .' .process-title {';
      $inline_style .= ( $process_title_color ) ? 'color:'. $process_title_color .';' : '';
      $inline_style .= ( $process_title_size ) ? 'font-size:'. fawzi_core_check_px($process_title_size) .';' : '';
      $inline_style .= '}';
    }
    if ( $process_subtitle_color || $process_subtitle_size ) {
      $inline_style .= '.fawzi-process-'. $e_uniqid .' .process-info p {';
      $inline_style .= ( $process_subtitle_color ) ? 'color:'. $process_subtitle_color .';' : '';
      $inline_style .= ( $process_subtitle_size ) ? 'font-size:'. fawzi_core_check_px($process_subtitle_size) .';' : '';
      $inline_style .= '}';
    }

    // add inline style
    add_inline_style( $inline_style );
    $styled_class  = ' fawzi-process-'. $e_uniqid;
    if ($process_btn_text) {
       $btn_process = '<div class="fwzi-btns-group"><a href="'.$process_btn_link.'" class="fwzi-btn">'.$process_btn_text.'</a></div>';
      }
    $output = '<section class="fwzi-process process-style-two'.$styled_class.' '.$class.'"><div class="process-wrap">';
    
    foreach ( $get_each_lists as $each_list ) {
      if ($each_list['process_type'] === 'icon-big') {
        $icon_class = ' big';
      } elseif ($each_list['process_type'] === 'icon-medium') {
        $icon_class = ' medium';
      } else {
        $icon_class = '';
      }
      $image_url = wp_get_attachment_url( $each_list['process_icon'] );
      $output .= '<div class="process-item">
                    <div class="process-icon'.$icon_class.'">
                      <div class="fwzi-table-container">
                        <div class="fwzi-align-container">
                          <div class="process-icon-wrap">
                            <div class="process-icon-inner">
                              <div class="fwzi-table-container">
                                <div class="fwzi-align-container">
                                  <img src="'. $image_url .'" alt="">
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="process-info">
                      <h5 class="process-title">'.$each_list['process_title'].'</h5>
                      <p>'.$each_list['process_subtitle'].'</p>
                    </div>
                  </div>';  
      }
      $output .= '</div>'.$btn_process.'</section>';

    // Starts

    return $output;

  }
}
add_shortcode( 'fawzi_process', 'fawzi_process_function' );

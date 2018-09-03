<?php
/* ==========================================================
  Tabs
=========================================================== */
if( ! function_exists( 'fwzi_vt_tabs_function' ) ) {
  function fwzi_vt_tabs_function( $atts, $content = '', $key = '' ) {

    global $vt_tabs;
    $vt_tabs = array();

    extract( shortcode_atts( array(
      'id'        => '',
      'class'     => '',
      'active'    => 1,
    ), $atts ) );

    do_shortcode( $content );

    // is not empty
    if( empty( $vt_tabs ) ) { return; }

    $output       = '';
    $id           = ( $id ) ? ' id="'. $id .'"' : '';
    $active       = ( isset( $_REQUEST['tab'] ) ) ? $_REQUEST['tab'] : $active;
    $uniqtab      = uniqid();

    // begin output
    $output  .= '<section'. $id .' class="fwzi-features features-style-two '. $class .'">';

      // tab-navs
      $output  .= '<div class="feature-links"><div class="container"><ul class="nav nav-tabs">';
      foreach( $vt_tabs as $key => $tab ){
        $title      = $tab['atts']['title'];
        $image_url = wp_get_attachment_url( $tab['atts']['icon'] );
        $icon       = ( !empty( $image_url ) ) ? '<img src="'. $image_url .'" alt="'. $title .'">': '';
        $active_nav = ( ( $key + 1 ) == $active ) ? ' class="active"' : '';
        $output    .= '<li'. $active_nav .'><a href="#'. $uniqtab .'-'. $key .'" data-toggle="tab">'. $icon .'<span class="feature-title">'. $title . '</span></a></li>';
      }
      $output  .= '</ul></div></div>';

      // tab-contents
      $output  .= '<div class="feature-info"><div class="container"><div class="tab-content">';
      foreach( $vt_tabs as $key => $tab ){
        $title           = $tab['atts']['title'];
        $active_content  = ( ( $key + 1 ) == $active ) ? ' in active' : '';
        $output         .= '<div id="'. $uniqtab .'-'. $key .'" class="tab-pane fade'. $active_content .'">'. do_shortcode( $tab['content'] ) .'</div>';
      }
      $output  .= '</div></div></div>';

    $output  .= '</section>';
    // end output

    return $output;
  }
  add_shortcode( 'vt_tabs', 'fwzi_vt_tabs_function' );
}

/* ==========================================================
  Tab
=========================================================== */
if( ! function_exists( 'fwzi_vt_tab_function' ) ) {
  function fwzi_vt_tab_function( $atts, $content = '', $key = '' ) {
    global $vt_tabs;
    $vt_tabs[]  = array( 'atts' => $atts, 'content' => $content );
    return;
  }
  add_shortcode('vt_tab', 'fwzi_vt_tab_function');
}
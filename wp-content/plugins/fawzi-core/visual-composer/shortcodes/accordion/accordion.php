<?php
/* ==========================================================
  Accordion
=========================================================== */
if( ! function_exists( 'fwzi_vt_accordion_function' ) ) {
  function fwzi_vt_accordion_function( $atts, $content = '', $key = '' ) {

    global $vt_accordion_tabs;
    $vt_accordion_tabs = array();

    extract( shortcode_atts( array(
      'accordion_style' => '',
      'id'            => '',
      'class'         => '',
      'one_active'    => '',
      'icon_color'    => '',
      'border_color'  => '',
      'active_tab'    => 0,
    ), $atts ) );

    do_shortcode( $content );

    // is not empty clients
    if( empty( $vt_accordion_tabs ) ) { return; }

    $id          = ( $id ) ? ' id="'. $id .'"' : '';
    $class       = ( $class ) ? ' '. $class : '';
    $one_active  = ( $one_active ) ? ' collapse-others' : '';
    $uniqtab     = uniqid();

    $el_style    = ( $border_color ) ? ' style="border-color:'. $border_color .';"' : '';

    // begin output
    $output      = '<section class="fwzi-faq-wrap">
        <div class="fwzi-faq">
          <div class="accordion" id="accordion" role="tablist" aria-multiselectable="true">
          <div'. $id .' class="panel-group '. $one_active .' '.$class.'">';

    foreach ( $vt_accordion_tabs as $key => $tab ) {
      $selected  = ( ( $key + 1 ) == $active_tab ) ? ' in' : '';
      $opened    = ( ( $key + 1 ) == $active_tab ) ? ' in' : '';
      $title     = '<h4 class="panel-title"><a href="#'. $uniqtab .'-'. $key .'" class="collapsed" data-toggle="collapse" data-parent="#accordion" aria-expanded="false">'. $tab['atts']['title'] .'</a></h4>';

      $output   .= '<div class="panel panel-default"'. $el_style .'>';
      $output   .= '<div class="panel-heading">'. $title .'</div>';
      $output   .= '<div id="'. $uniqtab .'-'. $key .'" class="panel-collapse collapse'. $opened .'"><div class="panel-content">'. do_shortcode( $tab['content'] ) . '</div></div>';
      $output   .= '</div>';

    }

    $output     .= '</div>
                  </div>
                  </div>
                </section>';
    // end output

    return $output;
  }
  add_shortcode( 'vc_accordion', 'fwzi_vt_accordion_function' );
}


/**
 *
 * Accordion Shortcode
 * @since 1.0.0
 * @version 1.1.0
 *
 */
if( ! function_exists( 'fwzi_vt_accordion_tab' ) ) {
  function fwzi_vt_accordion_tab( $atts, $content = '', $key = '' ) {
    global $vt_accordion_tabs;
    $vt_accordion_tabs[]  = array( 'atts' => $atts, 'content' => $content );
    return;
  }
  add_shortcode( 'vc_accordion_tab', 'fwzi_vt_accordion_tab' );
}
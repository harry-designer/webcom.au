<?php
/* ==========================================================
  Services
=========================================================== */
if ( !function_exists('fwzi_services_function')) {
  function fwzi_services_function( $atts, $content = true ) {

    extract(shortcode_atts(array(
      'service_style'  => '',
      'service_image'  => '',
      'service_image_link'  => '',
      'service_icon'  => '',
      'service_title'  => '',
      'read_more_link'  => '',
      'read_more_title'  => '',
      'open_link'  => '',
      'class'  => '',

      // Style
      'title_color'  => '',
      'title_size'  => '',
      'icon_size'  => '',
      'icon_color' => '',      
      'icon_bg_color' => '',      
      'read_more_link_color'  => '',
      'read_more_link_size'  => '',
      'read_more_link_hover_color'  => '',
    ), $atts));

    // fix unclosed/unwanted paragraph tags in $content
    $content = wpb_js_remove_wpautop($content, true);

    // Shortcode Style CSS
    $e_uniqid        = uniqid();
    $inline_style  = '';

    // Title Style
    if ( $title_size || $title_color ) {
      $inline_style .= '.fawzi-service-'. $e_uniqid .' h4.service-title {';
      $inline_style .= ( $title_size ) ? 'font-size:'. $title_size .';' : '';
      $inline_style .= ( $title_color ) ? 'color:'. $title_color .';' : '';
      $inline_style .= '}';
    }
    // Link Style
    if ( $read_more_link_color || $read_more_link_size ) {
      $inline_style .= '.fawzi-service-'. $e_uniqid .' .learn-more a {';
      $inline_style .= ( $read_more_link_size ) ? 'font-size:'. $read_more_link_size .';' : '';
      $inline_style .= ( $read_more_link_color ) ? 'color:'. $read_more_link_color .';' : '';
      $inline_style .= '}';
    }
    // Link Hover Style
    if ( $read_more_link_hover_color ) {
      $inline_style .= '.fawzi-service-'. $e_uniqid .' .learn-more a:hover {';
      $inline_style .= ( $read_more_link_hover_color ) ? 'color:'. $read_more_link_hover_color .';' : '';
      $inline_style .= '}';
    }
    // Icon Style
    if ( $icon_bg_color || $icon_size || $icon_color ) {
      $inline_style .= '.services-style-three.fawzi-service-'. $e_uniqid .' .service-item .fwzi-icon i.icons {';
      $inline_style .= ( $icon_size ) ? 'font-size:'. $icon_size .';' : '';
      $inline_style .= ( $icon_color ) ? 'color:'. $icon_color .';' : '';
      $inline_style .= ( $icon_bg_color ) ? 'background-color:'. $icon_bg_color .';' : '';
      $inline_style .= '}';
    }

    // add inline style
    add_inline_style( $inline_style );
    $styled_class  = 'fawzi-service-'. $e_uniqid;

    // Link Target
    $open_link = $open_link ? 'target="_blank"' : '';
    $read_more_link = $read_more_link ? '<div class="learn-more"><a href="'. $read_more_link .'" '. $open_link .'>'. $read_more_title .'</a></div>' : '';

    // Service Icon
    $service_icon = $service_icon ? '<div class="fwzi-icon"><i class="'. $service_icon .' icons"></i></div>' : '';

    // Service Image
    $image_url = wp_get_attachment_url( $service_image );
    $service_image_main = $service_image ? '<img src="'. $image_url .'" alt="">' : '';
    $service_image_exact = $service_image_link ? '<div class="fwzi-icon"><a href="'. $service_image_link .'" '. $open_link .'>'. $service_image_main .'</a></div>' : '<div class="fwzi-icon">'. $service_image_main .'</div>';

    // Service Title
    if ( function_exists( 'vc_parse_multi_attribute' ) ) {
      $parse_args = vc_parse_multi_attribute( $service_title );
      $url        = ( isset( $parse_args['url'] ) ) ? $parse_args['url'] : '';
      $title      = ( isset( $parse_args['title'] ) ) ? $parse_args['title'] : '';
      $target     = ( isset( $parse_args['target'] ) ) ? trim( $parse_args['target'] ) : '_self';
    }
    if ($url) {
      $service_title = '<h4 class="service-title"><a href="'. $url .'" target="'. $target .'">'. $title .'</a></h4>';
    } elseif ($title) {
      $service_title = '<h4 class="service-title">'. $title .'</h4>';
    } else {
      $service_title = '';
    }

    $output = '';
    if ($service_style === 'fwzi-service-two') {
      $output .= '
      <div class="service-item '.$styled_class.' '.$class.'">'. $service_image_exact .'<div class="service-info">'. $service_title . $content . $read_more_link .'</div>
      </div>';
    } elseif ($service_style === 'fwzi-service-three') {
      $output .= '
      <div class="services-style-three '.$styled_class.' '.$class.'"><div class="service-item">'. $service_icon .'<div class="service-info">'. $service_title . $content .'</div></div></div>';
    } else {
      $output .= '<div class="feature-item '.$styled_class.' '.$class.'">'. $service_image_exact . $service_title . $content .'</div>';
    }

    return $output;
  }
}
add_shortcode( 'fwzi_services', 'fwzi_services_function' );

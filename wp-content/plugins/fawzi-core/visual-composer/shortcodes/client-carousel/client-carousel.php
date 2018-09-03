<?php
/* ==========================================================
  Client Carousel
=========================================================== */
if ( !function_exists('fwzi_client_func')) {
  function fwzi_client_func( $atts, $content = NULL ) {

    extract(shortcode_atts(array(
      'open_link'  => '',
      'client_logos'  => '',
      'class'  => '',

      // Carousel
      'carousel_loop'  => '',
      'carousel_items'  => '',
      'carousel_dots'  => '',
      'carousel_nav'  => '',
      'carousel_margin'  => '',
      'carousel_autoplay_timeout'  => '',
      'carousel_autoplay'  => '',
      'carousel_animate_out'  => '',
      'carousel_mousedrag'  => '',
      'carousel_autowidth'  => '',
      'carousel_autoheight'  => '',
      'carousel_tablet'  => '',
      'carousel_mobile'  => '',
      'carousel_small_mobile'  => '',
    ), $atts));

    // Link Target
    $open_link = $open_link ? 'target="_blank"' : '';

    // Group Field
    $client_logos = (array) vc_param_group_parse_atts( $client_logos );
    $get_client_logos = array();
    foreach ( $client_logos as $client_logo ) {
      $each_logo = $client_logo;
      $each_logo['client_logo'] = isset( $client_logo['client_logo'] ) ? $client_logo['client_logo'] : '';
      $each_logo['client_link'] = isset( $client_logo['client_link'] ) ? $client_logo['client_link'] : '';
      $get_client_logos[] = $each_logo;
    }

    // Carousel Data's
    $carousel_loop = $carousel_loop !== 'true' ? ' data-loop="true"' : '';
    $carousel_items = $carousel_items ? ' data-items="'. $carousel_items .'"' : '';
    $carousel_dots = $carousel_dots ? ' data-dots="'. $carousel_dots .'"' : '';
    $carousel_nav = $carousel_nav ? ' data-nav="'. $carousel_nav .'"' : '';
    $carousel_margin = $carousel_margin ? ' data-margin="'. $carousel_margin .'"' : '';
    $carousel_autoplay_timeout = $carousel_autoplay_timeout ? ' data-autoplay-timeout="'. $carousel_autoplay_timeout .'"' : '';
    $carousel_autoplay = $carousel_autoplay ? ' data-autoplay="'. $carousel_autoplay .'"' : '';
    $carousel_animate_out = $carousel_animate_out ? ' data-animateout="'. $carousel_animate_out .'"' : '';
    $carousel_mousedrag = $carousel_mousedrag !== 'true' ? ' data-mouse-drag="true"' : '';
    $carousel_autowidth = $carousel_autowidth ? ' data-auto-width="'. $carousel_autowidth .'"' : '';
    $carousel_autoheight = $carousel_autoheight ? ' data-auto-height="'. $carousel_autoheight .'"' : '';
    $carousel_tablet = $carousel_tablet ? ' data-items-tablet="'. $carousel_tablet .'"' : '';
    $carousel_mobile = $carousel_mobile ? ' data-items-mobile-landscape="'. $carousel_mobile .'"' : '';
    $carousel_small_mobile = $carousel_small_mobile ? ' data-items-mobile-portrait="'. $carousel_small_mobile .'"' : '';

    $output = '<div class="fwzi-slider fwzi-client-slider '.$class.'"
          '. $carousel_loop . $carousel_items . $carousel_dots . $carousel_nav . $carousel_margin . $carousel_autoplay_timeout . $carousel_autoplay . $carousel_animate_out . $carousel_mousedrag . $carousel_autowidth . $carousel_autoheight . $carousel_tablet . $carousel_mobile . $carousel_small_mobile .'>';

    // Group Param Output
    foreach ( $get_client_logos as $each_logo ) {
      $image_url = wp_get_attachment_url( $each_logo['client_logo'] );
      if ($each_logo['client_link']) {
        $output .= '<div class="item"><div class="fwzi-image"><a href="'. $each_logo['client_link'] .'" '. $open_link .'><img src="'. $image_url .'" alt=""></a></div></div>';
      } else {
        $output .= '<div class="item"><div class="fwzi-image"><img src="'. $image_url .'" alt=""></div></div>';
      }
    }

    $output .= '</div>';

    return $output;
  }
}
add_shortcode( 'fwzi_client_carousel', 'fwzi_client_func' );

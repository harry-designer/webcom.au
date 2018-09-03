<?php
/**
 * Client Carousel - Shortcode Options
 */
add_action( 'init', 'client_carousel_vc_map' );
if ( ! function_exists( 'client_carousel_vc_map' ) ) {
  function client_carousel_vc_map() {
    vc_map( array(
      "name" => __( "Client", 'fawzi-core'),
      "base" => "fwzi_client_carousel",
      "description" => __( "Client Carousel", 'fawzi-core'),
      "icon" => "fa fa-shield color-green",
      "category" => FawziLib::fwzi_cat_name(),
      "params" => array(

        FawziLib::vt_open_link_tab(),

        // Client Logos
        array(
          'type' => 'param_group',
          'value' => '',
          'heading' => __( 'Client Logos', 'fawzi-core' ),
          'param_name' => 'client_logos',
          // Note params is mapped inside param-group:
          'params' => array(
            array(
              'type' => 'attach_image',
              'value' => '',
              "admin_label"=> true,
              'heading' => __( 'Upload Image', 'fawzi-core' ),
              'param_name' => 'client_logo',
            ),
            array(
              'type' => 'textfield',
              'value' => '',
              'heading' => __( 'Client Link', 'fawzi-core' ),
              'param_name' => 'client_link',
            )
          )
        ),
        FawziLib::vt_class_option(),

        // Carousel
        FawziLib::vt_notice_field(__( "Basic Options", 'fawzi-core' ),'bsic_opt','cs-warning', 'Carousel'), // Notice
        FawziLib::vt_carousel_loop(), // Loop
        FawziLib::vt_carousel_items(), // Items
        FawziLib::vt_carousel_margin(), // Margin
        FawziLib::vt_carousel_dots(), // Dots
        FawziLib::vt_carousel_nav(), // Nav
        FawziLib::vt_notice_field(__( "Auto Play & Interaction", 'fawzi-core' ),'apyi_opt','cs-warning', 'Carousel'), // Notice
        FawziLib::vt_carousel_autoplay_timeout(), // Autoplay Timeout
        FawziLib::vt_carousel_autoplay(), // Autoplay
        FawziLib::vt_carousel_animateout(), // Animate Out
        FawziLib::vt_carousel_mousedrag(), // Mouse Drag
        FawziLib::vt_notice_field(__( "Width & Height", 'fawzi-core' ),'wah_opt','cs-warning', 'Carousel'), // Notice
        FawziLib::vt_carousel_autowidth(), // Auto Width
        FawziLib::vt_carousel_autoheight(), // Auto Height
        FawziLib::vt_notice_field('Responsive Options','res_opt','cs-warning', 'Carousel'), // Notice
        FawziLib::vt_carousel_tablet(), // Tablet
        FawziLib::vt_carousel_mobile(), // Mobile
        FawziLib::vt_carousel_small_mobile(), // Small Mobile

      )
    ) );
  }
}

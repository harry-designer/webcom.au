<?php
/**
 * Visual Composer Related Functions
 */

// Init Visual Composer
if( ! function_exists( 'fwzi_init_vc_shortcodes' ) ) {
  function fwzi_init_vc_shortcodes() {
    if ( defined( 'WPB_VC_VERSION' ) ) {

      /* Visual Composer - Setup */
      require_once( FAWZI_SHORTCODE_BASE_PATH . '/lib/lib.php' );
      require_once( FAWZI_SHORTCODE_BASE_PATH . '/lib/add-params.php' );
      require_once( FAWZI_SHORTCODE_BASE_PATH . '/pre_pages/pre-pages.php' );

      /* All Shortcodes */
      if (class_exists('WPBakeryVisualComposerAbstract')) {

        // Templates
        $dir = FAWZI_SHORTCODE_BASE_PATH . '/vc_templates';
        vc_set_shortcodes_templates_dir( $dir );

        /* Set VC editor as default in following post types */
        $list = array(
          'post',
          'page',
          'portfolio',
          'team',
          'testimonial'
        );
        vc_set_default_editor_post_types( $list );

      } // class_exists

      // Add New Param - VC_Row
      $vc_row_attr = array(
        array(
          "type" => "switcher",
          "heading" => __( "Need Overlay Dotted Image?", 'fawzi' ),
          "description" => __( "Enable it, if you want overlay dotted image.", 'fawzi' ),
          "param_name" => "overlay_dotted",
          "on_text" => __( "Yes", 'fawzi'),
          "off_text" => __( "No", 'fawzi'),
          "group" => __( "Design Options", 'fawzi'),
          "std" => false,
        ),
        array(
          "type" => "colorpicker",
          "heading" => __( "Overlay Color", 'fawzi' ),
          "description" => __( "Pick your overlay color, make sure you've controlled opacity.", 'fawzi' ),
          "param_name" => "overlay_color",
          "group" => __( "Design Options", 'fawzi'),
        ),
      );
      vc_add_params( 'vc_row', $vc_row_attr );
      // Add New Param - VC_Column
      $vc_column_attr = array(
        array(
          'type' => 'dropdown',
          'value' => array(
            __( 'Default Alignment', 'fawzi-core' ) => 'text-default',
            __( 'Text Left', 'fawzi-core' ) => 'text-left',
            __( 'Text Right', 'fawzi-core' ) => 'text-right',
            __( 'Text Center', 'fawzi-core' ) => 'text-center',
          ),
          'heading' => __( 'Text Alignment', 'fawzi-core' ),
          'param_name' => 'text_alignment',
        ),
      );
      vc_add_params( 'vc_column', $vc_column_attr );

    }
  }

  add_action( 'vc_before_init', 'fwzi_init_vc_shortcodes' );
}

/* Remove VC Teaser metabox */
if ( is_admin() ) {
  if ( ! function_exists('fawzi_vt_remove_vc_boxes') ) {
    function fawzi_vt_remove_vc_boxes(){
      $post_types = get_post_types( '', 'names' );
      foreach ( $post_types as $post_type ) {
        remove_meta_box('vc_teaser',  $post_type, 'side');
      }
    } // End function
  } // End if
  add_action('do_meta_boxes', 'fawzi_vt_remove_vc_boxes');
}
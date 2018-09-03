<?php
/**
 * Difference - Shortcode Options
 */
add_action( 'init', 'difference_vc_map' );
if ( ! function_exists( 'difference_vc_map' ) ) {
 function difference_vc_map() {
   vc_map( array(
     "name" => __( "Difference", 'fawzi-core'),
     "base" => "fawzi_difference",
     "description" => __( "Difference Group", 'fawzi-core'),
     "as_parent" => array('only' => 'fawzi_differ,difference_img'),
     "content_element" => true,
     "show_settings_on_create" => false,
     "is_container" => true,
     "icon" => "fa fa-diamond color-grey",
     "category" => FawziLib::fwzi_cat_name(),
     "params" => array(

        FawziLib::vt_class_option(),

     ),
     'js_view' => 'VcColumnView'
   ) );
 }
}

// Difference List
add_action( 'init', 'differ_vc_map' );
if ( ! function_exists( 'differ_vc_map' ) ) {
  function differ_vc_map() {
    vc_map( array(
      "name" => __( "Difference - Content", 'fawzi-core'),
      "base" => "fawzi_differ",
      "description" => __( "Difference Content", 'fawzi-core'),
      "icon" => "fa fa-font color-slate-blue",
      "as_child" => array('only' => 'fawzi_difference'),
      "category" => FawziLib::fwzi_cat_name(),
      "params" => array(

        array(
          "type"        => 'textfield',
          "heading"     => __('Content Heading', 'fawzi-core'),
          "param_name"  => "content_heading",
          "value"       => "",
          "admin_label" => true,
          "description" => __( "Enter your Title.", 'fawzi-core')
        ),
        FawziLib::vt_class_option(),

         // List of features
        array(
          'type' => 'param_group',
          'value' => '',
          'heading' => __( 'Features', 'fawzi-core' ),
          'param_name' => 'fawzi_differences',
          'params' => array(

            array(
              "type"      => 'attach_image',
              "heading"   => __('Upload Left Side icon', 'fawzi-core'),
              "param_name" => "differ_image",
              "value"      => "",
              "description" => __( "Set your left side icon.", 'fawzi-core'),
            ),
            array(
              'type' => 'textfield',
              'value' => '',
              'heading' => __( 'Title', 'fawzi-core' ),
              'param_name' => 'differ_title',
              'admin_label' => true,
            ),   
            array(
              'type' => 'textarea',
              'value' => '',
              'heading' => __( 'Content', 'fawzi-core' ),
              'param_name' => 'differ_content',
              'admin_label' => true,
            ),          

          )
        ),

      )
    ) );
  }
}


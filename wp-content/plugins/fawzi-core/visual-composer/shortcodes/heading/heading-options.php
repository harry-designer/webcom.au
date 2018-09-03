<?php
/**
 * Heading - Shortcode Options
 */
add_action( 'init', 'fwzi_heading_vc_map' );
if ( ! function_exists( 'fwzi_heading_vc_map' ) ) {
  function fwzi_heading_vc_map() {
    vc_map( array(
      "name" => __( "Heading", 'fawzi-core'),
      "base" => "fwzi_heading",
      "description" => __( "Heading Styles", 'fawzi-core'),
      "icon" => "fa fa-header color-orange",
      "category" => FawziLib::fwzi_cat_name(),
      "params" => array(                
        array(
          "type" => "textfield",
          "heading" => __( "Heading Text", 'fawzi-core' ),
          "param_name" => "title",
          'value' => '',
          'admin_label' => true,
          "description" => __( "Enter your heading text.", 'fawzi-core'),
        ),
        array(
          "type" => "textfield",
          "heading" => __( "Sub Heading Text", 'fawzi-core' ),
          "param_name" => "sub_title",
          'value' => '',
          'admin_label' => true,
          "description" => __( "Enter your sub heading text.", 'fawzi-core'),
        ),
        array(
          "type"        =>'switcher',
          "heading"     =>__('Need Left Alignment?', 'fawzi-core'),
          "param_name"  => "alignment",
          "value"       => "",
          "std"         => false,
          'edit_field_class'   => 'vc_col-md-4 vc_column vt_field_space',
        ),
        array(
          "type"        =>'switcher',
          "heading"     =>__('Underline', 'fawzi-core'),
          "param_name"  => "under_line",
          "value"       => "",
          "std"         => true,
          'edit_field_class'   => 'vc_col-md-4 vc_column vt_field_space',
        ),

        FawziLib::vt_class_option(),

        // Styling
        array(
          "type" => "colorpicker",
          "heading" => __( "Heading Color", 'fawzi-core' ),
          "param_name" => "title_color",
          'value' => '',
          "group" => __( "Styling", 'fawzi-core'),
          'edit_field_class'  => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          "type" => "colorpicker",
          "heading" => __( "Sub Heading Color", 'fawzi-core' ),
          "param_name" => "sub_title_color",
          'value' => '',
          "group" => __( "Styling", 'fawzi-core'),
          'edit_field_class'  => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          "type" => "colorpicker",
          "heading" => __( "Underline Color", 'fawzi-core' ),
          "param_name" => "underline_color",
          'value' => '',
          "group" => __( "Styling", 'fawzi-core'),
          'edit_field_class'  => 'vc_col-md-6 vc_column vt_field_space', 
          'dependency' => array(
            'element' => 'under_line',
            'value' => 'true',
          ),
        ),
        
        // Design Tab
        array(
          "type" => "textfield",
          "heading" => __( "Heading Size", 'fawzi-core' ),
          "param_name" => "title_size",
          "group" => __( "Design", 'fawzi-core'),
          'edit_field_class'  => 'vc_col-md-4 vc_column vt_field_space',
        ),
        array(
          "type" => "textfield",
          "heading" => __( "Sub Heading Size", 'fawzi-core' ),
          "param_name" => "sub_title_size",
          "group" => __( "Design", 'fawzi-core'),
          'edit_field_class'  => 'vc_col-md-4 vc_column vt_field_space',
        ),
      )
    ) );
  }
}

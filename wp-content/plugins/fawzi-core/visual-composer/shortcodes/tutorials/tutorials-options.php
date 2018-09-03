<?php
/**
 * Tutorials - Shortcode Options
 */
add_action( 'init', 'fwzi_tutorials_vc_map' );
if ( ! function_exists( 'fwzi_tutorials_vc_map' ) ) {
  function fwzi_tutorials_vc_map() {
    vc_map( array(
      "name" => __( "Tutorials", 'fawzi-core'),
      "base" => "fwzi_tutorials",
      "description" => __( "Tutorials", 'fawzi-core'),
      "icon" => "fa fa-play color-red",
      "category" => FawziLib::fwzi_cat_name(),
      "params" => array(        
        
        array(
          "type" => "textfield",
          "heading" => __( "Title", 'fawzi-core' ),
          "param_name" => "title",
          'value' => '',
          'admin_label' => true,
          "description" => __( "Enter your heading text.", 'fawzi-core'),
        ),
        array(
          "type" => "textarea",
          "heading" => __( "Caption", 'fawzi-core' ),
          "param_name" => "caption",
          'value' => '',
          'admin_label' => true,
          "description" => __( "Enter your sub heading text.", 'fawzi-core'),          
        ),
        array(
          "type" => "vt_icon",
          "heading" => __( "Button Icon", 'fawzi-core' ),
          "param_name" => "btn_icon",
          'value' => '',
          'admin_label' => true,
          "description" => __( "Select your button icon.", 'fawzi-core'),
        ),
        array(
          "type" => "textfield",
          "heading" => __( "Button Link", 'fawzi-core' ),
          "param_name" => "btn_link",
          'value' => '',
          'admin_label' => true,
          "description" => __( "Enter your button link.", 'fawzi-core'),
        ),
       
        FawziLib::vt_class_option(),

        // Styling
        array(
          "type" => "colorpicker",
          "heading" => __( "Title Color", 'fawzi-core' ),
          "param_name" => "title_color",
          'value' => '',
          "group" => __( "Styling", 'fawzi-core'),
          'edit_field_class'  => 'vc_col-md-4 vc_column vt_field_space',
        ),
        array(
          "type" => "colorpicker",
          "heading" => __( "Caption Color", 'fawzi-core' ),
          "param_name" => "caption_color",
          'value' => '',
          "group" => __( "Styling", 'fawzi-core'),
          'edit_field_class'  => 'vc_col-md-4 vc_column vt_field_space',          
        ),
        array(
          "type" => "colorpicker",
          "heading" => __( "Button Icon Color", 'fawzi-core' ),
          "param_name" => "btn_icon_color",
          'value' => '',
          "group" => __( "Styling", 'fawzi-core'),
          'edit_field_class'  => 'vc_col-md-4 vc_column vt_field_space',
        ),
        array(
          "type" => "colorpicker",
          "heading" => __( "Button Icon Hover Color", 'fawzi-core' ),
          "param_name" => "btn_icon_hover_color",
          'value' => '',
          "group" => __( "Styling", 'fawzi-core'),
          'edit_field_class'  => 'vc_col-md-4 vc_column vt_field_space', 
        ),
        array(
          "type" => "colorpicker",
          "heading" => __( "Button Background Color", 'fawzi-core' ),
          "param_name" => "btn_bg_color",
          'value' => '',
          "group" => __( "Styling", 'fawzi-core'),
          'edit_field_class'  => 'vc_col-md-4 vc_column vt_field_space', 
        ),
        array(
          "type" => "colorpicker",
          "heading" => __( "Button Background Hover Color", 'fawzi-core' ),
          "param_name" => "btn_bg_hover_color",
          'value' => '',
          "group" => __( "Styling", 'fawzi-core'),
          'edit_field_class'  => 'vc_col-md-4 vc_column vt_field_space', 
        ),        
        
        // Design Tab
        array(
          "type" => "textfield",
          "heading" => __( "Title Size", 'fawzi-core' ),
          "param_name" => "title_size",
          "group" => __( "Design", 'fawzi-core'),
          'edit_field_class'  => 'vc_col-md-4 vc_column vt_field_space',
        ),
        array(
          "type" => "textfield",
          "heading" => __( "Caption Size", 'fawzi-core' ),
          "param_name" => "caption_size",
          "group" => __( "Design", 'fawzi-core'),
          'edit_field_class'  => 'vc_col-md-4 vc_column vt_field_space',          
        ),
        array(
          "type" => "textfield",
          "heading" => __( "Button Icon Size", 'fawzi-core' ),
          "param_name" => "btn_icon_size",
          "group" => __( "Design", 'fawzi-core'),
          'edit_field_class'  => 'vc_col-md-4 vc_column vt_field_space',
        ),
      )
    ) );
  }
}

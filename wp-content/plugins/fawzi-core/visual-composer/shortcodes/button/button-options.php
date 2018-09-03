<?php
/**
 * Button - Shortcode Options
 */
add_action( 'init', 'fwzi_button_vc_map' );
if ( ! function_exists( 'fwzi_button_vc_map' ) ) {
  function fwzi_button_vc_map() {
    vc_map( array(
      "name" => __( "Button", 'fawzi-core'),
      "base" => "fwzi_button",
      "description" => __( "Button Styles", 'fawzi-core'),
      "icon" => "fa fa-mouse-pointer color-orange",
      "category" => FawziLib::fwzi_cat_name(),
      "params" => array(
        
        array(
          "type" => "textfield",
          "heading" => __( "Button Text", 'fawzi-core' ),
          "param_name" => "button_text",
          'value' => '',
          'admin_label' => true,
          "description" => __( "Enter your button text.", 'fawzi-core'),
          'edit_field_class'  => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          "type" => "href",
          "heading" => __( "Button Link", 'fawzi-core' ),
          "param_name" => "button_link",
          'value' => '',
          "description" => __( "Enter your button link.", 'fawzi-core'),
          'edit_field_class'  => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          "type" => "switcher",
          "heading" => __( "Open New Tab?", 'fawzi-core' ),
          "param_name" => "open_link",
          "std" => false,
          'value' => '',
          "on_text" => __( "Yes", 'fawzi-core' ),
          "off_text" => __( "No", 'fawzi-core' ),
          'edit_field_class'  => 'vc_col-md-6 vc_column vt_field_space',
        ),
        FawziLib::vt_class_option(),

        // Styling
        array(
          "type" => "colorpicker",
          "heading" => __( "Text Color", 'fawzi-core' ),
          "param_name" => "text_color",
          'value' => '',
          "group" => __( "Styling", 'fawzi-core'),
          'edit_field_class'  => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          "type" => "colorpicker",
          "heading" => __( "Text Hover Color", 'fawzi-core' ),
          "param_name" => "text_hover_color",
          'value' => '',
          "group" => __( "Styling", 'fawzi-core'),
          'edit_field_class'  => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          "type" => "colorpicker",
          "heading" => __( "Background Color", 'fawzi-core' ),
          "param_name" => "bg_color",
          'value' => '',
          "group" => __( "Styling", 'fawzi-core'),
          'edit_field_class'  => 'vc_col-md-6 vc_column vt_field_space',          
        ),
        array(
          "type" => "colorpicker",
          "heading" => __( "Border Color", 'fawzi-core' ),
          "param_name" => "border_color",
          'value' => '',
          "group" => __( "Styling", 'fawzi-core'),
          'edit_field_class'  => 'vc_col-md-6 vc_column vt_field_space',          
        ),
        array(
          "type" => "colorpicker",
          "heading" => __( "Background Hover Color", 'fawzi-core' ),
          "param_name" => "bg_hover_color",
          'value' => '',
          "group" => __( "Styling", 'fawzi-core'),
          'edit_field_class'  => 'vc_col-md-6 vc_column vt_field_space',          
        ),
        array(
          "type" => "colorpicker",
          "heading" => __( "Border Hover Color", 'fawzi-core' ),
          "param_name" => "border_hover_color",
          'value' => '',
          "group" => __( "Styling", 'fawzi-core'),
          'edit_field_class'  => 'vc_col-md-6 vc_column vt_field_space',          
        ),
        array(
          "type" => "textfield",
          "heading" => __( "Text Size", 'fawzi-core' ),
          "param_name" => "text_size",
          'value' => '',
          "description" => __( "Enter button text font size. [Eg: 14px]", 'fawzi-core'),
          "group" => __( "Styling", 'fawzi-core'),
          'edit_field_class'  => 'vc_col-md-6 vc_column vt_field_space',          
        ),
        array(
          "type" => "textfield",
          "heading" => __( "Button Minimum Width", 'fawzi-core' ),
          "param_name" => "btn_min_width",
          "group" => __( "Styling", 'fawzi-core'),
          'edit_field_class'  => 'vc_col-md-6 vc_column vt_field_space',
        ),

        // Design Tab
        array(
          "type" => "css_editor",
          "heading" => __( "Text Size", 'fawzi-core' ),
          "param_name" => "css",
          "group" => __( "Design", 'fawzi-core'),
        ),

      )
    ) );
  }
}

<?php
/**
 * Advertising - Shortcode Options
 */
add_action( 'init', 'fwzi_advertising_vc_map' );
if ( ! function_exists( 'fwzi_advertising_vc_map' ) ) {
  function fwzi_advertising_vc_map() {
    vc_map( array(
      "name" => __( "Advertising", 'fawzi-core'),
      "base" => "fwzi_advertising",
      "description" => __( "Advertising", 'fawzi-core'),
      "icon" => "fa fa-puzzle-piece color-blue",
      "category" => FawziLib::fwzi_cat_name(),
      "params" => array(
        array(
          "type"      => 'attach_image',
          "heading"   => __('Upload advertising icon', 'fawzi-core'),
          "param_name" => "advertising_icon",
          "value"      => "",
          "description" => __( "Set your advertising icon.", 'fawzi-core'),
        ),
        array(
          "type" => "textfield",
          "heading" => __( "Title", 'fawzi-core' ),
          "param_name" => "advertising_title",
          'value' => '',
          'admin_label' => true,
          "description" => __( "Enter your advertising title.", 'fawzi-core'),
        ),
        array(
          "type" => "textarea",
          "heading" => __( "Content", 'fawzi-core' ),
          "param_name" => "advertising_content",
          'value' => '',
          "description" => __( "Enter your advertising content.", 'fawzi-core'),          
        ),        
       
        FawziLib::vt_class_option(),

        // Style
        array(
          "type"        =>'colorpicker',
          "heading"     =>__('Title Text Color', 'fawzi-core'),
          "param_name"  => "advertising_title_color",
          "value"       => "",
          'edit_field_class'   => 'vc_col-md-4 vc_column vt_field_space',
          "group"     =>__('Style', 'fawzi-core'),          
        ),  
        array(
          "type"        =>'colorpicker',
          "heading"     =>__('Content Text Color', 'fawzi-core'),
          "param_name"  => "advertising_content_color",
          "value"       => "",
          'edit_field_class'   => 'vc_col-md-4 vc_column vt_field_space',
          "group"     =>__('Style', 'fawzi-core'),          
        ),
        array(
          "type"        =>'colorpicker',
          "heading"     =>__('Border Color', 'fawzi-core'),
          "param_name"  => "advertising_border_color",
          "value"       => "",
          'edit_field_class'   => 'vc_col-md-4 vc_column vt_field_space',
          "group"     =>__('Style', 'fawzi-core'),          
        ),
        array(
          "type"        =>"textfield",
          "heading"     =>__('Border Bottom Size', 'fawzi-core'),
          "param_name"  => "advertising_border_bottom",
          "value"       => "",
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
          "description" => __( "Enter border size. [Eg: 1px]", 'fawzi-core'),
          "group"     =>__('Style', 'fawzi-core'),          
        ),
        array(
          "type"        =>"textfield",
          "heading"     =>__('Border Right Size', 'fawzi-core'),
          "param_name"  => "advertising_border_right",
          "value"       => "",
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
          "description" => __( "Enter border size. [Eg: 1px]", 'fawzi-core'),
          "group"     =>__('Style', 'fawzi-core'),          
        ),

      )
    ) );
  }
}

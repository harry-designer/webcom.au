<?php
/**
 * Counter - Shortcode Options
 */
add_action( 'init', 'fwzi_counter_vc_map' );
if ( ! function_exists( 'fwzi_counter_vc_map' ) ) {
  function fwzi_counter_vc_map() {
    vc_map( array(
      "name" => __( "Counter", 'fawzi-core'),
      "base" => "fwzi_counter",
      "description" => __( "Counter Styles", 'fawzi-core'),
      "icon" => "fa fa-sort-numeric-asc color-blue",
      "category" => FawziLib::fwzi_cat_name(),
      "params" => array(

        array(
          "type"        =>'textfield',
          "heading"     =>__('Title', 'fawzi-core'),
          "param_name"  => "counter_title",
          "value"       => "",
          "description" => __( "Enter your counter title.", 'fawzi-core')
        ),
        array(
          "type"        =>'textfield',
          "heading"     =>__('Counter Value', 'fawzi-core'),
          "param_name"  => "counter_value",
          "value"       => "",
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
          "description" => __( "Enter numeric value to count. Ex : 20", 'fawzi-core')
        ),
        array(
          "type"        =>'textfield',
          "heading"     =>__('Value In', 'fawzi-core'),
          "param_name"  => "counter_value_in",
          "value"       => "",
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
          "description" => __( "Enter value in symbol or text. Eg : +, k, % ect...", 'fawzi-core')
        ),
        FawziLib::vt_class_option(),

        // Stylings
        array(
          "type"        => 'colorpicker',
          "heading"     => __('Title Color', 'fawzi-core'),
          "param_name"  => "counter_title_color",
          "value"       => "",
          'edit_field_class'   => 'vc_col-md-4 vt_field_space',
          "group"       => __('Style', 'fawzi-core'),
        ),
        array(
          "type"        => 'colorpicker',
          "heading"     => __('Counter Color', 'fawzi-core'),
          "param_name"  => "counter_value_color",
          "value"       => "",
          'edit_field_class'   => 'vc_col-md-4 vt_field_space',
          "group"       => __('Style', 'fawzi-core'),
        ),
        array(
          "type"        => 'colorpicker',
          "heading"     => __('Value In Color', 'fawzi-core'),
          "param_name"  => "counter_value_in_color",
          "value"       => "",
          'edit_field_class'   => 'vc_col-md-4 vt_field_space',
          "group"       => __('Style', 'fawzi-core'),
        ),
        // Size
        array(
          "type"        => 'textfield',
          "heading"     => __('Title Size', 'fawzi-core'),
          "param_name"  => "counter_title_size",
          "value"       => "",
          'edit_field_class'   => 'vc_col-md-4 vt_field_space',
          "group"       => __('Style', 'fawzi-core'),
          "description" => __( "Enter font size in px.", 'fawzi-core')
        ),
        array(
          "type"        => 'textfield',
          "heading"     => __('Counter Size', 'fawzi-core'),
          "param_name"  => "counter_value_size",
          "value"       => "",
          'edit_field_class'   => 'vc_col-md-4 vt_field_space',
          "group"       => __('Style', 'fawzi-core'),
          "description" => __( "Enter font size in px.", 'fawzi-core')
        ),
        array(
          "type"        => 'textfield',
          "heading"     => __('Value In Size', 'fawzi-core'),
          "param_name"  => "counter_value_in_size",
          "value"       => "",
          'edit_field_class'   => 'vc_col-md-4 vt_field_space',
          "group"       => __('Style', 'fawzi-core'),
          "description" => __( "Enter font size in px.", 'fawzi-core')
        ),

      )
    ) );
  }
}

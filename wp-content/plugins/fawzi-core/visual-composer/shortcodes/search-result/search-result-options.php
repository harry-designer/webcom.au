<?php
/**
 * Search Result - Shortcode Options
 */
add_action( 'init', 'fwzi_search_result_vc_map' );
if ( ! function_exists( 'fwzi_search_result_vc_map' ) ) {
  function fwzi_search_result_vc_map() {
    vc_map( array(
      "name" => __( "Search Result", 'fawzi-core'),
      "base" => "fwzi_search_result",
      "description" => __( "Search Result", 'fawzi-core'),
      "icon" => "fa fa-search color-orange",
      "category" => FawziLib::fwzi_cat_name(),
      "params" => array(
       
        array(
          "type" => "textarea",
          "heading" => __( "Title", 'fawzi-core' ),
          "param_name" => "title",
          'value' => '',
          'admin_label' => true,
          "description" => __( "Enter your search result title.", 'fawzi-core'),
        ),
        array(
          "type" => "textarea_html",
          "heading" => __( "Content", 'fawzi-core' ),
          "param_name" => "content",
          'value' => '',
          'admin_label' => true,
          "description" => __( "Enter your search result content.", 'fawzi-core'),
        ),
        FawziLib::vt_class_option(),

        // List of features
        array(
          'type' => 'param_group',
          'value' => '',
          'heading' => __( 'Results', 'fawzi-core' ),
          'param_name' => 'search_result',
          'params' => array(
            array(
              'type' => 'textfield',
              'value' => '',
              'heading' => __( 'Result', 'fawzi-core' ),
              'param_name' => 'searched_result',
              'admin_label' => true,
            ),            

          )
        ),

        // Style
        array(
          "type"        =>'colorpicker',
          "heading"     =>__('Background Color', 'fawzi-core'),
          "param_name"  => "bg_color",
          "value"       => "",
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
          "group"     =>__('Style', 'fawzi-core'),
        ),
        array(
          "type"        =>'colorpicker',
          "heading"     =>__('Title Color', 'fawzi-core'),
          "param_name"  => "title_color",
          "value"       => "",
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
          "group"     =>__('Style', 'fawzi-core'),
        ),
        array(
          "type"        =>'colorpicker',
          "heading"     =>__('Content Color', 'fawzi-core'),
          "param_name"  => "content_color",
          "value"       => "",
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
          "group"     =>__('Style', 'fawzi-core'),
        ),
        array(
          "type"        =>'colorpicker',
          "heading"     =>__('Results Color', 'fawzi-core'),
          "param_name"  => "result_color",
          "value"       => "",
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
          "group"     =>__('Style', 'fawzi-core'),
        ),

      )
    ) );
  }
}

<?php
/**
 * Resource - Shortcode Options
 */
add_action( 'init', 'resource_single_vc_map' );
if ( ! function_exists( 'resource_single_vc_map' ) ) {
  function resource_single_vc_map() {
    vc_map( array(
    "name" => __( "Resource Single", 'fawzi-core'),
    "base" => "fwzi_resource_single",
    "description" => __( "Resource Single", 'fawzi-core'),
    "icon" => "fa fa-book color-red",
    "category" => FawziLib::fwzi_cat_name(),
    "params" => array(

        array(
          "type"        => "notice",
          "heading"     => __( "Listing", 'fawzi-core' ),
          "param_name"  => 'lsng_opt',
          'class'       => 'cs-warning',
          'value'       => '',
        ),
        array(
          'type' => 'attach_image',
          'value' => '',
          "admin_label"=> true,
          'heading' => __( 'Upload Book Image', 'fawzi-core' ),
          'param_name' => 'book_image',
        ),
        array(
          "type"      => 'textarea_html',
          "heading"   => __('Content', 'fawzi-core'),
          "param_name" => "content",
          "value"      => "",
          "description" => __( "Enter your resource content here.", 'fawzi-core')
        ),        
        array(
          'type' => 'textfield',
          'value' => '',
          'heading' => __( 'Features Title', 'fawzi-core' ),
          'param_name' => 'features_title',
        ),
        // Resource Features
        array(
          'type' => 'param_group',
          'value' => '',
          'heading' => __( 'Resource Features', 'fawzi-core' ),
          'param_name' => 'resource_features',
          // Note params is mapped inside param-group:
          'params' => array(
            array(
              'type' => 'textfield',
              'value' => '',
              'heading' => __( 'Features', 'fawzi-core' ),
              'param_name' => 'features',
            )
          )
        ),
        FawziLib::vt_class_option(),

        // Style
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
          "heading"     =>__('Author Name Color', 'fawzi-core'),
          "param_name"  => "author_color",
          "value"       => "",
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
          "group"     =>__('Style', 'fawzi-core'),
        ),
        array(
          "type"        =>'colorpicker',
          "heading"     =>__('Author Name Hover Color', 'fawzi-core'),
          "param_name"  => "author_hover_color",
          "value"       => "",
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
          "group"     =>__('Style', 'fawzi-core'),
        ),
        array(
          "type"        =>'colorpicker',
          "heading"     =>__('Download Color', 'fawzi-core'),
          "param_name"  => "download_color",
          "value"       => "",
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
          "group"     =>__('Style', 'fawzi-core'),
        ),
        array(
          "type"        =>'colorpicker',
          "heading"     =>__('Download Hover Color', 'fawzi-core'),
          "param_name"  => "download_hover_color",
          "value"       => "",
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
          "group"     =>__('Style', 'fawzi-core'),
        ),        

      ), // Params
    ) );
  }
}
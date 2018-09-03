<?php
/**
 * Services - Shortcode Options
 */
add_action( 'init', 'fwzi_services_vc_map' );
if ( ! function_exists( 'fwzi_services_vc_map' ) ) {
  function fwzi_services_vc_map() {
    vc_map( array(
      "name" => __( "Service", 'fawzi-core'),
      "base" => "fwzi_services",
      "description" => __( "Service Shortcodes", 'fawzi-core'),
      "icon" => "fa fa-cog color-brown",
      "category" => FawziLib::fwzi_cat_name(),
      "params" => array(

        array(
          'type' => 'dropdown',
          'heading' => __( 'Services Style', 'fawzi-core' ),
          'value' => array(
            __( 'Style One', 'fawzi-core' ) => 'fwzi-service-one',
            __( 'Style Two', 'fawzi-core' ) => 'fwzi-service-two',
            __( 'Style Three', 'fawzi-core' ) => 'fwzi-service-three',
          ),
          'admin_label' => true,
          'param_name' => 'service_style',
          'description' => __( 'Select your service style.', 'fawzi-core' ),
        ),
        FawziLib::vt_open_link_tab(),
        array(
          "type"      => 'attach_image',
          "heading"   => __('Upload Service Image', 'fawzi-core'),
          "param_name" => "service_image",
          "value"      => "",
          "description" => __( "Set your service image.", 'fawzi-core'),
          'dependency' => array(
            'element' => 'service_style',
            'value' => array('fwzi-service-one','fwzi-service-two'),
          ),
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          "type"      => 'href',
          "heading"   => __('Image Link', 'fawzi-core'),
          "param_name" => "service_image_link",
          "value"      => "",
          "description" => __( "Enter your service image link.", 'fawzi-core'),
          'dependency' => array(
            'element' => 'service_style',
            'value' => array('fwzi-service-one','fwzi-service-two'),
          ),
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          "type"      => 'vt_icon',
          "heading"   => __('Set Icon', 'fawzi-core'),
          "param_name" => "service_icon",
          "value"      => "",
          "description" => __( "Set your service icon.", 'fawzi-core'),
          'dependency' => array(
            'element' => 'service_style',
            'value' => 'fwzi-service-three',
          ),
        ),
        FawziLib::vt_notice_field(__( "Content Area", 'fawzi-core' ),'cntara_opt','cs-warning', ''), // Notice
        array(
          "type"      => 'vc_link',
          "heading"   => __('Service Title', 'fawzi-core'),
          "param_name" => "service_title",
          "value"      => "",
          "description" => __( "Enter your service title and link.", 'fawzi-core')
        ),
        array(
          "type"      => 'textarea_html',
          "heading"   => __('Content', 'fawzi-core'),
          "param_name" => "content",
          "value"      => "",
          "description" => __( "Enter your service content here.", 'fawzi-core')
        ),

        // Read More
        array(
    			"type"        => "notice",
    			"heading"     => __( "Read More Link", 'fawzi-core' ),
    			"param_name"  => 'rml_opt',
    			'class'       => 'cs-warning',
    			'value'       => '',
          'dependency' => array(
            'element' => 'service_style',
            'value' => 'fwzi-service-two',
          ),
    		),
        array(
          "type"      => 'href',
          "heading"   => __('Link', 'fawzi-core'),
          "param_name" => "read_more_link",
          "value"      => "",
          "description" => __( "Set your link for read more.", 'fawzi-core'),
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
          'dependency' => array(
            'element' => 'service_style',
            'value' => 'fwzi-service-two',
          ),
        ),
        array(
          "type"      => 'textfield',
          "heading"   => __('Title', 'fawzi-core'),
          "param_name" => "read_more_title",
          "value"      => "",
          "description" => __( "Enter your read more title.", 'fawzi-core'),
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
          'dependency' => array(
            'element' => 'service_style',
            'value' => 'fwzi-service-two',
          ),
        ),        

        FawziLib::vt_class_option(),

        // Style
        FawziLib::vt_notice_field(__( "Styling", 'fawzi-core' ),'tle_opt','cs-warning', 'Style'), // Notice
        array(
          "type"      => 'colorpicker',
          "heading"   => __('Title Color', 'fawzi-core'),
          "param_name" => "title_color",
          "value"      => "",
          "description" => __( "Pick your heading color.", 'fawzi-core'),
          "group" => __( "Style", 'fawzi-core'),
          'edit_field_class'   => 'vc_col-md-4 vc_column vt_field_space',
        ),
        array(
          "type"      => 'textfield',
          "heading"   => __('Title Size', 'fawzi-core'),
          "param_name" => "title_size",
          "value"      => "",
          "description" => __( "Enter the numeric value for title size in px.", 'fawzi-core'),
          "group" => __( "Style", 'fawzi-core'),
          'edit_field_class'   => 'vc_col-md-4 vc_column vt_field_space',
        ),
        array(
          "type"      => 'colorpicker',
          "heading"   => __('Link Color', 'fawzi-core'),
          "param_name" => "read_more_link_color",
          "value"      => "",
          "description" => __( "Pick your link color.", 'fawzi-core'),
          "group" => __( "Style", 'fawzi-core'),
          'edit_field_class'   => 'vc_col-md-4 vc_column vt_field_space',
        ),
        array(
          "type"      => 'colorpicker',
          "heading"   => __('Link Hover Color', 'fawzi-core'),
          "param_name" => "read_more_link_hover_color",
          "value"      => "",
          "description" => __( "Pick your link hover color.", 'fawzi-core'),
          "group" => __( "Style", 'fawzi-core'),
          'edit_field_class'   => 'vc_col-md-4 vc_column vt_field_space',
        ),
        array(
          "type"      => 'textfield',
          "heading"   => __('Icon Size', 'fawzi-core'),
          "param_name" => "icon_size",
          "value"      => "",
          "description" => __( "Enter the numeric value for icon size in px.", 'fawzi-core'),
          "group" => __( "Style", 'fawzi-core'),
          'edit_field_class'   => 'vc_col-md-4 vc_column vt_field_space',
          'dependency' => array(
            'element' => 'service_style',
            'value' => 'fwzi-service-three',
          ),
        ),
        array(
          "type"      => 'colorpicker',
          "heading"   => __('Icon Color', 'fawzi-core'),
          "param_name" => "icon_color",
          "value"      => "",
          "description" => __( "Pick your icon color.", 'fawzi-core'),
          "group" => __( "Style", 'fawzi-core'),
          'edit_field_class'   => 'vc_col-md-4 vc_column vt_field_space',
          'dependency' => array(
            'element' => 'service_style',
            'value' => 'fwzi-service-three',
          ),
        ),   
        array(
          "type"      => 'colorpicker',
          "heading"   => __('Icon Background Color', 'fawzi-core'),
          "param_name" => "icon_bg_color",
          "value"      => "",
          "description" => __( "Pick your icon background color.", 'fawzi-core'),
          "group" => __( "Style", 'fawzi-core'),
          'edit_field_class'   => 'vc_col-md-4 vc_column vt_field_space',
          'dependency' => array(
            'element' => 'service_style',
            'value' => 'fwzi-service-three',
          ),
        ),     
        array(
          "type"      => 'textfield',
          "heading"   => __('Read More Size', 'fawzi-core'),
          "param_name" => "read_more_link_size",
          "value"      => "",
          "description" => __( "Enter the numeric value for read more size in px.", 'fawzi-core'),
          "group" => __( "Style", 'fawzi-core'),
          'edit_field_class'   => 'vc_col-md-4 vc_column vt_field_space',
          'dependency' => array(
            'element' => 'service_style',
            'value' => 'fwzi-service-three',
          ),
        ),        

      )
    ) );
  }
}

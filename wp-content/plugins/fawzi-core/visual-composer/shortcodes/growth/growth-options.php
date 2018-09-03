<?php
/**
 * Growth Points - Shortcode Options
 */
add_action( 'init', 'fwzi_growth_vc_map' );
if ( ! function_exists( 'fwzi_growth_vc_map' ) ) {
  function fwzi_growth_vc_map() {
    vc_map( array(
      "name" => __( "Growth Points", 'fawzi-core'),
      "base" => "fwzi_growth",
      "description" => __( "Growth Points", 'fawzi-core'),
      "icon" => "fa fa-rocket color-blue",
      "category" => FawziLib::fwzi_cat_name(),
      "params" => array(

        array(
          'type' => 'dropdown',
          'heading' => __( 'Growth Style', 'fawzi-core' ),
          'value' => array(
            __( 'Style One', 'fawzi-core' ) => 'fwzi-growth-one',
            __( 'Style Two', 'fawzi-core' ) => 'fwzi-growth-two',
          ),
          'admin_label' => true,
          'param_name' => 'growth_style',
          'description' => __( 'Select your growth style.', 'fawzi-core' ),
        ),       
        array(
          "type"      => 'attach_image',
          "heading"   => __('Upload growth icon', 'fawzi-core'),
          "param_name" => "growth_icon",
          "value"      => "",
          "description" => __( "Set your growth icon.", 'fawzi-core'),
        ),
        array(
          "type" => "textfield",
          "heading" => __( "Title", 'fawzi-core' ),
          "param_name" => "growth_title",
          'value' => '',
          'admin_label' => true,
          "description" => __( "Enter your growth title.", 'fawzi-core'),
        ),
        array(
          "type" => "textfield",
          "heading" => __( "Title Link", 'fawzi-core' ),
          "param_name" => "growth_title_link",
          'value' => '',
          'admin_label' => true,
          "description" => __( "Enter your growth title.", 'fawzi-core'),
          "description" => __( "Enter your service image link.", 'fawzi-core'),
          'dependency' => array(
            'element' => 'growth_style',
            'value' => array('fwzi-growth-two'),
          ),
        ),
        array(
          "type" => "textarea",
          "heading" => __( "Content", 'fawzi-core' ),
          "param_name" => "growth_content",
          'value' => '',
          'admin_label' => true,
          "description" => __( "Enter your growth content.", 'fawzi-core'),
          'dependency' => array(
            'element' => 'growth_style',
            'value' => array('fwzi-growth-one'),
          ),
        ),        
       
        FawziLib::vt_class_option(),

        // Style
        array(
          "type"        =>'colorpicker',
          "heading"     =>__('Title Color', 'fawzi-core'),
          "param_name"  => "growth_title_color",
          "value"       => "",
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
          "group"     =>__('Style', 'fawzi-core'),
          'dependency' => array(
            'element' => 'growth_style',
            'value' => array('fwzi-growth-one'),
          ),
        ),
        array(
          "type"        =>'colorpicker',
          "heading"     =>__('Title Color', 'fawzi-core'),
          "param_name"  => "growth_link_color",
          "value"       => "",
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
          "group"     =>__('Style', 'fawzi-core'),
          'dependency' => array(
            'element' => 'growth_style',
            'value' => array('fwzi-growth-two'),
          ),
        ),
        array(
          "type"        =>'colorpicker',
          "heading"     =>__('Title Hover Color', 'fawzi-core'),
          "param_name"  => "growth_title_hover_color",
          "value"       => "",
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
          "group"     =>__('Style', 'fawzi-core'),
          'dependency' => array(
            'element' => 'growth_style',
            'value' => array('fwzi-growth-two'),
          ),
        ),
        array(
          "type"        =>'colorpicker',
          "heading"     =>__('Content Color', 'fawzi-core'),
          "param_name"  => "growth_content_color",
          "value"       => "",
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
          "group"     =>__('Style', 'fawzi-core'),
          'dependency' => array(
            'element' => 'growth_style',
            'value' => array('fwzi-growth-one'),
          ),
        ),
        array(
          "type"        =>'colorpicker',
          "heading"     =>__('Background Hover Color', 'fawzi-core'),
          "param_name"  => "growth_bghover_color",
          "value"       => "",
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
          "group"     =>__('Style', 'fawzi-core'),
          'dependency' => array(
            'element' => 'growth_style',
            'value' => array('fwzi-growth-two'),
          ),
        ),

      )
    ) );
  }
}

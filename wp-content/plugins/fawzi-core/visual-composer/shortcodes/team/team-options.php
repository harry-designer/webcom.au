<?php
/**
 * Team - Shortcode Options
 */
add_action( 'init', 'team_vc_map' );
if ( ! function_exists( 'team_vc_map' ) ) {
  function team_vc_map() {
    vc_map( array(
    "name" => __( "Team", 'fawzi-core'),
    "base" => "fwzi_team",
    "description" => __( "Team Style", 'fawzi-core'),
    "icon" => "fa fa-user color-red",
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
          "type"        =>'textfield',
          "heading"     =>__('Limit', 'fawzi-core'),
          "param_name"  => "team_limit",
          "value"       => "",
          'admin_label' => true,
          "description" => __( "Enter the number of items to show.", 'fawzi-core'),
        ),
        array(
          'type' => 'dropdown',
          'heading' => __( 'Order', 'fawzi-core' ),
          'value' => array(
            __( 'Select Team Order', 'fawzi-core' ) => '',
            __('Asending', 'fawzi-core') => 'ASC',
            __('Desending', 'fawzi-core') => 'DESC',
          ),
          'param_name' => 'team_order',
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          'type' => 'dropdown',
          'heading' => __( 'Order By', 'fawzi-core' ),
          'value' => array(
            __('None', 'fawzi-core') => 'none',
            __('ID', 'fawzi-core') => 'ID',
            __('Author', 'fawzi-core') => 'author',
            __('Title', 'fawzi-core') => 'title',
            __('Date', 'fawzi-core') => 'date',
          ),
          'param_name' => 'team_orderby',
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          "type"        =>'switcher',
          "heading"     =>__('Social Icons', 'fawzi-core'),
          "param_name"  => "team_social_icon",
          "value"       => "",
          "std"         => true,
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
          "description" => __( "If you need social icon, turn this to On.", 'fawzi-core'),
        ),
        array(
          "type"        =>'textfield',
          "heading"     =>__('Miss-Aligned?', 'fawzi-core'),
          "param_name"  => "team_min_height",
          "value"       => "",
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
          "description" => __( "Enter minimum height value in px.", 'fawzi-core'),
        ),
        FawziLib::vt_class_option(),

        // Style
        array(
          "type"        =>'colorpicker',
          "heading"     =>__('Name Color', 'fawzi-core'),
          "param_name"  => "name_color",
          "value"       => "",
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
          "group"     =>__('Style', 'fawzi-core'),
        ),
        array(
          "type"        =>'colorpicker',
          "heading"     =>__('Name Hover Color', 'fawzi-core'),
          "param_name"  => "name_hover_color",
          "value"       => "",
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
          "group"     =>__('Style', 'fawzi-core'),
        ),
        array(
          "type"        =>'colorpicker',
          "heading"     =>__('Profession Color', 'fawzi-core'),
          "param_name"  => "profession_color",
          "value"       => "",
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
          "group"     =>__('Style', 'fawzi-core'),
        ),
        array(
          "type"        =>'colorpicker',
          "heading"     =>__('Icon Color', 'fawzi-core'),
          "param_name"  => "icon_color",
          "value"       => "",
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
          "group"     =>__('Style', 'fawzi-core'),
        ),
        array(
          "type"        =>'colorpicker',
          "heading"     =>__('Icon Hover Color', 'fawzi-core'),
          "param_name"  => "icon_hover_color",
          "value"       => "",
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
          "group"     =>__('Style', 'fawzi-core'),
        ),
        array(
          "type"        =>'colorpicker',
          "heading"     =>__('Icon Background Color', 'fawzi-core'),
          "param_name"  => "icon_bg_color",
          "value"       => "",
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
          "group"     =>__('Style', 'fawzi-core'),
        ),
        array(
          "type"        =>'colorpicker',
          "heading"     =>__('Icon Background Hover Color', 'fawzi-core'),
          "param_name"  => "icon_bg_hover_color",
          "value"       => "",
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
          "group"     =>__('Style', 'fawzi-core'),
        ),
        array(
          "type"        =>'colorpicker',
          "heading"     =>__('Hover Overlay Color', 'fawzi-core'),
          "param_name"  => "hover_overlay_color",
          "value"       => "",
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
          "group"     =>__('Style', 'fawzi-core'),
        ),
        // Size
        array(
          "type"        =>'textfield',
          "heading"     =>__('Name Size', 'fawzi-core'),
          "param_name"  => "name_size",
          "value"       => "",
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
          "group"     =>__('Style', 'fawzi-core'),
        ),
        array(
          "type"        =>'textfield',
          "heading"     =>__('Profession Size', 'fawzi-core'),
          "param_name"  => "profession_size",
          "value"       => "",
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
          "group"     =>__('Style', 'fawzi-core'),
        ),

      ), // Params
    ) );
  }
}
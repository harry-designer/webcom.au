<?php
/**
 * Chart - Shortcode Options
 */
add_action( 'init', 'chart_vc_map' );
if ( ! function_exists( 'chart_vc_map' ) ) {
  function chart_vc_map() {
    vc_map( array(
      "name" => __( "Chart", 'fawzi-core'),
      "base" => "fwzi_chart",
      "description" => __( "Chart Styles", 'fawzi-core'),
      "icon" => "fa fa-area-chart color-pink",
      "category" => FawziLib::fwzi_cat_name(),
      "params" => array(

        // Chart Type
        array(
          'type' => 'dropdown',
          'heading' => __( 'Chart Type', 'fawzi-core' ),
          'value' => array(
            __( 'Line', 'fawzi-core' ) => 'line',
            __( 'Bar', 'fawzi-core' ) => 'bar',
            __( 'Radar', 'fawzi-core' ) => 'radar',
            __( 'Doughnut', 'fawzi-core' ) => 'doughnut',
            __( 'PIE', 'fawzi-core' ) => 'pie',
            __( 'Polar Area', 'fawzi-core' ) => 'polarArea',
          ),
          'admin_label' => true,
          'param_name' => 'chart_type',
          'description' => __( 'Select your chart style type.', 'fawzi-core' ),
        ),
        array(
          "type"        => 'switcher',
          "heading"     => __('Show Values in Horizontal Mode?', 'fawzi-core'),
          "param_name"  => "horizontal_bar",
          "value"       => "",
          "on_text"     => __('Yes', 'fawzi-core'),
          "off_text"    => __('No', 'fawzi-core'),
          "std"         => false,
          'dependency' => array(
            'element' => 'chart_type',
            'value' => 'bar',
          ),
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          "type"        => 'switcher',
          "heading"     => __('Show Legend?', 'fawzi-core'),
          "param_name"  => "opt_legend",
          "value"       => "",
          "on_text"     => __('Yes', 'fawzi-core'),
          "off_text"    => __('No', 'fawzi-core'),
          "std"         => false,          
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          'type' => 'dropdown',
          'heading' => __( 'Legend Position', 'fawzi-core' ),
          'value' => array(
            __( 'Select', 'fawzi-core' ) => '',
            __( 'Left', 'fawzi-core' ) => 'left',
            __( 'Right', 'fawzi-core' ) => 'right',
            __( 'Top', 'fawzi-core' ) => 'top',
            __( 'Bottom', 'fawzi-core' ) => 'bottom',
          ),
          'default' => 'right',
          'param_name' => 'opt_legend_pos',
          'description' => __( 'Select your legend position.', 'fawzi-core' ),
          'dependency' => array(
            'element' => 'opt_legend',
            'value' => 'true',
          ),
        ),

        // Height
        array(
          "type"        => "notice",
          "heading"     => __( "Height", 'fawzi-core' ),
          "param_name"  => 'n_wi_he',
          'class'       => 'cs-success',
          'value'       => '',
        ),
        array(
          "type"        => 'textfield',
          "heading"     => __('Width', 'fawzi-core'),
          "param_name"  => "canvas_width",
          "value"       => "",
          "description" => __( "Enter your chart width, without units. Eg: 200", 'fawzi-core'),
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          "type"        => 'textfield',
          "heading"     => __('Height', 'fawzi-core'),
          "param_name"  => "canvas_height",
          "value"       => "",
          "description" => __( "Enter your chart height, without units. Eg: 200", 'fawzi-core'),
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        ),        

        // Chart Values
        array(
          "type"        => "notice",
          "heading"     => __( "Chart Values", 'fawzi-core' ),
          "param_name"  => 'n_ch_va',
          'class'       => 'cs-info',
          'value'       => '',
        ),
        array(
          "type"        => 'textarea',
          "heading"     => __('Chart X-Axis/Label Values', 'fawzi-core'),
          "param_name"  => "x_values",
          'value'      => 'January; February; March; April; May; June',
          'dependency' => array(
            'element' => 'chart_type',
            'value'   => array( 'line', 'bar', 'radar' )
          ),
        ),
        array(
          "type"        => 'textfield',
          "heading"     => __('Maximum Value', 'fawzi-core'),
          "param_name"  => "max_value",
          'value'      => '100',
          'dependency' => array(
            'element' => 'chart_type',
            'value'   => array( 'line', 'bar' )
          ),
          'edit_field_class'   => 'vc_col-md-4 vc_column vt_field_space',
        ),
        array(
          "type"        => 'textfield',
          "heading"     => __('Minimum Value', 'fawzi-core'),
          "param_name"  => "min_value",
          'value'      => '20',
          'dependency' => array(
            'element' => 'chart_type',
            'value'   => array( 'line', 'bar' )
          ),
          'edit_field_class'   => 'vc_col-md-4 vc_column vt_field_space',
        ),
        array(
          "type"        => 'textfield',
          "heading"     => __('Each Step Gap', 'fawzi-core'),
          "param_name"  => "step_value",
          'value'      => '20',
          'dependency' => array(
            'element' => 'chart_type',
            'value'   => array( 'line', 'bar' )
          ),
          'edit_field_class'   => 'vc_col-md-4 vc_column vt_field_space',
        ),
        array(
          "type"        =>'switcher',
          "heading"     =>__('Hide X-Axis Grid Lines?', 'fawzi-core'),
          "param_name"  => "hidex_gridlines",
          "value"       => "",
          "std"         => false,
          'dependency' => array(
            'element' => 'chart_type',
            'value'   => array( 'line', 'bar' )
          ),
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          "type"        =>'switcher',
          "heading"     =>__('Hide Y-Axis Grid Lines?', 'fawzi-core'),
          "param_name"  => "hidey_gridlines",
          "value"       => "",
          "std"         => false,
          'dependency' => array(
            'element' => 'chart_type',
            'value'   => array( 'line', 'bar' )
          ),
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        ),

        // Param Group - Line, Bar, Radar
        array(
          'type' => 'param_group',
          'heading' => __( 'Each Values', 'fawzi-core' ),
          'param_name' => 'line_values',
          'dependency' => array(
            'element' => 'chart_type',
            'value'   => array( 'line', 'bar', 'radar' )
          ),
          'value'      => urlencode( json_encode( array(
            array(
              'title' => __( 'Stocks', 'fawzi-core' ),
              'y_values' => '20; 40; 30; 35; 25; 25',
              'color' => '#fe6c61',
              'point_border_color' => '#00bfa5',
              'border_color' => '#00bfa5',
              'point_color' => '#ffffff',
              'border_width' => '1',
              'point_width' => '2',
              'point_radius' => '4',
              'point_hover_radius' => '4',
            ),
            array(
              'title' => __( 'Bonds', 'fawzi-core' ),
              'y_values' => '20; 60; 40; 35; 45; 30',
              'color' => '#5aa1e3',
              'point_border_color' => '#00bfa5',
              'border_color' => '#00bfa5',
              'point_color' => '#ffffff',
              'border_width' => '1', 
              'point_width' => '2',
              'point_radius' => '4',
              'point_hover_radius' => '4',
            ),
            array(
              'title' => __( 'Mutual Funds', 'fawzi-core' ),
              'y_values' => '20; 30; 75; 40; 60; 45',
              'color' => '#8d6dc4',
              'point_border_color' => '#00bfa5',
              'border_color' => '#00bfa5',
              'point_color' => '#ffffff',
              'border_width' => '1',
              'point_width' => '2',
              'point_radius' => '4',
              'point_hover_radius' => '4',
            )
          ) ) ),
          // Note params is mapped inside param-group:
          'params' => array(
            array(
              'type' => 'dropdown',
              'heading' => __( 'Mixed Chart Type', 'fawzi-core' ),
              'value' => array(
                __( 'None', 'fawzi-core' ) => '',
                __( 'Line', 'fawzi-core' ) => 'line',
                __( 'Bar', 'fawzi-core' ) => 'bar',
                __( 'Radar', 'fawzi-core' ) => 'radar',
                __( 'Doughnut', 'fawzi-core' ) => 'doughnut',
                __( 'PIE', 'fawzi-core' ) => 'pie',
                __( 'Polar Area', 'fawzi-core' ) => 'polarArea',
              ),
              'param_name' => 'opt_mixed',
              'description' => __( 'Select chart type to combain.', 'fawzi-core' ),
            ),
            array(
              'type' => 'textfield',
              'value' => '',
              "admin_label"=> true,
              'heading' => __( 'Title', 'fawzi-core' ),
              'param_name' => 'title',
            ),
            array(
              'type' => 'textfield',
              'value' => '',
              "admin_label"=> true,
              'heading' => __( 'Value', 'fawzi-core' ),
              'param_name' => 'y_values',
            ),
            array(
              'type' => 'colorpicker',
              'value' => '',
              'heading' => __( 'Background Color', 'fawzi-core' ),
              'param_name' => 'color',
              'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
            ),
            array(
              'type' => 'colorpicker',
              'value' => '',
              'heading' => __( 'Point Background Color', 'fawzi-core' ),
              'param_name' => 'point_color',
              'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
            ),
            array(
              'type' => 'colorpicker',
              'value' => '',
              'heading' => __( 'Border Color', 'fawzi-core' ),
              'param_name' => 'border_color',
              'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
            ),
            array(
              'type' => 'colorpicker',
              'value' => '',
              'heading' => __( 'Point Border Color', 'fawzi-core' ),
              'param_name' => 'point_border_color',
              'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
            ),

            // Point Size
            array(
              'type' => 'textfield',
              'value' => '',
              'heading' => __( 'Point Border Width', 'fawzi-core' ),
              'param_name' => 'point_width',
              'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
            ),
            array(
              'type' => 'textfield',
              'value' => '',
              'heading' => __( 'Border Width', 'fawzi-core' ),
              'param_name' => 'border_width',
              'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
            ),
            array(
              'type' => 'textfield',
              'value' => '',
              'heading' => __( 'Point Radius', 'fawzi-core' ),
              'param_name' => 'point_radius',
              'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
            ),
            array(
              'type' => 'textfield',
              'value' => '',
              'heading' => __( 'Point Hover Radius', 'fawzi-core' ),
              'param_name' => 'point_hover_radius',
              'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
            ),
          ),
          'callbacks'  => array(
            'after_add' => 'vcChartParamAfterAddCallback',
          ),
        ),

        // Param Group - Doughnut, PIE, PolarArea
        array(
          'type'       => 'param_group',
          'heading'    => __( 'Values', 'fawzi-core' ),
          'param_name' => 'circle_values',
          'dependency' => array(
            'element' => 'chart_type',
            'value'   => array( 'doughnut', 'pie', 'polarArea' )
          ),
          'value'      => urlencode( json_encode( array(
            array(
              'title' => __( 'Red', 'fawzi-core' ),
              'values' => '300',
              'color' => '#FF6384',
            ),
            array(
              'title' => __( 'Blue', 'fawzi-core' ),
              'values' => '50',
              'color' => '#36A2EB'
            ),
            array(
              'title' => __( 'Yellow', 'fawzi-core' ),
              'values' => '100',
              'color' => '#FFCE56'
            )
          ) ) ),
          'params'     => array(
            array(
              'type'        => 'textfield',
              'heading'     => __( 'Title', 'fawzi-core' ),
              'param_name'  => 'title',
              'description' => __( 'Enter title for chart dataset.', 'fawzi-core' ),
              'admin_label' => true,
            ),
            array(
              'type'       => 'textfield',
              'heading'    => __( 'Value', 'fawzi-core' ),
              'param_name' => 'values',
              'admin_label' => true,
            ),
            array(
              'type'       => 'colorpicker',
              'heading'    => __( 'Color', 'fawzi-core' ),
              'param_name' => 'color'
            )
          ),
          'callbacks'  => array(
            'after_add' => 'vcChartParamAfterAddCallback',
          ),
        ),

        // Custom Class
        FawziLib::vt_class_option(),

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

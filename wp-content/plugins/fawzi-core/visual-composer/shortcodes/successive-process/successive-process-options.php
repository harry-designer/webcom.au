<?php
/**
 * Successive Process - Shortcode Options
 */
add_action( 'init', 'process_vc_map' );
if ( ! function_exists( 'process_vc_map' ) ) {
  function process_vc_map() {
    vc_map( array(
    "name" => __( "Successive Process", 'fawzi-core'),
    "base" => "fawzi_process",
    "description" => __( "Successive Process Style", 'fawzi-core'),
    "icon" => "fa fa-trophy color-blue",
    "category" => FawziLib::fwzi_cat_name(),
    "params" => array(

      array(
        'type' => 'textfield',
        'value' => '',
        'heading' => __( 'Button Text', 'fawzi-core' ),
        'param_name' => 'process_btn_text',
      ), 
      array(
        'type' => 'textfield',
        'value' => '',
        'heading' => __( 'Button Link', 'fawzi-core' ),
        'param_name' => 'process_btn_link',
      ), 

      // List
      array(
        'type' => 'param_group',
        'value' => '',
        'heading' => __( 'Successive Process', 'fawzi-core' ),
        'param_name' => 'success_process',
        // Note params is mapped inside param-group:
        'params' => array(      
          
          array(
            'type' => 'dropdown',
            'heading' => __( 'Process Type', 'fawzi-core' ),
            'value' => array(
              __( 'Select Process Type', 'fawzi-core' ) => '',
              __( 'Big', 'fawzi-core' ) => 'icon-big',
              __( 'Medium', 'fawzi-core' ) => 'icon-medium',
              __( 'Normal', 'fawzi-core' ) => 'icon-normal',
            ),
            'admin_label' => true,
            'param_name' => 'process_type',
            'description' => __( 'Select your Process Type.', 'fawzi-core' ),
            'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
          ),   
          array(
            'type' => 'attach_image',
            'value' => '',
            "admin_label"=> true,
            'heading' => __( 'Upload Image', 'fawzi-core' ),
            'param_name' => 'process_icon',
          ),
          array(
            'type' => 'textfield',
            'value' => '',
            'heading' => __( 'Successive Process Title', 'fawzi-core' ),
            'param_name' => 'process_title',
          ),
          array(
            'type' => 'textfield',
            'value' => '',
            'heading' => __( 'Successive Process Sub Title', 'fawzi-core' ),
            'param_name' => 'process_subtitle',
          ),          
        ),
        
      ),
      fawziLib::vt_class_option(),

      // Style
      array(
        "type"        =>'colorpicker',
        "heading"     =>__('Title Color', 'fawzi-core'),
        "param_name"  => "process_title_color",
        "value"       => "",
        "group"       => __('Style', 'fawzi-core'),
        'edit_field_class'   => 'vc_col-md-4 vc_column vt_field_space',
      ),
      array(
        "type"        =>'colorpicker',
        "heading"     =>__('Sub Title Color', 'fawzi-core'),
        "param_name"  => "process_subtitle_color",
        "value"       => "",
        "group"       => __('Style', 'fawzi-core'),
        'edit_field_class'   => 'vc_col-md-4 vc_column vt_field_space',
      ),
      array(
        "type"        =>'colorpicker',
        "heading"     =>__('Button Text Color', 'fawzi-core'),
        "param_name"  => "process_btn_text_color",
        "value"       => "",
        "group"       => __('Style', 'fawzi-core'),
        'edit_field_class'   => 'vc_col-md-4 vc_column vt_field_space',
      ),
      array(
        "type"        =>'colorpicker',
        "heading"     =>__('Button Text Hover Color', 'fawzi-core'),
        "param_name"  => "process_btn_text_hover_color",
        "value"       => "",
        "group"       => __('Style', 'fawzi-core'),
        'edit_field_class'   => 'vc_col-md-4 vc_column vt_field_space',
      ),
      array(
        "type"        =>'colorpicker',
        "heading"     =>__('Button Text Hover Color', 'fawzi-core'),
        "param_name"  => "process_btn_text_hover_color",
        "value"       => "",
        "group"       => __('Style', 'fawzi-core'),
        'edit_field_class'   => 'vc_col-md-4 vc_column vt_field_space',
      ),
      array(
        "type"        =>'colorpicker',
        "heading"     =>__('Button Background Color', 'fawzi-core'),
        "param_name"  => "process_btn_text_bg_color",
        "value"       => "",
        "group"       => __('Style', 'fawzi-core'),
        'edit_field_class'   => 'vc_col-md-4 vc_column vt_field_space',
      ),
      array(
        "type"        =>'colorpicker',
        "heading"     =>__('Button Background Hover Color', 'fawzi-core'),
        "param_name"  => "process_btn_text_bg_hover_color",
        "value"       => "",
        "group"       => __('Style', 'fawzi-core'),
        'edit_field_class'   => 'vc_col-md-4 vc_column vt_field_space',
      ),
      array(
        "type"        =>'colorpicker',
        "heading"     =>__('Button Border Color', 'fawzi-core'),
        "param_name"  => "process_btn_text_border_color",
        "value"       => "",
        "group"       => __('Style', 'fawzi-core'),
        'edit_field_class'   => 'vc_col-md-4 vc_column vt_field_space',
      ),
      array(
        "type"        =>'colorpicker',
        "heading"     =>__('Button Border Hover Color', 'fawzi-core'),
        "param_name"  => "process_btn_text_border_hover_color",
        "value"       => "",
        "group"       => __('Style', 'fawzi-core'),
        'edit_field_class'   => 'vc_col-md-4 vc_column vt_field_space',
      ),
      // Size
      array(
        "type"        =>'textfield',
        "heading"     =>__('Title Size', 'fawzi-core'),
        "param_name"  => "process_title_size",
        "value"       => "",
        "group"       => __('Size', 'fawzi-core'),
        'edit_field_class'   => 'vc_col-md-4 vc_column vt_field_space',
      ),
      array(
        "type"        =>'textfield',
        "heading"     =>__('Sub Title Size', 'fawzi-core'),
        "param_name"  => "process_subtitle_size",
        "value"       => "",
        "group"       => __('Size', 'fawzi-core'),
        'edit_field_class'   => 'vc_col-md-4 vc_column vt_field_space',
      ),

      ), // Params
    ) );
  }
}
<?php
/**
 * Revenue - Shortcode Options
 */
add_action( 'init', 'fwzi_revenue_vc_map' );
if ( ! function_exists( 'fwzi_revenue_vc_map' ) ) {
  function fwzi_revenue_vc_map() {
    vc_map( array(
      "name" => __( "Revenue", 'fawzi-core'),
      "base" => "fwzi_revenue",
      "description" => __( "Revenue Styles", 'fawzi-core'),
      "icon" => "fa fa-money color-green",
      "category" => FawziLib::fwzi_cat_name(),
      "params" => array(
        
        array(
          "type" => "textarea",
          "heading" => __( "Revenue Title", 'fawzi-core' ),
          "param_name" => "title",
          'value' => '',
          'admin_label' => true,
          "description" => __( "Enter your heading text.", 'fawzi-core'),
        ),
        array(
          "type"      => 'textarea_html',
          "heading"   => __('Content', 'fawzi-core'),
          "param_name" => "content",
          "value"      => "",
          "description" => __( "Enter your revenue content here.", 'fawzi-core')
        ),
        array(
          "type" => "textarea",
          "heading" => __( "Up Score Title", 'fawzi-core' ),
          "param_name" => "upscore_title",
          'value' => '',
          "description" => __( "Enter your up score title.", 'fawzi-core'),
        ),
        array(
          "type" => "textarea",
          "heading" => __( "Down Score Title", 'fawzi-core' ),
          "param_name" => "downscore_title",
          'value' => '',
          "description" => __( "Enter your down score title.", 'fawzi-core'),
        ),
        array(
          "type" => "textfield",
          "heading" => __( "Up Score Number", 'fawzi-core' ),
          "param_name" => "upscore_number",
          'value' => '',
          "description" => __( "Enter your sub heading text.", 'fawzi-core'),
          'edit_field_class'  => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          "type" => "textfield",
          "heading" => __( "Down Score Number", 'fawzi-core' ),
          "param_name" => "downscore_number",
          'value' => '',
          "description" => __( "Enter your sub heading text.", 'fawzi-core'),
          'edit_field_class'  => 'vc_col-md-6 vc_column vt_field_space',
        ),

        FawziLib::vt_class_option(),

        // Styling
        array(
          "type" => "colorpicker",
          "heading" => __( "Title Color", 'fawzi-core' ),
          "param_name" => "title_color",
          'value' => '',
          "group" => __( "Styling", 'fawzi-core'),
          'edit_field_class'  => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          "type" => "colorpicker",
          "heading" => __( "Content Color", 'fawzi-core' ),
          "param_name" => "content_color",
          'value' => '',
          "group" => __( "Styling", 'fawzi-core'),
          'edit_field_class'  => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          "type" => "colorpicker",
          "heading" => __( "Up Score Title Color", 'fawzi-core' ),
          "param_name" => "upscore_title_color",
          'value' => '',
          "group" => __( "Styling", 'fawzi-core'),
          'edit_field_class'  => 'vc_col-md-6 vc_column vt_field_space', 
        ),
        array(
          "type" => "colorpicker",
          "heading" => __( "Down Score Title Color", 'fawzi-core' ),
          "param_name" => "downscore_title_color",
          'value' => '',
          "group" => __( "Styling", 'fawzi-core'),
          'edit_field_class'  => 'vc_col-md-6 vc_column vt_field_space', 
        ),
        array(
          "type" => "colorpicker",
          "heading" => __( "Up Score Number Color", 'fawzi-core' ),
          "param_name" => "upscore_number_color",
          'value' => '',
          "group" => __( "Styling", 'fawzi-core'),
          'edit_field_class'  => 'vc_col-md-6 vc_column vt_field_space', 
        ),
        array(
          "type" => "colorpicker",
          "heading" => __( "Down Score Number Color", 'fawzi-core' ),
          "param_name" => "downscore_number_color",
          'value' => '',
          "group" => __( "Styling", 'fawzi-core'),
          'edit_field_class'  => 'vc_col-md-6 vc_column vt_field_space', 
        ),
        
        // Design Tab
        array(
          "type" => "textfield",
          "heading" => __( "Title Size", 'fawzi-core' ),
          "param_name" => "title_size",
          "group" => __( "Design", 'fawzi-core'),
          'edit_field_class'  => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          "type" => "textfield",
          "heading" => __( "Content Size", 'fawzi-core' ),
          "param_name" => "content_size",
          "group" => __( "Design", 'fawzi-core'),
          'edit_field_class'  => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          "type" => "textfield",
          "heading" => __( "Up Score Title Size", 'fawzi-core' ),
          "param_name" => "upscore_title_size",
          "group" => __( "Design", 'fawzi-core'),
          'edit_field_class'  => 'vc_col-md-6 vc_column vt_field_space', 
        ),
        array(
          "type" => "textfield",
          "heading" => __( "Down Score Title Size", 'fawzi-core' ),
          "param_name" => "downscore_title_size",
          "group" => __( "Design", 'fawzi-core'),
          'edit_field_class'  => 'vc_col-md-6 vc_column vt_field_space', 
        ),
        array(
          "type" => "textfield",
          "heading" => __( "Up Score Number Size", 'fawzi-core' ),
          "param_name" => "upscore_number_size",
          "group" => __( "Design", 'fawzi-core'),
          'edit_field_class'  => 'vc_col-md-4 vc_column vt_field_space', 
        ),
        array(
          "type" => "textfield",
          "heading" => __( "Down Score Number Size", 'fawzi-core' ),
          "param_name" => "downscore_number_size",
          "group" => __( "Design", 'fawzi-core'),
          'edit_field_class'  => 'vc_col-md-4 vc_column vt_field_space', 
        ),
        array(
          "type" => "textfield",
          "heading" => __( "Numbers Line Height", 'fawzi-core' ),
          "param_name" => "score_numbers_lineheight",
          "group" => __( "Design", 'fawzi-core'),
          'edit_field_class'  => 'vc_col-md-4 vc_column vt_field_space', 
        ),
      )
    ) );
  }
}

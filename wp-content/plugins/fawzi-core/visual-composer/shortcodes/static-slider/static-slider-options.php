<?php
/**
 * Static Slider - Shortcode Options
 */
add_action( 'init', 'fawzi_static_slider_vc_map' );
if ( ! function_exists( 'fawzi_static_slider_vc_map' ) ) {
  function fawzi_static_slider_vc_map() {
    vc_map( array(
      "name" => __( "Static Slider", 'fawzi-core'),
      "base" => "fawzi_static_slider",
      "description" => __( "Static Slider Styles", 'fawzi-core'),
      "icon" => "fa fa-sliders color-orange",
      "category" => FawziLib::fwzi_cat_name(),
      "params" => array(

        array(
          "type"      => 'textarea_html',
          "heading"   => __('Content', 'fawzi-core'),
          "param_name" => "content",
          "description" => __( "Enter your slider content here.", 'fawzi-core')
        ),
        array(
          'type' => 'attach_image',
          'value' => '',
          "admin_label"=> true,
          'heading' => __( 'Upload Image', 'fawzi-core' ),
          'param_name' => 'slider_image',
          'edit_field_class'  => 'vc_col-md-6 vc_column vt_field_space',
        ),  
        array(
          "type" => "switcher",
          "heading" => __( "Toggle Alignment?", 'fawzi-core' ),
          "param_name" => "alignment",
          "std" => false,
          'value' => '',
          "on_text" => __( "Yes", 'fawzi-core' ),
          "off_text" => __( "No", 'fawzi-core' ),
          'edit_field_class'  => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          "type"      => 'textfield',
          "heading"   => __('Content Section Width', 'fawzi-core'),
          "param_name" => "content_width",
          "value"      => "",
          "description" => __( "Enter your custom width in % for content section.", 'fawzi-core'),
          'edit_field_class'  => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          "type"      => 'textfield',
          "heading"   => __('Image Section Width', 'fawzi-core'),
          "param_name" => "image_width",
          "value"      => "",
          "description" => __( "Enter your custom width in % for image section.", 'fawzi-core'),
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
          "heading" => __( "Text Color", 'fawzi-core' ),
          "param_name" => "text_color",
          'value' => '',
          "group" => __( "Styling", 'fawzi-core'),
          'edit_field_class'  => 'vc_col-md-6 vc_column vt_field_space',
        ),              

        // Design Tab
        array(
          "type" => "textfield",
          "heading" => __( "Title Size", 'fawzi-core' ),
          "param_name" => "title_size",
          'value' => '',
          "description" => __( "Enter button text font size.", 'fawzi-core'),
          "group" => __( "Design", 'fawzi-core'),
        ),
        array(
          "type" => "textfield",
          "heading" => __( "Text Size", 'fawzi-core' ),
          "param_name" => "text_size",
          'value' => '',
          "description" => __( "Enter text font size.", 'fawzi-core'),
          "group" => __( "Design", 'fawzi-core'),
        ),

      )
    ) );
  }
}

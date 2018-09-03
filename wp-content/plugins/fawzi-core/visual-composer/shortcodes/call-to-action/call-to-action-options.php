<?php
/**
 * Call To Action - Shortcode Options
 */
add_action( 'init', 'fwzi_cta_vc_map' );
if ( ! function_exists( 'fwzi_cta_vc_map' ) ) {
  function fwzi_cta_vc_map() {
    vc_map( array(
      "name" => __( "Call To Action", 'fawzi-core'),
      "base" => "fwzi_cta",
      "description" => __( "Call To Action", 'fawzi-core'),
      "icon" => "fa fa-bullhorn color-brown",
      "category" => FawziLib::fwzi_cat_name(),
      "params" => array(
        
        array(
          'type' => 'dropdown',
          'heading' => __( 'Callout Style', 'fawzi-core' ),
          'value' => array(
            __( 'Style One', 'fawzi-core' ) => 'fwzi-cta-one',
            __( 'Style Two (Parllex)', 'fawzi-core' ) => 'fwzi-cta-two',
          ),
          'admin_label' => true,
          'param_name' => 'callout_style',
          'description' => __( 'Select your list style.', 'fawzi-core' ),
        ),
        array(
          "type" => "textfield",
          "heading" => __( "Title", 'fawzi-core' ),
          "param_name" => "title",
          'value' => '',
          'admin_label' => true,
          "description" => __( "Enter your heading text.", 'fawzi-core'),
        ),
        array(
          "type" => "textfield",
          "heading" => __( "Sub Title", 'fawzi-core' ),
          "param_name" => "sub_title",
          'value' => '',
          'admin_label' => true,
          "description" => __( "Enter your sub heading text.", 'fawzi-core'),
          'dependency' => array(
                'element' => 'callout_style',
                'value' => 'fwzi-cta-two',
              ),
        ),
        array(
          "type" => "textfield",
          "heading" => __( "Button Text", 'fawzi-core' ),
          "param_name" => "btn_text",
          'value' => '',
          'admin_label' => true,
          "description" => __( "Enter your button text.", 'fawzi-core'),
          'edit_field_class'  => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          "type" => "textfield",
          "heading" => __( "Button Link", 'fawzi-core' ),
          "param_name" => "btn_link",
          'value' => '',
          'admin_label' => true,
          "description" => __( "Enter your button link.", 'fawzi-core'),
          'edit_field_class'  => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          "type" => "textfield",
          "heading" => __( "Button Text", 'fawzi-core' ),
          "param_name" => "btn_two_text",
          'value' => '',
          'admin_label' => true,
          "description" => __( "Enter your button text.", 'fawzi-core'),
          'edit_field_class'  => 'vc_col-md-6 vc_column vt_field_space',
          'dependency' => array(
                'element' => 'callout_style',
                'value' => 'fwzi-cta-two',
              ),
        ),
        array(
          "type" => "textfield",
          "heading" => __( "Button Link", 'fawzi-core' ),
          "param_name" => "btn_two_link",
          'value' => '',
          'admin_label' => true,
          "description" => __( "Enter your button link.", 'fawzi-core'),
          'edit_field_class'  => 'vc_col-md-6 vc_column vt_field_space',
          'dependency' => array(
                'element' => 'callout_style',
                'value' => 'fwzi-cta-two',
              ),
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
          "heading" => __( "Sub Title Color", 'fawzi-core' ),
          "param_name" => "sub_title_color",
          'value' => '',
          "group" => __( "Styling", 'fawzi-core'),
          'edit_field_class'  => 'vc_col-md-6 vc_column vt_field_space',
          'dependency' => array(
                'element' => 'callout_style',
                'value' => 'fwzi-cta-two',
              ),
        ),
        array(
          "type" => "colorpicker",
          "heading" => __( "Button Text Color", 'fawzi-core' ),
          "param_name" => "btn_text_color",
          'value' => '',
          "group" => __( "Styling", 'fawzi-core'),
          'edit_field_class'  => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          "type" => "colorpicker",
          "heading" => __( "Button Text Hover Color", 'fawzi-core' ),
          "param_name" => "btn_text_hover_color",
          'value' => '',
          "group" => __( "Styling", 'fawzi-core'),
          'edit_field_class'  => 'vc_col-md-6 vc_column vt_field_space', 
        ),
        array(
          "type" => "colorpicker",
          "heading" => __( "Button Background Color", 'fawzi-core' ),
          "param_name" => "btn_bg_color",
          'value' => '',
          "group" => __( "Styling", 'fawzi-core'),
          'edit_field_class'  => 'vc_col-md-6 vc_column vt_field_space', 
        ),
        array(
          "type" => "colorpicker",
          "heading" => __( "Button Background Hover Color", 'fawzi-core' ),
          "param_name" => "btn_bg_hover_color",
          'value' => '',
          "group" => __( "Styling", 'fawzi-core'),
          'edit_field_class'  => 'vc_col-md-6 vc_column vt_field_space', 
        ),
        array(
          "type" => "colorpicker",
          "heading" => __( "Button Border Color", 'fawzi-core' ),
          "param_name" => "btn_border_color",
          'value' => '',
          "group" => __( "Styling", 'fawzi-core'),
          'edit_field_class'  => 'vc_col-md-6 vc_column vt_field_space', 
        ),
        array(
          "type" => "colorpicker",
          "heading" => __( "Button Border Hover Color", 'fawzi-core' ),
          "param_name" => "btn_border_hover_color",
          'value' => '',
          "group" => __( "Styling", 'fawzi-core'),
          'edit_field_class'  => 'vc_col-md-6 vc_column vt_field_space', 
        ),

        array(
          "type" => "colorpicker",
          "heading" => __( "Button Two Text Color", 'fawzi-core' ),
          "param_name" => "btn_two_text_color",
          'value' => '',
          "group" => __( "Styling", 'fawzi-core'),
          'edit_field_class'  => 'vc_col-md-6 vc_column vt_field_space',
          'dependency' => array(
                'element' => 'callout_style',
                'value' => 'fwzi-cta-two',
              ),
        ),
        array(
          "type" => "colorpicker",
          "heading" => __( "Button Two Text Hover Color", 'fawzi-core' ),
          "param_name" => "btn_two_text_hover_color",
          'value' => '',
          "group" => __( "Styling", 'fawzi-core'),
          'edit_field_class'  => 'vc_col-md-6 vc_column vt_field_space', 
          'dependency' => array(
                'element' => 'callout_style',
                'value' => 'fwzi-cta-two',
              ),
        ),
        array(
          "type" => "colorpicker",
          "heading" => __( "Button Two Background Color", 'fawzi-core' ),
          "param_name" => "btn_two_bg_color",
          'value' => '',
          "group" => __( "Styling", 'fawzi-core'),
          'edit_field_class'  => 'vc_col-md-6 vc_column vt_field_space', 
          'dependency' => array(
                'element' => 'callout_style',
                'value' => 'fwzi-cta-two',
              ),
        ),
        array(
          "type" => "colorpicker",
          "heading" => __( "Button Two Background Hover Color", 'fawzi-core' ),
          "param_name" => "btn_two_bg_hover_color",
          'value' => '',
          "group" => __( "Styling", 'fawzi-core'),
          'edit_field_class'  => 'vc_col-md-6 vc_column vt_field_space', 
          'dependency' => array(
                'element' => 'callout_style',
                'value' => 'fwzi-cta-two',
              ),
        ),
        array(
          "type" => "colorpicker",
          "heading" => __( "Button Two Border Color", 'fawzi-core' ),
          "param_name" => "btn_two_border_color",
          'value' => '',
          "group" => __( "Styling", 'fawzi-core'),
          'edit_field_class'  => 'vc_col-md-6 vc_column vt_field_space', 
          'dependency' => array(
                'element' => 'callout_style',
                'value' => 'fwzi-cta-two',
              ),
        ),
        array(
          "type" => "colorpicker",
          "heading" => __( "Button Two Border Hover Color", 'fawzi-core' ),
          "param_name" => "btn_two_border_hover_color",
          'value' => '',
          "group" => __( "Styling", 'fawzi-core'),
          'edit_field_class'  => 'vc_col-md-6 vc_column vt_field_space', 
          'dependency' => array(
                'element' => 'callout_style',
                'value' => 'fwzi-cta-two',
              ),
        ),
        
        // Design Tab
        array(
          "type" => "textfield",
          "heading" => __( "Button Minimum Width", 'fawzi-core' ),
          "param_name" => "btn_min_width",
          "group" => __( "Design", 'fawzi-core'),
          'edit_field_class'  => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          "type" => "textfield",
          "heading" => __( "Title Size", 'fawzi-core' ),
          "param_name" => "title_size",
          "group" => __( "Design", 'fawzi-core'),
          'edit_field_class'  => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          "type" => "textfield",
          "heading" => __( "Sub Title Size", 'fawzi-core' ),
          "param_name" => "sub_title_size",
          "group" => __( "Design", 'fawzi-core'),
          'edit_field_class'  => 'vc_col-md-6 vc_column vt_field_space',
          'dependency' => array(
                'element' => 'callout_style',
                'value' => 'fwzi-cta-two',
              ),
        ),
        array(
          "type" => "textfield",
          "heading" => __( "Button Text Size", 'fawzi-core' ),
          "param_name" => "btn_text_size",
          "group" => __( "Design", 'fawzi-core'),
          'edit_field_class'  => 'vc_col-md-6 vc_column vt_field_space',
        ),
      )
    ) );
  }
}

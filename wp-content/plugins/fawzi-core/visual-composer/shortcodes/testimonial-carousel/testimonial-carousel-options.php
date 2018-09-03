<?php
/**
 * Testimonial Carousel - Shortcode Options
 */
add_action( 'init', 'testimonial_carousel_vc_map' );
if ( ! function_exists( 'testimonial_carousel_vc_map' ) ) {
  function testimonial_carousel_vc_map() {
    vc_map( array(
    "name" => __( "Testimonial Carousel", 'fawzi-core'),
    "base" => "fwzi_testimonial_carousel",
    "description" => __( "Carousel Style Testimonial", 'fawzi-core'),
    "icon" => "fa fa-comments color-green",
    "category" => FawziLib::fwzi_cat_name(),
    "params" => array(

      array(
        "type" => "dropdown",
        "heading" => __( "Testimonial Style", 'fawzi-core' ),
        "param_name" => "testimonial_style",
        "value" => array(
          __('Style One', 'fawzi-core') => 'testimonial_one',
          __('Style Two', 'fawzi-core') => 'testimonial_two',
          __('Style Three', 'fawzi-core') => 'testimonial_three',
          __('Style Four', 'fawzi-core') => 'testimonial_four',
          __('Style Five', 'fawzi-core') => 'testimonial_five',
        ),
        "admin_label" => true,
        "description" => __( "Select testimonial carousel style.", 'fawzi-core'),
      ),

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
        "param_name"  => "testimonial_limit",
        "value"       => "",
        'admin_label' => true,
        "description" => __( "Enter the number of items to show.", 'fawzi-core'),
      ),
      array(
        'type' => 'dropdown',
        'heading' => __( 'Order', 'fawzi-core' ),
        'value' => array(
          __( 'Select Testimonial Order', 'fawzi-core' ) => '',
          __('Asending', 'fawzi-core') => 'ASC',
          __('Desending', 'fawzi-core') => 'DESC',
        ),
        'param_name' => 'testimonial_order',
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
        'param_name' => 'testimonial_orderby',
        'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
      ),
      array(
        "type"        =>'textfield',
        "heading"     =>__('ID', 'fawzi-core'),
        "param_name"  => "testimonial_id",
        "value"       => "",
        "description" => __( "Enter the id's (comma separated) of items to show.", 'fawzi-core'),
      ),
      FawziLib::vt_class_option(),

      // Carousel
      array(
        "type"        => "notice",
        "heading"     => __( "Basic Options", 'fawzi-core' ),
        "param_name"  => 'bsic_opt',
        "group" => __( "Carousel", 'fawzi-core' ),
        'class'       => 'cs-warning',
        'dependency' => array(
            'element' => 'testimonial_style',
            'value' => array('testimonial_two','testimonial_three','testimonial_four','testimonial_five'),
          ),
        'value'       => '',
      ),

      array(
        "type" => "switcher",
        "heading" => __( "Disable Loop?", 'fawzi-core' ),
        "group" => __( "Carousel", 'fawzi-core' ),
        "param_name" => "carousel_loop",
        "on_text" => __( "Yes", 'fawzi-core' ),
        "off_text" => __( "No", 'fawzi-core' ),
        "value" => '',
        'dependency' => array(
            'element' => 'testimonial_style',
            'value' => array('testimonial_two','testimonial_three','testimonial_four','testimonial_five'),
          ),
        "description" => __( "Continuously moving carousel, if enabled.", 'fawzi-core')
      ),
      array(
        "type" => "textfield",
        "heading" => __( "Items", 'fawzi-core' ),
        "group" => __( "Carousel", 'fawzi-core' ),
        "param_name" => "carousel_items",
        'value' => '',
        'dependency' => array(
            'element' => 'testimonial_style',
            'value' => array('testimonial_two','testimonial_three','testimonial_four','testimonial_five'),
          ),
        'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        "description" => __( "Enter the numeric value of how many items you want in per slide.", 'fawzi-core')
      ),
      array(
        "type" => "textfield",
        "heading" => __( "Margin", 'fawzi-core' ),
        "group" => __( "Carousel", 'fawzi-core' ),
        "param_name" => "carousel_margin",
        'value' => '',
        'dependency' => array(
            'element' => 'testimonial_style',
            'value' => array('testimonial_two','testimonial_three','testimonial_four','testimonial_five'),
          ),
        'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        "description" => __( "Enter the numeric value of how much space you want between each carousel item.", 'fawzi-core')
      ),
      array(
        "type" => "switcher",
        "heading" => __( "Dots", 'fawzi-core' ),
        "group" => __( "Carousel", 'fawzi-core' ),
        "param_name" => "carousel_dots",
        "on_text" => __( "Yes", 'fawzi-core' ),
        "off_text" => __( "No", 'fawzi-core' ),
        "value" => '',
        'dependency' => array(
            'element' => 'testimonial_style',
            'value' => array('testimonial_two','testimonial_three','testimonial_four','testimonial_five'),
          ),
        'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        "description" => __( "If you want Carousel Dots, enable it.", 'fawzi-core')
      ),
      array(
        "type" => "switcher",
        "heading" => __( "Navigation", 'fawzi-core' ),
        "group" => __( "Carousel", 'fawzi-core' ),
        "param_name" => "carousel_nav",
        "on_text" => __( "Yes", 'fawzi-core' ),
        "off_text" => __( "No", 'fawzi-core' ),
        "value" => '',
        'dependency' => array(
            'element' => 'testimonial_style',
            'value' => array('testimonial_two','testimonial_three','testimonial_four','testimonial_five'),
          ),
        'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        "description" => __( "If you want Carousel Navigation, enable it.", 'fawzi-core')
      ),

      array(
        "type"        => "notice",
        "heading"     => __( "Auto Play & Interaction", 'fawzi-core' ),
        "param_name"  => 'apyi_opt',
        "group" => __( "Carousel", 'fawzi-core' ),
        'class'       => 'cs-warning',
        'dependency' => array(
            'element' => 'testimonial_style',
            'value' => array('testimonial_two','testimonial_three','testimonial_four','testimonial_five'),
          ),
        'value'       => '',
      ),
      array(
        "type" => "textfield",
        "heading" => __( "Autoplay Timeout", 'fawzi-core' ),
        "group" => __( "Carousel", 'fawzi-core' ),
        "param_name" => "carousel_autoplay_timeout",
        'value' => '',
        'dependency' => array(
            'element' => 'testimonial_style',
            'value' => array('testimonial_two','testimonial_three','testimonial_four','testimonial_five'),
          ),
        "description" => __( "Change carousel Autoplay timing value. Default : 5000. Means 5 seconds.", 'fawzi-core')
      ),
      array(
        "type" => "switcher",
        "heading" => __( "Autoplay", 'fawzi-core' ),
        "group" => __( "Carousel", 'fawzi-core' ),
        "param_name" => "carousel_autoplay",
        "on_text" => __( "Yes", 'fawzi-core' ),
        "off_text" => __( "No", 'fawzi-core' ),
        "value" => '',
        'dependency' => array(
            'element' => 'testimonial_style',
            'value' => array('testimonial_two','testimonial_three','testimonial_four','testimonial_five'),
          ),
        'edit_field_class'   => 'vc_col-md-4 vc_column vt_field_space',
        "description" => __( "If you want to start Carousel automatically, enable it.", 'fawzi-core')
      ),
      array(
        "type" => "switcher",
        "heading" => __( "Animate Out", 'fawzi-core' ),
        "group" => __( "Carousel", 'fawzi-core' ),
        "param_name" => "carousel_animate_out",
        "on_text" => __( "Yes", 'fawzi-core' ),
        "off_text" => __( "No", 'fawzi-core' ),
        "value" => '',
        'dependency' => array(
            'element' => 'testimonial_style',
            'value' => array('testimonial_two','testimonial_three','testimonial_four','testimonial_five'),
          ),
        'edit_field_class'   => 'vc_col-md-4 vc_column vt_field_space',
        "description" => __( "CSS3 animation out.", 'fawzi-core')
      ),
      array(
        "type" => "switcher",
        "heading" => __( "Disable Mouse Drag?", 'fawzi-core' ),
        "group" => __( "Carousel", 'fawzi-core' ),
        "param_name" => "carousel_mousedrag",
        "on_text" => __( "Yes", 'fawzi-core' ),
        "off_text" => __( "No", 'fawzi-core' ),
        "value" => '',
        'dependency' => array(
              'element' => 'testimonial_style',
              'value' => array('testimonial_two','testimonial_three','testimonial_four','testimonial_five'),
            ),
        'edit_field_class'   => 'vc_col-md-4 vc_column vt_field_space',
        "description" => __( "If you want to disable Mouse Drag, check it.", 'fawzi-core')
      ),

      array(
        "type"        => "notice",
        "heading"     => __( "Width & Height", 'fawzi-core' ),
        "param_name"  => 'wah_opt',
        "group" => __( "Carousel", 'fawzi-core' ),
        'class'       => 'cs-warning',
        'dependency' => array(
            'element' => 'testimonial_style',
            'value' => array('testimonial_two','testimonial_three','testimonial_four','testimonial_five'),
          ),
        'value'       => '',
      ),

      array(
        "type" => "switcher",
        "heading" => __( "Auto Width", 'fawzi-core' ),
        "group" => __( "Carousel", 'fawzi-core' ),
        "param_name" => "carousel_autowidth",
        "on_text" => __( "Yes", 'fawzi-core' ),
        "off_text" => __( "No", 'fawzi-core' ),
        "value" => '',
        'dependency' => array(
            'element' => 'testimonial_style',
            'value' => array('testimonial_two','testimonial_three','testimonial_four','testimonial_five'),
          ),
        'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        "description" => __( "Adjust Auto Width automatically for each carousel items.", 'fawzi-core')
      ),
      array(
        "type" => "switcher",
        "heading" => __( "Auto Height", 'fawzi-core' ),
        "group" => __( "Carousel", 'fawzi-core' ),
        "param_name" => "carousel_autoheight",
        "on_text" => __( "Yes", 'fawzi-core' ),
        "off_text" => __( "No", 'fawzi-core' ),
        "value" => '',
        'dependency' => array(
            'element' => 'testimonial_style',
            'value' => array('testimonial_two','testimonial_three','testimonial_four','testimonial_five'),
          ),
        'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        "description" => __( "Adjust Auto Height automatically for each carousel items.", 'fawzi-core')
      ),

      array(
        "type"        => "notice",
        "heading"     => __( "Responsive Options", 'fawzi-core' ),
        "param_name"  => 'res_opt',
        "group" => __( "Carousel", 'fawzi-core' ),
        'class'       => 'cs-warning',
        'dependency' => array(
            'element' => 'testimonial_style',
            'value' => array('testimonial_two','testimonial_three','testimonial_four','testimonial_five'),
          ),
        'value'       => '',
      ),

      array(
        "type" => "textfield",
        "heading" => __( "Tablet", 'fawzi-core' ),
        "group" => __( "Carousel", 'fawzi-core' ),
        "param_name" => "carousel_tablet",
        'value' => '',
        'dependency' => array(
            'element' => 'testimonial_style',
            'value' => array('testimonial_two','testimonial_three','testimonial_four','testimonial_five'),
          ),
        'edit_field_class'   => 'vc_col-md-4 vc_column vt_field_space',
        "description" => __( "Enter number of items to show in tablet.", 'fawzi-core')
      ),
      array(
        "type" => "textfield",
        "heading" => __( "Mobile", 'fawzi-core' ),
        "group" => __( "Carousel", 'fawzi-core' ),
        "param_name" => "carousel_mobile",
        'value' => '',
        'dependency' => array(
            'element' => 'testimonial_style',
            'value' => array('testimonial_two','testimonial_three','testimonial_four','testimonial_five'),
          ),
        'edit_field_class'   => 'vc_col-md-4 vc_column vt_field_space',
        "description" => __( "Enter number of items to show in mobile.", 'fawzi-core')
      ),
      array(
        "type" => "textfield",
        "heading" => __( "Small Mobile", 'fawzi-core' ),
        "group" => __( "Carousel", 'fawzi-core' ),
        "param_name" => "carousel_small_mobile",
        'value' => '',
        'dependency' => array(
            'element' => 'testimonial_style',
            'value' => array('testimonial_two','testimonial_three','testimonial_four','testimonial_five'),
          ),
        'edit_field_class'   => 'vc_col-md-4 vc_column vt_field_space',
        "description" => __( "Enter number of items to show in small mobile.", 'fawzi-core')
      ),

      // Style
      array(
        "type"        =>'colorpicker',
        "heading"     =>__('Title Color', 'fawzi-core'),
        "param_name"  => "title_color",
        "value"       => "",
        'dependency' => array(
            'element' => 'testimonial_style',
            'value' => array('testimonial_one'),
          ),
        "group"       => __('Style', 'fawzi-core'),
        'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
      ),
      array(
        "type"        =>'colorpicker',
        "heading"     =>__('Content Color', 'fawzi-core'),
        "param_name"  => "content_color",
        "value"       => "",
        "group"       => __('Style', 'fawzi-core'),
        'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
      ),
      array(
        "type"        =>'colorpicker',
        "heading"     =>__('Name Color', 'fawzi-core'),
        "param_name"  => "name_color",
        "value"       => "",
        "group"       => __('Style', 'fawzi-core'),
        'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
      ),
      array(
        "type"        =>'colorpicker',
        "heading"     =>__('Name Hover Color', 'fawzi-core'),
        "param_name"  => "name_hover_color",
        "value"       => "",
        "group"       => __('Style', 'fawzi-core'),
        'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
      ),
      array(
        "type"        =>'colorpicker',
        "heading"     =>__('Profession Color', 'fawzi-core'),
        "param_name"  => "profession_color",
        "value"       => "",
        "group"       => __('Style', 'fawzi-core'),
        'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
      ),
      array(
        "type"        =>'colorpicker',
        "heading"     =>__('Profession Hover Color', 'fawzi-core'),
        "param_name"  => "pro_hover_color",
        "value"       => "",
        "group"       => __('Style', 'fawzi-core'),
        'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
      ),
      // Size
      array(
        "type"        =>'textfield',
        "heading"     =>__('Title Size', 'fawzi-core'),
        "param_name"  => "title_size",
        "value"       => "",
        'dependency' => array(
            'element' => 'testimonial_style',
            'value' => array('testimonial_one'),
          ),
        "group"       => __('Style', 'fawzi-core'),
        'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
      ),
      array(
        "type"        =>'textfield',
        "heading"     =>__('Content Size', 'fawzi-core'),
        "param_name"  => "content_size",
        "value"       => "",
        "group"       => __('Style', 'fawzi-core'),
        'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
      ),
      array(
        "type"        =>'textfield',
        "heading"     =>__('Name Size', 'fawzi-core'),
        "param_name"  => "name_size",
        "value"       => "",
        "group"       => __('Style', 'fawzi-core'),
        'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
      ),
      array(
        "type"        =>'textfield',
        "heading"     =>__('Profession Size', 'fawzi-core'),
        "param_name"  => "profession_size",
        "value"       => "",
        "group"       => __('Style', 'fawzi-core'),
        'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
      ),

      ), // Params
    ) );
  }
}
<?php
/**
 * Blog - Shortcode Options
 */
add_action( 'init', 'fwzi_blog_vc_map' );
if ( ! function_exists( 'fwzi_blog_vc_map' ) ) {
  function fwzi_blog_vc_map() {
    vc_map( array(
      "name" => __( "Blog", 'fawzi-core'),
      "base" => "fwzi_blog",
      "description" => __( "Blog Styles", 'fawzi-core'),
      "icon" => "fa fa-newspaper-o color-red",
      "category" => FawziLib::fwzi_cat_name(),
      "params" => array(

        array(
          'type' => 'dropdown',
          'heading' => __( 'Blog Style', 'fawzi-core' ),
          'value' => array(
            __( 'Style One', 'fawzi-core' ) => 'fwzi-blog-one',
            __( 'Style Two', 'fawzi-core' ) => 'fwzi-blog-two',
          ),
          'admin_label' => true,
          'param_name' => 'blog_style',
          'description' => __( 'Select your blog style.', 'fawzi-core' ),
        ),        
        array(
          "type"        =>'textfield',
          "heading"     =>__('Limit', 'fawzi-core'),
          "param_name"  => "blog_limit",
          "value"       => "",
          'admin_label' => true,
          "description" => __( "Enter the number of items to show.", 'fawzi-core'),
        ),        

        array(
    			"type"        => "notice",
    			"heading"     => __( "Listing", 'fawzi-core' ),
    			"param_name"  => 'lsng_opt',
    			'class'       => 'cs-warning',
    			'value'       => '',
    		),
        array(
          'type' => 'dropdown',
          'heading' => __( 'Order', 'fawzi-core' ),
          'value' => array(
            __( 'Select Blog Order', 'fawzi-core' ) => '',
            __('Asending', 'fawzi-core') => 'ASC',
            __('Desending', 'fawzi-core') => 'DESC',
          ),
          'param_name' => 'blog_order',
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
          'param_name' => 'blog_orderby',
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          "type"        => 'textfield',
          "heading"     => __('Show only certain categories?', 'fawzi-core'),
          "param_name"  => "blog_show_category",
          "value"       => "",
          "description" => __( "Enter category SLUGS (comma separated) you want to display.", 'fawzi-core')
        ),
        array(
          "type"        =>'switcher',
          "heading"     =>__('Pagination', 'fawzi-core'),
          "param_name"  => "blog_pagination",
          "value"       => "",
          "std"         => true,
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          "type"        =>'textfield',
          "heading"     =>__('Miss-Aligned? Mention Minimum Height :', 'fawzi-core'),
          "param_name"  => "miss_align_height",
          "value"       => "",
          "description" => __( "Enter the px value for minimum height. This will fix miss-aligned issue with your listing items.", 'fawzi-core')
        ),
        FawziLib::vt_class_option(),

      )
    ) );
  }
}

<?php
/**
 * Difference Image - Shortcode Options 
 */
add_action( 'init', 'difference_img_vc_map' );
if ( ! function_exists( 'difference_img_vc_map' ) ) {
  function difference_img_vc_map() {
    vc_map( array(
      "name" => __( "Fawzi Image", 'fawzi-core'),
      "base" => "difference_img",
      "description" => __( "Difference Image", 'fawzi-core'),
      "icon" => "fa fa-picture-o color-blue",
      "category" => FawziLib::fwzi_cat_name(),
      "params" => array(        

        array(
          "type"      => 'attach_image',
          "heading"   => __('Upload Right Side image', 'fawzi-core'),
          "param_name" => "difference_image",
          "value"      => "",
          "description" => __( "Set Your Right Side image.", 'fawzi-core'),
        ),
        FawziLib::vt_class_option(),    

      )
    ) );
  }
}

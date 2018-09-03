<?php
/**
 * Contact - Shortcode Options
 */
add_action( 'init', 'contact_vc_map' );
if ( ! function_exists( 'contact_vc_map' ) ) {
  function contact_vc_map() {

    $cf7 = get_posts( 'post_type="wpcf7_contact_form"&numberposts=-1' );
    $contact_forms = array();
    if ( $cf7 ) {
      foreach ( $cf7 as $cform ) {
        $contact_forms[ $cform->post_title ] = $cform->ID;
      }
    } else {
      $contact_forms[ __( 'No contact forms found', 'js_composer' ) ] = 0;
    }

    vc_map( array(
    "name" => __( "Fawzi : Contact Form 7", 'fawzi-core'),
    "base" => "fwzi_contact",
    "description" => __( "Contact Form 7 Style", 'fawzi-core'),
    "icon" => "icon-wpb-contactform7",
    "category" => FawziLib::fwzi_cat_name(),
    "params" => array(

      array(
        'type' => 'dropdown',
        'heading' => __( 'Select contact form', 'js_composer' ),
        'param_name' => 'id',
        'value' => $contact_forms,
        'save_always' => true,
        'admin_label' => true,
        'description' => __( 'Choose previously created contact form from the drop down list.', 'js_composer' ),
      ),
      array(
        'type' => 'dropdown',
        'value' => array(
          __( 'No Styles', 'fawzi-core' ) => '',
          __( 'Style One', 'fawzi-core' ) => 'contact-box-one',
          __( 'Style Two', 'fawzi-core' ) => 'contact-box-two',
        ),
        'admin_label' => true,
        'heading' => __( 'Contact Form Box Style', 'fawzi-core' ),
        'param_name' => 'box_style',
        'description' => __( 'Select from box style.', 'fawzi-core' ),
      ),
      array(
        'type' => 'textfield',
        'value' => '',
        'heading' => __( 'Title', 'fawzi-core' ),
        'description' => __( 'Enter Form title for your contact form.', 'fawzi-core' ),
        'param_name' => 'form_title',
      ),
      FawziLib::vt_class_option(),

      array(
        'type' => 'textfield',
        'value' => '',
        'heading' => __( 'Button Text Size', 'fawzi-core' ),
        'description' => __( 'Enter text size for submit button.', 'fawzi-core' ),
        'group' => __( 'Style', 'fawzi-core' ),
        'param_name' => 'submit_size',
      ),
      array(
        'type' => 'colorpicker',
        'value' => '',
        'heading' => __( 'Button Text Color', 'fawzi-core' ),
        'description' => __( 'Pick text color for submit button.', 'fawzi-core' ),
        'group' => __( 'Style', 'fawzi-core' ),
        'param_name' => 'submit_color',
      ),
      array(
        'type' => 'colorpicker',
        'value' => '',
        'heading' => __( 'Button BG Color', 'fawzi-core' ),
        'description' => __( 'Pick button background color.', 'fawzi-core' ),
        'group' => __( 'Style', 'fawzi-core' ),
        'param_name' => 'submit_bg_color',
      ),

      ), // Params
    ) );
  }
}
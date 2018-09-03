<?php
/*
 * All customizer related options for Fawzi theme.
 * Author & Copyright: VictorThemes
 * URL: http://themeforest.net/user/VictorThemes
 */

if( ! function_exists( 'fawzi_vt_customizer' ) ) {
  function fawzi_vt_customizer( $options ) {

	$options        = array(); // remove old options

	// Primary Color
	$options[]      = array(
	  'name'        => 'elemets_color_section',
	  'title'       => esc_html__('Primary Color', 'fawzi'),
	  'settings'    => array(

	    // Fields Start
			array(
				'name'      => 'all_element_colors',
				'default'   => '#518ff5',
				'control'   => array(
					'type'  => 'color',
					'label' => esc_html__('Elements Color', 'fawzi'),
					'description'    => esc_html__('This is theme primary color, means it\'ll affect all elements that have default color of our theme primary color.', 'fawzi'),
				),
			),
	    // Fields End

	  )
	);
	// Primary Color

	// Topbar Color
	$options[]      = array(
	  'name'        => 'topbar_color_section',
	  'title'       => esc_html__('01. Topbar Colors', 'fawzi'),
	  'settings'    => array(

	    // Fields Start
	    array(
				'name'          => 'topbar_bg_heading',
				'control'       => array(
					'type'        => 'cs_field',
					'options'     => array(
						'type'      => 'notice',
						'class'     => 'info',
						'content'   => esc_html__('Bar Color', 'fawzi'),
					),
				),
			),
			array(
				'name'      => 'topbar_bg_color',
				'control'   => array(
					'type'  => 'color',
					'label' => esc_html__('Background Color', 'fawzi'),
				),
			),
			array(
				'name'      => 'topbar_border_color',
				'control'   => array(
					'type'  => 'color',
					'label' => esc_html__('Border Color', 'fawzi'),
				),
			),
			array(
				'name'          => 'topbar_text_heading',
				'control'       => array(
					'type'        => 'cs_field',
					'options'     => array(
						'type'      => 'notice',
						'class'     => 'info',
						'content'   => esc_html__('Common Color', 'fawzi'),
					),
				),
			),
			array(
				'name'      => 'topbar_text_color',
				'control'   => array(
					'type'  => 'color',
					'label' => esc_html__('Text Color', 'fawzi'),
				),
			),
			array(
				'name'      => 'topbar_link_color',
				'control'   => array(
					'type'  => 'color',
					'label' => esc_html__('Link Color', 'fawzi'),
				),
			),
			array(
				'name'      => 'topbar_link_hover_color',
				'control'   => array(
					'type'  => 'color',
					'label' => esc_html__('Link Hover Color', 'fawzi'),
				),
			),
			array(
				'name'          => 'topbar_social_heading',
				'control'       => array(
					'type'        => 'cs_field',
					'options'     => array(
						'type'      => 'notice',
						'class'     => 'info',
						'content'   => esc_html__('Social Icon Color', 'fawzi'),
					),
				),
			),
			array(
				'name'      => 'topbar_social_bg_color',
				'control'   => array(
					'type'  => 'color',
					'label' => esc_html__('Social Icon Background Color', 'fawzi'),
				),
			),
			array(
				'name'      => 'topbar_social_color',
				'control'   => array(
					'type'  => 'color',
					'label' => esc_html__('Social Icon Color', 'fawzi'),
				),
			),
			array(
				'name'      => 'topbar_social_hover_color',
				'control'   => array(
					'type'  => 'color',
					'label' => esc_html__('Social Icons Hover Color', 'fawzi'),
				),
			),
			array(
				'name'      => 'topbar_social_hover_bg_color',
				'control'   => array(
					'type'  => 'color',
					'label' => esc_html__('Social Icon Hover Background Color', 'fawzi'),
				),
			),
	    // Fields End

	  )
	);
	// Topbar Color

	// Header Color
	$options[]      = array(
	  'name'        => 'header_color_section',
	  'title'       => esc_html__('02. Header Colors', 'fawzi'),
	  'settings'    => array(

	    // Fields Start
			array(
				'name'          => 'header_main_menu_heading',
				'control'       => array(
					'type'        => 'cs_field',
					'options'     => array(
						'type'      => 'notice',
						'class'     => 'info',
						'content'   => esc_html__('Main Menu Colors', 'fawzi'),
					),
				),
			),
			array(
				'name'      => 'header_bg_color',
				'control'   => array(
					'type'  => 'color',
					'label' => esc_html__('Background Color', 'fawzi'),
				),
			),
			array(
				'name'      => 'header_sticky_bg_color',
				'control'   => array(
					'type'  => 'color',
					'label' => esc_html__('Sticky Background Color', 'fawzi'),
				),
			),
			array(
				'name'      => 'header_link_color',
				'control'   => array(
					'type'  => 'color',
					'label' => esc_html__('Link Color', 'fawzi'),
				),
			),
			array(
				'name'      => 'header_link_hover_color',
				'control'   => array(
					'type'  => 'color',
					'label' => esc_html__('Link Hover Color', 'fawzi'),
				),
			),

			// Sub Menu Color
			array(
				'name'          => 'header_submenu_heading',
				'control'       => array(
					'type'        => 'cs_field',
					'options'     => array(
						'type'      => 'notice',
						'class'     => 'info',
						'content'   => esc_html__('Sub-Menu Colors', 'fawzi'),
					),
				),
			),
			array(
				'name'      => 'submenu_bg_color',
				'control'   => array(
					'type'  => 'color',
					'label' => esc_html__('Background Color', 'fawzi'),
				),
			),
			array(
				'name'      => 'submenu_border_color',
				'control'   => array(
					'type'  => 'color',
					'label' => esc_html__('Border Color', 'fawzi'),
				),
			),
			array(
				'name'      => 'submenu_link_color',
				'control'   => array(
					'type'  => 'color',
					'label' => esc_html__('Link Color', 'fawzi'),
				),
			),
			array(
				'name'      => 'submenu_link_hover_color',
				'control'   => array(
					'type'  => 'color',
					'label' => esc_html__('Link Hover Color', 'fawzi'),
				),
			),
	    // Fields End

	  )
	);
	// Header Color

	// Title Bar Color
	$options[]      = array(
	  'name'        => 'titlebar_section',
	  'title'       => esc_html__('03. Title Bar Colors', 'fawzi'),
    'settings'      => array(

    	// Fields Start
    	array(
				'name'          => 'titlebar_colors_heading',
				'control'       => array(
					'type'        => 'cs_field',
					'options'     => array(
						'type'      => 'notice',
						'class'     => 'info',
						'content'   => __('<h2 style="margin: 0;text-align: center;">Title Colors</h2> <br /> This is common settings, if this settings not affect in your page. Please check your page metabox. You may set default settings there.', 'fawzi'),
					),
				),
			),
    	array(
				'name'      => 'titlebar_title_color',
				'control'   => array(
					'type'  => 'color',
					'label' => esc_html__('Title Color', 'fawzi'),
				),
			),

	    // Fields End

	  )
	);
	// Title Bar Color

	// Content Color
	$options[]      = array(
	  'name'        => 'content_section',
	  'title'       => esc_html__('04. Content Colors', 'fawzi'),
	  'description' => esc_html__('This is all about content area text and heading colors.', 'fawzi'),
	  'sections'    => array(

	  	array(
	      'name'          => 'content_text_section',
	      'title'         => esc_html__('Content Text', 'fawzi'),
	      'settings'      => array(

			    // Fields Start
			    array(
						'name'      => 'body_color',
						'control'   => array(
							'type'  => 'color',
							'label' => esc_html__('Body & Content Color', 'fawzi'),
						),
					),
					array(
						'name'      => 'body_links_color',
						'control'   => array(
							'type'  => 'color',
							'label' => esc_html__('Body Links Color', 'fawzi'),
						),
					),
					array(
						'name'      => 'body_link_hover_color',
						'control'   => array(
							'type'  => 'color',
							'label' => esc_html__('Body Links Hover Color', 'fawzi'),
						),
					),
					array(
						'name'      => 'sidebar_content_color',
						'control'   => array(
							'type'  => 'color',
							'label' => esc_html__('Sidebar Content Color', 'fawzi'),
						),
					),
			    // Fields End
			  )
			),

			// Text Colors Section
			array(
	      'name'          => 'content_heading_section',
	      'title'         => esc_html__('Headings', 'fawzi'),
	      'settings'      => array(

	      	// Fields Start
					array(
						'name'      => 'content_heading_color',
						'control'   => array(
							'type'  => 'color',
							'label' => esc_html__('Content Heading Color', 'fawzi'),
						),
					),
	      	array(
						'name'      => 'sidebar_heading_color',
						'control'   => array(
							'type'  => 'color',
							'label' => esc_html__('Sidebar Heading Color', 'fawzi'),
						),
					),
			    // Fields End

      	)
      ),

	  )
	);
	// Content Color

	// Footer Color
	$options[]      = array(
	  'name'        => 'footer_section',
	  'title'       => esc_html__('05. Footer Colors', 'fawzi'),
	  'description' => esc_html__('This is all about footer settings. Make sure you\'ve enabled your needed section at : Fawzi > Theme Options > Footer ', 'fawzi'),
	  'sections'    => array(

			// Footer Widgets Block
	  	array(
	      'name'          => 'footer_widget_section',
	      'title'         => esc_html__('Widget Block', 'fawzi'),
	      'settings'      => array(

			    // Fields Start
					array(
			      'name'          => 'footer_widget_color_notice',
			      'control'       => array(
			        'type'        => 'cs_field',
			        'options'     => array(
			          'type'      => 'notice',
			          'class'     => 'info',
			          'content'   => esc_html__('Content Colors', 'fawzi'),
			        ),
			      ),
			    ),
					array(
						'name'      => 'footer_heading_color',
						'control'   => array(
							'type'  => 'color',
							'label' => esc_html__('Widget Heading Color', 'fawzi'),
						),
					),
					array(
						'name'      => 'footer_text_color',
						'control'   => array(
							'type'  => 'color',
							'label' => esc_html__('Widget Text Color', 'fawzi'),
						),
					),
					array(
						'name'      => 'footer_link_color',
						'control'   => array(
							'type'  => 'color',
							'label' => esc_html__('Widget Link Color', 'fawzi'),
						),
					),
					array(
						'name'      => 'footer_link_hover_color',
						'control'   => array(
							'type'  => 'color',
							'label' => esc_html__('Widget Link Hover Color', 'fawzi'),
						),
					),
					array(
						'name'      => 'footer_bg_color',
						'default'   => '#222327',
						'control'   => array(
							'type'  => 'color',
							'label' => esc_html__('Background Color', 'fawzi'),
						),
					),
			    // Fields End
			  )
			),
			// Footer Widgets Block

			// Footer Copyright Block
	  	array(
	      'name'          => 'footer_copyright_section',
	      'title'         => esc_html__('Copyright Block', 'fawzi'),
	      'settings'      => array(

			    // Fields Start
			    array(
			      'name'          => 'footer_copyright_active',
			      'control'       => array(
			        'type'        => 'cs_field',
			        'options'     => array(
			          'type'      => 'notice',
			          'class'     => 'info',
			          'content'   => __('Make sure you\'ve enabled copyright block in : <br /> <strong>Fawzi > Theme Options > Footer > Copyright Bar : Enable Copyright Block</strong>', 'fawzi'),
			        ),
			      ),
			    ),
					array(
						'name'      => 'copyright_text_color',
						'control'   => array(
							'type'  => 'color',
							'label' => esc_html__('Text Color', 'fawzi'),
						),
					),
					array(
						'name'      => 'copyright_link_color',
						'control'   => array(
							'type'  => 'color',
							'label' => esc_html__('Link Color', 'fawzi'),
						),
					),
					array(
						'name'      => 'copyright_link_hover_color',
						'control'   => array(
							'type'  => 'color',
							'label' => esc_html__('Link Hover Color', 'fawzi'),
						),
					),
					array(
						'name'      => 'copyright_bg_color',
						'control'   => array(
							'type'  => 'color',
							'label' => esc_html__('Background Color', 'fawzi'),
						),
					),
					array(
						'name'      => 'copyright_border_color',
						'default'   => 'rgba(0,0,0,0.2)',
						'control'   => array(
							'type'  => 'color',
							'label' => esc_html__('Border Color', 'fawzi'),
						),
					),

			  )
			),
			// Footer Copyright Block

	  )
	);
	// Footer Color

	return $options;

  }
  add_filter( 'cs_customize_options', 'fawzi_vt_customizer' );
}
<?php
/*
 * All Metabox related options for Fawzi theme.
 * Author & Copyright: VictorThemes
 * URL: http://themeforest.net/user/VictorThemes
 */

function fawzi_vt_metabox_options( $options ) {

  $options      = array();

  // -----------------------------------------
  // Post Metabox Options                    -
  // -----------------------------------------
  $options[]    = array(
    'id'        => 'post_type_metabox',
    'title'     => esc_html__('Post Options', 'fawzi'),
    'post_type' => 'post',
    'context'   => 'normal',
    'priority'  => 'default',
    'sections'  => array(

      // All Post Formats
      array(
        'name'   => 'section_post_formats',
        'fields' => array(

          // Standard, Image
          array(
            'title' => 'Standard Image',
            'type'  => 'subheading',
            'content' => esc_html__('There is no Extra Option for this Post Format!', 'fawzi'),
            'wrap_class' => 'vt-minimal-heading hide-title',
          ),
          // Standard, Image

          // Gallery
          array(
            'type'    => 'notice',
            'title'   => 'Gallery Format',
            'wrap_class' => 'hide-title',
            'class'   => 'info cs-vt-heading',
            'content' => esc_html__('Gallery Format', 'fawzi')
          ),
          array(
            'id'          => 'gallery_post_format',
            'type'        => 'gallery',
            'title'       => esc_html__('Add Gallery', 'fawzi'),
            'add_title'   => esc_html__('Add Image(s)', 'fawzi'),
            'edit_title'  => esc_html__('Edit Image(s)', 'fawzi'),
            'clear_title' => esc_html__('Clear Image(s)', 'fawzi'),
          ),
          // Gallery

        ),
      ),

    ),
  );

  // -----------------------------------------
  // Page Metabox Options                    -
  // -----------------------------------------
  $options[]    = array(
    'id'        => 'page_type_metabox',
    'title'     => esc_html__('Page Custom Options', 'fawzi'),
    'post_type' => array('post', 'page', 'casestudies', 'team', 'resource'),
    'context'   => 'normal',
    'priority'  => 'default',
    'sections'  => array(

      // Title Section
      array(
        'name'  => 'page_topbar_section',
        'title' => esc_html__('Top Bar', 'fawzi'),
        'icon'  => 'fa fa-minus',

        // Fields Start
        'fields' => array(

          array(
            'id'           => 'topbar_options',
            'type'         => 'image_select',
            'title'        => esc_html__('Topbar', 'fawzi'),
            'options'      => array(
              'default'     => FAWZI_CS_IMAGES .'/topbar-default.png',
              'custom'      => FAWZI_CS_IMAGES .'/topbar-custom.png',
              'hide_topbar' => FAWZI_CS_IMAGES .'/topbar-hide.png',
            ),
            'attributes' => array(
              'data-depend-id' => 'hide_topbar_select',
            ),
            'radio'     => true,
            'default'   => 'default',
          ),
          array(
            'id'          => 'top_left',
            'type'        => 'textarea',
            'title'       => esc_html__('Top Left', 'fawzi'),
            'dependency'  => array('hide_topbar_select', '==', 'custom'),
            'shortcode'       => true,
          ),
          array(
            'id'          => 'top_right',
            'type'        => 'textarea',
            'title'       => esc_html__('Top Right', 'fawzi'),
            'dependency'  => array('hide_topbar_select', '==', 'custom'),
            'shortcode'       => true,
          ),
          array(
            'id'         => 'topbar_left_width',
            'type'       => 'text',
            'title'      => esc_html__('Top Left Width in %', 'fawzi'),
            'attributes' => array(
              'placeholder' => '50%'
            ),
            'dependency'  => array('hide_topbar_select', '==', 'custom'),
          ),
          array(
            'id'         => 'topbar_right_width',
            'type'       => 'text',
            'title'      => esc_html__('Top Right Width in %', 'fawzi'),
            'attributes' => array(
              'placeholder' => '50%'
            ),
            'dependency'  => array('hide_topbar_select', '==', 'custom'),
          ),
          array(
            'id'    => 'topbar_bg',
            'type'  => 'color_picker',
            'title' => esc_html__('Topbar Background Color', 'fawzi'),
            'dependency'  => array('hide_topbar_select', '==', 'custom'),
          ),
          array(
            'id'    => 'topbar_border',
            'type'  => 'color_picker',
            'title' => esc_html__('Topbar Border Color', 'fawzi'),
            'dependency'  => array('hide_topbar_select', '==', 'custom'),
          ),

        ), // End : Fields

      ), // Title Section

      // Header
      array(
        'name'  => 'header_section',
        'title' => esc_html__('Header', 'fawzi'),
        'icon'  => 'fa fa-bars',
        'fields' => array(

          array(
            'id'             => 'choose_menu',
            'type'           => 'select',
            'title'          => esc_html__('Choose Menu', 'fawzi'),
            'desc'          => esc_html__('Choose custom menus for this page.', 'fawzi'),
            'options'        => 'menus',
            'default_option' => esc_html__('Select your menu', 'fawzi'),
          ),

          // Enable & Disable
          array(
            'type'    => 'notice',
            'class'   => 'info cs-vt-heading',
            'content' => esc_html__('Enable & Disable', 'fawzi'),
            'dependency' => array('header_design', '!=', 'default'),
          ),
          array(
            'id'    => 'sticky_header',
            'type'  => 'switcher',
            'title' => esc_html__('Sticky Header', 'fawzi'),
            'info' => esc_html__('Turn On if you want your naviagtion bar on sticky.', 'fawzi'),
            'default' => true,
            'dependency' => array('header_design', '!=', 'default'),
          ),
          array(
            'id'    => 'search_icon',
            'type'  => 'switcher',
            'title' => esc_html__('Search Icon', 'fawzi'),
            'info' => esc_html__('Turn On if you want to show search icon in navigation bar.', 'fawzi'),
            'default' => true,
            'dependency' => array('header_design', '!=', 'default'),
          ),
          array(
            'id'    => 'cart_widget',
            'type'  => 'switcher',
            'title' => esc_html__('Cart Widget', 'fawzi'),
            'info' => esc_html__('Turn On if you want to show cart widget in header. Make sure about installation/activation of WooCommerce plugin.', 'fawzi'),
            'default' => false,
            'dependency' => array('header_design', '==', 'style_two'),
          ),

        ),
      ),
      // Header

      // Banner & Title Area
      array(
        'name'  => 'banner_title_section',
        'title' => esc_html__('Banner & Title Area', 'fawzi'),
        'icon'  => 'fa fa-bullhorn',
        'fields' => array(

          array(
            'id'        => 'banner_type',
            'type'      => 'select',
            'title'     => esc_html__('Choose Banner Type', 'fawzi'),
            'options'   => array(
              'default-title'    => 'Default Title',
              'revolution-slider' => 'Shortcode [Rev Slider]',
              'hide-title-area'   => 'Hide Title/Banner Area',
            ),
          ),
          array(
            'id'    => 'page_revslider',
            'type'  => 'textarea',
            'title' => esc_html__('Revolution Slider or Any Shortcodes', 'fawzi'),
            'desc' => __('Enter any shortcodes that you want to show in this page title area. <br />Eg : Revolution Slider shortcode.', 'fawzi'),
            'attributes' => array(
              'placeholder' => esc_html__('Enter your shortcode...', 'fawzi'),
            ),
            'dependency'   => array('banner_type', '==', 'revolution-slider'),
          ),
          array(
            'id'    => 'page_custom_title',
            'type'  => 'text',
            'title' => esc_html__('Custom Title', 'fawzi'),
            'attributes' => array(
              'placeholder' => esc_html__('Enter your custom title...', 'fawzi'),
            ),
            'dependency'   => array('banner_type', '==', 'default-title'),
          ),
          array(
            'id'        => 'title_area_spacings',
            'type'      => 'select',
            'title'     => esc_html__('Title Area Spacings', 'fawzi'),
            'options'   => array(
              'padding-default' => esc_html__('Default Spacing', 'fawzi'),
              'padding-xs' => esc_html__('Extra Small Padding', 'fawzi'),
              'padding-sm' => esc_html__('Small Padding', 'fawzi'),
              'padding-md' => esc_html__('Medium Padding', 'fawzi'),
              'padding-lg' => esc_html__('Large Padding', 'fawzi'),
              'padding-xl' => esc_html__('Extra Large Padding', 'fawzi'),
              'padding-none' => esc_html__('No Padding', 'fawzi'),
              'padding-custom' => esc_html__('Custom Padding', 'fawzi'),
            ),
            'dependency'   => array('banner_type', '==', 'default-title'),
            'default'    => 'padding-default',
          ),
          array(
            'id'    => 'title_top_spacings',
            'type'  => 'text',
            'title' => esc_html__('Top Spacing', 'fawzi'),
            'attributes'  => array( 'placeholder' => '100px' ),
            'dependency'  => array('banner_type|title_area_spacings', '==|==', 'default-title|padding-custom'),
          ),
          array(
            'id'    => 'title_bottom_spacings',
            'type'  => 'text',
            'title' => esc_html__('Bottom Spacing', 'fawzi'),
            'attributes'  => array( 'placeholder' => '100px' ),
            'dependency'  => array('banner_type|title_area_spacings', '==|==', 'default-title|padding-custom'),
          ),
          array(
            'id'    => 'title_area_bg',
            'type'  => 'background',
            'title' => esc_html__('Background', 'fawzi'),
            'dependency'   => array('banner_type', '==', 'default-title'),
          ),
          array(
            'id'    => 'titlebar_bg_overlay_color',
            'type'  => 'color_picker',
            'title' => esc_html__('Overlay Color', 'fawzi'),
            'dependency'   => array('banner_type', '==', 'default-title'),
          ),

        ),
      ),
      // Banner & Title Area

      // Content Section
      array(
        'name'  => 'page_content_options',
        'title' => esc_html__('Content Options', 'fawzi'),
        'icon'  => 'fa fa-file',

        'fields' => array(

          array(
            'id'        => 'content_spacings',
            'type'      => 'select',
            'title'     => esc_html__('Content Spacings', 'fawzi'),
            'options'   => array(
              'padding-default' => esc_html__('Default Spacing', 'fawzi'),
              'padding-xs' => esc_html__('Extra Small Padding', 'fawzi'),
              'padding-sm' => esc_html__('Small Padding', 'fawzi'),
              'padding-md' => esc_html__('Medium Padding', 'fawzi'),
              'padding-lg' => esc_html__('Large Padding', 'fawzi'),
              'padding-xl' => esc_html__('Extra Large Padding', 'fawzi'),
              'padding-none' => esc_html__('No Padding', 'fawzi'),
              'padding-custom' => esc_html__('Custom Padding', 'fawzi'),
            ),
            'desc' => esc_html__('Content area top and bottom spacings.', 'fawzi'),
          ),
          array(
            'id'    => 'content_top_spacings',
            'type'  => 'text',
            'title' => esc_html__('Top Spacing', 'fawzi'),
            'attributes'  => array( 'placeholder' => '100px' ),
            'dependency'  => array('content_spacings', '==', 'padding-custom'),
          ),
          array(
            'id'    => 'content_bottom_spacings',
            'type'  => 'text',
            'title' => esc_html__('Bottom Spacing', 'fawzi'),
            'attributes'  => array( 'placeholder' => '100px' ),
            'dependency'  => array('content_spacings', '==', 'padding-custom'),
          ),

        ), // End Fields
      ), // Content Section

      // Enable & Disable
      array(
        'name'  => 'hide_show_section',
        'title' => esc_html__('Enable & Disable', 'fawzi'),
        'icon'  => 'fa fa-toggle-on',
        'fields' => array(

          array(
            'id'    => 'hide_header',
            'type'  => 'switcher',
            'title' => esc_html__('Hide Header', 'fawzi'),
            'label' => esc_html__('Yes, Please do it.', 'fawzi'),
          ),
          array(
            'id'    => 'hide_footer',
            'type'  => 'switcher',
            'title' => esc_html__('Hide Footer', 'fawzi'),
            'label' => esc_html__('Yes, Please do it.', 'fawzi'),
          ),

        ),
      ),
      // Enable & Disable

    ),
  );

  // -----------------------------------------
  // Page Layout
  // -----------------------------------------
  $options[]    = array(
    'id'        => 'page_layout_options',
    'title'     => esc_html__('Page Layout', 'fawzi'),
    'post_type' => array('post', 'page'),
    'context'   => 'side',
    'priority'  => 'default',
    'sections'  => array(

      array(
        'name'   => 'page_layout_section',
        'fields' => array(

          array(
            'id'        => 'page_layout',
            'type'      => 'image_select',
            'options'   => array(
              'default'       => FAWZI_CS_IMAGES . '/page-0.png',
              'full-width'    => FAWZI_CS_IMAGES . '/page-1.png',
              'left-sidebar'  => FAWZI_CS_IMAGES . '/page-3.png',
              'right-sidebar' => FAWZI_CS_IMAGES . '/page-4.png',
            ),
            'attributes' => array(
              'data-depend-id' => 'page_layout',
            ),
            'default'    => 'default',
            'radio'      => true,
            'wrap_class' => 'text-center',
          ),
          array(
            'id'            => 'page_sidebar_widget',
            'type'           => 'select',
            'title'          => esc_html__('Sidebar Widget', 'fawzi'),
            'options'        => fawzi_vt_registered_sidebars(),
            'default_option' => esc_html__('Select Widget', 'fawzi'),
            'dependency'   => array('page_layout', 'any', 'left-sidebar,right-sidebar'),
          ),

        ),
      ),

    ),
  );

  // -----------------------------------------
  // Testimonial
  // -----------------------------------------
  $options[]    = array(
    'id'        => 'testimonial_options',
    'title'     => esc_html__('Testimonial Client', 'fawzi'),
    'post_type' => 'testimonial',
    'context'   => 'side',
    'priority'  => 'default',
    'sections'  => array(

      array(
        'name'   => 'testimonial_option_section',
        'fields' => array(

          array(
            'id'      => 'testi_name',
            'type'    => 'text',
            'title'   => esc_html__('Name', 'fawzi'),
            'info'    => esc_html__('Enter client name', 'fawzi'),
          ),
          array(
            'id'      => 'testi_name_link',
            'type'    => 'text',
            'title'   => esc_html__('Name Link', 'fawzi'),
            'info'    => esc_html__('Enter client name link, if you want', 'fawzi'),
          ),
          array(
            'id'      => 'testi_pro',
            'type'    => 'text',
            'title'   => esc_html__('Profession', 'fawzi'),
            'info'    => esc_html__('Enter client profession', 'fawzi'),
          ),
          array(
            'id'      => 'testi_pro_link',
            'type'    => 'text',
            'title'   => esc_html__('Profession Link', 'fawzi'),
            'info'    => esc_html__('Enter client profession link', 'fawzi'),
          ),
          array(
            'id'        => 'testi_rating',
            'type'      => 'select',
            'title'     => esc_html__('Testimonial Ratings', 'fawzi'),
            'options'   => array(
              '1' => esc_html__('1', 'fawzi'),
              '2' => esc_html__('2', 'fawzi'),
              '3' => esc_html__('3', 'fawzi'),
              '4' => esc_html__('4', 'fawzi'),
              '5' => esc_html__('5', 'fawzi'),
            ),
          ),

        ),
      ),

    ),
  );

  // -----------------------------------------
  // Team
  // -----------------------------------------
  $options[]    = array(
    'id'        => 'team_options',
    'title'     => esc_html__('Job Position', 'fawzi'),
    'post_type' => 'team',
    'context'   => 'side',
    'priority'  => 'default',
    'sections'  => array(

      array(
        'name'   => 'team_option_section',
        'fields' => array(

          array(
            'id'      => 'team_job_position',
            'type'    => 'text',
            'attributes' => array(
              'placeholder' => esc_html__('Eg : Financial Manager', 'fawzi'),
            ),
            'info'    => esc_html__('Enter this employee job position, in your company.', 'fawzi'),
          ),
          array(
            'id'      => 'team_custom_link',
            'type'    => 'text',
            'title'    => esc_html__('Custom Link', 'fawzi'),
            'attributes' => array(
              'placeholder' => esc_html__('http://', 'fawzi'),
            ),
            'info'    => esc_html__('Enter your custom link, if you don\'t want to show this page.', 'fawzi'),
          ),
          // Social fields
          array(
            'id'                  => 'social_icons',
            'type'                => 'group',
            'title'    => esc_html__('Social Icons', 'fawzi'),
            'button_title'       => 'Add New Icon',
            'accordion_title'    => 'Adding New Icon',
            'accordion'          => true,
            'fields'              => array(
              array(
                'id'              => 'icon',
                'type'            => 'icon',
                'title'           => esc_html__('Select your icon', 'fawzi'),
              ),
              array(
                'id'              => 'icon_link',
                'type'            => 'text',
                'title'           => esc_html__('Enter your icon link', 'fawzi'),
              ),

            ),

          ),

        ),
      ),

    ),
  );

  // -----------------------------------------
  // Resources
  // -----------------------------------------
  $options[]    = array(
    'id'        => 'resource_options',
    'title'     => esc_html__('Resources Option', 'fawzi'),
    'post_type' => 'resource',
    'context'   => 'side',
    'priority'  => 'default',
    'sections'  => array(

      array(
        'name'   => 'resource_option_section',
        'fields' => array(

          array(
            'id'      => 'resource_download',
            'type'    => 'text',
            'title'    => esc_html__('Download Button Text', 'fawzi'),
          ),
          array(
            'id'      => 'resource_download_link',
            'type'    => 'text',
            'title'    => esc_html__('Download Button Link', 'fawzi'),
          ),
          array(
            'id'      => 'popup-attribute',
            'type'    => 'text',
            'title'    => esc_html__('Popup Attribute', 'fawzi'),
          ),

        ),
      ),

    ),
  );

  return $options;

}
add_filter( 'cs_metabox_options', 'fawzi_vt_metabox_options' );
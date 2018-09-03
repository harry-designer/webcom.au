<?php
/*
 * All Theme Options for Fawzi theme.
 * Author & Copyright: VictorThemes
 * URL: http://themeforest.net/user/VictorThemes
 */

function fawzi_vt_settings( $settings ) {

  $settings           = array(
    'menu_title'      => FAWZI_NAME . esc_html__(' Options', 'fawzi'),
    'menu_slug'       => sanitize_title(FAWZI_NAME) . '_options',
    'menu_type'       => 'menu',
    'menu_icon'       => 'dashicons-awards',
    'menu_position'   => '4',
    'ajax_save'       => false,
    'show_reset_all'  => true,
    'framework_title' => FAWZI_NAME .' <small>V-'. FAWZI_VERSION .' by <a href="'. FAWZI_BRAND_URL .'" target="_blank">'. FAWZI_BRAND_NAME .'</a></small>',
  );

  return $settings;

}
add_filter( 'cs_framework_settings', 'fawzi_vt_settings' );

// Theme Framework Options
function fawzi_vt_options( $options ) {

  $options      = array(); // remove old options

  // ------------------------------
  // Theme Brand
  // ------------------------------
  $options[]   = array(
    'name'     => 'theme_brand',
    'title'    => esc_html__('Brand', 'fawzi'),
    'icon'     => 'fa fa-bookmark',
    'sections' => array(

      // brand logo tab
      array(
        'name'     => 'brand_logo_title',
        'title'    => esc_html__('Logo', 'fawzi'),
        'icon'     => 'fa fa-star',
        'fields'   => array(

          // Site Logo
          array(
            'type'    => 'notice',
            'class'   => 'info cs-vt-heading',
            'content' => esc_html__('Site Logo', 'fawzi')
          ),
          array(
            'id'    => 'brand_logo_default',
            'type'  => 'image',
            'title' => esc_html__('Default Logo', 'fawzi'),
            'info'  => __('Upload your default logo here. If you not upload, then site title will load in this logo location.', 'fawzi'),
            'add_title' => esc_html__('Add Logo', 'fawzi'),
          ),
          array(
            'id'    => 'brand_logo_retina',
            'type'  => 'image',
            'title' => esc_html__('Retina Logo', 'fawzi'),
            'info'  => esc_html__('Upload your retina logo here. Recommended size is 2x from default logo.', 'fawzi'),
            'add_title' => esc_html__('Add Retina Logo', 'fawzi'),
          ),
          array(
            'id'          => 'retina_width',
            'type'        => 'text',
            'title'       => esc_html__('Retina & Normal Logo Width', 'fawzi'),
            'unit'        => 'px',
          ),
          array(
            'id'          => 'retina_height',
            'type'        => 'text',
            'title'       => esc_html__('Retina & Normal Logo Height', 'fawzi'),
            'unit'        => 'px',
          ),
          array(
            'id'          => 'brand_logo_top',
            'type'        => 'number',
            'title'       => esc_html__('Logo Top Space', 'fawzi'),
            'attributes'  => array( 'placeholder' => 5 ),
            'unit'        => 'px',
          ),
          array(
            'id'          => 'brand_logo_bottom',
            'type'        => 'number',
            'title'       => esc_html__('Logo Bottom Space', 'fawzi'),
            'attributes'  => array( 'placeholder' => 5 ),
            'unit'        => 'px',
          ),

          // WordPress Admin Logo
          array(
            'type'    => 'notice',
            'class'   => 'info cs-vt-heading',
            'content' => esc_html__('WordPress Admin Logo', 'fawzi')
          ),
          array(
            'id'    => 'brand_logo_wp',
            'type'  => 'image',
            'title' => esc_html__('Login logo', 'fawzi'),
            'info'  => esc_html__('Upload your WordPress login page logo here.', 'fawzi'),
            'add_title' => esc_html__('Add Login Logo', 'fawzi'),
          ),
        ) // end: fields
      ), // end: section

      // brand logo tab
      array(
        'name'     => 'mobile_logo_title',
        'title'    => esc_html__('Mobile Logo', 'fawzi'),
        'icon'     => 'fa fa-mobile',
        'fields'   => array(

          // Mobile Logo
          array(
            'type'    => 'notice',
            'class'   => 'info cs-vt-heading',
            'content' => esc_html__('Mobile Logo - If you not upload mobile logo as separatly here, then normal logo will place in that position.', 'fawzi')
          ),
          array(
            'id'    => 'mobile_logo_retina',
            'type'  => 'image',
            'title' => esc_html__('Mobile Logo', 'fawzi'),
            'info'  => esc_html__('Upload your mobile logo as retina size.', 'fawzi'),
            'add_title' => esc_html__('Add Mobile Logo', 'fawzi'),
          ),
          array(
            'id'          => 'mobile_logo_width',
            'type'        => 'text',
            'title'       => esc_html__('Mobile Logo Width', 'fawzi'),
            'unit'        => 'px',
          ),
          array(
            'id'          => 'mobile_logo_height',
            'type'        => 'text',
            'title'       => esc_html__('Mobile Logo Height', 'fawzi'),
            'unit'        => 'px',
          ),
          array(
            'id'          => 'mobile_logo_top',
            'type'        => 'number',
            'title'       => esc_html__('Logo Top Space', 'fawzi'),
            'attributes'  => array( 'placeholder' => 5 ),
            'unit'        => 'px',
          ),
          array(
            'id'          => 'mobile_logo_bottom',
            'type'        => 'number',
            'title'       => esc_html__('Logo Bottom Space', 'fawzi'),
            'attributes'  => array( 'placeholder' => 5 ),
            'unit'        => 'px',
          ),

        ) // end: fields
      ), // end: section

      // Fav
      array(
        'name'     => 'brand_fav',
        'title'    => esc_html__('Fav Icon', 'fawzi'),
        'icon'     => 'fa fa-anchor',
        'fields'   => array(

            // -----------------------------
            // Begin: Fav
            // -----------------------------
            array(
              'id'    => 'brand_fav_icon',
              'type'  => 'image',
              'title' => esc_html__('Fav Icon', 'fawzi'),
              'info'  => esc_html__('Upload your site fav icon, size should be 16x16.', 'fawzi'),
              'add_title' => esc_html__('Add Fav Icon', 'fawzi'),
            ),
            array(
              'id'    => 'iphone_icon',
              'type'  => 'image',
              'title' => esc_html__('Apple iPhone icon', 'fawzi'),
              'info'  => esc_html__('Icon for Apple iPhone (57px x 57px). This icon is used for Bookmark on Home screen.', 'fawzi'),
              'add_title' => esc_html__('Add iPhone Icon', 'fawzi'),
            ),
            array(
              'id'    => 'iphone_retina_icon',
              'type'  => 'image',
              'title' => esc_html__('Apple iPhone retina icon', 'fawzi'),
              'info'  => esc_html__('Icon for Apple iPhone retina (114px x114px). This icon is used for Bookmark on Home screen.', 'fawzi'),
              'add_title' => esc_html__('Add iPhone Retina Icon', 'fawzi'),
            ),
            array(
              'id'    => 'ipad_icon',
              'type'  => 'image',
              'title' => esc_html__('Apple iPad icon', 'fawzi'),
              'info'  => esc_html__('Icon for Apple iPad (72px x 72px). This icon is used for Bookmark on Home screen.', 'fawzi'),
              'add_title' => esc_html__('Add iPad Icon', 'fawzi'),
            ),
            array(
              'id'    => 'ipad_retina_icon',
              'type'  => 'image',
              'title' => esc_html__('Apple iPad retina icon', 'fawzi'),
              'info'  => esc_html__('Icon for Apple iPad retina (144px x 144px). This icon is used for Bookmark on Home screen.', 'fawzi'),
              'add_title' => esc_html__('Add iPad Retina Icon', 'fawzi'),
            ),

        ) // end: fields
      ), // end: section

    ),
  );

  // ------------------------------
  // Layout
  // ------------------------------
  $options[] = array(
    'name'   => 'theme_layout',
    'title'  => esc_html__('Layout', 'fawzi'),
    'icon'   => 'fa fa-file-text'
  );

  $options[]      = array(
    'name'        => 'theme_general',
    'title'       => esc_html__('General', 'fawzi'),
    'icon'        => 'fa fa-wrench',

    // begin: fields
    'fields'      => array(

      // -----------------------------
      // Begin: Responsive
      // -----------------------------
      array(
        'id'    => 'theme_responsive',
        'type'  => 'switcher',
        'title' => esc_html__('Responsive', 'fawzi'),
        'info' => esc_html__('Turn off if you don\'t want your site to be responsive.', 'fawzi'),
        'default' => true,
      ),
      array(
        'id'    => 'pre_loader',
        'type'  => 'switcher',
        'title' => esc_html__('Pre Loader', 'fawzi'),
        'info' => esc_html__('Turn On if you want pre loader in your pages.', 'fawzi'),
        'default' => false,
      ),
      array(
        'id'        => 'main_pre_loader_option',
        'type'      => 'select',
        'options'   => array(
          'ball-scale-multiple'         => esc_html__('Ball Scale Multiple', 'fawzi'),
          'ball-pulse'                  => esc_html__('Ball Pulse', 'fawzi'),
          'ball-grid-pulse'             => esc_html__('Ball Grid Pulse', 'fawzi'),
          'ball-clip-rotate'            => esc_html__('Ball Clip Rotate', 'fawzi'),
          'ball-clip-rotate-pulse'      => esc_html__('Ball Clip Rotate Pulse', 'fawzi'),
          'square-spin'                 => esc_html__('Square Spin', 'fawzi'),
          'ball-clip-rotate-multiple'   => esc_html__('Ball Clip Rotate Multiple', 'fawzi'),
          'ball-pulse-rise'             => esc_html__('Ball Pulse Rise', 'fawzi'),
          'ball-rotate'                 => esc_html__('Ball Rotate', 'fawzi'),
          'cube-transition'             => esc_html__('Cube Transition', 'fawzi'),
          'ball-zig-zag'                => esc_html__('Ball Zig Zag', 'fawzi'),
          'ball-zig-zag-deflect'        => esc_html__('Ball Zig Zag Deflect', 'fawzi'),
          'ball-triangle-path'          => esc_html__('Ball Triangle Path', 'fawzi'),
          'ball-scale'                  => esc_html__('Ball Scale', 'fawzi'),
          'line-scale'                  => esc_html__('Line Scale', 'fawzi'),
          'line-scale-party'            => esc_html__('Line Scale Party', 'fawzi'),
          'ball-pulse-sync'             => esc_html__('Ball Pulse Sync', 'fawzi'),
          'ball-beat'                   => esc_html__('Ball Beat', 'fawzi'),
          'line-scale-pulse-out'        => esc_html__('Line Scale Pulse Out', 'fawzi'),
          'line-scale-pulse-out-rapid'  => esc_html__('Line Scale Pulse Out Rapid', 'fawzi'),
          'ball-scale-ripple'           => esc_html__('Ball Scale Ripple', 'fawzi'),
          'ball-scale-ripple-multiple'  => esc_html__('Ball Scale Ripple Multiple', 'fawzi'),
          'ball-spin-fade-loader'       => esc_html__('Ball Spin Fade Loader', 'fawzi'),
          'line-spin-fade-loader'       => esc_html__('Line Spin Fade Loader', 'fawzi'),
          'triangle-skew-spin'          => esc_html__('Triangle Skew Spin', 'fawzi'),
          'pacman'                      => esc_html__('Pacman', 'fawzi'),
          'ball-grid-beat'              => esc_html__('Ball Grid Beat', 'fawzi'),
          'semi-circle-spin'            => esc_html__('Semi Circle Spin', 'fawzi'),
        ),
        'title'     => esc_html__('Loader Style', 'fawzi'),
        'dependency'  => array('pre_loader', '==', 'true'),
      ),
      array(
        'id'    => 'back_to_top',
        'type'  => 'switcher',
        'title' => esc_html__('Back To Top', 'fawzi'),
        'info' => esc_html__('Turn Off if you want to hide back to top in your pages.', 'fawzi'),
        'default' => true,
      ),

    ), // end: fields

  );

  // ------------------------------
  // Header Sections
  // ------------------------------
  $options[]   = array(
    'name'     => 'theme_header_tab',
    'title'    => esc_html__('Header', 'fawzi'),
    'icon'     => 'fa fa-bars',
    'sections' => array(

      // header design tab
      array(
        'name'     => 'header_design_tab',
        'title'    => esc_html__('Design', 'fawzi'),
        'icon'     => 'fa fa-magic',
        'fields'   => array(

          // Options
          array(
            'type'    => 'notice',
            'class'   => 'info cs-vt-heading',
            'content' => esc_html__('Option\'s', 'fawzi'),
          ),
          array(
            'id'    => 'sticky_header',
            'type'  => 'switcher',
            'title' => esc_html__('Sticky Header', 'fawzi'),
            'info' => esc_html__('Turn On if you want your naviagtion bar on sticky.', 'fawzi'),
            'default' => true,
          ),
          array(
            'id'    => 'analysis_btn',
            'type'  => 'switcher',
            'title' => esc_html__('Analysis Button', 'fawzi'),
            'info' => esc_html__('Turn On if you want to show button.', 'fawzi'),
            'default' => true,
          ),
          array(
            'id'          => 'analysis_btn_text',
            'type'        => 'text',
            'title'       => esc_html__('Button Text', 'fawzi'),
            'info' => esc_html__('Enter the button text.', 'fawzi'),
            'dependency' => array('analysis_btn', '==', true),
          ),
          array(
            'id'          => 'analysis_btn_link',
            'type'        => 'text',
            'title'       => esc_html__('Button Link', 'fawzi'),
            'info' => esc_html__('Enter the button link.', 'fawzi'),
            'dependency' => array('analysis_btn', '==', true),
          ),
          array(
            'id'    => 'analysis_target',
            'type'  => 'switcher',
            'title' => esc_html__('Button Target', 'fawzi'),
            'info' => esc_html__('Turn On if you want to open the link in new tab.', 'fawzi'),
            'default' => false,
            'dependency' => array('analysis_btn', '==', true),
          ),

        )
      ),

      // header top bar
      array(
        'name'     => 'header_top_bar_tab',
        'title'    => esc_html__('Top Bar', 'fawzi'),
        'icon'     => 'fa fa-minus',
        'fields'   => array(

          array(
            'id'          => 'top_bar',
            'type'        => 'switcher',
            'title'       => esc_html__('Hide Top Bar', 'fawzi'),
            'on_text'     => esc_html__('Yes', 'fawzi'),
            'off_text'    => esc_html__('No', 'fawzi'),
            'default'     => false,
          ),
          array(
            'id'          => 'top_left',
            'title'       => esc_html__('Top Left Block', 'fawzi'),
            'desc'        => esc_html__('Top bar left block.', 'fawzi'),
            'type'        => 'textarea',
            'shortcode'   => true,
            'dependency'  => array('top_bar', '==', false),
          ),
          array(
            'id'          => 'top_right',
            'title'       => esc_html__('Top Right Block', 'fawzi'),
            'desc'        => esc_html__('Top bar right block.', 'fawzi'),
            'type'        => 'textarea',
            'shortcode'   => true,
            'dependency'  => array('top_bar', '==', false),
          ),

        )
      ),

      // header banner
      array(
        'name'     => 'header_banner_tab',
        'title'    => esc_html__('Title Bar (or) Banner', 'fawzi'),
        'icon'     => 'fa fa-bullhorn',
        'fields'   => array(

          // Title Area
          array(
            'type'    => 'notice',
            'class'   => 'info cs-vt-heading',
            'content' => esc_html__('Title Area', 'fawzi')
          ),
          array(
            'id'      => 'need_title_bar',
            'type'    => 'switcher',
            'title'   => esc_html__('Title Bar', 'fawzi'),
            'label'   => esc_html__('If you want title bar in your sub-pages, please turn this ON.', 'fawzi'),
            'default'    => true,
          ),
          array(
            'id'             => 'title_bar_padding',
            'type'           => 'select',
            'title'          => esc_html__('Padding Spaces Top & Bottom', 'fawzi'),
            'options'        => array(
              'title-padding-default' => esc_html__('Default Spacing', 'fawzi'),
              'title-padding-xs' => esc_html__('Extra Small Padding', 'fawzi'),
              'title-padding-sm' => esc_html__('Small Padding', 'fawzi'),
              'title-padding-md' => esc_html__('Medium Padding', 'fawzi'),
              'title-padding-lg' => esc_html__('Large Padding', 'fawzi'),
              'title-padding-xl' => esc_html__('Extra Large Padding', 'fawzi'),
              'title-padding-custom' => esc_html__('Custom Padding', 'fawzi'),
              'padding-none' => esc_html__('No Padding', 'fawzi'),
            ),
            'dependency'   => array( 'need_title_bar', '==', 'true' ),
            'default'    => 'title-padding-default',
          ),
          array(
            'id'             => 'titlebar_top_padding',
            'type'           => 'text',
            'title'          => esc_html__('Padding Top', 'fawzi'),
            'attributes' => array(
              'placeholder'     => '100px',
            ),
            'dependency'   => array( 'title_bar_padding', '==', 'padding-custom' ),
          ),
          array(
            'id'             => 'titlebar_bottom_padding',
            'type'           => 'text',
            'title'          => esc_html__('Padding Bottom', 'fawzi'),
            'attributes' => array(
              'placeholder'     => '100px',
            ),
            'dependency'   => array( 'title_bar_padding', '==', 'padding-custom' ),
          ),

          array(
            'type'    => 'notice',
            'class'   => 'info cs-vt-heading',
            'content' => esc_html__('Background Options', 'fawzi'),
            'dependency' => array( 'need_title_bar', '==', 'true' ),
          ),
          array(
            'id'      => 'titlebar_bg',
            'type'    => 'background',
            'title'   => esc_html__('Background', 'fawzi'),
            'dependency' => array( 'need_title_bar', '==', 'true' ),
          ),
          array(
            'id'      => 'titlebar_bg_overlay_color',
            'type'    => 'color_picker',
            'title'   => esc_html__('Overlay Color', 'fawzi'),
            'dependency' => array( 'need_title_bar', '==', 'true' ),
          ),

        )
      ),

    ),
  );

  // ------------------------------
  // Footer Section
  // ------------------------------
  $options[]   = array(
    'name'     => 'footer_section',
    'title'    => esc_html__('Footer', 'fawzi'),
    'icon'     => 'fa fa-ellipsis-h',
    'sections' => array(

      // footer widgets
      array(
        'name'     => 'footer_widgets_tab',
        'title'    => esc_html__('Widget Area', 'fawzi'),
        'icon'     => 'fa fa-th',
        'fields'   => array(

          // Footer Widget Block
          array(
            'type'    => 'notice',
            'class'   => 'info cs-vt-heading',
            'content' => esc_html__('Footer Widget Block', 'fawzi')
          ),
          array(
            'id'    => 'footer_widget_block',
            'type'  => 'switcher',
            'title' => esc_html__('Enable Widget Block', 'fawzi'),
            'info' => __('If you turn this ON, then Goto : Appearance > Widgets. There you can see <strong>Footer Widget 1,2,3 or 4</strong> Widget Area, add your widgets there.', 'fawzi'),
            'default' => true,
          ),
          array(
            'id'    => 'footer_widget_layout',
            'type'  => 'image_select',
            'title' => esc_html__('Widget Layouts', 'fawzi'),
            'info' => esc_html__('Choose your footer widget layouts.', 'fawzi'),
            'default' => 4,
            'options' => array(
              1   => FAWZI_CS_IMAGES . '/footer/footer-1.png',
              2   => FAWZI_CS_IMAGES . '/footer/footer-2.png',
              3   => FAWZI_CS_IMAGES . '/footer/footer-3.png',
              4   => FAWZI_CS_IMAGES . '/footer/footer-4.png',
              5   => FAWZI_CS_IMAGES . '/footer/footer-5.png',
              6   => FAWZI_CS_IMAGES . '/footer/footer-6.png',
              7   => FAWZI_CS_IMAGES . '/footer/footer-7.png',
              8   => FAWZI_CS_IMAGES . '/footer/footer-8.png',
              9   => FAWZI_CS_IMAGES . '/footer/footer-9.png',
            ),
            'radio'       => true,
            'dependency'  => array('footer_widget_block', '==', true),
          ),

        )
      ),

      // footer copyright
      array(
        'name'     => 'footer_copyright_tab',
        'title'    => esc_html__('Copyright Bar', 'fawzi'),
        'icon'     => 'fa fa-copyright',
        'fields'   => array(

          // Copyright
          array(
            'type'    => 'notice',
            'class'   => 'info cs-vt-heading',
            'content' => esc_html__('Copyright Layout', 'fawzi'),
          ),
          array(
            'id'    => 'need_copyright',
            'type'  => 'switcher',
            'title' => esc_html__('Enable Copyright Section', 'fawzi'),
            'default' => true,
          ),
          array(
            'id'    => 'footer_copyright_layout',
            'type'  => 'image_select',
            'title' => esc_html__('Select Copyright Layout', 'fawzi'),
            'info' => esc_html__('In above image, blue box is copyright text and yellow box is secondary text.', 'fawzi'),
            'default'      => 'copyright-3',
            'options'      => array(
              'copyright-1'    => FAWZI_CS_IMAGES .'/footer/copyright-1.png',
              'copyright-2'    => FAWZI_CS_IMAGES .'/footer/copyright-2.png',
              'copyright-3'    => FAWZI_CS_IMAGES .'/footer/copyright-3.png',
              ),
            'radio'        => true,
            'dependency'     => array('need_copyright', '==', true),
          ),
          array(
            'id'    => 'copyright_text',
            'type'  => 'textarea',
            'title' => esc_html__('Copyright Text', 'fawzi'),
            'shortcode' => true,
            'dependency' => array('need_copyright', '==', true),
            'after'       => 'Helpful shortcodes: [vt_current_year] [vt_home_url] or any shortcode.',
          ),

          // Copyright Another Text
          array(
            'type'    => 'notice',
            'class'   => 'warning cs-vt-heading',
            'content' => esc_html__('Copyright Secondary Text', 'fawzi'),
            'dependency'     => array('need_copyright', '==', true),
          ),
          array(
            'id'    => 'secondary_text',
            'type'  => 'textarea',
            'title' => esc_html__('Secondary Text', 'fawzi'),
            'shortcode' => true,
            'dependency' => array('need_copyright', '==', 'true'),
          ),

        )
      ),

    ),
  );

  // ------------------------------
  // Design
  // ------------------------------
  $options[] = array(
    'name'   => 'theme_design',
    'title'  => esc_html__('Design', 'fawzi'),
    'icon'   => 'fa fa-magic'
  );

  // ------------------------------
  // color section
  // ------------------------------
  $options[]   = array(
    'name'     => 'theme_color_section',
    'title'    => esc_html__('Colors', 'fawzi'),
    'icon'     => 'fa fa-eyedropper',
    'fields' => array(

      array(
        'type'    => 'heading',
        'content' => esc_html__('Color Options', 'fawzi'),
      ),
      array(
        'type'    => 'subheading',
        'wrap_class' => 'color-tab-content',
        'content' => __('All color options are available in our theme customizer. The reason of we used customizer options for color section is because, you can choose each part of color from there and see the changes instantly using customizer.
          <br /><br />Highly customizable colors are in <strong>Appearance > Customize</strong>', 'fawzi'),
      ),

    ),
  );

  // ------------------------------
  // Typography section
  // ------------------------------
  $options[]   = array(
    'name'     => 'theme_typo_section',
    'title'    => esc_html__('Typography', 'fawzi'),
    'icon'     => 'fa fa-header',
    'fields' => array(

      // Start fields
      array(
        'id'                  => 'typography',
        'type'                => 'group',
        'fields'              => array(
          array(
            'id'              => 'title',
            'type'            => 'text',
            'title'           => esc_html__('Title', 'fawzi'),
          ),
          array(
            'id'              => 'selector',
            'type'            => 'textarea',
            'title'           => esc_html__('Selector', 'fawzi'),
            'info'           => __('Enter css selectors like : <strong>body, .custom-class</strong>', 'fawzi'),
          ),
          array(
            'id'              => 'font',
            'type'            => 'typography',
            'title'           => esc_html__('Font Family', 'fawzi'),
          ),
          array(
            'id'              => 'size',
            'type'            => 'text',
            'title'           => esc_html__('Font Size', 'fawzi'),
          ),
          array(
            'id'              => 'line_height',
            'type'            => 'text',
            'title'           => esc_html__('Line-Height', 'fawzi'),
          ),
          array(
            'id'              => 'css',
            'type'            => 'textarea',
            'title'           => esc_html__('Custom CSS', 'fawzi'),
          ),
        ),
        'button_title'        => esc_html__('Add New Typography', 'fawzi'),
        'accordion_title'     => esc_html__('New Typography', 'fawzi'),
        'default'             => array(
          array(
            'title'           => esc_html__('Body Typography', 'fawzi'),
            'selector'        => 'body, .fwzi-btn, .section-title-wrap h5, input[type="text"], input[type="email"], input[type="password"], input[type="tel"], input[type="search"], input[type="date"], input[type="time"], input[type="datetime-local"], input[type="month"], input[type="url"], input[type="number"], textarea, select, .form-control, input[type="submit"], form input, form textarea, form select, .feature-links .nav-tabs > li > a > .feature-title, .fwzi-seo-package label, .fwzi-footer .fwzi-widget',
            'font'            => array(
              'family'        => 'Poppins',
              'variant'       => 'regular',
            ),
            'size'            => '14px',
            'line_height'     => '1.42857143',
          ),
          array(
            'title'           => esc_html__('Menu Typography', 'fawzi'),
            'selector'        => '.fwzi-navigation .navbar-nav > li > a, .mean-container .mean-nav ul li a',
            'font'            => array(
              'family'        => 'Poppins',
              'variant'       => 'regular',
            ),
            'size'            => '15px',
          ),
          array(
            'title'           => esc_html__('Sub Menu Typography', 'fawzi'),
            'selector'        => '.dropdown-menu, .mean-container .mean-nav ul.sub-menu li a',
            'font'            => array(
              'family'        => 'Poppins',
              'variant'       => 'regular',
            ),
            'size'            => '12px',
            'line_height'     => '1.42857143',
          ),
          array(
            'title'           => esc_html__('Headings Typography', 'fawzi'),
            'selector'        => 'h1, h2, h3, h4, h5, h6, .text-logo',
            'font'            => array(
              'family'        => 'Roboto',
              'variant'       => 'regular',
            ),
          ),
          array(
            'title'           => esc_html__('Shortcode Elements Primary Font', 'fawzi'),
            'selector'        => '.wp-pagenavi, ul.page-numbers, .nav-tabs > li > a, .panel-title a, .case-studies-single .section-title, .section-title, .feature-title, .revenue-title, .score-title, .status-item, .process-title, .plan-title, .plan-price, .plan-info ul, .fwzi-blog .blog-meta, .blog-title, .callout-title, .service-title, .feature-item .service-title, .optimization-title, .search-result-title, .book-title, .page-title, .difference-wrap-title, .difference-title, .tutorial-title, .author-name, .advertising-title, .case-studies-single h2, .growth-title, .growth-point-title, .growth-points-style-two .growth-point, .blog-date, .blog-month, .fwzi-like, .fwzi-widget, .fwzi-widget input[type="text"], .fwzi-widget input[type="email"], .fwzi-widget input[type="password"], .fwzi-widget input[type="tel"], .fwzi-widget input[type="search"], .fwzi-widget input[type="date"], .fwzi-widget input[type="time"], .fwzi-widget input[type="datetime-local"], .fwzi-widget input[type="month"], .fwzi-widget input[type="url"], .fwzi-widget input[type="number"], .fwzi-widget select, .fwzi-widget .form-control, .fwzi-unit-fix h1, .fwzi-unit-fix h2, .fwzi-unit-fix h3, .fwzi-unit-fix h4, .fwzi-unit-fix h5, .fwzi-unit-fix h6, .fwzi-blog-meta, .comments-reply, .fwzi-download-request input[type="text"], .fwzi-download-request input[type="email"], .fwzi-download-request input[type="password"], .fwzi-download-request input[type="tel"], .fwzi-download-request input[type="search"], .fwzi-download-request input[type="date"], .fwzi-download-request input[type="time"], .fwzi-download-request input[type="datetime-local"], .fwzi-download-request input[type="month"], .fwzi-download-request input[type="url"], .fwzi-download-request input[type="number"], .fwzi-download-request select, .fwzi-download-request .form-control, .contact-wrap-title, .contact-detail .contact-link .contact-label, .error-title, .footer-column-title, .fwzi-copyright',
            'font'            => array(
              'family'        => 'Roboto',
              'variant'       => 'regular',
            ),
          ),
          array(
            'title'           => esc_html__('Shortcode Elements Secondary Font', 'fawzi'),
            'selector'        => '.score-number, .blog-meta, .fwzi-free-audit label, .fwzi-free-audit p, .fwzi-growth-share .fwzi-social.square a .social-title, .post-info .post-time, .comment-info .comment-text p, .comment-form input[type="submit"]',
            'font'            => array(
              'family'        => 'Lato',
              'variant'       => 'regular',
            ),
          ),
          array(
            'title'           => esc_html__('Example Usage', 'fawzi'),
            'selector'        => '.your-custom-class',
            'font'            => array(
              'family'        => 'Poppins',
              'variant'       => 'regular',
            ),
          ),
        ),
      ),

      // Subset
      array(
        'id'                  => 'subsets',
        'type'                => 'select',
        'title'               => esc_html__('Subsets', 'fawzi'),
        'class'               => 'chosen',
        'options'             => array(
          'latin'             => 'latin',
          'latin-ext'         => 'latin-ext',
          'cyrillic'          => 'cyrillic',
          'cyrillic-ext'      => 'cyrillic-ext',
          'greek'             => 'greek',
          'greek-ext'         => 'greek-ext',
          'vietnamese'        => 'vietnamese',
          'devanagari'        => 'devanagari',
          'khmer'             => 'khmer',
        ),
        'attributes'         => array(
          'data-placeholder' => 'Subsets',
          'multiple'         => 'multiple',
          'style'            => 'width: 200px;'
        ),
        'default'             => array( 'latin' ),
      ),

      array(
        'id'                  => 'font_weight',
        'type'                => 'select',
        'title'               => esc_html__('Font Weights', 'fawzi'),
        'class'               => 'chosen',
        'options'             => array(
          '100'   => 'Thin 100',
          '100i'  => 'Thin 100 Italic',
          '200'   => 'Extra Light 200',
          '200i'  => 'Extra Light 200 Italic',
          '300'   => 'Light 300',
          '300i'  => 'Light 300 Italic',
          '400'   => 'Regular 400',
          '400i'  => 'Regular 400 Italic',
          '500'   => 'Medium 500',
          '500i'  => 'Medium 500 Italic',
          '600'   => 'Semi Bold 600',
          '600i'  => 'Semi Bold 600 Italic',
          '700'   => 'Bold 700',
          '700i'  => 'Bold 700 Italic',
          '800'   => 'Extra Bold 800',
          '800i'  => 'Extra Bold 800 Italic',
          '900'   => 'Black 900',
          '900i'  => 'Black 900 Italic',
        ),
        'attributes'         => array(
          'data-placeholder' => 'Font Weight',
          'multiple'         => 'multiple',
          'style'            => 'width: 200px;'
        ),
        'default'             => array( '400' ),
      ),

      // Custom Fonts Upload
      array(
        'id'                 => 'font_family',
        'type'               => 'group',
        'title'              => 'Upload Custom Fonts',
        'button_title'       => 'Add New Custom Font',
        'accordion_title'    => 'Adding New Font',
        'accordion'          => true,
        'desc'               => 'It is simple. Only add your custom fonts and click to save. After you can check "Font Family" selector. Do not forget to Save!',
        'fields'             => array(

          array(
            'id'             => 'name',
            'type'           => 'text',
            'title'          => 'Font-Family Name',
            'attributes'     => array(
              'placeholder'  => 'for eg. Arial'
            ),
          ),

          array(
            'id'             => 'ttf',
            'type'           => 'upload',
            'title'          => 'Upload .ttf <small><i>(optional)</i></small>',
            'settings'       => array(
              'upload_type'  => 'font',
              'insert_title' => 'Use this Font-Format',
              'button_title' => 'Upload <i>.ttf</i>',
            ),
          ),

          array(
            'id'             => 'eot',
            'type'           => 'upload',
            'title'          => 'Upload .eot <small><i>(optional)</i></small>',
            'settings'       => array(
              'upload_type'  => 'font',
              'insert_title' => 'Use this Font-Format',
              'button_title' => 'Upload <i>.eot</i>',
            ),
          ),

          array(
            'id'             => 'otf',
            'type'           => 'upload',
            'title'          => 'Upload .otf <small><i>(optional)</i></small>',
            'settings'       => array(
              'upload_type'  => 'font',
              'insert_title' => 'Use this Font-Format',
              'button_title' => 'Upload <i>.otf</i>',
            ),
          ),

          array(
            'id'             => 'woff',
            'type'           => 'upload',
            'title'          => 'Upload .woff <small><i>(optional)</i></small>',
            'settings'       => array(
              'upload_type'  => 'font',
              'insert_title' => 'Use this Font-Format',
              'button_title' => 'Upload <i>.woff</i>',
            ),
          ),

          array(
            'id'             => 'css',
            'type'           => 'textarea',
            'title'          => 'Extra CSS Style <small><i>(optional)</i></small>',
            'attributes'     => array(
              'placeholder'  => 'for eg. font-weight: normal;'
            ),
          ),

        ),
      ),
      // End All field

    ),
  );

  // ------------------------------
  // Pages
  // ------------------------------
  $options[] = array(
    'name'   => 'theme_pages',
    'title'  => esc_html__('Pages', 'fawzi'),
    'icon'   => 'fa fa-files-o'
  );

  // ------------------------------
  // Case Studies Section
  // ------------------------------
  $options[]   = array(
    'name'     => 'case_studies_section',
    'title'    => esc_html__('Case Studies', 'fawzi'),
    'icon'     => 'fa fa-briefcase',
    'fields' => array(

      // case_studies name change
      array(
        'type'    => 'notice',
        'class'   => 'info cs-vt-heading',
        'content' => esc_html__('Name Change', 'fawzi')
      ),
      array(
        'id'      => 'theme_case_studies_name',
        'type'    => 'text',
        'title'   => esc_html__('Case Studies Name', 'fawzi'),
        'attributes'     => array(
          'placeholder'  => 'Case Studies'
        ),
      ),
      array(
        'id'      => 'theme_case_studies_slug',
        'type'    => 'text',
        'title'   => esc_html__('Case Studies Slug', 'fawzi'),
        'attributes'     => array(
          'placeholder'  => 'casestudies-item'
        ),
      ),
      array(
        'id'      => 'theme_case_studies_cat_slug',
        'type'    => 'text',
        'title'   => esc_html__('Case Studies Category Slug', 'fawzi'),
        'attributes'     => array(
          'placeholder'  => 'casestudies-category'
        ),
      ),
      array(
        'type'    => 'notice',
        'class'   => 'danger',
        'content' => __('<strong>Important</strong>: Please do not set case_studies slug and page slug as same. It\'ll not work.', 'fawzi')
      ),
      // Case Studies Name

      // case_studies listing
      array(
        'type'    => 'notice',
        'class'   => 'info cs-vt-heading',
        'content' => esc_html__('Case Studies Style', 'fawzi')
      ),
      array(
        'id'             => 'case_studies_column',
        'type'           => 'select',
        'title'          => esc_html__('Case Studies Column', 'fawzi'),
        'options'        => array(
          'col-md-6 col-sm-6 col-xs-12' => esc_html__('Two Columns', 'fawzi'),
          'col-md-4 col-sm-4 col-xs-12' => esc_html__('Three Columns', 'fawzi'),
        ),
        'default_option'     => esc_html__('Select Case Studies Column', 'fawzi'),
      ),
      array(
        'id'      => 'case_studies_limit',
        'type'    => 'text',
        'title'   => esc_html__('Case Studies Limit', 'fawzi'),
        'attributes'     => array(
          'placeholder'  => '10'
        ),
      ),
      array(
        'id'      => 'case_studies_show_category',
        'type'    => 'text',
        'title'   => esc_html__('Case Studies Categorys', 'fawzi'),
        'info'   => esc_html__('Enter category SLUGS (comma separated) you want to display.', 'fawzi'),
      ),
      array(
        'id'             => 'case_studies_orderby',
        'type'           => 'select',
        'title'          => esc_html__('Order By', 'fawzi'),
        'options'        => array(
          'none' => esc_html__('None', 'fawzi'),
          'ID' => esc_html__('ID', 'fawzi'),
          'author' => esc_html__('Author', 'fawzi'),
          'title' => esc_html__('Title', 'fawzi'),
          'date' => esc_html__('Date', 'fawzi'),
        ),
        'default_option'     => esc_html__('Select Case Studies Order By', 'fawzi'),
      ),
      array(
        'id'             => 'case_studies_order',
        'type'           => 'select',
        'title'          => esc_html__('Order', 'fawzi'),
        'options'        => array(
          'ASC' => esc_html__('Asending', 'fawzi'),
          'DESC' => esc_html__('Desending', 'fawzi'),
        ),
        'default_option'     => esc_html__('Select Case Studies Order', 'fawzi'),
      ),

      array(
        'type'    => 'notice',
        'class'   => 'info cs-vt-heading',
        'content' => esc_html__('Enable/Disable Options', 'fawzi')
      ),
      array(
        'id'      => 'case_studies_filter',
        'type'    => 'switcher',
        'title'   => esc_html__('Filter', 'fawzi'),
        'label'   => esc_html__('If you need filter in case studies pages, please turn this ON.', 'fawzi'),
        'default'   => true,
      ),
      array(
        'id'      => 'case_studies_pagination',
        'type'    => 'switcher',
        'title'   => esc_html__('Pagination', 'fawzi'),
        'label'   => esc_html__('If you need pagination in case studies pages, please turn this ON.', 'fawzi'),
        'default'   => true,
      ),
      array(
        'id'      => 'case_studies_pagination_type',
        'type'    => 'select',
        'title'   => esc_html__('Case Studies Pagination Type', 'fawzi'),
        'options'        => array(
          'load-more' => esc_html__('Ajax Button', 'fawzi'),
          'infinite-scroll' => esc_html__('Ajax Infinite Scroll', 'fawzi'),
          'navigation' => esc_html__('Navigation', 'fawzi'),
        ),
        'dependency'     => array('case_studies_pagination', '!=', 'false'),
      ),
      array(
        'id'      => 'cs_more_btn_text',
        'type'    => 'text',
        'title'   => esc_html__('Button Text', 'fawzi'),
        'info'   => esc_html__('Enter the button text.', 'fawzi'),
        'dependency'     => array('case_studies_pagination_type|case_studies_pagination', '==|==', 'load-more|true'),
      ),
      array(
        'id'        => 'cs_loader_icon_option',
        'type'      => 'select',
        'options'   => array(
          'ball-scale-multiple'         => esc_html__('Ball Scale Multiple', 'fawzi'),
          'ball-pulse'                  => esc_html__('Ball Pulse', 'fawzi'),
          'ball-grid-pulse'             => esc_html__('Ball Grid Pulse', 'fawzi'),
          'ball-clip-rotate'            => esc_html__('Ball Clip Rotate', 'fawzi'),
          'ball-clip-rotate-pulse'      => esc_html__('Ball Clip Rotate Pulse', 'fawzi'),
          'square-spin'                 => esc_html__('Square Spin', 'fawzi'),
          'ball-clip-rotate-multiple'   => esc_html__('Ball Clip Rotate Multiple', 'fawzi'),
          'ball-pulse-rise'             => esc_html__('Ball Pulse Rise', 'fawzi'),
          'ball-rotate'                 => esc_html__('Ball Rotate', 'fawzi'),
          'cube-transition'             => esc_html__('Cube Transition', 'fawzi'),
          'ball-zig-zag'                => esc_html__('Ball Zig Zag', 'fawzi'),
          'ball-zig-zag-deflect'        => esc_html__('Ball Zig Zag Deflect', 'fawzi'),
          'ball-triangle-path'          => esc_html__('Ball Triangle Path', 'fawzi'),
          'ball-scale'                  => esc_html__('Ball Scale', 'fawzi'),
          'line-scale'                  => esc_html__('Line Scale', 'fawzi'),
          'line-scale-party'            => esc_html__('Line Scale Party', 'fawzi'),
          'ball-pulse-sync'             => esc_html__('Ball Pulse Sync', 'fawzi'),
          'ball-beat'                   => esc_html__('Ball Beat', 'fawzi'),
          'line-scale-pulse-out'        => esc_html__('Line Scale Pulse Out', 'fawzi'),
          'line-scale-pulse-out-rapid'  => esc_html__('Line Scale Pulse Out Rapid', 'fawzi'),
          'ball-scale-ripple'           => esc_html__('Ball Scale Ripple', 'fawzi'),
          'ball-scale-ripple-multiple'  => esc_html__('Ball Scale Ripple Multiple', 'fawzi'),
          'ball-spin-fade-loader'       => esc_html__('Ball Spin Fade Loader', 'fawzi'),
          'line-spin-fade-loader'       => esc_html__('Line Spin Fade Loader', 'fawzi'),
          'triangle-skew-spin'          => esc_html__('Triangle Skew Spin', 'fawzi'),
          'pacman'                      => esc_html__('Pacman', 'fawzi'),
          'ball-grid-beat'              => esc_html__('Ball Grid Beat', 'fawzi'),
          'semi-circle-spin'            => esc_html__('Semi Circle Spin', 'fawzi'),
        ),
        'dependency'     => array('case_studies_pagination_type|case_studies_pagination', '==|==', 'infinite-scroll|true'),
        'title'     => esc_html__('Loader Icon Style', 'fawzi'),
      ),

      array(
        'type'    => 'notice',
        'class'   => 'info cs-vt-heading',
        'content' => esc_html__('Single Case Studies', 'fawzi')
      ),
      array(
        'id'      => 'case_studies_single_pagination',
        'type'    => 'switcher',
        'title'   => esc_html__('Next & Prev Navigation', 'fawzi'),
        'label'   => esc_html__('If you don\'t want next and previous navigation in case studies single pages, please turn this OFF.', 'fawzi'),
        'default'   => true,
      ),
      array(
        'id'      => 'case_studies_single_url',
        'type'    => 'text',
        'title'   => esc_html__('Navigation Section URL', 'fawzi'),
      ),
      // Case Studies Listing

    ),
  );

  // ------------------------------
  // Team Section
  // ------------------------------
  $options[]   = array(
    'name'     => 'team_section',
    'title'    => esc_html__('Team', 'fawzi'),
    'icon'     => 'fa fa-users',
    'fields' => array(

      // Team Start
      array(
        'type'    => 'notice',
        'class'   => 'info cs-vt-heading',
        'content' => esc_html__('Team', 'fawzi')
      ),
      array(
        'id'      => 'team_limit',
        'type'    => 'text',
        'title'   => esc_html__('Team Limit', 'fawzi'),
      ),
      array(
        'id'             => 'team_orderby',
        'type'           => 'select',
        'title'          => esc_html__('Order By', 'fawzi'),
        'options'        => array(
          'none' => esc_html__('None', 'fawzi'),
          'ID' => esc_html__('ID', 'fawzi'),
          'author' => esc_html__('Author', 'fawzi'),
          'title' => esc_html__('Title', 'fawzi'),
          'date' => esc_html__('Date', 'fawzi'),
        ),
        'default_option'     => esc_html__('Select Team Order By', 'fawzi'),
      ),
      array(
        'id'             => 'team_order',
        'type'           => 'select',
        'title'          => esc_html__('Order', 'fawzi'),
        'options'        => array(
          'ASC' => esc_html__('Asending', 'fawzi'),
          'DESC' => esc_html__('Desending', 'fawzi'),
        ),
        'default_option'     => esc_html__('Select Team Order', 'fawzi'),
      ),
      array(
        'type'    => 'notice',
        'class'   => 'info cs-vt-heading',
        'content' => esc_html__('Team Single', 'fawzi')
      ),
      array(
        'id'             => 'team_sidebar_position',
        'type'           => 'select',
        'title'          => esc_html__('Sidebar Position', 'fawzi'),
        'options'        => array(
          'sidebar-right' => esc_html__('Right', 'fawzi'),
          'sidebar-left' => esc_html__('Left', 'fawzi'),
          'sidebar-hide' => esc_html__('Hide', 'fawzi'),
        ),
        'default_option' => 'Select sidebar position',
        'info'          => esc_html__('Default option : Right', 'fawzi'),
      ),
      array(
        'id'             => 'single_blog_widget',
        'type'           => 'select',
        'title'          => esc_html__('Sidebar Widget', 'fawzi'),
        'options'        => fawzi_vt_registered_sidebars(),
        'default_option' => esc_html__('Select Widget', 'fawzi'),
        'dependency'     => array('single_sidebar_position', '!=', 'sidebar-hide'),
        'info'          => esc_html__('Default option : Main Widget Area', 'fawzi'),
      ),
      // Team End

    ),
  );

  // ------------------------------
  // Resource Section
  // ------------------------------
  $options[]   = array(
    'name'     => 'resource_section',
    'title'    => esc_html__('Resource', 'fawzi'),
    'icon'     => 'fa fa-users',
    'fields' => array(

      // Resource Start
      array(
        'type'    => 'notice',
        'class'   => 'info cs-vt-heading',
        'content' => esc_html__('Resource', 'fawzi')
      ),
      array(
        'id'      => 'resource_limit',
        'type'    => 'text',
        'title'   => esc_html__('Resource Limit', 'fawzi'),
      ),
      array(
        'id'             => 'resource_orderby',
        'type'           => 'select',
        'title'          => esc_html__('Order By', 'fawzi'),
        'options'        => array(
          'none' => esc_html__('None', 'fawzi'),
          'ID' => esc_html__('ID', 'fawzi'),
          'author' => esc_html__('Author', 'fawzi'),
          'title' => esc_html__('Title', 'fawzi'),
          'date' => esc_html__('Date', 'fawzi'),
        ),
        'default_option'     => esc_html__('Select Resources Order By', 'fawzi'),
      ),
      array(
        'id'             => 'resource_order',
        'type'           => 'select',
        'title'          => esc_html__('Order', 'fawzi'),
        'options'        => array(
          'ASC' => esc_html__('Asending', 'fawzi'),
          'DESC' => esc_html__('Desending', 'fawzi'),
        ),
        'default_option'     => esc_html__('Select Resources Order', 'fawzi'),
      ),
      array(
        'type'    => 'notice',
        'class'   => 'info cs-vt-heading',
        'content' => esc_html__('Enable/Disable Options', 'fawzi')
      ),
      array(
        'id'      => 'resource_pagination',
        'type'    => 'switcher',
        'title'   => esc_html__('Pagination', 'fawzi'),
        'label'   => esc_html__('If you need pagination in resources pages, please turn this ON.', 'fawzi'),
        'default'   => true,
      ),
      array(
        'id'      => 'resource_pagination_type',
        'type'    => 'select',
        'title'   => esc_html__('Case Studies Pagination Type', 'fawzi'),
        'options'        => array(
          'load-more' => esc_html__('Ajax Button', 'fawzi'),
          'infinite-scroll' => esc_html__('Ajax Infinite Scroll', 'fawzi'),
          'navigation' => esc_html__('Navigation', 'fawzi'),
        ),
        'dependency'     => array('resource_pagination', '!=', 'false'),
      ),
      array(
        'id'      => 'resource_more_btn_text',
        'type'    => 'text',
        'title'   => esc_html__('Button Text', 'fawzi'),
        'info'   => esc_html__('Enter the button text.', 'fawzi'),
        'dependency'     => array('resource_pagination_type|resource_pagination', '==|==', 'load-more|true'),
      ),
      array(
        'id'        => 'resource_loader_icon_option',
        'type'      => 'select',
        'options'   => array(
          'ball-scale-multiple'         => esc_html__('Ball Scale Multiple', 'fawzi'),
          'ball-pulse'                  => esc_html__('Ball Pulse', 'fawzi'),
          'ball-grid-pulse'             => esc_html__('Ball Grid Pulse', 'fawzi'),
          'ball-clip-rotate'            => esc_html__('Ball Clip Rotate', 'fawzi'),
          'ball-clip-rotate-pulse'      => esc_html__('Ball Clip Rotate Pulse', 'fawzi'),
          'square-spin'                 => esc_html__('Square Spin', 'fawzi'),
          'ball-clip-rotate-multiple'   => esc_html__('Ball Clip Rotate Multiple', 'fawzi'),
          'ball-pulse-rise'             => esc_html__('Ball Pulse Rise', 'fawzi'),
          'ball-rotate'                 => esc_html__('Ball Rotate', 'fawzi'),
          'cube-transition'             => esc_html__('Cube Transition', 'fawzi'),
          'ball-zig-zag'                => esc_html__('Ball Zig Zag', 'fawzi'),
          'ball-zig-zag-deflect'        => esc_html__('Ball Zig Zag Deflect', 'fawzi'),
          'ball-triangle-path'          => esc_html__('Ball Triangle Path', 'fawzi'),
          'ball-scale'                  => esc_html__('Ball Scale', 'fawzi'),
          'line-scale'                  => esc_html__('Line Scale', 'fawzi'),
          'line-scale-party'            => esc_html__('Line Scale Party', 'fawzi'),
          'ball-pulse-sync'             => esc_html__('Ball Pulse Sync', 'fawzi'),
          'ball-beat'                   => esc_html__('Ball Beat', 'fawzi'),
          'line-scale-pulse-out'        => esc_html__('Line Scale Pulse Out', 'fawzi'),
          'line-scale-pulse-out-rapid'  => esc_html__('Line Scale Pulse Out Rapid', 'fawzi'),
          'ball-scale-ripple'           => esc_html__('Ball Scale Ripple', 'fawzi'),
          'ball-scale-ripple-multiple'  => esc_html__('Ball Scale Ripple Multiple', 'fawzi'),
          'ball-spin-fade-loader'       => esc_html__('Ball Spin Fade Loader', 'fawzi'),
          'line-spin-fade-loader'       => esc_html__('Line Spin Fade Loader', 'fawzi'),
          'triangle-skew-spin'          => esc_html__('Triangle Skew Spin', 'fawzi'),
          'pacman'                      => esc_html__('Pacman', 'fawzi'),
          'ball-grid-beat'              => esc_html__('Ball Grid Beat', 'fawzi'),
          'semi-circle-spin'            => esc_html__('Semi Circle Spin', 'fawzi'),
        ),
        'dependency'     => array('resource_pagination_type|resource_pagination', '==|==', 'infinite-scroll|true'),
        'title'     => esc_html__('Loader Icon Style', 'fawzi'),
      ),
      // Resource End

    ),
  );

  // ------------------------------
  // Blog Section
  // ------------------------------
  $options[]   = array(
    'name'     => 'blog_section',
    'title'    => esc_html__('Blog', 'fawzi'),
    'icon'     => 'fa fa-edit',
    'sections' => array(

      // blog general section
      array(
        'name'     => 'blog_general_tab',
        'title'    => esc_html__('General', 'fawzi'),
        'icon'     => 'fa fa-cog',
        'fields'   => array(

          // Layout
          array(
            'type'    => 'notice',
            'class'   => 'info cs-vt-heading',
            'content' => esc_html__('Layout', 'fawzi')
          ),
          array(
            'id'             => 'blog_sidebar_position',
            'type'           => 'select',
            'title'          => esc_html__('Sidebar Position', 'fawzi'),
            'options'        => array(
              'sidebar-right' => esc_html__('Right', 'fawzi'),
              'sidebar-left' => esc_html__('Left', 'fawzi'),
              'sidebar-hide' => esc_html__('Hide', 'fawzi'),
            ),
            'default_option' => 'Select sidebar position',
            'help'          => esc_html__('This style will apply, default blog pages - Like : Archive, Category, Tags, Search & Author.', 'fawzi'),
            'info'          => esc_html__('Default option : Right', 'fawzi'),
          ),
          array(
            'id'             => 'blog_widget',
            'type'           => 'select',
            'title'          => esc_html__('Sidebar Widget', 'fawzi'),
            'options'        => fawzi_vt_registered_sidebars(),
            'default_option' => esc_html__('Select Widget', 'fawzi'),
            'dependency'     => array('blog_sidebar_position', '!=', 'sidebar-hide'),
            'info'          => esc_html__('Default option : Main Widget Area', 'fawzi'),
          ),
          // Layout
          // Global Options
          array(
            'type'    => 'notice',
            'class'   => 'info cs-vt-heading',
            'content' => esc_html__('Global Options', 'fawzi')
          ),
          array(
            'id'         => 'theme_exclude_categories',
            'type'       => 'checkbox',
            'title'      => esc_html__('Exclude Categories', 'fawzi'),
            'info'      => esc_html__('Select categories you want to exclude from blog page.', 'fawzi'),
            'options'    => 'categories',
          ),
          array(
            'id'      => 'theme_blog_excerpt',
            'type'    => 'text',
            'title'   => esc_html__('Excerpt Length', 'fawzi'),
            'info'   => esc_html__('Blog short content length, in blog listing pages.', 'fawzi'),
            'default' => '55',
          ),
          array(
            'id'      => 'theme_metas_hide',
            'type'    => 'checkbox',
            'title'   => esc_html__('Meta\'s to hide', 'fawzi'),
            'info'    => esc_html__('Check items you want to hide from blog/post meta field.', 'fawzi'),
            'class'      => 'horizontal',
            'options'    => array(
              'category'   => esc_html__('Category', 'fawzi'),
              'date'    => esc_html__('Date', 'fawzi'),
              'author'     => esc_html__('Author', 'fawzi'),
              'comments'      => esc_html__('Comments', 'fawzi'),
            ),
            // 'default' => '30',
          ),
          array(
            'id'      => 'blog_pagination',
            'type'    => 'switcher',
            'title'   => esc_html__('Pagination', 'fawzi'),
            'label'   => esc_html__('If you need pagination in blog page, please turn this ON.', 'fawzi'),
            'default'   => true,
          ),
          array(
            'id'      => 'blog_pagination_type',
            'type'    => 'select',
            'title'   => esc_html__('Blog Pagination Type', 'fawzi'),
            'options'        => array(
              'load-more' => esc_html__('Ajax Button', 'fawzi'),
              'infinite-scroll' => esc_html__('Ajax Infinite Scroll', 'fawzi'),
              'navigation' => esc_html__('Navigation', 'fawzi'),
            ),
            'dependency'     => array('blog_pagination', '!=', 'false'),
          ),
          array(
            'id'      => 'blog_more_btn_text',
            'type'    => 'text',
            'title'   => esc_html__('Button Text', 'fawzi'),
            'info'   => esc_html__('Enter the button text.', 'fawzi'),
            'dependency'     => array('blog_pagination_type|blog_pagination', '==|==', 'load-more|true'),
          ),
          array(
            'id'        => 'loader_icon_option',
            'type'      => 'select',
            'options'   => array(
              'ball-scale-multiple'         => esc_html__('Ball Scale Multiple', 'fawzi'),
              'ball-pulse'                  => esc_html__('Ball Pulse', 'fawzi'),
              'ball-grid-pulse'             => esc_html__('Ball Grid Pulse', 'fawzi'),
              'ball-clip-rotate'            => esc_html__('Ball Clip Rotate', 'fawzi'),
              'ball-clip-rotate-pulse'      => esc_html__('Ball Clip Rotate Pulse', 'fawzi'),
              'square-spin'                 => esc_html__('Square Spin', 'fawzi'),
              'ball-clip-rotate-multiple'   => esc_html__('Ball Clip Rotate Multiple', 'fawzi'),
              'ball-pulse-rise'             => esc_html__('Ball Pulse Rise', 'fawzi'),
              'ball-rotate'                 => esc_html__('Ball Rotate', 'fawzi'),
              'cube-transition'             => esc_html__('Cube Transition', 'fawzi'),
              'ball-zig-zag'                => esc_html__('Ball Zig Zag', 'fawzi'),
              'ball-zig-zag-deflect'        => esc_html__('Ball Zig Zag Deflect', 'fawzi'),
              'ball-triangle-path'          => esc_html__('Ball Triangle Path', 'fawzi'),
              'ball-scale'                  => esc_html__('Ball Scale', 'fawzi'),
              'line-scale'                  => esc_html__('Line Scale', 'fawzi'),
              'line-scale-party'            => esc_html__('Line Scale Party', 'fawzi'),
              'ball-pulse-sync'             => esc_html__('Ball Pulse Sync', 'fawzi'),
              'ball-beat'                   => esc_html__('Ball Beat', 'fawzi'),
              'line-scale-pulse-out'        => esc_html__('Line Scale Pulse Out', 'fawzi'),
              'line-scale-pulse-out-rapid'  => esc_html__('Line Scale Pulse Out Rapid', 'fawzi'),
              'ball-scale-ripple'           => esc_html__('Ball Scale Ripple', 'fawzi'),
              'ball-scale-ripple-multiple'  => esc_html__('Ball Scale Ripple Multiple', 'fawzi'),
              'ball-spin-fade-loader'       => esc_html__('Ball Spin Fade Loader', 'fawzi'),
              'line-spin-fade-loader'       => esc_html__('Line Spin Fade Loader', 'fawzi'),
              'triangle-skew-spin'          => esc_html__('Triangle Skew Spin', 'fawzi'),
              'pacman'                      => esc_html__('Pacman', 'fawzi'),
              'ball-grid-beat'              => esc_html__('Ball Grid Beat', 'fawzi'),
              'semi-circle-spin'            => esc_html__('Semi Circle Spin', 'fawzi'),
            ),
            'dependency'     => array('blog_pagination_type|blog_pagination', '==|==', 'infinite-scroll|true'),
            'title'     => esc_html__('Loader Icon Style', 'fawzi'),
          ),
          // End fields

        )
      ),

      // blog single section
      array(
        'name'     => 'blog_single_tab',
        'title'    => esc_html__('Single', 'fawzi'),
        'icon'     => 'fa fa-sticky-note',
        'fields'   => array(

          // Start fields
          array(
            'type'    => 'notice',
            'class'   => 'info cs-vt-heading',
            'content' => esc_html__('Enable / Disable', 'fawzi')
          ),
          array(
            'id'    => 'single_featured_image',
            'type'  => 'switcher',
            'title' => esc_html__('Featured Image', 'fawzi'),
            'info' => esc_html__('If need to hide featured image from single blog post page, please turn this OFF.', 'fawzi'),
            'default' => true,
          ),
          array(
            'id'    => 'single_author_info',
            'type'  => 'switcher',
            'title' => esc_html__('Author Info', 'fawzi'),
            'info' => esc_html__('If need to hide author info on single blog page, please turn this OFF.', 'fawzi'),
            'default' => true,
          ),
          array(
            'id'    => 'single_share_option',
            'type'  => 'switcher',
            'title' => esc_html__('Share Option', 'fawzi'),
            'info' => esc_html__('If need to hide share option on single blog page, please turn this OFF.', 'fawzi'),
            'default' => true,
          ),

          array(
            'type'    => 'notice',
            'class'   => 'info cs-vt-heading',
            'content' => esc_html__('Sidebar', 'fawzi')
          ),
          array(
            'id'             => 'single_sidebar_position',
            'type'           => 'select',
            'title'          => esc_html__('Sidebar Position', 'fawzi'),
            'options'        => array(
              'sidebar-right' => esc_html__('Right', 'fawzi'),
              'sidebar-left' => esc_html__('Left', 'fawzi'),
              'sidebar-hide' => esc_html__('Hide', 'fawzi'),
            ),
            'default_option' => 'Select sidebar position',
            'info'          => esc_html__('Default option : Right', 'fawzi'),
          ),
          array(
            'id'             => 'single_blog_widget',
            'type'           => 'select',
            'title'          => esc_html__('Sidebar Widget', 'fawzi'),
            'options'        => fawzi_vt_registered_sidebars(),
            'default_option' => esc_html__('Select Widget', 'fawzi'),
            'dependency'     => array('single_sidebar_position', '!=', 'sidebar-hide'),
            'info'          => esc_html__('Default option : Main Widget Area', 'fawzi'),
          ),
          // End fields

        )
      ),

    ),
  );

  // ------------------------------
  // Extra Pages
  // ------------------------------
  $options[]   = array(
    'name'     => 'theme_extra_pages',
    'title'    => esc_html__('Extra Pages', 'fawzi'),
    'icon'     => 'fa fa-clone',
    'sections' => array(

      // error 404 page
      array(
        'name'     => 'error_page_section',
        'title'    => esc_html__('404 Page', 'fawzi'),
        'icon'     => 'fa fa-exclamation-triangle',
        'fields'   => array(

          // Start 404 Page
          array(
            'id'    => 'error_heading',
            'type'  => 'text',
            'title' => esc_html__('404 Page Heading', 'fawzi'),
            'info'  => esc_html__('Enter 404 page heading.', 'fawzi'),
          ),
          array(
            'id'    => 'error_page_content',
            'type'  => 'textarea',
            'title' => esc_html__('404 Page Content', 'fawzi'),
            'info'  => esc_html__('Enter 404 page content.', 'fawzi'),
            'shortcode' => true,
          ),
          array(
            'id'    => 'error_page_bg',
            'type'  => 'image',
            'title' => esc_html__('404 Page Background', 'fawzi'),
            'info'  => esc_html__('Choose 404 page background styles.', 'fawzi'),
            'add_title' => esc_html__('Add 404 Image', 'fawzi'),
          ),
          array(
            'id'    => 'error_btn_text',
            'type'  => 'text',
            'title' => esc_html__('Button Text', 'fawzi'),
            'info'  => esc_html__('Enter BACK TO HOME button text. If you want to change it.', 'fawzi'),
          ),
          // End 404 Page

        ) // end: fields
      ), // end: fields section

      // maintenance mode page
      array(
        'name'     => 'maintenance_mode_section',
        'title'    => esc_html__('Maintenance Mode', 'fawzi'),
        'icon'     => 'fa fa-hourglass-half',
        'fields'   => array(

          // Start Maintenance Mode
          array(
            'type'    => 'notice',
            'class'   => 'info cs-vt-heading',
            'content' => __('If you turn this ON : Only Logged in users will see your pages. All other visiters will see, selected page of : <strong>Maintenance Mode Page</strong>', 'fawzi')
          ),
          array(
            'id'             => 'enable_maintenance_mode',
            'type'           => 'switcher',
            'title'          => esc_html__('Maintenance Mode', 'fawzi'),
            'default'        => false,
          ),
          array(
            'id'             => 'maintenance_mode_page',
            'type'           => 'select',
            'title'          => esc_html__('Maintenance Mode Page', 'fawzi'),
            'options'        => 'pages',
            'default_option' => esc_html__('Select a page', 'fawzi'),
            'dependency'   => array( 'enable_maintenance_mode', '==', 'true' ),
          ),
          array(
            'id'             => 'maintenance_mode_bg',
            'type'           => 'background',
            'title'          => esc_html__('Page Background', 'fawzi'),
            'dependency'   => array( 'enable_maintenance_mode', '==', 'true' ),
          ),
          // End Maintenance Mode

        ) // end: fields
      ), // end: fields section

    )
  );

  // ------------------------------
  // Advanced
  // ------------------------------
  $options[] = array(
    'name'   => 'theme_advanced',
    'title'  => esc_html__('Advanced', 'fawzi'),
    'icon'   => 'fa fa-cog'
  );

  // ------------------------------
  // Misc Section
  // ------------------------------
  $options[]   = array(
    'name'     => 'misc_section',
    'title'    => esc_html__('Misc', 'fawzi'),
    'icon'     => 'fa fa-recycle',
    'sections' => array(

      // custom sidebar section
      array(
        'name'     => 'custom_sidebar_section',
        'title'    => esc_html__('Custom Sidebar', 'fawzi'),
        'icon'     => 'fa fa-reorder',
        'fields'   => array(

          // start fields
          array(
            'id'              => 'custom_sidebar',
            'title'           => esc_html__('Sidebars', 'fawzi'),
            'desc'            => esc_html__('Go to Appearance -> Widgets after create sidebars', 'fawzi'),
            'type'            => 'group',
            'fields'          => array(
              array(
                'id'          => 'sidebar_name',
                'type'        => 'text',
                'title'       => esc_html__('Sidebar Name', 'fawzi'),
              ),
              array(
                'id'          => 'sidebar_desc',
                'type'        => 'text',
                'title'       => esc_html__('Custom Description', 'fawzi'),
              )
            ),
            'accordion'       => true,
            'button_title'    => esc_html__('Add New Sidebar', 'fawzi'),
            'accordion_title' => esc_html__('New Sidebar', 'fawzi'),
          ),
          // end fields

        )
      ),
      // custom sidebar section

      // Custom CSS/JS
      array(
        'name'        => 'custom_css_js_section',
        'title'       => esc_html__('Custom Codes', 'fawzi'),
        'icon'        => 'fa fa-code',

        // begin: fields
        'fields'      => array(

          // Start Custom CSS/JS
          array(
          'type'    => 'notice',
          'class'   => 'info cs-vt-heading',
          'content' => esc_html__('Custom CSS', 'fawzi')
          ),
          array(
            'id'             => 'theme_custom_css',
            'type'           => 'textarea',
            'attributes' => array(
              'rows'     => 10,
              'placeholder'     => esc_html__('Enter your CSS code here...', 'fawzi'),
            ),
          ),

          array(
            'type'    => 'notice',
            'class'   => 'info cs-vt-heading',
            'content' => esc_html__('Custom JS', 'fawzi')
          ),
          array(
            'id'             => 'theme_custom_js',
            'type'           => 'textarea',
            'attributes' => array(
              'rows'     => 10,
              'placeholder'     => esc_html__('Enter your JS code here...', 'fawzi'),
            ),
          ),
          // End Custom CSS/JS

        ) // end: fields
      ),

      // Translation
      array(
        'name'        => 'theme_translation_section',
        'title'       => esc_html__('Translation', 'fawzi'),
        'icon'        => 'fa fa-language',

        // begin: fields
        'fields'      => array(

          // Start Translation
          array(
            'type'    => 'notice',
            'class'   => 'info cs-vt-heading',
            'content' => esc_html__('Common Texts', 'fawzi')
          ),
          array(
            'id'          => 'read_more_text',
            'type'        => 'text',
            'title'       => esc_html__('Read More Text', 'fawzi'),
          ),
          array(
            'id'          => 'share_text',
            'type'        => 'text',
            'title'       => esc_html__('Share Text', 'fawzi'),
          ),
          array(
            'id'          => 'share_on_text',
            'type'        => 'text',
            'title'       => esc_html__('Share On Tooltip Text', 'fawzi'),
          ),
          array(
            'id'          => 'post_comment_text',
            'type'        => 'text',
            'title'       => esc_html__('Post Comment Text [Submit Button]', 'fawzi'),
          ),

          array(
            'type'    => 'notice',
            'class'   => 'info cs-vt-heading',
            'content' => esc_html__('Pagination', 'fawzi')
          ),
          array(
            'id'          => 'older_post',
            'type'        => 'text',
            'title'       => esc_html__('Older Posts Text', 'fawzi'),
          ),
          array(
            'id'          => 'newer_post',
            'type'        => 'text',
            'title'       => esc_html__('Newer Posts Text', 'fawzi'),
          ),

          array(
            'type'    => 'notice',
            'class'   => 'info cs-vt-heading',
            'content' => esc_html__('Single Case Studies Pagination', 'fawzi')
          ),
          array(
            'id'          => 'prev_port',
            'type'        => 'text',
            'title'       => esc_html__('Prev Case Studies Text', 'fawzi'),
          ),
          array(
            'id'          => 'next_port',
            'type'        => 'text',
            'title'       => esc_html__('Next Case Studies Text', 'fawzi'),
          ),
          // End Translation

        ) // end: fields
      ),

    ),
  );

  // ------------------------------
  // envato account
  // ------------------------------
  $options[]   = array(
    'name'     => 'envato_account_section',
    'title'    => esc_html__('Envato Account', 'fawzi'),
    'icon'     => 'fa fa-link',
    'fields'   => array(

      array(
        'type'    => 'notice',
        'class'   => 'warning',
        'content' => esc_html__('Enter your Username and API key. You can get update our themes from WordPress admin itself.', 'fawzi'),
      ),
      array(
        'id'      => 'themeforest_username',
        'type'    => 'text',
        'title'   => esc_html__('Envato Username', 'fawzi'),
      ),
      array(
        'id'      => 'themeforest_api',
        'type'    => 'text',
        'title'   => esc_html__('Envato API Key', 'fawzi'),
        'class'   => 'text-security',
        'after'   => __('<p>This is not a password field. Enter your Envato API key, which is located in : <strong>http://themeforest.net/user/[YOUR-USER-NAME]/api_keys/edit</strong></p>', 'fawzi')
      ),

    )
  );

  // ------------------------------
  // backup                       -
  // ------------------------------
  $options[]   = array(
    'name'     => 'backup_section',
    'title'    => 'Backup',
    'icon'     => 'fa fa-shield',
    'fields'   => array(

      array(
        'type'    => 'notice',
        'class'   => 'warning',
        'content' => 'You can save your current options. Download a Backup and Import.',
      ),

      array(
        'type'    => 'backup',
      ),

    )
  );

  return $options;

}
add_filter( 'cs_framework_options', 'fawzi_vt_options' );
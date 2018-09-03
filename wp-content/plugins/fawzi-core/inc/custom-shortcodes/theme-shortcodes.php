<?php
/*
 * All Custom Shortcode for [theme_name] theme.
 * Author & Copyright: VictorThemes
 * URL: http://themeforest.net/user/VictorThemes
 */

if( ! function_exists( 'fawzi_vt_shortcodes' ) ) {
  function fawzi_vt_shortcodes( $options ) {

    $options       = array();

    /* Topbar Shortcodes */
    $options[]     = array(
      'title'      => __('Topbar Shortcodes', 'fawzi'),
      'shortcodes' => array(

        // WPML
        array(
          'name'          => 'vt_topbar_wpml',
          'title'         => __('WPML Language Dropdown', 'fawzi'),
          'fields'        => array(

            array(
              'id'        => 'custom_class',
              'type'      => 'text',
              'title'     => __('Custom Class', 'fawzi'),
            ),

          ),

        ),
        // WPML

      ),
    );

    /* Header Shortcodes */
    $options[]     = array(
      'title'      => __('Header Shortcodes', 'fawzi'),
      'shortcodes' => array(

        // TopBar Details
        array(
          'name'          => 'vt_top_address_details',
          'title'         => __('Topbar Address', 'fawzi'),
          'view'          => 'clone',
          'clone_id'      => 'vt_top_address_detail',
          'clone_title'   => __('Add New', 'fawzi'),
          'fields'        => array(
            
            array(
              'id'        => 'custom_class',
              'type'      => 'text',
              'title'     => __('Custom Class', 'fawzi'),
            ),
            array(
              'id'        => 'top_search',
              'type'      => 'switcher',
              'title'     => __('Search', 'fawzi'),
              'on_search'     => __('Yes', 'fawzi'),
              'off_search'     => __('No', 'fawzi'),
              'default'     => true,
            ),
            array(
              'id'        => 'top_search_icon',
              'type'      => 'icon',
              'title'     => __('Search Icon', 'fawzi'),
              'dependency'  => array('top_search', '==', 'true'),
            ),
            array(
              'id'        => 'top_search_placeholder',
              'type'      => 'text',
              'title'     => __('Search Placeholder', 'fawzi'),
              'dependency'  => array('top_search', '==', 'true'),
            ),
            // Colors
            array(
              'type'    => 'notice',
              'class'   => 'info',
              'content' => __('Colors', 'fawzi')
            ),
            array(
              'id'        => 'icon_color',
              'type'      => 'color_picker',
              'title'     => __('Icon Color', 'fawzi'),
              'wrap_class' => 'column_third',
            ),
            array(
              'id'        => 'icon_hover_color',
              'type'      => 'color_picker',
              'title'     => __('Icon Hover Color', 'fawzi'),
              'wrap_class' => 'column_third',
            ),

            // Icon Size
            array(
              'id'        => 'icon_size',
              'type'      => 'text',
              'title'     => __('Icon Size', 'fawzi'),
              'wrap_class' => 'column_full',
            ),

          ),
          'clone_fields'  => array(

            array(
              'id'        => 'top_address_icon',
              'type'      => 'icon',
              'title'     => __('Address Line Icon', 'fawzi')
            ),
            array(
              'id'        => 'top_address_text',
              'type'      => 'text',              
              'title'     => __('Address Line', 'fawzi')
            ),
            array(
              'id'        => 'top_address_link',
              'type'      => 'text',
              'title'     => __('Address Link', 'fawzi')
            ),            
            array(
              'id'        => 'target_tab',
              'type'      => 'switcher',
              'title'     => __('Open New Tab?', 'fawzi'),
              'on_text'     => __('Yes', 'fawzi'),
              'off_text'     => __('No', 'fawzi'),
            ),

          ),

        ),
        // TopBar Details

      ),
    );

    /* Content Shortcodes */
    $options[]     = array(
      'title'      => __('Content Shortcodes', 'fawzi'),
      'shortcodes' => array(

        // Spacer
        array(
          'name'          => 'vc_empty_space',
          'title'         => __('Spacer', 'fawzi'),
          'fields'        => array(

            array(
              'id'        => 'height',
              'type'      => 'text',
              'title'     => __('Height', 'fawzi'),
              'attributes' => array(
                'placeholder'     => '20px',
              ),
            ),

          ),
        ),
        // Spacer

        // Social Icons
        array(
          'name'          => 'vt_socials',
          'title'         => __('Social Icons', 'fawzi'),
          'view'          => 'clone',
          'clone_id'      => 'vt_social',
          'clone_title'   => __('Add New', 'fawzi'),
          'fields'        => array(

            array(
              'id'        => 'social_select',
              'type'      => 'select',
              'options'   => array(
                'style-one' => __('Style One (Topbar)', 'fawzi'),
                'style-two' => __('Style Two (Footer)', 'fawzi'),
                'style-three' => __('Style Three (Contact)', 'fawzi'),
              ),
              'title'     => __('Social Icons Style', 'fawzi'),
            ),
            array(
              'id'        => 'custom_class',
              'type'      => 'text',
              'title'     => __('Custom Class', 'fawzi'),
            ),
            array(
              'id'        => 'social_group_title',
              'type'      => 'text',
              'title'     => __('Title', 'fawzi'),
              'dependency'  => array('social_select', '==', 'style-three'),
            ),

            // Colors
            array(
              'type'    => 'notice',
              'class'   => 'info',
              'content' => __('Colors', 'fawzi')
            ),
            array(
              'id'        => 'icon_color',
              'type'      => 'color_picker',
              'title'     => __('Icon Color', 'fawzi'),
              'wrap_class' => 'column_third',
            ),
            array(
              'id'        => 'icon_hover_color',
              'type'      => 'color_picker',
              'title'     => __('Icon Hover Color', 'fawzi'),
              'wrap_class' => 'column_third',
              'dependency'  => array('social_select', '!=', 'style-three'),
            ),
            array(
              'id'        => 'bg_color',
              'type'      => 'color_picker',
              'title'     => __('Backrgound Color', 'fawzi'),
              'wrap_class' => 'column_third',
              'dependency'  => array('social_select', '!=', 'style-one'),
            ),
            array(
              'id'        => 'bg_hover_color',
              'type'      => 'color_picker',
              'title'     => __('Backrgound Hover Color', 'fawzi'),
              'wrap_class' => 'column_third',
              'dependency'  => array('social_select', '==', 'style-two'),
            ),
            array(
              'id'        => 'border_color',
              'type'      => 'color_picker',
              'title'     => __('Border Color', 'fawzi'),
              'wrap_class' => 'column_third',
              'dependency'  => array('social_select', '==', 'style-three'),
            ),

            // Icon Size
            array(
              'id'        => 'icon_size',
              'type'      => 'text',
              'title'     => __('Icon Size', 'fawzi'),
              'wrap_class' => 'column_full',
            ),

          ),
          'clone_fields'  => array(

            array(
              'id'        => 'social_link',
              'type'      => 'text',
              'attributes' => array(
                'placeholder'     => 'http://',
              ),
              'title'     => __('Link', 'fawzi')
            ),
            array(
              'id'        => 'social_icon',
              'type'      => 'icon',
              'title'     => __('Social Icon', 'fawzi')
            ),
            array(
              'id'        => 'target_tab',
              'type'      => 'switcher',
              'title'     => __('Open New Tab?', 'fawzi'),
              'on_text'     => __('Yes', 'fawzi'),
              'off_text'     => __('No', 'fawzi'),
            ),

          ),

        ),
        // Social Icons        

        // Useful Links
        array(
          'name'          => 'vt_useful_links',
          'title'         => __('Useful Links', 'fawzi'),
          'view'          => 'clone',
          'clone_id'      => 'vt_useful_link',
          'clone_title'   => __('Add New', 'fawzi'),
          'fields'        => array(

            array(
              'id'        => 'column_width',
              'type'      => 'select',
              'title'     => __('Column Width', 'fawzi'),
              'options'        => array(
                'useful-links-full' => __('One Column', 'fawzi'),
                'useful-links-half' => __('Two Column', 'fawzi'),
                'useful-links-third' => __('Three Column', 'fawzi'),
              ),
            ),
            array(
              'id'        => 'custom_class',
              'type'      => 'text',
              'title'     => __('Custom Class', 'fawzi'),
            ),

          ),
          'clone_fields'  => array(

            array(
              'id'        => 'title_link',
              'type'      => 'text',
              'title'     => __('Link', 'fawzi')
            ),
            array(
              'id'        => 'target_tab',
              'type'      => 'switcher',
              'title'     => __('Open New Tab?', 'fawzi'),
              'on_text'     => __('Yes', 'fawzi'),
              'off_text'     => __('No', 'fawzi'),
            ),
            array(
              'id'        => 'link_title',
              'type'      => 'text',
              'title'     => __('Title', 'fawzi')
            ),

          ),

        ),
        // Useful Links

        // Education List
        array(
          'name'          => 'vt_education_lists',
          'title'         => __('Education List', 'fawzi'),
          'view'          => 'clone',
          'clone_id'      => 'vt_education_list',
          'clone_title'   => __('Add New', 'fawzi'),
          'fields'        => array(

            array(
              'id'        => 'custom_class',
              'type'      => 'text',
              'title'     => __('Custom Class', 'fawzi'),
            ),

            // Colors
            array(
              'type'    => 'notice',
              'class'   => 'info',
              'content' => __('Colors', 'fawzi')
            ),
            array(
              'id'        => 'title_color',
              'type'      => 'color_picker',
              'title'     => __('Title Color', 'fawzi'),
              'wrap_class' => 'column_third el-hav-border',
            ),
            array(
              'id'        => 'text_color',
              'type'      => 'color_picker',
              'title'     => __('Text Color', 'fawzi'),
              'wrap_class' => 'column_third el-hav-border',
            ),
            array(
              'id'        => 'bullet_color',
              'type'      => 'color_picker',
              'title'     => __('Bullet Color', 'fawzi'),
              'wrap_class' => 'column_third el-hav-border',
            ),

            // Size
            array(
              'id'        => 'title_size',
              'type'      => 'text',
              'title'     => __('Title Size', 'fawzi'),
              'wrap_class' => 'column_half el-hav-border',
              'attributes' => array(
                'placeholder'     => 'Eg: 14px',
              ),
            ),
            array(
              'id'        => 'text_size',
              'type'      => 'text',
              'title'     => __('Text Size', 'fawzi'),
              'attributes' => array(
                'placeholder'     => 'Eg: 14px',
              ),
              'wrap_class' => 'column_half el-hav-border',
            ),
            array(
              'id'        => 'bullet_top_space',
              'type'      => 'text',
              'title'     => __('Bullet Top Space', 'fawzi'),
              'attributes' => array(
                'placeholder'     => 'Eg: 12px',
              ),
              'wrap_class' => 'column_full',
            ),

          ),
          'clone_fields'  => array(

            array(
              'id'        => 'title',
              'type'      => 'text',
              'title'     => __('Title', 'fawzi')
            ),
            array(
              'id'        => 'text',
              'type'      => 'text',
              'title'     => __('Text', 'fawzi')
            ),
            array(
              'id'        => 'text_link',
              'type'      => 'text',
              'attributes' => array(
                'placeholder'     => 'http://',
              ),
              'title'     => __('Text Link', 'fawzi')
            ),

          ),

        ),
        // Education List

        // Simple Image List
        array(
          'name'          => 'vt_image_lists',
          'title'         => __('Simple Image List', 'fawzi'),
          'view'          => 'clone',
          'clone_id'      => 'vt_image_list',
          'clone_title'   => __('Add New', 'fawzi'),
          'fields'        => array(

            array(
              'id'        => 'custom_class',
              'type'      => 'text',
              'title'     => __('Custom Class', 'fawzi'),
            ),

          ),
          'clone_fields'  => array(

            array(
              'id'        => 'get_image',
              'type'      => 'upload',
              'title'     => __('Image', 'fawzi')
            ),
            array(
              'id'        => 'link',
              'type'      => 'text',
              'attributes' => array(
                'placeholder'     => 'http://',
              ),
              'title'     => __('Link', 'fawzi')
            ),
            array(
              'id'    => 'open_tab',
              'type'  => 'switcher',
              'std'   => false,
              'title' => __('Open link to new tab?', 'fawzi')
            ),

          ),

        ),
        // Simple Image List

        // Download Button
        array(
          'name'          => 'vt_download_btn',
          'title'         => __('Download Button', 'fawzi'),
          'fields'        => array(

            array(
              'id'        => 'link_icon',
              'type'      => 'icon',
              'title'     => __('Icon', 'fawzi'),
            ),
            array(
              'id'        => 'link_text',
              'type'      => 'text',
              'title'     => __('Link Text', 'fawzi'),
            ),
            array(
              'id'        => 'link',
              'type'      => 'text',
              'title'     => __('Link', 'fawzi'),
            ),
            array(
              'id'        => 'target_tab',
              'type'      => 'switcher',
              'title'     => __('Open New Tab?', 'fawzi'),
              'on_text'     => __('Yes', 'fawzi'),
              'off_text'     => __('No', 'fawzi'),
            ),
            array(
              'id'        => 'custom_class',
              'type'      => 'text',
              'title'     => __('Custom Class', 'fawzi'),
            ),

            // Normal Mode
            array(
              'type'    => 'notice',
              'class'   => 'info',
              'content' => __('Normal Mode', 'fawzi')
            ),
            array(
              'id'        => 'text_color',
              'type'      => 'color_picker',
              'title'     => __('Text Color', 'fawzi'),
              'wrap_class' => 'column_third el-hav-border',
            ),
            array(
              'id'        => 'icon_color',
              'type'      => 'color_picker',
              'title'     => __('Icon Color', 'fawzi'),
              'wrap_class' => 'column_third el-hav-border',
            ),
            array(
              'id'        => 'bg_color',
              'type'      => 'color_picker',
              'title'     => __('Background Color', 'fawzi'),
              'wrap_class' => 'column_third el-hav-border',
            ),
            // Hover Mode
            array(
              'type'    => 'notice',
              'class'   => 'info',
              'content' => __('Hover Mode', 'fawzi')
            ),
            array(
              'id'        => 'text_hover_color',
              'type'      => 'color_picker',
              'title'     => __('Text Hover Color', 'fawzi'),
              'wrap_class' => 'column_third el-hav-border',
            ),
            array(
              'id'        => 'icon_hover_color',
              'type'      => 'color_picker',
              'title'     => __('Icon Hover Color', 'fawzi'),
              'wrap_class' => 'column_third el-hav-border',
            ),
            array(
              'id'        => 'bg_hover_color',
              'type'      => 'color_picker',
              'title'     => __('Background Hover Color', 'fawzi'),
              'wrap_class' => 'column_third el-hav-border',
            ),

            // Size
            array(
              'type'    => 'notice',
              'class'   => 'info',
              'content' => __('Font Sizes', 'fawzi')
            ),
            array(
              'id'        => 'text_size',
              'type'      => 'text',
              'title'     => __('Text Size', 'fawzi'),
              'wrap_class' => 'column_half el-hav-border',
              'attributes' => array(
                'placeholder'     => 'Eg: 14px',
              ),
            ),
            array(
              'id'        => 'icon_size',
              'type'      => 'text',
              'title'     => __('Icon Size', 'fawzi'),
              'attributes' => array(
                'placeholder'     => 'Eg: 18px',
              ),
              'wrap_class' => 'column_half el-hav-border',
            ),

          ),
        ),
        // Download Button

        // Simple Link
        array(
          'name'          => 'vt_simple_link',
          'title'         => __('Simple Link', 'fawzi'),
          'fields'        => array(

            array(
              'id'        => 'link_style',
              'type'      => 'select',
              'title'     => __('Link Style', 'fawzi'),
              'options'        => array(
                'link-underline' => __('Link Underline', 'fawzi'),
                'link-arrow-right' => __('Link Arrow (Right)', 'fawzi'),
                'link-arrow-left' => __('Link Arrow (Left)', 'fawzi'),
              ),
            ),
            array(
              'id'        => 'link_icon',
              'type'      => 'icon',
              'title'     => __('Icon', 'fawzi'),
              'value'      => 'fa fa-caret-right',
              'dependency'  => array('link_style', '!=', 'link-underline'),
            ),
            array(
              'id'        => 'link_text',
              'type'      => 'text',
              'title'     => __('Link Text', 'fawzi'),
            ),
            array(
              'id'        => 'link',
              'type'      => 'text',
              'title'     => __('Link', 'fawzi'),
              'attributes' => array(
                'placeholder'     => 'http://',
              ),
            ),
            array(
              'id'        => 'target_tab',
              'type'      => 'switcher',
              'title'     => __('Open New Tab?', 'fawzi'),
              'on_text'     => __('Yes', 'fawzi'),
              'off_text'     => __('No', 'fawzi'),
            ),
            array(
              'id'        => 'custom_class',
              'type'      => 'text',
              'title'     => __('Custom Class', 'fawzi'),
            ),

            // Normal Mode
            array(
              'type'    => 'notice',
              'class'   => 'info',
              'content' => __('Normal Mode', 'fawzi')
            ),
            array(
              'id'        => 'text_color',
              'type'      => 'color_picker',
              'title'     => __('Text Color', 'fawzi'),
              'wrap_class' => 'column_half el-hav-border',
            ),
            array(
              'id'        => 'border_color',
              'type'      => 'color_picker',
              'title'     => __('Border Color', 'fawzi'),
              'wrap_class' => 'column_half el-hav-border',
              'dependency'  => array('link_style', '==', 'link-underline'),
            ),
            // Hover Mode
            array(
              'type'    => 'notice',
              'class'   => 'info',
              'content' => __('Hover Mode', 'fawzi')
            ),
            array(
              'id'        => 'text_hover_color',
              'type'      => 'color_picker',
              'title'     => __('Text Hover Color', 'fawzi'),
              'wrap_class' => 'column_half el-hav-border',
            ),
            array(
              'id'        => 'border_hover_color',
              'type'      => 'color_picker',
              'title'     => __('Border Hover Color', 'fawzi'),
              'wrap_class' => 'column_half el-hav-border',
              'dependency'  => array('link_style', '==', 'link-underline'),
            ),

            // Size
            array(
              'type'    => 'notice',
              'class'   => 'info',
              'content' => __('Font Sizes', 'fawzi')
            ),
            array(
              'id'        => 'text_size',
              'type'      => 'text',
              'title'     => __('Text Size', 'fawzi'),
              'attributes' => array(
                'placeholder'     => 'Eg: 14px',
              ),
            ),

          ),
        ),
        // Simple Link

        // Blockquotes
        array(
          'name'          => 'vt_blockquote',
          'title'         => __('Blockquote', 'fawzi'),
          'fields'        => array(

            array(
              'id'        => 'blockquote_style',
              'type'      => 'select',
              'title'     => __('Blockquote Style', 'fawzi'),
              'options'        => array(
                '' => __('Select Blockquote Style', 'fawzi'),
                'style-one' => __('Style One', 'fawzi'),
                'style-two' => __('Style Two', 'fawzi'),
              ),
            ),
            array(
              'id'        => 'text_size',
              'type'      => 'text',
              'title'     => __('Text Size', 'fawzi'),
            ),
            array(
              'id'        => 'custom_class',
              'type'      => 'text',
              'title'     => __('Custom Class', 'fawzi'),
            ),
            array(
              'id'        => 'content_color',
              'type'      => 'color_picker',
              'title'     => __('Content Color', 'fawzi'),
            ),
            array(
              'id'        => 'left_color',
              'type'      => 'color_picker',
              'title'     => __('Left Border Color', 'fawzi'),
            ),
            array(
              'id'        => 'border_color',
              'type'      => 'color_picker',
              'title'     => __('Border Color', 'fawzi'),
            ),
            array(
              'id'        => 'bg_color',
              'type'      => 'color_picker',
              'title'     => __('Background Color', 'fawzi'),
            ),
            // Content
            array(
              'id'        => 'content',
              'type'      => 'textarea',
              'title'     => __('Content', 'fawzi'),
            ),

          ),

        ),
        // Blockquotes       

        // Address Info
        array(
          'name'          => 'vt_address_fields',
          'title'         => __('Simple Address Fields', 'fawzi'),
          'fields'        => array(

            array(
              'id'        => 'custom_class',
              'type'      => 'text',
              'title'     => __('Custom Class', 'fawzi'),
            ),
            array(
              'id'        => 'address_title',
              'type'      => 'text',
              'title'     => __('Title', 'fawzi')
            ),
            array(
              'id'        => 'address_content',
              'type'      => 'textarea',
              'title'     => __('Content', 'fawzi'),
            ),
            array(
              'id'        => 'address_link',
              'type'      => 'text',
              'title'     => __('Link', 'fawzi')
            ),
            array(
              'id'        => 'target_tab',
              'type'      => 'switcher',
              'title'     => __('Open New Tab?', 'fawzi'),
              'on_text'     => __('Yes', 'fawzi'),
              'off_text'     => __('No', 'fawzi'),
            ),
          ),
        ),
        // Address Info

      ),
    );

    /* Footer Shortcodes */
    $options[]     = array(
      'title'      => __('Footer Shortcodes', 'fawzi'),
      'shortcodes' => array(

        // Address Info
        array(
          'name'          => 'vt_address_info',
          'title'         => __('Address Info', 'fawzi'),
          'fields'        => array(

            array(
              'id'        => 'custom_class',
              'type'      => 'text',
              'title'     => __('Custom Class', 'fawzi'),
            ),
            array(
              'id'        => 'info_address_title',
              'type'      => 'text',
              'title'     => __('Address Title', 'fawzi')
            ),
            array(
              'id'        => 'info_address_content',
              'type'      => 'textarea',
              'title'     => __('Address', 'fawzi'),
            ),
            array(
              'id'        => 'info_contact_title',
              'type'      => 'text',
              'title'     => __('Contact Title', 'fawzi')
            ),
            array(
              'id'        => 'info_contact_content',
              'type'      => 'text',
              'title'     => __('Phone Number', 'fawzi')
            ),
            array(
              'id'        => 'info_contact_link',
              'type'      => 'text',
              'title'     => __('Phone Link', 'fawzi'),
            ),
            array(
              'id'        => 'info_mail_id',
              'type'      => 'text',
              'title'     => __('Mail ID', 'fawzi')
            ),
            array(
              'id'        => 'info_mail_link',
              'type'      => 'text',
              'title'     => __('Mail Link', 'fawzi'),
            ),

        ),
        ),
        // Address Info

      ),
    );

  return $options;

  }
  add_filter( 'cs_shortcode_options', 'fawzi_vt_shortcodes' );
}
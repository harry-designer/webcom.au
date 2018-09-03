<?php
/* Spacer */
function vt_spacer_function($atts, $content = true) {
  extract(shortcode_atts(array(
    "height" => '',
  ), $atts));

  $result = do_shortcode('[vc_empty_space height="'. $height .'"]');
  return $result;

}
add_shortcode("vt_spacer", "vt_spacer_function");

/* Social Icons */
function vt_socials_function($atts, $content = true) {
  extract(shortcode_atts(array(
    "social_select" => '',
    "custom_class" => '',
    "social_group_title" => '',
    // Colors
    "icon_color" => '',
    "icon_hover_color" => '',
    "bg_color" => '',
    "bg_hover_color" => '',
    "border_color" => '',
    "icon_size" => '',
  ), $atts));

  // Shortcode Style CSS
  $e_uniqid       = uniqid();
  $inline_style   = '';

  // Colors & Size
  if ( $icon_color || $icon_size ) {
    $inline_style .= '.fwzi-socials-'. $e_uniqid .'.fwzi-social a, .fwzi-socials-'. $e_uniqid .'.fwzi-social-two li a, .fwzi-socials-'. $e_uniqid .'.tm-social-links a i {';
    $inline_style .= ( $icon_color ) ? 'color:'. $icon_color .';' : '';
    $inline_style .= ( $icon_size ) ? 'font-size:'. fawzi_check_px($icon_size) .';' : '';
    $inline_style .= '}';
  }
  if ($social_select !== 'style-three') {
    if ( $icon_hover_color ) {
      $inline_style .= '.fwzi-socials-'. $e_uniqid .'.fwzi-social li a:hover, .fwzi-socials-'. $e_uniqid .'.fwzi-social-two li a:hover {';
      $inline_style .= ( $icon_hover_color ) ? 'color:'. $icon_hover_color .';' : '';
      $inline_style .= '}';
    }
  }
  if($social_select !== 'style-one') {
    if ( $bg_color ) {
      $inline_style .= '.fwzi-socials-'. $e_uniqid .'.fwzi-social-two li a, .fwzi-socials-'. $e_uniqid .'.tm-social-links a {';
      $inline_style .= ( $bg_color ) ? 'background-color:'. $bg_color .';' : '';
      $inline_style .= '}';
    }
  }
  if($social_select === 'style-two') {
    if ( $bg_hover_color ) {
      $inline_style .= '.fwzi-socials-'. $e_uniqid .'.fwzi-social-two li a:hover {';
      $inline_style .= ( $bg_hover_color ) ? 'background-color:'. $bg_hover_color .';' : '';
      $inline_style .= '}';
    }
  }
  if($social_select === 'style-three') {
    if ( $border_color ) {
      $inline_style .= '.fwzi-socials-'. $e_uniqid .'.tm-social-links a {';
      $inline_style .= ( $border_color ) ? 'border-color:'. $border_color .';' : '';
      $inline_style .= '}';
    }
  }

  $social_group_title = $social_group_title ? '<div class="contact-label">'.$social_group_title.'</div>' : '<div class="contact-label">Follow Us</div>';
  // Class
  if($social_select === 'style-one') {
    $social_style = 'square';
  } else {
    $social_style = '';
  }
  // Div for topbar social icons
  if ($social_select === 'style-three') {
    $social_open = '<div class="contact-link social">';
    $social_close = '</div>';
    $social_title = $social_group_title;
  } else {
    $social_open = '';
    $social_close = '';
    $social_title = '';
  }

  // add inline style
  add_inline_style( $inline_style );
  $styled_class  = ' fwzi-socials-'. $e_uniqid;

  if ($social_select === 'style-three') {
  $result = $social_open . $social_title .'<div class="fwzi-social '. $social_style .' '. $custom_class .'">'. do_shortcode($content) .'</div>'.$social_close;
  } else {
  $result = '<div class="fwzi-social '. $social_style .' '. $custom_class .'">'. $social_title . do_shortcode($content) .'</div>';
  }
  return $result;

}
add_shortcode("vt_socials", "vt_socials_function");

/* Social Icon */
function vt_social_function($atts, $content = NULL) {
   extract(shortcode_atts(array(
      "social_link" => '',
      "social_icon" => '',
      "target_tab" => ''
   ), $atts));

   $social_link = ( isset( $social_link ) ) ? 'href="'. $social_link . '"' : '';
   $target_tab = ( $target_tab === '1' ) ? ' target="_blank"' : '';

   $result = '<a '. $social_link . $target_tab .'><i class="'. $social_icon .'"></i></a>';
   return $result;

}
add_shortcode("vt_social", "vt_social_function");

/* TopBar Details */
function vt_top_address_details_function($atts, $content = true) {
  extract(shortcode_atts(array(
    "custom_class" => '',
    "top_search" => '',
    "top_search_icon" => '',
    "top_search_placeholder" => '',
    // Colors
    "icon_color" => '',
    "icon_hover_color" => '',
    "icon_size" => '',
  ), $atts));

  // Div for search
  if ($top_search) {
    $search_section = '<li class="search-link">
                        <a href="javascript:void(0);">
                          <i class="'. $top_search_icon .'"></i>
                        </a>
                        <div class="fwzi-search-box">
                        <form method="get" id="searchform" action="'.esc_url(home_url('/')).'" class="searchform" >
                          <div>
                            <input type="text" name="s" id="s" placeholder="'.$top_search_placeholder.'" />
                            <input type="submit" id="searchsubmit" value="" />
                          </div>
                        </form>
                        </div>
                      </li>';
  } else {
    $search_section = '';
  }

  $result = '<ul class="'.$custom_class.'">'. do_shortcode($content) . $search_section .'</ul>';
  return $result;

}
add_shortcode("vt_top_address_details", "vt_top_address_details_function");

/* TopBar Detail */
function vt_top_address_detail_function($atts, $content = NULL) {
   extract(shortcode_atts(array(
      "top_address_icon" => '',
      "top_address_text" => '',
      "top_address_link" => '',
   ), $atts));

  if ($top_address_link) {
    $address_link_open = '<a href="'. $top_address_link . '">';
    $address_link_close = '</a>';
  } else {
    $address_link_open = '';
    $address_link_close = '';
  }

   $result = '<li>'. $address_link_open .'<i class="'. $top_address_icon .'"></i>'. $top_address_text . $address_link_close .'</li>';
   return $result;

}
add_shortcode("vt_top_address_detail", "vt_top_address_detail_function");

/* Simple Images */
function vt_image_lists_function($atts, $content = true) {
  extract(shortcode_atts(array(
    "custom_class" => '',
  ), $atts));

  $result = '<ul class="simple-fix '. $custom_class .'">'. do_shortcode($content) .'</ul>';
  return $result;

}
add_shortcode("vt_image_lists", "vt_image_lists_function");

/* Simple Image */
function vt_image_list_function($atts, $content = NULL) {
  extract(shortcode_atts(array(
    "get_image" => '',
    "link" => '',
    "open_tab" => ''
  ), $atts));

  // Atts
  if ($get_image) {
    $my_image = ($get_image) ? '<img src="'. $get_image .'" alt=""/>' : '';
  } else {
    $my_image = '';
  }
  if ($link) {
    $open_tab = $open_tab ? 'target="_blank"' : '';
    $link_o = '<a href="'. $link .'" '. $open_tab .'>';
    $link_c = '</a>';
  } else {
    $link_o = '';
    $link_c = '';
  }

  $result = '<li>'. $link_o . $my_image . $link_c .'</li>';
  return $result;

}
add_shortcode("vt_image_list", "vt_image_list_function");

/* Download Button */
function vt_download_btn_function($atts, $content = NULL) {
  extract(shortcode_atts(array(
    "link_icon" => '',
    "link_text" => '',
    "link" => '',
    "target_tab" => '',
    "custom_class" => '',
    // Normal
    "text_color" => '',
    "icon_color" => '',
    "bg_color" => '',
    // Hover
    "text_hover_color" => '',
    "icon_hover_color" => '',
    "bg_hover_color" => '',
    // Size
    "text_size" => '',
    "icon_size" => '',
  ), $atts));

  // Atts
  $link_icon = $link_icon ? '<i class="'. $link_icon .'"></i>' : '';
  $target_tab = $target_tab ? 'target="_blank"' : '';

  // Shortcode Style CSS
  $e_uniqid       = uniqid();
  $inline_style   = '';

  // Colors & Size
  if ( $text_color || $text_size || $bg_color ) {
    $inline_style .= '.fwzi-dwnd-btn-'. $e_uniqid .'.fwzi-download-btn {';
    $inline_style .= ( $text_color ) ? 'color:'. $text_color .';' : '';
    $inline_style .= ( $text_size ) ? 'font-size:'. fawzi_core_check_px($text_size) .';' : '';
    $inline_style .= ( $bg_color ) ? 'background-color:'. $bg_color .';' : '';
    $inline_style .= '}';
  }
  if ( $text_hover_color || $bg_hover_color ) {
    $inline_style .= '.fwzi-dwnd-btn-'. $e_uniqid .'.fwzi-download-btn:hover {';
    $inline_style .= ( $text_hover_color ) ? 'color:'. $text_hover_color .';' : '';
    $inline_style .= ( $bg_hover_color ) ? 'background-color:'. $bg_hover_color .';' : '';
    $inline_style .= '}';
  }
  if ( $icon_color || $icon_size ) {
    $inline_style .= '.fwzi-dwnd-btn-'. $e_uniqid .'.fwzi-download-btn i {';
    $inline_style .= ( $icon_color ) ? 'color:'. $icon_color .';' : '';
    $inline_style .= ( $icon_size ) ? 'font-size:'. fawzi_core_check_px($icon_size) .';' : '';
    $inline_style .= '}';
  }
  if ( $icon_hover_color ) {
    $inline_style .= '.fwzi-dwnd-btn-'. $e_uniqid .'.fwzi-download-btn:hover i {';
    $inline_style .= ( $icon_hover_color ) ? 'color:'. $icon_hover_color .';' : '';
    $inline_style .= '}';
  }

  // add inline style
  add_inline_style( $inline_style );
  $styled_class  = ' fwzi-dwnd-btn-'. $e_uniqid;

  $result = '<a href="'. $link .'" '. $target_tab .' class="fwzi-download-btn '. $custom_class .' '. $styled_class .'">'. $link_icon . $link_text .'</a>';
  return $result;

}
add_shortcode("vt_download_btn", "vt_download_btn_function");

/* Simple Underline Link */
function vt_simple_link_function($atts, $content = NULL) {
  extract(shortcode_atts(array(
    "link_style" => '',
    "link_icon" => '',
    "link_text" => '',
    "link" => '',
    "target_tab" => '',
    "custom_class" => '',
    // Normal
    "text_color" => '',
    "border_color" => '',
    // Hover
    "text_hover_color" => '',
    "border_hover_color" => '',
    // Size
    "text_size" => '',
  ), $atts));

  // Atts
  $target_tab = $target_tab ? 'target="_blank"' : '';
  if ($link_style === 'link-arrow-right') {
    $arrow_icon = $link_icon ? ' <i class="'. $link_icon .'"></i>' : ' <i class="fa fa-caret-right"></i>';
  } elseif ($link_style === 'link-arrow-left') {
    $arrow_icon = $link_icon ? ' <i class="'. $link_icon .'"></i>' : ' <i class="fa fa-caret-left"></i>';
  } else {
    $arrow_icon = '';
  }
  $link_style = $link_style ? $link_style. ' ' : 'link-underline ';

  // Shortcode Style CSS
  $e_uniqid       = uniqid();
  $inline_style   = '';

  // Colors & Size
  if ( $text_color || $text_size ) {
    $inline_style .= '.fwzi-simple-link-'. $e_uniqid .'.fwzi-'. $link_style .', .fwzi-simple-link-'. $e_uniqid .'.fwzi-link-arrow-left i, .fwzi-simple-link-'. $e_uniqid .'.fwzi-link-arrow-right i {';
    $inline_style .= ( $text_color ) ? 'color:'. $text_color .';' : '';
    $inline_style .= ( $text_size ) ? 'font-size:'. fawzi_core_check_px($text_size) .';' : '';
    $inline_style .= '}';
  }
  if ( $text_hover_color ) {
    $inline_style .= '.fwzi-simple-link-'. $e_uniqid .'.fwzi-'. $link_style .':hover, .fwzi-simple-link-'. $e_uniqid .'.fwzi-link-arrow-right:hover, .fwzi-simple-link-'. $e_uniqid .'.fwzi-link-arrow-left:hover, .fwzi-simple-link-'. $e_uniqid .'.fwzi-link-arrow-right:hover i, .fwzi-simple-link-'. $e_uniqid .'.fwzi-link-arrow-left:hover i {';
    $inline_style .= ( $text_hover_color ) ? 'color:'. $text_hover_color .';' : '';
    $inline_style .= '}';
  }
  if ( $border_color ) {
    $inline_style .= '.fwzi-simple-link-'. $e_uniqid .'.fwzi-'. $link_style .':after {';
    $inline_style .= ( $border_color ) ? 'background-color:'. $border_color .';' : '';
    $inline_style .= '}';
  }
  if ( $border_hover_color ) {
    $inline_style .= '.fwzi-simple-link-'. $e_uniqid .'.fwzi-'. $link_style .':hover:after {';
    $inline_style .= ( $border_hover_color ) ? 'background-color:'. $border_hover_color .';' : '';
    $inline_style .= '}';
  }

  // add inline style
  add_inline_style( $inline_style );
  $styled_class  = ' fwzi-simple-link-'. $e_uniqid;

  $result = '<a href="'. $link .'" '. $target_tab .' class="fwzi-'. $link_style .' '. $custom_class .' '. $styled_class .'">'. $link_text . $arrow_icon .'</a>';
  return $result;

}
add_shortcode("vt_simple_link", "vt_simple_link_function");

/* Topbar WPML */
function vt_topbar_wpml_function($atts, $content = NULL) {
  extract(shortcode_atts(array(
    "custom_class" => ''
  ), $atts));

  $output   = '';

  if ( is_wpml_activated() ) {
    global $sitepress;
    $sitepress_settings = $sitepress->get_settings();
    $icl_get_languages  = icl_get_languages();

    if ( ! empty( $icl_get_languages ) ) {

      $output .= '<div class="fwzi-tr-element '. $custom_class .'"><div class="fwzi-top-dropdown fwzi-wpml-dropdown">';

      // current language
      $output .= '<a href="#" class="fwzi-top-active">';
      foreach ( $icl_get_languages as $id => $current_lang ) {
        if ( $current_lang['active'] ) {
          $output .= ( ( $sitepress_settings['icl_lso_native_lang'] ) ? $current_lang['code'] : $current_lang['translated_name'] );
          $output .= '<i class="fa fa-angle-down"></i>';
        }
      }
      $output .= '</a>';

      // list languages
      $output .= '<ul class="fwzi-topdd-content">';
      foreach ( $icl_get_languages as $id => $language ) {
        if ( ! $language['active'] ) {
          $output .= '<li>';
          $output .= '<a href="'. $language['url'] .'">';
          $output .= ( $sitepress_settings['icl_lso_native_lang'] && $sitepress_settings['icl_lso_display_lang'] ) ? $language['code'] : '';
          $output .= ( ! $sitepress_settings['icl_lso_native_lang'] && $sitepress_settings['icl_lso_display_lang'] ) ? $language['translated_name'] : '';
          $output .= ( $sitepress_settings['icl_lso_native_lang'] && ! $sitepress_settings['icl_lso_display_lang'] ) ? $language['code'] : '';
          $output .= '</a>';
          $output .= '</li>';
        }
        // print_r($language);
      }
      $output .= '</ul>';
      $output .= '</div>';
      $output .= '</div>';
    }

  } else {
    $output .= '<p class="wpml-not-active">Please Activate WPML Plugin</p>';
  }

  return $output;

}
add_shortcode("vt_topbar_wpml", "vt_topbar_wpml_function");

/* Address Info */
function vt_address_info_function($atts, $content = NULL) {
   extract(shortcode_atts(array(
      "custom_class" => '',
      "info_address_title" => '',
      "info_address_content" => '',
      "info_contact_title" => '',
      "info_contact_content" => '',
      "info_contact_link" => '',
      "info_mail_id" => '',
      "info_mail_link" => '',
   ), $atts));

   if ($custom_class) {
     $custon_open = '<div class="'.$custom_class.'">';
     $custon_close = '</div>';
   } else {
     $custon_open = '';
     $custon_close = '';
   }

   $result = ''. $custon_open .'<div class="contact-link">
                <div class="contact-label">'. $info_address_title .'</div>
                <p>'. $info_address_content .'</p>
              </div>
              <div class="contact-link">
                <div class="contact-label">'. $info_contact_title .'</div>
                <p>
                  <a href="'. $info_contact_link .'">'. $info_contact_content .'</a>
                  <br>
                  <a href="'. $info_mail_link .'">'. $info_mail_id .'</a>
                </p>
              </div>'. $custon_close .'';
   return $result;

}
add_shortcode("vt_address_info", "vt_address_info_function");

/* Address Fields */
function vt_address_fields_function($atts, $content = NULL) {
   extract(shortcode_atts(array(
      "custom_class" => '',
      "address_title" => '',
      "address_content" => '',
      "address_link" => '',
      "target_tab" => '',
   ), $atts));

   if ($custom_class) {
     $custon_open = '<div class="'.$custom_class.'">';
     $custon_close = '</div>';
   } else {
     $custon_open = '';
     $custon_close = '';
   }

  $target_tab = ( $target_tab === '1' ) ? 'target="_blank"' : '';
  $address_content = $address_link ? '<a href="'. $address_link .'" '. $target_tab .'>'. $address_content .'</a>' : $address_content;

  $result = ''. $custon_open .'<div class="contact-detail"><div class="contact-label">'. $address_title .'</div><p>'. $address_content .'</p>
  </div>'. $custon_close .'';
  return $result;

}
add_shortcode("vt_address_fields", "vt_address_fields_function");

/* Useful Links */
function vt_useful_links_function($atts, $content = true) {
   extract(shortcode_atts(array(
      "column_width" => '',
      "custom_class" => ''
   ), $atts));

   $result = '<div class="'. $custom_class .' '. $column_width .'"><ul>'. do_shortcode($content) .'</ul></div>';
   return $result;

}
add_shortcode("vt_useful_links", "vt_useful_links_function");

/* Useful Link */
function vt_useful_link_function($atts, $content = NULL) {
   extract(shortcode_atts(array(
      "target_tab" => '',
      "title_link" => '',
      "link_title" => ''
   ), $atts));

   $title_link = ( isset( $title_link ) ) ? 'href="'. $title_link . '"' : '';
   $target_tab = ( $target_tab === '1' ) ? 'target="_blank"' : '';

   $result = '<li><a '. $title_link . $target_tab .'>'. $link_title .'</a></li>';
   return $result;

}
add_shortcode("vt_useful_link", "vt_useful_link_function");

/* Blockquote */
function vt_blockquote_function($atts, $content = true) {
  extract(shortcode_atts(array(
    "blockquote_style" => '',
    "text_size" => '',
    "custom_class" => '',
    "content_color" => '',
    "left_color" => '',
    "border_color" => '',
    "bg_color" => ''
  ), $atts));

  // Shortcode Style CSS
  $e_uniqid        = uniqid();
  $inline_style  = '';

  // Text Color
  if ( $text_size || $content_color || $border_color || $bg_color ) {
    $inline_style .= '.fwzi-blockquote-'. $e_uniqid .' {';
    $inline_style .= ( $text_size ) ? 'font-size:'. $text_size .';' : '';
    $inline_style .= ( $content_color ) ? 'color:'. $content_color .';' : '';
    $inline_style .= ( $border_color ) ? 'border-color:'. $border_color .';' : '';
    $inline_style .= ( $bg_color ) ? 'background-color:'. $bg_color .';' : '';
    $inline_style .= '}';
  }
  if ( $left_color ) {
    $inline_style .= '.fwzi-blockquote-'. $e_uniqid .':before {';
    $inline_style .= ( $left_color ) ? 'background-color:'. $left_color .';' : '';
    $inline_style .= '}';
  }

  // add inline style
  add_inline_style( $inline_style );
  $styled_class  = ' fwzi-blockquote-'. $e_uniqid;

  // Style
  $blockquote_style = ($blockquote_style === 'style-two') ? 'blockquote-two ' : '';

  $result = '<blockquote class="'. $blockquote_style .' '. $custom_class .' '. $styled_class .'">'. do_shortcode($content) .'</blockquote>';
  return $result;

}
add_shortcode("vt_blockquote", "vt_blockquote_function");

/* Current Year - Shortcode */
if( ! function_exists( 'vt_current_year' ) ) {
  function vt_current_year() {
    return date('Y');
  }
  add_shortcode( 'vt_current_year', 'vt_current_year' );
}

/* Get Home Page URL - Via Shortcode */
if( ! function_exists( 'vt_home_url' ) ) {
  function vt_home_url() {
    return esc_url( home_url( '/' ) );
  }
  add_shortcode( 'vt_home_url', 'vt_home_url' );
}
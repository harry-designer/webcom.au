<?php
/*
 * Codestar Framework - Custom Style
 * Author & Copyright: VictorThemes
 * URL: http://themeforest.net/user/VictorThemes
 */

/* All Dynamic CSS Styles */
if ( ! function_exists( 'fawzi_dynamic_styles' ) ) {
  function fawzi_dynamic_styles() {

    // Typography
    $fawzi_vt_get_typography  = fawzi_vt_get_typography();

    $all_element_color  = cs_get_customize_option( 'all_element_colors' );

    // Logo
    $brand_logo_top     = cs_get_option( 'brand_logo_top' );
    $brand_logo_bottom  = cs_get_option( 'brand_logo_bottom' );

    // Footer
    $footer_bg_color  = cs_get_customize_option( 'footer_bg_color' );
    $footer_heading_color  = cs_get_customize_option( 'footer_heading_color' );
    $footer_text_color  = cs_get_customize_option( 'footer_text_color' );
    $footer_link_color  = cs_get_customize_option( 'footer_link_color' );
    $footer_link_hover_color  = cs_get_customize_option( 'footer_link_hover_color' );

  ob_start();

global $post;
$fawzi_id    = ( isset( $post ) ) ? $post->ID : 0;
$fawzi_id    = ( is_home() ) ? get_option( 'page_for_posts' ) : $fawzi_id;
$fawzi_id    = ( fawzi_is_woocommerce_shop() ) ? wc_get_page_id( 'shop' ) : $fawzi_id;
$fawzi_meta  = get_post_meta( $fawzi_id, 'page_type_metabox', true );

/* Top Bar - Customizer - Background */
$topbar_bg_color  = cs_get_customize_option( 'topbar_bg_color' );
if ($topbar_bg_color) {
echo <<<CSS
  .no-class {}
  .fwzi-topbar {
    background-color: {$topbar_bg_color};
  }
CSS;
}
if ($fawzi_meta) {
  $topbar_border_color  = $fawzi_meta['topbar_border'];
} else {
  $topbar_border_color  = cs_get_customize_option( 'topbar_border_color' );
}
$topbar_border_color = ( $topbar_border_color ) ? $fawzi_meta['topbar_border'] : cs_get_customize_option( 'topbar_border_color' );
if ($topbar_border_color) {
echo <<<CSS
  .no-class {}
  .fwzi-topbar ul li {
    border-color: {$topbar_border_color};
  }
CSS;
}
$topbar_text_color  = cs_get_customize_option( 'topbar_text_color' );
if ($topbar_text_color) {
echo <<<CSS
  .no-class {}
  .fwzi-topbar ul li {
    color: {$topbar_text_color};
  }
CSS;
}
$topbar_link_color  = cs_get_customize_option( 'topbar_link_color' );
if ($topbar_link_color) {
echo <<<CSS
  .no-class {}
  .fwzi-topbar ul li a {
    color: {$topbar_link_color};
  }
CSS;
}
$topbar_link_hover_color  = cs_get_customize_option( 'topbar_link_hover_color' );
if ($topbar_link_hover_color) {
echo <<<CSS
  .no-class {}
  .fwzi-topbar .pull-right ul li a:hover, .fwzi-topbar .pull-right ul li a:focus {
    color: {$topbar_link_hover_color};
  }
CSS;
}
$topbar_social_bg_color  = cs_get_customize_option( 'topbar_social_bg_color' );
if ($topbar_social_bg_color) {
echo <<<CSS
  .no-class {}
  .fwzi-social.square a {
    background-color: {$topbar_social_bg_color};
  }
CSS;
}
$topbar_social_color  = cs_get_customize_option( 'topbar_social_color' );
if ($topbar_social_color) {
echo <<<CSS
  .no-class {}
  .fwzi-social.square a {
    color: {$topbar_social_color};
  }
CSS;
}
$topbar_social_hover_color  = cs_get_customize_option( 'topbar_social_hover_color' );
if ($topbar_social_hover_color) {
echo <<<CSS
  .no-class {}
  .fwzi-social.square a:hover {
    color: {$topbar_social_hover_color};
  }
CSS;
}
$topbar_social_hover_bg_color  = cs_get_customize_option( 'topbar_social_hover_bg_color' );
if ($topbar_social_hover_bg_color) {
echo <<<CSS
  .no-class {}
  .fwzi-social.square a:hover {
    background-color: {$topbar_social_hover_bg_color};
  }
CSS;
}

/* Header - Customizer */
$header_bg_color  = cs_get_customize_option( 'header_bg_color' );
if ($header_bg_color) {
echo <<<CSS
  .no-class {}
  .fwzi-header {
    background-color: {$header_bg_color};
  }
CSS;
}
$header_sticky_bg_color  = cs_get_customize_option( 'header_sticky_bg_color' );
if ($header_sticky_bg_color) {
echo <<<CSS
  .no-class {}
  .is-sticky .fwzi-header {
    background-color: {$header_sticky_bg_color};
  }
CSS;
}
$header_link_color  = cs_get_customize_option( 'header_link_color' );
$header_link_hover_color  = cs_get_customize_option( 'header_link_hover_color' );
if($header_link_color || $header_link_hover_color) {
echo <<<CSS
  .no-class {}
  .fwzi-header .nav > li > a {
    color: {$header_link_color};
  }
  .fwzi-header .nav > li > a:hover {
    color: {$header_link_hover_color};
  }
CSS;
}

$submenu_bg_color  = cs_get_customize_option( 'submenu_bg_color' );
$submenu_border_color  = cs_get_customize_option( 'submenu_border_color' );
$submenu_link_color  = cs_get_customize_option( 'submenu_link_color' );
$submenu_link_hover_color  = cs_get_customize_option( 'submenu_link_hover_color' );
if ($submenu_bg_color || $submenu_border_color || $submenu_link_color || $submenu_link_hover_color) {
echo <<<CSS
  .no-class {}
  .fwzi-menu .dropdown-menu > li > a {
    border-color: {$submenu_border_color};
    color: {$submenu_link_color};
  }
  .fwzi-menu .dropdown-menu > li:hover > a,
  .fwzi-menu .dropdown-menu > li > a:focus,
  .fwzi-menu .dropdown-menu > li.active > a,
  .fwzi-menu .dropdown-menu > .active > a:focus,
  .fwzi-menu .dropdown-menu > .active > a:hover {
    color: {$submenu_link_hover_color};
  }
  .fwzi-menu .dropdown-menu,
  .mean-container .mean-nav ul.sub-menu li a {
    background-color: {$submenu_bg_color};
  }
  .dropdown-menu:before {border-bottom-color: {$submenu_bg_color};}
  .mean-container .mean-nav ul.sub-menu li a {
    color: {$submenu_link_color};
  }
  .dropdown-menu > li > a {
    border-bottom-color: {$submenu_border_color};
  }
CSS;
}

/* Title Area - Theme Options - Background */
$titlebar_bg = cs_get_option('titlebar_bg');
$title_heading_color  = cs_get_customize_option( 'titlebar_title_color' );
if ($titlebar_bg) {

  $title_area = ( ! empty( $titlebar_bg['image'] ) ) ? 'background-image: url('. $titlebar_bg['image'] .');' : '';
  $title_area .= ( ! empty( $titlebar_bg['repeat'] ) ) ? 'background-repeat: '. $titlebar_bg['repeat'] .';' : '';
  $title_area .= ( ! empty( $titlebar_bg['position'] ) ) ? 'background-position: '. $titlebar_bg['position'] .';' : '';
  $title_area .= ( ! empty( $titlebar_bg['attachment'] ) ) ? 'background-attachment: '. $titlebar_bg['attachment'] .';' : '';
  $title_area .= ( ! empty( $titlebar_bg['size'] ) ) ? 'background-size: '. $titlebar_bg['size'] .';' : '';
  $title_area .= ( ! empty( $titlebar_bg['color'] ) ) ? 'background-color: '. $titlebar_bg['color'] .';' : '';

echo <<<CSS
  .no-class {}
  .fwzi-title-area {
    {$title_area}
  }
CSS;
}
if ($title_heading_color) {
echo <<<CSS
  .no-class {}
  h1.page-title {
    color: {$title_heading_color};
  }
CSS;
}

/* Footer */
if ($footer_bg_color) {
echo <<<CSS
  .no-class {}
  .fwzi-footer {background: {$footer_bg_color};}
CSS;
}
if ($footer_heading_color) {
echo <<<CSS
  .no-class {}
  footer h5.footer-column-title,
  .contact-link .contact-label {color: {$footer_heading_color};}
CSS;
}
if ($footer_text_color) {
echo <<<CSS
  .no-class {}
  footer .fwzi-footer p,
  footer .fwzi-widget p,
  footer .fwzi-recent-blog .widget-bdate {color: {$footer_text_color};}
CSS;
}
if ($footer_link_color) {
echo <<<CSS
  .no-class {}
  .fwzi-footer a,
  .fwzi-footer .fwzi-social a {color: {$footer_link_color};}
CSS;
}
if ($footer_link_hover_color) {
echo <<<CSS
  .no-class {}
  .fwzi-footer a:hover,
  .fwzi-footer .fwzi-social a:hover {color: {$footer_link_hover_color};}
CSS;
}

/* Copyright */
$copyright_text_color  = cs_get_customize_option( 'copyright_text_color' );
$copyright_link_color  = cs_get_customize_option( 'copyright_link_color' );
$copyright_link_hover_color  = cs_get_customize_option( 'copyright_link_hover_color' );
$copyright_bg_color  = cs_get_customize_option( 'copyright_bg_color' );
if ($copyright_bg_color) {
echo <<<CSS
  .no-class {}
  .fwzi-copyright {background: {$copyright_bg_color};}
CSS;
}
if ($copyright_text_color) {
echo <<<CSS
  .no-class {}
  .fwzi-copyright,
  .fwzi-copyright p {color: {$copyright_text_color};}
CSS;
}
if ($copyright_link_color) {
echo <<<CSS
  .no-class {}
  .fwzi-copyright a {color: {$copyright_link_color};}
CSS;
}
if ($copyright_link_hover_color) {
echo <<<CSS
  .no-class {}
  .fwzi-copyright a:hover {color: {$copyright_link_hover_color};}
CSS;
}

/* Primary Colors */
if ($all_element_color) {
echo <<<CSS
  .no-class {}
  ::selection,
  ::-webkit-selection,
  ::-moz-selection,
  ::-o-selection,
  ::-ms-selection,
  a:hover,
  a:focus,
  .fwzi-btn-blue,
  .fwzi-btn-blue-border:hover,
  .fwzi-btn-blue-border:focus,
  .fwzi-search-box input[type="submit"],
  .plan-item.fwzi-hover .fwzi-btn-blue-border,
  .analyze-form input[type="submit"]:hover,
  .analyze-form input[type="submit"]:focus,
  .comment-form input[type="submit"],
  .fwzi-download-request input[type="submit"] {background-color: {$all_element_color};}

  .fwzi-btn-blue:hover,
  .fwzi-btn-blue:focus,
  .fwzi-btn-blue-border,
  form sup,
  table th a:hover,
  .nav > li:hover > a,
  .nav > li > a:hover,
  .nav > li > a:focus,
  .nav > li.active > a,
  .nav .open > a,
  .nav .open > a:focus,
  .nav .open > a:hover,
  .dropdown-menu > li:hover > a,
  .dropdown-menu > li > a:focus,
  .dropdown-menu > li.active > a,
  .dropdown-menu > .active > a:focus,
  .dropdown-menu > .active > a:hover,
  .fwzi-social a:hover,
  .fwzi-topbar ul li a:hover,
  .book-author a:hover,
  .blog-bottom-links .pull-left a:hover,
  .fwzi-like a:hover,
  .fwzi-like a.liked,
  .widget_categories ul li a:hover,
  .contact-detail .contact-link p a:hover,
  .fwzi-hover .project-title a,
  .learn-more a,
  .member-designation,
  .testimonial-style-two .testimonial-wrap a:hover,
  .slider-wrap .testimonial-wrap a:hover,
  .play-btn,
  .masonry-filters ul li a.active,
  .masonry-filters ul li a:hover,
  a.zilla-likes:hover:before,
  a.zilla-likes.active:before,
  a.zilla-likes.active span.zilla-likes-count,
  .fwzi-secondary .fwzi-navigation-widget ul li a:hover,
  .fwzi-secondary .fwzi-navigation-widget ul li a:before,
  .widget_categories ul li a:before,
  .comments-reply a,
  .comment-form input[type="submit"]:hover,
  .comment-form input[type="submit"]:focus,
  .book-features ul li:before,
  .fwzi-download-request input[type="submit"]:hover,
  .fwzi-download-request input[type="submit"]:focus,
  .contact-detail p a:hover {color: {$all_element_color};}

  .fwzi-btn-blue:hover,
  .fwzi-btn-blue:focus,
  .fwzi-btn-blue-border,
  .owl-dot.active,
  .wp-pagenavi a:hover,
  ul.page-numbers li a:hover,
  ul.page-numbers li a:focus,
  ul.page-numbers li span,
  .widget_tag_cloud a:hover,
  .widget_tag_cloud a:focus,
  .fwzi-blog-tags ul li a:hover,
  .fwzi-blog-tags ul li a:focus,
  .comment-form input[type="submit"]:hover,
  .comment-form input[type="submit"]:focus,
  .fwzi-download-request input[type="submit"]:hover,
  .fwzi-download-request input[type="submit"]:focus,
  .wp-pagenavi span.current {border-color: {$all_element_color};}

  .feature-links .nav-tabs > li > a:after {border-top-color: {$all_element_color};}
CSS;
}

// Content Colors
$body_color  = cs_get_customize_option( 'body_color' );
if ($body_color) {
echo <<<CSS
  .no-class {}
  body,
  p,
  .section-title-wrap h5,
  .feature-item p,
  .plan-info ul,
  .plan-subtitle,
  .testimonial-wrap p,
  .blog-meta,
  .search-result-wrap ul,
  .fwzi-tutorial p,
  .slider-wrap .testimonial-wrap .fwzi-slider p,
  .slider-wrap.slider-style-two .fwzi-testimonial p {color: {$body_color};}
CSS;
}
$body_links_color  = cs_get_customize_option( 'body_links_color' );
if ($body_links_color) {
echo <<<CSS
  .no-class {}
  body a,
  a,
  table th a,
  .wp-link-pages a,
  .fwzi-social a,
  .fwzi-social.square a,
  .fwzi-social.rounded a,
  .mfp-bottom-bar a,
  .nav-tabs > li > a,
  .panel-title a,
  .fwzi-hover .project-title a,
  .fwzi-topbar ul li a,
  .project-links a,
  .blog-meta a,
  .learn-more a,
  .testimonial-wrap a,
  .testimonial-style-two .testimonial-wrap a,
  .slider-wrap .testimonial-wrap a,
  .book-author a,
  .book-author .pull-right a,
  .feature-links .nav-tabs > li > a,
  .masonry-filters ul li a,
  .fwzi-growth-share .fwzi-social.square a,
  .blog-bottom-links .pull-left a,
  .fwzi-like a,
  .fwzi-secondary .fwzi-navigation-widget ul li a,
  .fwzi-secondary .widget_recent_comments ul li a,
  .widget_categories ul li a,
  .widget-recent-post .nav-tabs > li > a,
  .widget_tag_cloud a,
  .fwzi-blog-tags ul li a,
  .author-content .fwzi-social a,
  .comments-reply a,
  .book-detail .book-author .pull-left a,
  .contact-link.social .fwzi-social a,
  .contact-detail p a,
  .fwzi-footer a,
  .fwzi-footer .fwzi-social a,
  .fwzi-copyright a,
  .fwzi-back-top a {color: {$body_links_color};}
CSS;
}
$body_link_hover_color  = cs_get_customize_option( 'body_link_hover_color' );
if ($body_link_hover_color) {
echo <<<CSS
  .no-class {}
  body a:hover,
  a:hover
  table th a:hover
  .fwzi-social a:hover
  .fwzi-social.square a:hover
  .fwzi-social.rounded a:hover
  .mfp-bottom-bar a:hover
  .nav-tabs > li > a:hover
  .panel-title a:hover
  .fwzi-hover .project-title a:hover
  .fwzi-topbar ul li a:hover
  .project-links a:hover
  .blog-meta a:hover
  .learn-more a:hover
  .testimonial-wrap a:hover
  .testimonial-style-two .testimonial-wrap a:hover
  .slider-wrap .testimonial-wrap a:hover
  .book-author a:hover
  .book-author .pull-right a:hover
  .feature-links .nav-tabs > li > a:hover
  .masonry-filters ul li a:hover
  .fwzi-growth-share .fwzi-social.square a:hover
  .blog-bottom-links .pull-left a:hover
  .fwzi-like a:hover
  .fwzi-secondary .fwzi-navigation-widget ul li a:hover
  .fwzi-secondary .widget_recent_comments ul li a:hover
  .widget_categories ul li a:hover
  .widget-recent-post .nav-tabs > li > a:hover
  .widget_tag_cloud a:hover
  .fwzi-blog-tags ul li a:hover
  .author-content .fwzi-social a:hover
  .comments-reply a:hover
  .book-detail .book-author .pull-left a:hover
  .contact-link.social .fwzi-social a:hover
  .contact-detail p a:hover
  .fwzi-footer a:hover
  .fwzi-footer .fwzi-social a:hover
  .fwzi-copyright a:hover
  .fwzi-back-top a:hover {color: {$body_link_hover_color};}
CSS;
}
$sidebar_content_color  = cs_get_customize_option( 'sidebar_content_color' );
if ($sidebar_content_color) {
echo <<<CSS
  .no-class {}
  .fwzi-widget p,
  .widget_rss .rssSummary {color: {$sidebar_content_color};}
CSS;
}

// Content Heading
$content_heading_color  = cs_get_customize_option( 'content_heading_color' );
if ($content_heading_color) {
echo <<<CSS
  .no-class {}
  h1, h2, h3, h4, h5, h6,
  .section-title-wrap h2,
  h4.service-title,
  .revenue-info h2,
  .plan-top-wrap h4,
  h2.plan-price,
  .testimonial-wrap .section-title,
  h4.blog-title a,
  .fwzi-callout h3,
  .service-info h4,
  .search-result-wrap h3,
  .member-info h4,
  h3.book-title a,
  .member-info h6,
  .feature-info h2,
  h4.service-title,
  h5.process-title,
  .difference-wrap h2,
  .difference-info h4,
  .services-style-three .service-info h4,
  .fwzi-tutorial h2,
  .book-detail .book-title,
  .book-feature-title,
  .growth-point-info h4,
  h2.blog-title a,
  .fwzi-unit-fix .blog-title,
  .fwzi-blog-detail .comment-reply-title,
  h4.panel-title a {color: {$content_heading_color};}
CSS;
}
$sidebar_heading_color  = cs_get_customize_option( 'sidebar_heading_color' );
if ($sidebar_heading_color) {
echo <<<CSS
  .no-class {}
  .widget-title {color: {$sidebar_heading_color};}
CSS;
}

// Maintenance Mode
$maintenance_mode_bg  = cs_get_option( 'maintenance_mode_bg' );
if ($maintenance_mode_bg) {
  $maintenance_css = ( ! empty( $maintenance_mode_bg['image'] ) ) ? 'background-image: url('. $maintenance_mode_bg['image'] .');' : '';
  $maintenance_css .= ( ! empty( $maintenance_mode_bg['repeat'] ) ) ? 'background-repeat: '. $maintenance_mode_bg['repeat'] .';' : '';
  $maintenance_css .= ( ! empty( $maintenance_mode_bg['position'] ) ) ? 'background-position: '. $maintenance_mode_bg['position'] .';' : '';
  $maintenance_css .= ( ! empty( $maintenance_mode_bg['attachment'] ) ) ? 'background-attachment: '. $maintenance_mode_bg['attachment'] .';' : '';
  $maintenance_css .= ( ! empty( $maintenance_mode_bg['size'] ) ) ? 'background-size: '. $maintenance_mode_bg['size'] .';' : '';
  $maintenance_css .= ( ! empty( $maintenance_mode_bg['color'] ) ) ? 'background-color: '. $maintenance_mode_bg['color'] .';' : '';
echo <<<CSS
  .no-class {}
  .vt-maintenance-mode {
    {$maintenance_css}
  }
CSS;
}

  echo $fawzi_vt_get_typography;

  $output = ob_get_clean();
  return $output;

  }

}

/**
 * Custom Font Family
 */
if ( ! function_exists( 'fawzi_custom_font_load' ) ) {
  function fawzi_custom_font_load() {

    $font_family       = cs_get_option( 'font_family' );

    ob_start();

    if( ! empty( $font_family ) ) {

      foreach ( $font_family as $font ) {
        echo '@font-face{';

        echo 'font-family: "'. $font['name'] .'";';

        if( empty( $font['css'] ) ) {
          echo 'font-style: normal;';
          echo 'font-weight: normal;';
        } else {
          echo $font['css'];
        }

        echo ( ! empty( $font['ttf']  ) ) ? 'src: url('. $font['ttf'] .');' : '';
        echo ( ! empty( $font['eot']  ) ) ? 'src: url('. $font['eot'] .');' : '';
        echo ( ! empty( $font['woff'] ) ) ? 'src: url('. $font['woff'] .');' : '';
        echo ( ! empty( $font['otf']  ) ) ? 'src: url('. $font['otf'] .');' : '';

        echo '}';
      }

    }

    // Typography
    $output = ob_get_clean();
    return $output;
  }
}

/* Custom Styles */
if( ! function_exists( 'fawzi_vt_custom_css' ) ) {
  function fawzi_vt_custom_css() {
    wp_enqueue_style('fawzi-default-style', get_template_directory_uri() . '/style.css');
    $output  = fawzi_custom_font_load();
    $output .= fawzi_dynamic_styles();
    $output .= cs_get_option( 'theme_custom_css' );
    $custom_css = fawzi_compress_css_lines( $output );

    wp_add_inline_style( 'fawzi-default-style', $custom_css );
  }
}

/* Custom JS */
if( ! function_exists( 'fawzi_vt_custom_js' ) ) {
  function fawzi_vt_custom_js() {
    if ( ! wp_script_is( 'jquery', 'done' ) ) {
      wp_enqueue_script( 'jquery' );
    }
    $output = cs_get_option( 'theme_custom_js' );
    wp_add_inline_script( 'jquery-migrate', $output );
  }
  add_action( 'wp_enqueue_scripts', 'fawzi_vt_custom_js' );
}
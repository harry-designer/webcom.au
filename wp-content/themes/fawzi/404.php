<?php
/*
 * The template for displaying 404 pages (not found).
 * Author & Copyright: VictorThemes
 * URL: http://themeforest.net/user/VictorThemes
 */

// Theme Options
$fawzi_error_heading = cs_get_option('error_heading');
$fawzi_error_page_content = cs_get_option('error_page_content');
$fawzi_error_page_bg = cs_get_option('error_page_bg');
$fawzi_error_btn_text = cs_get_option('error_btn_text');

$fawzi_error_heading = ( $fawzi_error_heading ) ? $fawzi_error_heading : esc_html__( 'Oops! Page Not Found!', 'fawzi' );
$fawzi_error_page_content = ( $fawzi_error_page_content ) ? $fawzi_error_page_content : esc_html__( 'It looks like nothing was found at this location. Click the link below to return home.', 'fawzi' );
$fawzi_error_page_bg = ( $fawzi_error_page_bg ) ? wp_get_attachment_url($fawzi_error_page_bg) : FAWZI_IMAGES . '/404.png';
$fawzi_error_btn_text = ( $fawzi_error_btn_text ) ? $fawzi_error_btn_text : esc_html__( 'Go Back To Home', 'fawzi' );

get_header(); ?>

<!-- Fwzi 404 Error -->
<section class="fwzi-404-error">
  <div class="container">
    <div class="align-column-wrap">
      <div class="column-item item-md-6">
        <div class="fwzi-icon text-center">
          <img src="<?php echo esc_url($fawzi_error_page_bg); ?>" alt="<?php esc_html_e('404 Error', 'fawzi'); ?>" width="323">
        </div>
      </div>
      <div class="column-item item-md-6">
        <div class="error-wrap">
          <h1 class="error-title"><?php echo esc_attr($fawzi_error_heading); ?></h1>
          <p><?php echo esc_attr($fawzi_error_page_content); ?></p>
          <a href="<?php echo esc_url(home_url( '/' )); ?>" class="fwzi-btn"><?php echo esc_attr($fawzi_error_btn_text); ?></a>
        </div>
      </div>
    </div>
  </div>
</section>

<?php get_footer();

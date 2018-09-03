<?php
// Metabox
global $post;
$fawzi_id    = ( isset( $post ) ) ? $post->ID : false;
$fawzi_id    = ( is_home() ) ? get_option( 'page_for_posts' ) : $fawzi_id;
$fawzi_id    = ( fawzi_is_woocommerce_shop() ) ? wc_get_page_id( 'shop' ) : $fawzi_id;
$fawzi_id    = ( ! is_tag() && ! is_archive() && ! is_search() && ! is_404() && ! is_singular('testimonial') ) ? $fawzi_id : false;
$fawzi_meta  = get_post_meta( $fawzi_id, 'page_type_metabox', true );
if ($fawzi_meta) {
  $fawzi_topbar_options = $fawzi_meta['topbar_options'];
} else {
  $fawzi_topbar_options = '';
}
// Define Theme Options and Metabox varials in right way!
if ($fawzi_meta) {
  if ($fawzi_topbar_options === 'custom' && $fawzi_topbar_options !== 'default') {
    $fawzi_top_left           = $fawzi_meta['top_left'];
    $fawzi_top_right          = $fawzi_meta['top_right'];
    $fawzi_hide_topbar        = $fawzi_topbar_options;
    $fawzi_topbar_bg          = $fawzi_meta['topbar_bg'];
    if ($fawzi_topbar_bg) {
      $fawzi_topbar_bg = 'background-color: '. $fawzi_topbar_bg .';';
    } else {$fawzi_topbar_bg = '';}
  } else {
    $fawzi_top_left           = cs_get_option('top_left');
    $fawzi_top_right          = cs_get_option('top_right');
    $fawzi_hide_topbar        = cs_get_option('top_bar');
    $fawzi_topbar_bg          = '';
  }
} else {
  // Theme Options fields
  $fawzi_top_left           = cs_get_option('top_left');
  $fawzi_top_right          = cs_get_option('top_right');
  $fawzi_hide_topbar        = cs_get_option('top_bar');
  $fawzi_topbar_bg          = '';
}
// All options
if ($fawzi_meta && $fawzi_topbar_options === 'custom' && $fawzi_topbar_options !== 'default') {
  $fawzi_top_left = ( $fawzi_top_left ) ? $fawzi_meta['top_left'] : cs_get_option('top_left');
  $fawzi_top_right = ( $fawzi_top_right ) ? $fawzi_meta['top_right'] : cs_get_option('top_right');
} else {
  $fawzi_top_left = cs_get_option('top_left');
  $fawzi_top_right = cs_get_option('top_right');
}
if ($fawzi_meta && $fawzi_topbar_options !== 'default') {
  if ($fawzi_topbar_options === 'hide_topbar') {
    $fawzi_hide_topbar = 'hide';
  } else {
    $fawzi_hide_topbar = 'show';
  }
} else {
  $fawzi_hide_topbar_check = cs_get_option('top_bar');
  if ($fawzi_hide_topbar_check === true ) {
    $fawzi_hide_topbar = 'hide';
  } else {
    $fawzi_hide_topbar = 'show';
  }
}
if ($fawzi_meta) {
  $fawzi_topbar_bg = ( $fawzi_topbar_bg ) ? $fawzi_meta['topbar_bg'] : '';
} else {
  $fawzi_topbar_bg = '';
}

if ($fawzi_topbar_bg) {
  $fawzi_topbar_bg = 'background-color: '. $fawzi_topbar_bg .';';
} else {$fawzi_topbar_bg = '';}


if($fawzi_hide_topbar === 'show') {
?>
<div class="fwzi-topbar" style="<?php echo esc_attr($fawzi_topbar_bg); ?>">
  <div class="container">
    <div class="pull-left">
      <?php echo do_shortcode($fawzi_top_left); ?>
    </div>
    <div class="pull-right">
      <?php echo do_shortcode($fawzi_top_right); ?>
    </div>
  </div>
</div>

<?php } // Hide Topbar - From Metabox
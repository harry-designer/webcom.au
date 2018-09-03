<?php
// Metabox
$fawzi_id    = ( isset( $post ) ) ? $post->ID : 0;
$fawzi_id    = ( 'casestudies' == get_post_type() ) ? get_the_ID() : $fawzi_id;
$fawzi_id    = ( is_home() ) ? get_option( 'page_for_posts' ) : $fawzi_id;
$fawzi_id    = ( fawzi_is_woocommerce_shop() ) ? wc_get_page_id( 'shop' ) : $fawzi_id;
$fawzi_meta  = get_post_meta( $fawzi_id, 'page_type_metabox', true );
if (($fawzi_meta && fawzi_is_blog($post->ID)) || ($fawzi_meta && is_page()) || ($fawzi_meta && is_single($post->ID))) {
	$fawzi_title_bar_padding = $fawzi_meta['title_area_spacings'];
} else { $fawzi_title_bar_padding = cs_get_option('title_bar_padding'); }
// Padding - Theme Options

// Padding - Theme Options
if (($fawzi_meta) && ($fawzi_title_bar_padding && $fawzi_title_bar_padding !== 'padding-none')) {
  $fawzi_title_top_spacings = $fawzi_meta['title_top_spacings'];
  $fawzi_title_bottom_spacings = $fawzi_meta['title_bottom_spacings'];
  if ($fawzi_title_bar_padding === 'padding-custom') {
    $fawzi_title_top_spacings = $fawzi_title_top_spacings ? 'padding-top:'. fawzi_check_px($fawzi_title_top_spacings) .';' : '';
    $fawzi_title_bottom_spacings = $fawzi_title_bottom_spacings ? 'padding-bottom:'. fawzi_check_px($fawzi_title_bottom_spacings) .';' : '';
    $fawzi_custom_padding = $fawzi_title_top_spacings . $fawzi_title_bottom_spacings;
  } else {
    $fawzi_custom_padding = '';
  }
} else {
  $fawzi_title_bar_padding = cs_get_option('title_bar_padding');
  $fawzi_titlebar_top_padding = cs_get_option('titlebar_top_padding');
  $fawzi_titlebar_bottom_padding = cs_get_option('titlebar_bottom_padding');
  if ($fawzi_title_bar_padding === 'padding-custom') {
    $fawzi_titlebar_top_padding = $fawzi_titlebar_top_padding ? 'padding-top:'. fawzi_check_px($fawzi_titlebar_top_padding) .';' : '';
    $fawzi_titlebar_bottom_padding = $fawzi_titlebar_bottom_padding ? 'padding-bottom:'. fawzi_check_px($fawzi_titlebar_bottom_padding) .';' : '';
    $fawzi_custom_padding = $fawzi_titlebar_top_padding . $fawzi_titlebar_bottom_padding;
  } else {
    $fawzi_custom_padding = '';
  }
}

$need_title_bar = cs_get_option('need_title_bar');
// Banner Type - Meta Box
if (($fawzi_meta && fawzi_is_blog($post->ID)) || ($fawzi_meta && is_page()) || ($fawzi_meta && is_single($post->ID))) {
	$fawzi_banner_type = $fawzi_meta['banner_type'];
} else { $fawzi_banner_type = ''; }

// Overlay Color - Theme Options
if (($fawzi_meta && fawzi_is_blog($post->ID)) || ($fawzi_meta && is_page()) || ($fawzi_meta && is_single($post->ID))) {
	$fawzi_bg_overlay_color = $fawzi_meta['titlebar_bg_overlay_color'];
} else { $fawzi_bg_overlay_color = ''; }
if ($fawzi_bg_overlay_color) {
	if ($fawzi_bg_overlay_color) {
		$fawzi_overlay_color = $fawzi_bg_overlay_color;
	} else {
		$fawzi_overlay_color = '';
	}
} else {
	$fawzi_bg_overlay_color = cs_get_option('titlebar_bg_overlay_color');
	if ($fawzi_bg_overlay_color) {
		$fawzi_overlay_color = $fawzi_bg_overlay_color;
	} else {
		$fawzi_overlay_color = '';
	}
}

// Background - Type
if( $fawzi_meta && isset( $fawzi_meta['title_area_bg'] ) ) {

  extract( $fawzi_meta['title_area_bg'] );
  if ($image) {

  $fawzi_background_image       = ( ! empty( $image ) ) ? 'background-image: url(' . $image . ');' : '';
  $fawzi_background_repeat      = ( ! empty( $image ) && ! empty( $repeat ) ) ? ' background-repeat: ' . $repeat . ';' : '';
  $fawzi_background_position    = ( ! empty( $image ) && ! empty( $position ) ) ? ' background-position: ' . $position . ';' : '';
  $fawzi_background_size        = ( ! empty( $image ) && ! empty( $size ) ) ? ' background-size: ' . $size . ';' : '';
  $fawzi_background_attachment  = ( ! empty( $image ) && ! empty( $size ) ) ? ' background-attachment: ' . $attachment . ';' : '';
  $fawzi_background_color       = ( ! empty( $color ) ) ? ' background-color: ' . $color . ';' : '';
  $fawzi_background_style       = ( ! empty( $image ) ) ? $fawzi_background_image . $fawzi_background_repeat . $fawzi_background_position . $fawzi_background_size . $fawzi_background_attachment : '';

  $fawzi_title_bg = ( ! empty( $fawzi_background_style ) || ! empty( $fawzi_background_color ) ) ? $fawzi_background_style . $fawzi_background_color : '';
} else {
	$fawzi_title_bgg = cs_get_option('titlebar_bg');
  if ($fawzi_title_bgg) {
  extract( $fawzi_title_bgg );

   $fawzi_background_image       = ( ! empty( $image ) ) ? 'background-image: url(' . $image . ');' : '';
   $fawzi_background_repeat      = ( ! empty( $image ) && ! empty( $repeat ) ) ? ' background-repeat: ' . $repeat . ';' : '';
   $fawzi_background_position    = ( ! empty( $image ) && ! empty( $position ) ) ? ' background-position: ' . $position . ';' : '';
   $fawzi_background_size        = ( ! empty( $image ) && ! empty( $size ) ) ? ' background-size: ' . $size . ';' : '';
   $fawzi_background_attachment  = ( ! empty( $image ) && ! empty( $size ) ) ? ' background-attachment: ' . $attachment . ';' : '';
   $fawzi_background_color       = ( ! empty( $color ) ) ? ' background-color: ' . $color . ';' : '';
   $fawzi_background_style       = ( ! empty( $image ) ) ? $fawzi_background_image . $fawzi_background_repeat . $fawzi_background_position . $fawzi_background_size . $fawzi_background_attachment : '';

   $fawzi_title_bg = ( ! empty( $fawzi_background_style ) || ! empty( $fawzi_background_color ) ) ? $fawzi_background_style . $fawzi_background_color : '';
   } else {
    $fawzi_title_bg = '';
   }
}
} else {
$fawzi_title_bgg = cs_get_option('titlebar_bg');
  if ($fawzi_title_bgg) {
  extract( $fawzi_title_bgg );

   $fawzi_background_image       = ( ! empty( $image ) ) ? 'background-image: url(' . $image . ');' : '';
   $fawzi_background_repeat      = ( ! empty( $image ) && ! empty( $repeat ) ) ? ' background-repeat: ' . $repeat . ';' : '';
   $fawzi_background_position    = ( ! empty( $image ) && ! empty( $position ) ) ? ' background-position: ' . $position . ';' : '';
   $fawzi_background_size        = ( ! empty( $image ) && ! empty( $size ) ) ? ' background-size: ' . $size . ';' : '';
   $fawzi_background_attachment  = ( ! empty( $image ) && ! empty( $size ) ) ? ' background-attachment: ' . $attachment . ';' : '';
   $fawzi_background_color       = ( ! empty( $color ) ) ? ' background-color: ' . $color . ';' : '';
   $fawzi_background_style       = ( ! empty( $image ) ) ? $fawzi_background_image . $fawzi_background_repeat . $fawzi_background_position . $fawzi_background_size . $fawzi_background_attachment : '';

  $fawzi_title_bg = ( ! empty( $fawzi_background_style ) || ! empty( $fawzi_background_color ) ) ? $fawzi_background_style . $fawzi_background_color : '';
  } else {
  $fawzi_title_bg = '';
  }

 }

if($fawzi_banner_type === 'hide-title-area') { // Hide Title Area
} elseif($fawzi_meta && $fawzi_banner_type === 'revolution-slider') { // Hide Title Area
	echo do_shortcode($fawzi_meta['page_revslider']);
} else {
if ($need_title_bar) { ?>
<section class="fwzi-page-title fwzi-parallax <?php echo esc_attr($fawzi_banner_type); ?>" style="<?php echo esc_attr($fawzi_title_bg); ?>">
  <div class="page-title-wrap <?php echo esc_attr($fawzi_title_bar_padding); ?>" style="<?php echo esc_attr($fawzi_custom_padding); ?> background-color:<?php echo esc_attr($fawzi_overlay_color); ?>;">
    <div class="container">
      <h1 class="page-title"><?php echo fawzi_title_area(); ?></h1>
    </div>
  </div>
</section>
<?php } } ?>
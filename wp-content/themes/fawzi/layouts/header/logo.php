<?php
// Logo Image
$fawzi_brand_logo_default = cs_get_option('brand_logo_default');
$fawzi_brand_logo_retina = cs_get_option('brand_logo_retina');

// Mobile Logo
$fawzi_mobile_logo = cs_get_option('mobile_logo_retina');
$fawzi_mobile_width = cs_get_option('mobile_logo_width');
$fawzi_mobile_height = cs_get_option('mobile_logo_height');
$fawzi_mobile_logo_top = cs_get_option('mobile_logo_top');
$fawzi_mobile_logo_bottom = cs_get_option('mobile_logo_bottom');
$fawzi_mobile_class = $fawzi_mobile_logo ? ' hav-mobile-logo' : ' dhve-mobile-logo';

// Metabox - Header Transparent
$fawzi_id    = ( isset( $post ) ) ? $post->ID : 0;
$fawzi_id    = ( is_home() ) ? get_option( 'page_for_posts' ) : $fawzi_id;
$fawzi_id    = ( fawzi_is_woocommerce_shop() ) ? wc_get_page_id( 'shop' ) : $fawzi_id;
$fawzi_meta  = get_post_meta( $fawzi_id, 'page_type_metabox'. true );
if ($fawzi_meta) {
  $fawzi_transparent_header = $fawzi_meta['transparency_header'];
} else { $fawzi_transparent_header = ''; }

// Retina Size
$fawzi_retina_width = cs_get_option('retina_width');
$fawzi_retina_height = cs_get_option('retina_height');

// Logo Spacings
$fawzi_brand_logo_top = cs_get_option('brand_logo_top');
$fawzi_brand_logo_bottom = cs_get_option('brand_logo_bottom');
if ($fawzi_mobile_logo_top) {
	$fawzi_brand_logo_top = 'padding-top:'. fawzi_check_px($fawzi_mobile_logo_top) .';';
} elseif ($fawzi_brand_logo_top !== '') {
	$fawzi_brand_logo_top = 'padding-top:'. fawzi_check_px($fawzi_brand_logo_top) .';';
} else { $fawzi_brand_logo_top = ''; }
if ($fawzi_mobile_logo_bottom) {
	$fawzi_brand_logo_bottom = 'padding-bottom:'. fawzi_check_px($fawzi_mobile_logo_bottom) .';';
} elseif ($fawzi_brand_logo_bottom !== '') {
	$fawzi_brand_logo_bottom = 'padding-bottom:'. fawzi_check_px($fawzi_brand_logo_bottom) .';';
} else { $fawzi_brand_logo_bottom = ''; }
?>
<div class="fwzi-brand <?php echo esc_attr($fawzi_mobile_class); ?>" <!--style="--><?php /*echo esc_attr($fawzi_brand_logo_top); echo esc_attr($fawzi_brand_logo_bottom); */?>">
	<a href="<?php echo esc_url(home_url( '/' )); ?>">
	<?php
	if (isset($fawzi_brand_logo_default)){
		if ($fawzi_brand_logo_retina){
			echo '<img src="'. esc_url(wp_get_attachment_url($fawzi_brand_logo_retina)) .'" width="'. esc_attr($fawzi_retina_width) .'" height="'. esc_attr($fawzi_retina_height) .'" alt="" class="retina-logo">
				';
		}
		echo '<img src="'. esc_url(wp_get_attachment_url($fawzi_brand_logo_default)) .'" alt="" class="default-logo" width="'. esc_attr($fawzi_retina_width) .'" height="'. esc_attr($fawzi_retina_height) .'">';
	} else {
		echo '<div class="text-logo">'. esc_attr(get_bloginfo( 'name' )) . '</div>';
	}
	if ($fawzi_mobile_logo) {
		echo '<img src="'. esc_url(wp_get_attachment_url($fawzi_mobile_logo)) .'" width="'. esc_attr($fawzi_mobile_width) .'" height="'. esc_attr($fawzi_mobile_height) .'" alt="" class="mobile-logo">';
	}
	echo '</a>';
	?>
</div>
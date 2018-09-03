<?php
/*
 * The template for displaying all single portfolios.
 * Author & Copyright: VictorThemes
 * URL: http://themeforest.net/user/VictorThemes
 */

// Metabox
$fawzi_id    = ( isset( $post ) ) ? $post->ID : 0;
$fawzi_id    = ( is_home() ) ? get_option( 'page_for_posts' ) : $fawzi_id;
$fawzi_id    = ( fawzi_is_woocommerce_shop() ) ? wc_get_page_id( 'shop' ) : $fawzi_id;
$fawzi_meta  = get_post_meta( $fawzi_id, 'page_type_metabox', true );

if ($fawzi_meta) {
	$fawzi_content_padding = $fawzi_meta['content_spacings'];
} else { $fawzi_content_padding = ''; }
// Padding - Metabox
if ($fawzi_content_padding && $fawzi_content_padding !== 'padding-none') {
	$fawzi_content_top_spacings = $fawzi_meta['content_top_spacings'];
	$fawzi_content_bottom_spacings = $fawzi_meta['content_bottom_spacings'];
	if ($fawzi_content_padding === 'padding-custom') {
		$fawzi_content_top_spacings = $fawzi_content_top_spacings ? 'padding-top:'. fawzi_check_px($fawzi_content_top_spacings) .';' : '';
		$fawzi_content_bottom_spacings = $fawzi_content_bottom_spacings ? 'padding-bottom:'. fawzi_check_px($fawzi_content_bottom_spacings) .';' : '';
		$fawzi_custom_padding = $fawzi_content_top_spacings . $fawzi_content_bottom_spacings;
	} else {
		$fawzi_custom_padding = '';
	}
} else {
	$fawzi_custom_padding = '';
}

get_header();
get_template_part( 'layouts/header/title', 'bar' );
?>

<div class="container fwzi-content-area <?php echo esc_attr($fawzi_content_padding); ?>" style="<?php echo esc_attr($fawzi_custom_padding); ?>">
<div class="row">
	<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<?php
		if (have_posts()) : while (have_posts()) : the_post();
			the_content();
		endwhile;
		endif;
		?>
	</div><!-- Post ID -->
</div><!-- Row -->
</div><!-- Container -->

<?php
get_footer();
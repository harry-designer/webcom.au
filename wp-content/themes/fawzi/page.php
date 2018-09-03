<?php
/*
 * The template for displaying all pages.
 * Author & Copyright: VictorThemes
 * URL: http://themeforest.net/user/VictorThemes
 */

// Metabox
global $post;
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

// Page Layout Options
$fawzi_page_layout = get_post_meta( get_the_ID(), 'page_layout_options', true );
if ($fawzi_page_layout) {

	$fawzi_page_layout = $fawzi_page_layout['page_layout'];

	if($fawzi_page_layout === 'left-sidebar' || $fawzi_page_layout === 'right-sidebar') {
		$fawzi_column_class = 'col-md-9';
		$fawzi_layout_class = 'container';
	} else {
		$fawzi_column_class = 'col-md-12';
		$fawzi_layout_class = 'container';
	}

	// Page Layout Class
	if ($fawzi_page_layout === 'left-sidebar') {
		$fawzi_sidebar_class = 'fwzi-left-sidebar';
	} elseif ($fawzi_page_layout === 'right-sidebar') {
		$fawzi_sidebar_class = 'fwzi-right-sidebar';
	} else {
		$fawzi_sidebar_class = 'fwzi-full-width';
	}
} else {
	$fawzi_column_class = 'col-md-12';
	$fawzi_layout_class = 'container';
	$fawzi_sidebar_class = 'fwzi-full-width';
}

get_header();
get_template_part( 'layouts/header/title', 'bar' );
// echo '<pre>'. json_encode( get_option('_cs_options') ). '<pre>'; // FawziWP - JSON File, json, Json.
?>

<div class="fwzi-mid-wrap <?php echo esc_attr($fawzi_layout_class .' '. $fawzi_content_padding .' '. $fawzi_sidebar_class); ?> fwzi-content-area" style="<?php echo esc_attr($fawzi_custom_padding); ?>">
	<div class="row">

		<?php
		// Left Sidebar
		if($fawzi_page_layout === 'left-sidebar') {
   		get_sidebar();
		}
		?>

		<div class="fwzi-content-side <?php echo esc_attr($fawzi_column_class); ?>">

			<?php
			while ( have_posts() ) : the_post();
				the_content();
			endwhile; // End of the loop.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;
			?>

		</div><!-- Content Area -->

		<?php
		// Right Sidebar
		if($fawzi_page_layout === 'right-sidebar') {
			get_sidebar();
		}
		?>

	</div>
</div>
<?php get_footer();

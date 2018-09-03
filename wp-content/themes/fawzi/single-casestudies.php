<?php
/*
 * The template for displaying all single case_studies.
 * Author & Copyright: VictorThemes
 * URL: http://themeforest.net/user/VictorThemes
 */

// Metabox
$fawzi_id    = ( isset( $post ) ) ? $post->ID : 0;
$fawzi_id    = ( 'casestudies' == get_post_type() ) ? get_the_ID() : $fawzi_id;
$fawzi_id    = ( is_home() ) ? get_option( 'page_for_posts' ) : $fawzi_id;
$fawzi_id    = ( fawzi_is_woocommerce_shop() ) ? wc_get_page_id( 'shop' ) : $fawzi_id;
$fawzi_meta  = get_post_meta( $fawzi_id, 'page_type_metabox', true );
// Page Layout Options
$fawzi_page_layout = get_post_meta( get_the_ID(), 'page_layout_options', true );

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

// Translation
$fawzi_single_pagination = cs_get_option('case_studies_single_pagination');
$case_studies_single_url = cs_get_option('case_studies_single_url');
$fawzi_prev_port = cs_get_option('prev_port');
$fawzi_next_port = cs_get_option('next_port');
$fawzi_prev_port = ($fawzi_prev_port) ? $fawzi_prev_port : esc_html__('Prev Project', 'fawzi');
$fawzi_next_port = ($fawzi_next_port) ? $fawzi_next_port : esc_html__('Next Project', 'fawzi');

get_header();
get_template_part( 'layouts/header/title', 'bar' );
?>

<div class="container fwzi-content-area case-studies-single <?php echo esc_attr($fawzi_content_padding); ?>" style="<?php echo esc_attr($fawzi_custom_padding); ?>">
	<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<?php
		if (have_posts()) : while (have_posts()) : the_post();
			the_content();
		endwhile;
		endif;
		?>
	</div><!-- Post ID -->
</div><!-- Container -->

<!-- Fwzi Growth Share -->
<?php
if ( function_exists( 'fawzi_cs_share_option' ) ) {
	fawzi_cs_share_option();
}

if ($fawzi_single_pagination) { ?>
<!-- Next and Prev Navigation -->
<section class="fwzi-more-posts">
	<?php
		$fawzi_prev_post = get_previous_post();
		$fawzi_next_post = get_next_post();
	?>
  <div class="container">
    <div class="row">
      <div class="col-md-4 col-sm-4">
        <?php if ($fawzi_prev_post) {	?>
				<a href="<?php echo esc_url(get_permalink($fawzi_prev_post->ID)); ?>" class="more-posts-link">
					<span><?php echo esc_attr($fawzi_prev_port); ?></span>
				</a>
				<?php } ?>
      </div>
      <div class="col-md-4 col-sm-4 text-center">
      	<?php if ($case_studies_single_url) { ?>
        <a href="<?php echo esc_url($case_studies_single_url); ?>" class="post-grid-view"><span class="grid-icon"></span> <span class="grid-icon"></span></a>
        <?php } ?>
      </div>
      <div class="col-md-4 col-sm-4 text-right">
        <?php if ($fawzi_next_post) { ?>
				<a href="<?php echo esc_url(get_permalink($fawzi_next_post->ID)); ?>" class="more-posts-link">
					<span><?php echo esc_attr($fawzi_next_port); ?>
				</a>
				<?php } ?>
      </div>
    </div>
  </div>
</section>
<?php } ?>

<?php
get_footer();
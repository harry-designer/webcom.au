<?php
/*
 * The template for displaying all single posts.
 * Author & Copyright: VictorThemes
 * URL: http://themeforest.net/user/VictorThemes
 */
get_header();
get_template_part( 'layouts/header/title', 'bar' );

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

// Page Layout Options
$fawzi_page_layout = get_post_meta( get_the_ID(), 'page_layout_options', true );

if ($fawzi_page_layout) {
$fawzi_sidebar_position = '';
$fawzi_page_layout = $fawzi_page_layout['page_layout'];

if ($fawzi_page_layout !== 'default'){

	// Page Layout Class
	if ($fawzi_page_layout === 'left-sidebar') {
		$fawzi_sidebar_class = 'left-sidebar';
		$fawzi_layout_class = 'col-md-9';
	} elseif ($fawzi_page_layout === 'right-sidebar') {
		$fawzi_sidebar_class = '';
		$fawzi_layout_class = 'col-md-9';
	} else {
		$fawzi_sidebar_class = '';
		$fawzi_layout_class = 'col-md-12';
	}

} else {
	// Theme Options
	$fawzi_sidebar_position = cs_get_option('single_sidebar_position');
	// Sidebar Position
	if ($fawzi_sidebar_position === 'sidebar-hide') {
		$fawzi_layout_class = 'col-md-12';
		$fawzi_sidebar_class = '';
	} elseif ($fawzi_sidebar_position === 'sidebar-left') {
		$fawzi_layout_class = 'col-md-9';
		$fawzi_sidebar_class = 'left-sidebar';
	} else {
		$fawzi_layout_class = 'col-md-9';
		$fawzi_sidebar_class = '';
	}
	}
} else {
	// Theme Options
	$fawzi_sidebar_position = cs_get_option('single_sidebar_position');
	// Sidebar Position
	if ($fawzi_sidebar_position === 'sidebar-hide') {
		$fawzi_layout_class = 'col-md-12';
		$fawzi_sidebar_class = '';
	} elseif ($fawzi_sidebar_position === 'sidebar-left') {
		$fawzi_layout_class = 'col-md-9';
		$fawzi_sidebar_class = 'left-sidebar';
	} else {
		$fawzi_layout_class = 'col-md-9';
		$fawzi_sidebar_class = '';
	}
}

?>

<!-- Fwzi Mid Wrap -->
<section class="fwzi-mid-wrap <?php echo esc_attr($fawzi_content_padding .' '. $fawzi_sidebar_class); ?>" style="<?php echo esc_attr($fawzi_custom_padding); ?>">
  <div class="container">
    <div class="row">
      <div class="<?php echo esc_attr($fawzi_layout_class); ?> fwzi-primary">
        <div class="fwzi-unit-fix">
          <div class="fwzi-blog-detail">
						<?php
						if ( have_posts() ) :
							/* Start the Loop */
							while ( have_posts() ) : the_post();
								get_template_part( 'layouts/post/content', 'single' );
								if ( comments_open() || get_comments_number() ) :
									comments_template();
								endif;
							endwhile;
						else :
							get_template_part( 'layouts/post/content', 'none' );
						endif;

				    fawzi_paging_nav();
				    wp_reset_postdata();
						?>
					</div><!-- Blog Detail -->
				</div><!-- U Fix -->
			</div><!-- Primary -->

			<?php
			if ($fawzi_sidebar_position !== 'sidebar-hide' && $fawzi_page_layout !== 'full-width' ) {
				get_sidebar(); // Sidebar
			}
			?>
		</div><!-- Content Area -->
	</div>
</section>
<?php get_footer();

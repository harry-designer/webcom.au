<?php
/*
 * The template for displaying the footer.
 * Author & Copyright: VictorThemes
 * URL: http://themeforest.net/user/VictorThemes
 */

$fawzi_id    = ( isset( $post ) ) ? $post->ID : 0;
$fawzi_id    = ( is_home() ) ? get_option( 'page_for_posts' ) : $fawzi_id;
$fawzi_id    = ( fawzi_is_woocommerce_shop() ) ? wc_get_page_id( 'shop' ) : $fawzi_id;
$fawzi_meta  = get_post_meta( $fawzi_id, 'page_type_metabox', true );

if ($fawzi_meta) {
	$fawzi_hide_footer  = $fawzi_meta['hide_footer'];
} else { $fawzi_hide_footer = ''; }
if (!$fawzi_hide_footer) { // Hide Footer Metabox

if (is_active_sidebar('footer-1') || is_active_sidebar('footer-2') || is_active_sidebar('footer-3') || is_active_sidebar('footer-4')) {
?>

	<!-- Footer -->
	<footer class="fwzi-footer">
		<?php
			$footer_widget_block = cs_get_option('footer_widget_block');
			if (isset($footer_widget_block)) {
	      // Footer Widget Block
	      get_template_part( 'layouts/footer/footer', 'widgets' );
	    }
    ?>
	</footer>
	<!-- Footer -->

<?php }
	$need_copyright = cs_get_option('need_copyright');
	if (isset($need_copyright)) {
	  // Copyright Block
		get_template_part( 'layouts/footer/footer', 'copyright' );
	}
 } // Hide Footer Metabox

// Preloader & BTT Option
$fawzi_pre_loader = cs_get_option('pre_loader');
$fawzi_loader_style = cs_get_option('main_pre_loader_option');
$fawzi_back_to_top = cs_get_option('back_to_top');

if ($fawzi_pre_loader) {

	if($fawzi_loader_style){
    $fawzi_loader_icon_class = $fawzi_loader_icon_class;
  } else {
    $fawzi_loader_icon_class = 'ball-scale-multiple';
  }

} else {
	$fawzi_loader_icon_class = '';
}
if ($fawzi_back_to_top === true) {
?>
<!-- Fwzi Back Top -->
<div class="fwzi-back-top">
  <a href="#0"><i class="fa fa-angle-up" aria-hidden="true"></i></a>
</div>
<?php  } else { } ?>

<?php if ($fawzi_pre_loader) { ?>
<!-- Fwzi Preloader -->
<div class="fwzi-preloaderr">
  <div class="loader-wrap">
    <div class="loader">
      <div class="loader-inner <?php echo esc_attr($fawzi_loader_icon_class); ?>"></div>
    </div>
  </div>
</div>
<?php } else { } ?>

</div><!-- #vtheme-wrapper -->

<?php wp_footer(); ?>
</body>
</html>
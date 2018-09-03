<?php
	// Main Text
	$fawzi_need_copyright = cs_get_option('need_copyright');
	$fawzi_footer_copyright_layout = cs_get_option('footer_copyright_layout');
	$fawzi_copyright_text = cs_get_option('copyright_text');
	$fawzi_secondary_text = cs_get_option('secondary_text');

	if ($fawzi_footer_copyright_layout === 'copyright-1') {
		$fawzi_copyright_layout_class = 'col-sm-6';
		$fawzi_copyright_seclayout_class = 'text-right';
	} elseif ($fawzi_footer_copyright_layout === 'copyright-2') {
		$fawzi_copyright_layout_class = 'col-sm-6 pull-right text-right';
		$fawzi_copyright_seclayout_class = 'text-left';
	} elseif ($fawzi_footer_copyright_layout === 'copyright-3') {
		$fawzi_copyright_layout_class = 'col-sm-12 text-center';
	} else {
		$fawzi_copyright_layout_class = '';
		$fawzi_copyright_seclayout_class = '';
	}

	if (isset($fawzi_need_copyright)) {
	if ($fawzi_copyright_text || $fawzi_secondary_text ) {
?>
<!-- Copyright Bar -->
<div class="fwzi-copyright">
  <div class="container">
  	<div class="pull-left <?php echo esc_attr($fawzi_copyright_layout_class); ?>">
  		<?php
				echo do_shortcode($fawzi_copyright_text);
			?>
  	</div>
		<?php if ($fawzi_footer_copyright_layout != 'copyright-3') { ?>
		<div class="pull-right <?php echo esc_attr($fawzi_copyright_seclayout_class); ?>">
			<?php
				echo do_shortcode($fawzi_secondary_text);
			?>
		</div>
		<?php } ?>

  </div>
</div>
<!-- Copyright Bar -->
<?php } else { ?>
	<div class="fwzi-copyright">
	  <div class="container">
			<p class="copyright-alt">&copy; 2017<a href="<?php echo esc_url(home_url( '/' )); ?>"><?php echo esc_attr(' Victor Themes', 'fawzi') ?></a><?php echo esc_attr('. All Rights Reserved.', 'fawzi') ?></p>
		</div>
	</div>
<?php } }
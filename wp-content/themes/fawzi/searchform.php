<form method="get" id="searchform" action="<?php echo esc_url(home_url('/')); ?>" class="searchform" >
	<div>
		<label class="screen-reader-text" for="s"><?php esc_html_e( 'Search for:', 'fawzi' ); ?></label>
		<input type="text" name="s" id="s" placeholder="<?php esc_html_e('Search...','fawzi'); ?>" />
		<input type="submit" id="searchsubmit" value="" />
	</div>
</form>
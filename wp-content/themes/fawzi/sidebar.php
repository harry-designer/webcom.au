<?php
/*
 * The sidebar containing the main widget area.
 * Author & Copyright: VictorThemes
 * URL: http://themeforest.net/user/VictorThemes
 */

$fawzi_blog_widget = cs_get_option('blog_widget');
$fawzi_single_blog_widget = cs_get_option('single_blog_widget');
$fawzi_team_widget = cs_get_option('team_widget');

if (is_page()) {
	// Page Layout Options
	$fawzi_page_layout = get_post_meta( get_the_ID(), 'page_layout_options', true );
}
?>

<div class="col-md-3 col-sm-12 fwzi-secondary">
	<?php if (is_page() && $fawzi_page_layout['page_sidebar_widget']) {
		if (is_active_sidebar($fawzi_page_layout['page_sidebar_widget'])) {
			dynamic_sidebar($fawzi_page_layout['page_sidebar_widget']);
		}
	} elseif (!is_page() && $fawzi_blog_widget && !$fawzi_single_blog_widget) {
		if (is_active_sidebar($fawzi_blog_widget)) {
			dynamic_sidebar($fawzi_blog_widget);
		}
	} elseif ($fawzi_team_widget && is_singular('team')) {
		if (is_active_sidebar($fawzi_team_widget)) {
			dynamic_sidebar($fawzi_team_widget);
		}
	} elseif (is_single() && $fawzi_single_blog_widget) {
		if (is_active_sidebar($fawzi_single_blog_widget)) {
			dynamic_sidebar($fawzi_single_blog_widget);
		}
	} else {
		if (is_active_sidebar('sidebar-1')) {
			dynamic_sidebar( 'sidebar-1' );
		}
	} ?>
</div><!-- Secondary -->

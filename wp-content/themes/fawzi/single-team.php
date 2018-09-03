<?php
/*
 * The template for displaying all single team.
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
// Padding - Theme Options
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
}
// Sidebar Position

// Theme Options
$fawzi_sidebar_position = cs_get_option('team_sidebar_position');
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

// Link
$team_options = get_post_meta( get_the_ID(), 'team_options', true );
$team_pro = $team_options['team_job_position'];
$team_socials = $team_options['social_icons'];

// Featured Image
$large_image =  wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'fullsize', false, '' );
$large_image = $large_image[0];
$abt_title = get_the_title();
$actual_image = '';

get_header();
get_template_part( 'layouts/header/title', 'bar' );
?>
<section class="team-single <?php echo esc_attr($fawzi_sidebar_class); ?>">
<div class="container fwzi-content-area <?php echo esc_attr($fawzi_content_padding); ?>" style="<?php echo esc_attr($fawzi_custom_padding); ?>">
<div class="row">
	<div class="<?php echo esc_attr($fawzi_layout_class); ?> fwzi-primary">
		<section class="fwzi-members-single"> <!-- Team Starts -->
		  <div class="member-item">
		  	<div class="col-md-3 col-sm-12 no-pad-left">
		    <div class="fwzi-image">
		      <?php if ($large_image) {
		      	echo '<img src="'. esc_url($large_image) .'" alt="'. esc_attr($abt_title) .'">';
		      } ?>
		    </div>
		    </div>
		  	<div class="col-md-9 col-sm-12 no-pad-left">
		    <div class="team-single-detail">
		      <div class="member-info">
		        <h4 class="member-name"><?php echo esc_attr($abt_title); ?></h4>
		        <?php if ($team_pro) { ?>
		        <h6 class="member-designation"><?php echo esc_attr($team_pro); ?></h6>
		        <?php } ?>
		      </div>
		      <p><?php the_excerpt(); ?></p>
		      <div class="fwzi-social rounded">
			      <div class="social-wrap">
			        <?php
			          if ( ! empty( $team_socials ) ) {
			          foreach ( $team_socials as $social ) {
			        ?>
			          <a href="<?php echo esc_url($social['icon_link']); ?>"><i class="<?php echo esc_attr($social['icon']); ?>" aria-hidden="true"></i></a>
			        <?php } } ?>
			      </div>
			    </div>
		    </div>
		    </div>
		  </div>
		</section>
		<div class="fwzi-team-single-content">
		<?php
		if (have_posts()) : while (have_posts()) : the_post();
			the_content();
		endwhile;
		endif;
		?>
		</div><!-- Blog Div -->
		<?php
		wp_reset_postdata();  // avoid errors further down the page
		?>
	</div>
	<?php
	if ($fawzi_sidebar_position !== 'sidebar-hide') {
		get_sidebar(); // Sidebar
	}
	?>
</div>
</div>
</section>
<?php get_footer();

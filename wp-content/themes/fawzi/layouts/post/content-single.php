<?php
/**
 * Single Post.
 */
$fawzi_large_image =  wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'fullsize', false, '' );
$fawzi_large_image = $fawzi_large_image[0];

$fawzi_post_type = get_post_meta( get_the_ID(), 'post_type_metabox', true );
$fawzi_blog_style = cs_get_option('blog_listing_style');

// Single Theme Option
$fawzi_single_featured_image = cs_get_option('single_featured_image');
$fawzi_single_author_info = cs_get_option('single_author_info');
$fawzi_single_share_option = cs_get_option('single_share_option');
?>

<div id="post-<?php the_ID(); ?>" <?php post_class('fwzi-blog-post'); ?>>

	<?php if ($fawzi_large_image) { ?>
	<div class="blog-image popup-image">
    <a href="<?php echo esc_url($fawzi_large_image); ?>"><img src="<?php echo esc_url($fawzi_large_image); ?>" alt="<?php echo esc_attr(get_the_title()); ?>"></a>
  </div>
	<?php } ?>
	<div class="blog-date-title-wrap">
    <div class="blog-date-wrap">
			<h3 class="blog-date"><?php echo get_the_date('d'); ?></h3>
			<h6 class="blog-month"><?php echo get_the_date('M'); ?></h6>
		</div>
    <div class="blog-title-wrap">
      <h2 class="blog-title"><?php echo esc_attr(get_the_title()); ?></h2>
      <h6 class="blog-meta"><?php esc_html_e('Category', 'fawzi'); ?> : <?php the_category(', '); ?> <?php esc_html_e('/ by', 'fawzi'); ?> <?php the_author_posts_link(); ?></h6>
    </div>
  </div>
  <div class="blog-detail-wrap">
    <?php
		the_content();
		echo fawzi_wp_link_pages();
		?>
  </div>
  <div class="fwzi-blog-meta">
    <?php
    if ($fawzi_single_share_option) {
    	if ( function_exists( 'fawzi_wp_share_option' ) ) {
	    	fawzi_wp_share_option();
	    }
    }
    // Tags
		$tag_list = get_the_tags();
	  if($tag_list) { ?>
		<div class="fwzi-blog-tags">
			<?php echo the_tags( '<ul><li><span>Tags :</span></li><li>', '</li><li>', '</li></ul>' ); ?>
		</div>
		<?php } ?>
  </div>

  <div class="fwzi-blog-posts">
		<?php $next_post = get_adjacent_post(false, '', false);
			if(!empty($next_post)) {
			echo '<div class="pull-left"><a href="' . esc_url(get_permalink($next_post->ID)) . '" title="' . esc_attr($next_post->post_title) . '"><i class="fa fa-angle-left" aria-hidden="true"></i> '. esc_html('Previous Post', 'fawzi') .'</a></div>'; } ?>
		<?php $prev_post = get_adjacent_post(false, '', true);
			if(!empty($prev_post)) {
			echo '<div class="pull-right"><a href="' . esc_url(get_permalink($prev_post->ID)) . '" title="' . esc_attr($prev_post->post_title) . '">'. esc_html('Next Post', 'fawzi') .' <i class="fa fa-angle-right" aria-hidden="true"></i></a></div>'; } ?>
  </div>

	<!-- Author Info -->
	<?php
	if($fawzi_single_author_info) {
		echo fawzi_author_info();
	}
	?>
	<!-- Author Info -->

</div><!-- #post-## -->
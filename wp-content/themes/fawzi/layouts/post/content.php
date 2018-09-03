<?php
/**
 * Template part for displaying posts.
 */
$fawzi_large_image =  wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'fullsize', false, '' );
$fawzi_large_image = $fawzi_large_image[0];

$fawzi_read_more_text = cs_get_option('read_more_text');
$fawzi_read_text = $fawzi_read_more_text ? $fawzi_read_more_text : esc_html__( 'Read More', 'fawzi' );
$fawzi_post_type = get_post_meta( get_the_ID(), 'post_type_metabox', true );
$fawzi_blog_style = cs_get_option('blog_listing_style');
$fawzi_metas_hide = (array) cs_get_option( 'theme_metas_hide' );
?>

<div class="blog-item">
<?php if(is_sticky()){
  $sticky_class = ' sticky';
} else {
  $sticky_class = '';
} ?>
<div id="post-<?php the_ID(); ?>" <?php post_class('fwzi-blog-post '.$sticky_class.''); ?>>
  
  <?php if ($fawzi_large_image) { ?>
  <div class="fwzi-image popup-image">
    <a href="<?php echo esc_url($fawzi_large_image); ?>"><img src="<?php echo esc_url($fawzi_large_image); ?>" alt="<?php echo esc_attr(get_the_title()); ?>"></a>
  </div>
  <?php } ?>
  <div class="blog-info">
    <div class="blog-date-title-wrap">
      <div class="blog-date-wrap">
        <h3 class="blog-date"><?php echo get_the_date('d'); ?></h3>
        <h6 class="blog-month"><?php echo get_the_date('M'); ?></h6>
      </div>
      <div class="blog-title-wrap">
        <h2 class="blog-title"><a href="<?php echo esc_url( get_permalink() ); ?>"><?php echo esc_attr(get_the_title()); ?></a></h2>
        <h6 class="blog-meta">by <?php the_author_posts_link(); ?> in <?php the_category(', '); ?></h6>
      </div>
    </div>
    <p>
    <?php
			$blog_excerpt = cs_get_option('theme_blog_excerpt');
			if ($blog_excerpt) {
				$blog_excerpt = $blog_excerpt;
      } else {
        $blog_excerpt = '39';
			}
			fawzi_excerpt($blog_excerpt);
			echo fawzi_wp_link_pages();
		?>
    </p>
    <div class="blog-bottom-links">
      <div class="pull-left"><a href="<?php echo esc_url( get_permalink() ); ?>"><?php echo esc_attr($fawzi_read_text); ?></a></div>
      <div class="pull-right">
        <div class="fwzi-like"><?php if( function_exists('zilla_likes') ) zilla_likes(); ?></div>
      </div>
    </div>
  </div>

</div><!-- #post-## -->
</div><!-- Blog Item -->

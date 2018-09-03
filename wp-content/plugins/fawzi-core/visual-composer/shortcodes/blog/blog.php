<?php
/* ==========================================================
  Blog
=========================================================== */
if ( !function_exists('fwzi_blog_function')) {
  function fwzi_blog_function( $atts, $content = NULL ) {

    extract(shortcode_atts(array(
      'blog_style'  => '',
      'blog_column'  => '',
      'blog_limit'  => '',
      // Enable & Disable
      'blog_pagination'  => '',
      // Listing
      'blog_order'  => '',
      'blog_orderby'  => '',
      'blog_show_category'  => '',
      'class'  => '',
      // Miss Align
      'miss_align_height'  => '',
    ), $atts));

    // Style
    if ($blog_style === 'fwzi-blog-two') {
      $blog_style_class = 'fwzi-blog blog-style-two';
    } else {
      $blog_style_class = 'fwzi-blog';
    }

    // Shortcode Style CSS
    $e_uniqid        = uniqid();
    $inline_style  = '';

    // Miss-Aligned
    if ( $miss_align_height ) {
      $inline_style .= '.fwzi-blog.fwzi-post-'. $e_uniqid .' .has-post-thumbnail .blog-item, .blog-style-two.fwzi-post-'. $e_uniqid .' .has-post-thumbnail .blog-item {';
      $inline_style .= ( $miss_align_height ) ? 'min-height:'. fawzi_core_check_px($miss_align_height) .';' : '';
      $inline_style .= '}';
    }

    // add inline style
    add_inline_style( $inline_style );
    $styled_class  = ' fwzi-post-'. $e_uniqid;

    // Turn output buffer on
    ob_start();

    // Pagination
    global $paged;
    if( get_query_var( 'paged' ) )
      $my_page = get_query_var( 'paged' );
    else {
      if( get_query_var( 'page' ) )
        $my_page = get_query_var( 'page' );
      else
        $my_page = 1;
      set_query_var( 'paged', $my_page );
      $paged = $my_page;
    }

    $args = array(
      // other query params here,
      'paged' => $my_page,
      'post_type' => 'post',
      'posts_per_page' => (int)$blog_limit,
      'category_name' => esc_attr($blog_show_category),
      'orderby' => $blog_orderby,
      'order' => $blog_order
    );

    $fwzi_post = new WP_Query( $args ); ?>

    <!-- Blog Start -->
    <div class="<?php echo esc_attr($blog_style_class .' '. $styled_class .' '. $class); ?>">

      <?php
      if ($fwzi_post->have_posts()) : while ($fwzi_post->have_posts()) : $fwzi_post->the_post();

        $large_image =  wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'fullsize', false, '' );
        $large_image = $large_image[0];
        $post_type = get_post_meta( get_the_ID(), 'post_type_metabox', true );
        $fawzi_blog_img = aq_resize( $large_image, '370', '250', true );
        $fawzi_featured_img = ( $fawzi_blog_img ) ? $fawzi_blog_img : FAWZI_PLUGIN_ASTS . '/images/370x250.jpg';
      ?>

      <div id="post-<?php the_ID(); ?>" <?php post_class('fwzi-blog-post'); ?>>

        <div class="col-md-4 col-sm-6">
          <div class="blog-item">
          <?php if ($large_image) { ?>
            <div class="fwzi-image"><img src="<?php echo esc_url($fawzi_featured_img); ?>" alt="<?php echo esc_attr(get_the_title()); ?>"></div>
          <?php } ?>
            <div class="blog-info">
              <h4 class="blog-title"><a href="<?php echo esc_url( get_permalink() ); ?>"><?php echo esc_attr(get_the_title()); ?></a></h4>
              <h6 class="blog-meta">by <?php the_author_posts_link(); ?> in <?php the_category(', '); ?></h6>
            </div>
          </div>
        </div>

      </div><!-- #post-## -->

      <?php
      endwhile;
      endif;
      wp_reset_postdata(); ?>

    </div>
    <!-- Blog End -->

    <?php
    if ($blog_pagination) {
      if ( function_exists('wp_pagenavi')) {
        wp_pagenavi(array( 'query' => $fwzi_post ) );
        wp_reset_postdata();  // avoid errors further down the page
      }
    }

    // Return outbut buffer
    return ob_get_clean();

  }
}
add_shortcode( 'fwzi_blog', 'fwzi_blog_function' );
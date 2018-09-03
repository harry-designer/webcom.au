<?php
/*
 * The template for displaying resource category pages.
 * Author & Copyright: VictorThemes
 * URL: http://themeforest.net/user/VictorThemes
 */
get_header();
get_template_part( 'layouts/header/title', 'bar' );

$resource_limit = cs_get_option('resource_limit');
  $resource_orderby = cs_get_option('resource_orderby');
  $resource_order = cs_get_option('resource_order');
  $resource_pagination = cs_get_option('resource_pagination');

  $resource_limit = $resource_limit ? $resource_limit : '8';

    // Query Starts Here
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

    $name = get_the_term_list( $post->ID, 'resource-author', '', ', ' );
    $args = array(
      'paged' => $my_page,
      'post_type' => 'resource',
      'posts_per_page' => (int)$resource_limit,
      'taxonomy' => 'resource-author', // set the taxonomy to use.
      'term' => sanitize_title($name),
    );

    $fawzi_resource_qury = new WP_Query( $args );

    if ($fawzi_resource_qury->have_posts()) :
    ?>
    <section class="archive-spacing fwzi-seo-books books-style-two"> <!-- Resource Starts -->
      <div class="container">
        <div class="row">
        <?php
        while ($fawzi_resource_qury->have_posts()) : $fawzi_resource_qury->the_post();

        // Link
        $resource_options = get_post_meta( get_the_ID(), 'resource_options', true );
        $resource_download = $resource_options['resource_download'];
        $resource_download_link = $resource_options['resource_download_link'];
        $popup_attribute = $resource_options['popup-attribute'];
        $resource_download = $resource_download ? $resource_download : 'Download Now';
        $resource_download_link = $resource_download_link ? $resource_download_link : '#';

        // Featured Image
        $large_image =  wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'fullsize', false, '' );
        $large_image = $large_image[0];
        $abt_title = get_the_title();
        $actual_image = '<img src="'. $large_image .'" alt="'.$abt_title.'">';
        ?>
        <div class="col-lg-6">
          <div class="books-item">
            <div class="fwzi-image">
            <?php if ($large_image) { ?>
              <a href="<?php esc_url(the_permalink()); ?>">
              <img src="<?php echo esc_url($large_image); ?>" alt="<?php echo esc_attr($abt_title); ?>">
            </a><?php } ?>
            </div>
            <div class="book-info">
              <div class="book-info-wrap">
                <h3 class="book-title"><a href="<?php esc_url(the_permalink()); ?>"><?php echo esc_attr($abt_title); ?></a></h3>
                <p><?php the_excerpt(); ?></p>
              </div>
              <div class="book-author">
                <?php $author = get_the_terms( $post->ID, 'resource-author' );
                if ($author) { ?>
                <div class="pull-left"><?php esc_html_e('by', 'fawzi'); ?>
                  <?php foreach ( $author as $cat){
                  $url = get_term_link($cat);?>
                  <a href="<?php echo esc_url($url);?>"><?php echo esc_attr($cat->name); ?></a>
                <?php } ?>
                </div>
                <?php } ?>
                <div class="pull-right"><a href="<?php echo esc_url($resource_download_link); ?>" data-optin-slug="<?php echo esc_attr($popup_attribute); ?>"><?php echo esc_attr($resource_download); ?></a></div>
              </div>
            </div>
          </div>
        </div>
        <?php endwhile; ?>
        </div>
      </div>

  <?php
    endif;

    if ($resource_pagination) {
      if ( function_exists('wp_pagenavi')) {
        wp_pagenavi(array( 'query' => $fawzi_resource_qury ) );
        wp_reset_postdata();  // avoid errors further down the page
      }
    } ?>
    </section> <!-- Resource End -->

<?php get_footer();

<?php
/* Resource */
if ( !function_exists('fwzi_resource_function')) {
  function fwzi_resource_function( $atts, $content = NULL ) {

    extract(shortcode_atts(array(
      'class'  => '',
      // Listing
      'resource_limit'  => '',
      'resource_order'  => '',
      'resource_orderby'  => '',
      'resource_pagination'  => '',
      'resource_pagination_type' => '',
      'resource_more_btn_text' => '',
      'resource_load_icon_option'   => '',
      'resource_min_height'  => '', 
      // Color & Style
      'title_color'  => '',
      'title_hover_color'  => '',
      'author_color'  => '',
      'author_hover_color'  => '',
      'download_color'  => '',
      'download_hover_color'  => '',
      // Button
      'btn_top_space'  => '',
      'btn_bg_color'  => '',
      'btn_text_color'  => '',
      'btn_border_color'  => '',
      'btn_bg_hover_color'  => '',
      'btn_text_hover_color'  => '',
      'btn_border_hover_color'  => '',
    ), $atts));

    // Shortcode Style CSS
    $e_uniqid       = uniqid();
    $inline_style   = '';

    // Minimum Height
    if ( $resource_min_height ) {
      $inline_style .= '.fwzi-resource-'. $e_uniqid .' .books-item {';
      $inline_style .= ( $resource_min_height ) ? 'min-height:'. fawzi_core_check_px($resource_min_height) .';' : '';
      $inline_style .= '}';
    }
    // Name Color
    if ( $title_color ) {
      $inline_style .= '.fwzi-resource-'. $e_uniqid .' h3.book-title, .fwzi-resource-'. $e_uniqid .' h3.book-title a {';
      $inline_style .= ( $title_color ) ? 'color:'. $title_color .';' : '';
      $inline_style .= '}';
    }
    // Name Hover color
    if ( $title_hover_color ) {
      $inline_style .= '.fwzi-resource-'. $e_uniqid .' h3.book-title a:hover {';
      $inline_style .= ( $title_hover_color ) ? 'color:'. $title_hover_color .';' : '';
      $inline_style .= '}';
    }
    // Author Color
    if ( $author_color ) {
      $inline_style .= '.fwzi-resource-'. $e_uniqid .' .book-author a {';
      $inline_style .= ( $author_color ) ? 'color:'. $author_color .';' : '';
      $inline_style .= '}';
    }
    // Author Hover color
    if ( $author_hover_color ) {
      $inline_style .= '.fwzi-resource-'. $e_uniqid .' .book-author a:hover {';
      $inline_style .= ( $author_hover_color ) ? 'color:'. $author_hover_color .';' : '';
      $inline_style .= '}';
    }
    // Download Color
    if ( $download_color ) {
      $inline_style .= '.fwzi-resource-'. $e_uniqid .' .book-author .pull-right a {';
      $inline_style .= ( $download_color ) ? 'color:'. $download_color .';' : '';
      $inline_style .= '}';
    }
    // Download Hover color
    if ( $download_hover_color ) {
      $inline_style .= '.fwzi-resource-'. $e_uniqid .' .book-author .pull-right a:hover {';
      $inline_style .= ( $download_hover_color ) ? 'color:'. $download_hover_color .';' : '';
      $inline_style .= '}';
    }  
    // Button
    if ( $btn_bg_color || $btn_text_color || $btn_border_color ) {
      $inline_style .= '.fwzi-resource-'. $e_uniqid .'.fwzi-seo-books .fwzi-pagination a.malinky-load-more__button.fwzi-btn {';
      $inline_style .= ( $btn_bg_color ) ? 'background-color:'. $btn_bg_color .';' : '';
      $inline_style .= ( $btn_text_color ) ? 'color:'. $btn_text_color .';' : '';
      $inline_style .= ( $btn_text_color ) ? 'border-color:'. $btn_border_color .';' : '';
      $inline_style .= '}';
    }
    // Button Hover
    if ( $btn_bg_hover_color || $btn_text_hover_color || $btn_border_hover_color ) {
      $inline_style .= '.fwzi-resource-'. $e_uniqid .'.fwzi-seo-books .fwzi-pagination a.malinky-load-more__button.fwzi-btn:hover {';
      $inline_style .= ( $btn_bg_hover_color ) ? 'background-color:'. $btn_bg_hover_color .';' : '';
      $inline_style .= ( $btn_text_hover_color ) ? 'color:'. $btn_text_hover_color .';' : '';
      $inline_style .= ( $btn_border_hover_color ) ? 'border-color:'. $btn_border_hover_color .';' : '';
      $inline_style .= '}';
    }  
    // Button space
    if ( $btn_top_space ) {
      $inline_style .= '.fwzi-resource-'. $e_uniqid .' .fwzi-pagination {';
      $inline_style .= ( $btn_top_space ) ? 'padding-top:'. fawzi_core_check_px($btn_top_space) .';' : '';
      $inline_style .= '}';
    }

    // Add inline style
    add_inline_style( $inline_style );
    $styled_class  = 'fwzi-resource-'. $e_uniqid;

    // Turn output buffer on
    ob_start();

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

    global $post;
    $name = get_the_term_list( $post->ID, 'resource-author', '', ', ' );
    $args = array(
      'paged' => $my_page,
      'post_type' => 'resource',
      'posts_per_page' => (int)$resource_limit,
      'orderby' => $resource_orderby,
      'order' => $resource_order,
      'taxonomy' => 'resource-author', // set the taxonomy to use.
      'term' => sanitize_title($name),
    );

    $fwzi_resource_qury = new WP_Query( $args );

    if ($resource_pagination_type) {
      $fwzi_pagi_style = $resource_pagination_type;
    } else {
      $fwzi_pagi_style = cs_get_option('resource_pagination_type');
    }
    if ($resource_load_icon_option) {
      $fwzi_loader_icon = $resource_load_icon_option;
    } else {
      $fwzi_loader_icon = cs_get_option('resource_loader_icon_option');
    }

    $resource_more_btn_text = $resource_more_btn_text ? $resource_more_btn_text : __('Load More', 'fawzi-core');

    if ($fwzi_resource_qury->have_posts()) :
    ?>             

    <section class="fwzi-seo-books books-style-two <?php echo $styled_class .' '. $class; ?> fwzi-post-load-more load-cs"  data-select=".fwzi-seo-books" data-item=".col-lg-6" data-loading="<?php echo esc_attr($resource_more_btn_text); ?>" data-paging="<?php echo esc_attr($fwzi_pagi_style); ?>" data-icon-port="<?php echo esc_attr($fwzi_loader_icon); ?>">
    <div class="fawzi-resource-book"> <!-- Resource Starts -->
      <div class="row">    
        <?php
        while ($fwzi_resource_qury->have_posts()) : $fwzi_resource_qury->the_post();

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
        $book_title = get_the_title();
        $actual_image = '<img src="'. $large_image .'" alt="'.$book_title.'">';
        ?>
        <div class="col-lg-6">
          <div class="books-item">
            <div class="fwzi-image"><a href="<?php esc_url(the_permalink()); ?>"><?php echo $actual_image; ?></a></div>
            <div class="book-info">
              <div class="book-info-wrap">
                <h3 class="book-title"><a href="<?php esc_url(the_permalink()); ?>"><?php echo $book_title; ?></a></h3>
                <p><?php the_excerpt(); ?></p>
              </div>
              <div class="book-author">
                <?php $author = get_the_terms( $post->ID, 'resource-author' );
                if ($author) { ?>                   
                <div class="pull-left"><?php echo esc_attr('by', 'fawzi'); ?> 
                  <?php foreach ( $author as $cat){ 
                  $url = get_term_link($cat);?>
                  <a href="<?php echo $url;?>"><?php echo $cat->name; ?></a>
                <?php } ?> 
                </div>
                <?php } ?>
                <div class="pull-right"><a href="<?php echo $resource_download_link; ?>" data-optin-slug="<?php echo $popup_attribute; ?>"><?php echo $resource_download; ?></a></div>
              </div>
            </div>
          </div>
        </div>         
        <?php endwhile; ?>
      </div>
    </div>
    <?php if ($resource_pagination) { ?>
      <div class="fwzi-pagination">
      <div class="fwzi-pagenavi">
        <?php if ( function_exists('wp_pagenavi')) { wp_pagenavi( array( 'query' => $fwzi_resource_qury ) ); } ?>
      </div>
      </div>
    <?php } ?>
    </section> <!-- Resource End -->

<?php
  endif;
    // Return outbut buffer
    return ob_get_clean();
  }
}
add_shortcode( 'fwzi_resource', 'fwzi_resource_function' );
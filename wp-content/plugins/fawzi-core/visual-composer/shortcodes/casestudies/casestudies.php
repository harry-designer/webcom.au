<?php
/* ==========================================================
  Case Studies
=========================================================== */
if ( !function_exists('fwzi_case_studies_function')) {
  function fwzi_case_studies_function( $atts, $content = NULL ) {

    extract(shortcode_atts(array(
      'case_studies_limit'  => '',
      'case_studies_column'  => '',
      'pad_top'  => '',
      'pad_right'  => '',
      'pad_bottom'  => '',
      'pad_left'  => '',
      // Enable & Disable
      'case_studies_filter'  => '',
      // Pagi
      'case_studies_pagination'  => '',
      'case_studies_pagination_type' => '',
      'cs_more_btn_text' => '',
      'cs_load_icon_option'   => '',
      // Listing
      'case_studies_order'  => '',
      'case_studies_orderby'  => '',
      'case_studies_show_category'  => '',
      'case_studies_min_height'  => '',
      'btn_text'  => '',
      'class'  => '',
      // Style - Filter
      'filter_color'  => '',
      'filter_active_color'  => '',
      'filter_line_color'  => '',
      'filter_size'  => '',
      // Style - Colors And Sizes
      'image_overlay_color'  => '',
      'icon_color'  => '',
      'icon_bg_color'  => '',
      'icon_hover_color'  => '',
      'icon_bg_hover_color'  => '',
      'case_studies_title_size'  => '',
      'case_studies_title_color'  => '',
      'case_studies_title_hover_color'  => '',
      // Button
      'btn_top_space'  => '',
      'btn_bottom_space'  => '',
      'btn_bg_color'  => '',
      'btn_text_color'  => '',
      'btn_border_color'  => '',
      'btn_bg_hover_color'  => '',
      'btn_text_hover_color'  => '',
      'btn_border_hover_color'  => '',
    ), $atts));

    // Shortcode Style CSS
    $e_uniqid        = uniqid();
    $inline_style  = '';

    // Minimum Height
    if ( $case_studies_min_height ) {
      $inline_style .= '.fwzi-case-studies-'. $e_uniqid .' .project-item .fwzi-image img {';
      $inline_style .= ( $case_studies_min_height ) ? 'min-height:'. fawzi_core_check_px($case_studies_min_height) .';' : '';
      $inline_style .= '}';
    }
    // Image Overlay Color
    if ( $image_overlay_color ) {
      $inline_style .= '.fwzi-case-studies-'. $e_uniqid .' .project-links {';
      $inline_style .= ( $image_overlay_color ) ? 'background-color:'. $image_overlay_color .';' : '';
      $inline_style .= '}';
    }
    // Title Color
    if ( $case_studies_title_size || $case_studies_title_color ) {
      $inline_style .= '.fwzi-case-studies-'. $e_uniqid .' .project-item h6.project-title a {';
      $inline_style .= ( $case_studies_title_color ) ? 'color:'. $case_studies_title_color .';' : '';
      $inline_style .= ( $case_studies_title_size ) ? 'font-size:'. fawzi_core_check_px($case_studies_title_size) .';' : '';
      $inline_style .= '}';
    }
    if ( $case_studies_title_hover_color ) {
      $inline_style .= '.fwzi-case-studies-'. $e_uniqid .' .fwzi-hover .project-title a {';
      $inline_style .= ( $case_studies_title_hover_color ) ? 'color:'. $case_studies_title_hover_color .';' : '';
      $inline_style .= '}';
    }
    // Button
    if ( $btn_bg_color || $btn_text_color || $btn_border_color ) {
      $inline_style .= '.fwzi-case-studies-'. $e_uniqid .' .fwzi-masonry .fwzi-pagination a.malinky-load-more__button.fwzi-btn {';
      $inline_style .= ( $btn_bg_color ) ? 'background-color:'. $btn_bg_color .';' : '';
      $inline_style .= ( $btn_text_color ) ? 'color:'. $btn_text_color .';' : '';
      $inline_style .= ( $btn_text_color ) ? 'border-color:'. $btn_border_color .';' : '';
      $inline_style .= '}';
    }
    // Button Hover
    if ( $btn_bg_hover_color || $btn_text_hover_color || $btn_border_hover_color ) {
      $inline_style .= '.fwzi-case-studies-'. $e_uniqid .' .fwzi-masonry .fwzi-pagination a.malinky-load-more__button.fwzi-btn:hover {';
      $inline_style .= ( $btn_bg_hover_color ) ? 'background-color:'. $btn_bg_hover_color .';' : '';
      $inline_style .= ( $btn_text_hover_color ) ? 'color:'. $btn_text_hover_color .';' : '';
      $inline_style .= ( $btn_border_hover_color ) ? 'border-color:'. $btn_border_hover_color .';' : '';
      $inline_style .= '}';
    }
    // Button space
    if ( $btn_top_space || $btn_bottom_space ) {
      $inline_style .= '.fwzi-case-studies-'. $e_uniqid .' .fwzi-pagination .malinky-load-more {';
      $inline_style .= ( $btn_top_space ) ? 'padding-top:'. fawzi_core_check_px($btn_top_space) .';' : '';
      $inline_style .= ( $btn_bottom_space ) ? 'padding-bottom:'. fawzi_core_check_px($btn_bottom_space) .';' : '';
      $inline_style .= '}';
    }
    // Button space
    if ( $btn_top_space ) {
      $inline_style .= '.fwzi-case-studies-'. $e_uniqid .' .fwzi-pagination .fwzi-preloader {';
      $inline_style .= ( $btn_top_space ) ? 'top:'. fawzi_core_check_px($btn_top_space) .';' : '';
      $inline_style .= '}';
    }
    // Filter
    if ( $filter_color || $filter_size ) {
      $inline_style .= '.fwzi-case-studies-'. $e_uniqid .' .masonry-filters ul li a {';
      $inline_style .= ( $filter_color ) ? 'color:'. $filter_color .';' : '';
      $inline_style .= ( $filter_size ) ? 'font-size:'. fawzi_core_check_px($filter_size) .';' : '';
      $inline_style .= '}';
    }
    if ( $filter_active_color ) {
      $inline_style .= '.fwzi-case-studies-'. $e_uniqid .' .masonry-filters ul li a.active, .fwzi-case_studies-'. $e_uniqid .' .masonry-filters ul li a:hover {';
      $inline_style .= ( $filter_active_color ) ? 'color:'. $filter_active_color .';' : '';
      $inline_style .= '}';
    }
    // Padding
    if ( $pad_top || $pad_right || $pad_bottom || $pad_left ) {
      $inline_style .= '.fwzi-case-studies-'. $e_uniqid .' .masonry-item {';
      $inline_style .= ( $pad_top ) ? 'padding-top:'. fawzi_core_check_px($pad_top) .';' : '';
      $inline_style .= ( $pad_right ) ? 'padding-right:'. fawzi_core_check_px($pad_right) .';' : '';
      $inline_style .= ( $pad_bottom ) ? 'padding-bottom:'. fawzi_core_check_px($pad_bottom) .';' : '';
      $inline_style .= ( $pad_left ) ? 'padding-left:'. fawzi_core_check_px($pad_left) .';' : '';
      $inline_style .= '}';
    }
    // Icon
    if ( $icon_bg_color || $icon_color ) {
      $inline_style .= '.fwzi-case-studies-'. $e_uniqid .' .project-links a {';
      $inline_style .= ( $icon_bg_color ) ? 'background-color:'. $icon_bg_color .';' : '';
      $inline_style .= ( $icon_color ) ? 'color:'. $icon_color .';' : '';
      $inline_style .= '}';
    }
    if ( $icon_bg_hover_color || $icon_hover_color ) {
      $inline_style .= '.fwzi-case-studies-'. $e_uniqid .' .project-links a:hover {';
      $inline_style .= ( $icon_bg_hover_color ) ? 'background-color:'. $icon_bg_hover_color .';' : '';
      $inline_style .= ( $icon_hover_color ) ? 'color:'. $icon_hover_color .';' : '';
      $inline_style .= '}';
    }
    // add inline style
    add_inline_style( $inline_style );
    $styled_class  = ' fwzi-case-studies-'. $e_uniqid;

    // Style
    $case_studies_column = $case_studies_column ? $case_studies_column : 'col-md-4 col-sm-4 col-xs-12';

    // Load More Button
    $btn_text = $btn_text ? $btn_text : __('Load More', 'fawzi-core');

    // case_studies limit
    $case_studies_limit = $case_studies_limit ? $case_studies_limit : '9';

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
      'post_type' => 'casestudies',
      'posts_per_page' => (int)$case_studies_limit,
      'casestudies_category' => esc_attr($case_studies_show_category),
      'orderby' => $case_studies_orderby,
      'order' => $case_studies_order
    );

    $fwzi_port = new WP_Query( $args );

    if ($case_studies_pagination_type) {
      $fwzi_pagi_style = $case_studies_pagination_type;
    } else {
      $fwzi_pagi_style = cs_get_option('case_studies_pagination_type');
    }
    if ($cs_load_icon_option) {
      $fwzi_loader_icon = $cs_load_icon_option;
    } else {
      $fwzi_loader_icon = cs_get_option('cs_loader_icon_option');
    }

    $cs_more_btn_text = $cs_more_btn_text ? $cs_more_btn_text : __('Load More', 'fawzi-core');

    ?>

    <section class="fwzi-projects projects-style-two <?php echo esc_html($styled_class); ?> <?php echo esc_html($class); ?>">

      <?php
      // case_studies Filter
      if ($case_studies_filter) {
      ?>
      <div class="masonry-filters">
      <ul>
        <li><a href="#0" data-filter="*" class="active">All</a></li>
        <?php
          if ($case_studies_show_category) {
            $cat_name = explode(',', $case_studies_show_category);
            $terms = $cat_name;
            $count = count($terms);
            if ($count > 0) {
              foreach ($terms as $term) {
                echo '<li class="cat-'. preg_replace('/\s+/', "", strtolower($term)) .'"><a href="#0" class="filter cat-'. preg_replace('/\s+/', "", strtolower($term)) .'" data-filter=".cat-'. preg_replace('/\s+/', "", strtolower($term)) .'" title="' . str_replace('-', " ", strtolower($term)) . '">' . str_replace('-', " ", strtolower($term)) . '</a></li>';
               }
            }
          } else {
            $terms = get_terms('casestudies_category');
            $count = count($terms);
            $i=0;
            $term_list = '';
            if ($count > 0) {
              foreach ($terms as $term) {
                $i++;
                $term_list .= '<li><a href="#0" class="filter cat-'. $term->slug .'" data-filter=".cat-'. $term->slug .'" title="' . esc_attr($term->name) . '">' . $term->name . '</a></li>';
                if ($count != $i) {
                  $term_list .= '';
                } else {
                  $term_list .= '';
                }
              }
              echo $term_list;
            }
          }
        ?>
        </ul>
        </div>
        <?php
        } ?>

    <!-- case_studies Start -->
      <div class="fwzi-masonry fwzi-post-load-more load-cs"  data-select=".fwzi-masonry" data-item=".masonry-item" data-paging="<?php echo esc_attr($fwzi_pagi_style); ?>" data-loading="<?php echo esc_attr($cs_more_btn_text); ?>" data-icon-port="<?php echo esc_attr($fwzi_loader_icon); ?>">
      <div class="fawzi-case-studies">
      <?php
      if ($fwzi_port->have_posts()) : while ($fwzi_port->have_posts()) : $fwzi_port->the_post();

        // Category
        global $post;
        $terms = wp_get_post_terms($post->ID,'casestudies_category');
        foreach ($terms as $term) {
          $cat_class = 'cat-' . $term->slug;
        }
        $count = count($terms);
        $i=0;
        $cat_class = '';
        if ($count > 0) {
          foreach ($terms as $term) {
            $i++;
            $cat_class .= 'cat-'. $term->slug .' ';
            if ($count != $i) {
              $cat_class .= '';
            } else {
              $cat_class .= '';
            }
          }
        }

      // Featured Image 560*470
      $large_image =  wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'fullsize', false, '' );
      $large_image = $large_image[0];
      $featured_img = ( $large_image ) ? $large_image : '';
      if ($case_studies_column === 'col-md-4 col-sm-4 col-xs-12') {
        $fawzi_casestudies_img = aq_resize( $large_image, '370', '320', true );
        $fawzi_featured_img = ( $fawzi_casestudies_img ) ? $fawzi_casestudies_img : FAWZI_PLUGIN_ASTS . '/images/370x320.jpg';
        $fawzi_original_img = FAWZI_PLUGIN_ASTS . '/images/casestudies-370x320.png';
      } else {
        $fawzi_casestudies_img = aq_resize( $large_image, '560', '470', true );
        $fawzi_featured_img = ( $fawzi_casestudies_img ) ? $fawzi_casestudies_img : FAWZI_PLUGIN_ASTS . '/images/560x470.jpg';
        $fawzi_original_img = FAWZI_PLUGIN_ASTS . '/images/casestudies-560x470.png';
      }
      ?>
      <div class="masonry-item <?php echo esc_attr($cat_class); ?> <?php echo esc_attr($case_studies_column); ?>" data-category="<?php echo esc_attr($cat_class); ?>">
        <div class="project-item">
          <div class="fwzi-image">
            <img data-original="<?php echo $fawzi_featured_img; ?>" src="<?php echo $fawzi_original_img; ?>" alt="<?php echo esc_attr(get_the_title()); ?>">
            <div class="project-links">
              <div class="fwzi-table-container">
                <div class="fwzi-align-container">
                  <a href="<?php esc_url(the_permalink()); ?>"><i class="fa fa-share" aria-hidden="true"></i></a>
                  <div class="popup-image">
                    <a href="<?php echo $featured_img; ?>">
                      <i class="fa fa-plus" aria-hidden="true"></i>
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <h6 class="project-title"><a href="<?php esc_url(the_permalink()); ?>"><?php esc_html(the_title()); ?></a></h6>
        </div>
      </div>
      <?php
      endwhile;
      endif; ?>
      </div>

      <?php if ($case_studies_pagination) { ?>
        <div class="fwzi-pagination">
        <div class="fwzi-pagenavi">
          <?php if ( function_exists('wp_pagenavi')) { wp_pagenavi( array( 'query' => $fwzi_port ) ); } ?>
        </div>
        </div>
      <?php }
    wp_reset_postdata(); ?>

    </div>
    <!-- case_studies End -->

    </section>

   <?php // Return outbut buffer
    return ob_get_clean();

  }
}
add_shortcode( 'fwzi_case_studies', 'fwzi_case_studies_function' );

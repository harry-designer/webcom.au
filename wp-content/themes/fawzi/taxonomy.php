<?php
/*
 * The template for casestudies category pages.
 * Author & Copyright: VictorThemes
 * URL: http://themeforest.net/user/VictorThemes
 */
get_header();

$case_studies_column = cs_get_option('case_studies_column');
$case_studies_limit = cs_get_option('case_studies_limit');
$case_studies_show_category = cs_get_option('case_studies_show_category');
$case_studies_orderby = cs_get_option('case_studies_orderby');
$case_studies_order = cs_get_option('case_studies_order');
$case_studies_filter = cs_get_option('case_studies_filter');
$case_studies_pagination = cs_get_option('case_studies_pagination');
$case_studies_pagination_type = cs_get_option('case_studies_pagination_type');
$cs_more_btn_text = cs_get_option('cs_more_btn_text');
$loader_icon_option = cs_get_option('cs_loader_icon_option');

$case_studies_column = $case_studies_column ? $case_studies_column : 'col-md-4 col-sm-4 col-xs-12';
$case_studies_limit = $case_studies_limit ? $case_studies_limit : '9';
$cs_more_btn_text = $cs_more_btn_text ? $cs_more_btn_text : 'Load More';

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

  $fawzi_port = new WP_Query( $args ); ?>

  <section class="archive-spacing fwzi-projects projects-style-two">
    <div class="container">
    <?php
    // Portfolio Filter
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
  <!-- Portfolio Start -->
  <div class="fwzi-masonry fwzi-post-load-more load-cs"  data-select=".fwzi-masonry" data-item=".masonry-item" data-paging="<?php echo esc_attr($case_studies_pagination_type); ?>" data-loading="<?php echo esc_attr($cs_more_btn_text); ?>" data-icon-port="<?php echo esc_attr($loader_icon_option); ?>">
    <div class="fawzi-case-studies">
    <?php
    if ($fawzi_port->have_posts()) : while ($fawzi_port->have_posts()) : $fawzi_port->the_post();
      get_template_part( 'layouts/post/content', 'casestudies' );
      endwhile;
    else :
      get_template_part( 'layouts/post/content', 'none' );
    endif;
    wp_reset_postdata(); ?>
  </div>
  <!-- Portfolio End -->
  <?php if ($case_studies_pagination) { ?>
    <div class="fwzi-pagination">
    <div class="fwzi-pagenavi">
      <?php if ( function_exists('wp_pagenavi')) { wp_pagenavi( array( 'query' => $fawzi_port ) ); } ?>
    </div>
    </div>
  <?php } ?>
  </div>
  </div>
</section>

<?php
get_footer();
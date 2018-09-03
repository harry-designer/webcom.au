<?php
/*
 * The template for displaying archive pages.
 * Author & Copyright: VictorThemes
 * URL: http://themeforest.net/user/VictorThemes
 */
// Metabox
global $post;
$fawzi_id    = ( isset( $post ) ) ? $post->ID : 0;
$fawzi_id    = ( is_home() ) ? get_option( 'page_for_posts' ) : $fawzi_id;
$fawzi_id    = ( fawzi_is_woocommerce_shop() ) ? wc_get_page_id( 'shop' ) : $fawzi_id;
$fawzi_meta  = get_post_meta( $fawzi_id, 'page_type_metabox', true );

get_header();
get_template_part( 'layouts/header/title', 'bar' );?>
<?php
if (fawzi_is_post_type('team')) {
$team_limit = cs_get_option('team_limit');
$team_orderby = cs_get_option('team_orderby');
$team_order = cs_get_option('team_order');

$team_limit = $team_limit ? $team_limit : '8';
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

    $args = array(
      'paged' => $my_page,
      'post_type' => 'team',
      'posts_per_page' => (int)$team_limit,
      'orderby' => $team_orderby,
      'order' => $team_order,
    );

    $fawzi_team_qury = new WP_Query( $args );

    if ($fawzi_team_qury->have_posts()) :
    ?>
    <section class="archive-spacing fwzi-members"> <!-- Team Starts -->
    <div class="container">
      <div class="row">
      <?php
      while ($fawzi_team_qury->have_posts()) : $fawzi_team_qury->the_post();

      // Link
      $team_options = get_post_meta( get_the_ID(), 'team_options', true );
      $team_pro = $team_options['team_job_position'];
      $team_socials = $team_options['social_icons'];

      // Featured Image
      $large_image =  wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'fullsize', false, '' );
      $large_image = $large_image[0];
      $abt_title = get_the_title();
      ?>
      <div class="col-md-3 col-sm-4">
        <div class="member-item">
          <div class="fwzi-image">
            <?php if ($large_image) {
            echo '<img src="'. esc_url($large_image) .'" alt="'. esc_attr($abt_title).'">';
            } ?>
            <?php if($team_socials) { ?>
            <div class="member-social-links">
              <div class="fwzi-table-container">
                <div class="fwzi-align-container">
                  <div class="fwzi-social rounded">
                      <div class="social-wrap">
                        <?php
                          if ( ! empty( $team_socials ) ) {
                          foreach ( $team_socials as $social ) {
                        ?>
                          <a href="<?php echo esc_url($social['icon_link']); ?>" target="_blank"><i class="<?php echo esc_attr($social['icon']); ?>" aria-hidden="true"></i></a>
                        <?php } } ?>
                      </div>
                  </div>
                </div>
              </div>
            </div>
          <?php } ?>
          </div>
          <div class="member-info">
            <h4 class="member-name"><a href="<?php esc_url(the_permalink()); ?>"><?php echo esc_attr($abt_title); ?></a></h4>
            <?php if ($team_pro) {
             echo '<h6 class="member-designation">'.esc_attr($team_pro).'</h6>';
            } ?>
          </div>
        </div>
      </div>
      <?php endwhile; ?>
      </div>
    </div>
    </section> <!-- Team End -->

<?php
  endif;
} elseif (fawzi_is_post_type('resource')) {

  $resource_limit = cs_get_option('resource_limit');
  $resource_orderby = cs_get_option('resource_orderby');
  $resource_order = cs_get_option('resource_order');
  $resource_pagination = cs_get_option('resource_pagination');
  $resource_pagination_type = cs_get_option('resource_pagination_type');
  $resource_more_btn_text = cs_get_option('resource_more_btn_text');
  $loader_icon_option = cs_get_option('resource_loader_icon_option');

  $resource_limit = $resource_limit ? $resource_limit : '8';
  $resource_more_btn_text = $resource_more_btn_text ? $resource_more_btn_text : 'Load More';

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
      'orderby' => $resource_orderby,
      'order' => $resource_order,
    );

    $fawzi_resource_qury = new WP_Query( $args );

    if ($fawzi_resource_qury->have_posts()) :
    ?>

    <section class="archive-spacing fwzi-seo-books books-style-two fwzi-post-load-more load-cs"  data-select=".fwzi-seo-books" data-item=".col-lg-6" data-loading="<?php echo esc_attr($resource_more_btn_text); ?>" data-paging="<?php echo esc_attr($resource_pagination_type); ?>" data-icon-port="<?php echo esc_attr($loader_icon_option); ?>">
    <div class="fawzi-resource-book"> <!-- Resource Starts -->
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
        ?>
        <div class="col-lg-6">
          <div class="books-item">
            <?php if ($large_image) { ?>
            <div class="fwzi-image"><a href="<?php esc_url(the_permalink()); ?>">
            <img src="<?php echo esc_url($large_image); ?>" alt="<?php echo esc_attr($abt_title); ?>">
            </a></div>
            <?php } ?>
            <div class="book-info">
              <div class="book-info-wrap">
                <h3 class="book-title"><a href="<?php esc_url(the_permalink()); ?>"><?php echo esc_attr($abt_title); ?></a></h3>
                <p><?php the_excerpt(); ?></p>
              </div>
              <div class="book-author">
                <?php $author = get_the_terms( $post->ID, 'resource-author' );
                if ($author) { ?>
                <div class="pull-left"><?php echo esc_html__('by', 'fawzi'); ?>
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
    </div>
    <?php if ($resource_pagination) { ?>
      <div class="fwzi-pagination">
      <div class="fwzi-pagenavi">
        <?php if ( function_exists('wp_pagenavi')) { wp_pagenavi( array( 'query' => $fawzi_resource_qury ) ); } ?>
      </div>
      </div>
    <?php } ?>
    </section> <!-- Resource End -->

<?php endif;

} elseif (fawzi_is_post_type('casestudies')) {
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

	<?php } else {

// Theme Options
$fawzi_sidebar_position = cs_get_option('blog_sidebar_position');

// Sidebar Position
if ($fawzi_sidebar_position === 'sidebar-hide') {
	$layout_class = 'col-md-12';
	$fawzi_sidebar_class = '';
} elseif ($fawzi_sidebar_position === 'sidebar-left') {
	$layout_class = 'col-md-9 col-sm-12';
	$fawzi_sidebar_class = 'left-sidebar';
} else {
	$layout_class = 'col-md-9 col-sm-12';
	$fawzi_sidebar_class = '';
}

$blog_pagination = cs_get_option('blog_pagination');
$blog_pagination_type = cs_get_option('blog_pagination_type');
$loader_icon_option = cs_get_option('loader_icon_option');
$blog_more_btn_text = cs_get_option('blog_more_btn_text');
$blog_more_btn_text = $blog_more_btn_text ? $blog_more_btn_text : 'Load More';
?>

<!-- Fwzi Mid Wrap -->
<section class="fwzi-mid-wrap <?php echo esc_attr( $fawzi_sidebar_class); ?>">
  <div class="container">
    <div class="row">
      <div class="<?php echo esc_attr($layout_class); ?> fwzi-primary">
        <div class="blog-items-wrap fwzi-post-load-more load-posts"  data-select=".blog-items-wrap" data-item=".blog-item" data-paging="<?php echo esc_attr($blog_pagination_type); ?>" data-loading="<?php echo esc_attr($blog_more_btn_text); ?>" data-icon="<?php echo esc_attr($loader_icon_option); ?>">
        <div class="fawzi-blog-listing">
					<?php
					if ( have_posts() ) :
						/* Start the Loop */
						while ( have_posts() ) : the_post();
							get_template_part( 'layouts/post/content' );
						endwhile;
					else :
						get_template_part( 'layouts/post/content', 'none' );
					endif; ?>
          </div><!-- Blog Listing Div -->
          <?php
          if ($blog_pagination) { ?>
          <div class="fwzi-pagination">
          <div class="fwzi-pagenavi">
          <?php fawzi_paging_nav(); ?>
          </div>
          </div>
          <?php }
          wp_reset_postdata();  // avoid errors further down the page
          ?>
				</div><!-- Blog Items Div -->
			</div><!-- Primary -->
			<?php
			if ($fawzi_sidebar_position !== 'sidebar-hide') {
				get_sidebar(); // Sidebar
			}
			?>

		</div>
	</div>
</section>
<?php } ?>
<?php get_footer();

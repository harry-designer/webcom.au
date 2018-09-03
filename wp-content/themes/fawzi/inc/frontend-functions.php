<?php
/*
 * All Front-End Helper Functions
 * Author & Copyright: VictorThemes
 * URL: http://themeforest.net/user/VictorThemes
 */

/* Exclude category from blog */
if( ! function_exists( 'fawzi_vt_excludeCat' ) ) {
  function fawzi_vt_excludeCat($query) {
  	if ( $query->is_home ) {
  		$exclude_cat_ids = cs_get_option('theme_exclude_categories');
  		if($exclude_cat_ids) {
  			foreach( $exclude_cat_ids as $exclude_cat_id ) {
  				$exclude_from_blog[] = '-'. $exclude_cat_id;
  			}
  			$query->set('cat', implode(',', $exclude_from_blog));
  		}
  	}
  	return $query;
  }
  add_filter('pre_get_posts', 'fawzi_vt_excludeCat');
}

/* Excerpt Length */
class FawziExcerpt {

  // Default length (by WordPress)
  public static $length = 55;

  // Output: fawzi_excerpt('short');
  public static $types = array(
    'short' => 25,
    'regular' => 55,
    'long' => 100
  );

  /**
   * Sets the length for the excerpt,
   * then it adds the WP filter
   * And automatically calls the_excerpt();
   *
   * @param string $new_length
   * @return void
   * @author Baylor Rae'
   */
  public static function length($new_length = 55) {
    FawziExcerpt::$length = $new_length;
    add_filter('excerpt_length', 'FawziExcerpt::new_length');
    FawziExcerpt::output();
  }

  // Tells WP the new length
  public static function new_length() {
    if( isset(FawziExcerpt::$types[FawziExcerpt::$length]) )
      return FawziExcerpt::$types[FawziExcerpt::$length];
    else
      return FawziExcerpt::$length;
  }

  // Echoes out the excerpt
  public static function output() {
    the_excerpt();
  }

}

// Custom Excerpt Length
if( ! function_exists( 'fawzi_excerpt' ) ) {
  function fawzi_excerpt($length = 55) {
    FawziExcerpt::length($length);
  }
}

if ( ! function_exists( 'fawzi_new_excerpt_more' ) ) {
  function fawzi_new_excerpt_more( $more ) {
    return '[...]';
  }
  add_filter('excerpt_more', 'fawzi_new_excerpt_more');
}

/* Tag Cloud Widget - Remove Inline Font Size */
if( ! function_exists( 'fawzi_vt_tag_cloud' ) ) {
  function fawzi_vt_tag_cloud($tag_string){
    return preg_replace("/style='font-size:.+pt;'/", '', $tag_string);
  }
  add_filter('wp_generate_tag_cloud', 'fawzi_vt_tag_cloud', 10, 3);
}

/* Password Form */
if( ! function_exists( 'fawzi_vt_password_form' ) ) {
  function fawzi_vt_password_form( $output ) {
    $output = str_replace( 'type="submit"', 'type="submit" class=""', $output );
    return $output;
  }
  add_filter('the_password_form' , 'fawzi_vt_password_form');
}

/* Maintenance Mode */
if( ! function_exists( 'fawzi_vt_maintenance_mode' ) ) {
  function fawzi_vt_maintenance_mode(){

    $maintenance_mode_page = cs_get_option( 'maintenance_mode_page' );

    if ( ! empty( $maintenance_mode_page ) && ! is_user_logged_in() ) {
      get_template_part('layouts/post/content', 'maintenance');
      exit;
    }

  }
  add_action( 'wp', 'fawzi_vt_maintenance_mode', 1 );
}

/* Widget Layouts */
if ( ! function_exists( 'fawzi_vt_footer_widgets' ) ) {
  function fawzi_vt_footer_widgets() {

    $output = '';
    $footer_widget_layout = cs_get_option('footer_widget_layout');

    if( $footer_widget_layout ) {

      switch ( $footer_widget_layout ) {
        case 1: $widget = array('piece' => 1, 'class' => 'col-md-12'); break;
        case 2: $widget = array('piece' => 2, 'class' => 'col-md-6'); break;
        case 3: $widget = array('piece' => 3, 'class' => 'col-md-4'); break;
        case 4: $widget = array('piece' => 4, 'class' => 'col-md-3 col-sm-6'); break;
        case 5: $widget = array('piece' => 3, 'class' => 'col-md-3', 'layout' => 'col-md-6', 'queue' => 1); break;
        case 6: $widget = array('piece' => 3, 'class' => 'col-md-3', 'layout' => 'col-md-6', 'queue' => 2); break;
        case 7: $widget = array('piece' => 3, 'class' => 'col-md-3', 'layout' => 'col-md-6', 'queue' => 3); break;
        case 8: $widget = array('piece' => 4, 'class' => 'col-md-2', 'layout' => 'col-md-6', 'queue' => 1); break;
        case 9: $widget = array('piece' => 4, 'class' => 'col-md-2', 'layout' => 'col-md-6', 'queue' => 4); break;
        default : $widget = array('piece' => 4, 'class' => 'col-md-3'); break;
      }

      for( $i = 1; $i < $widget["piece"]+1; $i++ ) {

        $widget_class = ( isset( $widget["queue"] ) && $widget["queue"] == $i ) ? $widget["layout"] : $widget["class"];

        $output .= '<div class="'. $widget_class .'">';
        ob_start();
        if (is_active_sidebar('footer-'. $i)) {
          dynamic_sidebar( 'footer-'. $i );
        }
        $output .= ob_get_clean();
        $output .= '</div>';

      }
    }

    return $output;

  }
}

if( ! function_exists( 'fawzi_vt_top_bar' ) ) {
  function fawzi_vt_top_bar() {

    $out     = '';

    if ( ( cs_get_option( 'top_left' ) || cs_get_option( 'top_right' ) ) ) {
      $out .= '<div class="fwzi-topbar"><div class="container"><div class="row">';
      $out .= fawzi_vt_top_bar_modules( 'left' );
      $out .= fawzi_vt_top_bar_modules( 'right' );
      $out .= '</div></div></div>';
    }

    return $out;
  }
}

/* WP Link Pages */
if ( ! function_exists( 'fawzi_wp_link_pages' ) ) {
  function fawzi_wp_link_pages() {
    $defaults = array(
      'before'           => '<div class="wp-link-pages">' . esc_html__( 'Pages:', 'fawzi' ),
      'after'            => '</div>',
      'link_before'      => '<span>',
      'link_after'       => '</span>',
      'next_or_number'   => 'number',
      'separator'        => ' ',
      'pagelink'         => '%',
      'echo'             => 1
    );
    wp_link_pages( $defaults );
  }
}

/* Metas */
if ( ! function_exists( 'fawzi_post_metas' ) ) {
  function fawzi_post_metas() {
  $metas_hide = (array) cs_get_option( 'theme_metas_hide' );
  ?>
  <div class="bp-top-meta">
    <?php
    if ( !in_array( 'category', $metas_hide ) ) { // Category Hide
      if ( get_post_type() === 'post') {
        $category_list = get_the_category_list( ' ' );
        if ( $category_list ) {
          echo '<div class="bp-cat">'. $category_list .' </div>';
        }
      }
    } // Category Hides
    if ( !in_array( 'date', $metas_hide ) ) { // Date Hide
    ?>
    <div class="bp-date">
      <span><?php echo get_the_date(); ?></span>
    </div>
    <?php } // Date Hides
    if ( !in_array( 'author', $metas_hide ) ) { // Author Hide
    ?>
    <div class="bp-author">
      <?php
      printf(
        '<span>'. esc_html__('by','fawzi') .' <a href="%1$s" rel="author">%2$s</a></span>',
        esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
        get_the_author()
      );
      ?>
    </div>
    <?php } ?>
  </div>
  <?php
  }
}

/* Author Info */
if ( ! function_exists( 'fawzi_author_info' ) ) {
  function fawzi_author_info() {
    $author_content = get_the_author_meta( 'description' );
if ($author_content) {
?>
  <div class="fwzi-author-info">
    <div class="author-avatar">
      <a href="<?php echo esc_url(get_author_posts_url( get_the_author_meta( 'ID' ) )); ?>" class="ai-img"><?php echo get_avatar( get_the_author_meta( 'ID' ), 72 ); ?></a>
    </div>
    <div class="author-content">
      <div class="author-pro"><?php echo esc_attr('Author', 'fawzi'); ?></div><a href="<?php echo esc_url(get_author_posts_url( get_the_author_meta( 'ID' ) )); ?>" class="author-name"><?php echo esc_html( get_the_author_meta( 'display_name' ) ); ?></a><p><?php echo esc_attr($author_content); ?></p><div class="fwzi-social">
        <?php if (get_the_author_meta( 'facebook' )): ?><a href="<?php echo esc_url( get_the_author_meta( 'facebook' ) ); ?>" target="_blank" class="facebook"><i class="fa fa-facebook"></i></a><?php endif;
        if (get_the_author_meta( 'twitter' )): ?><a href="<?php echo esc_url( get_the_author_meta( 'twitter' ) ); ?>" target="_blank"><i class="fa fa-twitter"></i></a><?php endif;
        if (get_the_author_meta( 'vine' )): ?><a href="<?php echo esc_url( get_the_author_meta( 'vine' ) ); ?>" target="_blank" class="vine"><i class="fa fa-vine"></i></a><?php endif;
        if (get_the_author_meta( 'pinterest' )): ?><a href="<?php echo esc_url( get_the_author_meta( 'pinterest' ) ); ?>" target="_blank" class="pinterest"><i class="fa fa-pinterest"></i></a><?php endif;
        if (get_the_author_meta( 'instagram' )): ?><a href="<?php echo esc_url( get_the_author_meta( 'instagram' ) ); ?>" target="_blank" class="instagram"><i class="fa fa-instagram"></i></a><?php endif ?>
      </div>
    </div>
  </div>
<?php
} // if $author_content
  }
}

/* ==============================================
   Custom Comment Area Modification
=============================================== */
if ( ! function_exists( 'fawzi_comment_modification' ) ) {
  function fawzi_comment_modification($comment, $args, $depth) {
    $GLOBALS['comment'] = $comment;
    extract($args, EXTR_SKIP);
    if ( 'div' == $args['style'] ) {
      $tag = 'div';
      $add_below = 'comment';
    } else {
      $tag = 'li';
      $add_below = 'div-comment';
    }
    $comment_class = empty( $args['has_children'] ) ? '' : 'parent';
  ?>

  <<?php echo esc_attr($tag); ?> <?php comment_class('item ' . $comment_class .' ' ); ?> id="comment-<?php comment_ID() ?>">
    <?php if ( 'div' != $args['style'] ) : ?>
    <div id="div-comment-<?php comment_ID() ?>" class="comment-item">
    <?php endif; ?>
    <div class="comment-theme">
        <div class="comment-image">
          <?php if ( $args['avatar_size'] != 0 ) {
            echo get_avatar( $comment, 80 );
          } ?>
        </div>
    </div>
    <div class="comment-main-area">
      <div class="fwzi-comments-meta">
        <h5><?php printf( '%s', get_comment_author() ); ?></h5>
        <span class="comments-date">
          <?php echo get_comment_date(); ?>
        </span>
      </div>
      <?php if ( $comment->comment_approved == '0' ) : ?>
      <em class="comment-awaiting-moderation"><?php echo esc_html__( 'Your comment is awaiting moderation.', 'fawzi' ); ?></em>
      <?php endif; ?>
      <div class="comment-area">
        <?php comment_text(); ?>
      </div>
      <div class="comments-reply">
      <?php
        comment_reply_link( array_merge( $args, array(
        'reply_text' => '<span class="comment-reply-link">'. esc_html__('Reply','fawzi') .'</span>',
        'before' => '',
        'class'  => '',
        'depth' => $depth,
        'max_depth' => $args['max_depth']
        ) ) );
      ?>
      </div>
    </div>
  <?php if ( 'div' != $args['style'] ) : ?>
  </div>
  <?php endif;
  }
}

/* Title Area */
if ( ! function_exists( 'fawzi_title_area' ) ) {
  function fawzi_title_area() {

    global $post, $wp_query;

    // Get post meta in all type of WP pages
    $fawzi_id    = ( isset( $post ) ) ? $post->ID : 0;
    $fawzi_id    = ( is_home() ) ? get_option( 'page_for_posts' ) : $fawzi_id;
    $fawzi_id    = ( fawzi_is_woocommerce_shop() ) ? wc_get_page_id( 'shop' ) : $fawzi_id;
    $fawzi_meta  = get_post_meta( $fawzi_id, 'page_type_metabox', true );
    if ($fawzi_meta && (!is_archive() || fawzi_is_woocommerce_shop())) {
      $custom_title = $fawzi_meta['page_custom_title'];
      if ($custom_title) {
        $custom_title = $custom_title;
      } elseif(post_type_archive_title()) {
        post_type_archive_title();
      } else {
        $custom_title = '';
      }
    } else { $custom_title = ''; }

    if( $custom_title ) {
      echo esc_attr($custom_title);
    } elseif ( is_home() ) {
      bloginfo('description');
    } elseif ( is_search() ) {
      printf( esc_html__( 'Search Results for %s', 'fawzi' ), get_search_query() );
    } elseif ( is_category() || is_tax() ){
      single_cat_title();
    } elseif ( is_tag() ){
      single_tag_title(esc_html__('Posts Tagged: ', 'fawzi'));
    } elseif ( is_archive() ){
      if ( is_day() ) {
        printf( esc_html__( 'Archive for %s', 'fawzi' ), get_the_date());
      } elseif ( is_month() ) {
        printf( esc_html__( 'Archive for %s', 'fawzi' ), get_the_date( 'F, Y' ));
      } elseif ( is_year() ) {
        printf( esc_html__( 'Archive for %s', 'fawzi' ), get_the_date( 'Y' ));
      } elseif ( is_author() ) {
        printf( esc_html__( 'Posts by: %s', 'fawzi' ), get_the_author_meta( 'display_name', $wp_query->post->post_author ));
      } elseif( fawzi_is_woocommerce_shop() ) {
        echo esc_attr($custom_title);
      } elseif ( is_post_type_archive() ) {
        post_type_archive_title();
      } else {
        esc_html_e( 'Archives', 'fawzi' );
      }
    } elseif( is_404() ) {
      esc_html_e('404', 'fawzi');
    } else {
      the_title();
    }

  }
}

/**
 * Pagination Function
 */
if ( ! function_exists( 'fawzi_paging_nav' ) ) {
  function fawzi_paging_nav() {
    if ( function_exists('wp_pagenavi')) {
      wp_pagenavi();
    } else {
      $older_post = cs_get_option('older_post');
      $newer_post = cs_get_option('newer_post');
      $older_post = $older_post ? $older_post : esc_html__( 'PREV', 'fawzi' );
      $newer_post = $newer_post ? $newer_post : esc_html__( 'NEXT', 'fawzi' );
      global $wp_query;
      $big = 999999999;
      if($wp_query->max_num_pages == '1' ) {} else {echo '';}
      echo paginate_links( array(
        'base' => str_replace( $big, '%#%', get_pagenum_link( $big ) ),
        'format' => '?paged=%#%',
        'prev_text' => $older_post,
        'next_text' => $newer_post,
        'current' => max( 1, get_query_var('paged') ),
        'total' => $wp_query->max_num_pages,
        'type' => 'list'
      ));
      if($wp_query->max_num_pages == '1' ) {} else {echo '';}
    }
  }
}

/* Added next class to wp-pagenavi*/
add_filter('wp_pagenavi_class_nextpostslink', 'fawzi_pagination_nextpostslink_class');
function fawzi_pagination_nextpostslink_class($class_name) {
  return 'next';
}

function fawzi_is_blog() {
  global  $post;
  $posttype = get_post_type($post );
  return ( ((is_archive()) || (is_author()) || (is_category()) || (is_home()) || (is_single()) || (is_tag())) && ( $posttype == 'post')  ) ? true : false ;
}
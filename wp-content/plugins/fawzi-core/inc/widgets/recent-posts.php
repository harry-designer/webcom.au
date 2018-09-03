<?php
/*
 * Recent Post Widget
 * Author & Copyright: VictorThemes
 * URL: http://themeforest.net/user/VictorThemes
 */

class fawzi_recent_posts extends WP_Widget {

  /**
   * Specifies the widget name, description, class name and instatiates it
   */
  public function __construct() {
    parent::__construct(
      'fwzi-recent-blog',
      VTHEME_NAME_P . __( ': Recent Posts', 'fawzi' ),
      array(
        'classname'   => 'fwzi-recent-blog',
        'description' => VTHEME_NAME_P . __( ' widget that displays recent posts.', 'fawzi' )
      )
    );
    add_action('admin_enqueue_scripts', array(&$this, 'wpt_admin_scripts'));
  }
  public function wpt_admin_scripts() {
    wp_enqueue_script( 'tab-scripts', FAWZI_PLUGIN_ASTS . '/wptab-admin.js' );
  }
  /**
   * Generates the back-end layout for the widget
   */
  public function form( $instance ) {
    // Default Values
    $instance   = wp_parse_args( $instance, array(
      'tabone_title'    => __( 'LATEST', 'fawzi' ),
      'tabtwo_title'    => __( 'POPULAR', 'fawzi' ),
      'tabthree_title'    => __( 'COMMENTS', 'fawzi' ),
      'ptypes'   => 'post',
      'ptypes_two'   => 'post',
      'limit'    => '3',
      'limit_two'    => '3',
      'limit_three'    => '3',
      'date'     => true,
      'date_two'     => true,
      'category' => '',
      'category_two' => '',
      'order' => '',
      'order_two' => '',
      'orderby' => '',
      'orderby_two' => '',
      'comment_length' => '',
    )); ?>
    <div class="fwzi_options_form">

      <h4 class="tab_one_header"><a href="#"><?php _e('Tab One Options', 'wp-tab-widget'); ?></a></h4>
      <div class="tab_one_option">
    <?php

    // Title
    $tabone_title_value = esc_attr( $instance['tabone_title'] );
    $tabone_title_field = array(
      'id'    => $this->get_field_name('tabone_title'),
      'name'  => $this->get_field_name('tabone_title'),
      'type'  => 'text',
      'title' => __( 'Tab One Title :', 'fawzi' ),
      'wrap_class' => 'vt-cs-widget-fields',
    );
    echo cs_add_element( $tabone_title_field, $tabone_title_value );

    // Post Type
    $ptypes_value = esc_attr( $instance['ptypes'] );
    $ptypes_field = array(
      'id'    => $this->get_field_name('ptypes'),
      'name'  => $this->get_field_name('ptypes'),
      'type' => 'select',
      'options' => 'post_types',
      'default_option' => __( 'Select Post Type', 'fawzi' ),
      'title' => __( 'Post Type :', 'fawzi' ),
    );
    echo cs_add_element( $ptypes_field, $ptypes_value );

    // Order
    $order_value = esc_attr( $instance['order'] );
    $order_field = array(
      'id'    => $this->get_field_name('order'),
      'name'  => $this->get_field_name('order'),
      'type' => 'select',
      'options'   => array(
        'ASC' => 'Ascending',
        'DESC' => 'Descending',
      ),
      'default_option' => __( 'Select Order', 'fawzi' ),
      'title' => __( 'Order :', 'fawzi' ),
    );
    echo cs_add_element( $order_field, $order_value );

    // Orderby
    $orderby_value = esc_attr( $instance['orderby'] );
    $orderby_field = array(
      'id'    => $this->get_field_name('orderby'),
      'name'  => $this->get_field_name('orderby'),
      'type' => 'select',
      'options'   => array(
        'none' => __('None', 'fawzi'),
        'ID' => __('ID', 'fawzi'),
        'author' => __('Author', 'fawzi'),
        'title' => __('Title', 'fawzi'),
        'name' => __('Name', 'fawzi'),
        'type' => __('Type', 'fawzi'),
        'date' => __('Date', 'fawzi'),
        'modified' => __('Modified', 'fawzi'),
        'rand' => __('Random', 'fawzi'),
      ),
      'default_option' => __( 'Select OrderBy', 'fawzi' ),
      'title' => __( 'OrderBy :', 'fawzi' ),
    );
    echo cs_add_element( $orderby_field, $orderby_value );

    // Limit
    $limit_value = esc_attr( $instance['limit'] );
    $limit_field = array(
      'id'    => $this->get_field_name('limit'),
      'name'  => $this->get_field_name('limit'),
      'type'  => 'text',
      'title' => __( 'Limit :', 'fawzi' ),
      'help' => __( 'How many posts want to show?', 'fawzi' ),
    );
    echo cs_add_element( $limit_field, $limit_value );

    // Date
    $date_value = esc_attr( $instance['date'] );
    $date_field = array(
      'id'    => $this->get_field_name('date'),
      'name'  => $this->get_field_name('date'),
      'type'  => 'switcher',
      'on_text'  => __( 'Yes', 'fawzi' ),
      'off_text'  => __( 'No', 'fawzi' ),
      'title' => __( 'Display Date :', 'fawzi' ),
    );
    echo cs_add_element( $date_field, $date_value );

    // Category
    $category_value = esc_attr( $instance['category'] );
    $category_field = array(
      'id'    => $this->get_field_name('category'),
      'name'  => $this->get_field_name('category'),
      'type'  => 'text',
      'title' => __( 'Category :', 'fawzi' ),
      'help' => __( 'Enter category slugs with comma(,) for multiple items', 'fawzi' ),
    );
    echo cs_add_element( $category_field, $category_value );

    ?>
      </div>
    <h4 class="tab_two_header"><a href="#"><?php _e('Tab Two Options', 'wp-tab-widget'); ?></a></h4>
      <div class="tab_two_option">
    <?php

    // Title
    $tabtwo_title_value = esc_attr( $instance['tabtwo_title'] );
    $tabtwo_title_field = array(
      'id'    => $this->get_field_name('tabtwo_title'),
      'name'  => $this->get_field_name('tabtwo_title'),
      'type'  => 'text',
      'title' => __( 'Tab Two Title :', 'fawzi' ),
      'wrap_class' => 'vt-cs-widget-fields',
    );
    echo cs_add_element( $tabtwo_title_field, $tabtwo_title_value );

    // Post Type
    $ptypes_two_value = esc_attr( $instance['ptypes_two'] );
    $ptypes_two_field = array(
      'id'    => $this->get_field_name('ptypes_two'),
      'name'  => $this->get_field_name('ptypes_two'),
      'type' => 'select',
      'options' => 'post_types',
      'default_option' => __( 'Select Post Type', 'fawzi' ),
      'title' => __( 'Post Type :', 'fawzi' ),
    );
    echo cs_add_element( $ptypes_two_field, $ptypes_two_value );

    // Order
    $order_two_value = esc_attr( $instance['order_two'] );
    $order_two_field = array(
      'id'    => $this->get_field_name('order_two'),
      'name'  => $this->get_field_name('order_two'),
      'type' => 'select',
      'options'   => array(
        'ASC' => 'Ascending',
        'DESC' => 'Descending',
      ),
      'default_option' => __( 'Select Order', 'fawzi' ),
      'title' => __( 'Order :', 'fawzi' ),
    );
    echo cs_add_element( $order_two_field, $order_two_value );

    // Orderby
    $orderby_two_value = esc_attr( $instance['orderby_two'] );
    $orderby_two_field = array(
      'id'    => $this->get_field_name('orderby_two'),
      'name'  => $this->get_field_name('orderby_two'),
      'type' => 'select',
      'options'   => array(
        'none' => __('None', 'fawzi'),
        'ID' => __('ID', 'fawzi'),
        'author' => __('Author', 'fawzi'),
        'title' => __('Title', 'fawzi'),
        'name' => __('Name', 'fawzi'),
        'type' => __('Type', 'fawzi'),
        'date' => __('Date', 'fawzi'),
        'modified' => __('Modified', 'fawzi'),
        'rand' => __('Random', 'fawzi'),
      ),
      'default_option' => __( 'Select OrderBy', 'fawzi' ),
      'title' => __( 'OrderBy :', 'fawzi' ),
    );
    echo cs_add_element( $orderby_two_field, $orderby_two_value );

    // Limit
    $limit_two_value = esc_attr( $instance['limit_two'] );
    $limit_two_field = array(
      'id'    => $this->get_field_name('limit_two'),
      'name'  => $this->get_field_name('limit_two'),
      'type'  => 'text',
      'title' => __( 'Limit :', 'fawzi' ),
      'help' => __( 'How many posts want to show?', 'fawzi' ),
    );
    echo cs_add_element( $limit_two_field, $limit_two_value );

    // Date
    $date_two_value = esc_attr( $instance['date_two'] );
    $date_two_field = array(
      'id'    => $this->get_field_name('date_two'),
      'name'  => $this->get_field_name('date_two'),
      'type'  => 'switcher',
      'on_text'  => __( 'Yes', 'fawzi' ),
      'off_text'  => __( 'No', 'fawzi' ),
      'title' => __( 'Display Date :', 'fawzi' ),
    );
    echo cs_add_element( $date_two_field, $date_two_value );

    // Category
    $category_two_value = esc_attr( $instance['category_two'] );
    $category_two_field = array(
      'id'    => $this->get_field_name('category_two'),
      'name'  => $this->get_field_name('category_two'),
      'type'  => 'text',
      'title' => __( 'Category :', 'fawzi' ),
      'help' => __( 'Enter category slugs with comma(,) for multiple items', 'fawzi' ),
    );
    echo cs_add_element( $category_two_field, $category_two_value );

    ?>
      </div>
      <h4 class="tab_three_header"><a href="#"><?php _e('Tab Three Options', 'wp-tab-widget'); ?></a></h4>
      <div class="tab_three_option">
    <?php

    // Title
    $tabthree_title_value = esc_attr( $instance['tabthree_title'] );
    $tabthree_title_field = array(
      'id'    => $this->get_field_name('tabthree_title'),
      'name'  => $this->get_field_name('tabthree_title'),
      'type'  => 'text',
      'title' => __( 'Tab Three Title :', 'fawzi' ),
      'wrap_class' => 'vt-cs-widget-fields',
    );
    echo cs_add_element( $tabthree_title_field, $tabthree_title_value );

    // Limit
    $limit_three_value = esc_attr( $instance['limit_three'] );
    $limit_three_field = array(
      'id'    => $this->get_field_name('limit_three'),
      'name'  => $this->get_field_name('limit_three'),
      'type'  => 'text',
      'title' => __( 'Limit :', 'fawzi' ),
      'help' => __( 'How many posts want to show?', 'fawzi' ),
    );
    echo cs_add_element( $limit_three_field, $limit_three_value );

    // Comments Length
    $comment_length_value = esc_attr( $instance['comment_length'] );
    $comment_length_field = array(
      'id'    => $this->get_field_name('comment_length'),
      'name'  => $this->get_field_name('comment_length'),
      'type'  => 'text',
      'title' => __( 'Comments Length :', 'fawzi' ),
      'help' => __( 'Enter the comments length Eg: 40', 'fawzi' ),
    );
    echo cs_add_element( $comment_length_field, $comment_length_value );

    ?>
      </div>
    </div><?php

  }

  /**
   * Processes the widget's values
   */
  public function update( $new_instance, $old_instance ) {
    $instance = $old_instance;

    // Update values
    $instance['tabone_title']        = strip_tags( stripslashes( $new_instance['tabone_title'] ) );
    $instance['tabtwo_title']        = strip_tags( stripslashes( $new_instance['tabtwo_title'] ) );
    $instance['tabthree_title']        = strip_tags( stripslashes( $new_instance['tabthree_title'] ) );
    $instance['ptypes']       = strip_tags( stripslashes( $new_instance['ptypes'] ) );
    $instance['ptypes_two']       = strip_tags( stripslashes( $new_instance['ptypes_two'] ) );
    $instance['limit']        = strip_tags( stripslashes( $new_instance['limit'] ) );
    $instance['limit_two']        = strip_tags( stripslashes( $new_instance['limit_two'] ) );
    $instance['limit_three']        = strip_tags( stripslashes( $new_instance['limit_three'] ) );
    $instance['date']         = strip_tags( stripslashes( $new_instance['date'] ) );
    $instance['date_two']         = strip_tags( stripslashes( $new_instance['date_two'] ) );
    $instance['category']     = strip_tags( stripslashes( $new_instance['category'] ) );
    $instance['category_two']     = strip_tags( stripslashes( $new_instance['category_two'] ) );
    $instance['order']        = strip_tags( stripslashes( $new_instance['order'] ) );
    $instance['order_two']        = strip_tags( stripslashes( $new_instance['order_two'] ) );
    $instance['orderby']      = strip_tags( stripslashes( $new_instance['orderby'] ) );
    $instance['orderby_two']      = strip_tags( stripslashes( $new_instance['orderby_two'] ) );
    $instance['comment_length']      = strip_tags( stripslashes( $new_instance['comment_length'] ) );

    return $instance;
  }

  /**
   * Output the contents of the widget
   */
  public function widget( $args, $instance ) {
    // Extract the arguments
    extract( $args );

    $tabone_title          = $instance['tabone_title'];
    $tabtwo_title          = $instance['tabtwo_title'];
    $tabthree_title          = $instance['tabthree_title'];
    $ptypes         = $instance['ptypes'];
    $ptypes_two         = $instance['ptypes_two'];
    $limit          = $instance['limit'];
    $limit_two          = $instance['limit_two'];
    $limit_three          = $instance['limit_three'];
    $display_date   = $instance['date'];
    $display_date_two   = $instance['date_two'];
    $category       = $instance['category'];
    $category_two       = $instance['category_two'];
    $order          = $instance['order'];
    $order_two          = $instance['order_two'];
    $orderby        = $instance['orderby'];
    $orderby_two        = $instance['orderby_two'];
    $comment_length        = $instance['comment_length'];

    $args = array(
      // other query params here,
      'post_type' => esc_attr($ptypes),
      'posts_per_page' => (int)$limit,
      'orderby' => esc_attr($orderby),
      'order' => esc_attr($order),
      'category_name' => esc_attr($category),
      'ignore_sticky_posts' => 1,
     );

     $fawzi_rpw = new WP_Query( $args );
     global $post;
     $uniqtab     = uniqid();

    // Display the markup before the widget
    echo $before_widget;

  echo '<div class="fwzi-widget widget-recent-post" id="fwzi-widget-placeholder-3">
    <ul class="nav nav-tabs">
      <li class="active"><a href="#'.sanitize_title($tabone_title).'-'.$uniqtab.'" data-toggle="tab">'.$tabone_title.'</a></li>
      <li><a href="#'.sanitize_title($tabtwo_title).'-'.$uniqtab.'" data-toggle="tab">'.$tabtwo_title.'</a></li>
      <li><a href="#'.sanitize_title($tabthree_title).'-'.$uniqtab.'" data-toggle="tab">'.$tabthree_title.'</a></li>
    </ul>
    <div class="tab-content">
    <div class="tab-pane fade in active" id="'.sanitize_title($tabone_title).'-'.$uniqtab.'">';

  if ($fawzi_rpw->have_posts()) : while ($fawzi_rpw->have_posts()) : $fawzi_rpw->the_post();
  $large_image =  wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'fullsize', false, '' );
  $large_image = $large_image[0];
  $fawzi_thumb_img = aq_resize( $large_image, '150', '150', true );
  $fawzi_featured_img = ( $fawzi_thumb_img ) ? $fawzi_thumb_img : FAWZI_PLUGIN_ASTS . '/images/370x320.jpg';
  $post_title = get_the_title();
  $actual_image = '<img src="'. $fawzi_featured_img .'" alt="'.$post_title.'">';
  ?>

  <div class="recent-post">
  <?php if ($large_image) { ?>
    <div class="fwzi-picture">
      <a href="<?php esc_url(the_permalink()) ?>"><?php echo $actual_image; ?></a>
    </div>
  <?php } ?>
    <div class="post-info">
      <h5 class="post-title"><a href="<?php esc_url(the_permalink()) ?>"><?php echo $post_title; ?></a></h5>
      <?php if ($display_date === '1') { ?>
      <div class="post-time">
      <?php
        echo get_the_date('d'); esc_html_e( 'th ', 'fawzi' );
        echo get_the_date('M'). ' ' .get_the_date('Y');
      ?>
      </div>
      <?php } ?>
    </div>
  </div>

  <?php
  endwhile; endif;
  echo '</div><div class="tab-pane fade" id="'.sanitize_title($tabtwo_title).'-'.$uniqtab.'">';

  $recent = new WP_Query('post_type='. $ptypes_two .'&category_name='. $category_two .'&posts_per_page='. $limit_two .'&orderby='. $orderby_two .'&order='. $order_two .'&post_status=publish');
  $last_page = $recent->max_num_pages;
  while ($recent->have_posts()) : $recent->the_post();
  $large_image =  wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'fullsize', false, '' );
  $large_image = $large_image[0];
  $fawzi_thumb_img = aq_resize( $large_image, '150', '150', true );
  $fawzi_featured_img = ( $fawzi_thumb_img ) ? $fawzi_thumb_img : FAWZI_PLUGIN_ASTS . '/images/370x320.jpg';
  $post_title = get_the_title();
  $actual_image = '<img src="'. $fawzi_featured_img .'" alt="'.$post_title.'">';
  ?>
  <div class="recent-post">
  <?php if ($large_image) { ?>
    <div class="fwzi-picture">
      <a href="<?php esc_url(the_permalink()) ?>"><?php echo $actual_image; ?></a>
    </div>
  <?php } ?>
    <div class="post-info">
      <h5 class="post-title"><a href="<?php esc_url(the_permalink()) ?>"><?php echo $post_title; ?></a></h5>
      <?php if ($display_date_two === '1') { ?>
      <div class="post-time">
      <?php
        echo get_the_date('d'); esc_html_e( 'th ', 'fawzi' );
        echo get_the_date('M'). ' ' .get_the_date('Y');
      ?>
      </div>
      <?php } ?>
    </div>
  </div>

  <?php endwhile;

  echo '</div><div class="tab-pane fade" id="'.sanitize_title($tabthree_title).'-'.$uniqtab.'"><div class="recent-comment">';
  $comment_length = $comment_length ? $comment_length : '80';

  $no_comments = $limit_three;
  $comment_len = $comment_length;
  $avatar_size = 58;
  $comments_query = new WP_Comment_Query();
  $comments = $comments_query->query( array( 'number' => $no_comments ) );
  $comm = '';
  if ( $comments ) : foreach ( $comments as $comment ) :
    $comm .= '<div class="fwzi-picture"><a class="author" href="' . get_permalink( $comment->comment_post_ID ) . '#comment-' . $comment->comment_ID . '">';
    $comm .= get_avatar( $comment->comment_author_email, $avatar_size );
    $comm .= '</a></div>';
    $comm .= '<div class="comment-info"><h5 class="comment-title"><a class="author" href="' . get_permalink( $comment->comment_post_ID ) . '#comment-' . $comment->comment_ID . '">' . get_comment_author( $comment->comment_ID ) . ':</a></h5>';
    $comm .= '<div class="comment-text"><p>' . strip_tags( substr( apply_filters( 'get_comment_text', $comment->comment_content ), 0, $comment_len ) ) . '...</p></div></div>';
  endforeach; else :
    $comm .= 'No comments.';
  endif;
  echo $comm;

  echo '</div></div>
    </div>
  </div> ';
    wp_reset_postdata();
    // Display the markup after the widget
    echo $after_widget;
  }
}

// Register the widget using an annonymous function
add_action( 'widgets_init', create_function( '', 'register_widget( "fawzi_recent_posts" );' ) );
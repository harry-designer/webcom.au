<?php
/* Testimonial Carousel */
if ( !function_exists('fwzi_testimonial_carousel_function')) {
  function fwzi_testimonial_carousel_function( $atts, $content = NULL, $key = '' ) {

    extract(shortcode_atts(array(
      'testimonial_style'  => '',
      'class'  => '',

      // Listing
      'testimonial_limit'  => '',
      'testimonial_order'  => '',
      'testimonial_id'  => '',
      'testimonial_orderby'  => '',

      // Carousel
      'carousel_loop'  => '',
      'carousel_items'  => '',
      'carousel_margin'  => '',
      'carousel_dots'  => '',
      'carousel_nav'  => '',
      'carousel_autoplay_timeout'  => '',
      'carousel_autoplay'  => '',
      'carousel_animate_out'  => '',
      'carousel_mousedrag'  => '',
      'carousel_autowidth'  => '',
      'carousel_autoheight'  => '',
      'carousel_tablet'  => '',
      'carousel_mobile'  => '',
      'carousel_small_mobile'  => '',

      // Color & Style
      'title_color'  => '',
      'content_color'  => '',
      'name_color'  => '',
      'name_hover_color' => '',
      'pro_hover_color' => '',
      'profession_color'  => '',
      'title_size'  => '',
      'content_size'  => '',
      'name_size'  => '',
      'profession_size'  => '',
    ), $atts));
    // Shortcode Style CSS
    $e_uniqid        = uniqid();
    $inline_style  = '';

    // Title Color
    if ( $title_color || $title_size ) {
      $inline_style .= '.fwzi-testi-carousel-'. $e_uniqid .' .testimonial-wrap .section-title-wrap h2 {';
      $inline_style .= ( $title_color ) ? 'color:'. $title_color .';' : '';
      $inline_style .= ( $title_size ) ? 'font-size:'. fawzi_core_check_px($title_size) .';' : '';
      $inline_style .= '}';
    }
    // Content Color
    if ( $content_color || $content_size ) {
      $inline_style .= '.fwzi-testi-carousel-'. $e_uniqid .' .testimonial-wrap p {';
      $inline_style .= ( $content_color ) ? 'color:'. $content_color .';' : '';
      $inline_style .= ( $content_size ) ? 'font-size:'. fawzi_core_check_px($content_size) .';' : '';
      $inline_style .= '}';
    }
    // Name Color
    if ( $name_color || $name_size ) {
      $inline_style .= '.fwzi-testi-carousel-'. $e_uniqid .' .quote-author .testi-author-name, .fwzi-testi-carousel-'. $e_uniqid .' .quote-author {';
      $inline_style .= ( $name_color ) ? 'color:'. $name_color .';' : '';
      $inline_style .= ( $name_size ) ? 'font-size:'. fawzi_core_check_px($name_size) .';' : '';
      $inline_style .= '}';
    }
    if ( $name_hover_color ) {
      $inline_style .= '.fwzi-testi-carousel-'. $e_uniqid .' .quote-author .testi-author-name:hover {';
      $inline_style .= ( $name_hover_color ) ? 'color:'. $name_hover_color .';' : '';
      $inline_style .= '}';
    }
    // Profession Color
    if ( $profession_color || $profession_size ) {
      $inline_style .= '.fwzi-testi-carousel-'. $e_uniqid .' .quote-author .testi-profession {';
      $inline_style .= ( $profession_color ) ? 'color:'. $profession_color .';' : '';
      $inline_style .= ( $profession_size ) ? 'font-size:'. fawzi_core_check_px($profession_size) .';' : '';
      $inline_style .= '}';
    }
    if ( $pro_hover_color ) {
      $inline_style .= '.fwzi-testi-carousel-'. $e_uniqid .' .quote-author .testi-profession:hover {';
      $inline_style .= ( $pro_hover_color ) ? 'color:'. $pro_hover_color .';' : '';
      $inline_style .= '}';
    }

    // add inline style
    add_inline_style( $inline_style );
    $styled_class  = ' fwzi-testi-carousel-'. $e_uniqid;

    // Carousel Data's
    $carousel_loop = $carousel_loop !== 'true' ? 'data-loop="true"' : 'data-loop="false"';
    $carousel_items = $carousel_items ? 'data-items="'. $carousel_items .'"' : 'data-items="1"';
    $carousel_margin = $carousel_margin ? 'data-margin="'. $carousel_margin .'"' : 'data-margin="0"';
    $carousel_dots = $carousel_dots !== 'true' ? ' data-dots="false"' : ' data-dots="true"';
    $carousel_nav = $carousel_nav !== 'true' ? ' data-nav="false"' : ' data-nav="true"';
    $carousel_autoplay_timeout = $carousel_autoplay_timeout ? 'data-autoplay-timeout="'. $carousel_autoplay_timeout .'"' : '';
    $carousel_autoplay = $carousel_autoplay ? 'data-autoplay="'. $carousel_autoplay .'"' : '';
    $carousel_mousedrag = $carousel_mousedrag !== 'true' ? ' data-mouse-drag="true"' : '';
    $carousel_animate_out = $carousel_animate_out ? 'data-animateout="'. $carousel_animate_out .'"' : '';
    $carousel_autowidth = $carousel_autowidth ? 'data-auto-width="'. $carousel_autowidth .'"' : '';
    $carousel_autoheight = $carousel_autoheight ? 'data-auto-height="'. $carousel_autoheight .'"' : '';
    $carousel_tablet = $carousel_tablet ? 'data-items-tablet="'. $carousel_tablet .'"' : '';
    $carousel_mobile = $carousel_mobile ? 'data-items-mobile-landscape="'. $carousel_mobile .'"' : '';
    $carousel_small_mobile = $carousel_small_mobile ? 'data-items-mobile-portrait="'. $carousel_small_mobile .'"' : '';

    // Testimonial Style
    if ($testimonial_style === 'testimonial_two') {
      $testimonial_style_class = ' testimonial-style-two ';
      $container_open = '<div class="container">';
      $container_close = '</div>';
      $testi_container_open = '';
      $testi_container_close = '';
    } elseif ($testimonial_style === 'testimonial_three') {
      $testimonial_style_class = ' testimonial-style-three ';
      $container_open = '<div class="container">';
      $container_close = '</div>';
      $testi_container_open = '';
      $testi_container_close = '';
    }  elseif ($testimonial_style === 'testimonial_four') {
      $testimonial_style_class = '';
      $container_open = '';
      $container_close = '';
      $testi_container_open = '<div class="slider-wrap slider-style-two">';
      $testi_container_close = '</div>';
    }  elseif ($testimonial_style === 'testimonial_five') {
      $testimonial_style_class = '';
      $container_open = '';
      $container_close = '';
      $testi_container_open = '<div class="slider-wrap">';
      $testi_container_close = '</div>';
    } else {
      $testimonial_style_class = '';
      $container_open = '<div class="container">';
      $container_close = '</div>';
      $testi_container_open = '';
      $testi_container_close = '';
    }

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
    if ($testimonial_id) {
      $testimonial_id = explode(',',$testimonial_id);
    } else {
      $testimonial_id = '';
    }

    $args = array(
      'paged' => $my_page,
      'post_type' => 'testimonial',
      'posts_per_page' => (int)$testimonial_limit,
      'orderby' => $testimonial_orderby,
      'order' => $testimonial_order,
      'post__in' => $testimonial_id
    );

    $fwzi_testi = new WP_Query( $args );

    if ($fwzi_testi->have_posts()) :
    ?>

    <?php echo $testi_container_open; ?>
    <div class="fwzi-testimonial <?php echo $testimonial_style_class .' '. $styled_class; ?> <?php echo $class; ?>">
    <div class="testimonial-wrap">
    <?php echo $container_open; ?>
      <!-- Testimonial Starts -->
      <?php if ($testimonial_style === 'testimonial_two') { // Style Two ?>
      <div class="fwzi-container">        
        <div class="fwzi-slider" <?php echo $carousel_loop .' '. $carousel_items .' '. $carousel_margin .' '. $carousel_dots .' '. $carousel_nav .' '. $carousel_autoplay_timeout .' '. $carousel_mousedrag .' '. $carousel_autoplay .' '. $carousel_animate_out .' '. $carousel_autowidth .' '. $carousel_autoheight .' '. $carousel_tablet .' '. $carousel_mobile .' '. $carousel_small_mobile; ?>>
      <?php } elseif ($testimonial_style === 'testimonial_three') {  ?>
        <div class="fwzi-slider" <?php echo $carousel_loop .' '. $carousel_items .' '. $carousel_margin .' '. $carousel_dots .' '. $carousel_nav .' '. $carousel_autoplay_timeout .' '. $carousel_mousedrag .' '. $carousel_autoplay .' '. $carousel_animate_out .' '. $carousel_autowidth .' '. $carousel_autoheight .' '. $carousel_tablet .' '. $carousel_mobile .' '. $carousel_small_mobile; ?>>
      <?php } elseif ($testimonial_style === 'testimonial_four') {  ?>
        <div class="fwzi-slider" <?php echo $carousel_loop .' '. $carousel_items .' '. $carousel_margin .' '. $carousel_dots .' '. $carousel_nav .' '. $carousel_autoplay_timeout .' '. $carousel_mousedrag .' '. $carousel_autoplay .' '. $carousel_animate_out .' '. $carousel_autowidth .' '. $carousel_autoheight .' '. $carousel_tablet .' '. $carousel_mobile .' '. $carousel_small_mobile; ?>>
      <?php } elseif ($testimonial_style === 'testimonial_five') {  ?>
        <div class="fwzi-slider" <?php echo $carousel_loop .' '. $carousel_items .' '. $carousel_margin .' '. $carousel_dots .' '. $carousel_nav .' '. $carousel_autoplay_timeout .' '. $carousel_mousedrag .' '. $carousel_autoplay .' '. $carousel_animate_out .' '. $carousel_autowidth .' '. $carousel_autoheight .' '. $carousel_tablet .' '. $carousel_mobile .' '. $carousel_small_mobile; ?>>
      <?php } else { ?>
      <div class="fwzi-container">
        <div class="section-title-wrap">
          <h2 class="section-title"><?php echo esc_html__('Our Happy Customer Says', 'fwzi-core'); ?></h2>
        </div>
        <div class="carousel fadeslide" data-ride="carousel" id="quote-carousel">
          <div class="carousel-inner">
      <?php }

    $c = 0;
    while ($fwzi_testi->have_posts()) : $fwzi_testi->the_post();

    // Get Meta Box Options - fwzi_framework_active()
    $testimonial_options = get_post_meta( get_the_ID(), 'testimonial_options', true );
    $client_name = $testimonial_options['testi_name'];
    $name_link = $testimonial_options['testi_name_link'];
    $client_pro = $testimonial_options['testi_pro'];
    $pro_link = $testimonial_options['testi_pro_link'];
    $testi_stars = $testimonial_options['testi_rating'];
    $testi_stars = $testi_stars ? $testi_stars : '3';
    
    $name_tag = $name_link ? 'a' : 'span';
    $name_link = $name_link ? 'href="'. $name_link .'" target="_blank"' : '';
    $client_name = $client_name ? '<'. $name_tag .' '. $name_link .' class="testi-author-name">'. $client_name .'</'. $name_tag .'>' : '';
    
    $pro_tag = $pro_link ? 'a' : 'span';
    $pro_link = $pro_link ? 'href="'. $pro_link .'" target="_blank"' : '';
    $client_pro = $client_pro ? '<'. $pro_tag .' '. $pro_link .' class="testi-profession">'. $client_pro .'</'. $pro_tag .'>' : '';

    // Featured Image
    $large_image =  wp_get_attachment_image_src( get_post_thumbnail_id(), 'fullsize', false, '' );
    $large_image = $large_image[0];

      if(class_exists('Aq_Resize')) {
        $testi_img = aq_resize( $large_image, '54', '54', true );
      } else {$testi_img = $large_image;}
    $actual_image = $large_image ? '<'. $name_tag .' '. $name_link .'><img src="'. $testi_img .'" alt=""></'. $name_tag .'>' : '';

    if ($testimonial_style === 'testimonial_two') { // Style Two
      if(class_exists('Aq_Resize')) {
        $testi_img = aq_resize( $large_image, '79', '79', true );
      } else {$testi_img = $large_image;}
    $actual_image = $large_image ? '<'. $name_tag .' '. $name_link .'><img src="'. $testi_img .'" alt=""></'. $name_tag .'>' : '';

    ?>

      <div class="item">
        <div class="fwzi-image"><?php echo $actual_image; ?></div>
        <?php the_content(); ?>
        <h5 class="quote-author"><?php echo $client_name; ?>, <?php echo $client_pro; ?></h5>
      </div>      

    <?php
    } elseif ($testimonial_style === 'testimonial_three') { ?>    

      <div class="item">
        <div class="testimonial-item">
          <?php the_content(); ?>
          <div class="fwzi-image"><?php echo $actual_image; ?> <?php echo $client_name; ?>, <?php echo $client_pro; ?></div>
        </div>
      </div>

    <?php
    } elseif ($testimonial_style === 'testimonial_four') { 
      if(class_exists('Aq_Resize')) {
        $testi_img = aq_resize( $large_image, '79', '79', true );
      } else {$testi_img = $large_image;}
    $actual_image = $large_image ? '<'. $name_tag .' '. $name_link .'><img src="'. $testi_img .'" alt=""></'. $name_tag .'>' : '';
      ?>   

      <div class="item">
        <div class="quote-author">
          <div class="fwzi-image"><?php echo $actual_image; ?></div>
          <div class="quote-author-info">
            <h4 class="author-name"><?php echo $client_name; ?></h4>
            <h6 class="author-designation"><?php echo $client_pro; ?></h6>
          </div>
        </div>
        <?php the_content(); ?>
      </div> 

    <?php
    } elseif ($testimonial_style === 'testimonial_five') { 
      if(class_exists('Aq_Resize')) {
        $testi_img = aq_resize( $large_image, '79', '79', true );
      } else {$testi_img = $large_image;}
    $actual_image = $large_image ? '<'. $name_tag .' '. $name_link .'><img src="'. $testi_img .'" alt=""></'. $name_tag .'>' : '';
      ?>   

      <div class="item">
        <div class="testimonial-item-wrap">
          <?php the_content(); ?>
          <div class="fwzi-rating">
          <?php 
          for( $i=1; $i<= $testi_stars; $i++) {
            echo '<i class="fa fa-star" aria-hidden="true"></i>';
          } 
          for( $i=5; $i > $testi_stars; $i--) {
            echo '<i class="fa fa-star-o" aria-hidden="true"></i>';
          } 
          ?>
          </div>
        </div>
        <div class="quote-author">
          <div class="fwzi-image"><?php echo $actual_image; ?></div>
          <div class="quote-author-info">
            <h4 class="author-name"><?php echo $client_name; ?></h4>
            <h6 class="author-designation"><?php echo $client_pro; ?></h6>
          </div>
        </div>
      </div> 

    <?php
    } else {
      $c++;
      if ( $c == 1 ){
        $class = ' active';
      }
      else{
        $class='';
      }
    ?>    
      <div class="item <?php echo $class; ?>">
        <?php the_content(); ?>
        <h5 class="quote-author"><?php echo $client_name; ?>, <?php echo $client_pro; ?></h5>
      </div>
    <?php
    } // Style One
    endwhile;
    wp_reset_postdata();
    ?>

  <?php if ($testimonial_style === 'testimonial_two') { // Style Two ?>
    </div>  <!-- Two fwzi-slider -->
    </div> <!-- Two fwzi-container -->
  <?php } elseif ($testimonial_style === 'testimonial_three') {  ?>
    </div>  <!-- Three fwzi-slider -->
  <?php } elseif ($testimonial_style === 'testimonial_four') {  ?>
    </div>  <!-- four fwzi-slider -->
  <?php } elseif ($testimonial_style === 'testimonial_five') {  ?>
    </div>  <!-- five fwzi-slider -->
  <?php } else { ?>

    <?php
    $args = array(
      'paged' => $my_page,
      'post_type' => 'testimonial',
      'posts_per_page' => (int)$testimonial_limit,
      'orderby' => $testimonial_orderby,
      'order' => $testimonial_order
    );

    $fwzi_test = new WP_Query( $args );

    if ($fwzi_test->have_posts()) : ?>

      <ol class="carousel-indicators">
        <?php $s=0; ?>
        <?php  while ($fwzi_test->have_posts()) : $fwzi_test->the_post();
          // Featured Image
          $large_image =  wp_get_attachment_image_src( get_post_thumbnail_id(), 'fullsize', false, '' );
          $large_image = $large_image[0];
            if(class_exists('Aq_Resize')) {
              $testi_img = aq_resize( $large_image, '54', '54', true );
            } else {
              $testi_img = $large_image;
            }

          $actual_image = $large_image ? '<'. $name_tag .' '. $name_link .'><img src="'. $testi_img .'" alt=""></'. $name_tag .'>' : ''; ?>
          <li id="indicator-<?php echo sanitize_title($client_name .$s); ?>" data-target="#quote-carousel" data-slide-to="<?php echo $s; ?>">
            <?php
              $s++;
              echo $actual_image;

            ?>
          </li>

        <?php
          endwhile;
          wp_reset_postdata();
        ?>
      </ol>

  <?php endif; ?>
    </div>  <!-- carousel-inner -->
  </div>  <!-- carousel -->

  <?php } ?>
  <?php if ($testimonial_style === 'testimonial_two') { // Style Two ?>
    </div>  <!-- container -->
    </div>  <!-- testimonial-wrap -->
    </div>  <!-- fwzi-testimonial -->
  <?php } elseif ($testimonial_style === 'testimonial_three') {  ?>
    </div><!-- container -->
    </div><!-- testimonial-wrap -->
    </div><!-- fwzi-testimonial -->
  <?php } elseif ($testimonial_style === 'testimonial_four') {  ?>
    </div>
    </div>
    <?php echo $testi_container_close; ?>
  <?php } elseif ($testimonial_style === 'testimonial_five') {  ?>
    </div>
    </div>
    <?php echo $testi_container_close; ?>
  <?php } else { ?>
  </div> <!-- Else fwzi-container -->
  <?php echo $container_close; ?><!-- Container -->
  <a data-slide="prev" href="#quote-carousel" class="left carousel-control"><i class="fa fa-angle-left" aria-hidden="true"></i></a>
  <a data-slide="next" href="#quote-carousel" class="right carousel-control"><i class="fa fa-angle-right" aria-hidden="true"></i></a>
</div> <!-- testimonial-wrap -->
</div> <!-- fwzi-testimonial -->
<?php echo $testi_container_close; ?>
  <!-- Testimonial End -->

<?php }
  endif;
    // Return outbut buffer
    return ob_get_clean();

  }
}
add_shortcode( 'fwzi_testimonial_carousel', 'fwzi_testimonial_carousel_function' );
<?php
/* Team */
if ( !function_exists('fwzi_team_function')) {
  function fwzi_team_function( $atts, $content = NULL ) {

    extract(shortcode_atts(array(
      'class'  => '',
      // Listing
      'team_limit'  => '',
      'team_order'  => '',
      'team_orderby'  => '',
      'team_social_icon' => '',
      'team_min_height'  => '',
      // Color & Style
      'name_color'  => '',
      'icon_color'  => '',
      'icon_bg_color'  => '',
      'icon_hover_color'  => '',
      'hover_overlay_color'  => '',
      'icon_bg_hover_color'  => '',
      'profession_color'  => '',
      'name_hover_color'  => '',
      'name_size'  => '',
      'profession_size'  => '',
    ), $atts));

    // Shortcode Style CSS
    $e_uniqid       = uniqid();
    $inline_style   = '';

    // Minimum Height
    if ( $team_min_height ) {
      $inline_style .= '.fwzi-team-'. $e_uniqid .' .member-item {';
      $inline_style .= ( $team_min_height ) ? 'min-height:'. fawzi_core_check_px($team_min_height) .';' : '';
      $inline_style .= '}';
    }
    // Name Color
    if ( $name_color || $name_size ) {
      $inline_style .= '.fwzi-team-'. $e_uniqid .' .member-name, .fwzi-team-'. $e_uniqid .'.member-name a {';
      $inline_style .= ( $name_color ) ? 'color:'. $name_color .';' : '';
      $inline_style .= ( $name_size ) ? 'font-size:'. fawzi_core_check_px($name_size) .';' : '';
      $inline_style .= '}';
    }
    // Name Hover color
    if ( $name_hover_color ) {
      $inline_style .= '.fwzi-team-'. $e_uniqid .' .member-name a {';
      $inline_style .= ( $name_hover_color ) ? 'color:'. $name_hover_color .';' : '';
      $inline_style .= '}';
    }
    // Profession Color
    if ( $profession_color || $profession_size ) {
      $inline_style .= '.fwzi-team-'. $e_uniqid .' .member-designation {';
      $inline_style .= ( $profession_color ) ? 'color:'. $profession_color .';' : '';
      $inline_style .= ( $profession_size ) ? 'font-size:'. fawzi_core_check_px($profession_size) .';' : '';
      $inline_style .= '}';
    }
    // Icon Color
    if ( $icon_color || $icon_bg_color ) {
      $inline_style .= '.fwzi-members.fwzi-team-'. $e_uniqid .' .member-item.fwzi-hover .social-wrap a {';
      $inline_style .= ( $icon_color ) ? 'color:'. $icon_color .';' : '';
      $inline_style .= ( $icon_bg_color ) ? 'background:'. $icon_bg_color .';' : '';
      $inline_style .= '}';
    }
    if ( $icon_hover_color || $icon_bg_hover_color ) {
      $inline_style .= '.fwzi-members.fwzi-team-'. $e_uniqid .' .member-item.fwzi-hover .social-wrap a:hover {';
      $inline_style .= ( $icon_hover_color ) ? 'color:'. $icon_hover_color .';' : '';
      $inline_style .= ( $icon_bg_hover_color ) ? 'background:'. $icon_bg_hover_color .';' : '';
      $inline_style .= '}';
    }
    // Overlay Color
    if ( $hover_overlay_color ) {
      $inline_style .= '.fwzi-members.fwzi-team-'. $e_uniqid .' .member-social-links {';
      $inline_style .= ( $hover_overlay_color ) ? 'background:'. $hover_overlay_color .';' : '';
      $inline_style .= '}';
    }

    // Add inline style
    add_inline_style( $inline_style );
    $styled_class  = 'fwzi-team-'. $e_uniqid;

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

    $args = array(
      'paged' => $my_page,
      'post_type' => 'team',
      'posts_per_page' => (int)$team_limit,
      'orderby' => $team_orderby,
      'order' => $team_order,
    );

    $fwzi_team_qury = new WP_Query( $args );

    if ($fwzi_team_qury->have_posts()) :
    ?>
    <section class="fwzi-members <?php echo $styled_class .' '. $class; ?>"> <!-- Team Starts -->
    <div class="row">
      <?php
      while ($fwzi_team_qury->have_posts()) : $fwzi_team_qury->the_post();

      // Link
      $team_options = get_post_meta( get_the_ID(), 'team_options', true );
      $team_pro = $team_options['team_job_position'];
      $team_socials = $team_options['social_icons'];
      $team_pro = $team_pro ? '<h6 class="member-designation">'.$team_pro.'</h6>' : '';

      // Featured Image
      $large_image =  wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'fullsize', false, '' );
      $large_image = $large_image[0];
      $abt_title = get_the_title();
      $actual_image = '<img src="'. $large_image .'" alt="'.$abt_title.'">';
      ?>
      <div class="col-md-3 col-sm-4">
        <div class="member-item">
          <div class="fwzi-image">
            <?php echo $actual_image; ?>
            <?php if($team_social_icon) { ?>
            <div class="member-social-links">
              <div class="fwzi-table-container">
                <div class="fwzi-align-container">
                  <div class="fwzi-social rounded">
                      <div class="social-wrap">
                        <?php
                          if ( ! empty( $team_socials ) ) {
                          foreach ( $team_socials as $social ) { 
                        ?>
                          <a href="<?php echo $social['icon_link']; ?>" target="_blank"><i class="<?php echo $social['icon']; ?>" aria-hidden="true"></i></a>
                        <?php } } ?>
                      </div>
                  </div>
                </div>
              </div>
            </div>
          <?php } ?>          
          </div>
          <div class="member-info">
            <h4 class="member-name"><a href="<?php esc_url(the_permalink()); ?>"><?php echo $abt_title; ?></a></h4>
            <?php echo $team_pro; ?>
          </div>
        </div>
      </div> 
      <?php endwhile; ?>
      </div>
    </section> <!-- Team End -->

<?php
  endif;

    // Return outbut buffer
    return ob_get_clean();

  }
}
add_shortcode( 'fwzi_team', 'fwzi_team_function' );
<?php
// Metabox
$fawzi_id    = ( isset( $post ) ) ? $post->ID : 0;
$fawzi_id    = ( is_home() ) ? get_option( 'page_for_posts' ) : $fawzi_id;
$fawzi_id    = ( fawzi_is_woocommerce_shop() ) ? wc_get_page_id( 'shop' ) : $fawzi_id;
$fawzi_id    = ( ! is_tag() && ! is_archive() && ! is_search() && ! is_404() && ! is_singular('testimonial') ) ? $fawzi_id : false;
$fawzi_meta  = get_post_meta( $fawzi_id, 'page_type_metabox', true );


  if ($fawzi_meta) {
    $fawzi_choose_menu = $fawzi_meta['choose_menu'];
  } else { $fawzi_choose_menu = ''; }
  $fawzi_choose_menu = $fawzi_choose_menu ? $fawzi_choose_menu : '';

  wp_nav_menu(
    array(
      'menu'              => 'primary',
      'theme_location'    => 'primary',
      'container'         => 'nav',
      'container_class'   => '',
      'container_id'      => '',
      'menu'              => $fawzi_choose_menu,
      'menu_class'        => 'nav navbar-nav',
      'fallback_cb'       => 'fawzi_wp_bootstrap_navwalker::fallback',
      'walker'            => new fawzi_wp_bootstrap_navwalker()
    )
  );
?>

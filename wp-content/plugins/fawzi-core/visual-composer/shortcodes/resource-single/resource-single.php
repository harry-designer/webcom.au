<?php
/* Resource */
if ( !function_exists('fwzi_resource_single_function')) {
  function fwzi_resource_single_function( $atts, $content = NULL ) {

    extract(shortcode_atts(array(
      'class'  => '',
      // Listing
      'book_image'  => '',
      'features_title'  => '',
      'resource_features'  => '',
      // Color & Style
      'title_color'  => '',
      'content_color'  => '',
      'author_color'  => '',
      'author_hover_color'  => '',
      'download_color'  => '',
      'download_hover_color'  => '',
    ), $atts));

    // fix unclosed/unwanted paragraph tags in $content
    $content = wpb_js_remove_wpautop($content, true);

    // Group Field
    $resource_features = (array) vc_param_group_parse_atts( $resource_features );
    $get_resource_features = array();
    foreach ( $resource_features as $resource_feature ) {
      $each_features = $resource_feature;
      $each_features['features'] = isset( $resource_feature['features'] ) ? $resource_feature['features'] : '';
      $get_resource_features[] = $each_features;
    }

    // Shortcode Style CSS
    $e_uniqid       = uniqid();
    $inline_style   = '';

    // Name Color
    if ( $title_color ) {
      $inline_style .= '.fwzi-resource-'. $e_uniqid .' .book-detail .book-title, .fwzi-resource-'. $e_uniqid .'  .book-feature-title {';
      $inline_style .= ( $title_color ) ? 'color:'. $title_color .';' : '';
      $inline_style .= '}';
    }
    // Name Hover color
    if ( $content_color ) {
      $inline_style .= '.fwzi-resource-'. $e_uniqid .' .book-detail p, .fwzi-resource-'. $e_uniqid .' .book-features ul li {';
      $inline_style .= ( $content_color ) ? 'color:'. $content_color .';' : '';
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

    // Add inline style
    add_inline_style( $inline_style );
    $styled_class  = 'fwzi-resource-'. $e_uniqid;
    global $post;

    // Turn output buffer on
    ob_start(); ?>

    <!-- Fwzi Books Detail -->
    <section class="fwzi-book-detail <?php echo $styled_class .' '. $class; ?>">
      <div class="book-detail-wrap">
      <?php
      // Link
      $resource_options = get_post_meta( get_the_ID(), 'resource_options', true );
      $resource_download = $resource_options['resource_download'];
      $resource_download_link = $resource_options['resource_download_link'];
      $popup_attribute = $resource_options['popup-attribute'];
      $resource_download = $resource_download ? $resource_download : 'Download Now';
      $resource_download_link = $resource_download_link ? $resource_download_link : '#';

      // Featured Image
      $book_title = get_the_title();
      $image_url = wp_get_attachment_url( $book_image );
      ?>

      <div class="fwzi-image"><img src="<?php echo $image_url; ?>" alt="<?php echo $book_title; ?>"></div>
      <div class="book-detail">
        <h2 class="book-title"><?php echo $book_title; ?></h2>
        <?php echo $content; ?>
        <div class="book-features">
          <h5 class="book-feature-title"><?php echo $features_title; ?></h5>
          <ul>
          <?php foreach ( $get_resource_features as $each_features ) { ?>
            <li><?php echo $each_features['features']; ?></li>
          <?php } ?>
          </ul>
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
    </section> <!-- Resource End -->

<?php

    // Return outbut buffer
    return ob_get_clean();

  }
}
add_shortcode( 'fwzi_resource_single', 'fwzi_resource_single_function' );
<?php

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
$case_studies_column = cs_get_option('case_studies_column');
$case_studies_column = $case_studies_column ? $case_studies_column : 'col-md-4 col-sm-4 col-xs-12';

// Featured Image
$large_image =  wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'fullsize', false, '' );
$large_image = $large_image[0];
$featured_img = ( $large_image ) ? $large_image : '';
if ($case_studies_column === 'col-md-4 col-sm-4 col-xs-12') {
  $fawzi_casestudies_img = aq_resize( $large_image, '370', '320', true );
  $fawzi_featured_img = ( $fawzi_casestudies_img ) ? $fawzi_casestudies_img : FAWZI_IMAGES . '/aq/370x320.jpg';
  $fawzi_original_img = FAWZI_IMAGES . '/casestudies-370x320.png';
} else {
  $fawzi_casestudies_img = aq_resize( $large_image, '560', '470', true );
  $fawzi_featured_img = ( $fawzi_casestudies_img ) ? $fawzi_casestudies_img : FAWZI_IMAGES . '/aq/560x470.jpg';
  $fawzi_original_img = FAWZI_IMAGES . '/casestudies-560x470.png';
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
              <a href="<?php echo esc_url($featured_img); ?>">
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

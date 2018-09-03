<?php

/**
 * Initialize Custom Post Type - Fawzi Theme
 */

function fawzi_custom_post_type() {

	$case_studies_cpt = (fawzi_framework_active()) ? cs_get_option('theme_case_studies_name') : '';
	$case_studies_slug = (fawzi_framework_active()) ? cs_get_option('theme_case_studies_slug') : '';
	$case_studies_cpt_slug = (fawzi_framework_active()) ? cs_get_option('theme_case_studies_cat_slug') : '';

	$base = (isset($case_studies_cpt_slug) && $case_studies_cpt_slug !== '') ? sanitize_title_with_dashes($case_studies_cpt_slug) : ((isset($case_studies_cpt) && $case_studies_cpt !== '') ? strtolower($case_studies_cpt) : 'casestudies');
	$base_slug = (isset($case_studies_slug) && $case_studies_slug !== '') ? sanitize_title_with_dashes($case_studies_slug) : ((isset($case_studies_cpt) && $case_studies_cpt !== '') ? strtolower($case_studies_cpt) : 'casestudies');
	$label = ucfirst((isset($case_studies_cpt) && $case_studies_cpt !== '') ? strtolower($case_studies_cpt) : 'Case Studies');

	// Register custom post type - Case Studies
	register_post_type('casestudies',
		array(
			'labels' => array(
				'name' => $label,
				'singular_name' => sprintf(esc_html__('%s Post', 'fawzi-core' ), $label),
				'all_items' => sprintf(esc_html__('All %s', 'fawzi-core' ), $label),
				'add_new' => esc_html__('Add New', 'fawzi-core') ,
				'add_new_item' => sprintf(esc_html__('Add New %s', 'fawzi-core' ), $label),
				'edit' => esc_html__('Edit', 'fawzi-core') ,
				'edit_item' => sprintf(esc_html__('Edit %s', 'fawzi-core' ), $label),
				'new_item' => sprintf(esc_html__('New %s', 'fawzi-core' ), $label),
				'view_item' => sprintf(esc_html__('View %s', 'fawzi-core' ), $label),
				'search_items' => sprintf(esc_html__('Search %s', 'fawzi-core' ), $label),
				'not_found' => esc_html__('Nothing found in the Database.', 'fawzi-core') ,
				'not_found_in_trash' => esc_html__('Nothing found in Trash', 'fawzi-core') ,
				'parent_item_colon' => ''
			) ,
			'public' => true,
			'publicly_queryable' => true,
			'exclude_from_search' => false,
			'show_ui' => true,
			'query_var' => true,
			'menu_position' => 10,
			'menu_icon' => 'dashicons-portfolio',
			'rewrite' => array(
				'slug' => $base_slug,
				'with_front' => false
			),
			'has_archive' => true,
			'capability_type' => 'post',
			'hierarchical' => true,
			'supports' => array(
				'title',
				'editor',
				'author',
				'thumbnail',
				'excerpt',
				'trackbacks',
				'custom-fields',
				'comments',
				'revisions',
				'sticky',
				'page-attributes'
			)
		)
	);
	// Registered

	// Add Category Taxonomy for our Custom Post Type - Case Studies
	register_taxonomy(
		'casestudies_category',
		'casestudies',
		array(
			'hierarchical' => true,
			'public' => true,
			'show_ui' => true,
			'show_admin_column' => true,
			'show_in_nav_menus' => true,
			'labels' => array(
				'name' => sprintf(esc_html__( '%s Categories', 'fawzi-core' ), $label),
				'singular_name' => sprintf(esc_html__('%s Category', 'fawzi-core'), $label),
				'search_items' =>  sprintf(esc_html__( 'Search %s Categories', 'fawzi-core'), $label),
				'all_items' => sprintf(esc_html__( 'All %s Categories', 'fawzi-core'), $label),
				'parent_item' => sprintf(esc_html__( 'Parent %s Category', 'fawzi-core'), $label),
				'parent_item_colon' => sprintf(esc_html__( 'Parent %s Category:', 'fawzi-core'), $label),
				'edit_item' => sprintf(esc_html__( 'Edit %s Category', 'fawzi-core'), $label),
				'update_item' => sprintf(esc_html__( 'Update %s Category', 'fawzi-core'), $label),
				'add_new_item' => sprintf(esc_html__( 'Add New %s Category', 'fawzi-core'), $label),
				'new_item_name' => sprintf(esc_html__( 'New %s Category Name', 'fawzi-core'), $label)
			),
			'rewrite' => array( 'slug' => $base . '_cat' ),
		)
	);

	$args = array(
		'hierarchical' => true,
		'public' => true,
		'show_ui' => true,
		'show_admin_column' => true,
		'show_in_nav_menus' => true,
		'show_tagcloud' => false,
	);

	// Testimonials - Start
	$testimonial_slug = 'testimonial';
	$testimonials = __('Testimonials', 'fawzi-core');

	// Register custom post type - Testimonials
	register_post_type('testimonial',
		array(
			'labels' => array(
				'name' => $testimonials,
				'singular_name' => sprintf(esc_html__('%s Post', 'fawzi-core' ), $testimonials),
				'all_items' => sprintf(esc_html__('%s', 'fawzi-core' ), $testimonials),
				'add_new' => esc_html__('Add New', 'fawzi-core') ,
				'add_new_item' => sprintf(esc_html__('Add New %s', 'fawzi-core' ), $testimonials),
				'edit' => esc_html__('Edit', 'fawzi-core') ,
				'edit_item' => sprintf(esc_html__('Edit %s', 'fawzi-core' ), $testimonials),
				'new_item' => sprintf(esc_html__('New %s', 'fawzi-core' ), $testimonials),
				'view_item' => sprintf(esc_html__('View %s', 'fawzi-core' ), $testimonials),
				'search_items' => sprintf(esc_html__('Search %s', 'fawzi-core' ), $testimonials),
				'not_found' => esc_html__('Nothing found in the Database.', 'fawzi-core') ,
				'not_found_in_trash' => esc_html__('Nothing found in Trash', 'fawzi-core') ,
				'parent_item_colon' => ''
			) ,
			'public' => true,
			'publicly_queryable' => true,
			'exclude_from_search' => false,
			'show_ui' => true,
			'query_var' => true,
			// 'menu_position' => 10,
			'show_in_menu' => 'fawzi_post_type',
			'menu_icon' => 'dashicons-groups',
			'rewrite' => array(
				'slug' => $testimonial_slug,
				'with_front' => false
			),
			'has_archive' => true,
			'capability_type' => 'post',
			'hierarchical' => true,
			'supports' => array(
				'title',
				'editor',
				'thumbnail',
				'revisions',
				'sticky',
			)
		)
	);
	// Testimonials - End

	// Team - Start
	$team_slug = 'team';
	$teams = __('Teams', 'fawzi-core');

	// Register custom post type - Team
	register_post_type('team',
		array(
			'labels' => array(
				'name' => $teams,
				'singular_name' => sprintf(esc_html__('%s Post', 'fawzi-core' ), $teams),
				'all_items' => sprintf(esc_html__('%s', 'fawzi-core' ), $teams),
				'add_new' => esc_html__('Add New', 'fawzi-core') ,
				'add_new_item' => sprintf(esc_html__('Add New %s', 'fawzi-core' ), $teams),
				'edit' => esc_html__('Edit', 'fawzi-core') ,
				'edit_item' => sprintf(esc_html__('Edit %s', 'fawzi-core' ), $teams),
				'new_item' => sprintf(esc_html__('New %s', 'fawzi-core' ), $teams),
				'view_item' => sprintf(esc_html__('View %s', 'fawzi-core' ), $teams),
				'search_items' => sprintf(esc_html__('Search %s', 'fawzi-core' ), $teams),
				'not_found' => esc_html__('Nothing found in the Database.', 'fawzi-core') ,
				'not_found_in_trash' => esc_html__('Nothing found in Trash', 'fawzi-core') ,
				'parent_item_colon' => ''
			) ,
			'public' => true,
			'publicly_queryable' => true,
			'exclude_from_search' => false,
			'show_ui' => true,
			'query_var' => true,
			// 'menu_position' => 10,
			'show_in_menu' => 'fawzi_post_type',
			'menu_icon' => 'dashicons-businessman',
			'rewrite' => array(
				'slug' => $team_slug,
				'with_front' => false
			),
			'has_archive' => true,
			'capability_type' => 'post',
			'hierarchical' => true,
			'supports' => array(
				'title',
				'editor',
				'thumbnail',
				'excerpt',
				'revisions',
				'sticky',
			)
		)
	);
	// Team - End

	// Resource - Start
	$resource_slug = 'resource';
	$resources = __('Resources', 'fawzi-core');

	// Register custom post type - Resource
	register_post_type('resource',
		array(
			'labels' => array(
				'name' => $resources,
				'singular_name' => sprintf(esc_html__('%s Post', 'fawzi-core' ), $resources),
				'all_items' => sprintf(esc_html__('%s', 'fawzi-core' ), $resources),
				'add_new' => esc_html__('Add New', 'fawzi-core') ,
				'add_new_item' => sprintf(esc_html__('Add New %s', 'fawzi-core' ), $resources),
				'edit' => esc_html__('Edit', 'fawzi-core') ,
				'edit_item' => sprintf(esc_html__('Edit %s', 'fawzi-core' ), $resources),
				'new_item' => sprintf(esc_html__('New %s', 'fawzi-core' ), $resources),
				'view_item' => sprintf(esc_html__('View %s', 'fawzi-core' ), $resources),
				'search_items' => sprintf(esc_html__('Search %s', 'fawzi-core' ), $resources),
				'not_found' => esc_html__('Nothing found in the Database.', 'fawzi-core') ,
				'not_found_in_trash' => esc_html__('Nothing found in Trash', 'fawzi-core') ,
				'parent_item_colon' => ''
			) ,
			'public' => true,
			'publicly_queryable' => true,
			'exclude_from_search' => false,
			'show_ui' => true,
			'query_var' => true,
			'menu_position' => 10,
			'menu_icon' => 'dashicons-book-alt',
			'rewrite' => array(
				'slug' => $resource_slug,
				'with_front' => false
			),
			'has_archive' => true,
			'capability_type' => 'post',
			'hierarchical' => true,
			'supports' => array(
				'title',
				'editor',
				'author',
				'thumbnail',
				'excerpt',
				'trackbacks',
				'custom-fields',
				'comments',
				'revisions',
				'sticky',
				'page-attributes'
			)
		)
	);

	// Add Category Taxonomy for our Custom Post Type - Resource
	register_taxonomy(
		'resource-author',
		'resource',
		array(
			'hierarchical' => true,
			'public' => true,
			'show_ui' => true,
			'show_admin_column' => true,
			'show_in_nav_menus' => true,
			'labels' => array(
				'name' => sprintf(esc_html__( '%s Author', 'fawzi-core' ), 'Resource'),
				'singular_name' => sprintf(esc_html__('%s Author', 'fawzi-core'), 'Resource'),
				'search_items' =>  sprintf(esc_html__( 'Search %s Author', 'fawzi-core'), 'Resource'),
				'all_items' => sprintf(esc_html__( 'All %s Author', 'fawzi-core'), 'Resource'),
				'parent_item' => sprintf(esc_html__( 'Parent %s Author', 'fawzi-core'), 'Resource'),
				'parent_item_colon' => sprintf(esc_html__( 'Parent %s Author:', 'fawzi-core'), 'Resource'),
				'edit_item' => sprintf(esc_html__( 'Edit %s Author', 'fawzi-core'), 'Resource'),
				'update_item' => sprintf(esc_html__( 'Update %s Author', 'fawzi-core'), 'Resource'),
				'add_new_item' => sprintf(esc_html__( 'Add New %s Author', 'fawzi-core'), 'Resource'),
				'new_item_name' => sprintf(esc_html__( 'New %s Author Name', 'fawzi-core'), 'Resource')
			),
			'rewrite' => array( 'slug' => 'resource-author' ),
		)
	);

	$args = array(
		'hierarchical' => true,
		'public' => true,
		'show_ui' => true,
		'show_admin_column' => true,
		'show_in_nav_menus' => true,
		'show_tagcloud' => false,
	);
	// Resource - End

}

// Post Type - Menu
if( ! function_exists( 'fawzi_post_type_menu' ) ) {
  function fawzi_post_type_menu(){
    if ( current_user_can( 'edit_theme_options' ) ) {
			add_menu_page( __('Company', 'fawzi-core'), __('Company', 'fawzi-core'), 'edit_theme_options', 'fawzi_post_type', 'vt_welcome_page', 'dashicons-groups', 10 );
    }
  }
}
add_action( 'admin_menu', 'fawzi_post_type_menu' );

// Case Studies Slug
function fawzi_custom_case_studies_slug() {
	$case_studies_cpt = (fawzi_framework_active()) ? cs_get_option('theme_case_studies_name') : '';
	if ($case_studies_cpt === '') $case_studies_cp = 'casestudies';
  $rules = get_option( 'rewrite_rules' );
  if ( ! isset( $rules['('.$case_studies_cpt.')/(\d*)$'] ) ) {
		global $wp_rewrite;
		$wp_rewrite->flush_rules();
  }
}
add_action( 'cs_validate_save_after','fawzi_custom_case_studies_slug' );

// After Theme Setup
function fawzi_custom_flush_rules() {
	// Enter post type function, so rewrite work within this function
	fawzi_custom_post_type();
	// Flush it
	flush_rewrite_rules();
}
register_activation_hook(__FILE__, 'fawzi_custom_flush_rules');
add_action('init', 'fawzi_custom_post_type');

// Avoid case_studies post type as 404 page while it change
function vt_cpt_avoid_error_case_studies() {
	$case_studies_cpt = (fawzi_framework_active()) ? cs_get_option('theme_case_studies_name') : '';
	if ($case_studies_cpt === '') $case_studies_cp = 'casestudies';
	$set = get_option('post_type_rules_flased_' . $case_studies_cpt);
	if ($set !== true){
		flush_rewrite_rules(false);
		update_option('post_type_rules_flased_' . $case_studies_cpt,true);
	}
}
add_action('init', 'vt_cpt_avoid_error_case_studies');

// Add Filter by Category in Case Studies Type
add_action('restrict_manage_posts', 'fawzi_filter_case_studies_categories');
function fawzi_filter_case_studies_categories() {
	global $typenow;
	$post_type = 'casestudies'; // Case Studies post type
	$taxonomy  = 'casestudies_category'; // Case Studies category taxonomy
	if ($typenow == $post_type) {
		$selected      = isset($_GET[$taxonomy]) ? $_GET[$taxonomy] : '';
		$info_taxonomy = get_taxonomy($taxonomy);
		wp_dropdown_categories(array(
			'show_option_all' => sprintf(esc_html__("Show All %s", 'fawzi-core'), $info_taxonomy->label),
			'taxonomy'        => $taxonomy,
			'name'            => $taxonomy,
			'orderby'         => 'name',
			'selected'        => $selected,
			'show_count'      => true,
			'hide_empty'      => true,
		));
	};
}

// Case Studies Search => ID to Term
add_filter('parse_query', 'fawzi_case_studies_id_term_search');
function fawzi_case_studies_id_term_search($query) {
	global $pagenow;
	$post_type = 'casestudies'; // Case Studies post type
	$taxonomy  = 'casestudies_category'; // Case Studies category taxonomy
	$q_vars    = &$query->query_vars;
	if ( $pagenow == 'edit.php' && isset($q_vars['post_type']) && $q_vars['post_type'] == $post_type && isset($q_vars[$taxonomy]) && is_numeric($q_vars[$taxonomy]) && $q_vars[$taxonomy] != 0 ) {
		$term = get_term_by('id', $q_vars[$taxonomy], $taxonomy);
		$q_vars[$taxonomy] = $term->slug;
	}
}

/* ---------------------------------------------------------------------------
 * Custom columns - Case Studies
 * --------------------------------------------------------------------------- */
add_filter("manage_edit-case_studies_columns", "fawzi_case_studies_edit_columns");
function fawzi_case_studies_edit_columns($columns) {
  $new_columns['cb'] = '<input type="checkbox" />';
  $new_columns['title'] = __('Title', 'fawzi-core' );
  $new_columns['thumbnail'] = __('Image', 'fawzi-core' );
  $new_columns['casestudies_category'] = __('Categories', 'fawzi-core' );
  $new_columns['casestudies_order'] = __('Order', 'fawzi-core' );
  $new_columns['date'] = __('Date', 'fawzi-core' );

  return $new_columns;
}
add_action('manage_case_studies_posts_custom_column', 'fawzi_manage_case_studies_columns', 10, 2);
function fawzi_manage_case_studies_columns( $column_name ) {
  global $post;

  switch ($column_name) {

    /* If displaying the 'Image' column. */
    case 'thumbnail':
      echo get_the_post_thumbnail( $post->ID, array( 100, 100) );
    break;

    /* If displaying the 'Categories' column. */
    case 'casestudies_category' :

      $terms = get_the_terms( $post->ID, 'casestudies_category' );

      if ( !empty( $terms ) ) {

        $out = array();
        foreach ( $terms as $term ) {
            $out[] = sprintf( '<a href="%s">%s</a>',
            	esc_url( add_query_arg( array( 'post_type' => $post->post_type, 'casestudies_category' => $term->slug ), 'edit.php' ) ),
            	esc_html( sanitize_term_field( 'name', $term->name, $term->term_id, 'casestudies_category', 'display' ) )
            );
        }
        /* Join the terms, separating them with a comma. */
        echo join( ', ', $out );
      }

      /* If no terms were found, output a default message. */
      else {
        echo '&macr;';
      }

    break;

    case "casestudies_order":
      echo $post->menu_order;
    break;

    /* Just break out of the switch statement for everything else. */
    default :
      break;
    break;

  }
}

/* ---------------------------------------------------------------------------
 * Custom columns - Testimonial
 * --------------------------------------------------------------------------- */
add_filter("manage_edit-testimonial_columns", "fawzi_testimonial_edit_columns");
function fawzi_testimonial_edit_columns($columns) {
  $new_columns['cb'] = '<input type="checkbox" />';
  $new_columns['title'] = __('Title', 'fawzi-core' );
  $new_columns['thumbnail'] = __('Image', 'fawzi-core' );
  $new_columns['id'] = __('Item ID', 'fawzi-core' );
  $new_columns['name'] = __('Client Name', 'fawzi-core' );
  $new_columns['date'] = __('Date', 'fawzi-core' );

  return $new_columns;
}

add_action('manage_testimonial_posts_custom_column', 'fawzi_manage_testimonial_columns', 10, 2);
function fawzi_manage_testimonial_columns( $column_name ) {
  global $post;

  switch ($column_name) {

    /* If displaying the 'Image' column. */
    case 'thumbnail':
      echo get_the_post_thumbnail( $post->ID, array( 100, 100) );
    break;

    /* If displaying the 'ID' column. */
    case 'id':
      echo '<input type="text" onfocus="this.select();" readonly="readonly" value="'. esc_attr( $post->ID ) .'">';
    break;

    case "name":
    	$testimonial_options = get_post_meta( get_the_ID(), 'testimonial_options', true );
      echo $testimonial_options['testi_name'];
    break;

    /* Just break out of the switch statement for everything else. */
    default :
      break;
    break;

  }
}

/* ---------------------------------------------------------------------------
 * Custom columns - Team
 * --------------------------------------------------------------------------- */
add_filter("manage_edit-team_columns", "fawzi_team_edit_columns");
function fawzi_team_edit_columns($columns) {
  $new_columns['cb'] = '<input type="checkbox" />';
  $new_columns['title'] = __('Title', 'fawzi-core' );
  $new_columns['thumbnail'] = __('Image', 'fawzi-core' );
  $new_columns['name'] = __('Job Position', 'fawzi-core' );
  $new_columns['date'] = __('Date', 'fawzi-core' );

  return $new_columns;
}

add_action('manage_team_posts_custom_column', 'fawzi_manage_team_columns', 10, 2);
function fawzi_manage_team_columns( $column_name ) {
  global $post;

  switch ($column_name) {

    /* If displaying the 'Image' column. */
    case 'thumbnail':
      echo get_the_post_thumbnail( $post->ID, array( 100, 100) );
    break;

    case "name":
    	$team_options = get_post_meta( get_the_ID(), 'team_options', true );
      echo $team_options['team_job_position'];
    break;

    /* Just break out of the switch statement for everything else. */
    default :
      break;
    break;

  }
}

/* ---------------------------------------------------------------------------
 * Custom columns - Resource
 * --------------------------------------------------------------------------- */

// Add Filter by Category in Resource Type
add_action('restrict_manage_posts', 'fawzi_filter_resource_author');
function fawzi_filter_resource_author() {
	global $typenow;
	$post_type = 'resource'; // Resource post type
	$taxonomy  = 'resource-author'; // Resource category taxonomy
	if ($typenow == $post_type) {
		$selected      = isset($_GET[$taxonomy]) ? $_GET[$taxonomy] : '';
		$info_taxonomy = get_taxonomy($taxonomy);
		wp_dropdown_categories(array(
			'show_option_all' => sprintf(esc_html__("Show All %s", 'fawzi-core'), $info_taxonomy->label),
			'taxonomy'        => $taxonomy,
			'name'            => $taxonomy,
			'orderby'         => 'name',
			'selected'        => $selected,
			'show_count'      => true,
			'hide_empty'      => true,
		));
	};
}

// Resource Search => ID to Term
add_filter('parse_query', 'fawzi_resource_id_term_search');
function fawzi_resource_id_term_search($query) {
	global $pagenow;
	$post_type = 'resource'; // Resource post type
	$taxonomy  = 'resource-author'; // Resource category taxonomy
	$q_vars    = &$query->query_vars;
	if ( $pagenow == 'edit.php' && isset($q_vars['post_type']) && $q_vars['post_type'] == $post_type && isset($q_vars[$taxonomy]) && is_numeric($q_vars[$taxonomy]) && $q_vars[$taxonomy] != 0 ) {
		$term = get_term_by('id', $q_vars[$taxonomy], $taxonomy);
		$q_vars[$taxonomy] = $term->slug;
	}
}

add_filter("manage_edit-resource_columns", "fawzi_resource_edit_columns");
function fawzi_resource_edit_columns($columns) {
  $new_columns['cb'] = '<input type="checkbox" />';
  $new_columns['title'] = __('Title', 'fawzi-core' );
  $new_columns['thumbnail'] = __('Image', 'fawzi-core' );
  $new_columns['name'] = __('Author', 'fawzi-core' );
  $new_columns['date'] = __('Date', 'fawzi-core' );

  return $new_columns;
}

add_action('manage_resource_posts_custom_column', 'fawzi_manage_resource_columns', 10, 2);
function fawzi_manage_resource_columns( $column_name ) {
  global $post;

  switch ($column_name) {

    /* If displaying the 'Image' column. */
    case 'thumbnail':
      echo get_the_post_thumbnail( $post->ID, array( 100, 100) );
    break;

    case "name":
    	$terms = get_the_terms( $post->ID, 'resource-author' );

      if ( !empty( $terms ) ) {

        $out = array();
        foreach ( $terms as $term ) {
            $out[] = sprintf( '<a href="%s">%s</a>',
            	esc_url( add_query_arg( array( 'post_type' => $post->post_type, 'resource-author' => $term->slug ), 'edit.php' ) ),
            	esc_html( sanitize_term_field( 'name', $term->name, $term->term_id, 'resource-author', 'display' ) )
            );
        }
        /* Join the terms, separating them with a comma. */
        echo join( ', ', $out );
      }

      /* If no terms were found, output a default message. */
      else {
        echo '&macr;';
      }
    break;

    /* Just break out of the switch statement for everything else. */
    default :
      break;
    break;

  }
}


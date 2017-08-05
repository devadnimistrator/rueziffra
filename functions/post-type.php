<?php 
/*====================== Post Type video =======================*/
add_action( 'init', 'my_custom_post_video' );
function my_custom_post_video() {
   $labels = array(
     'name'               => _x( 'Video', 'post type general name' ),
     'singular_name'      => _x( 'Video', 'post type singular name' ),
     'add_new'            => _x( 'Add Video', 'video' ),
     'add_new_item'       => __( 'Add Video' ),
     'edit_item'          => __( 'Edit' ),
     'new_item'           => __( 'New Video' ),
     'all_items'          => __( 'All Video' ),
     'view_item'          => __( 'View' ),
     'search_items'       => __( 'Search' ),
     'not_found'          => __( 'Not found' ),
     'not_found_in_trash' => __( 'Not found' ), 
     'parent_item_colon'  => '',
     'menu_name'          => 'Video'
   );
   $args = array(
     'labels'        => $labels,
     'description'   => 'video',
     'public'        => true,
     'menu_position' => 5,
	 'rewrite' 		 => array( 'slug' => 'video', 'with_front' => false ),
     'supports'      => array( 'title', 'editor', 'thumbnail'),
     'has_archive'   => true,
   );
   register_post_type( 'video', $args );
   flush_rewrite_rules(false);
}
/* category for video */
function my_taxonomies_video() {
   $labels = array(
     'name'              => _x( 'Video category', 'taxonomy general name' ),
     'singular_name'     => _x( 'Video category', 'taxonomy singular name' ),
     'search_items'      => __( 'Search' ),
     'all_items'         => __( 'All categories' ),
     'parent_item'       => __( 'Parent category' ),
     'parent_item_colon' => __( 'Parent category' ),
     'edit_item'         => __( 'Edit category' ), 
     'update_item'       => __( 'Update category' ),
     'add_new_item'      => __( 'Add category' ),
     'new_item_name'     => __( 'New category' ),
     'menu_name'         => __( 'Video category' ),
   );
   $args = array(
     'labels' => $labels,
     'hierarchical' => true,
   );
   register_taxonomy( 'video_category', 'video', $args );
}
 add_action( 'init', 'my_taxonomies_video', 0 );
/*====================== Post Type resources =======================*/
add_action( 'init', 'my_custom_post_resources' );
function my_custom_post_resources() {
   $labels = array(
     'name'               => _x( 'Resources', 'post type general name' ),
     'singular_name'      => _x( 'Resources', 'post type singular name' ),
     'add_new'            => _x( 'Add resource', 'resources' ),
     'add_new_item'       => __( 'Add resource' ),
     'edit_item'          => __( 'Edit' ),
     'new_item'           => __( 'New resource' ),
     'all_items'          => __( 'All resources' ),
     'view_item'          => __( 'View' ),
     'search_items'       => __( 'Search' ),
     'not_found'          => __( 'Not found' ),
     'not_found_in_trash' => __( 'Not found' ), 
     'parent_item_colon'  => '',
     'menu_name'          => 'Resources'
   );
   $args = array(
     'labels'        => $labels,
     'description'   => 'resources',
     'public'        => true,
     'menu_position' => 5,
	 'rewrite' 		 => array( 'slug' => 'resources', 'with_front' => false ),
     'supports'      => array( 'title', 'editor', 'thumbnail'),
     'has_archive'   => true,
   );
   register_post_type( 'resources', $args );
   flush_rewrite_rules(false);
}
/* category for resources */
function my_taxonomies_resources() {
   $labels = array(
     'name'              => _x( 'Resources category', 'taxonomy general name' ),
     'singular_name'     => _x( 'Resources category', 'taxonomy singular name' ),
     'search_items'      => __( 'Search' ),
     'all_items'         => __( 'All categories' ),
     'parent_item'       => __( 'Parent category' ),
     'parent_item_colon' => __( 'Parent category' ),
     'edit_item'         => __( 'Edit category' ), 
     'update_item'       => __( 'Update category' ),
     'add_new_item'      => __( 'Add category' ),
     'new_item_name'     => __( 'New category' ),
     'menu_name'         => __( 'Resources category' ),
   );
   $args = array(
     'labels' => $labels,
     'hierarchical' => true,
   );
   register_taxonomy( 'resources_category', 'resources', $args );
}
 add_action( 'init', 'my_taxonomies_resources', 0 );
 /*====================== Post Type terms =======================*/
add_action( 'init', 'my_custom_post_terms' );
function my_custom_post_terms() {
   $labels = array(
     'name'               => _x( 'Terms', 'post type general name' ),
     'singular_name'      => _x( 'Terms', 'post type singular name' ),
     'add_new'            => _x( 'Add Term', 'terms' ),
     'add_new_item'       => __( 'Add Term' ),
     'edit_item'          => __( 'Edit' ),
     'new_item'           => __( 'New Term' ),
     'all_items'          => __( 'All terms' ),
     'view_item'          => __( 'View' ),
     'search_items'       => __( 'Search' ),
     'not_found'          => __( 'Not found' ),
     'not_found_in_trash' => __( 'Not found' ), 
     'parent_item_colon'  => '',
     'menu_name'          => 'Terms'
   );
   $args = array(
     'labels'        => $labels,
     'description'   => 'terms',
     'public'        => true,
     'menu_position' => 5,
	 'rewrite' 		 => array( 'slug' => 'terms', 'with_front' => false ),
     'supports'      => array( 'title', 'editor', 'thumbnail'),
     'has_archive'   => true,
   );
   register_post_type( 'terms', $args );
   flush_rewrite_rules(false);
}
/* category for terms */
function my_taxonomies_terms() {
   $labels = array(
     'name'              => _x( 'Terms category', 'taxonomy general name' ),
     'singular_name'     => _x( 'Terms category', 'taxonomy singular name' ),
     'search_items'      => __( 'Search' ),
     'all_items'         => __( 'All categories' ),
     'parent_item'       => __( 'Parent category' ),
     'parent_item_colon' => __( 'Parent category' ),
     'edit_item'         => __( 'Edit category' ), 
     'update_item'       => __( 'Update category' ),
     'add_new_item'      => __( 'Add category' ),
     'new_item_name'     => __( 'New category' ),
     'menu_name'         => __( 'Terms category' ),
   );
   $args = array(
     'labels' => $labels,
     'hierarchical' => true,
   );
   register_taxonomy( 'terms_category', 'terms', $args );
}
 add_action( 'init', 'my_taxonomies_terms', 0 );
  /*====================== Post Type legalterms =======================*/
add_action( 'init', 'my_custom_post_legalterms' );
function my_custom_post_legalterms() {
   $labels = array(
     'name'               => _x( 'Legal terms', 'post type general name' ),
     'singular_name'      => _x( 'Legal terms', 'post type singular name' ),
     'add_new'            => _x( 'Add Term', 'legalterms' ),
     'add_new_item'       => __( 'Add Term' ),
     'edit_item'          => __( 'Edit' ),
     'new_item'           => __( 'New Term' ),
     'all_items'          => __( 'All legal terms' ),
     'view_item'          => __( 'View' ),
     'search_items'       => __( 'Search' ),
     'not_found'          => __( 'Not found' ),
     'not_found_in_trash' => __( 'Not found' ), 
     'parent_item_colon'  => '',
     'menu_name'          => 'Legal terms'
   );
   $args = array(
     'labels'        => $labels,
     'description'   => 'legalterms',
     'public'        => true,
     'menu_position' => 5,
	 'rewrite' 		 => array( 'slug' => 'legalterms', 'with_front' => false ),
     'supports'      => array( 'title', 'editor', 'thumbnail'),
     'has_archive'   => true,
   );
   register_post_type( 'legalterms', $args );
   flush_rewrite_rules(false);
}
/* category for legalterms */
function my_taxonomies_legalterms() {
   $labels = array(
     'name'              => _x( 'Legal terms category', 'taxonomy general name' ),
     'singular_name'     => _x( 'Legal terms category', 'taxonomy singular name' ),
     'search_items'      => __( 'Search' ),
     'all_items'         => __( 'All categories' ),
     'parent_item'       => __( 'Parent category' ),
     'parent_item_colon' => __( 'Parent category' ),
     'edit_item'         => __( 'Edit category' ), 
     'update_item'       => __( 'Update category' ),
     'add_new_item'      => __( 'Add category' ),
     'new_item_name'     => __( 'New category' ),
     'menu_name'         => __( 'Legal terms category' ),
   );
   $args = array(
     'labels' => $labels,
     'hierarchical' => true,
   );
   register_taxonomy( 'legalterms_category', 'legalterms', $args );
}
 add_action( 'init', 'my_taxonomies_legalterms', 0 );
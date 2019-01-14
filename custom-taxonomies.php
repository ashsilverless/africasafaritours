<?php
/*
// ========= Camp Custom Taxonomies (where, what, when) ============
*/	
// ======Locations
add_action( 'init', 'location_cpt_taxonomy', 0 );
function location_cpt_taxonomy() {
 
  $labels = array(
    'name' => _x( 'Location', 'taxonomy general name' ),
    'singular_name' => _x( 'Location', 'taxonomy singular name' ),
    'search_items' =>  __( 'Search Locations' ),
    'all_items' => __( 'All Locations' ),
    'parent_item' => __( 'Parent Location' ),
    'parent_item_colon' => __( 'Parent Location:' ),
    'edit_item' => __( 'Edit Location' ), 
    'update_item' => __( 'Update Location' ),
    'add_new_item' => __( 'Add New Location' ),
    'new_item_name' => __( 'New Location Name' ),
    'menu_name' => __( 'Locations' ),
  ); 	
 
  register_taxonomy('where',array('camp'), array(
    'hierarchical' => true,
    'labels' => $labels,
    'show_ui' => true,
    'show_admin_column' => true,
    'query_var' => true,
    'rewrite' => array( 'slug' => 'where', 'hierarchical' => true ),
  ));
}

// ======Months
add_action( 'init', 'month_cpt_taxonomy', 0 );
function month_cpt_taxonomy() {
 
  $labels = array(
    'name' => _x( 'Months', 'taxonomy general name' ),
    'singular_name' => _x( 'Month', 'taxonomy singular name' ),
    'search_items' =>  __( 'Search Months' ),
    'all_items' => __( 'All Months' ),
    'parent_item' => __( 'Parent Month' ),
    'parent_item_colon' => __( 'Parent Month:' ),
    'edit_item' => __( 'Edit Month' ), 
    'update_item' => __( 'Update Month' ),
    'add_new_item' => __( 'Add New Month' ),
    'new_item_name' => __( 'New Month Name' ),
    'menu_name' => __( 'Months' ),
  ); 	
 
  register_taxonomy('when',array('camp'), array(
    'hierarchical' => true,
    'labels' => $labels,
    'show_ui' => true,
    'show_admin_column' => true,
    'query_var' => true,
    'rewrite' => array( 'slug' => 'when', 'hierarchical' => true  ),
  ));
}

// ======Types
add_action( 'init', 'type_cpt_taxonomy', 0 );
function type_cpt_taxonomy() {
 
  $labels = array(
    'name' => _x( 'Types', 'taxonomy general name' ),
    'singular_name' => _x( 'Type', 'taxonomy singular name' ),
    'search_items' =>  __( 'Search Types' ),
    'all_items' => __( 'All Types' ),
    'parent_item' => __( 'Parent Type' ),
    'parent_item_colon' => __( 'Parent Type:' ),
    'edit_item' => __( 'Edit Type' ), 
    'update_item' => __( 'Update Type' ),
    'add_new_item' => __( 'Add New Type' ),
    'new_item_name' => __( 'New Type Name' ),
    'menu_name' => __( 'Types' ),
  ); 	
 
  register_taxonomy('what',array('camp'), array(
    'hierarchical' => true,
    'labels' => $labels,
    'show_ui' => true,
    'show_admin_column' => true,
    'query_var' => true,
    'rewrite' => array( 'slug' => 'what', 'hierarchical' => true  ),
  ));
  }
  
  /*
// ========= Itinerary Custom Taxonomies (where, type) ============
*/	
// ======Itinerary Locations
add_action( 'init', 'itin_location_cpt_taxonomy', 0 );
function itin_location_cpt_taxonomy() {
 
  $labels = array(
    'name' => _x( 'Itinerary Location', 'taxonomy general name' ),
    'singular_name' => _x( 'Itinerary Location', 'taxonomy singular name' ),
    'search_items' =>  __( 'Search Itinerary Locations' ),
    'all_items' => __( 'All Itinerary Locations' ),
    'parent_item' => __( 'Itinerary Parent Location' ),
    'parent_item_colon' => __( 'Itinerary Parent Location:' ),
    'edit_item' => __( 'Edit Itinerary Location' ), 
    'update_item' => __( 'Update Itinerary Location' ),
    'add_new_item' => __( 'Add New Itinerary Location' ),
    'new_item_name' => __( 'New Itinerary Location Name' ),
    'menu_name' => __( 'Itinerary Locations' ),
  ); 	
 
  register_taxonomy('itinerarywhere',array('itinerary'), array(
    'hierarchical' => true,
    'labels' => $labels,
    'show_ui' => true,
    'show_admin_column' => true,
    'query_var' => true,
    'rewrite' => array( 'slug' => 'itinerarywhere', 'hierarchical' => true ),
  ));
}
  
// ======Itinerary Types
add_action( 'init', 'itin_type_cpt_taxonomy', 0 );
function itin_type_cpt_taxonomy() {
 
  $labels = array(
    'name' => _x( 'Itinerary Type', 'taxonomy general name' ),
    'singular_name' => _x( 'Itinerary Type', 'taxonomy singular name' ),
    'search_items' =>  __( 'Search Itinerary Types' ),
    'all_items' => __( 'All Itinerary Types' ),
    'parent_item' => __( 'Itinerary Parent Type' ),
    'parent_item_colon' => __( 'Itinerary Parent Type:' ),
    'edit_item' => __( 'Edit Itinerary Type' ), 
    'update_item' => __( 'Update Itinerary Type' ),
    'add_new_item' => __( 'Add New Itinerary Type' ),
    'new_item_name' => __( 'New Itinerary Type Name' ),
    'menu_name' => __( 'Itinerary Types' ),
  ); 	
 
  register_taxonomy('itinerarytype',array('itinerary'), array(
    'hierarchical' => true,
    'labels' => $labels,
    'show_ui' => true,
    'show_admin_column' => true,
    'query_var' => true,
    'rewrite' => array( 'slug' => 'itinerarytype', 'hierarchical' => true ),
  ));
}
  
  
  
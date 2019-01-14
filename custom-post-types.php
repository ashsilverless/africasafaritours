<?php
/*
// ========= Camp Custom Post Type (camp) ============
*/
 function custom_post_type_camp() {
 //UI labels for Custom Post Type
    $labels = array(
        'name'                => _x( 'Camps', 'Post Type General Name', 'africasafaritours' ),
        'singular_name'       => _x( 'Camp', 'Post Type Singular Name', 'africasafaritours' ),
        'menu_name'           => __( 'Camps', 'africasafaritours' ),
        'parent_item_colon'   => __( 'Parent Camps', 'africasafaritours' ),
        'all_items'           => __( 'All Camps', 'africasafaritours' ),
        'view_item'           => __( 'View Camps', 'africasafaritours' ),
        'add_new_item'        => __( 'Add New Camp', 'africasafaritours' ),
        'add_new'             => __( 'Add Camp', 'africasafaritours' ),
        'edit_item'           => __( 'Edit Camp', 'africasafaritours' ),
        'update_item'         => __( 'Update Camp', 'africasafaritours' ),
        'search_items'        => __( 'Search Camps', 'africasafaritours' ),
        'not_found'           => __( 'Not Found', 'africasafaritours' ),
        'not_found_in_trash'  => __( 'Not found in Trash', 'africasafaritours' ),
    );   
//Options for Custom Post Type  
    $args = array(
        'label'               => __( 'camp', 'africasafaritours' ),
        'description'         => __( 'Camps', 'africasafaritours' ),
        'labels'              => $labels,
        // Features this CPT supports in Post Editor
        'supports'            => array(  'title', 'taxonomies' ),
        // You can associate this CPT with a taxonomy or custom taxonomy. 
        'taxonomies'          => array( 'camp' ),
        /* Hierarchical CPT are like Pages and can have
        * Parent and child items. Non-hierarchical CPT
        * are like Posts.
        */ 
        'hierarchical'        => false,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => true,
        'show_in_admin_bar'   => true,
        'menu_position'       =>110,
        'can_export'          => true,
        'has_archive'         => true,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'capability_type'     => 'page',
    );   
    // Register the Custom Post Type
    register_post_type( 'camp', $args );
}
/* Hook into the 'init' action so that the function
* Containing our post type registration is not 
* unnecessarily executed. 
*/ 
add_action( 'init', 'custom_post_type_camp', 0 );

/*
// ========= Itinerary Custom Post Type (itinerary) ============
*/
 function custom_post_type_itinerary() {
 //UI labels for Custom Post Type
    $labels = array(
        'name'                => _x( 'Itineraries', 'Post Type General Name', 'africasafaritours' ),
        'singular_name'       => _x( 'Itinerary', 'Post Type Singular Name', 'africasafaritours' ),
        'menu_name'           => __( 'Itineraries', 'africasafaritours' ),
        'parent_item_colon'   => __( 'Itinerary', 'africasafaritours' ),
        'all_items'           => __( 'All Itineraries', 'africasafaritours' ),
        'view_item'           => __( 'View Itineraries', 'africasafaritours' ),
        'add_new_item'        => __( 'Add New Itinerary', 'africasafaritours' ),
        'add_new'             => __( 'Add Itinerary', 'africasafaritours' ),
        'edit_item'           => __( 'Edit Itinerary', 'africasafaritours' ),
        'update_item'         => __( 'Update Itinerary', 'africasafaritours' ),
        'search_items'        => __( 'Search Itineraries', 'africasafaritours' ),
        'not_found'           => __( 'Not Found', 'africasafaritours' ),
        'not_found_in_trash'  => __( 'Not found in Trash', 'africasafaritours' ),
    );   
//Options for Custom Post Type  
    $args = array(
        'label'               => __( 'itinerary', 'africasafaritours' ),
        'description'         => __( 'Itinerary', 'africasafaritours' ),
        'labels'              => $labels,
        // Features this CPT supports in Post Editor
        'supports'            => array(  'title', 'taxonomies' ),
        // You can associate this CPT with a taxonomy or custom taxonomy. 
        'taxonomies'          => array( 'itinerary', 'itinerarywhere' ),
        /* Hierarchical CPT are like Pages and can have
        * Parent and child items. Non-hierarchical CPT
        * are like Posts.
        */ 
        'hierarchical'        => false,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => true,
        'show_in_admin_bar'   => true,
        'menu_position'       =>110,
        'can_export'          => true,
        'has_archive'         => true,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'capability_type'     => 'page',
    );   
    // Register the Custom Post Type
    register_post_type( 'itinerary', $args );
}
/* Hook into the 'init' action so that the function
* Containing our post type registration is not 
* unnecessarily executed. 
*/ 
add_action( 'init', 'custom_post_type_itinerary', 0 );

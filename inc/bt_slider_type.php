<?php
// post type register
function book_setup_post_type() {
    $args = array(
        'public'    => true,
        'label'     => __( 'Boot Slider', 'bt-slider' ),
        'menu_icon' => 'dashicons-format-gallery',
        'supports'  => array( 'title', 'editor', 'thumbnail', ),
        'has_archive'   => true,
        'menu_position' => 4,
    );
    register_post_type( 'bt-slider', $args );
    
    register_taxonomy( 'bt-cat', 'bt-slider', array(
    'label'        => __( 'Categories', 'bt-slider' ),
    'rewrite'      => array( 'slug' => 'bt-cat' ),
    'hierarchical' => true,
    'show_ui'      => true,
    'query_var'    => true,
    'show_admin_column' => true,
    ));
}
add_action( 'init', 'book_setup_post_type' );

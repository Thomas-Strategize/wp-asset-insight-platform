<?php
// Theme functions.php file

// Enqueue styles and scripts
function wp_asset_insight_enqueue_styles() {
    wp_enqueue_style('style', get_stylesheet_uri());
}
add_action('wp_enqueue_scripts', 'wp_asset_insight_enqueue_styles');

// Register custom post types
function wp_asset_insight_register_post_types() {
    // Register Articles post type
    register_post_type('article', [
        'labels' => [
            'name' => 'Articles',
            'singular_name' => 'Article',
        ],
        'public' => true,
        'supports' => ['title', 'editor', 'thumbnail'],
        'has_archive' => true,
        'show_in_rest' => true, // Enable Gutenberg editor
    ]);
}
add_action('init', 'wp_asset_insight_register_post_types');

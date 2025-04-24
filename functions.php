<?php
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

// Register custom taxonomies
function wp_asset_insight_register_taxonomies() {
    // Register Topic taxonomy
    register_taxonomy('topic', 'article', [
        'hierarchical' => true,
        'labels' => [
            'name' => 'Topics',
            'singular_name' => 'Topic',
        ],
        'show_ui' => true,
        'show_in_rest' => true, // Enable in Gutenberg
    ]);
}
add_action('init', 'wp_asset_insight_register_taxonomies');

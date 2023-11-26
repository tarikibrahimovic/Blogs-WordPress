<?php

function menus(){
    $locations = array(
        'primary' => "Desktop Primary Left Sidebar",
        'footer' => "Footer Menu Items"
    );

    register_nav_menus($locations);
}

add_action('init', 'menus');

function theme_support() {
    add_theme_support('title-tag');
    add_theme_support('custom-logo');
    add_theme_support('post-thumbnails');
}

add_action('after_setup_theme', 'theme_support');

function wordpressProject_register_styles() {
    wp_enqueue_style('wordpress-bootstrap', 'https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css', array(), '4.4.1', 'all');
    wp_enqueue_style('wordpress-fontawesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css', array(), '5.13.0', 'all');
    wp_enqueue_style('wordpress-style', get_template_directory_uri() . "/style.css", array('wordpress-bootstrap'), '1.0', 'all');
}
add_action('wp_enqueue_scripts', 'wordpressProject_register_styles');

function wordpressProject_register_scripts() {
    wp_enqueue_script('wordpress-jquery', 'https://code.jquery.com/jquery-3.4.1.slim.min.js', array('jquery'), '3.4.1', true);
    wp_enqueue_script('wordpress-popper',  "https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js", array(), '1.16.', true);
    wp_enqueue_script('wordpress-bootstrap',  "https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js", array(), '4.4.1', true);
    wp_enqueue_script('wordpress-main',  get_template_directory_uri()."/assets/js/main.js", array(), '1.0', true);
}
add_action('wp_enqueue_scripts', 'wordpressProject_register_scripts');

function widget_areas(){
    register_sidebar(
        array(
            'before_title' => '',
            'after_title' => '',
            'before_widget' => '<ul class="social-list list-inline py-3 mx-auto">',
            'after_widget' => '</ul>',
            'name' => 'Sidebar Area',
            'id' => 'sidebar-1',
            'description' => 'Sidebar Widget Area'
        )
    );

    register_sidebar(
        array(
            'before_title' => '',
            'after_title' => '',
            'before_widget' => '<ul class="">',
            'after_widget' => '</ul>',
            'name' => 'Footer Area',
            'id' => 'footer-1',
            'description' => 'Footer Widget Area'
        )
    );
}

add_action('widgets_init', 'widget_areas');

function theme_name_scripts() {
    wp_enqueue_style( 'flexslider', get_template_directory_uri() . '/flexslider.css' );
    wp_enqueue_script( 'jquery' );
    wp_enqueue_script( 'flexsliderf', get_template_directory_uri() . '/jquery.flexslider.js', array('jquery'), '', true );
}
add_action( 'wp_enqueue_scripts', 'theme_name_scripts' );

function custom_field_shortcode($atts) {
    global $post;
    $name = $atts['name'];
    if (empty($name)) return '';
    return get_post_meta($post->ID, $name, true);
}
add_shortcode('custom_field', 'custom_field_shortcode');


?>


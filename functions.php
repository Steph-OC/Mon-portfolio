<?php

function theme_enqueue_styles()
{
    wp_enqueue_style('parent-style', get_template_directory_uri() . '/style.css');
    if (is_singular('projet')) {
        wp_enqueue_style('plyr-css', 'https://cdn.plyr.io/3.6.8/plyr.css');
        wp_enqueue_script('plyr-js', 'https://cdn.plyr.io/3.6.8/plyr.js', array(), false, true);
        wp_enqueue_script('main-js', get_stylesheet_directory_uri() . '/assets/js/main.js', array(), '1.0.0', true);
    }
    wp_enqueue_script('font-awesome', 'https://kit.fontawesome.com/277d797764.js', array(), '1.0.0', true);
}

add_action('wp_enqueue_scripts', 'theme_enqueue_styles');

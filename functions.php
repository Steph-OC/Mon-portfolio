<?php

function theme_enqueue_styles()
{
    wp_enqueue_style('parent-style', get_template_directory_uri() . '/style.css');
    wp_enqueue_style(
        'theme-style',
        get_stylesheet_directory_uri() . '/assets/css/style.css',
        array(),
        filemtime(get_stylesheet_directory() . '/assets/css/style.css')
    );
}

add_action('wp_enqueue_scripts', 'theme_enqueue_styles');
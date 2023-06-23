<?php

function blog_support(){
    add_theme_support('post-thumbnails');
    add_theme_support('menus');
    // add_theme-support('title');
    add_image_size('banner-sm', 220, 150, true);

    register_nav_menus(
        array(
            'header_menu' => __('Header Menu', 'text_domain'),
            'footer_menu' => __('Footer Menu', 'text_domain'),

        )
    );
}
add_action('after_setup_theme', 'blog_support');
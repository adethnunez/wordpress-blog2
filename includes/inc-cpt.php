<?php

function blog_custom_post(){
    $testimonial_label = array(
        'name'          => __('Testimonials', 'textdomain'),
        'singular_name' => __('Testimonial', 'textdomain'),
        'add_new'       => __('Add Testimonial', 'textdomain'),
        'edit_item'     => __('Edit Testimonial', 'textdomain'),
        'add_new_item'  => __('Add New Testimonial', 'textdomain'),
        'all_items'     => __('Testimonials', 'textdomain'),
    );
    $testimonials_args = array(
        'labels' => $testimonial_label,
        'public' => true,
        'capability_type' => 'post',
        'show_ui' => true,
        'supports' => array('title', 'editor', 'thumbnail', 'custom-fields')
    );

    register_post_type('testimonials', $testimonials_args);

    $member_label = array(
        'name'          => __('members', 'textdomain'),
        'singular_name' => __('members', 'textdomain'),
        'add_new'       => __('Add members', 'textdomain'),
        'edit_item'     => __('Edit members', 'textdomain'),
        'add_new_item'  => __('Add New members', 'textdomain'),
        'all_items'     => __('members', 'textdomain'),
    );
    $members_args = array(
        'labels' => $member_label,
        'public' => true,
        'capability_type' => 'post',
        'show_ui' => true,
        'supports' => array('title', 'editor', 'thumbnail', 'custom-fields')
    );

    register_post_type('members', $members_args);



}

add_action('init', 'blog_custom_post');




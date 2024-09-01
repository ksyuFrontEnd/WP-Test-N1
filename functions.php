<?php

/* Enqueue scripts and styles */
add_action('wp_enqueue_scripts', 'test_n1_scripts');

function test_n1_scripts() {
    wp_enqueue_style('theme-style' , get_stylesheet_uri ());
    wp_enqueue_style('test_n1-style', get_template_directory_uri() . '/src/styles/main.css', array('theme-style'));
    wp_enqueue_script('test_n1-scripts', get_template_directory_uri() . '/src/scripts/main.js', array(), false, true);
    wp_enqueue_style('swiper-style', "https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css", array('theme-style'));
    wp_enqueue_script('swiper-scripts', 'https://cdn.jsdelivr.net/npm/swiper@10.0.0/swiper-bundle.min.js', array(), false, true);

    // Enqueue scripts and styles of plugin for Swiper
    wp_enqueue_style('swiper-css', plugins_url('/custom-slots/assets/css/swiper.css', __FILE__));
    wp_enqueue_script('swiper-js', plugins_url('/custom-slots/assets/js/swiper.js', __FILE__), array('jquery'), null, true);

    if (is_page_template('templates/mystery-drops.php')) {
        wp_enqueue_style('mystery-drops', get_template_directory_uri() . '/src/styles/template-styles/mystery-drops.css', array('theme-style'));
    }


    // Initialization of Swiper
    wp_add_inline_script('swiper-js', '
        jQuery(document).ready(function($) {
            var swiper = new Swiper(".swiper-container", {
                slidesPerView: 2,
                spaceBetween: 16,
                navigation: {
                    nextEl: ".next-slot",
                    prevEl: ".prev-slot",
                },
                breakpoints: {
                    481: {
                        slidesPerView: 3,
                        spaceBetween: 16,
                    },
                    769: {
                        slidesPerView: 5,
                        spaceBetween: 16,
                    },
                    1201: {
                        slidesPerView: 6,
                        spaceBetween: 16,
                    },
                    1367: {
                        slidesPerView: 7,
                        spaceBetween: 16,
                    },
                },
            });
        });
    ');
}

/* Add fonts */
function add_google_fonts()
{
    wp_enqueue_style('google_web_fonts', 'https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap', [], null);
    wp_enqueue_style('google_web_fonts', 'https://fonts.googleapis.com/css2?family=Oswald:wght@200..700&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap', [], null);
}

add_action('wp_enqueue_scripts', 'add_google_fonts');

/* Register menus */
function test_n1_menus()
{
    $locations = array(
        'header' => __('Header Menu', 'test_n1'),
        'footer' => __('Footer Menu', 'test_n1'),
    );

    register_nav_menus($locations);
}

add_action('init', 'test_n1_menus');

/** ACF add options page */
if (function_exists('acf_add_options_page')) {

    acf_add_options_page(array(
        'page_title' => 'Theme General Settings',
        'menu_title' => 'Theme Settings',
        'menu_slug' => 'theme-general-settings',
        'capability' => 'edit_posts',
        'redirect' => false
    ));

    acf_add_options_sub_page(array(
        'page_title' => 'Theme Header Settings',
        'menu_title' => 'Header',
        'parent_slug' => 'theme-general-settings',
    ));

    acf_add_options_sub_page(array(
        'page_title' => 'Theme Footer Settings',
        'menu_title' => 'Footer',
        'parent_slug' => 'theme-general-settings',
    ));
}

?>
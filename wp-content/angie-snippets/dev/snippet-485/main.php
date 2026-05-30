<?php
if ( ! defined( 'ABSPATH' ) ) { exit; }
const CASE_STUDY_CAROUSEL_ASSETS_VERSION_630c0858 = '2.0.0';

function register_case_study_carousel_widget_630c0858( $widgets_manager ) {
    require_once __DIR__ . '/widget-case-study-carousel.php';
    $widgets_manager->register( new \AngieSnippets\Case_Study_Carousel_630c0858() );
}
add_action( 'elementor/widgets/register', 'register_case_study_carousel_widget_630c0858' );

function register_case_study_carousel_assets_630c0858() {
    wp_register_style( 'swiper-bundle', 'https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css', [], '10.0.0' );
    wp_register_script( 'swiper-bundle', 'https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js', [], '10.0.0', true );
    wp_register_script( 'case-study-carousel-script-630c0858', angie_cs_get_snippet_asset_url( __FILE__, 'script.js' ), [ 'elementor-frontend', 'swiper-bundle' ], CASE_STUDY_CAROUSEL_ASSETS_VERSION_630c0858, true );
    wp_register_style( 'case-study-carousel-style-630c0858', angie_cs_get_snippet_asset_url( __FILE__, 'style.css' ), [ 'swiper-bundle' ], CASE_STUDY_CAROUSEL_ASSETS_VERSION_630c0858 );
}
add_action( 'wp_enqueue_scripts', 'register_case_study_carousel_assets_630c0858' );
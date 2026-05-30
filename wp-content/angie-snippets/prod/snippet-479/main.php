<?php

if ( ! defined( 'ABSPATH' ) ) { exit; }

const STATS_CAROUSEL_ASSETS_VERSION_4d7dfff6 = '1.0.0';

function register_stats_carousel_widget_4d7dfff6( $widgets_manager ) {
    require_once __DIR__ . '/widget-stats-carousel.php';
    $widgets_manager->register( new \AngieSnippets\Stats_Carousel_4d7dfff6() );
}
add_action( 'elementor/widgets/register', 'register_stats_carousel_widget_4d7dfff6' );

function register_stats_carousel_assets_4d7dfff6() {
    wp_register_style( 'swiper-bundle', 'https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css', [], '10.0.0' );
    wp_register_script( 'swiper-bundle', 'https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js', [], '10.0.0', true );

	wp_register_script( 'stats-carousel-script-4d7dfff6', angie_cs_get_snippet_asset_url( __FILE__, 'script.js' ), [ 'elementor-frontend', 'swiper-bundle' ], STATS_CAROUSEL_ASSETS_VERSION_4d7dfff6, true );
	wp_register_style( 'stats-carousel-style-4d7dfff6', angie_cs_get_snippet_asset_url( __FILE__, 'style.css' ), [ 'swiper-bundle' ], STATS_CAROUSEL_ASSETS_VERSION_4d7dfff6 );
}
add_action( 'wp_enqueue_scripts', 'register_stats_carousel_assets_4d7dfff6' );

<?php
/**
 * Custom Cursor System
 * Namespace: AngieSnippets\CustomCursorSystem_b7142d1a
 */

namespace AngieSnippets\CustomCursorSystem_b7142d1a;

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

define( 'CUSTOM_CURSOR_SYSTEM_ASSETS_VERSION_b7142d1a', '1.1.0' );

add_action( 'wp_enqueue_scripts', __NAMESPACE__ . '\enqueue_assets_b7142d1a' );

function enqueue_assets_b7142d1a() {
    wp_enqueue_style(
        'custom-cursor-system-b7142d1a',
        angie_cs_get_snippet_asset_url( __FILE__, 'style.css' ),
        [],
        CUSTOM_CURSOR_SYSTEM_ASSETS_VERSION_b7142d1a
    );

    wp_enqueue_script(
        'custom-cursor-system-b7142d1a',
        angie_cs_get_snippet_asset_url( __FILE__, 'script.js' ),
        [],
        CUSTOM_CURSOR_SYSTEM_ASSETS_VERSION_b7142d1a,
        true
    );

    wp_localize_script( 'custom-cursor-system-b7142d1a', 'customCursorConfig_b7142d1a', [
        'cursorColor'     => '#111111',
        'hoverLabelColor' => '#111111',
    ] );
}

add_action( 'wp_footer', __NAMESPACE__ . '\render_cursor_html_b7142d1a' );

function render_cursor_html_b7142d1a() {
    ?>
    <div class="angie-cursor-b7142d1a" aria-hidden="true">
      <?xml version="1.0" encoding="utf-8"?><!-- Uploaded to: SVG Repo, www.svgrepo.com, Generator: SVG Repo Mixer Tools -->
<svg width="18px" height="18px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M7.92098 2.29951C6.93571 1.5331 5.5 2.23523 5.5 3.48349V20.4923C5.5 21.9145 7.2945 22.5382 8.17661 21.4226L12.3676 16.1224C12.6806 15.7267 13.1574 15.4958 13.6619 15.4958H20.5143C21.9425 15.4958 22.5626 13.6887 21.4353 12.8119L7.92098 2.29951Z" fill="#212121"/>
</svg>
        <span class="angie-cursor-label-b7142d1a"></span>
    </div>
    <?php
}

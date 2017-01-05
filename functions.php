<?php

// Exit if accessed directly

if ( !defined( 'ABSPATH' ) ) exit;



// BEGIN ENQUEUE PARENT ACTION
// AUTO GENERATED - Do not modify or remove comment markers above or below:

        
if ( !function_exists( 'chld_thm_cfg_parent_css' ) ):
    function chld_thm_cfg_parent_css() {
        wp_enqueue_style( 'chld_thm_cfg_ext1', 'http://fonts.googleapis.com/earlyaccess/opensanshebrew.css' );
    }
endif;
add_action( 'wp_enqueue_scripts', 'chld_thm_cfg_parent_css' );



function my_child_theme_setup() {

    load_child_theme_textdomain( 'lynxjet', get_stylesheet_directory() . '/languages' );

}

add_action( 'after_setup_theme', 'my_child_theme_setup' );

// END ENQUEUE PARENT ACTION

/**

 * This snippet will force the setting "auto_adjust_ids" to be enabled (in WPML)

 */

function wpmlsupp_2548_force_auto_enable_adjust_id() {

    $auto_adjust_id_enabled = apply_filters( 'wpml_get_setting', null, 'auto_adjust_ids' );



    if ( !is_null( $auto_adjust_id_enabled ) && (bool) $auto_adjust_id_enabled !== true ) {

        do_action( 'wpml_set_setting', 'auto_adjust_ids', true, true );

    }

}

add_action( 'shutdown', 'wpmlsupp_2548_force_auto_enable_adjust_id' );

// POST THUMBNAILS

add_theme_support( 'post-thumbnails' );
add_image_size( 'strip', 1600, 385, true ); // Hard Crop Mode

/**
 * Pierre @ WPML - 19/02/2016
 */
function compsupp_1208_fix_hreflang_meta_links() {
    global $sitepress;
  
    if ( !is_object( $sitepress ) ) {
        return;
    }
  
    $seo_settings = $sitepress->get_setting( 'seo' );
  
    if ( isset( $seo_settings['head_langs'] ) && $seo_settings['head_langs'] ) {
        remove_action( 'wp_head', array( $sitepress, 'head_langs' ), 1 );
        add_action( 'wp_head', array( $sitepress, 'head_langs' ) );
    }
}
add_action( 'after_setup_theme', 'compsupp_1208_fix_hreflang_meta_links' );
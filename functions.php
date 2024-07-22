<?php

function theme_styles() {
    wp_enqueue_style('bootstrap-style', get_theme_file_uri('assets/css/bootstrap.min.css'));   // my additional customisations to bootstrap 4.6x
    wp_enqueue_style('style', get_theme_file_uri('assets/css/style.css'));
}

add_action( 'wp_enqueue_scripts', 'theme_styles' );

// end of file

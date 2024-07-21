<?php

get_header();

if ( have_posts() ) :
    while ( have_posts() ) : the_post();
        // Display post content
    endwhile;
endif;

get_sidebar();

get_footer();

// end of file

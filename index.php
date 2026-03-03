<?php
    get_header();
?>

<body class="d-flex flex-column h-100">
    <?php
        // main menu
        include(get_template_directory() . '/includes/navigation.php');
    ?>

    <!-- Begin page content -->
    <main role="main" class="flex-shrink-0">
        <div class="container pt-3">
            <div class="row">
                <div class="col-md-3 p-3 ps-0 d-none d-md-block">
                    <div class="sticky-top sidebar p-3">
                        <?php get_sidebar();?>
                    </div>
                </div>
                <div class="col-md-9">
                    <?php
                    if ( have_posts() ) :
                        while ( have_posts() ) : the_post();
                            // Display post content
                            ?>
                                <div class="row entry" id="post-<?php the_ID(); ?>">
                                    <div class="col-auto entry-meta">
                                        <?=wp_jtiong_get_post_date()?> &bull; <?=wp_jtiong_get_post_word_count()?> &bull; <?=get_the_category_list(', ')?>
                                    </div>
                                </div>
                                <div class="row entry-title pt-2">
                                    <div class="col-sm-12">
                                        <h2 class="entry-title p-name">
                                            <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" rel="bookmark"><?php the_title(); ?></a>
                                        </h2>
                                    </div>
                                </div>
                                <div class="entry-body">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <?php
                                            // show excerpt...
                                            if (has_excerpt()) {
                                                the_excerpt();
                                            } else {
                                                // or full post!
                                                the_content();
                                            }
                                            ?>
                                        </div>
                                    </div>
                                    <?php
                                    if (has_excerpt()) {
                                        // only show "read more" link if there's an excerpt to jump from...
                                        ?>
                                        <div class="row">
                                            <div class="col-sm-12 text-end">
                                                <em><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">Read more...</a></em>
                                            </div>
                                        </div>
                                        <?php
                                    }
                                    ?>
                                </div>
                                <div class="row entry-footer">
                                    <div class="col-sm-12">
                                        <hr>
				                        <small class="text-muted"><i class="bi-tags"></i> <span style="text-transform: lowercase; "><?=get_the_tag_list('', ', ')?></span></small>
                                        <hr>
                                    </div>
                                </div>
                            <?php
                        endwhile;
                    endif;

                    wp_jtiong_content_nav( 'nav-below' );
                    ?>
                </div>
            </div>
        </div>
    </main>

<?php get_footer(); ?>

<?php
    get_header();
?>

<body class="d-flex flex-column h-100">
    <?php
        // main menu
        include('includes/menu.php');
    ?>

    <!-- Begin page content -->
    <main role="main" class="flex-shrink-0 mainContent">
        <div class="container">
            <div class="row">
                <div class="col-sm-3">
                    <div class="sticky-top">
                        <?php get_sidebar();?>
                    </div>
                </div>
                <div class="col-sm-9">
                    <?php
                    if ( have_posts() ) :
                        while ( have_posts() ) : the_post();
                            // Display post content
                            ?>
                                <div class="row entry" id="post-<?php the_ID(); ?>">
                                    <div class="col-sm-8">
                                        <?php wp_jtiong_posted_author(); ?> posted this in: <?=get_the_category_list(', ')?>
                                    </div>
                                    <div class="col-sm-4 text-right">
                                        <?=wp_jtiong_get_post_date()?> &bull; <?=wp_jtiong_get_post_word_count()?>
                                    </div>
                                </div>
                                <div class="row entry-title">
                                    <div class="col-sm-12">
                                        <br>
                                        <h2 class="entry-title p-name">
                                            <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" rel="bookmark"><?php the_title(); ?></a>
                                        </h2>
                                        <br>
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
                                            <div class="col-sm-12 text-right">
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
				                        <small class="text-muted">Tagged: <span style="text-transform: lowercase; "><?=get_the_tag_list('', ', ')?></span></small>
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

<?php
    get_header();
?>

<body class="d-flex flex-column h-100">
    <header>
        <nav class="navbar navbar-expand-lg fixed-top navbar-dark bg-danger">
            <div class="container">
                <a class="navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>">
                    <img src="/public/img/logo.svg" alt="" style="height: 32px; padding-right: 16px; ">
                    J T I O N G . B L O G
                </a>
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a href="https://jtiong.dev" class="nav-link">Commits</a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>

    <!-- Begin page content -->
    <main role="main" class="flex-shrink-0 mainContent">
        <div class="container">
            <div class="row">
                <div class="col-sm-3">
                    <?php get_sidebar();?>
                </div>
                <div class="col-sm-9">
                    <?php
                    if ( have_posts() ) :
                        while ( have_posts() ) : the_post();
                            // Display post content
                            ?>
                                <div class="row entry" id="post-<?php the_ID(); ?>">
                                    <div class="col-sm-6">
                                        //
                                    </div>
                                    <div class="col-sm-6 text-right">
                                        //
                                    </div>
                                </div>
                                <div class="row entry-title">
                                    <div class="col-sm-12">
                                        <h3 class="entry-title p-name">
                                            <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" rel="bookmark"><?php the_title(); ?></a>
                                        </h3>
                                    </div>
                                </div>
                                <div class="row entry-content">
                                    <div class="col-sm-12">
                                        <?php the_excerpt(); ?>
                                    </div>
                                </div>
                                <div class="row entry-footer">
                                    <div class="col-md-6"></div>
                                    <div class="col-md-6 text-right"></div>
                                </div>
                            <?php
                        endwhile;
                    endif;
                    ?>
                </div>
            </div>
        </div>
    </main>

<?php get_footer(); ?>

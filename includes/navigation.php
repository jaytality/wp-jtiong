<!-- TOP NAVBAR -->
<nav id="topNav" class="navbar navbar-expand-sm navbar-dark bg-black border-bottom border-body p-0 mb-0 fixed-top" data-bs-theme="dark">
    <div class="container">
        <small>
            <ul class="navbar-nav ms-0">
                <?php
                    // if they're an administrator
                    if (in_array('administrator', (array)$current_user->roles, true)) {
                        ?>
                        <li class="nav-item">
                            <a href="<?= admin_url() ?>" class="nav-link">WP Admin</a>
                        </li>
                        <?php
                    }
                ?>
            </ul>
        </small>

        <span class="navbar-text ms-auto">
            <small>
            <?php
                // if user is logged in
                if (is_user_logged_in()) {
                    ?>
                    Hello <?= esc_html($current_user->display_name) ?> 
                    ( <a href="<?= wp_logout_url("https://jtiong.com") ?>">Sign Out</a> )
                    <?php
                } else {
                    ?>
                    <a href="<?=wp_login_url("https://jtiong.com") ?>">Sign In</a>
                    <?php
                }
            ?>
            </small>
        </span>
    </div>
</nav>

<!-- MAIN NAVBAR -->
<nav id="mainNav" class="navbar navbar-expand-sm navbar-dark bg-jtSnax sticky-top border-bottom border-body d-none d-sm-block" data-bs-theme="dark">
    <div class="container">
        <a class="navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>">
            <img src="<?php echo get_bloginfo('template_url') ?>/assets/img/logo.svg" alt="" style="height: 32px; ">
        </a>

        <!-- desktop menu -->
        <div class="collapse navbar-collapse">
            <?php
                include(get_template_directory() . '/includes/menu.php');
            ?>
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a href="https://www.instagram.com/jaytality.au/" class="nav-link"><i class="bi bi-instagram"></i></a>
                </li>
                <li class="nav-item">
                    <a href="https://www.github.com/jaytality/" class="nav-link"><i class="bi bi-github"></i></a>
                </li>
                <li class="nav-item">
                    <a href="https://steamcommunity.com/id/jaytality/" class="nav-link"><i class="bi bi-steam"></i></a>
                </li>
            </ul>
        </div>
        <!-- end of desktop menu -->
    </div>
</nav>

<!-- mobile navigation -->
<nav class="navbar navbar-expand-lg bg-jtSnax sticky-top border-bottom border-body d-block d-sm-none" data-bs-theme="dark">
    <div class="container">
        <a class="navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>">
            <img src="<?php echo get_bloginfo('template_url') ?>/assets/img/logo.svg" alt="" style="height: 32px; ">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle Navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
            <!-- mobile header -->
            <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Navigation</h5>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <?php
                    include('menu.php');
                ?>
                <ul class="navbar-nav ms-auto">
                    <li>
                        <hr>
                    </li>
                    <li class="nav-item">
                        <div class="row">
                            <div class="col text-center">
                                <a href="https://github.com/jaytality" class="nav-link"><i class="bi bi-github"></i></a>
                            </div>
                            <div class="col text-center">
                                <a href="https://www.instagram.com/jaytality.au/" class="nav-link"><i class="bi bi-instagram"></i></a>
                            </div>
                            <div class="col text-center">
                                <a href="https://steamcommunity.com/id/jaytality/" class="nav-link"><i class="bi bi-steam"></i></a>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>


<?php
/*
<header class="fixed-top">
    <!-- common bar -->
     <nav class="navbar fixed-top navbar-expand-sm bg-black border-bottom border-body p-0" data-bs-theme="dark">
        <div class="container">
            <span class="navbar-text ms-auto">
                <small>
                <?php
                    // if user is logged in
                    if (is_user_logged_in()) {
                        ?>
                        Hello <?= esc_html($current_user->display_name) ?> 
                        ( <a href="<?= wp_logout_url("https://jtiong.com") ?>">Sign Out</a> )
                        <?php
                    } else {
                        ?>
                        <a href="<?=wp_login_url("https://jtiong.com") ?>">Sign In</a>
                        <?php
                    }
                ?>
                </small>
            </span>
        </div>
     </nav>

    <!-- desktop navigation -->
    <nav class="navbar sticky-top navbar-expand-sm bg-jtSnax border-bottom border-body d-none d-sm-block" data-bs-theme="dark">
        <div class="container">
            <a class="navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>">
                <img src="<?php echo get_bloginfo('template_url') ?>/assets/img/logo.svg" alt="" style="height: 32px; ">
            </a>
 
            <!-- desktop menu -->
            <div class="collapse navbar-collapse">
                <?php
                    include('menu.php');
                ?>
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a href="https://www.instagram.com/jaytality.au/" class="nav-link"><i class="bi bi-instagram"></i></a>
                    </li>
                    <li class="nav-item">
                        <a href="https://www.github.com/jaytality/" class="nav-link"><i class="bi bi-github"></i></a>
                    </li>
                    <li class="nav-item">
                        <a href="https://steamcommunity.com/id/jaytality/" class="nav-link"><i class="bi bi-steam"></i></a>
                    </li>
                </ul>
            </div>
            <!-- end of desktop menu -->
        </div>
    </nav>
    <!-- /desktop navigation -->

    <!-- mobile navigation -->
    <nav class="navbar navbar-expand-lg bg-jtSnax border-bottom border-body d-block d-sm-none" data-bs-theme="dark">
        <div class="container">
            <a class="navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>">
                <img src="<?php echo get_bloginfo('template_url') ?>/assets/img/logo.svg" alt="" style="height: 32px; ">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle Navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
                <!-- mobile header -->
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Navigation</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <?php
                        include('menu.php');
                    ?>
                    <ul class="navbar-nav ms-auto">
                        <li>
                            <hr>
                        </li>
                        <li class="nav-item">
                            <div class="row">
                                <div class="col text-center">
                                    <a href="https://github.com/jaytality" class="nav-link"><i class="bi bi-github"></i></a>
                                </div>
                                <div class="col text-center">
                                    <a href="https://www.instagram.com/jaytality.au/" class="nav-link"><i class="bi bi-instagram"></i></a>
                                </div>
                                <div class="col text-center">
                                    <a href="https://steamcommunity.com/id/jaytality/" class="nav-link"><i class="bi bi-steam"></i></a>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
</header>
*/
?>
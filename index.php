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

        <div class="container-fluid dropdown-content bg-secondary" style="display: none; position: absolute; z-index: 1; padding: 1.5rem; ">
            <?php
            foreach (glob(ROOT . "/app/views/_menus/*.php") as $filename) {
                include $filename;
            }
            ?>
        </div>
    </header>

    <!-- Begin page content -->
    <main role="main" class="flex-shrink-0 mainContent">
        <?php
            // blog posts
            if (have_posts()) {
                while (have_posts()) {
                    the_post();
                }
            }
        ?>
    </main>

    <footer class="footer mt-auto py-3">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <hr>
                    <small class="text-muted">
                        jtiong.dev version 1.05 &bull; Australia\Sydney Time Used &bull; <a href="/changelog">Changelog</a>
                        <br />
                        Copyright &copy; Johnathan Tiong, 2022 &rarr; <?=date('Y')?>. All Rights Reserved.</small>
                    <br />
                    <br />
                </div>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>

    <script src="//cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
    <script src="/public/js/app.js?<?=uniqid()?>"></script>
    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-3106157556180197" crossorigin="anonymous"></script>

</body>

</html>


<?php

get_header();

?>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
<link href="/public/css/bootstrap.min.css" rel="stylesheet">

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
<link rel="stylesheet" href="//cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css">

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,300;0,400;0,600;0,900;1,100;1,400;1,600;1,900&display=swap" rel="stylesheet">

<?php


get_sidebar();

get_footer();

// end of file

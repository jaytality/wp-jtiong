<?php
/**
 * This uses bootstrap's offcanvas to present a mobile version of the "sidebar" from the desktop to find blog
 * entries, search, and different post categories
 */
?>

<!-- BLOG MENU -->
<nav id="blogMenu" class="navbar navbar-expand navbar-dark sticky-top border-bottom border-body p-0 d-block d-md-none" data-bs-theme="dark">
    <div class="container">
        <small>
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a href="#" class="nav-link" data-bs-toggle="offcanvas" data-bs-target="#blogSearch" aria-controls="offcanvasNavbar" aria-label="Toggle Blog Search">
                        <i class="bi-search"></i> Search
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link" data-bs-toggle="offcanvas" data-bs-target="#blogCategories" aria-controls="offcanvasNavbar" aria-label="Toggle Blog Categories">
                        <i class="bi-inboxes"></i> Categories
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link" data-bs-toggle="offcanvas" data-bs-target="#blogTags" aria-controls="offcanvasNavbar" aria-label="Toggle Blog Tags">
                        <i class="bi-tags"></i> Tags
                    </a>
                </li>
            </ul>
        </small>
    </div>
</nav>

<!-- SEARCH THE BLOG -->
<div class="offcanvas offcanvas-start" tabindex="-1" id="blogSearch" aria-labelledby="blogSearchLabel">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="blogSearchLabel">Find a post...</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <div class="row">
            <div class="col-xs-12">
                <h6 class="text-secondary">Search the blog...</h6>
                <?php get_search_form(); ?>
            </div>
        </div>
        
        <div class="row mt-5">
            <div class="col-md-12">
                <h6 class="text-secondary">Past Entries by Month...</h6>

                <div class="form-group">
                    <select name="pastEntries" id="pastEntries" class="form-control" onchange="document.location.href=this.options[this.selectedIndex].value;">
                        <optgroup>
                            <option value="<?php echo esc_url( home_url( '/' ) ); ?>">Latest Entries</option>
                        </optgroup>

                        <optgroup>
                        <?php
                            wp_get_archives([
                                'type'   => 'monthly',
                                'format' => 'option',
                            ]);
                        ?>
                        </optgroup>
                    </select>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- BLOG CATEGORIES -->
<div class="offcanvas offcanvas-start" tabindex="-1" id="blogCategories" aria-labelledby="blogCategoriesLabel">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="blogCategoriesLabel">Blog Categories</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <div class="row">
            <div class="col-xs-12">
                <ul>
                    <?php
                        wp_list_categories([
                            'title_li' => '',
                        ]);
                    ?>
                </ul>
            </div>
        </div>
    </div>
</div>

<!-- BLOG TAGS -->
<div class="offcanvas offcanvas-start" tabindex="-1" id="blogTags" aria-labelledby="blogTagsLabel">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="blogTagsLabel">Blog Tag Cloud</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <div class="row">
            <div class="col-xs-12">
                <?php
                    wp_tag_cloud([
                        'taxonomy'   => 'post_tag', // default
                        'number'     => 36,         // how many tags to show
                        'orderby'    => 'count',    // or 'name'
                        'order'      => 'DESC',     // or 'ASC'
                        'smallest'   => 0.85,       // font size range
                        'largest'    => 1.6,
                        'unit'       => 'rem',
                        'format'     => 'list',     // flat | list | array
                        'separator'  => " \n",
                        'show_count' => false,      // true to show (n)
                    ]);
                ?>
            </div>
        </div>
    </div>
</div>

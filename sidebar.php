<?php

/**
 * wp-jtiong sidebar customizations
 *
 * @package wp-jtiong
 * @since 1.0.0
 */

?>

<!-- search form -->
<div class="row">
    <div class="col-md-12">
        <?php get_search_form(); ?>
    </div>
</div>

<!-- archives dropdown -->
<div class="row">
    <div class="col-md-12">
        <h3><small class="text-muted">Past Entries...</small></h3>

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

<!-- blog categories -->
<div class="row">
    <div class="col-sm-12">
        <h3><small class="text-muted">Categories</small></h3>
        <ul>
            <?php
                wp_list_categories([
                    'title_li' => '',
                ]);
            ?>
        </ul>
    </div>
</div>

<div class="row">
    <div class="col-sm-12">
        <small class="text-muted"><?=wp_count_posts()?> posts since April, 2016!</small>
    </div>
</div>
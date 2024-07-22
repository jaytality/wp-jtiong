<?php

/**
 * wp-jtiong search form HTML customisations
 *
 * @package wp-jtiong
 * @since 1.0.0
 */
?>

<form method="get" id="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>" role="search">
    <div class="form-group">
        <div class="input-group">
            <label for="s" class="screen-reader-text"><?php esc_html_e( 'Search', 'wp-jtiong' ); ?></label>
            <input type="text" class="field form-control" name="s" value="<?php echo esc_attr( get_search_query() ); ?>" id="s" placeholder="<?php esc_attr_e( 'Search &hellip;', 'wp-jtiong' ); ?>" />
            <div class="input-group-append">
                <input type="submit" class="submit btn btn-secondary" name="submit" id="searchsubmit" value="<?php esc_attr_e( 'Search', 'wp-jtiong' ); ?>" />
            </div>
        </div>
    </div>
</form>

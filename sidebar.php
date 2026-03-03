<?php

/**
 * wp-jtiong sidebar customizations
 *
 * @package wp-jtiong
 * @since 1.0.0
 */

function jt_get_category_tree(): array {
    $cats = get_categories([
        'taxonomy'   => 'category',
        'hide_empty' => false,
        'orderby'    => 'name',
        'order'      => 'ASC',
    ]);

    // Index by ID and prepare children arrays
    $by_id = [];
    foreach ($cats as $c) {
        $by_id[$c->term_id] = [
            'term'     => $c,
            'children' => [],
        ];
    }

    // Build tree
    $tree = [];
    foreach ($by_id as $id => &$node) {
        $parent = (int) $node['term']->parent;
        if ($parent && isset($by_id[$parent])) {
            $by_id[$parent]['children'][] = &$node;
        } else {
            $tree[] = &$node;
        }
    }
    unset($node);

    return $tree;
}

function jt_category_branch_contains(array $node, int $term_id): bool {
    if ($node['term']->term_id === $term_id) return true;

    foreach ($node['children'] as $child) {
        if (jt_category_branch_contains($child, $term_id)) return true;
    }
    
    return false;
}

function jt_render_category_accordion(array $nodes, int $current_id, string $accordion_id, int $depth = 0): void {
    foreach ($nodes as $node) {
        $term     = $node['term'];
        $children = $node['children'];
        $has_kids = !empty($children);

        $collapse_id = $accordion_id . '-c-' . $term->term_id;
        $heading_id  = $accordion_id . '-h-' . $term->term_id;

        $is_current  = ($current_id === (int) $term->term_id);
        $in_branch   = $current_id ? jt_category_branch_contains($node, $current_id) : false;

        // Expand the current branch
        $show_class  = $has_kids && $in_branch ? 'show' : '';
        $btn_collapsed = $has_kids && $in_branch ? '' : 'collapsed';
        $aria_expanded = $has_kids && $in_branch ? 'true' : 'false';

        echo '<div class="accordion-item border-0 mb-1">';

        echo '<div class="accordion-header" id="' . esc_attr($heading_id) . '">';
        echo '  <div class="d-flex align-items-stretch">';

        // Category link (always clickable)
        echo '    <a class="flex-grow-1 text-decoration-none px-3 py-2 d-flex align-items-center catLink ' . ($is_current ? 'currentCat' : '') . '"';
        echo '       href="' . esc_url(get_category_link($term->term_id)) . '">';
        echo          esc_html($term->name);
        echo '      <span class="ms-auto badge text-bg-dark">' . (int) $term->count . '</span>';
        echo '    </a>';

        // Separate toggle button (so clicking the link doesn't toggle)
        if ($has_kids) {
            echo '    <button class="btn btn-sm pr-3 ' . esc_attr($btn_collapsed) . '" type="button"';
            echo '      data-bs-toggle="collapse" data-bs-target="#' . esc_attr($collapse_id) . '"';
            echo '      aria-expanded="' . esc_attr($aria_expanded) . '" aria-controls="' . esc_attr($collapse_id) . '">';
            echo '      <span class="visually-hidden">Toggle</span>';
            echo '      <span aria-hidden="true"><i class="bi bi-plus-square"></i></span>';
            echo '    </button>';
        } else {
            // Spacer so rows align
            echo '    <span class="px-3"></span>';
        }

        echo '  </div>';
        echo '</div>';

        if ($has_kids) {
            echo '<div id="' . esc_attr($collapse_id) . '" class="accordion-collapse collapse ' . esc_attr($show_class) . '"';
            echo '  aria-labelledby="' . esc_attr($heading_id) . '" data-bs-parent="#' . esc_attr($accordion_id) . '">';

            echo '  <div class="accordion-body p-0 ps-3">';

            // Recurse
            jt_render_category_accordion($children, $current_id, $accordion_id, $depth + 1);

            echo '  </div>';
            echo '</div>';
        }

        echo '</div>';
    }
}

// Determine current category ID (works on category archives + single posts)
$current_cat_id = 0;
if (is_category()) {
    $current_cat_id = (int) get_queried_object_id();
} elseif (is_single()) {
    $post_cats = get_the_category();
    if (!empty($post_cats)) $current_cat_id = (int) $post_cats[0]->term_id; // pick primary-ish
}

$accordion_id = 'jtCatsAccordion';
?>

<!-- search form -->
<div class="row">
    <div class="col-md-12">
        <?php get_search_form(); ?>
    </div>
</div>

<!-- archives dropdown -->
<div class="row mt-5">
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
<div class="row mt-5">
    <div class="col-sm-12">
        <h3><small class="text-muted">Categories</small></h3>
        <?php
            echo '<div class="accordion" id="' . esc_attr($accordion_id) . '">';
            jt_render_category_accordion(jt_get_category_tree(), $current_cat_id, $accordion_id);
            echo '</div>';
            ?>
        </ul>
    </div>
</div>

<!-- blog tag cloud -->
<div class="row mt-5">
    <div class="col-sm-12">
        <h3><small class="text-muted">Tag Cloud</small></h3>
        <?php
            wp_tag_cloud([
                'taxonomy'   => 'post_tag', // default
                'number'     => 20,         // how many tags to show
                'orderby'    => 'count',    // or 'name'
                'order'      => 'DESC',     // or 'ASC'
                'smallest'   => 0.85,       // font size range
                'largest'    => 1.6,
                'unit'       => 'rem',
                'format'     => 'flat',     // flat | list | array
                'separator'  => " \n",
                'show_count' => false,      // true to show (n)
            ]);
        ?>
    </div>
</div>

<div class="row">
    <div class="col-sm-12">
        <?php
        $count_posts = wp_count_posts('post');
        $published_posts = $count_posts->publish;
        ?>
        <hr>
        <small class="text-secondary"><?=$published_posts?> posts since April, 2016!</small>
        <hr>
    </div>
</div>
<?php

function theme_styles() {
    wp_enqueue_style('bootstrap-style', get_theme_file_uri('assets/css/bootstrap.min.css'));   // my additional customisations to bootstrap 4.6x
    wp_enqueue_style('style', get_theme_file_uri('assets/css/style.css'));
}

add_action( 'wp_enqueue_scripts', 'theme_styles' );

if ( !function_exists( 'wp_jtiong_content_nav' ) ) :
	/**
	 * Display navigation to next/previous pages when applicable
	 *
	 * @since Independent Publisher 1.0
	 */
	function wp_jtiong_content_nav( $nav_id ) {
		global $wp_query, $post;

		// Don't print empty markup on single pages if there's nowhere to navigate.
		if ( is_single() ) {
			$previous = ( is_attachment() ) ? get_post( $post->post_parent ) : get_adjacent_post( false, '', true );
			$next     = get_adjacent_post( false, '', false );

			if ( !$next && !$previous ) {
				return;
			}
		}

		// Don't print empty markup in archives if there's only one page.
		if ( $wp_query->max_num_pages < 2 && ( is_home() || is_archive() || is_search() ) ) {
			return;
		}

		$nav_class = 'site-navigation paging-navigation';
		if ( is_single() ) {
			$nav_class = 'site-navigation post-navigation';
		}

		?>
		<nav role="navigation" id="<?php echo $nav_id; ?>" class="<?php echo $nav_class; ?>">
			<h1 class="screen-reader-text"><?php _e( 'Post navigation', 'wp-jtiong' ); ?></h1>

			<?php if ( is_single() ) : // navigation links for single posts ?>

				<?php wp_pagenavi(); ?>

				<?php previous_post_link( '<div class="nav-previous"><button class="btn btn-danger">%link</button></div>', '<span class="meta-nav">' . _x( '&larr;', 'Previous post link', 'wp-jtiong' ) . '</span> %title' ); ?>
				<?php next_post_link( '<div class="nav-next"><button class="btn btn-danger">%link</button></div>', '%title <span class="meta-nav">' . _x( '&rarr;', 'Next post link', 'wp-jtiong' ) . '</span>' ); ?>

			<?php elseif ( $wp_query->max_num_pages > 1 && ( is_home() || is_archive() || is_search() ) ) : // navigation links for home, archive, and search pages ?>

				<?php if (function_exists('wp_pagenavi')) : // WP-PageNavi support ?>

					<?php wp_pagenavi(); ?>

				<?php else : ?>

                    <div class="row">
                        <div class="col-sm-6">
                            <?php if ( get_next_posts_link() ) : ?>
                                <div class="nav-previous mr-auto"><?php next_posts_link( '<button class="btn btn-danger">' . __( '<span class="meta-nav">&larr;</span> Older posts', 'wp-jtiong' ) . '</button>' ); ?></div>
                            <?php endif; ?>
                        </div>
                        <div class="col-sm-6 text-right">
                            <?php if ( get_previous_posts_link() ) : ?>
                                <div class="nav-next ml-auto"><?php previous_posts_link( '<button class="btn btn-danger">' . __( 'Newer posts <span class="meta-nav">&rarr;</span>', 'wp-jtiong' ) . '</button>' ); ?></div>
                            <?php endif; ?>
                        </div>
                    </div>


				<?php endif; ?>

			<?php endif; ?>

		</nav><!-- #<?php echo $nav_id; ?> -->
		<?php
	}
endif; // wp_jtiong_content_nav

if ( !function_exists( 'wp_jtiong_posted_author' ) ) :
	/**
	 * Prints HTML with meta information for the current author.
	 *
	 * @since Independent Publisher 1.0
	 */
	function wp_jtiong_posted_author() {
		/**
		 * This function gets called outside the loop (in header.php),
		 * so we need to figure out the post author ID and Nice Name manually.
		 */
		global $wp_query;
		$post_author_id        = $wp_query->post->post_author;
		$post_author_nice_name = get_the_author_meta( 'display_name', $post_author_id );

		printf(
			'<span class="byline"><span class="author p-author vcard h-card"><a class="u-url url fn n" href="%1$s" title="%2$s" rel="author">%3$s</a></span></span>',
			esc_url( get_author_posts_url( get_the_author_meta( 'ID', $post_author_id ) ) ),
			esc_attr( sprintf( __( 'View all posts by %s', 'wp-jtiong' ), $post_author_nice_name ) ),
			esc_html( $post_author_nice_name )
		);
	}
endif;

if ( !function_exists( 'wp_jtiong_post_categories' ) ) :
	/**
	 * Returns categories for current post with separator.
	 * Optionally returns only a single category.
	 *
	 * @since Independent Publisher 1.0
	 */
	function wp_jtiong_post_categories( $separator = ', ', $single = false ) {
		if ( $single === false ) {
			$categories = get_the_category_list( $separator );
			$output     = $categories;
		} else { // Only need one category
			$categories = get_the_category();
			$output     = '';
			if ( $categories ) {
				foreach ( $categories as $category ) {
					$output .= '<a href="' . get_category_link( $category->term_id ) . '" title="' . esc_attr( sprintf( __( "View all posts in %s", 'wp-jtiong' ), $category->name ) ) . '">' . $category->cat_name . '</a>';
					if ( $single ) {
						break;
					}
				}
			}
		}

		return $output;
	}
endif;

if ( !function_exists( 'wp_jtiong_get_post_date' ) ) :
	/**
	 * Returns post date formatted for display in theme
	 * @return string
	 */
	function wp_jtiong_get_post_date() {
		printf(
			'<a href="%1$s" title="%2$s" rel="bookmark"><time class="entry-date dt-published" datetime="%3$s" itemprop="datePublished" pubdate="pubdate">%4$s</time></a>',
			esc_url( get_permalink() ),
			esc_attr( get_the_title() ),
			esc_attr( get_the_date( "Y-m-d\TH:i:sO" ) ),
			esc_html( get_the_date() )
		);
	}
endif;

if ( ! function_exists( 'wp_jtiong_post_word_count' ) ) :
	/**
	 * Returns number of words in a post
	 * @return string
	 */
	function wp_jtiong_post_word_count() {
		global $post;
		$content = get_post_field( 'post_content', $post->ID );
		$count   = str_word_count( strip_tags( $content ) );

		return number_format( $count );
	}
endif;

if ( !function_exists( 'wp_jtiong_get_post_word_count' ) ) :
	/**
	 * Returns number of words in a post formatted for display in theme
	 * @return string
	 */
	function wp_jtiong_get_post_word_count() {
		return sprintf( '<span>' . __( '%1$s Words', 'wp-jtiong' ) . '</span>%2$s', wp_jtiong_post_word_count(), $separator );
	}
endif;

// end of file

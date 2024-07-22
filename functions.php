<?php

function theme_styles() {
    wp_enqueue_style('bootstrap-style', get_theme_file_uri('assets/css/bootstrap.min.css'));   // my additional customisations to bootstrap 4.6x
    wp_enqueue_style('style', get_theme_file_uri('assets/css/style.css'));
}

add_action( 'wp_enqueue_scripts', 'theme_styles' );

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

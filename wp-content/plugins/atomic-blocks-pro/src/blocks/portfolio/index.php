<?php
/**
 * Server-side rendering for the portfolio block
 *
 * @since   2.4.0
 * @package Atomic Blocks
 */

/**
 * Registers the ab_portfolio custom post type.
 */
function atomic_blocks_pro_register_portfolio_post_type() {

	$labels = [
		'name'                  => _x( 'Portfolio Items', 'Portfolio General Name', 'atomic-blocks-pro' ),
		'singular_name'         => _x( 'Portfolio Item', 'Portfolio Singular Name', 'atomic-blocks-pro' ),
		'menu_name'             => __( 'Portfolio Items', 'atomic-blocks-pro' ),
		'name_admin_bar'        => __( 'Portfolio Item', 'atomic-blocks-pro' ),
		'archives'              => __( 'Portfolio Archives', 'atomic-blocks-pro' ),
		'attributes'            => __( 'Portfolio Attributes', 'atomic-blocks-pro' ),
		'parent_item_colon'     => __( 'Parent Portfolio:', 'atomic-blocks-pro' ),
		'all_items'             => __( 'All Portfolios', 'atomic-blocks-pro' ),
		'add_new_item'          => __( 'Add New Portfolio', 'atomic-blocks-pro' ),
		'add_new'               => __( 'Add New', 'atomic-blocks-pro' ),
		'new_item'              => __( 'New Portfolio', 'atomic-blocks-pro' ),
		'edit_item'             => __( 'Edit Portfolio', 'atomic-blocks-pro' ),
		'update_item'           => __( 'Update Portfolio', 'atomic-blocks-pro' ),
		'view_item'             => __( 'View Portfolio', 'atomic-blocks-pro' ),
		'view_items'            => __( 'View Portfolios', 'atomic-blocks-pro' ),
		'search_items'          => __( 'Search Portfolios', 'atomic-blocks-pro' ),
		'not_found'             => __( 'Not found', 'atomic-blocks-pro' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'atomic-blocks-pro' ),
		'featured_image'        => __( 'Featured Image', 'atomic-blocks-pro' ),
		'set_featured_image'    => __( 'Set featured image', 'atomic-blocks-pro' ),
		'remove_featured_image' => __( 'Remove featured image', 'atomic-blocks-pro' ),
		'use_featured_image'    => __( 'Use as featured image', 'atomic-blocks-pro' ),
		'insert_into_item'      => __( 'Insert into portfolio', 'atomic-blocks-pro' ),
		'uploaded_to_this_item' => __( 'Uploaded to this portfolio', 'atomic-blocks-pro' ),
		'items_list'            => __( 'Portfolio list', 'atomic-blocks-pro' ),
		'items_list_navigation' => __( 'Portfolio list navigation', 'atomic-blocks-pro' ),
		'filter_items_list'     => __( 'Filter portfolio list', 'atomic-blocks-pro' ),
	];

	$args = [
		'label'               => __( 'Portfolio', 'atomic-blocks-pro' ),
		'description'         => __( 'Portfolio Description', 'atomic-blocks-pro' ),
		'labels'              => $labels,
		'supports'            => array( 'title', 'editor', 'excerpt', 'thumbnail' ),
		'taxonomies'          => array( 'ab_portfolio_type' ),
		'hierarchical'        => true,
		'menu_icon'           => 'dashicons-format-gallery',
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_rest'        => true,
		'menu_position'       => 20,
		'show_in_admin_bar'   => true,
		'show_in_nav_menus'   => true,
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'page',
	];

	register_post_type( 'ab_portfolio', $args );

}
add_action( 'init', 'atomic_blocks_pro_register_portfolio_post_type' );

/**
 * Registers the ab_portfolio_type custom taxonomy.
 */
function atomic_blocks_pro_register_portfolio_taxonomy() {
	register_taxonomy(
		'ab_portfolio_type',
		'ab_portfolio',
		[
			'labels'              => [
				'name'                       => _x( 'Portfolio Types', 'taxonomy general name', 'atomic-blocks-pro' ),
				'singular_name'              => _x( 'Portfolio Type', 'taxonomy singular name', 'atomic-blocks-pro' ),
				'search_items'               => __( 'Search Portfolio Types', 'atomic-blocks-pro' ),
				'popular_items'              => __( 'Popular Portfolio Types', 'atomic-blocks-pro' ),
				'all_items'                  => __( 'All Types', 'atomic-blocks-pro' ),
				'edit_item'                  => __( 'Edit Portfolio Type', 'atomic-blocks-pro' ),
				'update_item'                => __( 'Update Portfolio Type', 'atomic-blocks-pro' ),
				'add_new_item'               => __( 'Add New Portfolio Type', 'atomic-blocks-pro' ),
				'new_item_name'              => __( 'New Portfolio Type Name', 'atomic-blocks-pro' ),
				'separate_items_with_commas' => __( 'Separate Portfolio Types with commas', 'atomic-blocks-pro' ),
				'add_or_remove_items'        => __( 'Add or remove Portfolio Types', 'atomic-blocks-pro' ),
				'choose_from_most_used'      => __( 'Choose from the most used Portfolio Types', 'atomic-blocks-pro' ),
				'not_found'                  => __( 'No Portfolio Types found.', 'atomic-blocks-pro' ),
				'menu_name'                  => __( 'Portfolio Types', 'atomic-blocks-pro' ),
				'parent_item'                => null,
				'parent_item_colon'          => null,
			],
			'exclude_from_search' => true,
			'has_archive'         => true,
			'hierarchical'        => true,
			'rest_base'           => 'portfolio-type',
			'rewrite'             => array(
				'slug'       => _x( 'portfolio-type', 'ab_portfolio_type slug', 'atomic-blocks-pro' ),
				'with_front' => false,
			),
			'show_ui'             => true,
			'show_tagcloud'       => false,
			'show_in_rest'        => true,
		]
	);
}
add_action( 'init', 'atomic_blocks_pro_register_portfolio_taxonomy' );

/**
 * Renders the portfolio block on server.
 *
 * @param string $attributes  Pass the block attributes.
 * @return string HTML content for the portfolio.
 */
function atomic_blocks_render_block_portfolio_posts( $attributes ) {

	/**
	 * Global post object.
	 * Used for excluding the current post from the grid.
	 *
	 * @var WP_Post
	 */
	global $post;

	$args = [
		'posts_per_page'      => $attributes['postsToShow'],
		'post_status'         => 'publish',
		'order'               => $attributes['order'],
		'orderby'             => $attributes['orderBy'],
		'offset'              => $attributes['offset'],
		'post_type'           => 'ab_portfolio',
		'post__not_in'        => array( $post->ID ), // Exclude the current post from the grid.
	];

	$categories = isset( $attributes['categories'] ) ? $attributes['categories'] : '';

	if ( $categories ) {
		$args['tax_query'] = [
			[
				'taxonomy' => 'ab_portfolio_type',
				'field'    => 'id',
				'terms'    => $attributes['categories'],
			]
		];
	}

	$grid_query = new WP_Query( $args );

	$post_grid_markup = '';

	/* Start the loop */
	if ( $grid_query->have_posts() ) {

		while ( $grid_query->have_posts() ) {
			$grid_query->the_post();

			/* Setup the post ID */
			$post_id = get_the_ID();

			/* Setup the featured image ID */
			$post_thumb_id = get_post_thumbnail_id( $post_id );

			/* Setup the post classes */
			$post_classes = 'ab-portfolio-grid-item';

			/* Join classes together */
			$post_classes = join( ' ', get_post_class( $post_classes, $post_id ) );

			/* Start the markup for the post */
			$post_grid_markup .= sprintf(
				'<article id="post-%1$s" class="%2$s">',
				esc_attr( $post_id ),
				esc_attr( $post_classes )
			);

			/* Get the featured image */
			if ( isset( $attributes['displayPostImage'] ) && $attributes['displayPostImage'] && $post_thumb_id ) {

				$post_thumb_size = 'full';

				if ( ! empty( $attributes['imageSize'] ) ) {
					$post_thumb_size = $attributes['imageSize'];
				}

				/* Output the featured image */
				$post_grid_markup .= sprintf(
					'<div class="ab-block-post-grid-image"><a href="%1$s" rel="bookmark" aria-hidden="true" tabindex="-1">%2$s</a></div>',
					esc_url( get_permalink( $post_id ) ),
					wp_get_attachment_image( $post_thumb_id, $post_thumb_size )
				);
			}

			/* Wrap the text content */
			$post_grid_markup .= sprintf(
				'<div class="ab-block-post-grid-text">'
			);

				$post_grid_markup .= sprintf(
					'<header class="ab-block-post-grid-header">'
				);

					/* Get the post title */
					$title = get_the_title( $post_id );

			if ( ! $title ) {
				$title = __( 'Untitled', 'atomic-blocks-pro' );
			}

			if ( isset( $attributes['displayPostTitle'] ) && $attributes['displayPostTitle'] ) {

				if ( isset( $attributes['postTitleTag'] ) ) {
					$post_title_tag = $attributes['postTitleTag'];
				} else {
					$post_title_tag = 'h2';
				}

				$post_grid_markup .= sprintf(
					'<%3$s class="ab-block-post-grid-title"><a href="%1$s" rel="bookmark">%2$s</a></%3$s>',
					esc_url( get_permalink( $post_id ) ),
					esc_html( $title ),
					esc_attr( $post_title_tag )
				);
			}

			/* Close the header content */
			$post_grid_markup .= sprintf(
				'</header>'
			);

			/* Wrap the excerpt content */
			$post_grid_markup .= sprintf(
				'<div class="ab-block-post-grid-excerpt">'
			);

			/* Get the excerpt */

			// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedHooknameFound, PEAR.Functions.FunctionCallSignature.ContentAfterOpenBracket
			$excerpt = apply_filters( 'the_excerpt',
				get_post_field(
					'post_excerpt',
					$post_id,
					'display'
				)
			);

			if ( empty( $excerpt ) && isset( $attributes['excerptLength'] ) ) {
				// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedHooknameFound, PEAR.Functions.FunctionCallSignature.ContentAfterOpenBracket  -- Running the_excerpt directly, Previous rule doesn't take without the_excerpt being moved up a line
				$excerpt = apply_filters( 'the_excerpt',
					wp_trim_words(
						preg_replace(
							array(
								'/\<figcaption>.*\<\/figcaption>/',
								'/\[caption.*\[\/caption\]/',
							),
							'',
							get_the_content()
						),
						$attributes['excerptLength']
					)
				);
			}

			if ( ! $excerpt ) {
				$excerpt = null;
			}

			if ( isset( $attributes['displayPostExcerpt'] ) && $attributes['displayPostExcerpt'] ) {
				$post_grid_markup .= wp_kses_post( $excerpt );
			}

			/* Get the read more link */
			if ( isset( $attributes['displayPostLink'] ) && $attributes['displayPostLink'] ) {
				$post_grid_markup .= sprintf(
					'<p><a class="ab-block-post-grid-more-link ab-text-link" href="%1$s" rel="bookmark">%2$s <span class="screen-reader-text">%3$s</span></a></p>',
					esc_url( get_permalink( $post_id ) ),
					esc_html( $attributes['readMoreText'] ),
					esc_html( $title )
				);
			}

			/* Close the excerpt content */
			$post_grid_markup .= sprintf(
				'</div>'
			);

			/* Close the text content */
			$post_grid_markup .= sprintf(
				'</div>'
			);

			/* Close the post */
			$post_grid_markup .= "</article>\n";
		}

		/* Restore original post data */
		wp_reset_postdata();

		/* Build the block classes */
		$class = "ab-block-post-grid ab-portfolio-grid align{$attributes['align']}";

		if ( isset( $attributes['className'] ) ) {
			$class .= ' ' . $attributes['className'];
		}

		/* Layout orientation class */
		$grid_class = 'ab-post-grid-items';

		if ( isset( $attributes['postLayout'] ) && 'list' === $attributes['postLayout'] ) {
			$grid_class .= ' ab-is-list';
		} else {
			$grid_class .= ' ab-is-grid';
		}

		/* Grid columns class */
		if ( isset( $attributes['columns'] ) && 'grid' === $attributes['postLayout'] ) {
			$grid_class .= ' ab-columns-' . $attributes['columns'];
		}

		/* Portfolio section title */
		if ( isset( $attributes['displaySectionTitle'] ) && $attributes['displaySectionTitle'] && ! empty( $attributes['sectionTitle'] ) ) {
			if ( isset( $attributes['sectionTitleTag'] ) ) {
				$section_title_tag = $attributes['sectionTitleTag'];
			} else {
				$section_title_tag = 'h2';
			}

			$section_title = '<' . esc_attr( $section_title_tag ) . ' class="ab-post-grid-section-title">' . esc_html( $attributes['sectionTitle'] ) . '</' . esc_attr( $section_title_tag ) . '>';
		} else {
			$section_title = null;
		}

		/* Portfolio section tag */
		if ( isset( $attributes['sectionTag'] ) ) {
			$section_tag = $attributes['sectionTag'];
		} else {
			$section_tag = 'section';
		}

		/* Output the post markup */
		$block_content = sprintf(
			'<%1$s class="%2$s">%3$s<div class="%4$s">%5$s</div></%1$s>',
			$section_tag,
			esc_attr( $class ),
			$section_title,
			esc_attr( $grid_class ),
			$post_grid_markup
		);
		return $block_content;
	}
}

/**
 * Registers the portfolio block on server
 */
function atomic_blocks_register_block_portfolio_posts() {

	/* Check if the register function exists */
	if ( ! function_exists( 'register_block_type' ) ) {
		return;
	}

	/* Block attributes */
	register_block_type(
		'atomic-blocks/ab-portfolio-grid',
		array(
			'attributes'      => array(
				'categories'          => array(
					'type' => 'string',
				),
				'className'           => array(
					'type' => 'string',
				),
				'postsToShow'         => array(
					'type'    => 'number',
					'default' => 6,
				),
				'displayPostExcerpt'  => array(
					'type'    => 'boolean',
					'default' => true,
				),
				'displayPostImage'    => array(
					'type'    => 'boolean',
					'default' => true,
				),
				'displayPostLink'     => array(
					'type'    => 'boolean',
					'default' => true,
				),
				'displayPostTitle'    => array(
					'type'    => 'boolean',
					'default' => true,
				),
				'displaySectionTitle' => array(
					'type'    => 'boolean',
					'default' => false,
				),
				'postTitleTag'        => array(
					'type'    => 'string',
					'default' => 'h3',
				),
				'postLayout'          => array(
					'type'    => 'string',
					'default' => 'grid',
				),
				'columns'             => array(
					'type'    => 'number',
					'default' => 2,
				),
				'align'               => array(
					'type'    => 'string',
					'default' => 'center',
				),
				'width'               => array(
					'type'    => 'string',
					'default' => 'wide',
				),
				'order'               => array(
					'type'    => 'string',
					'default' => 'desc',
				),
				'orderBy'             => array(
					'type'    => 'string',
					'default' => 'date',
				),
				'readMoreText'        => array(
					'type'    => 'string',
					'default' => 'Continue Reading',
				),
				'offset'              => array(
					'type'    => 'number',
					'default' => 0,
				),
				'excerptLength'       => array(
					'type'    => 'number',
					'default' => 55,
				),
				'sectionTag'          => array(
					'type'    => 'string',
					'default' => 'section',
				),
				'sectionTitle'        => array(
					'type' => 'string',
				),
				'sectionTitleTag'     => array(
					'type'    => 'string',
					'default' => 'h2',
				),
				'imageSize'           => array(
					'type'    => 'string',
					'default' => 'full',
				),
				'url'                 => array(
					'type'      => 'string',
					'source'    => 'attribute',
					'selector'  => 'img',
					'attribute' => 'src',
				),
				'id'                  => array(
					'type' => 'number',
				),
			),
			'render_callback' => 'atomic_blocks_render_block_portfolio_posts',
		)
	);
}
add_action( 'init', 'atomic_blocks_register_block_portfolio_posts' );

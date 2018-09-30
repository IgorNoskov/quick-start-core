<?php

/**
 * The plugin bootstrap file
 *
 * Additional functionality for theme Quick Start. Add new post types and taxonomies.
 *
 * @link https://github.com/IgorNoskov
 * @since 1.0.0
 * @package quick-start-core
 *
 * @wordpress-plugin
 * Plugin Name: Quick Start Core
 * Description: Additional functionality for theme Quick Start.
 * Version: 1.0.0
 * Author: Igor Noskov
 * Author URI: https://github.com/IgorNoskov
 * License: GPL-2.0+
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain: theme-core-domain
 * Domain Path: /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

if ( ! function_exists( 'theme_core_add_post_types' ) ) :
	/**
	 * Add new post types and taxonomies.
	 *
	 * @since 1.0.0
	 */

	function theme_core_add_post_types() {

		$labels = array(
			'name'               => _x( 'Custom post type', 'post type general name', 'theme-core-domain' ),
			'singular_name'      => _x( 'Custom post type', 'post type singular name', 'theme-core-domain' ),
			'menu_name'          => _x( 'Custom post type', 'admin menu', 'theme-core-domain' ),
			'name_admin_bar'     => _x( 'Custom post type', 'add new on admin bar', 'theme-core-domain' ),
			'add_new'            => _x( 'Add New', 'book', 'theme-core-domain' ),
			'add_new_item'       => __( 'Add New Custom post', 'theme-core-domain' ),
			'new_item'           => __( 'New Custom post', 'theme-core-domain' ),
			'edit_item'          => __( 'Edit Custom post', 'theme-core-domain' ),
			'view_item'          => __( 'View Custom post', 'theme-core-domain' ),
			'all_items'          => __( 'All Custom posts', 'theme-core-domain' ),
			'search_items'       => __( 'Search Custom posts', 'theme-core-domain' ),
			'parent_item_colon'  => __( 'Parent Custom posts:', 'theme-core-domain' ),
			'not_found'          => __( 'No Custom posts found.', 'theme-core-domain' ),
			'not_found_in_trash' => __( 'No Custom posts found in Trash.', 'theme-core-domain' )
		);

		/*
		 * Create custom post type.
		 *
		 * @since 1.0.0
		 */

		register_post_type(
			'custom',
			array(
				'labels'       => $labels,
				'description'  => __( 'Description for custom post type.', 'theme-core-domain' ),
				'public'       => true,
				'show_in_rest' => true,
				'menu_icon'    => 'dashicons-format-aside',
				'supports'     => array(
					'title',
					'editor',
					'comments',
					'revisions',
					'trackbacks',
					'author',
					'excerpt',
					'page-attributes',
					'thumbnail',
					'custom-fields',
					'post-formats',
				),
				'taxonomies'   => array( 'custom_category', 'custom_tag' ),
				'has_archive'  => true,
				'rewrite'      => array(
					'slug'       => 'custom',
					'with_front' => false,
				),
			)
		);

		$labels = array(
			'name'              => _x( 'Category', 'taxonomy general name', 'theme-core-domain' ),
			'singular_name'     => _x( 'Category', 'taxonomy singular name', 'theme-core-domain' ),
			'search_items'      => __( 'Search Categories', 'theme-core-domain' ),
			'all_items'         => __( 'All Categories', 'theme-core-domain' ),
			'parent_item'       => __( 'Parent Category', 'theme-core-domain' ),
			'parent_item_colon' => __( 'Parent Category:', 'theme-core-domain' ),
			'edit_item'         => __( 'Edit Category', 'theme-core-domain' ),
			'update_item'       => __( 'Update Category', 'theme-core-domain' ),
			'add_new_item'      => __( 'Add New Category', 'theme-core-domain' ),
			'new_item_name'     => __( 'New Category Name', 'theme-core-domain' ),
			'menu_name'         => __( 'Category', 'theme-core-domain' ),
		);

		/*
		 * Create taxonomy (category) for example post type.
		 *
		 * @since 1.0.0
		 */
		register_taxonomy(
			'custom_category',
			array( 'custom' ),
			array(
				'labels'            => $labels,
				'show_in_rest'      => true,
				'show_admin_column' => true,
				'description'       => __( 'Description for custom taxonomy.', 'theme-core-domain' ),
				'hierarchical'      => true,
				'rewrite'           => array(
					'slug'       => 'custom-category',
					'with_front' => false,
				),
			)
		);

		/*
		 * Create taxonomy (tag) for example post type.
		 *
		 * @since 1.0.0
		 */
		$labels = array(
			'name'              => _x( 'Tag', 'taxonomy general name', 'theme-core-domain' ),
			'singular_name'     => _x( 'Tag', 'taxonomy singular name', 'theme-core-domain' ),
			'search_items'      => __( 'Search Tags', 'theme-core-domain' ),
			'all_items'         => __( 'All Tags', 'theme-core-domain' ),
			'parent_item'       => __( 'Parent Tag', 'theme-core-domain' ),
			'parent_item_colon' => __( 'Parent Tag:', 'theme-core-domain' ),
			'edit_item'         => __( 'Edit Tag', 'theme-core-domain' ),
			'update_item'       => __( 'Update Tag', 'theme-core-domain' ),
			'add_new_item'      => __( 'Add New Tag', 'theme-core-domain' ),
			'new_item_name'     => __( 'New Tag Name', 'theme-core-domain' ),
			'menu_name'         => __( 'Tag', 'theme-core-domain' ),
		);

		register_taxonomy(
			'custom_tag',
			array( 'custom' ),
			array(
				'labels'            => $labels,
				'show_in_rest'      => true,
				'show_admin_column' => true,
				'description'       => __( 'Description for custom taxonomy.', 'theme-core-domain' ),
				'hierarchical'      => false,
				'rewrite'           => array(
					'slug'       => 'custom-tag',
					'with_front' => false,
				),
			)
		);

	}

	add_action( 'init', 'theme_core_add_post_types' );

endif;

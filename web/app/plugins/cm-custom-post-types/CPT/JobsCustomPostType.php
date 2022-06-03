<?php

/**
 * Jobs Custom Post Type
 * Used to display work experience
 */

namespace CMcFarlane\CustomPostTypes;

// Block direct access to this file.
defined( 'ABSPATH' ) || exit;

class JobsCustomPostType extends PortfolioCustomPostTypes {

    public function get_custom_post_type_name() {
        return 'jobs';
    }

    public function get_custom_post_type_labels() {
		return array(
			'name'               => _x( 'Jobs', 'Post Type General Name', 'cmcfarlane' ),
			'singular_name'      => _x( 'Job', 'Post Type Singular Name', 'cmcfarlane' ),
			'menu_name'          => _x( 'Work Experience', 'admin menu', 'cmcfarlane' ),
			'name_admin_bar'     => _x( 'Job', 'add new on admin bar', 'cmcfarlane' ),
			'add_new'            => _x( 'Add New', 'Job', 'cmcfarlane' ),	
			'add_new_item'       => __( 'Add New Job', 'cmcfarlane' ),
			'new_item'           => __( 'New Job', 'cmcfarlane' ),
			'edit_item'          => __( 'Edit Job', 'cmcfarlane' ),
			'view_item'          => __( 'View Job', 'cmcfarlane' ),
			'all_items'          => __( 'All Jobs', 'cmcfarlane' ),
			'search_items'       => __( 'Search Jobs', 'cmcfarlane' ),
			'parent_item_colon'  => __( 'Parent Jobs:', 'cmcfarlane' ),
			'not_found'          => __( 'No Jobs found.', 'cmcfarlane' ),
			'not_found_in_trash' => __( 'No Jobs found in Trash.', 'cmcfarlane' ),
		);
    }

	public function get_custom_post_type_editor_support() {
		return array(
			'title',
			'author',
			'revisions',
		);
	}

	public function get_custom_post_type_options() {
		return array(
			'labels'              => $this->get_custom_post_type_labels(),
			'description'         => 'Resume work experience',
			'supports'            => $this->get_custom_post_type_editor_support(),
			'hierarchical'        => false,
			'public'              => true,
			'show_ui'             => true,
			'show_in_menu'        => true,
			'show_in_nav_menus'   => true,
			'show_in_admin_bar'   => true,
			'menu_position'       => 20,
			'menu_icon'           => 'dashicons-businessperson',
			'can_export'          => true,
			'has_archive'         => false,
			'exclude_from_search' => true,
			'publicly_queryable'  => false,
			'capability_type'     => 'post'
		);
	}
}
<?php

namespace CMcFarlane\CustomPostTypes;

// Block direct access to this file.
defined( 'ABSPATH' ) || exit;

class ProjectsCustomPostType extends PortfolioCustomPostTypes {

    public function get_custom_post_type_name() {
        return 'projects';
    }

    public function get_custom_post_type_labels() {
		return array(
			'name'               => _x( 'Projects', 'Post Type General Name', 'cmcfarlane' ),
			'singular_name'      => _x( 'Project', 'Post Type Singular Name', 'cmcfarlane' ),
			'menu_name'          => _x( 'Projects', 'admin menu', 'cmcfarlane' ),
			'name_admin_bar'     => _x( 'Project', 'add new on admin bar', 'cmcfarlane' ),
			'add_new'            => _x( 'Add New', 'Project', 'cmcfarlane' ),	
			'add_new_item'       => __( 'Add New Project', 'cmcfarlane' ),
			'new_item'           => __( 'New Project', 'cmcfarlane' ),
			'edit_item'          => __( 'Edit Project', 'cmcfarlane' ),
			'view_item'          => __( 'View Project', 'cmcfarlane' ),
			'all_items'          => __( 'All Projects', 'cmcfarlane' ),
			'search_items'       => __( 'Search Projects', 'cmcfarlane' ),
			'parent_item_colon'  => __( 'Parent Projects:', 'cmcfarlane' ),
			'not_found'          => __( 'No Projects found.', 'cmcfarlane' ),
			'not_found_in_trash' => __( 'No Projects found in Trash.', 'cmcfarlane' ),
		);
    }

	public function get_custom_post_type_editor_support() {
		return array(
			'title',
			'author',
			'revisions',
			'thumbnail',
		);
	}

	public function get_custom_post_type_options() {
		return array(
			'labels'              => $this->get_custom_post_type_labels(),
			'description'         => "Projects that I've worked on",
			'supports'            => $this->get_custom_post_type_editor_support(),
			'hierarchical'        => false,
			'public'              => true,
			'show_ui'             => true,
			'show_in_menu'        => true,
			'show_in_nav_menus'   => true,
			'show_in_admin_bar'   => true,
			'menu_position'       => 21,
			'menu_icon'           => 'dashicons-portfolio',
			'can_export'          => true,
			'has_archive'         => false,
			'exclude_from_search' => true,
			'publicly_queryable'  => false,
			'capability_type'     => 'post'
		);
	}
}
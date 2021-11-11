<?php

namespace CMcFarlane\CustomPostTypes;

/**
 * Base class for all custom post types; used to register new custom post types for use 
 * within WordPress.
 * 
 * Example Usage:
 * class myCustomPostType extends DefaultPostType {
 * 	 public function get_custom_post_type_name() {
 *     return 'name';
 * 	 }
 * }
 * 
 * $defaultCustomPostType = new DefaultCustomPostType();
 * $defaultCustomPostType->init();
 */

class DefaultCustomPostType {

    /**
     * Initialize custom post type registration
     */
    public static function init()
    {
        $self = new self();
        add_action( 'init', array( $self, 'register_default_custom_post_type') );
    }

    /**
     * Name of the post type.
     *
     * @return string Post type name.
     */
    public function get_custom_post_type_name() {
        return 'default_post_type';
    }

    /**
     * Options and labels to be used with the post type.
     *
     * @return array Post type options and labels
     */
    public function get_custom_post_type_options() {
        return array();
    }

    /**
     * Registers a post type and associates it's taxonomies.
     */
    public function register() {
        $this->register_post_type();
    }

    /**
     * Registers the current post type with wordpress.
     */
    public function register_default_custom_post_type() {
        register_post_type(
            $this->get_custom_post_type_name(),
            $this->get_custom_post_type_options()
        );
    }
}

// create and initialize new instance of DefaultCustomPostType
$defaultCustomPostType = new DefaultCustomPostType();
$defaultCustomPostType->init();
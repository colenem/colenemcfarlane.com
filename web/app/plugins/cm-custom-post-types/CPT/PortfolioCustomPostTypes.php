<?php

/**
 * Barebones setup of functions needed to create a new custom post types
 * 
 * Example Usage:
 * class myCustomPostType extends PortfolioCustomPostTypes {
 * 	 public function get_custom_post_type_name() {
 *     return 'favourite-books';
 * 	 }
 * }
 * 
 */

namespace CMcFarlane\CustomPostTypes;

// Block direct access to this file.
defined( 'ABSPATH' ) || exit;

// class must implement ALL of these functions
interface PortfolioCustomPostTypeInterface {
    public function get_custom_post_type_name();
    public function get_custom_post_type_labels();
    public function get_custom_post_type_editor_support();
    public function get_custom_post_type_options();
}

abstract class PortfolioCustomPostTypes implements PortfolioCustomPostTypeInterface {
    // used to register our custom post type
    // all classes will implement this function (can also be overridden if necessary)
    public function register_cm_custom_post_type() {
        register_post_type(
            $this->get_custom_post_type_name(),
            $this->get_custom_post_type_options()
        );
    }
}
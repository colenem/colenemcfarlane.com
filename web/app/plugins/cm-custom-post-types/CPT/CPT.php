<?php

/**
 *  Used to register all custom post types
 */

namespace CMcFarlane\CustomPostTypes;

class CM_CustomPostType {
    public function init() {
        $self = new self();
        add_action( 'init', array( $self, 'register_cm_portfolio_custom_post_types') );
    }

    public function register_cm_portfolio_custom_post_types() {
        $jobs_custom_post_type     = new JobsCustomPostType();
        $projects_custom_post_type = new ProjectsCustomPostType();

        $custom_post_types = [ $jobs_custom_post_type, $projects_custom_post_type ];

        foreach( $custom_post_types as $custom_post_type ) {
            $custom_post_type->register_cm_custom_post_type();
        }
    }
}

$portfolio_custom_post_types = new CM_CustomPostType();
$portfolio_custom_post_types->init();
